<?php

namespace Nitra\ManagerBundle\Controller\Group;

use Admingenerated\NitraManagerBundle\BaseGroupController\EditController as BaseEditController;
use Nitra\ManagerBundle\Form\Type\Group\EditType;

class EditController extends BaseEditController
{
     protected function getEditType()
    {
        $type = new EditType($this->getDoctrine()->getEntityManager());
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }
}
