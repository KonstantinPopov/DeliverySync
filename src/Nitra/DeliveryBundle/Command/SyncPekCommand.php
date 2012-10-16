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
use Nitra\DeliveryBundle\Common\SimpleHtmlDom;
use Nitra\DeliveryBundle\Entity\DeliveryService;

class SyncPekCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:sync-pek')
                ->setDescription('Synchronizes department of Pek.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->warehousePekAction();
//        // Подключение файла с классом
////            require_once('pecom_kabinet.php');
//        // Создание экземпляра класса
//        $sdk = new PecomKabinet('rezina', '72E78E8A513764F898AA2D361F670E07BB3E3454');
//        // Вызов метода
//        $result = $sdk->call('branches', 'all', array());
////            var_dump($result);die;
//        // Освобождение ресурсов
//        $sdk->close();
//
////запоминаем города и их областя
//            $mas1 = array();
//            $name_obl = array();
//            foreach ($result->branches as $obl) {
//                $name_obl[$obl->title][] = $obl->title;
////                $mas1[$obl->title] = $obl->title;
//                foreach ($obl->cities as $city) {
//                    $names_region = strstr($city->title, "(");//Запоминаем название региона
//                    
//                   
////                    if ($names_region && !$mas1[$obl->title]) {
////                        $mas1[$obl->title] = $names_region;
////                    }
//                    $name_obl[$obl->title] [] = $city->title;
//                }
//            }
//
////            $a = $name_obl+$mas1  ;
//            var_dump($name_obl);
////       $this->warehouseSync($name_obl, $output);
    }

//     protected function warehouseSync($name_obl, OutputInterface $output)
//    {
//          $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
//         
////           $dCity = new DeliveryCity();
//////                $dCity->setName($wh->cityRu);
////                $em->persist($dCity);
//         
////          var_dump($name_obl);
//    }

/*
 * Получаем инфу по складам ТК
 * 
 */

    public function warehousePekAction()
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru/ru/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        //Создаем обьект
        $html = new SimpleHtmlDom();
        $html->load($response);
        $selectClass = $html->find('select[class=region-select]', 0); //Ищем необходимы обьект
        $cityObject = $selectClass->find('option');
//Бежим по обьектам городов
        foreach ($cityObject as $city) {
            $delivery_city = $city->nodes[0]->_[4]; //выбираем названия города со складом
            $delivery_city = iconv("cp1251", "utf-8", $delivery_city);
            // $dCity обьект города
            $dCity = $em->getRepository('NitraDeliveryBundle:DeliveryCity')->findOneByName($delivery_city);
            //Если данный город не найден в БД то зарисываем его
            if (!$dCity) {
                $dCity = new DeliveryCity();
                $dCity->setName($delivery_city);
                $em->persist($dCity);
                $em->flush();
                $mess = 'Город ' . $delivery_city . ' успешно записан!!!';
                $mess = iconv("utf-8", "cp1251", $mess);
                echo $mess;
            } else {
                $mess = 'Город ' . $delivery_city . ' не записан!!!';
                $mess = iconv("utf-8", "cp1251", $mess);
                echo$mess;
            }
        }

//        $response1 = iconv("cp1251", "utf-8",  $response);
/*извлекаем ссылки городов из javascript;
 * $posit_text_start- начало строки;
 * $posit_text_finish -конец сторки; 
 * $leng - длина строки.  
 */     
        $posit_text_start = strpos($response, '$.contacts=([') + 12;
        $posit_text_finish = strpos($response, ";$('.region-select').bind('click change keyup',function(){var f=$(this).data('first');") - 1;
        $leng = $posit_text_finish - $posit_text_start;
        $textWithCity = substr($response, $posit_text_start, $leng);
        $href = json_decode($textWithCity); //получаем массив с ссылками на города.
