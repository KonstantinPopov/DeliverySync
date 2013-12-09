<?php
//
//namespace Nitra\DeliveryCostBundle\Controller\NovaposhtaTarify;
//
//use Symfony\Component\HttpFoundation;
//
//use Admingenerated\NitraDeliveryCostBundle\BaseNovaposhtaTarifyController\EditController as BaseEditController;
//
//class EditController extends BaseEditController
//{
//    public function indexAction($type) {
//        
//        $repository = $this->getDoctrine()
//            ->getRepository('NitraDeliveryCostBundle:NovaposhtaTarify');
//        
//        if($this->get('request')->getMethod() == 'POST') {
//            $data = $this->get('request')->request->get('data');
//            $old_weights = array();
//            foreach($data as $id => $array) {
//                $result = $repository->findOneById($id);
//                if(isset($array['weight'])) {
//                    $old_weight = $result->getWeight();
//                    if($old_weight != $array['weight']) {
//                        $old_weights[$old_weight] = $array['weight'];
//                    }
//                }
//                if(isset($array['tarif'])) {
//                    $result->setTarif($array['tarif']);
//                }
//                
//                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($result);
//                $em->flush();
//            }
//            
//            if(!empty($old_weights)) {
//                foreach($data as $id => $array) {
//                    $result = $repository->findOneById($id);
//                    $old_weight = $result->getWeight();
//                    if(isset($old_weights[$old_weight])) {
//                        if(preg_match('/^[0-9].*$/', $old_weights[$old_weight])) {
//                            $params = explode('-', $old_weights[$old_weight]);
//                            $result->setMin($params[0]);
//                            $result->setMax($params[1]);
//                        }
//                        $result->setWeight($old_weights[$old_weight]);
//                        $em = $this->getDoctrine()->getEntityManager();
//                        $em->persist($result);
//                        $em->flush();
//                    }
//                }
//            }
//        } 
//
//        $types = array ('warehouse-warehouse'   =>  'склад-склад',
//                        'warehouse-doors'       =>  'склад-двери',
//                        'doors-doors'           =>  'двери-двери'
//                        ); 
//              
//        $query = $repository->createQueryBuilder('p')
//            ->where('p.type = :type')
//            ->setParameter('type', $types[$type])
//            ->orderBy('p.zone_id', 'ASC')
//            ->getQuery()
//            ->getArrayResult();
//           
//        return $this->render('NitraDeliveryCostBundle:NovaposhtaTarifyEdit:index.html.twig', array('data' => $query, 'type' => $type));
//        
//    }
//  
//}
