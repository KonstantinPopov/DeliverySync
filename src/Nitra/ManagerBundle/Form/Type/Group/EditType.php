<?php

namespace Nitra\ManagerBundle\Form\Type\Group;

use Admingenerated\NitraManagerBundle\Form\BaseGroupType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;

class EditType extends BaseEditType
{

    protected $securityContext;
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('required' => true,));
        $choices = $this->em->getRepository('NitraManagerBundle:Role')->getRolesToChoice();
        $builder->add('roles', 'choice', array('multiple' => true, 'choices' => $choices));
    }

    public function getName()
    {
        return 'new_group';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
