<?php
namespace Nitra\ManagerBundle\Controller\Group;

use Admingenerated\NitraManagerBundle\BaseGroupController\EditController as BaseEditController;
use JMS\DiExtraBundle\Annotation as DI;
use Nitra\ManagerBundle\Form\Type\Group\EditType;

/**
 * EditController
 */
class EditController extends BaseEditController
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * получить тип обновяемой сущности
     * @return Nitra\ManagerBundle\Form\Type\Group\EditType
     */
    protected function getEditType()
    {
        $type = new EditType($this->em);
        $type->setSecurityContext($this->get('security.context'));
        // вернуть тип формы
        return $type;
    }
    
}
