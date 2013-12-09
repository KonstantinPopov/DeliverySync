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
        
        $builder->add('username', 'text', array('required' => true,));
        $builder->add('email', 'text', array('required' => true,));
        $builder->add('enabled', 'checkbox', array('required' => false,));
        $builder->add('locked', 'checkbox', array('required' => false,));
        $builder->add('password', 'password', array('required' => true));
        $builder->add('client', 'entity', array(  'em' => 'default',  'class' => 'Nitra\\DeliveryBundle\\Entity\\Client',  'multiple' => false,  'required' => false,));
        $builder->add('groups', 'doctrine_double_list', array(  'em' => 'default',  'class' => 'Nitra\\ManagerBundle\\Entity\\Group',));
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
