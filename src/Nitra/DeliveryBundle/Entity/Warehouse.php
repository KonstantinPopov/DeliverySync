<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Department
 * @ORM\Table(name="delivery_warehouses")
 * @ORM\Entity  
 */
//@UniqueEntity(fields={"delivery_id", "warehouse_code"}, message="Склад ТК данной компании с таким идентификатором уже существует")
class Warehouse
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
     * @ORM\ManyToOne(targetEntity="Delivery", inversedBy="warehouses")
     * @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Delivery")
     */
    private $delivery;
    
    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="warehouses")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\City")
     */
    private $city;

    /**
     * Уникальный идентификатор склада в API транспортной компании
     * @var type string
     * @ORM\Column(name="warehouse_code", type = "string", length=100, nullable = true, options={"comment"="ID склада в ТК"})
     */
    private $warehouseCode;
    
    /**
     * Номер склада (отделения) в городе в API транспортной компании
     * @var type string
     * @ORM\Column(name="number", type = "string", length=25, nullable = true, options={"comment"="Номер склада в городе"})
     */
    private $number;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255, options={"comment"="Название отделения"})
     * @Assert\NotBlank(message="Не указано название отделения компании")
     */
    private $name;

    /**
     * @var string $address
     * @ORM\Column(name="address", type="string", length=255, options={"comment"="Адрес отделения"})
     * @Assert\NotBlank(message="Не указан адресс отделения компании")
     */
    private $address;

    /**
     * @var string $phone
     * @ORM\Column(name="phone", type="string", length=255, options={"comment"="Телефон отделения"})
     */
    private $phone;

    /**
     * Широта
     * @var decimal $latitude
     * @ORM\Column(name="latitude", type="decimal", precision=13, scale=8, options={"comment"="Широта"})
     */
    private $latitude;

    /**
     * Долгота
     * @var decimal $longitude
     * @ORM\Column(name="longitude", type="decimal", precision=13, scale=8, options={"comment"="Долгота"})
     */
    private $longitude;
    
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
     * Set warehouseCode
     *
     * @param string $warehouseCode
     * @return Warehouse
     */
    public function setWarehouseCode($warehouseCode)
    {
        $this->warehouseCode = $warehouseCode;
    
        return $this;
    }

    /**
     * Get warehouseCode
     *
     * @return string 
     */
    public function getWarehouseCode()
    {
        return $this->warehouseCode;
    }
    
    /**
     * Set number
     *
     * @param string $number
     * @return Warehouse
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }    
    
    /**
     * Set name
     *
     * @param string $name
     * @return Warehouse
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
     * @return Warehouse
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
     * @return Warehouse
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
     * Set latitude
     *
     * @param float $latitude
     * @return Warehouse
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
     * @return Warehouse
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

    /**
     * Set delivery
     *
     * @param \Nitra\DeliveryBundle\Entity\Delivery $delivery
     * @return Warehouse
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
     * Set city
     *
     * @param \Nitra\DeliveryBundle\Entity\City $city
     * @return Warehouse
     */
    public function setCity(\Nitra\DeliveryBundle\Entity\City $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \Nitra\DeliveryBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
    
}