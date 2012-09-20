<?php

namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity 
 */
class Department
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
     * @ORM\Column(name="name", type="string", length=255)\
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string $address
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @var string $phone
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;
    
     /**
     * @ORM\ManyToOne(targetEntity="DeliveryCity", inversedBy="departments")
     * @ORM\JoinColumn(name="delivery_city_id", referencedColumnName="id")
     * @Assert\Type(type="DeliveryCity")
     * */
    private $delivery_city;
    
    /**
     * @ORM\ManyToOne(targetEntity="DeliveryService", inversedBy="departments")
     * @ORM\JoinColumn(name="delivery_service_id", referencedColumnName="id")
     * @Assert\Type(type="DeliveryService")
     * */
    private $delivery_service;
    
    /**
     * @var decimal $latitude
     *
     * @ORM\Column(name="latitude", type="decimal", precision=13, scale=8)
     */
    private $latitude;
    
    /**
     * @var decimal $longitude
     *
     * @ORM\Column(name="longitude", type="decimal", precision=13, scale=8)
     */
    private $longitude;
    
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
     * @return Department
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
     * Set address
     *
     * @param string $address
     * @return Department
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Department
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set delivery_city
     *
     * @param Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCity
     * @return Department
     */
    public function setDeliveryCity(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCity = null)
    {
        $this->delivery_city = $deliveryCity;
    
        return $this;
    }

    /**
     * Get delivery_city
     *
     * @return Nitra\DeliveryBundle\Entity\DeliveryCity 
     */
    public function getDeliveryCity()
    {
        return $this->delivery_city;
    }

    /**
     * Set delivery_service
     *
     * @param Nitra\DeliveryBundle\Entity\DeliveryService $deliveryService
     * @return Department
     */
    public function setDeliveryService(\Nitra\DeliveryBundle\Entity\DeliveryService $deliveryService = null)
    {
        $this->delivery_service = $deliveryService;
    
        return $this;
    }

    /**
     * Get delivery_service
     *
     * @return Nitra\DeliveryBundle\Entity\DeliveryService 
     */
    public function getDeliveryService()
    {
        return $this->delivery_service;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Department
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Department
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}