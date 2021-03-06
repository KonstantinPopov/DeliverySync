<?php
namespace Nitra\SyncronizeBundle\Command\Novaposhta;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\SyncronizeBundle\Command\Novaposhta\NovaposhtaSync;
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
            
            // адрес склада берем по умолчанию русское значение
            $whAddress = trim((string)$tkWh->addressRu);
            if (!$whAddress) {
                // нет русского значения берем то что есть
                $whAddress = trim((string)$tkWh->address);
            }
                        
            // проверить существует ли склад в DS
            $businessKey = (string)$tkWh->wareId;
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
               trim((string)$tkWh->wareId),
               trim((string)$tkWh->number),
               trim((string)$tkWh->city_id),
               trim((string)$whAddress),
               trim((string)$tkWh->phone),
            ));
            
            // массив сравнения склада DS
            $dsWhCompare = serialize(array(
                (string)$dsWarehouse->getBusinessKey(),
                (string)$dsWarehouse->getNumber(),
                (string)(($dsWarehouse->getCity()) ? $dsWarehouse->getCity()->getBusinessKey() : null),
                (string)$dsWarehouse->getNameTk(),
                (string)$dsWarehouse->getPhone(),
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
                $dsWarehouse->setNumber((string)$tkWh->number);
                $dsWarehouse->setName('Новая почта - '.(string)$whAddress);
                $dsWarehouse->setNameTk((string)$whAddress);
                $dsWarehouse->setAddress((string)$whAddress);
                $dsWarehouse->setPhone((string)$tkWh->phone);
                $dsWarehouse->setLatitude((string)$tkWh->y);
                $dsWarehouse->setLongitude((string)$tkWh->x);
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
        $output->write('Синхронизация складов ТК "Новая Почта" завершена успешно.');
        // завершить прогресс
        $progress->finish();
    }
    
}