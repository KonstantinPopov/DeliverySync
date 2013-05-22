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
    protected function configure() 
    {
        $this->setName('intimeTarif:sklad-sklad');
    }

    protected function execute(InputInterface $input, OutputInterface $output) 
    {
        // парсинг файла http://www.intime.ua/userfiles/file/Tarif_Sklad-Sklad_16042013.xlsx
        // забираем файлик и сохраняем у себя во временном файле в /tmp/
                
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.intime.ua/userfiles/file/Tarif_Sklad-Sklad_16042013.xlsx');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $st = curl_exec($ch);
//        
//        $tmpfile = tempnam('NULL', 'INTIME_SKLAD-SKLAD'); // NULL - чтобы вернуло имя только что созданного tmp-файла 
//        $fd = fopen($tmpfile, 'w');
//        fwrite($fd, $st);
//        
//        curl_close($ch);
//        
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
//        $exelObj = $this->getContainer()->get('xls.load_xls2007')->load($tmpfile);
        
        $exelObj = $this->getContainer()->get('xls.load_xls5')->load('../Sklad-Sklad.xls');
        $exelObj->setActiveSheetIndex(0);

        $aSheet = $exelObj->getActiveSheet();
        $tarifs = array();
        
        $cities_offset = 3; // для городов по столбцу и рядку используется один массив названий с указанием смещения 
        $start_column = 0;
        $start_row = 4;
        
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
                if($cell && $cell != '') {
                    // формирование массива номер - город (формируется по 1-му столбцу)
                    if($i == 0) {
                            $cities[$j-$cities_offset] = $cell; 
                    }
                    // если < 100, то это тариф за кг
                    elseif($cell < 100) {
                        if(isset($tarifs[$j-$cities_offset][$i+$cities_offset]['m3'])) {
                            $tarifs[$j-$cities_offset][$i+$cities_offset]['kg'] = $cell;
                        }
                        else {
                            $tarifs[$i][$j]['kg'] = $cell;
                        }
                    }
                    else { // значение больше 100, значит это тариф на обьем
                        if(isset($tarifs[$j-$cities_offset][$i+$cities_offset]['kg'])) {
                            $tarifs[$j-$cities_offset][$i+$cities_offset]['m3'] = $cell;
                        }
                        else {
                            $tarifs[$i][$j]['m3'] = $cell;
                        }
                    }
                }
            }
        } 
        
//        var_dump($cities);die;

        foreach($tarifs as $column_number => $rows) {
            $i = 0;
            foreach($rows as $row_number => $value) {
                $tarif[$i] = new IntimeZone(); 
                
                if(isset($value["kg"]) && isset($value["m3"])) {
                    $tarif[$i]->setToCity($cities[$column_number]);
                    $tarif[$i]->setFromCity($cities[$row_number-$cities_offset]);
                    $tarif[$i]->setTarif($value["kg"]);
                    $tarif[$i]->setTarifForSector($value["m3"]);
                    $em->persist($tarif[$i]);
                }
                elseif(isset($value["kg"])) {
                    $tarif[$i]->setToCity($cities[$column_number]);
                    $tarif[$i]->setFromCity($cities[$row_number-$cities_offset]);
                    $tarif[$i]->setTarif($value["kg"]);
                    $em->persist($tarif[$i]);
                }
                $i++;
            }
            $em->flush();
            unset($tarif); // удаляем из памяти  
        }
//        fclose($fd); 
//        unlink($tmpfile);        
    }
}