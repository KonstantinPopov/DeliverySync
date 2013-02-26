<?php

namespace Nitra\DeliveryBundle\Controller\DeliveryCity;

use Admingenerated\NitraDeliveryBundle\BaseDeliveryCityController\EditController as BaseEditController;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditController extends BaseEditController
{

    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;

    public function indexAction($pk)
    {
        $DeliveryCity = $this->getObject($pk);
        if (!$DeliveryCity) {
            throw new NotFoundHttpException("The Nitra\DeliveryBundle\Entity\DeliveryCity with id $pk can't be found");
        }
        $form = $this->createForm($this->getEditType(), $DeliveryCity);
        $countries = $this->em->getRepository('NitraGeoBundle:Country')
                ->createQueryBuilder('c')
                ->orderBy('c.name')
                ->getQuery()
                ->getResult();


        $current_country = 0;
        $current_region = 0;
        $current_city = 0;

        if ($DeliveryCity->getCity()) {
            $current_country = $DeliveryCity->getCity()->getRegion()->getCountry()->getId();
            $current_region = $DeliveryCity->getCity()->getRegion()->getId();
            $current_city = $DeliveryCity->getCity()->getId();
        }

        return $this->render('NitraDeliveryBundle:DeliveryCityEdit:index.html.twig', array(
                    "DeliveryCity" => $DeliveryCity,
                    "form" => $form->createView(),
                    'Countries' => $countries,
                    'current_country' => $current_country,
                    'current_region' => $current_region,
                    'current_city' => $current_city
        ));
    }

    public function updateAction($pk)
    {
        $DeliveryCity = $this->getObject($pk);



        if (!$DeliveryCity) {
            throw new NotFoundHttpException("The Nitra\DeliveryBundle\Entity\DeliveryCity with id $pk can't be found");
        }

        $this->preBindRequest($DeliveryCity);
        $form = $this->createForm($this->getEditType(), $DeliveryCity);
        $form->bindRequest($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $DeliveryCity);
                $this->saveObject($DeliveryCity);
                $this->postSave($form, $DeliveryCity);

                $this->get('session')->setFlash('success', $this->get('translator')->trans("object.saved.success", array(), 'Admingenerator'));

                return new RedirectResponse($this->generateUrl("Nitra_DeliveryBundle_DeliveryCity_list"));
            } catch (\Exception $e) {
                $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
                $this->onException($e, $form, $DeliveryCity);
            }
        } else {
            $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
        }

        $countries = $this->em->getRepository('NitraGeoBundle:Country')
                ->createQueryBuilder('c')
                ->orderBy('c.name')
                ->getQuery()
                ->getResult();

        return $this->render('NitraDeliveryBundle:DeliveryCityEdit:index.html.twig', array(
                    "DeliveryCity" => $DeliveryCity,
                    "form" => $form->createView(),
                    'Countries' => $countries,
        ));
    }

}
