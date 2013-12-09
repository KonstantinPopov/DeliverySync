<?php
namespace Nitra\ManagerBundle\Form\Type\Group;

use Nitra\ManagerBundle\Form\Type\Group\EditType;

/**
 * NewType
 */
class NewType extends EditType
{
    
    /**
     * Получить имя типа-формы 
     * @return string
     */
    public function getName()
    {
        return 'new_group';
    }
    
}
