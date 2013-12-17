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
                <auth>' . $this->getParameter('apiToken') . '</auth>
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
        // ключ массива ID города на стороне ТК
        $dsCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city.id, city.cityCode, city.name')
            ->from('NitraDeliveryBundle:City', 'city', 'city.cityCode')
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->getArrayResult();
        
        // получить склады DS
        $dsWarehouses = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('w.id, w.warehouseCode, w.name')
            ->from('NitraDeliveryBundle:Warehouse', 'w', 'w.warehouseCode')
            ->where('w.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
            ->getQuery()
            ->getArrayResult();
        
        // обойти массив ответа
        foreach($responseArray as $tkWh) {
            
            // идентификатор склада на стороне ТК 
            $tkWarehouseId = (string)$tkWh->wareId;
            
            // проверить существует ли склад в DS
            if (!isset($dsWarehouses[$tkWarehouseId])) {
                // склад в DS не существует
                // создать новый склад
                $dsWarehouse = new Warehouse();
                $dsWarehouse->setDelivery($this->getDelivery());
                $dsWarehouse->setWarehouseCode($tkWarehouseId);
                
                // запомнить для сохранения
                $this->getEntityManager()->persist($dsWarehouse);
                
            } else {
                // склад в DS сушествует 
                // получить склад
                $dsWarehouse = $this->getEntityManager()->getReference('NitraDeliveryBundle:Warehouse', $dsWarehouses[$tkWarehouseId]['id']);
                
                // удаляем из массива городов 
                // оставшиеся города в массиве будут удалены, по ним ТК не работает
                unset($dsWarehouses[$tkWarehouseId]);
            }
            
            // массив сравнения склада ТК 
            $tkWhCompare = serialize(array(
               (string)$tkWh->wareId,
               (string)$tkWh->number,
               (string)$tkWh->city_id,
               (string)$tkWh->addressRu,
               (string)$tkWh->addressRu,
               (string)$tkWh->phone,
               (string)$tkWh->y,
               (string)$tkWh->x,
            ));
            
            // сравнить склад ТК и склад DS
            if ($tkWhCompare != $dsWarehouse->getSyncCompare()) {
                
                // идентификатор города на стороне ТК 
                $tkCityId = (string)$tkWh->city_id;
                
                // установить город склада
                if (isset($dsCities[$tkCityId])) {
                    $dsWarehouse->setCity($this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$tkCityId]['id']));
                }
                
                // наполнить склад DS данными
                $dsWarehouse->setNumber((string)$tkWh->number);
                $dsWarehouse->setName((string)$tkWh->addressRu);
                $dsWarehouse->setAddress((string)$tkWh->addressRu);
                $dsWarehouse->setPhone((string)$tkWh->phone);
                $dsWarehouse->setLatitude((string)$tkWh->y);
                $dsWarehouse->setLongitude((string)$tkWh->x);
            }
        }
        
        // склады не пришли в синхронизации
        // ТК не работает с оставшимися складами
        if ($dsWarehouses) {
            // получить удаляемые города для ТК
            // если удаляем через ->delete('NitraDeliveryBundle:Warehouse', 'w')
            // то не срабатывет SoftDeletable, запись удаялется физически из БД
            $warehousesDelete = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:Warehouse')
                ->createQueryBuilder('w')
                ->where('w.warehouseCode IN(:ids)')->setParameter('ids', array_keys($dsWarehouses))
                ->andWhere('w.delivery = :delivery')->setParameter('delivery', $this->getDelivery())
                ->getQuery()
                ->execute();
            // удалить города которые не пришли в синхронизации 
            foreach($warehousesDelete as $wh) {
                $this->getEntityManager()->remove($wh);
            }
        }
        
        // сохранить склады
        $this->getEntityManager()->flush();
    }
    
}