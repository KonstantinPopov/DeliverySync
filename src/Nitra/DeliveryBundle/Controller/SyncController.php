<?php

namespace Nitra\DeliveryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nitra\DeliveryBundle\Entity\Department;
use Nitra\DeliveryBundle\Common\SimpleHtmlDom;

class SyncController extends Controller {

    public function synchronizationAction($key) {
        $em = $this->getDoctrine()->getEntityManager();

        $query = $em->createQueryBuilder()
                ->select('ds.name as delivery_service, dc.name as city, d.name as department, d.address as adres, d.phone as phone, d.latitude as latitude, d.longitude as longitude')
                ->from('NitraDeliveryBundle:Department', 'd')
                ->join('d.deliveryService', 'ds')
                ->join('ds.clients', 'c')
                ->join('d.deliveryCity', ' dc')
//                ->join('dc.city', 'c')
                ->where('c.token = :key')
                ->setParameter('key', $key);
        $departments = $query->getQuery()->getResult();
        if (!count($departments)) {
            $departments = array('Error' => 'No result for your key!');
        }
        $data = json_encode($departments);
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $response = new Response($data, 200, $headers);
        return $response;
    }

    public function geographiAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.gismeteo.ua/catalog/russia/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
//var_dump($response);die;
        $html = new SimpleHtmlDom();
        $html->load($response);
        $divClass = $html->find('div[class=districts subregions wrap]', 0);
        $aObject = $divClass->find('li a');
        $array_region = array();
        foreach ($aObject as $t) {
            $region = $t->nodes[0]->_[4]; //выбираем названия региона
            $action = $t->attr['href']; //выбираем ссылку для городов региона
            $array_region[$region] = $action;
            $Reg = $em->getRepository('NitraGeoBundle:Region')->findByName($region);

            if (!$Reg) {
                $Reg = new \Nitra\GeoBundle\Entity\Region();
                $Reg->setName($region);
                $em->persist($Reg);
                $em->flush();
                $this->geographiCityAction($em, $Reg, $action);
                $em->flush();
            } else {
                $mess = '<b>Регион ' . $region . ' не записан!!!</b><br/>';
//                $mess = iconv("utf-8", "cp1251", $mess);
                echo$mess;
            }
        }


        return $response;
    }

    public function geographiCityAction($em, $region, $action) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.gismeteo.ua' . $action);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $html = new SimpleHtmlDom();
        $html->load($response);
        $divClass = $html->find('div[class=subregions wrap]', 0);
        $aObject = $divClass->find('li a');

        foreach ($aObject as $t) {
            $city = $t->nodes[0]->_[4];

            $City_Reg = new \Nitra\GeoBundle\Entity\City;
            $City_Reg->setName($city);
            $City_Reg->setRegion($region);
            $em->persist($City_Reg);
            $em->flush();
//             $array_city = array();
//            $regions = iconv("utf-8", "cp1251", $region);
//            $message = iconv("utf-8", "cp1251", $city);
//            $array_citys[$regions][] = $message;
//             $array_city[$region->Name][] = $city;
//            if (!$City_Reg) {
//                $City_Reg = new \Nitra\GeoBundle\Entity\City;
//                $City_Reg->setName($city);
//                $City_Reg->setRegion($region);
//                $em->persist($City_Reg);
//              $em->flush();
//                $em->persist($City_Reg);
//            } else {
//                $m = '<b>Город ' . $city . ' не записан!!!</b><br/>';
//                $k = iconv("utf-8", "cp1251", $m);
//                echo$k;
//            }
        }
        return $response;
    }

    public function warehousePekAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru/ru/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
