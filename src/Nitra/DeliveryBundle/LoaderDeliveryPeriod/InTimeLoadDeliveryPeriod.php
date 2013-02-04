<?php

namespace Nitra\DeliveryBundle\LoaderDeliveryPeriod;

use Nitra\DeliveryBundle\LoaderDeliveryPeriod\iLoaderDeliveryPeriod as iLoaderDeliveryPeriod;
use Nitra\DeliveryBundle\Entity\Department as Department;
use Nitra\DeliveryBundle\Entity\DeliveryPeriod as DeliveryPeriod;
use Nitra\DeliveryBundle\Entity\DeliveryService as DeliveryService;

class InTimeLoadDeliveryPeriod implements iLoaderDeliveryPeriod
{

    //error log dir
    private $path;
    //entity manager
    private $em;
    //дата отправки
    private $startDate;
    //транспортная компания
    private $deliveryService;
    //флаг принудительной загрузки всех сроков
    private $force;

    public function __construct($path, $force)
    {
        $this->path = $path;
        $this->force = $force;
    }

    /**
     * Устанавливает службу доставки
     */
    public function setDeliveryService(DeliveryService $ds)
    {
        $this->deliveryService = $ds;
        return $this;
    }

    public function setEntityManager($em)
    {
        $this->em = $em;
        return $this;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    private function sendResponse(Department $departmentFrom, Department $departmentTo)
    {
        $request = 'from=' . $departmentFrom->getWareId() . '&to=' . $departmentTo->getWareId() . '&type=2&date=' . $this->startDate;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.intime.ua/modules/shipment/check.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    private function getPeriod(Department $departmentFrom, Department $departmentTo)
    {
        $response_array = explode(' ', $this->sendResponse($departmentFrom, $departmentTo));
        $answer = $response_array[count($response_array) - 1];
        $diff = date_diff(new \DateTime($answer), new \DateTime($this->startDate))->days;
        return $diff;
    }

    public function loadDeliveryPeriod()
    {
        if (!$this->em) {
            throw new \Exception('Не установлен entity manager.');
        }

        if (!$this->startDate) {
            throw new \Exception('Не установлена дата отправки.');
        }

        if (!$this->deliveryService) {
            throw new \Exception('Не установлена служба доставки.');
        }

        $i = 1;
        $date = new \DateTime();
        $deliveryCities = $this->em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
                ->leftjoin('dc.departments', 'd');
        if (!$this->force) {
            $deliveryCities = $deliveryCities->andWhere('d.createdAt > :today')
                    ->setParameter('today', $date->format('Y-m-d 00:00:00'));
        }
        
        $deliveryCities = $deliveryCities->andWhere('d.deliveryService = :ds')
                ->setParameter('ds', $this->deliveryService)
                ->getQuery()
                ->execute();
        foreach ($deliveryCities as $dCityFrom) {
            foreach ($deliveryCities as $dCityTo) {
                try {
                    if ($dCityFrom->getId() == $dCityTo->getId()) {
                        continue;
                    }
                    $period = $this->getPeriod($dCityFrom->getDepartmentByDS($this->deliveryService), $dCityTo->getDepartmentByDS($this->deliveryService));
                    $deliveryPeriod = $this->em->getRepository('NitraDeliveryBundle:DeliveryPeriod')->findOneBy(array(
                        'deliveryService' => $this->deliveryService,
                        'cityFrom' => $dCityFrom->getCity(),
                        'cityTo' => $dCityTo->getCity(),
                    ));
                    if ($deliveryPeriod) {
                        $deliveryPeriod->setPeriod($period);
                    } else {
                        $deliveryPeriod = new DeliveryPeriod();
                        $deliveryPeriod->setDeliveryService($this->deliveryService);
                        $deliveryPeriod->setDeliveryCityFrom($dCityFrom);
                        $deliveryPeriod->setDeliveryCityTo($dCityTo);
                        $deliveryPeriod->setCityFrom($dCityFrom->getCity());
                        $deliveryPeriod->setCityTo($dCityTo->getCity());
                        $deliveryPeriod->setPeriod($period);
                    }

                    $this->em->persist($deliveryPeriod);
                    $this->em->flush();
                } catch (\Exception $e) {
                    $fh = fopen($this->path . '/error_it.txt', 'a');
                    fwrite($fh, $dCityFrom->getName() . $dCityTo->getName() . $this->deliveryService->getName() . PHP_EOL);
                    fwrite($fh, $e->getMessage() . PHP_EOL);
                    fclose($fh);
                }
            }
        }
    }

}