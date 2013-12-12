<?php
namespace Nitra\DeliveryBundle\Form\Type\Client;

use Admingenerated\NitraDeliveryBundle\Form\BaseClientType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * EditType
 */
class EditType extends BaseEditType
{
    
    /**
     * buildForm
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        // построить форму родителем
        parent::buildForm($builder, $options);
        
        // добавить валидатор NotBlank для виджета
        $widget = $builder->get('name');
        $formOptions = $widget->getOptions();
        $formOptions['constraints'] = array(new NotBlank());
        $builder->add($widget->getName(), $widget->getType()->getName(), $formOptions);
        
        // виджет ТК клиента checkbox
        $formOptions = $this->getFormOption('deliveries', array(
            'em' => 'default',
            'class' => 'NitraDeliveryBundle:Delivery',
            'multiple' => true,
            'expanded' => true,
            'required' => true,  'label' => 'ТК'));
        $builder->add('deliveries', 'entity', $formOptions);    
    }    
    
    
}
