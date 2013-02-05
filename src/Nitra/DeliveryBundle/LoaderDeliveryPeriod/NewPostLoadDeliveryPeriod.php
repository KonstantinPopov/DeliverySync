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
    //флаг принудительной загрузки всех сроков
    private $force;
    //iteration
    private $iteration;

    public function __construct($path, $force)
    {
        $this->path = $path;
        $this->force = $force;
    }

    public function setIteration($iteration)
    {
        $this->iteration = $iteration;
        return $this;
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
        var_dump($response);
        if (($response == '403 too many requests')) {
            sleep(1);
            return $this->sendResponse($dCityFrom, $dCityTo);
        } else {
            if ($response[0] != '<') {
                $fh = fopen($this->path . '/error_np.txt', 'a');
                fwrite($fh, $dCityFrom->getName() . $dCityTo->getName() . $this->deliveryService->getName() . PHP_EOL);
                fwrite($fh, $response . PHP_EOL);
                fclose($fh);
                return false;
            }
        }

        return $response;
    }

    private function getPeriod($dCityFrom, $dCityTo)
    {
        $response = $this->sendResponse($dCityFrom, $dCityTo);
        if ($response) {
            $xml = simplexml_load_string($response);
            $answer = $xml->xpath('/file/estimatedDeliveryDate');
            $diff = date_diff(new \DateTime($answer[0]), new \DateTime($this->startDate))->days;
            return $diff;
        } else {
            return false;
        }
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
        $i = 1;
        $date = new \DateTime();

        $deliveryCitiesFrom = $this->em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
                ->distinct('dc.id')
                ->leftjoin('dc.departments', 'd');
        if (!$this->force) {
            $deliveryCitiesFrom = $deliveryCitiesFrom->andWhere('d.createdAt > :today')
                    ->setParameter('today', $date->format('Y-m-d 00:00:00'));
        }

        $deliveryCitiesFrom = $deliveryCitiesFrom->andWhere('d.deliveryService = :ds')
                ->setParameter('ds', $this->deliveryService)
                ->getQuery()
                ->setFirstResult($this->iteration)
                ->setMaxResults(1)
//         var_dump($deliveryCitiesFrom->getDql());die;
                ->execute();

        $deliveryCities = $this->em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
                ->distinct('dc.id')
                ->leftjoin('dc.departments', 'd');
        if (!$this->force) {
            $deliveryCities = $deliveryCities->andWhere('d.createdAt > :today')
                    ->setParameter('today', $date->format('Y-m-d 00:00:00'));
        }

        $deliveryCities = $deliveryCities->andWhere('d.deliveryService = :ds')
                ->setParameter('ds', $this->deliveryService)
                ->getQuery()
                ->execute();
        foreach ($deliveryCitiesFrom as $dCityFrom) {
            foreach ($deliveryCities as $dCityTo) {
                if ($dCityFrom->getId() == $dCityTo->getId()) {
                    continue;
                }
                try {
                    var_dump($dCityFrom->getName(), $dCityTo->getName());
                    $period = $this->getPeriod($dCityFrom, $dCityTo);
                    if ($period) {
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
                        var_dump($i++);
                    }
                } catch (\Exception $e) {
                    $fh = fopen($this->path . '/error_np.txt', 'a');
                    fwrite($fh, $dCityFrom->getName() . $dCityTo->getName() . $this->deliveryService->getName() . PHP_EOL);
                    fwrite($fh, $e->getMessage() . PHP_EOL);
                    fclose($fh);
                }
            }
        }
    }

}