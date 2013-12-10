<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\DeliveryPeriod
 * @ORM\Table(name="delivery_period")
 * @ORM\Entity 
 * @UniqueEntity(fields={"delivery_service_id", "department_from_id", "department_to_id"}, message="Период доставки для этих отделений уже существует.")
 */
class DeliveryPeriod
{
    
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="DeliveryService")
     * @ORM\JoinColumn(name="delivery_service_id", referencedColumnName="id")
     * @Assert\Type(type="DeliveryService")
     */
    private $deliveryService;
    
    /**
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City")
     * @ORM\JoinColumn(name="city_from_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\GeoBundle\Entity\City")
     */
    private $cityFrom;
    
    /**
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City")
     * @ORM\JoinColumn(name="city_to_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\GeoBundle\Entity\City")
     */
    private $cityTo;
    
    /**
     * @ORM\ManyToOne(targetEntity="DeliveryCity")
     * @ORM\JoinColumn(name="delivery_city_from_id", referencedColumnName="id")
     * @Assert\Type(type="DeliveryCity")
     */
    private $deliveryCityFrom;
    
    /**
     * @ORM\ManyToOne(targetEntity="DeliveryCity")
     * @ORM\JoinColumn(name="delivery_city_to_id", referencedColumnName="id")
     * @Assert\Type(type="DeliveryCity")
     */
    private $deliveryCityTo;
    
    /**
     * @ORM\Column(name="period", type="integer")
     * @Assert\NotBlank(message="Не указан период")
     */
    private $period;
    
//    /**
//     * Constructor
//     */
//    public function __construct()
//    {
//    }
//    
//    /**
//     * Entity to string
//     * @return string 
//     */
//    public function __toString()
//    {
//        return (string)$this->getName();
//    }
    
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
     * Set period
     *
     * @param integer $period
     * @return DeliveryPeriod
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    
        return $this;
    }

    /**
     * Get period
     *
     * @return integer 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set deliveryService
     *
     * @param \Nitra\DeliveryBundle\Entity\DeliveryService $deliveryService
     * @return DeliveryPeriod
     */
    public function setDeliveryService(\Nitra\DeliveryBundle\Entity\DeliveryService $deliveryService = null)
    {
        $this->deliveryService = $deliveryService;
    
        return $this;
    }

    /**
     * Get deliveryService
     *
     * @return \Nitra\DeliveryBundle\Entity\DeliveryService 
     */
    public function getDeliveryService()
    {
        return $this->deliveryService;
    }

    /**
     * Set cityFrom
     *
     * @param \Nitra\GeoBundle\Entity\City $cityFrom
     * @return DeliveryPeriod
     */
    public function setCityFrom(\Nitra\GeoBundle\Entity\City $cityFrom = null)
    {
        $this->cityFrom = $cityFrom;
    
        return $this;
    }

    /**
     * Get cityFrom
     *
     * @return \Nitra\GeoBundle\Entity\City 
     */
    public function getCityFrom()
    {
        return $this->cityFrom;
    }

    /**
     * Set cityTo
     *
     * @param \Nitra\GeoBundle\Entity\City $cityTo
     * @return DeliveryPeriod
     */
    public function setCityTo(\Nitra\GeoBundle\Entity\City $cityTo = null)
    {
        $this->cityTo = $cityTo;
    
        return $this;
    }

    /**
     * Get cityTo
     *
     * @return \Nitra\GeoBundle\Entity\City 
     */
    public function getCityTo()
    {
        return $this->cityTo;
    }

    /**
     * Set deliveryCityFrom
     *
     * @param \Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCityFrom
     * @return DeliveryPeriod
     */
    public function setDeliveryCityFrom(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCityFrom = null)
    {
        $this->deliveryCityFrom = $deliveryCityFrom;
    
        return $this;
    }

    /**
     * Get deliveryCityFrom
     *
     * @return \Nitra\DeliveryBundle\Entity\DeliveryCity 
     */
    public function getDeliveryCityFrom()
    {
        return $this->deliveryCityFrom;
    }

    /**
     * Set deliveryCityTo
     *
     * @param \Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCityTo
     * @return DeliveryPeriod
     */
    public function setDeliveryCityTo(\Nitra\DeliveryBundle\Entity\DeliveryCity $deliveryCityTo = null)
    {
        $this->deliveryCityTo = $deliveryCityTo;
    
        return $this;
    }

    /**
     * Get deliveryCityTo
     *
     * @return \Nitra\DeliveryBundle\Entity\DeliveryCity 
     */
    public function getDeliveryCityTo()
    {
        return $this->deliveryCityTo;
    }
    
}