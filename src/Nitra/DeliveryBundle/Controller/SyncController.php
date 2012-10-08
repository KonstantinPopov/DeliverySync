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

        $html = new SimpleHtmlDom();
        $html->load($response);
        $divClass = $html->find('div[class=districts subregions wrap]', 0);
        $aObject = $divClass->find('li a');

        $array_region = array();

        foreach ($aObject as $t) {
            $region = $t->nodes[0]->_[4];
            $action = $t->attr['href'];
            $message = iconv("utf-8", "cp1251", $region);
            $array_region[$message] = $action;
            $Reg = $em->getRepository('NitraGeoBundle:Region')->findByName($region);
            
           
            if (!$Reg) {
                $Reg = new \Nitra\GeoBundle\Entity\Region();
                $Reg->setName($region);
                $em->persist($Reg);
                 var_dump($Reg);
            die;
            $this->geographiCityAction($em, $Reg, $action);
                 $em->flush();
            } else {
                $m = '<b>Регион ' . $region . ' не записан!!!</b><br/>';
                $k = iconv("utf-8", "cp1251", $m);
                echo$k;
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

        $array_city = array();

        foreach ($aObject as $t) {
            $city = $t->nodes[0]->_[4];
//            $regions = iconv("utf-8", "cp1251", $region);
//            $message = iconv("utf-8", "cp1251", $city);
//            $array_citys[$regions][] = $message;
            $array_city[$region][] = $city;

            $City_Reg = $em->getRepository('NitraGeoBundle:City')->findByName($city);
            if (!$City_Reg) {
                $City_Reg = new \Nitra\GeoBundle\Entity\City;
                $City_Reg->setName($city);
                $City_Reg->setRegion($region);
                $em->persist($City_Reg);
//                $em->flush();
//                $em->persist($City_Reg);
            } else {
                $m = '<b>Город ' . $city . ' не записан!!!</b><br/>';
                $k = iconv("utf-8", "cp1251", $m);
                echo$k;
            }
        }

        return $response;
    }

    /**
     * преобразует данные xml в массив объектов
     * @param type $response ответ api новой почты
     * @return type массив обектов с данными о отделениях
     */
//    protected function responseToArray($response) {
//        $xml = SimpleHtmlLexer::($response);
//        
//        var_dump($xml);
//        return $xml;
//    }
}