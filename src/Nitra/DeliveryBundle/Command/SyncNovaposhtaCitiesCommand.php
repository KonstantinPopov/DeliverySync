<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;
use Nitra\DeliveryBundle\Entity\Region as DeliveryRegion;
use Nitra\DeliveryBundle\Entity\City as DeliveryCity;

/**
 * SyncNovaposhtaCitiesCommand
 * Синхронизация городов для ТК Новая Почта
 */
class SyncNovaposhtaCitiesCommand extends SyncNovaposhta
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('novaposhta:sync-cities')
            ->setDescription('Синхронизировать города ТК "Новая Почта"')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        // отправить xml запрос на сервер
        $responseArray = $this->apiSendRequest($this->getXmlRequest(), $this->getXmlXpath());
        
        // проверить массив ответа 
        if (!$responseArray) {
            $output->writeln(date('Y-m-d H:i'). " - Ответ не был получен от сервера.");
        } else {
            // выполнить синхронизацию
            $this->processSync($responseArray, $output);
            // Синхронизация завершена
            $output->writeln(date('Y-m-d H:i'). " - Синхронизация завершена успешно.");
        }
        
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlRequest()
    {
        return 
        '<?xml version="1.0" encoding="utf-8"?>
            <file>
                <auth>' . $this->getParameter('api_token') . '</auth>
                <city/>
            </file>';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlXpath()
    {
        return '/response/result/cities/city';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
    {
        
        // массив импортируемых регионов
        $regions = array();
        
        // массив импортируемых городов
        $cities = array();
            
        // обойти массив ответа
        foreach($responseArray as $tkData) {
            // регион
            if ((string)$tkData->id == (string)$tkData->parentCityId) {
                $regions[] = $tkData;
            }
            
            // город
            $cities[] = $tkData;
        }
        
        // Импортировать регионы
        foreach($regions as $region) {
            
            // регион в DS по ID ТК 
            $dsRegion = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:Region')
                ->findOneBy(array(
                    'regionCode' => (string)$region->id,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // регион не найден
            if (!$dsRegion) {
                // поиск по названию 
                $dsRegion = $this->getEntityManager()
                    ->getRepository('NitraDeliveryBundle:Region')
                    ->findOneBy(array(
                        'name' => (string)$region->nameRu,
                        'delivery' => $this->getDelivery(),
                        ));
            }
            
            // регион не найден создать новый
            if (!$dsRegion) {
                $dsRegion = new DeliveryRegion();
            }
            
            // установить данные 
            $dsRegion->setDelivery($this->getDelivery());
            $dsRegion->setRegionCode((string)$region->id);
            $dsRegion->setName((string)$region->nameRu);
            
            // запомнить для сохранения
            $this->getEntityManager()->persist($dsRegion);
        }
        
        // сохранить регионы отдельно от городов
        $this->getEntityManager()->flush();
        
        // Импортировать города
        foreach($cities as $city) {
            
            // получить регион для города
            $dsRegion = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:Region')
                ->findOneBy(array(
                    'regionCode' => (string)$city->parentCityId,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // город в DS по ID ТК 
            $dsCity = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:City')
                ->findOneBy(array(
                    'cityCode' => (string)$city->id,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // город не найден
            if (!$dsCity) {
                // поиск по названию 
                $dsCity = $this->getEntityManager()
                    ->getRepository('NitraDeliveryBundle:City')
                    ->findOneBy(array(
                        'name' => (string)$city->nameRu,
                        'delivery' => $this->getDelivery(),
                        ));
            }
            
            // город не найден создать новый
            if (!$dsCity) {
                $dsCity = new DeliveryCity();
            }
            
            // установить данные 
            $dsCity->setDelivery($this->getDelivery());
            $dsCity->setRegion($dsRegion);
            $dsCity->setCityCode((string)$city->id);
            $dsCity->setName((string)$city->nameRu);
            
            // запомнить для сохранения
            $this->getEntityManager()->persist($dsCity);
        }
        
        // сохранить города отдельно от регионов
        $this->getEntityManager()->flush();
    }
    
}