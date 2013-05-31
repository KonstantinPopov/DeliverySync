<?php

namespace Nitra\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Nitra\DeliveryBundle\NitraDeliveryBundle\DeliveryCity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\GeoBundle\Entity\City
 *
 * @ORM\Table(name="geo_city")
 * @ORM\Entity 
 */
class City
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
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="cities")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @Assert\NotBlank
     * */
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
     * 
     */
    
    private $from_city_id;
    
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
     * Set region
     *
     * @param Nitra\GeoBundle\Entity\Region $region
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
     * @return Nitra\GeoBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    public function __toString() {
        return $this->getName() . '      ' .  $this->getRegion()->getName();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->delivery_cities = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add delivery_cities
     *
     * @param Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities
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
     * @param Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities
     */
    public function removeDeliveryCitie(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCities)
    {
        $this->delivery_cities->removeElement($deliveryCities);
    }

    /**
     * Get delivery_cities
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDeliveryCities()
    {
        return $this->delivery_cities;
    }
    
    /**
     * Add from_city
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCity
     * @return City
     */
    public function addFromCity(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCity)
    {
        $this->from_city[] = $fromCity;
    
        return $this;
    }

    /**
     * Remove from_city
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCity
     */
    public function removeFromCity(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $fromCity)
    {
        $this->from_city->removeElement($fromCity);
    }

    /**
     * Get from_city
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFromCity()
    {
        return $this->from_city;
    }

    /**
     * Add to_city
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCity
     * @return City
     */
    public function addToCity(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCity)
    {
        $this->to_city[] = $toCity;
    
        return $this;
    }

    /**
     * Remove to_city
     *
     * @param \Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCity
     */
    public function removeToCity(\Nitra\DeliveryCostBundle\Entity\NovaposhtaZone $toCity)
    {
        $this->to_city->removeElement($toCity);
    }

    /**
     * Get to_city
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getToCity()
    {
        return $this->to_city;
    }
}