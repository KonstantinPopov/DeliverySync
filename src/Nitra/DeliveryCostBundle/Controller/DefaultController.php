<?php

namespace Nitra\DeliveryCostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

//use Nitra\DeliveryCostBundle\Entity\IntimeZone; 

class DefaultController extends Controller
{

    public function recieveDataAction($params = null) 
    { 
//
//        $params = array('from_city' => 'Александрия', 
//                        'to_city' => 'Алушта',
//                        'weight' => 48.9,
//                        'cost' => 200,
//                        'delivery_type' => 'двери-двери',
//                        'package_name' => 'Конверт фирменный бумажный А4', 
//                        'width' => 1.12,
//                        'length' => 2.98,
//                        'heigth' => 1.134
//                        );
//        
//        $data = json_encode($params);
//
//        $data = json_decode($data, true);
//        
//        // Проверка входящих данных:
//        if(!isset($data['from_city']) || !isset($data['to_city']) || !isset($data['delivery_type']) || !isset($data['cost'])) {
//            die('Не все обязательные параметры были указаны: [from_city = город-отправитель; to_city = город-получатель; delivery_type = тип доставки; cost = оценочная стоимость]');
//        }
//        
//        if(!isset($data['weight']) && (!isset($data['width']) || !isset($data['length']) || !isset($data['heigth']))) {
//            die('Не указаны параметры груза: [weight = вес(кг) или параметры объема: width, length, heigth]');
//        }
//        
//        $intime_cost = $this->calculateDeliveryTimeIntime($data);
//        $nova_poshta_cost = $this->calculateDeliveryTimeNovaPoshta($data);
//        
//        return min($intime_cost, $nova_poshta_cost);
//    }    
//        
//    private function calculateDeliveryTimeNovaPoshta($data) 
//    {
//        if(isset($data['width']) && isset($data['length']) && isset($data['heigth'])) {
//            $volume_weight = ($data['length'] * $data['width'] * $data['heigth'])/4000;
//        }
//        else {
//            $volume_weight = 0;
//        }
//        if(isset($data['weight'])) {
//            $weight = $data['weight'];
//        }
//        else {
//            $weight = 0;
//        }
//        
//        $weight = ($weight > $volume_weight) ? $weight : $volume_weight;  
//        $volume = $weight;
//        
//        $em = $this->getDoctrine()->getEntityManager();
//               
//        $nova_poshta_deskbook = $em->createQuery('SELECT p FROM NitraDeliveryBundle:DeliveryService p WHERE p.name = :name')
//            ->setParameter('name', 'Новая почта')
//            ->getSingleResult();
//        
//        $zone_id = $em->createQuery('
//            SELECT p FROM NitraDeliveryCostBundle:NovaposhtaZone p 
//            WHERE p.to_city = :to_city 
//            AND p.from_city = :from_city')
//        ->setParameters(array(
//            'from_city' => $data['from_city'],
//            'to_city' => $data['to_city']))
//        ->getSingleResult()->getZoneId();
//
//        $commision_sum = $nova_poshta_deskbook->getCommission()/100 * $data['cost'];
//        $commision_sum = ($commision_sum < $nova_poshta_deskbook->getMinCommission()) ? $nova_poshta_deskbook->getMinCommission() : $commision_sum;
//        
//        //проверка не привышен ли вес на тариф для максимального веса (для всех кроме склад-склад)
//        if($data['delivery_type'] != 'склад-склад') {
//            if($data['delivery_type'] == 'склад-двери') {
//                $max_limit = $em->createQuery("
//                    SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
//                    WHERE p.type =:type
//                    AND p.weight LIKE '%кг%'")
//                ->setParameter('type', $data['delivery_type'])
//                ->getSingleResult();
//            }
//            else {
//                $max_limit = $em->createQuery("
//                    SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
//                    WHERE p.type =:type
//                    AND p.zone_id =:zone_id
//                    AND p.weight LIKE '%кг%'")
//                ->setParameters(array(
//                    'type' => $data['delivery_type'],
//                    'zone_id' => $zone_id))
//                ->getSingleResult();
//            }
//            $max_weight = explode(' ', $max_limit->getWeight());
//            $min_max = array();
//            foreach($max_weight as $value) {
//                if((int)$value != 0) {
//                    $min_max[] = $value;
//                }
//            }
//            if(count($min_max) == 2 && $weight > $min_max[1]) {
//                $extra_weight = 0;
//                
//                // по документации новой почты должно работать так: (за каждые 500 кг после макс. порога прибаляет дополнительный тариф)
////                while($weight > $min_max[1] && (($weight - $min_max[0]) >= $min_max[1])) {
////                    $weight = $weight - $min_max[0];
////                    $extra_weight++;
////                }
////                
//                // а работает у них так: (если есть хоть 1 кг после макс. порога прибаляет дополнительный тариф)
//                while($weight > $min_max[1]) {
//                    $float = round(($weight - floor($weight)), 4); // точность до 1/10 грамма
//                    if($float >= 0.005) { 
//                    $weight = ceil($weight);
//                    }
//                    else {
//                    $weight = floor($weight);
//                    }
//                    if(($weight - $min_max[0]) >= $min_max[1]) {
//                        $weight = $weight - $min_max[0]; 
//                        $extra_weight++;
//                    }
//                    else {
//                        $extra_weight++;
//                        break;
//                    }
//                }
//                // обрезка значения веса, чтобы смогло найти по нему в базе
//                $weight = $min_max[1];
//            }
//        }
//        //расчеты для технологий
//        if($data['delivery_type'] != 'двери-двери') { 
//            $tarif_from_deskbook = $em->createQuery('
//                SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p 
//                WHERE p.type = :type 
//                AND p.zone_id =:zone_id'
//                )
//            ->setParameters(array(
//                'type' => 'склад-склад',
//                'zone_id' => $zone_id))
//            ->getSingleResult()
//            ->getTarif();
//            $tarif = $tarif_from_deskbook * $volume;
//            
//            if($data['delivery_type'] == 'склад-двери') { 
//                
//                // округление веса в соответствии тому, как это делает новая почта:
//                if($weight < 2) { // фирменный конверт или пакет
//                    if($weight >= 1.995) {
//                        $weight = round($weight);
//                    }
////                    $weight = round($weight, 3); // точность до грамма
//                }
//                else {  //  до 5-ти грамм не включительно округляет в меньшую сторону, если больше - то + 1 кг
//                    $float = round(($weight - floor($weight)), 4); // точность до 1/10 грамма
//                    if($float >= 0.005) { 
//                        $weight = ceil($weight);
//                    }
//                    else {
//                        $weight = floor($weight);
//                    }
//                }
//                
//                $sql = 'SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p
//                    WHERE p.type = :type AND p.min <=:weight AND p.max >=:weight';
//                
//                $tarif_from_deskbook = $em->createQuery($sql)
//                ->setParameters(array(
//                    'type' => $data['delivery_type'],
//                    'weight' => $weight))
//                ->getSingleResult()
//                ->getTarif();
//                $tarif += $tarif_from_deskbook;
//            }
//        }
//        else { 
//            $sql = 'SELECT p FROM NitraDeliveryCostBundle:NovaposhtaTarify p 
//                WHERE p.type = :type 
//                AND p.zone_id =:zone_id 
//                AND p.min <=:weight 
//                AND p.max >=:weight';
//
//            // округление веса в соответствии тому, как это делает новая почта:
//            if($weight < 2) { // фирменный конверт или пакет
//                $weight = round($weight, 3); // точность до грамма
//            }
//            else {  //  до 5-ти грамм не включительно округляет в меньшую сторону, если больше - то + 1 кг
//                $float = round(($weight - floor($weight)), 4); // точность до 1/10 грамма
//                if($float >= 0.005) { 
//                    $weight = ceil($weight);
//                }
//                else {
//                    $weight = floor($weight);
//                }
//            }
//            
//            $tarif = $em->createQuery($sql)
//                ->setParameters(array(
//                    'type' => $data['delivery_type'],
//                    'weight' => $weight,
//                    'zone_id' => $zone_id))
//                ->getSingleResult()
//                ->getTarif();
//            
//            // для типа доставки "дверь-дверь" сумма оформления не учитывается, хотя в документации у них такого и не описано
//            $nova_poshta_deskbook->setRegistrationCost(0);
//        }
//        // добавление к тарифу за каждые n кг (500 кг) если есть
//        if(isset($extra_weight)) {
//            $extra_tarif = $max_limit->getTarif() * $extra_weight;
//            $tarif += $extra_tarif; 
//        }
////        echo "Нова Пошта : Вартість перевезення:".$tarif.", Цена регистрации: ".$nova_poshta_deskbook->getRegistrationCost().", сумма комиссии: ".$commision_sum;
//        $total_cost = $tarif + $nova_poshta_deskbook->getRegistrationCost() + $commision_sum;
////        echo "Общая сумма: ". $total_cost. "<br>";
//        return round($total_cost);
//    
//    }
//    
//    private function calculateDeliveryTimeIntime($data) 
//    { 
//        if(isset($data['width']) && isset($data['length']) && isset($data['heigth'])) {
//            $size = $data['length'] * $data['width'] * $data['heigth'] * 0.000001;
//        }
//        else {
//            $size = NULL;
//        }
//        
//        $weight = isset($data['weight']) ? $data['weight'] : NULL;
//        
//        $em = $this->getDoctrine()->getEntityManager();
//        
//        if(isset($data['package_name'])) {
//            $package_cost = $em->createQuery('SELECT p FROM NitraDeliveryCostBundle:IntimePackageType p WHERE p.name = :name')
//                ->setParameter('name', $data['package_name'])
//                ->getSingleResult()
//                ->getCost();
//        }
//        else {
//            $package_cost = 0;
//        }
//        $intime_deskbook = $em->createQuery('SELECT p FROM NitraDeliveryBundle:DeliveryService p WHERE p.name = :name')
//            ->setParameter('name', 'ИнТайм')
//            ->getSingleResult();
//        
//        $commision_sum = $intime_deskbook->getCommission()/100 * $data['cost'];
//        $commision_sum = ($commision_sum < $intime_deskbook->getMinCommission()) ? $intime_deskbook->getMinCommisson() : $commision_sum;
//        
//        // если груз до 30 кг и 0,1 м3 считаем по единому тарифу
//        // В документации на сайте Интайма это указано, но такого они не делает
////        if($weight) {
////            if($weight < 30) { 
////                $total_cost = $weight + $intime_deskbook->getRegistrationCost() + $commision_sum + $package_cost;
////                return $total_cost;
////            }
////        }
////        elseif($size < 0.1) {
////            $total_cost = $size*250 + $intime_deskbook->getRegistrationCost() + $commision_sum + $package_cost;
////            return $total_cost;
////        }
//        
//        // расчёт тарифа
//        if($data['delivery_type'] != 'двери-двери') { 
//            
//            $tarif_weight = 0;
//            $tarif_size = 0;
//            
//            $tarif_for_zone = $em->createQuery('
//                    SELECT p FROM NitraDeliveryCostBundle:IntimeZone p 
//                    WHERE p.to_city = :to_city 
//                    AND p.from_city = :from_city')
//                ->setParameters(array(
//                    'from_city' => $data['from_city'],
//                    'to_city' => $data['to_city']))
//                ->getSingleResult();
//            
//            if($weight) { 
//                $tarif_weight = $tarif_for_zone->getTarif() * $weight;
//            }
//            if($size) { 
//                $tarif_size = $tarif_for_zone->getTarifForSector() * $size;
//            }
//            
//            // интайм выбирает там где тариф выходит больше
//            $tarif = ($tarif_weight > $tarif_size) ? $tarif_weight : $tarif_size; 
//                    
//            if($data['delivery_type'] == 'склад-двери') {
//                $sql = 'SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p WHERE p.zone_id IS NULL AND ';
//                
//                // для технологии двери-двери если указана упаковка и вес меньше 10 то считает тарифы по типу упаковки
//                if(isset($data['package_name'])) {
//                    if($data['package_name'] == 'Конверт фирменный бумажный А4') {
//                        $package_type = 'Конверт фирменный';
//                        $min = $em->createQuery('
//                            SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p 
//                            WHERE p.zone_id IS NULL AND p.city IS NULL 
//                            AND p.weigth_min = 0')
//                        ->getSingleResult();
//                    }
//                    elseif($data['package_name'] == 'Пакет фирменный пластиковый А3') {
//                        $package_type = 'Пакет фирменный';
//                        $min = $em->createQuery('
//                            SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p 
//                            WHERE p.zone_id IS NULL AND p.city IS NULL 
//                            AND p.weigth_min = 0')
//                        ->getSingleResult();
//                    }
//                }
//
//                if($weight && $tarif_weight > $tarif_size) { 
//                    if(isset($min) && ($weight < $min->getWeigthMax())) {
//                        $sql .= 'p.package_type = :parametr';
//                        $parametr = $package_type;
//                    }
//                    else {
//                        $sql .= 'p.package_type IS NULL AND p.weigth_min <= :parametr AND p.weigth_max >= :parametr ';
//                         $parametr = floor($weight);
//                    }
//                    
//                }
//                else {
//                    if(isset($min) && ($size < $min->getSizeMax())) {
//                        $sql .= 'p.package_type = :parametr';
//                        $parametr = $package_type;
//                    }
//                    else {
//                        $sql .= 'p.package_type IS NULL AND p.size_min <= :parametr AND p.size_max >= :parametr ';
//                        $parametr = round($size, 2);
//                    }
//                }
//
//                if($data['from_city'] == 'Киев' && $data['to_city'] == 'Киев') { 
//                    $sql .= ' AND p.city = :city';
//                    $tarif_from_deskbook = $em->createQuery($sql)
//                        ->setParameters(array(
//                            'city' => $data['from_city'],
//                            'parametr' => $parametr))
//                        ->getSingleResult()
//                        ->getTarif();  
//                } 
//                else {
//                    $sql .= ' AND p.city IS NULL';
//                    $tarif_from_deskbook = $em->createQuery($sql)
//                        ->setParameter('parametr', $parametr)
//                        ->getSingleResult()
//                        ->getTarif(); 
//                }
//                echo $tarif_from_deskbook; echo PHP_EOL; echo $tarif."<br>"; //die;
//                $tarif += $tarif_from_deskbook;
//            }
//        }
//     
//        else {
//            $zone_id = $em->createQuery('
//                    SELECT p FROM NitraDeliveryCostBundle:IntimeZone p 
//                    WHERE p.to_city = :to_city 
//                    AND p.from_city = :from_city')
//                ->setParameters(array(
//                    'from_city' => $data['from_city'],
//                    'to_city' => $data['to_city']))
//                ->getSingleResult()
//                ->getZoneId();
//            
//            $sql = 'SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p WHERE p.zone_id = :zone_id AND ';
//                
//                // для технологии двери-двери если указана упаковка и вес меньше 10 то считает тарифы по типу упаковки
//                if(isset($data['package_name'])) {
//                    if($data['package_name'] == 'Конверт фирменный бумажный А4') {
//                        $package_type = 'Конверт фирменный';
//                        $min = $em->createQuery('
//                            SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p 
//                            WHERE p.zone_id = :zone_id 
//                            AND p.weigth_min = 0')
//                        ->setParameter('zone_id', $zone_id)
//                        ->getSingleResult();
//                    }
//                    elseif($data['package_name'] == 'Пакет фирменный пластиковый А3') {
//                        $package_type = 'Пакет фирменный';
//                        $min = $em->createQuery('
//                            SELECT p FROM NitraDeliveryCostBundle:IntimeTarify p 
//                            WHERE p.zone_id = :zone_id 
//                            AND p.weigth_min = 0')
//                        ->setParameter('zone_id', $zone_id)
//                        ->getSingleResult();
//                    }
//                }
//
//                if($weight) {
//                    if(isset($min) && ($weight < $min->getWeigthMax())) {
//                        $sql .= 'p.package_type = :parametr';
//                        $parametr = $package_type;
//                    }
//                    else {
//                        $sql .= 'p.package_type IS NULL AND p.weigth_min <= :parametr AND p.weigth_max >= :parametr ';
//                        $parametr = floor($weight);
//                    }
//                    
//                }
//                else {
//                    if(isset($min) && ($size < $min->getSizeMax())) {
//                        $sql .= 'p.package_type = :parametr';
//                        $parametr = $package_type;
//                    }
//                    else {
//                        $sql .= 'p.package_type IS NULL AND p.size_min <= :parametr AND p.size_max >= :parametr ';
//                        $parametr = round($size, 2);
//                    }
//                }
//                
//                $tarif_from_deskbook = $em->createQuery($sql)
//                    ->setParameters(array(
//                        'zone_id' => $zone_id,
//                        'parametr' => $parametr))
//                    ->getSingleResult();
//                
//                $tarif = $tarif_from_deskbook->getTarif();
//                
//                if($tarif_from_deskbook->getTarifExtra()) {
//                    if(!$weight) {
//                        $weight = $size/4000;
//                    }
//                        $tarif += ($weight - $tarif_from_deskbook->getWeigthMin()) * $tarif_from_deskbook->getTarifExtra();
//                } 
//                
//        }
////        echo "Интайм: стоимость по массе:".$tarif.", Цена регистрации: ".$intime_deskbook->getRegistrationCost().", сумма комиссии: ".$commision_sum.", стоимость упаковки: ".$package_cost;
//        $total_cost = $tarif + $intime_deskbook->getRegistrationCost() + $commision_sum + $package_cost;
////        echo ". Общая сумма: ".$total_cost .'<br>';
//        return $total_cost;
    }
}
