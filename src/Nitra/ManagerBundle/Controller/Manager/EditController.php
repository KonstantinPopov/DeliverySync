<?php

namespace Nitra\ManagerBundle\Controller\Manager;

use Admingenerated\NitraManagerBundle\BaseManagerController\EditController as BaseEditController;

use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditController extends BaseEditController
{
     /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    public function updateAction($pk)
    {
        $Manager = $this->getObject($pk);

        $old_pass = $Manager->getPassword();
        if (!$Manager) {
            throw new NotFoundHttpException("The Nitra\ManagerBundle\Entity\Manager with id $pk can't be found");
        }

        $this->preBindRequest($Manager);
        $form = $this->createForm($this->getEditType(), $Manager);
        $form->bindRequest($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Manager);
                $pass = $Manager->getPassword();
                if(!is_null($pass)) {
                    $this->saveObject($Manager);
                    $Manager->setPassword(null);
                    $Manager->setPlainPassword($pass);
                } else {
                    $Manager->setPassword($old_pass);
                }
                $this->saveObject($Manager);
                
                $this->em->persist($Manager);
                $this->em->flush();

                $this->get('session')->setFlash('success', $this->get('translator')->trans("object.saved.success", array(), 'Admingenerator'));
                return new RedirectResponse($this->generateUrl("Nitra_ManagerBundle_Manager_edit", array('pk' => $pk)));
            } catch (\Exception $e) {
                $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
                $this->onException($e, $form, $Manager);
            }
        } else {
            $this->get('session')->setFlash('error', $this->get('translator')->trans("object.saved.error", array(), 'Admingenerator'));
        }

        return $this->render('NitraManagerBundle:ManagerEdit:index.html.twig', array(
                    "Manager" => $Manager,
                    "form" => $form->createView(),
                ));
    }
}
