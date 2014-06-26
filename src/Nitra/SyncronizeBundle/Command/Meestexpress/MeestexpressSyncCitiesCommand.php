<?php
namespace Nitra\SyncronizeBundle\Command\Meestexpress;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\Meestexpress\MeestexpressSync;
use Nitra\DeliveryBundle\Entity\City;

/**
 * MeestexpressSyncCitiesCommand
 * Синхронизация городов для ТК Мист Експресс
 */
class MeestexpressSyncCitiesCommand extends MeestexpressSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:meestexpress:sync-cities')
            ->setDescription('Синхронизация городов ТК "Мист Експресс".')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        // отправить xml запрос на сервер
        $apiResponse = $this->apiSendRequest('1C_Query.php', $this->getXmlRequest(), $this->getXmlXpath());
        
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
        // запрос получения городов для страны
        return $this->getXmlQuery('City', 'Countryuuid = "'.$this->getParameter('country_uuid').'" AND IsBranchInCity ="1"');
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlXpath()
    {
        return 'result_table/items';
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
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :country_id')->setParameter('country_id', $this->getParameter('country_id'))
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
        
        // обойти массив ответа
        foreach($responseArray as $tkCity) {
            
            // проверить существует ли город в городах ТК 
            $businessKey = trim((string)$tkCity->uuid);
            if (in_array($businessKey, array_keys($dsCities))) {
                // удаляем из массива городов 
                // оставшиеся города в массиве будут удалены, по ним ТК не работает
                unset($dsCities[$businessKey]);
                
            } else {
                
                // в ds нет города 
                // добавить новый город 
                $cityTkName = ($tkCity->DescriptionRU) ? trim($tkCity->DescriptionRU) : trim($tkCity->DescriptionUA);
                
                $dsCity = new City();
                $dsCity->setDelivery($this->getDelivery());
                $dsCity->setBusinessKey($businessKey);
                $dsCity->setNameTk(($tkCity->SeachName)?$tkCity->SeachName:$cityTkName);
                $dsCity->setName($cityTkName);
                
                // автоподвязка к эталонному городу
                $geoCityId = array_search($cityTkName, $geoCities);
                if ($geoCityId) {
                    $dsCity->setGeoCity($this->getEntityManager()->getReference('NitraGeoBundle:City', $geoCityId));
                }                
                // запомнить для сохранения
                $this->getEntityManager()->persist($dsCity);                
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
        $output->write('Синхронизация городов ТК "Мист Експресс" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
}