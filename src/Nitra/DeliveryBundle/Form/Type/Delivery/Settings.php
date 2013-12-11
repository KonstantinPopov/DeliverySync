<?php
namespace Nitra\DeliveryBundle\Form\Type\DeliveryOrderEntry;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Doctrine\ORM\EntityRepository;

/**
 * SettingsType
 * Настройки формы
 */
class SettingsType extends AbstractType
{
    
    /**
     * buildForm
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
    }

    /**
     * form name
     */
    public function getName()
    {
        return 'settings';
    }
    
}
