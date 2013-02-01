<?php

namespace Nitra\DeliveryBundle\LoaderDeliveryPeriod;

use Nitra\DeliveryBundle\LoaderDeliveryPeriod\iLoaderDeliveryPeriod as iLoaderDeliveryPeriod;
use Nitra\DeliveryBundle\Entity\Department as Department;
use Nitra\DeliveryBundle\Entity\DeliveryPeriod as DeliveryPeriod;
use Nitra\DeliveryBundle\Entity\DeliveryService as DeliveryService;

class NewPostLoadDeliveryPeriod implements iLoaderDeliveryPeriod
{
    //error log dir
    private $path;
    //entity manager
    private $em;
    //дата отправки
    private $startDate;
    //api ключ
    private $apiKey;
    //транспортная компания
    private $deliveryService;
    
    
    public function __construct($path)
    {
        $this->path = $path;
    }
    
    /**
     * Устанавливает службу доставки
     */
    public function setDeliveryService(DeliveryService $ds)
    {
        $this->deliveryService = $ds;
        return $this;
    }

    private function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
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

    private function sendResponse($dCityFrom, $dCityTo)
    {
        $xml_request = '<?xml version="1.0" encoding="UTF-8"?>
                                <file>
                                    <auth>' . $this->apiKey . '</auth>
                                    <getEstimatedDeliveryDate>
                                        <senderCity>' . $dCityFrom->getName() . '</senderCity>
                                        <recipientCity>' . $dCityTo->getName() . '</recipientCity>
                                        <date>' . $this->startDate . '</date>
                                        <deliveryTypeId>4</deliveryTypeId>
                                        <satDelivery>1</satDelivery>
                                    </getEstimatedDeliveryDate>
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
        if (($response == '403 too many requests') || ($response[0] != '<')) {
            sleep(1);
            return $this->sendResponse($dCityFrom, $dCityTo);
        }

        return $response;
    }

    private function getPeriod($dCityFrom, $dCityTo)
    {
        $xml = simplexml_load_string($this->sendResponse($dCityFrom, $dCityTo));
        $answer = $xml->xpath('/file/estimatedDeliveryDate');
        $diff = date_diff(new \DateTime($answer[0]), new \DateTime($this->startDate))->days;
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

        if (!$this->apiKey) {
            $settings = $this->deliveryService->getSettings();
            $this->setApiKey($settings[0]);
        }
//        $departments = $this->deliveryService->getDepartments();
        $i = 1;

        $deliveryCities = $this->em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
                ->leftjoin('dc.departments', 'd')
                ->where('d.deliveryService = :ds')
                ->setParameter('ds', $this->deliveryService)
                ->getQuery()
                ->execute();
        foreach ($deliveryCities as $dCityFrom) {
            foreach ($deliveryCities as $dCityTo) {
                if ($dCityFrom->getId() == $dCityTo->getId()) {
                    continue;
                }
                try {
                    $period = $this->getPeriod($dCityFrom, $dCityTo);
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
                    $fh = fopen($this->path  . '/error_np.txt', 'a');
                    fwrite($fh,  $dCityFrom->getName() . $dCityTo->getName() . $this->deliveryService->getName() . PHP_EOL);
                    fwrite($fh,  $e->getMessage() . PHP_EOL);
                    fclose($fh);
                }
            }
        }
    }

}