<?php

namespace Nitra\DeliveryBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Delivery
 *
 * @ORM\Table(name="delivery_service")
 * @ORM\Entity
 * 
 * @UniqueEntity(fields="name", message="Транспортная компания с таким названием уже существует")
 */
class DeliveryService
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
     * @var array $settings
     *
     * @ORM\Column(name="settings", type="array")
     */
    private $settings;
    
     /**
     * @ORM\OneToMany(targetEntity="Department", mappedBy="delivery_service")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Department")
     */
    private $departments;
    
    
     /**
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="deliveryServices")
     */
    private $clients;
   
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
     * @return DeliveryService
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
     * Set settings
     *
     * @param array $settings
     * @return DeliveryService
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    
        return $this;
    }

    /**
     * Get settings
     *
     * @return array 
     */
    public function getSettings()
    {
        return $this->settings;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add departments
     *
     * @param Nitra\DeliveryBundle\Entity\Department $departments
     * @return DeliveryService
     */
    public function addDepartment(\Nitra\DeliveryBundle\Entity\Department $departments)
    {
        $this->departments[] = $departments;
    
        return $this;
    }

    /**
     * Remove departments
     *
     * @param Nitra\DeliveryBundle\Entity\Department $departments
     */
    public function removeDepartment(\Nitra\DeliveryBundle\Entity\Department $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
   
    /**
     * Get clients
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClients()
    {
        return $this->clients;
    }
    
    public function __toString() {
        return $this->getName();
    }
    
    

    /**
     * Add clients
     *
     * @param Nitra\DeliveryBundle\Entity\Client $clients
     * @return DeliveryService
     */
    public function addClient(\Nitra\DeliveryBundle\Entity\Client $clients)
    {
        $this->clients[] = $clients;
    
        return $this;
    }

    /**
     * Remove clients
     *
     * @param Nitra\DeliveryBundle\Entity\Client $clients
     */
    public function removeClient(\Nitra\DeliveryBundle\Entity\Client $clients)
    {
        $this->clients->removeElement($clients);
    }
}