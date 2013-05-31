<?php

namespace Nitra\DeliveryCostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NovaposhtaZone
 *
 * @ORM\Table(name="intime_zone")
 * @ORM\Entity
 */

class IntimeZone
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
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=true)
     */
    
    private $zone_id;
    
    /**
     * @var string $to_city
     *
     * @ORM\Column(name="to_city", type="string", length=255, nullable=false)
     */
    
    
    private $to_city;
    
     /**
     * @var string $from_city
     *
     * @ORM\Column(name="from_city", type="string", length=255, nullable=false)
     */
    
    private $from_city;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tarif", type="decimal", scale=2, nullable=true)
     */
    
    private $tarif;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tarif_for_sector", type="decimal", scale=2, nullable=true)
     */
    
    private $tarif_for_sector;
    
    /**
     * @var decimal $update_status
     *
     * @ORM\Column(name="update_status", type="string", length=255, nullable=true)
     */
    
    private $update_status;
    
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
     * Set zone_id
     *
     * @param integer $zoneId
     * @return IntimeZone
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
     * Set to_city
     *
     * @param string $toCity
     * @return IntimeZone
     */
    public function setToCity($toCity)
    {
        $this->to_city = $toCity;
    
        return $this;
    }

    /**
     * Get to_city
     *
     * @return string 
     */
    public function getToCity()
    {
        return $this->to_city;
    }

    /**
     * Set from_city
     *
     * @param string $fromCity
     * @return IntimeZone
     */
    public function setFromCity($fromCity)
    {
        $this->from_city = $fromCity;
    
        return $this;
    }

    /**
     * Get from_city
     *
     * @return string 
     */
    public function getFromCity()
    {
        return $this->from_city;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     * @return IntimeZone
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
     * Set tarif_for_sector
     *
     * @param float $tarifForSector
     * @return IntimeZone
     */
    public function setTarifForSector($tarifForSector)
    {
        $this->tarif_for_sector = $tarifForSector;
    
        return $this;
    }

    /**
     * Get tarif_for_sector
     *
     * @return float 
     */
    public function getTarifForSector()
    {
        return $this->tarif_for_sector;
    }
}