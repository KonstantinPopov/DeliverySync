<?php

namespace Nitra\DeliveryCostBundle\Command; 

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Nitra\DeliveryCostBundle\Entity\IntimeZone; 

class IntimeZoneDverDverCommand extends ContainerAwareCommand 
{
    protected function configure() 
    {
        $this->setName('intimeZone:dver-dver');
    }

    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        // парсинг файла http://www.intime.ua/userfiles/file/Tarifi_Dver-Dver_16042013.xlsx
        // забираем файлик и сохраняем у себя во временном файле в /tmp/
                
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.intime.ua/userfiles/file/Tarifi_Dver-Dver_16042013.xlsx');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $st = curl_exec($ch);
//        
//        $tmpfile = tempnam('NULL', 'INTIME_DVER-DVER'); // NULL - чтобы вернуло имя только что созданного tmp-файла 
//        $fd = fopen($tmpfile, 'w');
//        fwrite($fd, $st);
//        
//        curl_close($ch);
//        //xls.load_xls5 - xls
//       
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
//        $exelObj = $this->getContainer()->get('xls.load_xls2007')->load($tmpfile);
        $exelObj = $this->getContainer()->get('xls.load_xls2007')->load('../Dver-Dver.xlsx');
        
        $exelObj->setActiveSheetIndex(0);

        $aSheet = $exelObj->getActiveSheet();
        $zones = array();
        $cities = array();
        $cities_offset = 1; // для городов по столбцу и рядку используется один массив названий с указанием смещения 
        $start_column = 0;
        $start_row = 2;
        
        $end_row = $aSheet->getHighestDataRow();
        $end_column_letter = $aSheet->getHighestDataColumn();
        // получаем обьек класса PHPExcel_cell, чтобы вызвать метод columnIndexFromString и узнать индекс столбца по его буквенному значения 
        $PHPExcel_cell = $aSheet->getCellByColumnAndRow('1:1');
        $end_column = $PHPExcel_cell->columnIndexFromString($end_column_letter);

        // j - рядок, i - столбец
        // A = 0; B = 1; C = 2;
        for($i = $start_column; $i <= $end_column; $i++) {
            for($j = $start_row; $j <= $end_row; $j++) {
                $cell = $aSheet->getCellByColumnAndRow($i, $j)->getValue();   
                // формирование массива номер - город (формируется по 1-му столбцу)
                if($i == 0) {
                    $cities[$j] = $cell; 
                }
                else {
                    if(preg_match('/[0-9]/', $cell)) {
                        // массив с соответсвием городов
                        $zones[$i+$cities_offset][$j] = $cell;
                    }
                }
            }
        } 
//        var_dump($cities);
//        var_dump($zones);die;
//        
        foreach($zones as $column_number => $rows) {
            $i = 0;
            foreach($rows as $row_number => $value) {
                
                $zones[$i] = new IntimeZone(); 
                // сделать поиск и апдейт полей, а не записывать новые
                $zones[$i]->setToCity($cities[$column_number]);
                $zones[$i]->setFromCity($cities[$row_number]);
                $zones[$i]->setZoneId((int)$value);
                $em->persist($zones[$i]);
                
                $i++;
            }
            
            $em->flush();
            unset($zones); // удаляем из памяти  
        }
//        fclose($fd); 
//        unlink($tmpfile);        
    }
}