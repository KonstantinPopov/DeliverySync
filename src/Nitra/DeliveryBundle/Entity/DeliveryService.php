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
     * @ORM\OneToMany(targetEntity="Department", mappedBy="deliveryService")
     * 
     */
    private $departments;

    /**
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="deliveryServices")
     */
    private $clients;
    
    /**
     * @var integer $registration_cost
     *
     * @ORM\Column(name="registration_cost", type="integer", length=5, nullable=true)
     */
     
    private $registration_cost;
    
    /**
     * @var integer $commission
     *
     * @ORM\Column(name="commission", type="decimal", scale=2, nullable=true)
     */
    
    private $commission;
    
    /**
     * @var decimal $min_commission
     *
     * @ORM\Column(name="min_commission", type="decimal", scale=2, nullable=true)
     */
    
    private $min_commission;
    
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

    public function __toString()
    {
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

    /**
     * Set registration_cost
     *
     * @param integer $registrationCost
     * @return DeliveryService
     */
    public function setRegistrationCost($registrationCost)
    {
        $this->registration_cost = $registrationCost;
    
        return $this;
    }

    /**
     * Get registration_cost
     *
     * @return integer 
     */
    public function getRegistrationCost()
    {
        return $this->registration_cost;
    }

    /**
     * Set commission
     *
     * @param float $commission
     * @return DeliveryService
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    
        return $this;
    }

    /**
     * Get commission
     *
     * @return float 
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set min_commission
     *
     * @param float $minCommission
     * @return DeliveryService
     */
    public function setMinCommission($minCommission)
    {
        $this->min_commission = $minCommission;
    
        return $this;
    }

    /**
     * Get min_commission
     *
     * @return float 
     */
    public function getMinCommission()
    {
        return $this->min_commission;
    }
   
}