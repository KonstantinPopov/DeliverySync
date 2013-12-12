<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\GeoBundle\Entity\Region
 * @ORM\Table(name="delivery_regions")
 * @ORM\Entity 
 */
//@UniqueEntity(fields={"delivery_id", "region_code"}, message="Регион ТК данной компании с таким идентификатором уже существует")
class Region
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
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\Region", inversedBy="delivery_regions")
     * @ORM\JoinColumn(name="geo_region_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\GeoBundle\Entity\Region")
     */
    private $geoRegion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Delivery", inversedBy="regions")
     * @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Delivery")
     */
    private $delivery;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="region")
     */
    private $cities;
    
    /**
     * Уникальный идентификатор региона в API транспортной компании
     * @var type string
     * @ORM\Column(name="region_code", type = "string", length=100, nullable = true, options={"comment"="ID региона в ТК"})
     */
    private $regionCode;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255, options={"comment"="Название региона"})
     * @Assert\NotBlank(message="Не указано название региона")
     */
    private $name;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set regionCode
     *
     * @param string $regionCode
     * @return Region
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    
        return $this;
    }

    /**
     * Get regionCode
     *
     * @return string 
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Region
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
     * Set geoRegion
     *
     * @param \Nitra\GeoBundle\Entity\Region $geoRegion
     * @return Region
     */
    public function setGeoRegion(\Nitra\GeoBundle\Entity\Region $geoRegion = null)
    {
        $this->geoRegion = $geoRegion;
    
        return $this;
    }

    /**
     * Get geoRegion
     *
     * @return \Nitra\GeoBundle\Entity\Region 
     */
    public function getGeoRegion()
    {
        return $this->geoRegion;
    }

    /**
     * Set delivery
     *
     * @param \Nitra\DeliveryBundle\Entity\Delivery $delivery
     * @return Region
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
     * Add cities
     *
     * @param \Nitra\DeliveryBundle\Entity\City $cities
     * @return Region
     */
    public function addCitie(\Nitra\DeliveryBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;
    
        return $this;
    }

    /**
     * Remove cities
     *
     * @param \Nitra\DeliveryBundle\Entity\City $cities
     */
    public function removeCitie(\Nitra\DeliveryBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }
}