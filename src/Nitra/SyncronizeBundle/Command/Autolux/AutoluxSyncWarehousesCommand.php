<?php
namespace Nitra\SyncronizeBundle\Command\Autolux;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\Autolux\AutoluxSync;
use Nitra\DeliveryBundle\Entity\City;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * AutoluxSyncWarehousesCommand
 * Синхронизация городов для ТК АвтоЛюкс
 */
class AutoluxSyncWarehousesCommand extends AutoluxSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('autolux:sync-warehouses')
            ->setDescription('Синхронизация городов и складов ТК "АвтоЛюкс".')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // получить контент
        $htmlContent = file_get_contents($this->getParameter('apiUrl'));
        $htmlContent = iconv('windows-1251', 'utf-8', $htmlContent);
        $htmlContent = str_replace(array('<select>', '</select>'), '', $htmlContent);
        
        // массив складов
        $warehouses = array();
        
        // массив контента
        $arrContent = preg_split("/<option value = '/", $htmlContent);
        foreach($arrContent as $rowContent) {
            
            // если нет строки перейти к след итерации уикла
            if (!$rowContent) {
                continue;
            }
            
            // преобразовать строку в массив
            $rowArr = preg_split('/(\'>)/', $rowContent);
            
            // ID склада на стороне ТК
            $whId = trim((string)$rowArr[0]);
            // название склада
            $whName = trim(str_replace("</option>", "", $rowArr[1]));
            // название города
            $cityName = trim(substr($whName, 0, strpos($whName, '(')));
            
            // вырезать адрес без первой скобки
            $whAddress = substr($whName, strpos($whName, '(')+1);
            // вырезать адрес без последней скобки
            $whAddress = substr($whAddress, 0, strrpos($whAddress, ')'));
            
            // сохранить в массиве складов
            $warehouses[$whId] = array(
                'id' => $whId,
                'cityName' => $cityName,
                'nameTk' => $whName,
                'address' => $whAddress,
            );
        }
        
        // выполнить синхронизацию городов 
        $this->processSync($warehouses, $output);
    }
    
    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
    {
        
        // выполнить синхронизацию городов
        $this->processSyncCities($responseArray, $output);
        
        // выполнить синхронизацию складов
        // массив складов == массиву городов, 
        // для атолюкс нет интерфейса получения городов
        $this->processSyncWarehouses($responseArray, $output);
    }
    
    /**
     * выполнить синхронизацию городов
     * @param array $responseArray - масив городов
     * @param OutputInterface $output
     */
    protected function processSyncCities(array $responseArray, OutputInterface $output)
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
            $businessKey = trim($tkCity['id']);
            if (in_array($businessKey, array_keys($dsCities))) {
                // удаляем из массива городов 
                // оставшиеся города в массиве будут удалены, по ним ТК не работает
                unset($dsCities[$businessKey]);
                
            } else {
                // в ds нет города 
                // добавить новый город 
                $cityTkName = trim((string)$tkCity['nameTk']);
                
                $dsCity = new City();
                $dsCity->setDelivery($this->getDelivery());
                $dsCity->setBusinessKey($businessKey);
                $dsCity->setNameTk($cityTkName);
                $dsCity->setName($cityTkName);
                
                // автоподвязка к эталонному городу
                $geoCityId = array_search($tkCity['cityName'], $geoCities);
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
        $output->write('Синхронизация городов ТК "АвтоЛюкс" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
    /**
     * выполнить синхронизацию складов
     * @param array $responseArray - масив складов
     * @param OutputInterface $output
     */
    protected function processSyncWarehouses(array $responseArray, OutputInterface $output)
    {
        // получить прогресс
        $progress = $this->getHelperSet()->get('progress');
        $progress->start($output, count($responseArray));
        
        // получить города DS
        // ключ массива ID города на стороне ТК
        $dsCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city.id, city.businessKey, city.name')
            ->from('NitraDeliveryBundle:City', 'city', 'city.businessKey')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->getArrayResult();
        
        // получить склады DS
        $dsWarehouses = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('w.id, w.businessKey, w.name')
            ->from('NitraDeliveryBundle:Warehouse', 'w', 'w.businessKey')
            ->where('w.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->getArrayResult();
        
        // обойти массив ответа
        foreach($responseArray as $tkWh) {
            
            // если не указан адрес склада 
            // то адрес равер названию в ТК 
            if (!$tkWh['address']) {
                $tkWh['address'] = $tkWh['nameTk'];
            }
            
            // проверить существует ли склад в DS
            $businessKey = (string)$tkWh['id'];
            if (!isset($dsWarehouses[$businessKey])) {
                // склад в DS не существует
                // создать новый склад
                $dsWarehouse = new Warehouse();
                $dsWarehouse->setDelivery($this->getDelivery());
                $dsWarehouse->setBusinessKey($businessKey);
                $dsWarehouse->setNameTk(trim((string)$tkWh['nameTk']));
                
                // запомнить для сохранения
                $this->getEntityManager()->persist($dsWarehouse);
                
            } else {
                // склад в DS сушествует 
                // получить склад
                $dsWarehouse = $this->getEntityManager()->getReference('NitraDeliveryBundle:Warehouse', $dsWarehouses[$businessKey]['id']);
                
                // удаляем из массива складов 
                // оставшиеся склады в массиве будут удалены, по ним ТК не работает
                unset($dsWarehouses[$businessKey]);
            }
            
            // массив сравнения склада ТК 
            $tkWhCompare = serialize(array(
               trim((string)$tkWh['id']),
               trim((string)$tkWh['nameTk']),
               trim((string)$tkWh['address']),
            ));
            
            // массив сравнения склада DS
            $dsWhCompare = serialize(array(
                (string)$dsWarehouse->getBusinessKey(),
                (string)$dsWarehouse->getNameTk(),
                (string)$dsWarehouse->getAddress(),
            ));

            // сравнить склад ТК и склад DS
            if ($tkWhCompare != $dsWhCompare) {
                
                

                
                // идентификатор города на стороне ТК 
                $businessKey = trim((string)$tkWh['id']);
                
                // установить город склада
                if (isset($dsCities[$businessKey])) {
                    $dsWarehouse->setCity($this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$businessKey]['id']));
                }
                
                // наполнить склад DS данными
                $dsWarehouse->setName('АвтоЛюкс - '.(string)$tkWh['address']);
                $dsWarehouse->setNameTk((string)$tkWh['nameTk']);
                $dsWarehouse->setAddress((string)$tkWh['address']?:$tkWh['nameTk']);
            }
            
            // обновить прогресс
            $progress->advance();
        }
        
        // склады не пришли в синхронизации
        // ТК не работает с оставшимися складами
        if ($dsWarehouses) {
            // получить удаляемые склады для ТК
            // если удаляем через createQueryBuilder()->delete()
            // то не срабатывет SoftDeletable, запись удаялется физически из БД
            $warehousesDelete = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:Warehouse')
                ->createQueryBuilder('w')
                ->where('w.businessKey IN(:ids)')->setParameter('ids', array_keys($dsWarehouses))
                ->andWhere('w.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
                ->getQuery()
                ->execute();
            // удалить склады которые не пришли в синхронизации 
            foreach($warehousesDelete as $wh) {
                $this->getEntityManager()->remove($wh);
            }
        }
        
        // сохранить склады
        $this->getEntityManager()->flush();
        
        // Синхронизация завершена
        $output->write(' ');
        $output->write('Синхронизация складов ТК "АвтоЛюкс" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
    
}