<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;
use Nitra\DeliveryBundle\Entity\Warehouse as DeliveryWarehouse;

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
        // обойти массив ответа
        foreach($responseArray as $wh) {
            
            // получить город для склада
            $dsCity = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:City')
                ->findOneBy(array(
                    'cityCode' => (string)$wh->city_id,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // получить склад
            $dsWarehouse = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:Warehouse')
                ->findOneBy(array(
                    'warehouseCode' => (string)$wh->wareId,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // склад не найден, создать склад
            if (!$dsWarehouse) {
                $dsWarehouse = new DeliveryWarehouse();
            }
            
            // установить данные 
            $dsWarehouse->setDelivery($this->getDelivery());
            $dsWarehouse->setWarehouseCode((string)$wh->wareId);
            
            $dsWarehouse->setCity($dsCity);
            $dsWarehouse->setName((string)$wh->addressRu);
            $dsWarehouse->setAddress((string)$wh->addressRu);
            $dsWarehouse->setPhone((string)$wh->phone);
            $dsWarehouse->setLongitude((string)$wh->x);
            $dsWarehouse->setLatitude((string)$wh->y);
            
            // запомнить для сохранения
            $this->getEntityManager()->persist($dsWarehouse);
        }
        
        // сохранить склады
        $this->getEntityManager()->flush();
    }
    
}