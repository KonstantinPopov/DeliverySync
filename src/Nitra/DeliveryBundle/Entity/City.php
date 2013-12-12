<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\City
 * @ORM\Table(name="delivery_cities")
 * @ORM\Entity
 */
//* @UniqueEntity(fields={"delivery_id", "city_code", "name"}, message="Город ТК данной компании с таким идентификатором уже существует")
class City
{

    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\SoftDeletable\SoftDeletable;

    use \Nitra\NitraThemeBundle\Traits\ValidForDelete;    

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City", inversedBy="delivery_cities")
     * @ORM\JoinColumn(name="geo_city_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\GeoBundle\Entity\City")
     */
    private $geoCity;
    
    /**
     * @ORM\ManyToOne(targetEntity="Delivery", inversedBy="cities")
     * @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Delivery")
     */
    private $delivery;
    
    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="cities")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Не указан регион")
     */
    private $region;
    
    /**
     * @ORM\OneToMany(targetEntity="Warehouse", mappedBy="warehouses")
     */
    private $warehouses;
    
    /**
     * Уникальный идентификатор города в API транспортной компании
     * @var type string
     * @ORM\Column(name="city_code", type = "string", length=100, nullable = true, options={"comment"="ID города в ТК"})
     */
    private $cityCode;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255, options={"comment"="Название города"})
     * @Assert\NotBlank(message="Не указано название города ТК")
     */
    private $name;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Entity to string
     * @return string 
     */
    public function __toString()
    {
        return (string)$this->getName();
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

    /**
     * Set cityCode
     *
     * @param string $cityCode
     * @return City
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
    
        return $this;
    }

    /**
     * Get cityCode
     *
     * @return string 
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
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
     * Set geoCity
     *
     * @param \Nitra\GeoBundle\Entity\City $geoCity
     * @return City
     */
    public function setGeoCity(\Nitra\GeoBundle\Entity\City $geoCity = null)
    {
        $this->geoCity = $geoCity;
    
        return $this;
    }

    /**
     * Get geoCity
     *
     * @return \Nitra\GeoBundle\Entity\City 
     */
    public function getGeoCity()
    {
        return $this->geoCity;
    }

    /**
     * Set delivery
     *
     * @param \Nitra\DeliveryBundle\Entity\Delivery $delivery
     * @return City
     */
    public function setDelivery(\Nitra\DeliveryBundle\Entity\Delivery $delivery = null)
    {
        $this->delivery = $delivery;
    
        return $this;
    }

    /**
     * Get delivery
     *
     * @return \Nitra\DeliveryBundle\Entity\Delivery 
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set region
     *
     * @param \Nitra\DeliveryBundle\Entity\Region $region
     * @return City
     */
    public function setRegion(\Nitra\DeliveryBundle\Entity\Region $region = null)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return \Nitra\DeliveryBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add warehouses
     *
     * @param \Nitra\DeliveryBundle\Entity\Warehouse $warehouses
     * @return City
     */
    public function addWarehouse(\Nitra\DeliveryBundle\Entity\Warehouse $warehouses)
    {
        $this->warehouses[] = $warehouses;
    
        return $this;
    }

    /**
     * Remove warehouses
     *
     * @param \Nitra\DeliveryBundle\Entity\Warehouse $warehouses
     */
    public function removeWarehouse(\Nitra\DeliveryBundle\Entity\Warehouse $warehouses)
    {
        $this->warehouses->removeElement($warehouses);
    }

    /**
     * Get warehouses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }
}