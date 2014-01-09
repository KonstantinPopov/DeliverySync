<?php
namespace Nitra\SyncronizeBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\IntimeSync;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * IntimeSyncWarehousesCommand
 * Синхронизация складов для ТК ИнТайм
 */
class IntimeSyncWarehousesCommand extends IntimeSync
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('intime:sync-warehouses')
            ->setDescription('Синхронизация складов ТК "ИнТайм".')
        ;
    }
    
    /**
     * Выполнить команду
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // отправить xml запрос на сервер
        $apiResponse = $this->apiSendRequest('GetListCitiesExt', '/Cities/City', null);
        
        // выполнить синхронизацию
        $this->processSync($apiResponse, $output);
        
        // Синхронизация завершена
        $output->writeln(date('Y-m-d H:i'). ' - Синхронизация складов ТК "ИнТайм" завершена успешно.');
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
        foreach($responseArray as $tkCity) {
            
            // проверить кол-во складов в городе
            if ((string)$tkCity->QuantityWarehouses > 1) {
                $tkWarehouses = $tkCity->Warehouse;
            } else {
                $tkWarehouses = array($tkCity->Warehouse);
            }
            
            // обойти склады в городе
            foreach($tkWarehouses as $tkWh) {
                
                // проверить если пустой обект то перети к след итерации
                if (empty($tkWh)) {
                    continue;
                }
                
                // проверить существует ли склад в DS
                $businessKey = trim((string)$tkWh->Code);
                if (!isset($dsWarehouses[$businessKey])) {
                    // склад в DS не существует
                    // создать новый склад
                    $dsWarehouse = new Warehouse();
                    $dsWarehouse->setDelivery($this->getDelivery());
                    $dsWarehouse->setBusinessKey($businessKey);
                    $dsWarehouse->setNameTk((string)$tkWh->Name);
                    
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
                   trim((string)$tkWh->Code),
                   trim((string)$tkWh->Number),
                   trim((string)$tkWh->Name),
                   trim((string)$tkWh->Adress),
                   trim((string)$tkWh->Phone),
                ));
                
                // массив сравнения склада DS
                $dsWhCompare = serialize(array(
                    (string)$dsWarehouse->getBusinessKey(),
                    (string)$dsWarehouse->getNumber(),
                    (string)$dsWarehouse->getNameTk(),
                    (string)$dsWarehouse->getAddress(),
                    (string)$dsWarehouse->getPhone(),
                ));
                
                // сравнить склад ТК и склад DS
                if ($tkWhCompare != $dsWhCompare) {
                    
                    // идентификатор города на стороне ТК 
                    $businessKey = trim((string)$tkWh->Code);

                    // установить город склада
                    if (isset($dsCities[$businessKey])) {
                        $dsWarehouse->setCity($this->getEntityManager()->getReference('NitraDeliveryBundle:City', $dsCities[$businessKey]['id']));
                    }

                    // наполнить склад DS данными
                    $dsWarehouse->setNumber((string)$tkWh->Number);
                    $dsWarehouse->setName('ИнТайм - '.(string)$tkWh->Adress);
                    $dsWarehouse->setNameTk((string)$tkWh->Name);
                    $dsWarehouse->setAddress((string)$tkWh->Adress);
                    $dsWarehouse->setPhone((string)$tkWh->Phone);
                }
                
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