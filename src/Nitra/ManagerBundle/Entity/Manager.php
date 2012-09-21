<?php

namespace Nitra\ManagerBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupableInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="manager_user")
 */
class Manager extends BaseUser
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Nitra\DeliveryBundle\Entity\Client", mappedBy="user")
      * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Client")
     */
    private $client;
    
    /**
     *  Метод возвращает список ролей в текстовом виде
     */
    public function getRolesText() {
        $rolesText = '<ul>';
        foreach($this->getRoles() AS $role) {
            $rolesText .= '<li>' . $role . '</li>';
        }
        return $rolesText . '</ul>';
    }

}