<?php

namespace Nitra\DeliveryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nitra\DeliveryBundle\Entity\Department;
use Nitra\DeliveryBundle\Common\SimpleHtmlDom;
use Nitra\GeoBundle\Entity\Region;
use Nitra\GeoBundle\Entity\City;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class SyncController extends Controller {

    /**
     * Функция для синхронизации складов транспортных компаний
     * 
     * @param string $key токен клиента
     * @return \Symfony\Component\HttpFoundation\Response информация по складам транспортных компаний
     */
    public function synchronizationAction($key) {

        $em = $this->getDoctrine()->getEntityManager();

        $query = $em->createQueryBuilder()
                ->select(' r.id as id_region, ct.id as id_city, d.id as id_dep, d.wareIdCity as ware_id_city, d.wareId as ware_id, ds.name  as name_delivery, ds.id as delivery_id ,  d.address as adres, d.phone as phone,  d.name as name_ware, ct.name as name_city, r.name as name_region')
                ->from('NitraDeliveryBundle:Department', 'd')
                ->join('d.deliveryService', 'ds')
                ->join('d.deliveryCity', 'dc')
                ->join('dc.city', 'ct')
                ->join('ct.region', 'r')
                ->join('ds.clients', 'cl')
                ->where('cl.token = :key')
                ->setParameter('key', $key);
        $departments = $query->getQuery()->getResult();


        foreach ($departments as $dep) {

            $array_dep[] = array('region_id' => $dep['id_region'], 'city_id' => $dep['id_city'], 'adres' => $dep['adres'], 'name_ware' => $dep['name_ware'], 'phone' => $dep['phone'], 'ware_id' => $dep['ware_id'], 'delivery_id' => $dep['delivery_id'], 'region_name' => $dep['name_region'], 'city_name' => $dep['name_city'], 'ware_id_sevices' => $dep['id_dep'], 'ware_id_city' => $dep['ware_id_city']);
        }

        if (!count($departments)) {
            $departments = array('Error' => 'No result for your key!');
        }
        $data = json_encode($array_dep);
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $response = new Response($data, 200, $headers);

        return $response;
    }

    /**
     * Возвращает срок доставки по всем подключенным тк  (из $cityFrom в $cityTo)
     * @param type $key токен клиента
     * @param type $cityFrom горд отправки
     * @param type $cityTo город доставки
     * @return \Symfony\Component\HttpFoundation\Response\ json с данными
     * 
     */
    public function syncDeliveryPeriodAction($key, $cityFrom, $cityTo) {

        $em = $this->getDoctrine()->getEntityManager();

        $client = $em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array(
            'token' => $key,
        ));
        if (!$client) {
            $data = json_encode(array('Error' => 'No result for your key!'));
        } else {
            $cityF = $em->getRepository('NitraGeoBundle:City')->findOneByName($cityFrom);
            $cityT = $em->getRepository('NitraGeoBundle:City')->findOneByName($cityTo);
            if (!$cityF) {
                $data = json_encode(array('Error' => 'City From is not found!'));
            } else if (!$cityT) {
                $data = json_encode(array('Error' => 'City To is not found!'));
            } else {
                $data = array();
                foreach ($client->getDeliveryServices() as $ds) {
                    $deliveryPeriod = $em->getRepository('NitraDeliveryBundle:DeliveryPeriod')->findOneBy(array(
                        'deliveryService' => $ds,
                        'cityFrom' => $cityF,
                        'cityTo' => $cityT,
                    ));

                    ($deliveryPeriod) ? $period = $deliveryPeriod->getPeriod() : $period = null;
                    if ($period > 20) {
                        $period = 'error';
                    }
                    $data[$ds->getId()] = array(
                        'deliveryService' => $ds->getName(),
                        'period' => $period,
                    );
                }
                $data = json_encode($data);
            }
        }
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $response = new Response($data, 200, $headers);

        return $response;
    }

