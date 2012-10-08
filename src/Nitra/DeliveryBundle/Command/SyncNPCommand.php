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

class SyncNPCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:sync-np')
                ->setDescription('Synchronizes department of New Post.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');

        $np = $em
                ->getRepository('NitraDeliveryBundle:DeliveryService')
                ->findOneByName('Новая почта');
        $settings = $np->getSettings();

        $xml_request = '<?xml version="1.0" encoding="utf-8"?>
                                                    <file>
                                                        <auth>' . $settings[0] . '</auth>
                                                        <warenhouse/>
                                                    </file>';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://orders.novaposhta.ua/xml.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_request);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $warehouses = $this->responseToArray($response);
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
        return $xml->xpath('/response/result/whs/warenhouse');
    }

    /**
     * синхронизирует информацию по отделению
     * 
     * @param type $wh данные о отделении
     */
    protected function warehouseSync($warehouses, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $np = $em
                ->getRepository('NitraDeliveryBundle:DeliveryService')
                ->findOneByName('Новая почта');
        $query = $em
                ->createQuery('SELECT d.wareId FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service ')
                ->setParameters(array(
            'service' => $np
                ));
        $wareIds = array();
        $ids = $query->getArrayResult();
        foreach ($ids as $id) {
            $wareIds [] = $id['wareId'];
        }
        
      
        foreach ($warehouses as $wh) {
//              var_dump($wh->city);
            $dCity = $em
                    ->getRepository('NitraDeliveryBundle:DeliveryCity')
                    ->findOneByName($wh->cityRu);
            
            
            if (!$dCity) {
                $dCity = new DeliveryCity();
                $dCity->setName($wh->cityRu);
                $em->persist($dCity);
            }
            if (($key = array_search($wh->wareId, $wareIds)) !== FALSE) {
                $query = $em
                        ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                        ->setParameters(array(
                    'service' => $np,
                    'wareId' => $wh->wareId
                        ));
                $department = $query->getOneOrNullResult();

                unset($wareIds[$key]);
            } else {

                try {
                    $query = $em
                            ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                            ->setParameters(array(
                        'service' => $np,
                        'wareId' => $wh->wareId
                            ));
                    $department = $query->getSingleResult();
                    
    
                } catch (\Doctrine\ORM\NoResultException $e) {
                    $department = new Department();
                    $em->persist($department);
                }
            }
           
//                            var_dump($wh);
            $department->setDeliveryCity($dCity);
            $department->setName($wh->addressRu);
            $department->setAddress($wh->addressRu);
            $department->setPhone($wh->phone);
            $department->setWareId($wh->wareId);
            $department->setLatitude($wh->y);
            $department->setLongitude($wh->x);
            $department->setDeliveryService($np);

            $em->flush();
        }
        foreach ($wareIds as $id) {
            $query = $em
                    ->createQuery('SELECT d FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service AND d.wareId = :wareId')
                    ->setParameters(array(
                'service' => $np,
                'wareId' => $id
                    ));
            $department = $query->getOneOrNullResult();
            $em->remove($department);
        }
        $em->flush();
    }

}