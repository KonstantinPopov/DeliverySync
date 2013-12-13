<?php
namespace Nitra\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\GeoBundle\Entity\Country
 * @ORM\Table(name="geo_country")
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="Страна с таким названием уже существует")
 */
class Country
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
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Не указано название страны")
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     * @return Country
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
     * Add regions
     *
     * @param \Nitra\GeoBundle\Entity\Region $regions
     * @return Country
     */
    public function addRegion(\Nitra\GeoBundle\Entity\Region $regions)
    {
        $this->regions[] = $regions;
    
        return $this;
    }

    /**
     * Remove regions
     *
     * @param \Nitra\GeoBundle\Entity\Region $regions
     */
    public function removeRegion(\Nitra\GeoBundle\Entity\Region $regions)
    {
        $this->regions->removeElement($regions);
    }

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegions()
    {
        return $this->regions;
    }
    
}