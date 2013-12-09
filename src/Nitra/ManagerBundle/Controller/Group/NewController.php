<?php
namespace Nitra\ManagerBundle\Controller\Group;

use Admingenerated\NitraManagerBundle\BaseGroupController\NewController as BaseNewController;
use JMS\DiExtraBundle\Annotation as DI;
use Nitra\ManagerBundle\Form\Type\Group\NewType;

/**
 * NewController
 */
class NewController extends BaseNewController
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * получить тип создаваемой сущности
     * @return Nitra\ManagerBundle\Form\Type\Group\NewType
     */
    protected function getNewType()
    {
        $type = new NewType($this->em);
        $type->setSecurityContext($this->get('security.context'));
        // вернуть тип формы
        return $type;
    }    
    
}
