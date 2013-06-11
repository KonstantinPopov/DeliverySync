<?php

namespace Nitra\DeliveryCostBundle\Command; 

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Nitra\DeliveryCostBundle\Entity\IntimeTarify;

class IntimeTarifAgencyCommand extends ContainerAwareCommand
{
    
    static $task_status = 'started'; // 'started', 'aborted', 'done'
    
    static $task_name = 'intimeTarif:agency';
    
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
        die();
        
    }
    
    // метод, который выподняется при завершении скрипта
    public function data_backup()
    {
        if(self::$task_status != 'done') {
            // если есть хоть одна запись со статусом "OLD", значит таск начал писать данные в БД
            $query = self::$em->createQuery("
                    SELECT p.id 
                    FROM NitraDeliveryCostBundle:IntimeTarify p
                    WHERE p.update_status = 'OLD'
                ")
                ->setMaxResults(1)
                ->getResult();

            // удаляем все новые записи, а старые переименовываем назад
            if($query) {            
                self::$em->createQuery("
                    DELETE
                    FROM NitraDeliveryCostBundle:IntimeTarify p
                    WHERE p.update_status IS NULL
                ")
                ->execute();

                self::$em->createQuery("
                    UPDATE 
                    NitraDeliveryCostBundle:IntimeTarify p 
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
                if(preg_match('/http:\/\/www.intime.ua\/userfiles\/.*st.{1,3}redstav\.xlsx?/', $row->getAttribute('href'))) {
                    $agency = $row->getAttribute('href');
                }
                elseif(preg_match('/http:\/\/www.intime.ua\/userfiles\/.*ver.{0,4}ver.*\.xlsx?/', $row->getAttribute('href'))) {
                    $dver_dver = $row->getAttribute('href');
                }
            }

            // ПАРСИНГ ФАЙЛА ТАРИФОВ где есть/нет представительства Ин-Тайм:

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $agency);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $st = curl_exec($ch);

            $tmpfile = tempnam('/tmp/', 'INTIME_AGENCY');  
            $fd = fopen($tmpfile, 'w');
            fwrite($fd, $st);
            curl_close($ch);

            if($agency[strlen($agency)-1] == 'x') {
                $xls_type = 'xls.load_xls2007';
            }
            else {
                $xls_type = 'xls.load_xls5';
            }
            
            $exelObj = $this->getContainer()->get($xls_type)->load($tmpfile);

            $exelObj->setActiveSheetIndex(0);

            $aSheet = $exelObj->getActiveSheet();

            $end_row = $aSheet->getHighestDataRow();
            $end_column_letter = $aSheet->getHighestDataColumn();

            // получаем обьект класса PHPExcel_cell, чтобы вызвать метод columnIndexFromString и узнать индекс столбца по его буквенному значения 
            $PHPExcel_cell = $aSheet->getCellByColumnAndRow('1:1');
            $end_column = $PHPExcel_cell->columnIndexFromString($end_column_letter);

            $tarifs = array();
            // j - рядок, i - столбец;  A = 0; B = 1; C = 2;
            for($i = 0; $i <= $end_column; $i++) {
                $kiev_no = FALSE;
                $kiev_city = FALSE;
                $start_row = 1;
                for($j = $start_row ; $j <= $end_row; $j++) {
                    $cell = $aSheet->getCellByColumnAndRow($i, $j)->getValue();

                    if($cell && $cell != '') {
                        if(isset($tarifs[$j]['package_type']) || isset($tarifs[$j]['weight_min']) || isset($tarifs[$j]['weight_max'])) {
                            $tarifs[$j]['tarif'] = preg_replace('/[^0-9\.,]/', '', $cell); 
                            // преобразование тарифа к записи, если он будет десятичным числом (чтобы записалась дробная часть)
                            $tarifs[$j]['tarif'] = preg_replace('/,/', '.', $cell); 
                            continue;
                        }

                        // установление флага если город - Киев
                        if(preg_match('/^.*оставка.{1,3}в.{1,3}г.{1,6}Киев.*$/s', $cell)) {
                            $kiev_city = TRUE;
                            $start_row = $j; // установливаем строку, с которой будем читать следующий столбец 
                        }

                        // установление флага если город не Киев
                        elseif(preg_match('/^.*оставка.{1,3}в.{1,3}другие.*$/s', $cell)) {
                            $kiev_no = TRUE; 
                            $kiev_city = FALSE; 
                        }

                        // выбор строк где указан тип (конверт фирменный, пакет)
                        elseif(preg_match('/^[^*0-9]*$/s', $cell)) { 
                            if($kiev_city) {
                                $tarifs[$j]['package_type'] = $cell;
                                $tarifs[$j]['city'] = 'Kyiv';
                            }
                            elseif($kiev_no) {
                                $tarifs[$j]['package_type'] = $cell;
                            }
                        }

                        // выбор строк где указан промежуток минимум - максимум веса и обьема 
                        elseif(preg_match('/^[^0-9]{0,3}[0-9]{1,}.*[0-9]{1,}.*[0-9]{1,}.*[0-9]{1,}.*$/s', $cell)) { 

                            if($kiev_city) {

                                $min_max = array();
                                // разбиваем по кг на массив из двух строчек ($min_max[0] - диапазон веса и $min_max[1] - диапазон объема)
                                $min_max = explode('кг', $cell);

                                // разбиваем диапазон веса на минимальное и максимальное значение и чистим значения 
                                $min_max[0] = explode('-', $min_max[0]);
                                $min_max[0][0] = preg_replace('/[^0-9]/', '', $min_max[0][0]);
                                $min_max[0][1] = preg_replace('/[^0-9]/', '', $min_max[0][1]);                  

                                // разбиваем диапазон обьема на минимальное и максимальное значение и чистим значения(удаляем все нецифровые символы кроме точек и запятых)
                                $min_max[1] = explode('-', $min_max[1]); 
                                $min_max[1][0] = preg_replace('/[^0-9,\.]/', '', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/[^0-9,\.]/', '', $min_max[1][1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $min_max[1][0] = preg_replace('/,/', '.', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/,/', '.', $min_max[1][1]);

                                $tarifs[$j]['weight_min'] = $min_max[0][0];
                                $tarifs[$j]['weight_max'] = $min_max[0][1];
                                $tarifs[$j]['size_min'] = $min_max[1][0];
                                $tarifs[$j]['size_max'] = $min_max[1][1];
                                $tarifs[$j]['city'] = 'Kyiv';
                            }
                            elseif($kiev_no) {

                                $min_max = array();
                                // разбиваем по кг на массив из двух строчек ($min_max[0] - диапазон веса и $min_max[1] - диапазон объема)
                                $min_max = explode('кг', $cell);

                                // разбиваем диапазон веса на минимальное и максимальное значение и чистим значения
                                $min_max[0] = explode('-', $min_max[0]);
                                $min_max[0][0] = preg_replace('/[^0-9]/', '', $min_max[0][0]);
                                $min_max[0][1] = preg_replace('/[^0-9]/', '', $min_max[0][1]);                  

                                // разбиваем диапазон обьема на минимальное и максимальное значение и чистим значения(удаляем все нецифровые символы кроме точек и запятых)
                                $min_max[1] = explode('-', $min_max[1]); 
                                $min_max[1][0] = preg_replace('/[^0-9,\.]/', '', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/[^0-9,\.]/', '', $min_max[1][1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $min_max[1][0] = preg_replace('/,/', '.', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/,/', '.', $min_max[1][1]);

                                $tarifs[$j]['weight_min'] = $min_max[0][0];
                                $tarifs[$j]['weight_max'] = $min_max[0][1];
                                $tarifs[$j]['size_min'] = $min_max[1][0];
                                $tarifs[$j]['size_max'] = $min_max[1][1];
                            }
                        }

                        // выбор строк где есть только максимум
                        elseif(preg_match('/^[^0-9]*до[^0-9]*[0-9]{1,}[^0-9]*[0-9]{1,}.*$/s', $cell)) { 
                            if($kiev_city) {
                                // выбор макс. значений веса и обьема. первым придет вес, вторым объем
                                $max = array();
                                $max = explode('кг', $cell);
                                // получаем и чистим значение веса $max[0] и объема $max[1]
                                $max[0] = preg_replace('/[^0-9]/', '', $max[0]);
                                $max[1] = preg_replace('/[^0-9,\.]/', '', $max[1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $max[1] = preg_replace('/,/', '.', $max[1]);

                                $tarifs[$j]['weight_min'] = 0;
                                $tarifs[$j]['weight_max'] = $max[0];
                                $tarifs[$j]['size_min'] = 0;
                                $tarifs[$j]['size_max'] = $max[1];
                                $tarifs[$j]['city'] = 'Kyiv';
                            }
                            elseif($kiev_no) {
                                // выбор макс. значений веса и обьема. первым придет вес, вторым объем
                                $max = array();
                                $max = explode('кг', $cell);
                                // получаем и чистим значение веса $max[0] и объема $max[1]
                                $max[0] = preg_replace('/[^0-9]/', '', $max[0]);
                                $max[1] = preg_replace('/[^0-9,\.]/', '', $max[1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $max[1] = preg_replace('/,/', '.', $max[1]);

                                $tarifs[$j]['weight_min'] = 0;
                                $tarifs[$j]['weight_max'] = $max[0];
                                $tarifs[$j]['size_min'] = 0;
                                $tarifs[$j]['size_max'] = $max[1];
                            }
                        }
                        // выбор строк где есть только минимум
                        elseif(preg_match('/^[^0-9]*выше[^0-9]*[0-9]{1,}[^0-9]*[0-9]{1,}.*$/s', $cell)) { 
                            if($kiev_city) {
                                // выбор мин. значений веса и обьема. первым придет вес, вторым объем
                                $min = array();
                                $min = explode('кг', $cell);
                                // получаем и чистим значение веса $max[0] и объема $max[1]
                                $min[0] = preg_replace('/[^0-9]/', '', $min[0]);
                                $min[1] = preg_replace('/[^0-9,\.]/', '', $min[1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $min[1] = preg_replace('/,/', '.', $min[1]);

                                $tarifs[$j]['weight_min'] = $min[0];
                                $tarifs[$j]['weight_max'] = 9999;
                                $tarifs[$j]['size_min'] = $min[1];
                                $tarifs[$j]['size_max'] = 99.00;
                                $tarifs[$j]['city'] = 'Kyiv';
                            }
                            elseif($kiev_no) {
                                // выбор мин. значений веса и обьема. первым придет вес, вторым объем
                                $min = array();
                                $min = explode('кг', $cell);
                                // получаем и чистим значение веса $max[0] и объема $max[1]
                                $min[0] = preg_replace('/[^0-9]/', '', $min[0]);
                                $min[1] = preg_replace('/[^0-9,\.]/', '', $min[1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $min[1] = preg_replace('/,/', '.', $min[1]);

                                $tarifs[$j]['weight_min'] = $min[0];
                                $tarifs[$j]['weight_max'] = 9999;
                                $tarifs[$j]['size_min'] = $min[1];
                                $tarifs[$j]['size_max'] = 99.00;
                            }
                        }
                    }
                }
            } 

            // закрытие распарсеного файла и его удаление перед сохранением в базу
            unset($exelObj);
            unset($aSheet);
            fclose($fd); 
            unlink($tmpfile);  

            // ЗАПИСЬ ВСЕХ РАСПАРСЕНЫХ ЗНАЧЕНИЙ В БАЗУ (пока без flush()) // тут zone_id должен быть NULL
            $i = 0;
            foreach($tarifs as $tarif) {
                if(isset($tarif['tarif'])) { // проверка на обязательный параметр
                    $intime_tarif[$i] = new IntimeTarify();
                    $intime_tarif[$i]->setTarif($tarif['tarif']);

                    if(isset($tarif['package_type'])) {
                        $intime_tarif[$i]->setPackageType($tarif['package_type']);
                    }
                    if(isset($tarif['city'])) {
                        $intime_tarif[$i]->setCity('Киев');
                    }
                    if(isset($tarif['weight_min'])) {
                        $intime_tarif[$i]->setWeigthMin($tarif['weight_min']);
                    }
                    if(isset($tarif['weight_max'])) {
                        $intime_tarif[$i]->setWeigthMax($tarif['weight_max']);
                    }
                    if(isset($tarif['size_min'])) {
                        $intime_tarif[$i]->setSizeMin($tarif['size_min']);
                    }
                    if(isset($tarif['size_max'])) {
                        $intime_tarif[$i]->setSizeMax($tarif['size_max']);
                    }

                    self::$em->persist($intime_tarif[$i]);
                    unset($intime_tarif[$i]);
                    $i++;
                }
            }

            unset($intime_tarif);
            unset($tarifs);

            // ПАРСИНГ ТАРИФОВ И ДОПОЛНИТЕЛЬНЫХ ТАРИФОВ ПО ЗОНАМ ДЛЯ ТЕХНОЛОГИИ ДВЕРЬ-ДВЕРЬ

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $dver_dver);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $st = curl_exec($ch);

            $tmpfile = tempnam('/tmp/', 'INTIME_DVER-DVER_Tarif');  
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
            $exelObj->setActiveSheetIndex(1); // необходимые тарифы находятся на второй странице файла
            $aSheet = $exelObj->getActiveSheet();

            $start_row = 6;
            $end_row = 15;
            $end_column_letter = $aSheet->getHighestDataColumn();
            $end_column = $PHPExcel_cell->columnIndexFromString($end_column_letter);

            $types = array();
            $tarifs = array();

            // j - рядок, i - столбец;  A = 0; B = 1; C = 2;
            // номер зоны соответсвует номеру столбца; начало парсинга с 6-й строки xls
            for($i = 0; $i <= $end_column; $i++) {
                for($j = $start_row ; $j <= $end_row; $j++) {
                    $cell = $aSheet->getCellByColumnAndRow($i, $j)->getValue();
                    if($cell && $cell != '') {
                        if($i == 0) { // формируем массив параметров для веса груза с ключом номера рядка
                            // для типов груза (пакет фирменный, конверт)
                            if(preg_match('/^[^*0-9]*$/s', $cell)) {
                                $types[$j]['package_type'] = $cell;
                            }

                            //выбор строк где указан промежуток минимум - максимум веса и обьема 
                            elseif(preg_match('/^[^0-9]{0,3}[0-9]{1,}.*[0-9]{1,}.*[0-9]{1,}.*[0-9]{1,}.*$/s', $cell)) { 
                                $min_max = array();
                                // разбиваем по кг на массив из двух строчек ($min_max[0] - диапазон веса и $min_max[1] - диапазон объема)
                                $min_max = explode('кг', $cell);
                                // разбиваем диапазон веса на минимальное и максимальное значение и чистим значения 
                                $min_max[0] = explode('-', $min_max[0]);
                                $min_max[0][0] = preg_replace('/[^0-9]/', '', $min_max[0][0]);
                                $min_max[0][1] = preg_replace('/[^0-9]/', '', $min_max[0][1]);                  

                                // разбиваем диапазон обьема на минимальное и максимальное значение и чистим значения(удаляем все нецифровые символы кроме точек и запятых)
                                $min_max[1] = explode('-', $min_max[1]); 
                                $min_max[1][0] = preg_replace('/[^0-9,]/', '', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/[^0-9,]/', '', $min_max[1][1]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 

                                $min_max[1][0] = preg_replace('/,/', '.', $min_max[1][0]);
                                $min_max[1][1] = preg_replace('/,/', '.', $min_max[1][1]);

                                $types[$j]['weight_min'] = $min_max[0][0];
                                $types[$j]['weight_max'] = $min_max[0][1];
                                $types[$j]['size_min'] = $min_max[1][0];
                                $types[$j]['size_max'] = $min_max[1][1];

                            }

                            // выбор строк где есть только максимум
                            elseif(preg_match('/^[^0-9]*до[^0-9]*[0-9]{1,}[^0-9]*[0-9]{1,}.*$/s', $cell)) { 
                                // выбор макс. значений веса и обьема. первым придет вес, вторым объем
                                $max = array();
                                $max = explode('кг', $cell);
                                // убираем из строки обьема лишнюю часть, получаем $max[1][0]
                                $max[1] = explode('(', $max[1]);
                                // получаем и чистим значение веса $max[0] и объема $max[1]
                                $max[0] = preg_replace('/[^0-9]/', '', $max[0]);
                                $max[1][0] = preg_replace('/[^0-9,]/', '', $max[1][0]);
                                // преобразовываем в числе "," на ".", чтобы потом нормально преобразовалось в число 
                                $max[1][0] = preg_replace('/,/', '.', $max[1][0]);

                                $types[$j]['weight_min'] = 0;
                                $types[$j]['weight_max'] = $max[0];
                                $types[$j]['size_min'] = 0;
                                $types[$j]['size_max'] = $max[1][0];

                            }
                        }
                        else { // формируем массив по полученным значениям (номер зоны = номеру столбца)

                            // тарифы на вес без дополнительго тарифа
                            if(preg_match('/^[0-9]*,{0,1}\.{0,1}[0-9]*$/s', $cell)) {
                                // преобразование тарифа к записи, если он будет десятичным числом (чтобы записалась дробная часть)
                                $tarifs[$i][$j]['tarif'] = preg_replace('/,/', '.', $cell);
                            }

                            else { // строки где есть минимум-максимум или только максимум
                                $value = explode('+', $cell);
                                // замена "," на "." чтобы воспринимало десятичные значения
                                $tarifs[$i][$j]['tarif'] = preg_replace('/,/', '.', trim($value[0]));

                                // если указан только максимальный вес, то во второй части строки придут лишнии данные, которые необходимо обрезать 
                                if(strlen($value[1]) > 6) {
                                    $value[1] = substr($value[1], 0, 4);
                                    $value[1] = preg_replace('/[^0-9,]/', '', $value[1]);
                                }
                                $tarifs[$i][$j]['extra_tarif'] = preg_replace('/,/', '.', $value[1]);
                            }
                        }
                    }
                }
            }

            // перед сохранением делаем бекапы старых значений на время работы скрипта (переименование всех записей на status = OLD)
            self::$em->createQuery("
                    UPDATE NitraDeliveryCostBundle:IntimeTarify p 
                    SET p.update_status = 'OLD'
                ")
                ->execute();

            self::$em->flush(); 

            // ЗАПИСЬ РАСПАРСЕНЫХ ЗНАЧЕНИЙ В БАЗУ

            foreach($tarifs as $column_number => $rows) {
                $i = 0;
                foreach($rows as $row_number => $value) {
                    $intime_tarif[$i] = new IntimeTarify(); 
                    $intime_tarif[$i]->setZoneId($column_number);
                    $intime_tarif[$i]->setTarif($value['tarif']);

                    if(isset($value['extra_tarif'])) {
                        $intime_tarif[$i]->setTarifExtra($value['extra_tarif']);
                    }

                    if(isset($types[$row_number]['package_type'])) {
                        $intime_tarif[$i]->setPackageType($types[$row_number]['package_type']);
                    }

                    else {
                        if(isset($types[$row_number]['weight_min'])) {
                            $intime_tarif[$i]->setWeigthMin($types[$row_number]['weight_min']);
                        }
                        if(isset($types[$row_number]['weight_max'])) {
                            $intime_tarif[$i]->setWeigthMax($types[$row_number]['weight_max']);
                        }
                        if(isset($types[$row_number]['size_min'])) {
                            $intime_tarif[$i]->setSizeMin($types[$row_number]['size_min']);
                        }
                        if(isset($types[$row_number]['size_max'])) {
                            $intime_tarif[$i]->setSizeMax($types[$row_number]['size_max']);
                        }
                    }

                    self::$em->persist($intime_tarif[$i]);
                    unset($intime_tarif[$i]);
                    $i++;
                }
                self::$em->flush();
            }

            // таск выполнен успешно, можно удалять старые данные
            self::$em->createQuery("
                    DELETE FROM NitraDeliveryCostBundle:IntimeTarify p 
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
