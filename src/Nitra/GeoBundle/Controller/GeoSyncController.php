<?php

namespace Nitra\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nitra\DeliveryBundle\Entity\Client;
use Nitra\DeliveryBundle\Common\SimpleHtmlDom;
use Nitra\GeoBundle\Entity\Region;
use Nitra\GeoBundle\Entity\City;
use Nitra\GeoBundle\Entity\Country;

class GeoSyncController extends Controller
{

    /**
     * Функция для синхронизации складов транспортных компаний
     * 
     * @param string $key токен клиента
     * @return \Symfony\Component\HttpFoundation\Response информация по складам транспортных компаний
     */
    public function synchronizationAction($key)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('cl.id')
                ->from('NitraDeliveryBundle:Client', 'cl')
                ->where('cl.token = :key')
                ->setParameter('key', $key);

        $array_cities = array();
        if (!$query->getQuery()->getResult()) {
            $array_cities = array('Error' => 'No result for your key!');
        } else {
            $query = $em->createQueryBuilder()
                    ->select('r.id as id_region,
                              ct.id as id_city,
                              ct.name as name_city,
                              r.name as name_region,
                              cn.id as country_id,
                              cn.name as country_name')
                    ->from('NitraGeoBundle:City', 'ct')
                    ->join('ct.region', 'r')
                    ->join('r.country', 'cn');
            $cities = $query->getQuery()->getResult();
            if (!count($cities)) {
                $array_cities = array('Error' => 'No result for your key!');
            } else {
                foreach ($cities as $city) {
                    $array_cities[] = array(
                        'region_id' => $city['id_region'],
                        'city_id' => $city['id_city'],
                        'region_name' => $city['name_region'],
                        'city_name' => $city['name_city'],
                        'country_name' => $city['country_name'],
                        'country_id' => $city['country_id']
                    );
                }
            }
        }
        $data = json_encode($array_cities);
        $headers = array('Content-type' => 'application-json; charset=utf8');
        $response = new Response($data, 200, $headers);

        return $response;
    }

    public function synchronizationRegionAction($key)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $client = $em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array(
            'token' => $key,
        ));

        $em->getFilters()->disable('softdeleteable');

        $data = array();
        if (!$client) {
            $data = json_encode(array('Error' => 'No result for your key!'));
        } else {
            $query = $em->getRepository('NitraGeoBundle:Region')->createQueryBuilder('r')
                    ->where('(r.deletedAt IS NULL OR r.deletedAt IS NOT NULL)')
                    ->getQuery()
                    ->getResult();

            foreach ($query AS $key => $value) {
                $data[] = array(
                    'id' => $value->getId(),
                    'name' => $value->getName(),
                    'country_id' => $value->getCountry()->getId(),
                    'is_active' => $value->getDeletedAt() ? 0 : 1,
                );
            }
        }

//        $headers = array('Content-type' => 'application-json; charset=utf8');
//        $response = new Response(json_encode($data), 200, $headers);
        $response = new Response(json_encode($data), 200);
        return $response;
    }

    public function synchronizationCityAction($key)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $client = $em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array(
            'token' => $key,
        ));

        $em->getFilters()->disable('softdeleteable');

        $data = array();
        if (!$client) {
            $data = json_encode(array('Error' => 'No result for your key!'));
        } else {
            $query = $em->getRepository('NitraGeoBundle:City')->createQueryBuilder('c')
                    ->where('(c.deletedAt IS NULL OR c.deletedAt IS NOT NULL)')
                    ->getQuery()
                    ->getResult();

            foreach ($query AS $key => $value) {
                $data[] = array(
                    'id' => $value->getId(),
                    'name' => $value->getName(),
                    'region_id' => $value->getRegion()->getId(),
                    'is_active' => $value->getDeletedAt() ? 0 : 1,
                );
            }
        }

//        $headers = array('Content-type' => 'application-json; charset=utf8');
//        $response = new Response(json_encode($data), 200, $headers);
        $response = new Response(json_encode($data), 200);
        return $response;
    }

    public function synchronizationCountryAction($key)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $client = $em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array(
            'token' => $key,
        ));

        $em->getFilters()->disable('softdeleteable');

        $data = array();
        if (!$client) {
            $data = json_encode(array('Error' => 'No result for your key!'));
        } else {
            $query = $em->getRepository('NitraGeoBundle:Country')->createQueryBuilder('c')
                    ->where('(c.deletedAt IS NULL OR c.deletedAt IS NOT NULL)')
                    ->getQuery()
                    ->getResult();

            foreach ($query AS $key => $value) {
                $data[] = array(
                    'id' => $value->getId(),
                    'name' => $value->getName(),
                    'is_active' => $value->getDeletedAt() ? 0 : 1,
                );
            }
        }

//        $headers = array('Content-type' => 'application-json; charset=utf8');
//        $response = new Response(json_encode($data), 200, $headers);
        $response = new Response(json_encode($data), 200);
        return $response;
    }

}