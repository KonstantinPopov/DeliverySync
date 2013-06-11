<?php

namespace Nitra\DeliveryCostBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Nitra\DeliveryCostBundle\Entity\IntimeZone; 


class IntimeTarifSkladSkladCommand extends ContainerAwareCommand 
{
    
    static $task_status = 'started'; // 'started', 'aborted', 'done'
    
    static $task_name = 'intimeTarif:sklad-sklad';
    
    static $em = NULL; 
    
    static $task_log_path = NULL;
    
    protected function configure() 
    {
        $this->setName(self::$task_name);
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
        // die() перенесет нас в удивительный мир функции data_backup
        die();
        
    }
    
    // метод, который выподняется при завершении скрипта
    public function data_backup()
    {
        if(self::$task_status != 'done') {
            // если есть хоть одна запись со статусом "OLD", значит таск начал писать данные в БД
            $query = self::$em->createQuery("
                    SELECT p.id 
                    FROM NitraDeliveryCostBundle:IntimeZone p
                    WHERE p.update_status = 'OLD'
                ")
                ->setMaxResults(1)
                ->getResult();

            // удаляем все новые записи, а старые переименовываем назад
            if($query) {            
                self::$em->createQuery("
                    DELETE
                    FROM NitraDeliveryCostBundle:IntimeZone p
                    WHERE p.update_status IS NULL
                ")
                ->execute();

                self::$em->createQuery("
                    UPDATE 
                    NitraDeliveryCostBundle:IntimeZone p 
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
    }
    

    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        try {
            
            self::$task_log_path = strstr(__DIR__, 'src', TRUE)."web/task.log";
            
            self::$em = $this->getContainer()->get('doctrine')->getEntityManager(); 

            register_shutdown_function(array($this, 'data_backup'));
            set_error_handler('SELF::exception_handler', E_ALL);

            // запись начала выполнения таска в лог
            $task_log = fopen(self::$task_log_path, 'a');
            $msg = date('H:i:s d.m.y ') . ' Таск "' . self::$task_name . '" запущен' ."\n";
            fwrite($task_log, $msg); 
            fclose($task_log);

            //парсинг офф сайта чтобы получить ссылки на xls-тарифы
            $content = @file_get_contents('http://www.intime.ua/txt/75/');

            $dom = new \DOMDocument();
            @$dom->loadHTML($content);
            $a = $dom->getElementsByTagName('a');

            foreach($a as $row) {
                if(preg_match('/http:\/\/www.intime.ua\/userfiles\/.*ver.{0,4}ver.*\.xlsx?/', $row->getAttribute('href'))) {
                    $dver_dver = $row->getAttribute('href');
                }
                elseif(preg_match('/http:\/\/www.intime.ua\/userfiles\/.*klad.{0,4}klad.*\.xlsx?/', $row->getAttribute('href'))) {
                    $sklad_sklad = $row->getAttribute('href');
                }
            }  

            // ПАРСИНГ ФАЙЛА ТАРИФОВ СКЛАД-СКЛАД:

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $sklad_sklad);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $st = curl_exec($ch);

            $tmpfile = tempnam('/tmp/', 'INTIME_SKLAD-SKLAD');  
            $fd = fopen($tmpfile, 'w');
            fwrite($fd, $st);
            curl_close($ch);

            if($sklad_sklad[strlen($sklad_sklad)-1] == 'x') {
                $xls_type = 'xls.load_xls2007';
            }
            else {
                $xls_type = 'xls.load_xls5';
            }

            $exelObj = $this->getContainer()->get($xls_type)->load($tmpfile);
            $exelObj->setActiveSheetIndex(0);

            $aSheet = $exelObj->getActiveSheet();
            $tarifs = array();

            $cities_offset = 1; // смещение столбцов для получения городов 
            $start_column = 0;

            $end_row = $aSheet->getHighestDataRow();
            $end_column_letter = $aSheet->getHighestDataColumn();

            // получаем обьект класса PHPExcel_cell, чтобы вызвать метод columnIndexFromString и узнать индекс столбца по его буквенному значения 
            $PHPExcel_cell = $aSheet->getCellByColumnAndRow('1:1');
            $end_column = $PHPExcel_cell->columnIndexFromString($end_column_letter);

            // определение начала рядка
            for($j = 1; $j <= $end_row; $j++) {
                $cell = $aSheet->getCellByColumnAndRow(0, $j)->getValue();   
                if(preg_match('/А[^0-9]*/', $cell)) {
                    $start_row = $j;
                    break;
                }
            }

            // j - рядок, i - столбец;  A = 0; B = 1; C = 2;
            for($i = $start_column; $i <= $end_column; $i++) {
                for($j = $start_row; $j <= $end_row; $j++) {
                    $cell = $aSheet->getCellByColumnAndRow($i, $j)->getValue();   
                    if($cell && $cell != '') {
                        // формирование массива номер - город (формируется по 1-му столбцу)
                        if($i == 0) {
                                $cities[$j-$start_row] = $cell; // все города начинаем нумеровать с нуля
                        }
                        // если < 100, то это тариф за кг
                        elseif($cell < 100) {
                            if(isset($tarifs[$j-$start_row][$i-$cities_offset]['m3'])) {
                                $tarifs[$j-$start_row][$i-$cities_offset]['kg'] = $cell;
                            }
                            else {
                                $tarifs[$i-$cities_offset][$j-$start_row]['kg'] = $cell;
                            }
                        }
                        else { // значение больше 100, значит это тариф на обьем
                            if(isset($tarifs[$j-$start_row][$i-$cities_offset]['kg'])) {
                                $tarifs[$j-$start_row][$i-$cities_offset]['m3'] = $cell;
                            }
                            else {
                                $tarifs[$i-$cities_offset][$j-$start_row]['m3'] = $cell;
                            }
                        }
                    }
                }
            } 

            // закрытие первого распарсеного файла и его удаление.
            unset($exelObj);
            unset($aSheet);
            fclose($fd); 
            unlink($tmpfile);  

            // ПАРСИНГ ВТОРОГО ФАЙЛА (город-город => zone_id)        

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $dver_dver);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $st = curl_exec($ch);

            $tmpfile = tempnam('/tmp/', 'INTIME_DVER-DVER');  
            $fd = fopen($tmpfile, 'w');
            fwrite($fd, $st);
            curl_close($ch);

            if($dver_dver[strlen($dver_dver)-1] == 'x') {
                $xls_type = 'xls.load_xls2007';
            }
            else {
                $xls_type = 'xls.load_xls5';
            }

            $exelObj = $this->getContainer()->get($xls_type)->load($tmpfile);
            $exelObj->setActiveSheetIndex(0);

            $aSheet = $exelObj->getActiveSheet();
            $zones = array();
            $cities_zone = array();
            $cities_offset_zone = 1; // для городов по столбцу и рядку используется один массив названий с указанием смещения 
            $start_column = 0;
            $start_row = 2;

            $end_row = $aSheet->getHighestDataRow();
            $end_column_letter = $aSheet->getHighestDataColumn();

            $end_column = $PHPExcel_cell->columnIndexFromString($end_column_letter);

            // j - рядок, i - столбец; A = 0; B = 1; C = 2;
            for($i = $start_column; $i <= $end_column; $i++) {
                for($j = $start_row; $j <= $end_row; $j++) {
                    $cell = $aSheet->getCellByColumnAndRow($i, $j)->getValue();   
                    // формирование массива номер - город (формируется по 1-му столбцу)
                    if($i == 0) {
                        $cities_zone[$j-$start_row] = $cell; 
                    }
                    else {
                        if(preg_match('/[0-9]/', $cell)) {
                            // массив с соответсвием городов
                            $zones[$i-$cities_offset_zone][$j-$start_row] = $cell;
                        }
                    }
                }
            } 
            fclose($fd); 
            unlink($tmpfile);   

            // делаем бекапы старых значений на время работы скрипта (переименование всех записей на status = OLD)
            self::$em->createQuery("
                    UPDATE NitraDeliveryCostBundle:IntimeZone p 
                    SET p.update_status = 'OLD'
                ")
                ->execute();

            // ЗАПИСЬ ВСЕХ РАСПАРСЕНЫХ ЗНАЧЕНИЙ В БАЗУ
            foreach($tarifs as $column_number => $rows) {
                $i = 0;
                foreach($rows as $row_number => $value) {
                    $tarif[$i] = new IntimeZone(); 
                    if(isset($value["kg"]) && isset($value["m3"])) { 

                        $tarif[$i]->setToCity($cities[$column_number]);
                        $tarif[$i]->setFromCity($cities[$row_number]); 
                        $tarif[$i]->setTarif($value["kg"]);
                        $tarif[$i]->setTarifForSector($value["m3"]);

                        if(isset($zones[$column_number][$row_number])) {
                            $tarif[$i]->setZoneId($zones[$column_number][$row_number]);
                        }
                        elseif(isset($zones[$row_number][$column_number])) {
                            $tarif[$i]->setZoneId($zones[$row_number][$column_number]);
                        }

                        self::$em->persist($tarif[$i]); 
                        unset($tarif[$i]); 
                    }
                    elseif(isset($value["kg"])) { 

                        $tarif[$i]->setToCity($cities[$column_number]);
                        $tarif[$i]->setFromCity($cities[$row_number]);
                        $tarif[$i]->setTarif($value["kg"]);

                        if(isset($zones[$column_number][$row_number])) {
                            $tarif[$i]->setZoneId($zones[$column_number][$row_number]);
                        }
                        elseif(isset($zones[$row_number][$column_number])) {
                            $tarif[$i]->setZoneId($zones[$row_number][$column_number]);
                        }
                        self::$em->persist($tarif[$i]); 
                        unset($tarif[$i]); 
                    }
                    $i++;
                }
                self::$em->flush(); 
                unset($tarif);   
            }

            // таск выполнен успешно, можно удалять старые данные
            self::$em->createQuery("
                    DELETE FROM NitraDeliveryCostBundle:IntimeZone p 
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
