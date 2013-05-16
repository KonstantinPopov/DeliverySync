<?php

namespace Nitra\DeliveryCostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
   
    public function recieveDataAction($params = null) 
    { 

        $params = array('from_city' => 'Харьков', 
                        'to_city' => 'Полтава',
                        'weight' => '2500',
//                        'packet_type' => 'Фирменный пакет и конверт',
                        'cost' => '2500',
                        'delivery_type' => 'склад-двери',
//                        'width' => '100',
//                        'length' => '100',
//                        'heigth' => '90'
                        );
        
        $data = json_encode($params);

        $data = json_decode($data, true);
        $nova_poshta_cost = $this->calculateDeliveryTimeNovaPoshta($data);
//        var_dump($nova_poshta_cost);die;
    }    
        
     
    private function calculateDeliveryTimeNovaPoshta($data) 
    {
        if(isset($data['width']) && isset($data['length']) && isset($data['heigth'])) {
            $weight = ($data['length'] * $data['width'] * $data['heigth'])/4000;
        }
        else {
            $weight = $data['weight'];
        }
        $em = $this->getDoctrine()->getEntityManager();
               
        $nova_poshta_deskbook = $em->createQuery('SELECT p FROM NitraDeliveryBundle:DeliveryService p WHERE p.name = :name')
            ->setParameter('name', 'Новая почта')
            ->getSingleResult();
        
        $zone_id = $em->createQuery('
            SELECT p FROM NitraDeliveryCostBundle:NovaposhtaZone p 
            WHERE p.to_city = :to_city 
            AND p.from_city = :from_city')
        ->setParameters(array(
            'from_city' => $data['from_city'],
            'to_city' => $data['to_city']))
        ->getSingleResult()->getZoneId();

        $commision_sum = $nova_poshta_deskbook->getCommission()/100 * $data['cost'];
        $commision_sum = ($commision_sum < $nova_poshta_deskbook->getMinCommission()) ? $nova_poshta_deskbook->getMinCommisson() : $commision_sum;
        
        
        //проверка не привышен ли вес на тариф для максимального веса (для всех кроме склад-склад)
        if($data['delivery_type'] != 'склад-склад') {
            $volume = $weight; // обьем для технологии склад-двери
            if($data['delivery_type'] == 'склад-двери') {
                $max_limit = $em->createQuery("
                    SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
                    WHERE p.type =:type
                    AND p.weight LIKE '%кг%'")
                ->setParameter('type', $data['delivery_type'])
                ->getSingleResult();
            }
            else {
                $max_limit = $em->createQuery("
                    SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
                    WHERE p.type =:type
                    AND p.zone_id =:zone_id
                    AND p.weight LIKE '%кг%'")
                ->setParameters(array(
                    'type' => $data['delivery_type'],
                    'zone_id' => $zone_id))
                ->getSingleResult();
            }
            $max_weight = explode(' ', $max_limit->getWeight());
            $min_max = array();
            foreach($max_weight as $value) {
                if((int)$value != 0) {
                    $min_max[] = $value;
                }
            }
            if(count($min_max) == 2 && $weight > $min_max[1]) {
                $extra_weight = 0;
                while($weight > $min_max[1] && (($weight - $min_max[0]) >= $min_max[1])) {
                    $weight = $weight - $min_max[0];
                    $extra_weight++;
                }
                // обрезка значения веса, чтобы смогло найти по нему в базе
                $weight = $min_max[1];
            }
        }
        //расчеты для технологий
        if($data['delivery_type'] != 'двери-двери') { 
            $tafif_from_deskbook = $em->createQuery('
                SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p 
                WHERE p.type = :type 
                AND p.zone_id =:zone_id'
                )
            ->setParameters(array(
                'type' => 'склад-склад',
                'zone_id' => $zone_id))
            ->getSingleResult()
            ->getTarif();
            
            $tarif = $tafif_from_deskbook * $volume;
            
            if($data['delivery_type'] == 'склад-двери') {
                $sql = 'SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
                    WHERE p.type = :type AND ';
                if(isset($data['packet_type'])) {
                    $sql .= 'p.weight =:weight';
                    $weight = $data['packet_type'];
                }
                else {
                    $sql .= 'p.min <=:weight AND p.max >=:weight';
                }
                $tafif_from_deskbook = $em->createQuery($sql)
                ->setParameters(array(
                    'type' => $data['delivery_type'],
                    'weight' => $weight))
                ->getSingleResult()
                ->getTarif();
                $tarif += $tafif_from_deskbook;
            }
        }
        else {
            $sql = 'SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p 
                WHERE p.type = :type AND p.zone_id =:zone_id AND ';
            if(isset($data['packet_type'])) {
                $sql .= 'p.weight =:weight';
                $weight = $data['packet_type'];
            }
            else {
                $sql .= 'p.min <=:weight AND p.max >=:weight';
            }
            $tarif = $em->createQuery($sql)
                ->setParameters(array(
                    'type' => $data['delivery_type'],
                    'weight' => $weight,
                    'zone_id' => $zone_id))
                ->getSingleResult()
                ->getTarif();
            
        }
        // добавление к тарифу за каждые n кг (500 кг) если есть
        if(isset($extra_weight)) {
            $extra_tarif = $max_limit->getTarif() * $extra_weight;
            $tarif += $extra_tarif; 
        }
        $total_cost = $tarif + $nova_poshta_deskbook->getRegistrationCost() + $commision_sum;
        return $total_cost;
    
    }
    private function calculateDeliveryTimeIntime($data) 
    {
        
    }
}
