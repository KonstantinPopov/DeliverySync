<?php

namespace Nitra\ManagerBundle\Controller\Manager;

use Admingenerated\NitraManagerBundle\BaseManagerController\NewController as BaseNewController;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\RedirectResponse;
class NewController extends BaseNewController
{

    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;

    public function createAction()
    {
        $Manager = $this->getNewObject();
        $form = $this->createForm($this->getNewType(), $Manager);
        $form->bindRequest($this->get('request'));
        if ($form->isValid()) {
            try {
                $this->preSave($form, $Manager);
                $pass = $Manager->getPassword();
                $this->saveObject($Manager);
                $Manager->setPassword(null);
                $Manager->setPlainPassword($pass);
                
                $this->em->persist($Manager);
                $this->em->flush();
                
                $this->postSave($form, $Manager);
                $this->get('session')->setFlash('success', $this->get('translator')->trans("object.saved.success", array(), 'Admingenerator'));

                return new RedirectResponse($this->generateUrl("Nitra_ManagerBundle_Manager_edit", array('pk' => $Manager->getId())));
            } catch (\Exception $e) {
                $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
                $this->onException($e, $form, $Manager);
            }
        } else {
            $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
        }

        return $this->render('NitraManagerBundle:ManagerNew:index.html.twig', array(
                    "Manager" => $Manager,
                    "form" => $form->createView(),
                ));
    }

}
