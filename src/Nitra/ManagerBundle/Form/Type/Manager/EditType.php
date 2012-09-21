<?php

namespace Nitra\ManagerBundle\Form\Type\Manager;

use Admingenerated\NitraManagerBundle\Form\BaseManagerType\EditType as BaseEditType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;
class EditType extends BaseEditType
{

    protected $securityContext;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $choices = array(
            'ROLE_USER' => 'Роль для филиала',
            'ROLE_ADMIN' => 'Роль для менеджера',
            'ROLE_SUPER_ADMIN' => 'Роль для директора'
            );
        $builder->add('username', 'text', array('required' => true,));
        $builder->add('email', 'text', array('required' => true,));
        $builder->add('enabled', 'checkbox', array('required' => false,));
        $builder->add('locked', 'checkbox', array('required' => false,));
        $builder->add('roles', 'choice', array('multiple' => true, 'choices' => $choices, ));
        $builder->add('password', 'password', array('required' => false,));
    }

    public function getName()
    {
        return 'edit_manager';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
