<?php
//
//namespace Nitra\DeliveryCostBundle\Controller\IntimeTarify;
//
//use Admingenerated\NitraDeliveryCostBundle\BaseIntimeTarifyController\EditController as BaseEditController;
//
//class EditController extends BaseEditController
//{
//    public function indexAction($type) {
//        
//        if($this->get('request')->getMethod() == 'POST') {
//            // для package-cost:
//            $request = $this->get('request')->request;
//            $packages = $request->get('package');
//            $data = $request->get('data');
//            if($packages) {
//                foreach($packages as $id => $params) {
//                    $package = $this->getDoctrine()
//                                    ->getRepository('NitraDeliveryCostBundle:IntimePackageType')
//                                    ->findOneById($id);
//                    $package->setName($params['name']);
//                    $package->setCost($params['cost']);
//                    $em = $this->getDoctrine()->getEntityManager();
//                    $em->persist($package);
//                    $em->flush();
//                }
//            }
//            if($data) {
////                var_dump($data);die;
//                foreach($data as $id => $params) {
//                    $tarif = $this->getDoctrine()
//                                    ->getRepository('NitraDeliveryCostBundle:IntimeTarify')
//                                    ->findOneById($id);
//                    $tarif->setTarif($params['tarif']);
//                    if(isset($params['tarif_extra'])) {
//                        $tarif->setTarifExtra($params['tarif_extra']);
//                    }
//                    $em = $this->getDoctrine()->getEntityManager();
//                    $em->persist($tarif);
//                    $em->flush();
//                }
//            }
//        }
//        
//        switch ($type) {
//            case "package-cost" :
//                $repository = $this->getDoctrine()
//                    ->getRepository('NitraDeliveryCostBundle:IntimePackageType');
//                $query = $repository->createQueryBuilder('p')
//                    ->orderBy('p.id', 'ASC')
//                    ->getQuery()
//                    ->getArrayResult();
//                break;
//            
//            case "intime-agency" : //тут zone_id IS NULL
//                $repository = $this->getDoctrine()
//                    ->getRepository('NitraDeliveryCostBundle:IntimeTarify');
//                $query = $repository->createQueryBuilder('p')
//                    ->where("p.zone_id is NULL")
//                    ->orderBy('p.id', 'ASC')
//                    ->getQuery()
//                    ->getArrayResult();
//                break;
//            
//            case "doors-doors" : // тут zone_id IS NOT NULL
//                $repository = $this->getDoctrine()
//                    ->getRepository('NitraDeliveryCostBundle:IntimeTarify');
//                $query = $repository->createQueryBuilder('p')
//                    ->where("p.zone_id is not NULL")
//                    ->orderBy('p.id', 'ASC')
//                    ->getQuery()
//                    ->getArrayResult();
//                break;
//        }
////        var_dump($query);die;
//           
//        return $this->render('NitraDeliveryCostBundle:IntimeTarifyEdit:index.html.twig', array('data' => $query, 'type' => $type));
//        
//    }
//  
//}
