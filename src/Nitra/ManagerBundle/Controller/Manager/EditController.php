<?php
namespace Nitra\ManagerBundle\Controller\Manager;

use Admingenerated\NitraManagerBundle\BaseManagerController\EditController as BaseEditController;
use Symfony\Component\Form\Form;
use Nitra\ManagerBundle\Entity\Manager;

/**
 * EditController
 */
class EditController extends BaseEditController
{
    
    /**
     * @var string 
     * старый пароль пользователья
     */
    private $oldPassword;
    
    /**
     * @var string 
     * новый пароль пользователья
     */
    private $newPassword;
    
    /**
     * preBindRequest
     * @param \Nitra\ManagerBundle\Entity\Manager $Manager your \Nitra\ManagerBundle\Entity\Manager object
     */
    public function preBindRequest(Manager $Manager)
    {
        $this->oldPassword = $Manager->getPassword();
    }
    
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
        
        // установить новый пароль
        if (!is_null($this->newPassword)) {
            $Manager->setPassword(null);
            $Manager->setPlainPassword($this->newPassword);
        } else {
            // обновить старый пароль пользователя 
            $Manager->setPassword($this->oldPassword);
        }
        
        // сохранить менеждера
        $em = $this->getDoctrine()->getManager();
        $em->persist($Manager);
        $em->flush();
    }
    
}
