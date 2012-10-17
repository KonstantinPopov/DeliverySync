<?php

namespace Nitra\DeliveryBundle\Controller\Client;

use Admingenerated\NitraDeliveryBundle\BaseClientController\EditController as BaseEditController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditController extends BaseEditController
{

    public function indexAction($pk)
    {
        if (!$this->getUser()->hasRole('ROLE_SUPER_ADMIN')) {
            if (($this->getUser()->hasRole('ROLE_CLIENT')) && ($pk == $this->getUser()->getClientId())) {
                return parent::indexAction($pk);
            } else {
                throw $this->createNotFoundException('The client does not exist');
            }
        }
        return parent::indexAction($pk);
    }

    public function updateAction($pk)
    {
        if (!$this->getUser()->hasRole('ROLE_SUPER_ADMIN')) {
            
            if (($this->getUser()->hasRole('ROLE_CLIENT')) && ($pk == $this->getUser()->getClientId())) {
                return parent::updateAction($pk);
            } else {
                throw $this->createNotFoundException('The client does not exist');
            }
        }
           return parent::updateAction($pk);
    }

}
