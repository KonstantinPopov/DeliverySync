<?php
namespace Nitra\ManagerBundle\Controller\Manager;

use Admingenerated\NitraManagerBundle\BaseManagerController\NewController as BaseNewController;
use Symfony\Component\Form\Form;
use Nitra\ManagerBundle\Entity\Manager;

/**
 * NewController
 */
class NewController extends BaseNewController
{
    
    /**
     * @var string 
     * новый пароль пользователья
     */
    private $newPassword;
    
    /**
     * preSave
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Nitra\ManagerBundle\Entity\Manager $Manager your \Nitra\ManagerBundle\Entity\Manager object
     */
    public function preSave(Form $form, Manager $Manager)
    {
        $this->newPassword = $Manager->getPassword();
    }
    
    /**
     * postSave
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Nitra\ManagerBundle\Entity\Manager $Manager your \Nitra\ManagerBundle\Entity\Manager object
     */
    public function postSave(Form $form, Manager $Manager)
    {
        // вернуть пароль менеджера
        $Manager->setPassword(null);
        $Manager->setPlainPassword($this->newPassword);
        
        // сохранить менеждера
        $em = $this->getDoctrine()->getManager();
        $em->persist($Manager);
        $em->flush();
    }    
    
}
