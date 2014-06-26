<?php
namespace Nitra\SyncronizeBundle\Command\Meestexpress;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\Meestexpress\MeestexpressSync;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * MeestexpressSyncWarehousesCommand
 * Синхронизация складов для ТК Мист Експресс
 */
class MeestexpressSyncWarehousesCommand extends MeestexpressSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:meestexpress:sync-warehouses')
            ->setDescription('Синхронизация складов ТК "Мист Експресс".')
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
        // получить массив городов ТК
        // array( businessKey => name )
        $dsCities = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:City')
            ->createQueryBuilder('city')
            ->select('city.businessKey, city.businessKey')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->execute(array(), 'KeyPair');
        
        // если не найдены города
        if (!$dsCities) {
            throw new \Exception('В первую очередь необходимо выполнить синхронизацию городов.');
        }
        
        // запрос получения городов для страны
        return $this->getXmlQuery('Branch', "CityUUID IN ('".implode("', '", $dsCities)."')");
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlXpath()
    {
        return 'result_table/items';
    }
    
    /**
     * Получить улицу
     * @param string $uuid - ID улицы в ТК 
     * @return mixed 
     *              SimpleXMLElement    - данные улицы ответ сервера ТК
     *              null                - улица нее найдена
     */
    protected function getTkStreet($uuid)
    {
        // запрос получения улиц для 
        $xml = $this->getXmlQuery('Address', 'uuid = "'.$uuid.'"');
        // отправить xml запрос на сервер
        $apiResponse = $this->apiSendRequest('1C_Query.php', $xml, $this->getXmlXpath());
        
        // проверить полученные данные 
        if ($apiResponse && isset($apiResponse[0]) && $apiResponse[0]) {
            // вернуть улицу 
            return $apiResponse[0];
        }
        
        // улица не найдена
        return null;
    }

    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
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
            
//            // номер склада в городе
//            $whNumber = null;
//            // проверить если название отдела содержит номер
//            // номер начиается с "мв№" и может заканчиваеться символом не цифра
//            // вырезать номер раздела
//            $descriptionUA = trim((string)$tkWh->DescriptionUA);
//            $numberNeedle = 'мв№';
//            // если название содержит номер
//            if (stristr($descriptionUA, $numberNeedle)) {
//                // вырезать из строки флаг номера
//                $descriptionUA = substr($descriptionUA, strlen($numberNeedle));
//                // начианая с первого символа 
//                // до первого символа не цифра есть номер отдела
//                $whNumber = '';
//                for($i=0; $i<=strlen($descriptionUA); $i++) {
//                    $symbol = $descriptionUA[$i];
//                    $whNumber .= $symbol;
//                    // нмли символ не цифра прервать получение номера 
//                    if (!is_numeric($symbol)) {
//                        break;
//                    }
//                }
//            }
            
            // адрес склада
            $whAddress = '';
            
            // получить улицу
            $street = $this->getTkStreet((string)$tkWh->StreetUUID);
            if ($street) {
                // адрес склада берем из данных улицы
                
                // добавить тип улицы
                $whAddress .= (trim((string)$street->StreetTypeRU))
                    ? trim((string)$street->StreetTypeRU)
                    : trim((string)$street->StreetTypeUA);
                
                // добавить название улицы
                $whAddress .= (trim((string)$street->DescriptionRU))
                    ? trim((string)$street->DescriptionRU)
                    : trim((string)$street->DescriptionUA);
            }
            
            // адрес не был сформирован по данным улицы
            if (!$whAddress) {
                // получить улицу из данных склада
                $whAddress .= (trim((string)$tkWh->StreetDescriptionRU))
                    ? trim((string)$tkWh->StreetDescriptionRU)
                    : trim((string)$tkWh->StreetDescriptionUA);
            }
            
            // добавить номер дома
            $whAddress .= (trim((string)$tkWh->House))
                ? ' '.trim((string)$tkWh->House)
                : '';
            
            // добавить номер офиса
            $whAddress .= (trim((string)$tkWh->Flat))
                ? ' оф.'.trim((string)$tkWh->Flat)
                : '';
            
            // добавить ограничение по весу 
            $whAddress .= (trim((string)$tkWh->Limitweight))
                ? ' ('.trim((string)$tkWh->Limitweight).'кг.)'
                : '';
            
            // проверить существует ли склад в DS
            $businessKey = (string)$tkWh->UUID;
            if (!isset($dsWarehouses[$businessKey])) {
                // склад в DS не существует
                // создать новый склад
                $dsWarehouse = new Warehouse();
                $dsWarehouse->setDelivery($this->getDelivery());
                $dsWarehouse->setBusinessKey($businessKey);
                $dsWarehouse->setNameTk($whAddress);
                
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
                trim((string)$tkWh->UUID),
                trim((string)$tkWh->CityUUID),
                trim((string)$tkWh->DescriptionUA),
                trim((string)$whAddress),
            ));
            
            // массив сравнения склада DS
            $dsWhCompare = serialize(array(
                (string)$dsWarehouse->getBusinessKey(),
                (string)(($dsWarehouse->getCity()) ? $dsWarehouse->getCity()->getBusinessKey() : null),
                (string)$dsWarehouse->getNameTk(),
                (string)$dsWarehouse->getAddress(),
            ));
            
            // сравнить склад ТК и склад DS
            if ($tkWhCompare != $dsWhCompare) {
                // идентификатор города на стороне ТК 
                $businessKey = trim((string)$tkWh->CityUUID);
                
                // установить город склада
                if (isset($dsCities[$businessKey])) {
                    $dsWarehouse->setCity($this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$businessKey]['id']));
                }
                
                // наполнить склад DS данными
                $dsWarehouse->setName('Мист Експресс - '.(string)$whAddress);
                $dsWarehouse->setNameTk((string)$tkWh->DescriptionUA);
                $dsWarehouse->setAddress((string)$whAddress);
                $dsWarehouse->setLatitude((string)$tkWh->Latitude);
                $dsWarehouse->setLongitude((string)$tkWh->Longitude);
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
        $output->write('Синхронизация складов ТК "Мист Експресс" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
}