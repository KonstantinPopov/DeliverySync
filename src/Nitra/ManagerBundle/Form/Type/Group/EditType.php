<?php
namespace Nitra\ManagerBundle\Form\Type\Group;

use Admingenerated\NitraManagerBundle\Form\BaseGroupType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;


/**
 * EditType
 */
class EditType extends BaseEditType
{
    /**
     * @var EntityManager
     */
    private $em;
    
    /**
     * Constructor
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * buildForm
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // построить форму родителем
        parent::buildForm($builder, $options);
        
        // виджет привелегии 
        $label = $builder->get('roles')->getOption('label');
        $choices = $this->em->getRepository('NitraManagerBundle:Role')->getRolesToChoice();
        $builder->add('roles', 'choice', array('multiple' => true, 'choices' => $choices, 'label' => $label));

    }
    
}
