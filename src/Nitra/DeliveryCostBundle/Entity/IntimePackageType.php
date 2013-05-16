<?php

namespace Nitra\DeliveryCostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NovaposhtaTarify
 *
 * @ORM\Table(name="intime_package_type")
 * @ORM\Entity
 */
class IntimePackageType
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    
    private $name;
    
    /**
     * @var decimal $cost
     *
     * @ORM\Column(name="cost", type="decimal", scale=2, nullable=false)
     */
    
    private $cost;
   

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
     * @return IntimePackageType
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
     * Set cost
     *
     * @param float $cost
     * @return IntimePackageType
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    
        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }
}