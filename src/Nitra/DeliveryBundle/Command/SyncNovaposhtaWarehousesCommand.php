<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * SyncNovaposhtaWarehousesCommand
 * Синхронизация складов для ТК Новая Почта
 */
class SyncNovaposhtaWarehousesCommand extends SyncNovaposhta
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('novaposhta:sync-warehouses')
            ->setDescription('Синхронизировать склады ТК "Новая Почта"')
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
                <warenhouse/>
            </file>';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlXpath()
    {
        return '/response/result/whs/warenhouse';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
    {
        
        // получить города ТК
        $dsCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city')
            ->from('NitraDeliveryBundle:City', 'city', 'city.cityCode')
            ->getQuery()
            ->execute();
        
        // получить склады ТК
        $dsWarehouses = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:Warehouse')
            ->findBy(array(
                'delivery' => $this->getDelivery()
            ));
        
        // массив cравнения складов
        // array( warehouseCode => serialize array(city_id, name, address, phone, latitude, longitude) )
        $dsWhCompare = array();
        foreach($dsWarehouses as $dsWh) {
            $dsWhCompare[$dsWh->getWarehouseCode()] = serialize(array(
                $dsWh->getWarehouseCode(),
                $dsWh->getNumber(),
                $dsWh->getCity()->getId(),
                $dsWh->getName(),
                $dsWh->getAddress(),
                $dsWh->getPhone(),
                $dsWh->getLongitude(),
                $dsWh->getLatitude(),
            ));
        }
        
        // обойти массив ответа
        foreach($responseArray as $tkWh) {
            
            // массив сравнения склада ТК 
            $tkWhCompare = serialize(array(
               (string)$tkWh->wareId,
               (string)$tkWh->number,
               (string)$tkWh->city_id,
               (string)$tkWh->addressRu,
               (string)$tkWh->addressRu,
               (string)$tkWh->phone,
               (string)$tkWh->x,
               (string)$tkWh->y,
            ));
            
            // флаг обновлять ли склад
            $allowUpdateWarehouse = false;
            
            
            if (!isset($dsWhCompare[$tkWh->wareId]) ||
                $dsWhCompare[$tkWh->wareId] != $tkWhCompare
            ) {
                
            }
            
            
            print "\n"; print_r($tkWh); print "\n";
//            print "\n"; print_r($dsWhCompare[$tkWh->wareId]); print "\n";
            print "\n"; print_r($tkWhCompare); print "\n";
            die;
            
            
            
//            $warehouse = new Warehouse();
//            $warehouse->setDelivery($this->getDelivery());
//            $warehouse->setWarehouseCode((string)$tkWh->wareId);
////            $dsWarehouse->setCity($dsCity);
//            $warehouse->setName((string)$tkWh->addressRu);
//            $warehouse->setAddress((string)$tkWh->addressRu);
//            $warehouse->setPhone((string)$tkWh->phone);
//            $warehouse->setLongitude((string)$tkWh->x);
//            $warehouse->setLatitude((string)$tkWh->y);
            
            
            // проверить существует ли склад в городах ТК 
            $tkWhId = (string)$tkWh->wareId;
            if (in_array($tkWhId, array_keys($dsCities))) {
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
                    $city->setName((string)$tkCity->nameRu .' ('.(string)$tkCity->parentCityNameRu.')');
                }
                
                // запомнить для сохранения
                $this->getEntityManager()->persist($city);                
            }            
            
        }
        
        
        
        
////        // получить массив складов ТК
////        // array( warehouseCode => array(city_id, name, address, phone, latitude, longitude) )
////        $dsWarehouses = $this->getEntityManager()
////            ->createQueryBuilder()
////            ->select('wh')
////            ->from('NitraDeliveryBundle:Warehouse', 'wh', 'wh.warehouseCode')
////            ->where('wh.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
////            ->getQuery()
////            ->getArrayResult();
//        
//        // обойти массив ответа
//        foreach($responseArray as $tkWarehouse) {
//            
//            print "\n"; print_r($tkWarehouse); print "\n";
//            die;
//            
//            // проверить существует ли склад в складах ТК 
//            $tkWarehouseId = (string)$tkWarehousewareId;
//            
//            
//            // получить город для склада
//            $dsCity = $this->getEntityManager()
//                ->getRepository('NitraDeliveryBundle:City')
//                ->findOneBy(array(
//                    'cityCode' => (string)$wh->city_id,
//                    'delivery' => $this->getDelivery(),
//                    ));
//            
//            // получить склад
//            $dsWarehouse = $this->getEntityManager()
//                ->getRepository('NitraDeliveryBundle:Warehouse')
//                ->findOneBy(array(
//                    'warehouseCode' => (string)$wh->wareId,
//                    'delivery' => $this->getDelivery(),
//                    ));
//            
//            // склад не найден, создать склад
//            if (!$dsWarehouse) {
//                $dsWarehouse = new DeliveryWarehouse();
//            }
//            
//            // установить данные 
//            $dsWarehouse->setDelivery($this->getDelivery());
//            $dsWarehouse->setWarehouseCode((string)$wh->wareId);
//            
//            $dsWarehouse->setCity($dsCity);
//            $dsWarehouse->setName((string)$wh->addressRu);
//            $dsWarehouse->setAddress((string)$wh->addressRu);
//            $dsWarehouse->setPhone((string)$wh->phone);
//            $dsWarehouse->setLongitude((string)$wh->x);
//            $dsWarehouse->setLatitude((string)$wh->y);
//            
//            // запомнить для сохранения
//            $this->getEntityManager()->persist($dsWarehouse);
//        }
//        
//        // сохранить склады
//        $this->getEntityManager()->flush();
    }
    
}