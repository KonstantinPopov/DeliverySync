<?php

namespace Nitra\DeliveryCostBundle\Command; 

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Nitra\DeliveryCostBundle\Entity\NovaposhtaZone; 


class NovaposhtaTarifZonesCommand extends ContainerAwareCommand 
{
    
    static $task_status = 'started'; // 'started', 'aborted', 'done', 're_execute'
    
    static $task_name = 'novaPoshtaTarif:zones';
    
    static $em = NULL; 
    
    static $task_log_path = NULL;
    
    static $re_execute_path = NULL;
    
    private $api = 'eaef11faf4f803367bb194f84180c5b8';
   
    protected function configure() 
    {
        $this->setName(self::$task_name)
             ->addArgument('status', InputArgument::OPTIONAL,
                'If the task was restarted by itself'
            );
    }
    
    // в случае возникновения перехватываемых ошибок
    public static function exception_handler($errno, $errstr, $errfile, $errline) 
    {
        $task_log = fopen(self::$task_log_path, 'a');
        $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" прервался из-за следующей ошибки:' ."\n";
        $msg .= $errstr . ' в файле: ' . $errfile . ' на строчке: ' . $errline . "\n******************************\n";
        fwrite($task_log, $msg); 
        fclose($task_log);
        
        self::$task_status = 'aborted';
        die();
        
    }
    
