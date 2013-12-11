<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Command\SyncNovaposhta;

/**
 * SyncNovaposhtaCitiesCommand
 * Синхронизация городов для ТК Новая Почта
 */
class SyncNovaposhtaCitiesCommand extends SyncNovaposhta
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('novaposhta:sync-cities')
            ->setDescription('Синхронизировать города ТК "Новая Почта"')
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
                <city/>
            </file>';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function getXmlXpath()
    {
        return '/response/result/cities/city';
    }
    
    /**
     * {@inheritDoc}
     */
    protected function processSync(array $responseArray, OutputInterface $output)
    {
        
        // обойти массив ответа
        foreach($responseArray as $tkCity) {
            
            // город в DS по ID ТК 
            $dsCity = $this->getEntityManager()
                ->getRepository('NitraDeliveryBundle:City')
                ->findOneBy(array(
                    'cityCode' => (string)$tkCity->id,
                    'delivery' => $this->getDelivery(),
                    ));
            
            // город не найден
            if (!$dsCity) {
                // поиск по названию 
                $dsCity = $this->getEntityManager()
                    ->getRepository('NitraDeliveryBundle:City')
                    ->findOneBy(array(
                        'name' => (string)$tkCity->nameRu,
                        ));
            }
            
            // город не найден создать новый
            if (!$dsCity) {
                $dsCity = new \Nitra\DeliveryBundle\Entity\City();
            }
            
            // установить данные города
            $dsCity->setDelivery($this->getDelivery());
            $dsCity->setCityCode((string)$tkCity->id);
            $dsCity->setName((string)$tkCity->nameRu);
            
            // запомнить для сохранения
            $this->getEntityManager()->persist($dsCity);
        }
        
        // сохранить
        $this->getEntityManager()->flush();
    }
    
}