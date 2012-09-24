<?php

namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;


/**
 * Nitra\DeliveryBundle\Entity\Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 * 
 * @UniqueEntity(fields="name", message="Клиент с таким названием уже существует")
 */
class Client
{
     use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\SoftDeletable\SoftDeletable;

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string $token
     *
     * @ORM\Column(name="token", type="string", length=32)
     */
    private $token;
    
    /**
     * @ORM\OneToOne(targetEntity="Nitra\ManagerBundle\Entity\Manager", inversedBy="client")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\ManagerBundle\Entity\Manager")
     * */
    private $user;

     /**
     * @ORM\ManyToMany(targetEntity="DeliveryService", inversedBy="clients")
     * @ORM\JoinTable(name="client_deliveryservice")
     */
    private $deliveryServices;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Client
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deliveryServices = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Add deliveryServices
     *
     * @param Nitra\DeliveryBundle\Entity\DeliveryService $deliveryServices
     * @return Client
     */
    public function addDeliveryService(\Nitra\DeliveryBundle\Entity\DeliveryService $deliveryServices)
    {
        $this->deliveryServices[] = $deliveryServices;
    
        return $this;
    }

    /**
     * Remove deliveryServices
     *
     * @param Nitra\DeliveryBundle\Entity\DeliveryService $deliveryServices
     */
    public function removeDeliveryService(\Nitra\DeliveryBundle\Entity\DeliveryService $deliveryServices)
    {
        $this->deliveryServices->removeElement($deliveryServices);
    }

    /**
     * Get deliveryServices
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDeliveryServices()
    {
        return $this->deliveryServices;
    }
  

    /**
     * Set user
     *
     * @param Nitra\ManagerBundle\Entity\Manager $user
     * @return Client
     */
    public function setUser(\Nitra\ManagerBundle\Entity\Manager $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Nitra\ManagerBundle\Entity\Manager 
     */
    public function getUser()
    {
        return $this->user;
    }
    
}