//    /*
//     * Получаем регионы России с сайта Gismetio
//     *  @return $response html страничка 
//     */
//
//    public function geographiAction() {
//        set_time_limit(0); 
//        ini_set('memory_limit', '-1');
//        ini_set('max_input_time', '-1');
//
//
//        $em = $this->getDoctrine()->getEntityManager();
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.gismeteo.ua/catalog/russia/');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        $html = new SimpleHtmlDom();
//        $html->load($response);
//        $divClass = $html->find('div[class=districts subregions wrap]', 0); 
//        $aObject = $divClass->find('li a'); 
//        $array_region = array(); //массив регионов
//        foreach ($aObject as $regiony) {
//            $region = $regiony->nodes[0]->_[4]; //выбираем названия региона
//            $action = $regiony->attr['href']; //выбираем ссылку для городов региона
//            $array_region[$region] = $action;
//
//            $Reg = $em->getRepository('NitraGeoBundle:Region')->findOneByName($region); //ищем в базе регионы с таким названием 
////если не находим такого региона то добавляем его
//            if (!$Reg) {
//                $Reg = new \Nitra\GeoBundle\Entity\Region();
//                $Reg->setName($region);
//                $em->persist($Reg);
//                echo '<b>Регион ' . $region . ' успешно записан!</b><br/>';
//                $em->flush();
//                $this->geographiCityAction($em, $Reg, $action);
//                $em->flush();
//            } else {
//                $em->flush();
//
//                $this->geographiCityAction($em, $Reg, $action);
//                $em->flush();
//                echo '<b>Регион ' . $region . ' не записан!!!</b><br/>';
//            }
//        }
//
//
//        return $response;
//    }
//
//    /*
//     * Получаем города региона с сайта Gismetio
//     * $region - обьект  региона, $action -- ссылка на города региона
//     */
//
//    public function geographiCityAction($em, $region, $action) {
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.gismeteo.ua' . $action);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        $html = new SimpleHtmlDom();
//        $html->load($response);
//        $divClass = $html->find('div[class=subregions wrap]', 0); //поиск обьекта содержащего информацию по городам
//        $aObject = $divClass->find('li a'); // поиск обьетка содержащего инф по городу.
//
//        foreach ($aObject as $t) {
//            $city = $t->nodes[0]->_[4]; // выбираем названия города в обьекте
////            $City_Reg = new \Nitra\GeoBundle\Entity\City;
////            $City_Reg->setName($city); //устанавливаем название  города
////            $City_Reg->setRegion($region); //устанавливаем название регоина
////            $em->persist($City_Reg);
////            $em->flush();
//
//            $City_Reg = $em->getRepository('NitraGeoBundle:City')->findByName($city); //ищем в базе регионы с таким названием 
//
//            if (!$City_Reg) {
//
//                $City_Reg = new \Nitra\GeoBundle\Entity\City;
//                $City_Reg->setName($city);
//                $City_Reg->setRegion($region);
//                $em->persist($City_Reg);
//                $em->flush();
//            } else {
//                echo '<b>Город ' . $city . ' не записан!!!</b><br/>';
//            }
//        }
//        return $response;
//    }
//
//    /*
//     * Получение информации по складам ТК(выполнено в таске)
//     */
//
//    public function warehousePekAction() {
//        $em = $this->getDoctrine()->getEntityManager();
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru/ru/');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
//        curl_close($ch);
////        $response1 = iconv("cp1251", "utf-8",  $response);
////Извлекаем ссылки городов из javascript;@ $posit_text_start- начало строки;
////@$posit_text_finish -конец сторки; @ $leng - длтнна строки.      
//        $posit_text_start = strpos($response, '$.contacts=([') + 12;
//        $posit_text_finish = strpos($response, ";$('.region-select').bind('click change keyup',function(){var f=$(this).data('first');") - 1;
//        $leng = $posit_text_finish - $posit_text_start;
//        $textWithCity = substr($response, $posit_text_start, $leng);
//        $href = json_decode($textWithCity); //получаем массив с ссылками на города.
//        $i = 0; // бежим по городам складов
//        foreach ($href as $hrefCity) {
//            $this->chooseWarehousePek($hrefCity[2], $i); // вызываем функцию для получение инфы о складахс
//            $i++;
//        }
//
//        $html = new SimpleHtmlDom();
//        $html->load($response);
//        $selectClass = $html->find('select[class=region-select]', 0); //Ищем необходимы обьект  с название города
//        $cityObject = $selectClass->find('option');
////         var_dump($cityObject);die;
//
//        foreach ($cityObject as $t) {
//            $region = $t->nodes[0]->_[4]; //выбираем названия города со складом
////            var_dump($region);
////            $array_region[$region] = $action;
////            $Reg = $em->getRepository('NitraGeoBundle:Region')->findByName($region);
////
////            if (!$Reg) {
////                $Reg = new \Nitra\GeoBundle\Entity\Region();
////                $Reg->setName($region);
////                $em->persist($Reg);
////                $em->flush();
////                $this->geographiCityAction($em, $Reg, $action);
////                $em->flush();
////            } else {
////                $mess = '<b>Регион ' . $region . ' не записан!!!</b><br/>';
//////                $mess = iconv("utf-8", "cp1251", $mess);
////                echo$mess;
////            }
//        }
////        die;
//
//        return $response;
//    }
//
//    /*
//     * Получение инфі по складам ТК, $href -  ссылка на склад ТК, $i-позиция города(для того что бы получить названия городов) 
//     */
//
//    public function chooseWarehousePek($href, $i) {
//        $array_ware = array();
//        $em = $this->getDoctrine()->getEntityManager();
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://www.pecom.ru' . $href);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html, 'Content-length: 100'"));
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
//
//        $html = new SimpleHtmlDom();
//        $html->load($response);
//
//        $divFromWareIdClass = $html->find('div[class=news-detail]', 0); //Ищем необходимый обьект
////если существует обьект с данными по складу, то 
//        if ($divFromWareIdClass != null) {
//            $WareId = $divFromWareIdClass->find('a[class=print_bt]'); //ищем необходтиій элемент
//            $WareId = $WareId[0]->href;
//            $qq = strpos($WareId, 'ID=');
//            $waresId = substr($WareId, $qq + 3); //Выбараем id склада 
//            $addressWare = $divFromWareIdClass->innertext(); //обьект div в которм хранится информация о складе 
//            $html1 = new SimpleHtmlDom();
//            $html1->load($addressWare); //
//
//            $cd = $html1->nodes[0]->children[0]; //получаем дочернии едементы div-а
//            //
//            $cityWar = $html->find('select[class=region-select] '); //ищем необходтиій элемент
//            $NamecityWar = $cityWar[0]->children[0]->nodes[0]->_[4];
//
//            $cityWar1 = $html->find('select[option selected=" "] '); //ищем необходимый элемент
////            var_dump($cityWar1[$i]->nodes[0]->_[4]);
//            /*
//             * $address -адресс
//             * $phone - телефон
//             */
//
//            //проверка на пришедште данные, пока только определены 3 разных стр-ры
//
//            if (isset($cd->getDom()->nodes[15]->_[4]) && isset($cd->getDom()->nodes[13]->_[4])) {
//                $phone = $cd->getDom()->nodes[15]->_[4]; //номер телефона склада
//                $address = $cd->getDom()->nodes[13]->_[4]; //адрес склада
//            } else {
//                //такая структура приходит для Братска
////                        var_dump(($cd->parent->children[0]->getDom()->nodes[10]->_[4]));die;
//                if (isset($cd->parent->children[0]->getDom()->nodes[10]->_[4]) && isset($cd->parent->children[0]->getDom()->nodes[8]->_[4])) {
//                    $address = $cd->parent->children[0]->getDom()->nodes[8]->_[4];
//                    $phone = $cd->parent->children[0]->getDom()->nodes[10]->_[4];
//                } elseif (isset($cd->parent->children[1]->getDom()->root->nodes[12]->_[4]) && isset($cd->parent->children[1]->getDom()->root->nodes[14]->_[4])) {
//                    //такая структура приходит для Волжский
//                    $address = $cd->parent->children[1]->getDom()->root->nodes[12]->_[4]; //
//                    $phone = $cd->parent->children[1]->getDom()->root->nodes[14]->_[4]; //
//                } else {
//                    echo('ошибка, данные не получены');
//                }
//            }
//
//            $phone = trim(substr($phone, 50)); //Получаем только номер.
//            $address = trim(substr($address, 48)); //Получаем только адрес.
//            $posit_text_start = strpos($response, 'YMaps.Placemark(new YMaps.GeoPoint(') + 36; // определяем позицию начало строки 
//            $posit_text_finish = strpos($response, '),{style: s})'); //определяем позицию конец строки 
//            $leng = $posit_text_finish - $posit_text_start; //определяем длину строки 
//            $textWithCity = substr($response, $posit_text_start, $leng); //выбираем нужную инф-ция
//            $array_coordinat = explode(',', $textWithCity); //массив с координатами
//            $Latitude = trim($array_coordinat[1]); //Широта
//            $Longitude = trim($array_coordinat[0]); //Долгота
//
//            $array_ware[$waresId] = array($Latitude, $Longitude, $phone, $address,);
//        } else {
//            $html = new SimpleHtmlDom();
//            $html->load($response);
//            $divFromWareIdClass = $html->find('div[class=main-container]', 0); //Ищем необходимый обьект
//            $childDiv = $divFromWareIdClass->children[4]; //получаем дочернии обьекты для нахождения ссылок
//            $objTegA = $childDiv->find('a'); //получаем все ссылки (тег а)
//            // Бежим по все ссылкам на склады, если не было найдено инф-ции по складу, в том случае когда в городе несколько складов
//            foreach ($objTegA as $a) {
//                $this->chooseWarehousePek($a->href, $i); // получаем инф-цию по складам
//            }
//        }
//    }
}