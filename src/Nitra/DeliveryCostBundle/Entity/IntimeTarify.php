<?php

namespace Nitra\DeliveryCostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NovaposhtaTarify
 *
 * @ORM\Table(name="intime_tarify")
 * @ORM\Entity
 */
class IntimeTarify
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
     * @var string $package_type
     *
     * @ORM\Column(name="package_type", type="string", length=255, nullable=true)
     */
    
    private $package_type;
    
    /**
     * @var integer $zone_id
     *
     * @ORM\Column(name="zone_id", type="integer", length=255, nullable=true)
     */
    
    private $zone_id;
    
     /**
     * @var integer $weigth_min
     *
     * @ORM\Column(name="weigth_min", type="integer", length=255, nullable=true)
     */
    
    private $weigth_min;
    
     /**
     * @var integer $weigth_max
     *
     * @ORM\Column(name="weigth_max", type="integer", length=255, nullable=true)
     */
    
    private $weigth_max;
    
    /**
     * @var decimal $size_min
     *
     * @ORM\Column(name="size_min", type="decimal", scale=2, nullable=true)
     */
    
    private $size_min;
    
    /**
     * @var decimal $size_max
     *
     * @ORM\Column(name="size_max", type="decimal", scale=2, nullable=true)
     */
    
    private $size_max;
    
    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    
    private $city;
    
    /**
     * @var decimal $tarif
     *
     * @ORM\Column(name="tarif", type="decimal", scale=2, nullable=false)
     */
    
    private $tarif;
    
    /**
     * @var decimal $tarif_extra
     *
     * @ORM\Column(name="tarif_extra", type="decimal", scale=2, nullable=true)
     */
    
    private $tarif_extra;

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
     * Set package_type
     *
     * @param string $packageType
     * @return IntimeTarify
     */
    public function setPackageType($packageType)
    {
        $this->package_type = $packageType;
    
        return $this;
    }

    /**
     * Get package_type
     *
     * @return string 
     */
    public function getPackageType()
    {
        return $this->package_type;
    }

    /**
     * Set zone_id
     *
     * @param integer $zoneId
     * @return IntimeTarify
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
     * Set weigth_min
     *
     * @param integer $weigthMin
     * @return IntimeTarify
     */
    public function setWeigthMin($weigthMin)
    {
        $this->weigth_min = $weigthMin;
    
        return $this;
    }

    /**
     * Get weigth_min
     *
     * @return integer 
     */
    public function getWeigthMin()
    {
        return $this->weigth_min;
    }

    /**
     * Set weigth_max
     *
     * @param integer $weigthMax
     * @return IntimeTarify
     */
    public function setWeigthMax($weigthMax)
    {
        $this->weigth_max = $weigthMax;
    
        return $this;
    }

    /**
     * Get weigth_max
     *
     * @return integer 
     */
    public function getWeigthMax()
    {
        return $this->weigth_max;
    }

    /**
     * Set size_min
     *
     * @param float $sizeMin
     * @return IntimeTarify
     */
    public function setSizeMin($sizeMin)
    {
        $this->size_min = $sizeMin;
    
        return $this;
    }

    /**
     * Get size_min
     *
     * @return float 
     */
    public function getSizeMin()
    {
        return $this->size_min;
    }

    /**
     * Set size_max
     *
     * @param float $sizeMax
     * @return IntimeTarify
     */
    public function setSizeMax($sizeMax)
    {
        $this->size_max = $sizeMax;
    
        return $this;
    }

    /**
     * Get size_max
     *
     * @return float 
     */
    public function getSizeMax()
    {
        return $this->size_max;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return IntimeTarify
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     * @return IntimeTarify
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
     * Set tarif_extra
     *
     * @param float $tarifExtra
     * @return IntimeTarify
     */
    public function setTarifExtra($tarifExtra)
    {
        $this->tarif_extra = $tarifExtra;
    
        return $this;
    }

    /**
     * Get tarif_extra
     *
     * @return float 
     */
    public function getTarifExtra()
    {
        return $this->tarif_extra;
    }
}