<?php

namespace Nitra\DeliveryCostBundle\Controller\IntimeTarify;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class EditParamsController extends Controller
{
    
    public function indexAction() 
    {   
        if($this->get('request')->getMethod() == 'POST') {
            $post = $this->get('request')->request;
            $new = $post->get('params'); 
            $get = $this->get('request')->query;
            $weigth_min = $get->get('weigth_min');
            $weigth_max = $get->get('weigth_max');
            $size_min = $get->get('size_min');
            $size_max = $get->get('size_max');
            $package_type = $get->get('package_type');
            $type = $get->get('type');
            // определение по есть ли зоны по типу, чтобы делать корректное сохранение
            if($type == 'doors-doors') {
                $zone_id_status = 'p.zone_id IS NOT NULL';
            }
            else {
                $zone_id_status = 'p.zone_id IS NULL';
            }
            
            $repository = $this->getDoctrine()
                ->getRepository('NitraDeliveryCostBundle:IntimeTarify');
            
            $em = $this->getDoctrine()->getEntityManager();
            
                if($package_type) {
                    $result = $repository->createQueryBuilder('p')
                        ->andWhere('p.package_type = :package_type')
                        ->andWhere($zone_id_status)
                        ->setParameter('package_type', $package_type)
                        ->getQuery()
                        ->getArrayResult();
                    
                    foreach($result as $value) {
                        $object = $repository->findOneById($value['id']);
                        $object->setPackageType($new['package_type']);
                        $em->persist($object);
                        $em->flush();
                    }
                }
                else {
                    if($size_min && $weigth_min) {
                        if($size_max && $weigth_max) {
                            $result = $repository->createQueryBuilder('p')
                                ->andWhere('p.size_min = :size_min')
                                ->andwhere('p.weigth_min = :weigth_min')
                                ->andWhere('p.size_max = :size_max')
                                ->andwhere('p.weigth_max = :weigth_max')
                                ->andWhere($zone_id_status)
                                ->setParameter('weigth_min', $weigth_min)
                                ->setParameter('size_min', $size_min)
                                ->setParameter('weigth_max', $weigth_max)
                                ->setParameter('size_max', $size_max)
                                ->getQuery()
                                ->getArrayResult();
                            
                            foreach($result as $value) {
                                $object = $repository->findOneById($value['id']);
                                $object->setSizeMax($new['size_max']);
                                $object->setSizeMin($new['size_min']);
                                $object->setWeigthMax($new['weigth_max']);
                                $object->setWeigthMin($new['weigth_min']);
                                $em->persist($object);
                                $em->flush();
                            }
                        }
                        else {
                            $result = $repository->createQueryBuilder('p')
                                ->andWhere('p.size_min = :size_min')
                                ->andwhere('p.weigth_min = :weigth_min')
                                ->andWhere($zone_id_status)
                                ->setParameter('weigth_min', $weigth_min)
                                ->setParameter('size_min', $size_min)
                                ->getQuery()
                                ->getArrayResult();
                            
                             foreach($result as $value) {
                                $object = $repository->findOneById($value['id']);
                                $object->setSizeMin($new['size_min']);
                                $object->setWeigthMin($new['weigth_min']);
                                $em->persist($object);
                                $em->flush();
                            }
                        }
                    }
                    else {
                        $result = $repository->createQueryBuilder('p')
                            ->andWhere('p.size_max = :size_max')
                            ->andwhere('p.weigth_max = :weigth_max')
                            ->andWhere($zone_id_status)
                            ->setParameter('weigth_max', $weigth_max)
                            ->setParameter('size_max', $size_max)
                            ->getQuery()
                            ->getArrayResult();
                        
                        foreach($result as $value) {
                            $object = $repository->findOneById($value['id']);
                            $object->setSizeMax($new['size_max']);
                            $object->setWeigthMax($new['weigth_max']);
                            $em->persist($object);
                            $em->flush();
                        }
                    }
                }
                
                return $this->forward('NitraDeliveryCostBundle:IntimeTarify\Edit:index', array('type' => $type));
        }
        
        if($this->get('request')->getMethod() == 'GET') {
            $request = $this->get('request')->query;
            
            $params['id'] = $request->get('id');
            $params['weigth_min'] = $request->get('weigth_min');
            $params['weigth_max'] = $request->get('weigth_max');
            $params['size_min'] = $request->get('size_min');
            $params['size_max'] = $request->get('size_max');
            $params['package_type'] = $request->get('package_type');
            $type = $request->get('type');
            
            return $this->render('NitraDeliveryCostBundle:IntimeTarifyEditParams:index.html.twig', array('params' => $params, 'type' => $type));
        
        }
    }
}

