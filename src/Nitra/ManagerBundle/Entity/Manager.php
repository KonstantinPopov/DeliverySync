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
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Client")
     */
    private $client;
    
   /**
     * @ORM\ManyToMany(targetEntity="Nitra\ManagerBundle\Entity\Group")
     * @ORM\JoinTable(name="manager_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    
//    /**
//     *  Метод возвращает список ролей в текстовом виде
//     */
//    public function getRolesText() {
//        $rolesText = '<ul>';
//        foreach($this->getRoles() AS $role) {
//            $rolesText .= '<li>' . $role . '</li>';
//        }
//        return $rolesText . '</ul>';
//    }


    

    /**
     * Set client
     *
     * @param Nitra\DeliveryBundle\Entity\Client $client
     * @return Manager
     */
    public function setClient(\Nitra\DeliveryBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }
    
    /**
     * Get client Id
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->client->getId();
    }

    /**
     * Get client
     *
     * @return Nitra\DeliveryBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * Add groups
//     *
//     * @param Nitra\ManagerBundle\Entity\Group $groups
//     * @return Manager
//     */
//    public function addGroup(\Nitra\ManagerBundle\Entity\Group $groups)
//    {
//        $this->groups[] = $groups;
//    
//        return $this;
//    }
//
//    /**
//     * Remove groups
//     *
//     * @param Nitra\ManagerBundle\Entity\Group $groups
//     */
//    public function removeGroup(\Nitra\ManagerBundle\Entity\Group $groups)
//    {
//        $this->groups->removeElement($groups);
//    }
//
//    /**
//     * Get groups
//     *
//     * @return Doctrine\Common\Collections\Collection 
//     */
//    public function getGroups()
//    {
//        return $this->groups;
//    }
}