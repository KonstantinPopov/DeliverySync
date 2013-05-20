<?php

namespace Nitra\DeliveryCostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NovaposhtaTarify
 *
 * @ORM\Table(name="novaposhta_tarify")
 * @ORM\Entity
 */
class NovaposhtaTarify
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    
    private $type;
    
    /**
     * @var string $weight
     *
     * @ORM\Column(name="weight", type="string", length=255, nullable=true)
     */
    
    private $weight;
   
    /**
     * @var decimal $min
     *
     * @ORM\Column(name="min", type="decimal", scale=3, nullable=true)
     */
    
    private $min;
    
    /**
     * @var decimal $max
     *
     * @ORM\Column(name="max", type="decimal", scale=3, nullable=true)
     */
    
    private $max;
    
    /**
     * @var decimal $tarif
     *
     * @ORM\Column(name="tarif", type="decimal", scale=2, nullable=false)
     */
    
    
    
    private $tarif;
    
    /**
     * @var integer $zone_id
     *
     * @ORM\Column(name="zone_id", type="integer", length=11, nullable=true)
     */
    
    private $zone_id;
    
    
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
     * Set type
     *
     * @param string $type
     * @return NovaposhtaTarify
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return NovaposhtaTarify
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return string 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     * @return NovaposhtaTarify
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    
        return $this;
    }

    /**
     * Get tarif
     *
     * @return float 
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set zone_id
     *
     * @param integer $zoneId
     * @return NovaposhtaTarify
     */
    public function setZoneId($zoneId)
    {
        $this->zone_id = $zoneId;
    
        return $this;
    }

    /**
     * Get zone_id
     *
     * @return integer 
     */
    public function getZoneId()
    {
        return $this->zone_id;
    }

    /**
     * Set min
     *
     * @param integer $min
     * @return NovaposhtaTarify
     */
    public function setMin($min)
    {
        $this->min = $min;
    
        return $this;
    }

    /**
     * Get min
     *
     * @return integer 
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max
     *
     * @param integer $max
     * @return NovaposhtaTarify
     */
    public function setMax($max)
    {
        $this->max = $max;
    
        return $this;
    }

    /**
     * Get max
     *
     * @return integer 
     */
    public function getMax()
    {
        return $this->max;
    }
}