<?php
namespace Nitra\SyncronizeBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\NovaposhtaSync;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * NovaposhtaSyncWarehousesCommand
 * Синхронизация складов для ТК Новая Почта
 */
class NovaposhtaSyncWarehousesCommand extends NovaposhtaSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('novaposhta:sync-warehouses')
            ->setDescription('Синхронизация складов ТК "Новая Почта".')
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
        
        // Синхронизация завершена
        $output->writeln(date('Y-m-d H:i'). ' - Синхронизация складов ТК "Новая Почта" завершена успешно.');
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
            
            // проверить существует ли склад в DS
            $businessKey = (string)$tkWh->wareId;
            if (!isset($dsWarehouses[$businessKey])) {
                // склад в DS не существует
                // создать новый склад
                $dsWarehouse = new Warehouse();
                $dsWarehouse->setDelivery($this->getDelivery());
                $dsWarehouse->setBusinessKey($businessKey);
                $dsWarehouse->setNameTk(trim((string)$tkWh->addressRu));
                
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
               trim((string)$tkWh->wareId),
               trim((string)$tkWh->number),
               trim((string)$tkWh->city_id),
               trim((string)$tkWh->addressRu),
               trim((string)$tkWh->phone),
               trim((string)$tkWh->y),
               trim((string)$tkWh->x),
            ));
            
            // массив сравнения склада DS
            $dsWhCompare = serialize(array(
                (string)$dsWarehouse->getBusinessKey(),
                (string)$dsWarehouse->getNumber(),
                (string)(($dsWarehouse->getCity()) ? $dsWarehouse->getCity()->getId() : null),
                (string)$dsWarehouse->getNameTk(),
                (string)$dsWarehouse->getPhone(),
                (string)$dsWarehouse->getLatitude(),
                (string)$dsWarehouse->getLongitude(),
            ));
            
            // сравнить склад ТК и склад DS
            if ($tkWhCompare != $dsWhCompare) {
                
                // идентификатор города на стороне ТК 
                $businessKey = trim((string)$tkWh->city_id);
                
                // установить город склада
                if (isset($dsCities[$businessKey])) {
                    $dsWarehouse->setCity($this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$businessKey]['id']));
                }
                
                // наполнить склад DS данными
                $dsWarehouse->setNumber(trim((string)$tkWh->number));
                $dsWarehouse->setName(trim((string)$tkWh->addressRu));
                $dsWarehouse->setNameTk(trim((string)$tkWh->addressRu));
                $dsWarehouse->setAddress(trim((string)$tkWh->addressRu));
                $dsWarehouse->setPhone(trim((string)$tkWh->phone));
                $dsWarehouse->setLatitude(trim((string)$tkWh->y));
                $dsWarehouse->setLongitude(trim((string)$tkWh->x));
            }
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
    }
    
}