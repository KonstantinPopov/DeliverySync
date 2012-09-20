<?php

namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Nitra\GeoBundle\NitraGeoBundle\City;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\DeliveryCity
 *
 * @ORM\Table(name="delivery_city")
 * @ORM\Entity unique po name
 * 
 * @UniqueEntity(fields="name", message="Город ТК с таким названием уже существует")
 */
class DeliveryCity
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
     * @ORM\ManyToOne(targetEntity="Nitra\GeoBundle\Entity\City", inversedBy="delivery_cities")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\GeoBundle\Entity\City")
     * */
    private $city;
    
    /**
     * @ORM\OneToMany(targetEntity="Department", mappedBy="delivery_city")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Department")
     */
    private $departments;

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
     * @return DeliveryCity
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
     * Set city
     *
     * @param Nitra\GeoBundle\Entity\City $city
     * @return DeliveryCity
     */
    public function setCity(\Nitra\GeoBundle\Entity\City $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return Nitra\GeoBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add departments
     *
     * @param Nitra\DeliveryBundle\Entity\Department $departments
     * @return DeliveryCity
     */
    public function addDepartment(\Nitra\DeliveryBundle\Entity\Department $departments)
    {
        $this->departments[] = $departments;
    
        return $this;
    }

    /**
     * Remove departments
     *
     * @param Nitra\DeliveryBundle\Entity\Department $departments
     */
    public function removeDepartment(\Nitra\DeliveryBundle\Entity\Department $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}