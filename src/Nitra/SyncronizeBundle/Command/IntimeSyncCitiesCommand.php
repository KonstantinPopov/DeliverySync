<?php
namespace Nitra\SyncronizeBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\IntimeSync;
use Nitra\DeliveryBundle\Entity\City;

/**
 * IntimeSyncCitiesCommand
 * Синхронизация городов для ТК ИнТайм
 */
class IntimeSyncCitiesCommand extends IntimeSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('intime:sync-сities')
            ->setDescription('Синхронизация городов ТК "ИнТайм".')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // отправить xml запрос на сервер
        $apiResponse = $this->apiSendRequest('GetListCities', '/ListWarehouses/Warehouse', null);
        
        // выполнить синхронизацию
        $this->processSync($apiResponse, $output);
        
        // Синхронизация завершена
        $output->writeln(date('Y-m-d H:i'). ' - Синхронизация городов ТК "ИнТайм" завершена успешно.');
    }
    
    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
    {
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
        
        // получить массив городов ТК
        // array( businessKey => name )
        $dsCities = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:City')
            ->createQueryBuilder('city')
            ->select('city.businessKey, city.nameTk')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->execute(array(), 'KeyPair');
        
        // обойти массив городов ТК
        foreach($responseArray as $tkCity) {
            
            // проверить существует ли город в городах ТК 
            $businessKey = trim((string)$tkCity->Code);
            if (in_array($businessKey, array_keys($dsCities))) {
                // удаляем из массива городов 
                // оставшиеся города в массиве будут удалены, по ним ТК не работает
                unset($dsCities[$businessKey]);
                
            } else {
                // в ds нет города 
                // добавить новый город 
                $cityTkName = trim((string)$tkCity->Name);
                
                $dsCity = new City();
                $dsCity->setDelivery($this->getDelivery());
                $dsCity->setBusinessKey($businessKey);
                $dsCity->setNameTk($cityTkName);
                $dsCity->setName($cityTkName);
                
                // автоподвязка к эталонному городу
                $geoCityId = array_search($cityTkName, $geoCities);
                if ($geoCityId) {
                    $dsCity->setGeoCity($this->getEntityManager()->getReference('NitraGeoBundle:City', $geoCityId));
                }                
                // запомнить для сохранения
                $this->getEntityManager()->persist($dsCity);
            }
            
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
    }
    
}