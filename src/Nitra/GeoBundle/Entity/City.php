<?php
namespace Nitra\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Nitra\DeliveryBundle\NitraDeliveryBundle\DeliveryCity;

/**
 * Nitra\GeoBundle\Entity\City
 * @ORM\Table(name="geo_city")
 * @ORM\Entity 
 */
class City
{
    
    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\SoftDeletable\SoftDeletable;
    
    use \Nitra\NitraThemeBundle\Traits\ValidForDelete;    

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
     * @Assert\NotBlank(message="Не указано название города")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="cities")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Не указан регион")
     */
    private $region;
    
     /**
     * @ORM\OneToMany(targetEntity="Nitra\DeliveryBundle\Entity\DeliveryCity", mappedBy="city")
     * 
     */
    private $delivery_cities;
    
    /**
     * @ORM\OneToMany(targetEntity="Nitra\DeliveryCostBundle\Entity\NovaposhtaZone", mappedBy="to_city")
     * 
     */
    
    private $to_city_id;
    
    /**
     * @ORM\OneToMany(targetEntity="Nitra\DeliveryCostBundle\Entity\NovaposhtaZone", mappedBy="from_city")
     */
    private $from_city_id;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->delivery_cities = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Entity to string
     * @return string 
     */
    public function __toString() {
        return $this->getName() . '      ' .  $this->getRegion()->getName();
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
     * получить страну
     * @return Nitra\GeoBundle\Entity\Country
     */
    public function getCountry() {
        return $this->getRegion()->getCountry();
    }
    
    /**
     * Set region
     *
     * @param \Nitra\GeoBundle\Entity\Region $region
     * @return City
     */
    public function setRegion(\Nitra\GeoBundle\Entity\Region $region = null)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return \Nitra\GeoBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Add delivery_cities
     *
     * @param \Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities
     * @return City
     */
    public function addDeliveryCitie(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities)
    {
        $this->delivery_cities[] = $deliveryCities;
    
        return $this;
    }

    /**
     * Remove delivery_cities
     *
     * @param \Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities
     */
    public function removeDeliveryCitie(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities)
    {
        $this->delivery_cities->removeElement($deliveryCities);
    }

    /**
     * Get delivery_cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeliveryCities()
    {
        return $this->delivery_cities;
    }

    /**
     * Add to_city_id
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCityId
     * @return City
     */
    public function addToCityId(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCityId)
    {
        $this->to_city_id[] = $toCityId;
    
        return $this;
    }

    /**
     * Remove to_city_id
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCityId
     */
    public function removeToCityId(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCityId)
    {
        $this->to_city_id->removeElement($toCityId);
    }

    /**
     * Get to_city_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getToCityId()
    {
        return $this->to_city_id;
    }

    /**
     * Add from_city_id
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCityId
     * @return City
     */
    public function addFromCityId(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCityId)
    {
        $this->from_city_id[] = $fromCityId;
    
        return $this;
    }

    /**
     * Remove from_city_id
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCityId
     */
    public function removeFromCityId(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCityId)
    {
        $this->from_city_id->removeElement($fromCityId);
    }

    /**
     * Get from_city_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFromCityId()
    {
        return $this->from_city_id;
    }
}