<?php
namespace Nitra\ManagerBundle\Form\Type\Manager;

use Admingenerated\NitraManagerBundle\Form\BaseManagerType\EditType as BaseEditType;
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
        
        // родитель формы
        parent::buildForm($builder, $options);
        
        // добавить валидатор NotBlank для виджета
        $widget = $builder->get('username');
        $formOptions = $widget->getOptions();
        $formOptions['constraints'] = array(new NotBlank());
        $builder->add($widget->getName(), $widget->getType()->getName(), $formOptions);
        
        // добавить валидатор NotBlank для виджета
        $widget = $builder->get('email');
        $formOptions = $widget->getOptions();
        $formOptions['constraints'] = array(new NotBlank());
        $builder->add($widget->getName(), $widget->getType()->getName(), $formOptions);
        
        // пароль при редактировании не обязательный
        $widget = $builder->get('password');
        $formOptions = $widget->getOptions();
        $formOptions['required'] = false;
        $formOptions['data'] = '';
        $builder->add($widget->getName(), $widget->getType()->getName(), $formOptions);
        
        // виджет группы пользователей checkbox
        $formOptions = $this->getFormOption('groups', array(
            'em' => 'default',
            'class' => 'NitraManagerBundle:Group',
            'multiple' => true,
            'expanded' => true,
            'required' => true,  'label' => 'Группы'));
        $builder->add('groups', 'entity', $formOptions);
        
    }    
    
    
    
}
