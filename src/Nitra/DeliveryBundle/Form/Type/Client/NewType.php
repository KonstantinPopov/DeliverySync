<?php
namespace Nitra\DeliveryBundle\Form\Type\Client;

use Nitra\DeliveryBundle\Form\Type\Client\EditType;

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
        return 'new_client';
    }
    
}
