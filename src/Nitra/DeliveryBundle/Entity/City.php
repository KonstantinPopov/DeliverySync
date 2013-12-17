<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\City
 * @ORM\Table(name="delivery_cities")
 * @ORM\Entity(repositoryClass="Nitra\DeliveryBundle\Repository\CityRepository")
 */
// UniqueEntity не используем потому что используем SoftDeletable
// @UniqueEntity(fields={"delivery_id", "city_code", "name"}, message="Город ТК данной компании с таким идентификатором уже существует")
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
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City")
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
    
}