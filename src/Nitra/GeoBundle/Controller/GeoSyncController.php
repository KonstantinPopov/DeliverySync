<?php

namespace Nitra\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nitra\DeliveryBundle\Entity\Client;
use Nitra\DeliveryBundle\Common\SimpleHtmlDom;
use Nitra\GeoBundle\Entity\Region;
use Nitra\GeoBundle\Entity\City;
use Nitra\GeoBundle\Entity\Country;

class GeoSyncController extends Controller {

    /**
     * Функция для синхронизации складов транспортных компаний
     * 
     * @param string $key токен клиента
     * @return \Symfony\Component\HttpFoundation\Response информация по складам транспортных компаний
     */
    public function synchronizationAction($key) {

        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('cl.id')                
                ->from('NitraDeliveryBundle:Client', 'cl')
                ->where('cl.token = :key')
                ->setParameter('key', $key);
        if (!$query->getQuery()->getResult()) {
            $cities = array('Error' => 'No result for your key!');
        } else {
            $query = $em->createQueryBuilder()
                    ->select(' r.id as id_region, ct.id as id_city, ct.name as name_city, r.name as name_region, cn.id as country_id, cn.name as country_name')
                    ->from('NitraGeoBundle:City', 'ct')                    
                    ->join('ct.region', 'r')
                    ->join('r.country', 'cn');                    
            $cities = $query->getQuery()->getResult();
            if (!count($cities)) {
                $cities = array('Error' => 'No result for your key!');
            }
            foreach ($cities as $city) {
                $array_cities[] = array('region_id' => $city['id_region'], 'city_id' => $city['id_city'], 'region_name' => $city['name_region'], 'city_name' => $city['name_city'], 'country_name' => $city['country_name'], 'country_id' => $city['country_id']);
            }           
        }
        $data = json_encode($array_cities);
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $response = new Response($data, 200, $headers);

        return $response;
    }

}