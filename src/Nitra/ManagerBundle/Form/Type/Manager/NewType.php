<?php
namespace Nitra\ManagerBundle\Form\Type\Manager;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Nitra\ManagerBundle\Form\Type\Manager\EditType;

/**
 * NewType
 */
class NewType extends EditType
{
    
    /**
     * buildForm
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        // родитель формы
        parent::buildForm($builder, $options);
        
        // добавить валидатор NotBlank для виджета
        $widget = $builder->get('password');
        $formOptions = $widget->getOptions();
        $formOptions['constraints'] = array(new NotBlank());
        $builder->add($widget->getName(),  $widget->getType()->getName(), $formOptions);
    }    
    
    /**
     * Получить имя типа-формы 
     * @return string
     */
    public function getName()
    {
        return 'new_manager';
    }
    
}
