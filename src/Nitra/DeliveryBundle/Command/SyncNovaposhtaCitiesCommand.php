<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;
use Nitra\DeliveryBundle\Entity\City;

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
        // получить массив не повторяющизся названий эталогов городов
        // ключ массива ID города эталона
        $geoCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city')
            ->from('NitraGeoBundle:City', 'city', 'city.id')
            ->innerJoin('city.region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :country_id')->setParameter('country_id', $this->getParameter('country_id'))
            ->groupBy('city.name')
            ->getQuery()
            ->execute();
        
        // массив названий эталогов городов
        // array (ID => name)
        $geoCityNames = array();
        foreach($geoCities as $geoCity) {
            $geoCityNames[$geoCity->getId()] = $geoCity->getName();
        }
        
        // получить массив городов ТК
        // array( cityCode => name )
        $dsCities = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:City')
            ->createQueryBuilder('city')
            ->select('city.cityCode, city.name')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->execute(array(), 'KeyPair');
        
        // обойти массив ответа
        foreach($responseArray as $tkCity) {
            
            // проверить существует ли город в городах ТК 
            $tkCityId = (string)$tkCity->id;
            if (in_array($tkCityId, array_keys($dsCities))) {
                // удаляем из массива городов 
                // оставшиеся города в массиве ьудут удалены, по ним ТК не работает
                unset($dsCities[$tkCityId]);
                
            } else {
                // в ds нет города 
                // добавить новый город 
                $city = new City();
                $city->setDelivery($this->getDelivery());
                $city->setCityCode($tkCityId);
                // город регион
                if ((string)$tkCity->id == (string)$tkCity->parentCityId) {
                    // установить город регион
                    $city->setName((string)$tkCity->nameRu);
                    
                } else {
                    // установить название города 
                    // с указанием к какому региону он относится
                    
                    // название города
                    $cityName = (string)$tkCity->nameRu;
                    // приклеить к названию города название региона (родительского города)
                    if ((string)$tkCity->parentCityNameRu) {
                        $cityName .= ' (НП parent: '.(string)$tkCity->parentCityNameRu.')';
                    }
                    
                    // кстановить название города
                    $city->setName($cityName);
                }
                
                // автоподвязка к эталонному городу
                $geoCityId = array_search((string)$tkCity->nameRu, $geoCityNames);
                if ($geoCityId) {
                    $city->setGeoCity($geoCities[$geoCityId]);
                }
                
                // запомнить для сохранения
                $this->getEntityManager()->persist($city);                
            }
            
        }
        
        // города не пришли в синхронизации 
        // ТК не работает с оставшимися городами
        if ($dsCities) {
            // получить удаляемые города для ТК
            // если удаляем через ->delete('NitraDeliveryBundle:City', 'city')
            // то не срабатывет SoftDeletable, запись удаялется физически из БД
            $citiesDelete = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:City')
                ->createQueryBuilder('city')
                ->where('city.cityCode IN(:ids)')->setParameter('ids', array_keys($dsCities))
                ->andWhere('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
                ->getQuery()
                ->execute();
            // удалить города которые не пришли в синхронизации 
            foreach($citiesDelete as $city) {
                $this->getEntityManager()->remove($city);
            }
        }
        
        // сохранить города, если таковые имеются
        $this->getEntityManager()->flush();
    }
    
}