//        $response1 = iconv("cp1251", "utf-8",  $response);
//Извлекаем ссылки городов из javascript; $posit_text_start- начало строки;
//$posit_text_finish -конец сторки; $leng - длтнна строки.      
        $posit_text_start = strpos($response, '$.contacts=([') + 12;
        $posit_text_finish = strpos($response, ";$('.region-select').bind('click change keyup',function(){var f=$(this).data('first');") - 1;
        $leng = $posit_text_finish - $posit_text_start;
        $textWithCity = substr($response, $posit_text_start, $leng);
        $href = json_decode($textWithCity); //получаем массив с ссылками на города.
        $i =0;
        foreach ($href as $hrefCity) {
            $this->chooseWarehousePek($hrefCity[2], $i);
            $i++;
        }

        $html = new SimpleHtmlDom();
        $html->load($response);
        $selectClass = $html->find('select[class=region-select]', 0); //Ищем необходимы обьект
        $cityObject = $selectClass->find('option');
//         var_dump($cityObject);die;

        foreach ($cityObject as $t) {
            $region = $t->nodes[0]->_[4]; //выбираем названия города со складом
//            var_dump($region);
//            $array_region[$region] = $action;
//            $Reg = $em->getRepository('NitraGeoBundle:Region')->findByName($region);
//
//            if (!$Reg) {
//                $Reg = new \Nitra\GeoBundle\Entity\Region();
//                $Reg->setName($region);
//                $em->persist($Reg);
//                $em->flush();
//                $this->geographiCityAction($em, $Reg, $action);
//                $em->flush();
//            } else {
//                $mess = '<b>Регион ' . $region . ' не записан!!!</b><br/>';
////                $mess = iconv("utf-8", "cp1251", $mess);
//                echo$mess;
//            }
        }
        die;

        return $response;
    }

    public function chooseWarehousePek($href, $i) {
        $array_ware = array();
//   var_dump($hrefs);
//        foreach ($hrefs as $href) {
//        if ($href == '/ru/services/send/warehouses/Volgskyi/') {

        $em = $this->getDoctrine()->getEntityManager();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru' . $href);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);

        $html = new SimpleHtmlDom();
        $html->load($response);

        $divFromWareIdClass = $html->find('div[class=news-detail]', 0); //Ищем необходимый обьект
//если существует обьект с данными по складу, то 
        if ($divFromWareIdClass != null) {
            $WareId = $divFromWareIdClass->find('a[class=print_bt]'); //ищем необходтиій элемент
            $WareId = $WareId[0]->href;
            $qq = strpos($WareId, 'ID=');
            $waresId = substr($WareId, $qq + 3); //Выбараем id склада 
            $addressWare = $divFromWareIdClass->innertext(); //обьект div в которм хранится информация о складе 
            $html1 = new SimpleHtmlDom();
            $html1->load($addressWare); //

            $cd = $html1->nodes[0]->children[0]; //получаем дочернии едементы div-а
            //
            $cityWar = $html->find('select[class=region-select] '); //ищем необходтиій элемент
           $NamecityWar = $cityWar[0]->children[0]->nodes[0]->_[4];
           
               $cityWar1 = $html->find('select[option selected=" "] '); //ищем необходтиій элемент
            var_dump($cityWar1[$i]->nodes[0]->_[4]);
//            var_dump($cityWar[0]->children[0]->nodes[0]->_[4]);die;
            //проверка на пришедште данные, пока только определены 3 разных стр-ры
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


            $array_ware[$waresId] = array($Latitude, $Longitude, $phone, $address,);
        } else {
            $html = new SimpleHtmlDom();
            $html->load($response);
            $divFromWareIdClass = $html->find('div[class=main-container]', 0); //Ищем необходимый обьект
            $childDiv = $divFromWareIdClass->children[4];
            $objTegA = $childDiv->find('a');
//            $href_ware = array();
            foreach ($objTegA as $a) {

                $href_ware[] = $a->href;

                $this->chooseWarehousePek($a->href, $i);
            }
//                $this->chooseWarehousePek($href_ware);
//                    var_dump($href_ware);
//                    die;
        }

//        var_dump($array_ware);
    }

//    }
//    }
//      public function chooseWarehousePek($href) {}
}