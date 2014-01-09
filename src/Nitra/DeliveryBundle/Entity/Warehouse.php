<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Warehouse
 * @ORM\Table(name="delivery_warehouses")
 * @ORM\Entity(repositoryClass="Nitra\DeliveryBundle\Repository\WarehouseRepository")
 */
// UniqueEntity не используем потому что используем SoftDeletable
// @UniqueEntity(fields={"delivery_id", "warehouse_code"}, message="Склад ТК данной компании с таким идентификатором уже существует")
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
     * @ORM\Column(type = "string", length=100, nullable = true, options={"comment"="ID склада в ТК"})
     */
    private $businessKey;
    
    /**
     * Номер склада (отделения) в городе в API транспортной компании
     * @var type string
     * @ORM\Column(name="number", type = "string", length=25, nullable = true, options={"comment"="Номер склада в городе"})
     */
    private $number;
    
    /**
     * @var string $name
     * @ORM\Column(type="string", length=255, options={"comment"="Название отделения"})
     * @Assert\NotBlank(message="Не указано название отделения компании")
     */
    private $name;
    
    /**
     * @var string $name
     * @ORM\Column(type="string", length=255, options={"comment"="Название отделения в ТК"})
     * @Assert\NotBlank(message="Не указано название отделения ТК")
     */
    private $nameTk;
    
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
     * @ORM\Column(name="latitude", type="decimal", precision=13, scale=8, nullable = true, options={"comment"="Широта"})
     */
    private $latitude;

    /**
     * Долгота
     * @var decimal $longitude
     * @ORM\Column(name="longitude", type="decimal", precision=13, scale=8, nullable = true, options={"comment"="Долгота"})
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
     * Set businessKey
     *
     * @param string $businessKey
     * @return Warehouse
     */
    public function setBusinessKey($businessKey)
    {
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($businessKey)) {
            $businessKey = trim($businessKey);
        }
        
        // установить 
        $this->businessKey = $businessKey;
        
        // вернуть сущность
        return $this;
    }

    /**
     * Get businessKey
     *
     * @return string 
     */
    public function getBusinessKey()
    {
        return $this->businessKey;
    }
    
    /**
     * Set number
     *
     * @param string $number
     * @return Warehouse
     */
    public function setNumber($number)
    {
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($number)) {
            $number = trim($number);
        }
        
        // установить 
        $this->number = $number;
        
        // вернуть сущность
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
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($name)) {
            $name = trim($name);
        }
        
        // установить 
        $this->name = $name;
        
        // вернуть сущность
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
     * Set nameTk
     *
     * @param string $nameTk
     * @return City
     */
    public function setNameTk($nameTk)
    {
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($nameTk)) {
            $nameTk = trim($nameTk);
        }
        
        // установить 
        $this->nameTk = $nameTk;
        
        // вернуть сущность
        return $this;
    }

    /**
     * Get nameTk
     *
     * @return string 
     */
    public function getNameTk()
    {
        return $this->nameTk;
    }    
    
    /**
     * Set address
     *
     * @param string $address
     * @return Warehouse
     */
    public function setAddress($address)
    {
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($address)) {
            $address = trim($address);
        }
        
        // установить 
        $this->address = $address;
        
        // вернуть сущность
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
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($phone)) {
            $phone = trim($phone);
        }
        
        // установить 
        $this->phone = $phone;
        
        // вернуть сущность
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
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($latitude)) {
            $latitude = trim($latitude);
        }
        
        // установить 
        $this->latitude = $latitude;
        
        // вернуть сущность
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
        // если значение не null обрезать пробелы
        // если обрезаем пробелы без проверки то в случае null получим string нулевой длины
        if (!is_null($longitude)) {
            $longitude = trim($longitude);
        }
        
        // установить 
        $this->longitude = $longitude;
        
        // вернуть сущность
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