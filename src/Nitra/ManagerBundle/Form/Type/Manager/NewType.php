<?php

namespace Nitra\ManagerBundle\Form\Type\Manager;

use Admingenerated\NitraManagerBundle\Form\BaseManagerType\NewType as BaseNewType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

class NewType extends BaseNewType
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
        $builder->add('roles', 'choice', array('multiple' => true, 'choices' => $choices));
        $builder->add('password', 'password', array('required' => true));
    }

    public function getName()
    {
        return 'new_manager';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
