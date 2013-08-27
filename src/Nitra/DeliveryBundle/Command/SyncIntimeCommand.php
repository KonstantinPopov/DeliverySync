<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Entity\DeliveryCity;
use \Nitra\DeliveryBundle\Entity\Department;

class SyncIntimeCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('ds:sync-it')
            ->setDescription('Synchronizes department of InTime.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        ini_set("soap.wsdl_cache_enabled", 0);
        ini_set("soap.wsdl_cache_enabled", 0);
        ini_set("soap.wsdl_cache_limit", 0);
        ini_set('memory_limit', '1024M');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');

        $client = new \SoapClient("https://ws.intime.ua/test98/ws/integration.1cws?wsdl");

        $result = $client->GetListCities($_GET);

        $warehouses = $this->responseToArray($result->result);
        $this->warehouseSync($warehouses, $output);
        $output->writeln('Синхронизация завершена успешно.');
    }

    /**
     * преобразует данные xml в массив объектов
     * @param type $response ответ api новой почты
     * @return type массив обектов с данными о отделениях
     */
    protected function responseToArray($response)
    {
        $xml = simplexml_load_string($response);
        return $xml->xpath('/ListWarehouses/Warehouse');
    }

    /**
     * синхронизирует информацию по отделению
     * 
     * @param type $wh данные о отделении
     */
    protected function warehouseSync($warehouses, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $it = $em
            ->getRepository('NitraDeliveryBundle:DeliveryService')
            ->findOneByName('Интайм');
        $query = $em
            ->createQuery('SELECT d.wareId FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service ')
            ->setParameters(array(
                                 'service' => $it
        ));
        $wareIds = array();
        $ids = $query->getArrayResult();
        foreach ($ids as $id) {
            $wareIds [] = $id['wareId'];
        }
        foreach ($warehouses as $wh) {
            $arr = explode(' ', $wh->Name);
            if (strstr(strval($wh->Name), '(')) {
                $city = $wh->Name;
            } else {
                if ($arr) {
                    $city = $arr[0];
                } else {
                    $city = $wh->Name;
                }
            }
            $dCity = $em
                    ->getRepository('NitraDeliveryBundle:DeliveryCity')
                    ->findOneByName($city);
            if (!$dCity) {
                $dCity = new DeliveryCity();
                $dCity->setName($city);
                $em->persist($dCity);
            }
            if (($key = array_search($wh->Code, $wareIds)) !== FALSE) {
                $query = $em
                        ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                        ->setParameters(array(
                    'service' => $it,
                    'wareId' => $wh->Code
                        ));
                $department = $query->getOneOrNullResult();

                unset($wareIds[$key]);
            } else {
                try {
                    $query = $em
                            ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                            ->setParameters(array(
                        'service' => $it,
                        'wareId' => $wh->Code
                            ));
                    $department = $query->getSingleResult();
                } catch (\Doctrine\ORM\NoResultException $e) {
                    $department = new Department();
                    $em->persist($department);
                }
            }
            $department->setDeliveryCity($dCity);
            $department->setName($wh->Name);
            $department->setAddress($wh->Adress);
            $department->setPhone($wh->Phone);
            $department->setWareId($wh->Code);
            $department->setDeliveryService($it);

            $em->flush();
        }
        foreach ($wareIds as $id) {
            $query = $em
                ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                ->setParameters(array(
                                     'service' => $it,
                                     'wareId' => $id
            ));
			$result = $query->getResult();
			if(count($result)) {
				$department = $result->getFirst();
				$em->remove($department);
			}
        }
        $em->flush();
    }

}