    // метод, который выполняется при завершении скрипта
    public function data_backup()
    {
        if(self::$task_status == 'started' || self::$task_status == 'aborted') {
            // если есть хоть одна запись со статусом "OLD", значит таск начал писать данные в БД
            $query = self::$em->createQuery("
                    SELECT p.id 
                    FROM NitraDeliveryCostBundle:NovaposhtaZone p
                    WHERE p.update_status = 'OLD'
                ")
                ->setMaxResults(1)
                ->getResult();

            // удаляем все новые записи, а старые переименовываем назад
            if($query) {            
                self::$em->createQuery("
                    DELETE
                    FROM NitraDeliveryCostBundle:NovaposhtaZone p
                    WHERE p.update_status IS NULL
                ")
                ->execute();

                self::$em->createQuery("
                    UPDATE 
                    NitraDeliveryCostBundle:NovaposhtaZone p 
                    SET p.update_status IS NULL
                ")
                ->execute();
            }
            
            if(self::$task_status == 'started') {
                $task_log = fopen(self::$task_log_path, 'a');
                $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" прервался. Ошибка неизвестна' ."\n******************************\n";
                fwrite($task_log, $msg); 
                fclose($task_log);
            }
        }
        if(self::$task_status == 're_execute') {
            // перезапуск скрипта
            passthru(self::$re_execute_path);
        }
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        try {

            self::$re_execute_path = 'php ' . strstr(__DIR__, 'src', TRUE) . 'app/console ' . self::$task_name . ' re_execute';

            self::$task_log_path = strstr(__DIR__, 'src', TRUE)."web/task.log";
            
            self::$em = $this->getContainer()->get('doctrine')->getEntityManager();
            
            self::$task_status = ($input->getArgument('status') == 're_execute') ? 're_execute' : self::$task_status;

            register_shutdown_function(array($this, 'data_backup'));
            set_error_handler('SELF::exception_handler', E_ALL);

            // запись начала/продолжения выполнения таска в лог
            if(self::$task_status == 'started') {
//                var_dump('запустили 1-й раз');
                $task_log = fopen(self::$task_log_path, 'a');
                $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" запущен' ."\n";
                fwrite($task_log, $msg); 
                fclose($task_log);

                // делаем бекапы старых значений на время работы скрипта (переименование всех записей на status = OLD)
                self::$em->createQuery("
                        UPDATE NitraDeliveryCostBundle:NovaposhtaZone p 
                        SET p.update_status = 'OLD'
                    ")
                    ->execute();
            }
            else { // таск был перезапущен сам собой
                self::$task_status = 'started';
            }

            // выбираем массив городов (в случае если таск оборвался)
            $cities = self::$em->createQuery('
                    SELECT MAX(p.id) as last_insert, 
                    c.id as id
                    FROM NitraDeliveryCostBundle:NovaposhtaZone p
                    JOIN p.from_city c
                    WHERE p.update_status IS NULL
                    GROUP BY c.id
                    ORDER BY p.id
                ')
                ->getArrayResult();

            $cities_saved = array();        

            // преобразование в удобный массив для сравнения 
            if($cities) { // если выполнение таска обрывалось
                $max_id = 1;
                foreach ($cities as $city) {
                    // также удаляем из массива последний записаный from_city, так как на нем оборвалась запись и он мог не дописатся  
                    if($city['last_insert'] > $max_id) {
                        $max_id = $city['last_insert'];
                        $city_for_delete = $city['id']; // хранит from_city, которое также надо удалить из базы 
                    }

                    $cities_saved[$city['id']] = $city['id']; 
                }
    //            echo $city_for_delete." - del\n"; 
                unset($cities_saved[$city_for_delete]);

                // удаляем недозаписанные данные из базы
                self::$em->createQuery('
                        DELETE FROM NitraDeliveryCostBundle:NovaposhtaZone p 
                        WHERE p.from_city = :from_city
                        AND p.update_status IS NULL')
                    ->setParameter('from_city', $city_for_delete)
                    ->execute();
            }

            // массив всех городов с таблицы delivery_city // для xml-запроса на новую почту
            $cities = self::$em->createQuery('
                    SELECT p 
                    FROM NitraDeliveryBundle:DeliveryCity p
                    JOIN p.city c
                    ORDER BY p.id
                ')
                ->getResult(); 

            //новая почта присылает ответ с учётом коммисии, поэтому его надо будет потом отнять от результата
            $commission = self::$em->createQuery("
                    SELECT p.min_commission, p.registration_cost
                    FROM NitraDeliveryBundle:DeliveryService p
                    WHERE p.name = 'Новая почта'
                ")
                ->getSingleResult();

            $insert_iteration = 0; 
            foreach($cities as $city_from) {
                if($insert_iteration > 100) { //перезапуск после каждых 100 городов (из 700)
                    self::$task_status = 're_execute';
                    break;
                }
                if(!isset($cities_saved[$city_from->getCity()->getId()])) { 
                    foreach($cities as $city_to) { 
//                        echo 'city_from: ' . $city_from->getName() . '  city_to: ' . $city_to->getName() . " : " . $city_from->getCity()->getId() . "\n";
                        $xml_content = '<?xml version="1.0" encoding="UTF-8"?>';
                        $xml_content.= '<file>';
                        $xml_content.= '<auth>' . $this->api . '</auth>';
                        $xml_content.= '<countPrice>';
                        $xml_content.= '<senderCity>' . $city_from->getName() . '</senderCity>';
                        $xml_content.= '<recipientCity>' . $city_to->getName() . '</recipientCity>';
                        $xml_content.= '<mass>1</mass>';
                        $xml_content.= '<height></height>';
                        $xml_content.= '<width></width>';
                        $xml_content.= '<depth></depth>';
                        $xml_content.= '<publicPrice></publicPrice>';
                        $xml_content.= '<deliveryType_id>4</deliveryType_id>';
                        $xml_content.= '<loadType_id>1</loadType_id>';
                        $xml_content.= '<floor_count></floor_count>';
                        $xml_content.= '<date>' . date('d.m.Y') . '</date>';
                        $xml_content.= '</countPrice>';
                        $xml_content.= '</file>';

                        $response = $this->sendRequest($xml_content);
                        $xml_obj = @simplexml_load_string($response);

                        if($xml_obj) {
                            $record = new NovaposhtaZone();

                            $record->setFromCity($city_from->getCity());
                            $record->setToCity($city_to->getCity());
                            $record->setRate((float)$xml_obj->cost - (float)$commission['min_commission'] - (float)$commission['registration_cost']);

                            self::$em->persist($record);
                            unset($record); 
                        }
                    }
                    $insert_iteration++;
//                    echo $insert_iteration."\n". self::$task_status . "\n";
                }
            }

            self::$em->flush();
//            var_dump('данные сохранены');
            if(self::$task_status == 're_execute') {
                die();
            }

            $this->updateNovaposhtaTarify();
        }
        catch (\Exception $e) {
            $task_log = fopen(self::$task_log_path, 'a');
            $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" прервался из-за следующей ошибки:' ."\n";
            $msg .= $e->getMessage() . ' в файле: ' . $e->getFile() . ' на строчке: ' . $e->getLine() . "\nТрассировка ошибки: " . $e->getTraceAsString() . "\n******************************\n";
            fwrite($task_log, $msg); 
            fclose($task_log);
            self::$task_status = 'aborted';
        }
    }

    public function sendRequest($xml_content) 
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://orders.novaposhta.ua/xml.php');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_content);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;
        }
        catch (\Exception $e) {
            $task_log = fopen(self::$task_log_path, 'a');
            $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" прервался из-за следующей ошибки:' ."\n";
            $msg .= $e->getMessage() . ' в файле: ' . $e->getFile() . ' на строчке: ' . $e->getLine() . "\nТрассировка ошибки: " . $e->getTraceAsString() . "\n******************************\n";
            fwrite($task_log, $msg); 
            fclose($task_log);
            self::$task_status = 'aborted';
        }
    }
    
    protected function updateNovaposhtaTarify() 
    {
        // получаем только что залитые цены для зон 
        try {
            $rates_new = self::$em->createQuery('
                  SELECT p.rate
                  FROM NitraDeliveryCostBundle:NovaposhtaZone p
                  WHERE p.rate IS NOT NULL
                  GROUP BY p.rate
              ')
              ->getArrayResult();

            // получаем все тарифы по новой почте, которые необходимо обновить
            $rates_old = self::$em->createQuery("
                    SELECT p
                    FROM NitraDeliveryCostBundle:NovaposhtaTarify p
                    WHERE p.type ='склад-склад' 
                ")
                ->getResult();

            // обновляем информацию, если тарифы изменились
            foreach($rates_old as $rate_old) {
                if($rate_old->getTarif() != $rates_new[$rate_old->getZoneId() - 1]['rate']) {
                    $rate_old->setTarif($rates_new[$rate_old->getZoneId() - 1]['rate']);
                    self::$em->persist($rate_old);
                }
            }
            self::$em->flush();

            // таск выполнен успешно, можно удалять старые данные
            self::$em->createQuery("
                    DELETE FROM NitraDeliveryCostBundle:NovaposhtaZone p 
                    WHERE p.update_status = 'OLD'
                ")
                ->execute();

            self::$task_status = 'done';
            $task_log = fopen(self::$task_log_path, 'a');
            $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" успешно выполнен' ."\n******************************\n";
            fwrite($task_log, $msg); 
            fclose($task_log);
        }
        catch (\Exception $e) {
            $task_log = fopen(self::$task_log_path, 'a');
            $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" прервался из-за следующей ошибки:' ."\n";
            $msg .= $e->getMessage() . ' в файле: ' . $e->getFile() . ' на строчке: ' . $e->getLine() . "\nТрассировка ошибки: " . $e->getTraceAsString() . "\n******************************\n";
            fwrite($task_log, $msg); 
            fclose($task_log);
            self::$task_status = 'aborted';
        }
    }
    
}