<?php

namespace Nitra\DeliveryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nitra\DeliveryBundle\Entity\Department;

class SyncController extends Controller
{
    
    public function synchronizationAction($key)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $query = $em->createQueryBuilder()
                ->select('ds.name as delivery_service, dc.name as city, d.name as department, d.address as adres, d.phone as phone, d.latitude as latitude, d.longitude as longitude')
                ->from('NitraDeliveryBundle:Department','d')
                ->join('d.deliveryService', 'ds')
                ->join('ds.clients', 'c')
                ->join('d.deliveryCity', ' dc')
//                ->join('dc.city', 'c')
                ->where('c.token = :key')
                ->setParameter('key',$key);
         $departments = $query->getQuery()->getResult();
         if (!count($departments))
         {
             $departments = array('Error' => 'No result for your key!');
         }
         $data = json_encode($departments);
         $headers = array( 'Content-type' => 'application-json; charset=utf8' );
         $response = new Response( $data, 200, $headers );
         return $response;
    }
}