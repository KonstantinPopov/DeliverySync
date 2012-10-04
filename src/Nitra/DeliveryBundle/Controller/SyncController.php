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
//        var_dump($response);
        
//        $a= ;
        curl_close($ch);
        
         $html = new SimpleHtmlDom();
         $html->load($response);
        $a = $html->getElementsByTagName('div');
//        var_dump($a);
//        die();
//        $dom = new domDocument;
//        $dom->loadHTML('http://www.gismeteo.ua/catalog/russia/');
//        $dom->preserveWhiteSpace = false;
//        $tables = $dom->getElementsByTagName('table');
//
//        var_dump($tables);
        
        
//        $warehouses = $this-> responseToArray($response);
//        $this->warehouseSync($warehouses, $output);
//        $output->writeln('Синхронизация завершена успешно.');
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