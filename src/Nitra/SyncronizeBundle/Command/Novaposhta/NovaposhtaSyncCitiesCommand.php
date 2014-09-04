<?php
namespace Nitra\SyncronizeBundle\Command\Novaposhta;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\Novaposhta\NovaposhtaSync;
use Nitra\DeliveryBundle\Entity\City;

/**
 * NovaposhtaSyncCitiesCommand
 * Синхронизация городов для ТК Новая Почта
 */
class NovaposhtaSyncCitiesCommand extends NovaposhtaSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('novaposhta:sync-cities')
            ->setDescription('Синхронизация городов ТК "Новая Почта".')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        // отправить xml запрос на сервер
        $apiResponse = $this->apiSendRequest($this->getXmlRequest(), $this->getXmlXpath());
        
        // проверить ответ
        if (!$apiResponse) {
            $errorMessage = date('Y-m-d H:i'). " - Ответ не был получен от сервера.";
            throw new \Exception($errorMessage);
        }
        
        // выполнить синхронизацию
        $this->processSync($apiResponse, $output);
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlRequest()
    {
        return 
        '<?xml version="1.0" encoding="utf-8"?>
            <file>
                <auth>' . $this->getParameter('apiToken') . '</auth>
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
        // получить прогресс
        $progress = $this->getHelperSet()->get('progress');
        $progress->start($output, count($responseArray));
        
        // массив названий не повторяющихся эталонов городов
        // ключ массива ID города эталона
        $geoCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city.id, city.name')
            ->from('NitraGeoBundle:City', 'city')
            ->innerJoin('city.region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', $this->getParameter('countryId'))
            ->groupBy('city.name')
            ->getQuery()
            ->execute(array(), 'KeyPair');
        
        // получить города DS
        // ключ массива ID города на стороне ТК
        $dsCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city.id, city.businessKey, city.name')
            ->from('NitraDeliveryBundle:City', 'city', 'city.businessKey')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->getArrayResult();
        
        // обойти массив ответа
        foreach($responseArray as $tkCity) {
            
            // название города берем по умолчанию русское значение
            $cityTkName = trim((string)$tkCity->nameRu);
            
            // проверить существует ли город в DS
            $businessKey = trim((string)$tkCity->id);
            if (!isset($dsCities[$businessKey])) {
                // город в DS не существует
                // создать новый город
                $dsCity = new City();
                $dsCity->setDelivery($this->getDelivery());
                $dsCity->setBusinessKey($businessKey);
                $dsCity->setNameTk($cityTkName);
                // город регион
                if (trim((string)$tkCity->id) == trim((string)$tkCity->parentCityId)) {
                    // установить город регион
                    $dsCity->setName($cityTkName);
                    
                } else {
                    // установить название города 
                    // с указанием к какому региону он относится
                    
                    // название города
                    $cityName = $cityTkName;
                    $parentCityNameRu = trim((string)$tkCity->parentCityNameRu);
                    // приклеить к названию города название региона (родительского города)
                    if ($parentCityNameRu) {
                        $cityName .= ' (НП parent: '.$parentCityNameRu.')';
                    }
                    
                    // установить название города
                    $dsCity->setName($cityName);
                }
                
//                // убираем автоподвязку
//                // автоподвязка к эталонному городу
//                $geoCityId = array_search($cityTkName, $geoCities);
//                if ($geoCityId) {
//                    $dsCity->setGeoCity($this->getEntityManager()->getReference('NitraGeoBundle:City', $geoCityId));
//                }
                
                // запомнить для сохранения
                $this->getEntityManager()->persist($dsCity);                
                
            } else {
                
                // город в DS сушествует 
                // получить город
                $dsCity = $this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$businessKey]['id']);
                
                // удаляем из массива город 
                // оставшиеся города в массиве будут удалены, по ним ТК не работает
                unset($dsCities[$businessKey]);
            }
            
            // массив сравнения город ТК 
            $tkCityCompare = serialize(array(
               trim((string)$tkCity->id),
               trim((string)$tkCity->nameRu),
            ));
            
            // массив сравнения город DS
            $dsCityCompare = serialize(array(
                (string)$dsCity->getBusinessKey(),
                (string)$dsCity->getNameTk(),
            ));
            
            // сравнить город ТК и город DS
            if ($tkCityCompare != $dsCityCompare) {
                // наполнить город DS данными
                $dsCity->setNameTk(trim((string)$tkCity->nameRu));
            }
            
            // обновить прогресс
            $progress->advance();
        }
        
        // города не пришли в синхронизации 
        // ТК не работает с оставшимися городами
        if ($dsCities) {
            // получить удаляемые города для ТК
            // если удаляем через createQueryBuilder()->delete()
            // то не срабатывет SoftDeletable, запись удаялется физически из БД
            $citiesDelete = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:City')
                ->createQueryBuilder('city')
                ->where('city.businessKey IN(:ids)')->setParameter('ids', array_keys($dsCities))
                ->andWhere('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
                ->getQuery()
                ->execute();
            // удалить города которые не пришли в синхронизации 
            foreach($citiesDelete as $dsCity) {
                $this->getEntityManager()->remove($dsCity);
            }
        }
        
        // сохранить города, если таковые имеются
        $this->getEntityManager()->flush();
        
        // Синхронизация завершена
        $output->write(' ');
        $output->write('Синхронизация городов ТК "Новая Почта" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
}