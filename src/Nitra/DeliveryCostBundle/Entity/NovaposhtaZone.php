<?php

namespace Nitra\DeliveryCostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * NovaposhtaZone
 *
 * @ORM\Table(name="novaposhta_zone")
 * @ORM\Entity
 */

class NovaposhtaZone
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
     * @ORM\Column(name="rate", type="decimal", scale=2)
     */
    
    private $rate;
    
    /**
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City", inversedBy="to_city_id")
     * @ORM\JoinColumn(name="to_city_id", referencedColumnName="id")
     * @Assert\NotBlank
     * */
    
    private $to_city;
    
    /**
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City", inversedBy="from_city_id")
     * @ORM\JoinColumn(name="from_city_id", referencedColumnName="id")
     * @Assert\NotBlank
     * */
    
    private $from_city;
    
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
     * Set to_city
     *
     * @param string $toCity
     * @return NovaposhtaZone
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
     * Set rate
     *
     * @param float $rate
     * @return NovaposhtaZone
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    
        return $this;
    }

    /**
     * Get rate
     *
     * @return float 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set from_city
     *
     * @param \Nitra\GeoBundle\Entity\City $fromCity
     * @return NovaposhtaZone
     */
    public function setFromCity(\Nitra\GeoBundle\Entity\City $fromCity = null)
    {
        $this->from_city = $fromCity;
    
        return $this;
    }

    /**
     * Get from_city
     *
     * @return \Nitra\GeoBundle\Entity\City 
     */
    public function getFromCity()
    {
        return $this->from_city;
    }

    /**
     * Set update_status
     *
     * @param string $updateStatus
     * @return NovaposhtaZone
     */
    public function setUpdateStatus($updateStatus)
    {
        $this->update_status = $updateStatus;
    
        return $this;
    }

    /**
     * Get update_status
     *
     * @return string 
     */
    public function getUpdateStatus()
    {
        return $this->update_status;
    }
}