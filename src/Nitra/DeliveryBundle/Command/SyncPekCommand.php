<?php

namespace Nitra\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Entity\DeliveryCity;
use Nitra\DeliveryBundle\Entity\Department;
use Nitra\DeliveryBundle\Common\PecomKabinet as PecomKabinet;

class SyncPekCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('ds:sync-pek')
                ->setDescription('Synchronizes department of Pek.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        // Подключение файла с классом
//            require_once('pecom_kabinet.php');
        // Создание экземпляра класса
        $sdk = new PecomKabinet('rezina', '72E78E8A513764F898AA2D361F670E07BB3E3454');
        // Вызов метода
        $result = $sdk->call('branches', 'all', array());
//            var_dump($result);die;
        // Освобождение ресурсов
        $sdk->close();

//запоминаем города и их областя
            $mas1 = array();
            $name_obl = array();
            foreach ($result->branches as $obl) {
                $name_obl[$obl->title][] = $obl->title;
//                $mas1[$obl->title] = $obl->title;
                foreach ($obl->cities as $city) {
                    $names_region = strstr($city->title, "(");//Запоминаем название региона
                    
                   
//                    if ($names_region && !$mas1[$obl->title]) {
//                        $mas1[$obl->title] = $names_region;
//                    }
                    $name_obl[$obl->title] [] = $city->title;
                }
            }

//            $a = $name_obl+$mas1  ;
//            var_dump($name_obl);
//       $this->warehouseSync($name_obl, $output);
    }
    
    
     protected function warehouseSync($name_obl, OutputInterface $output)
    {
          $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
         
//           $dCity = new DeliveryCity();
////                $dCity->setName($wh->cityRu);
//                $em->persist($dCity);
         
//          var_dump($name_obl);
    }
}