//Бежим по городам
        $i = 0;
        foreach ($href as $hrefCity) {
            $this->chooseWarehousePek($hrefCity[2], $em, $i);// получаем данные по складу
            $i++;
        }

        return $response;
    }

    /*Получаем инфу по складам
     * $href -- ссылка га склад
     * $i позиция города в меню(что бы пробежаться по всем города, и выбрать название города)
     */
    public function chooseWarehousePek($href, $em, $i)
    {
        $em = $em;
        //$pek - обьект DeliveryService, для ТК ПЭК
        $pek = $em
                ->getRepository('NitraDeliveryBundle:DeliveryService')
                ->findOneByName('ПЭК');
        //Получаем все ид складов, для ТК ПЭК
        $pek_id = $pek->getId();
        $query = $em
                ->createQuery('SELECT d.wareId FROM NitraDeliveryBundle:Department d 
                                             WHERE d.deliveryService = :service ')
                ->setParameters(array(
            'service' => $pek_id
                ));
        $ids = $query->getArrayResult();
        $wareIds = array();
        foreach ($ids as $id) {
            $wareIds [] = $id['wareId'];
        }
//                    var_dump($wareIds);die;
//        $array_ware = array();
//   var_dump($hrefs);
//        foreach ($hrefs as $href) {
//        if ($href == '/ru/services/send/warehouses/Volgskyi/') {
//        $em = $this->getDoctrine()->getEntityManager();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru' . $href);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);

        $html = new SimpleHtmlDom();
        $html->load($response);
        $divFromWareIdClass = $html->find('div[class=news-detail]', 0); //Получаем необходимый обьект в котором хранится вся нужная инф-ция по складу

//если существует обьект с данными по складу, то выбираем их
        if ($divFromWareIdClass != null) {
            $WareId = $divFromWareIdClass->find('a[class=print_bt]'); //ищем необходтиій элемент
            $WareId = $WareId[0]->href;
            $qq = strpos($WareId, 'ID=');
            $waresId = substr($WareId, $qq + 3); //Выбараем id склада 
            $addressWare = $divFromWareIdClass->innertext(); //обьект div в которм хранится информация о складе 
            $html1 = new SimpleHtmlDom();
            $html1->load($addressWare);

            $cd = $html1->nodes[0]->children[0]; //получаем дочернии едементы div-а
            $cityWar = $html->find('select[option selected=" "] '); //ищем необходтимый элемент
            $NamecityWar = $cityWar[$i]->nodes[0]->_[4];
//               $cityWar1 = $html->find('select[option selected=" "] '); //ищем необходтиій элемент
//            var_dump($cityWar1);
            //проверка на пришедшие данные, пока только определены 3 разных стр-ры
            if (isset($cd->getDom()->nodes[15]->_[4]) && isset($cd->getDom()->nodes[13]->_[4])) {
                $phone = $cd->getDom()->nodes[15]->_[4]; //номер телефона склада
                $address = $cd->getDom()->nodes[13]->_[4]; //адрес склада
            } else {
                //bratsk
//                        var_dump(($cd->parent->children[0]->getDom()->nodes[10]->_[4]));die;
                if (isset($cd->parent->children[0]->getDom()->nodes[10]->_[4]) && isset($cd->parent->children[0]->getDom()->nodes[8]->_[4])) {
                    $address = $cd->parent->children[0]->getDom()->nodes[8]->_[4];
                    $phone = $cd->parent->children[0]->getDom()->nodes[10]->_[4];
                } elseif (isset($cd->parent->children[1]->getDom()->root->nodes[12]->_[4]) && isset($cd->parent->children[1]->getDom()->root->nodes[14]->_[4])) {

                    //volosgi
                    $address = $cd->parent->children[1]->getDom()->root->nodes[12]->_[4];
                    $phone = $cd->parent->children[1]->getDom()->root->nodes[14]->_[4];
                } else {
                    echo('ошибка, данные не получены');
                }
            }

            $phone = trim(substr($phone, 50));
            $address = trim(substr($address, 48));
            $posit_text_start = strpos($response, 'YMaps.Placemark(new YMaps.GeoPoint(') + 36;
            $posit_text_finish = strpos($response, '),{style: s})');
            $leng = $posit_text_finish - $posit_text_start;
            $textWithCity = substr($response, $posit_text_start, $leng);
            $array_coordinat = explode(',', $textWithCity);
            $Latitude = trim($array_coordinat[1]); //Широта
            $Longitude = trim($array_coordinat[0]); //Долгота
            //проверяем есть ли в базе склады с таким ид
            if (in_array($waresId, $wareIds) === FALSE) {
//                  var_dump($NamecityWar);
                $NamecityWar = iconv("cp1251", "utf-8", $NamecityWar);

                $address = iconv("cp1251", "utf-8", $address);
                $phone = iconv("cp1251", "utf-8", $phone);

                $dCity = $em->getRepository('NitraDeliveryBundle:DeliveryCity')->findOneByName($NamecityWar);
                $em->persist($dCity);
                $department = new Department();
                $em->persist($department);
                $department->setDeliveryCity($dCity);
                $department->setName($address);
                $department->setAddress($address);
                $department->setPhone($phone);
                $department->setWareId($waresId);
                $department->setLatitude($Latitude);
                $department->setLongitude($Longitude);
                $department->setDeliveryService($pek);

                $em->flush();
                $array_ware[$waresId] = array($Latitude, $Longitude, $phone, $address, $pek_id, $NamecityWar);
//                var_dump($array_ware);die;
            }


//           
        }
        //иначе получем ссылку на склад
        else {
            $html = new SimpleHtmlDom();
            $html->load($response);
            $divFromWareIdClass = $html->find('div[class=main-container]', 0); //Ищем необходимый обьект
            $childDiv = $divFromWareIdClass->children[4];
            $objTegA = $childDiv->find('a');
//            $href_ware = array();
            foreach ($objTegA as $a) {
                $this->chooseWarehousePek($a->href, $em, $i);
            }
        }

//        var_dump($array_ware);
    }

}
