<?php
namespace Nitra\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\GeoBundle\Entity\City
 * @ORM\Table(name="geo_city")
 * @ORM\Entity 
 * @UniqueEntity(fields="name", message="Город с таким названием уже существует")
 */
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
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="cities")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Не указан регион")
     */
    private $region;
    
    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Не указано название города")
     */
    private $name;

    /**
     * Entity to string
     * @return string 
     */
    public function __toString() {
        return $this->getName() . ' ' .  $this->getRegion()->getName();
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
    
}