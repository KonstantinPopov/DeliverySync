<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;

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
        foreach($responseArray as $tkWarehouse) {
            
//            // город в DS по ID ТК 
//            $dsCity = $this->getEntityManager()
//                ->getRepository('NitraDeliveryBundle:DeliveryCity')
//                ->findOneBy(array(
//                    'cityCode' => $tkCity->id
//                ));
            
//            print "\n";            var_dump((string)$tkCity->id); print "\n";
//            print "\n";            var_dump(get_class_methods($tkCity)); print "\n";
            print "\n"; print_r($tkWarehouse); print "\n";
            die;
            
        }
        
        print "\n"; print_r($responseArray); print "\n";
    }
    
}