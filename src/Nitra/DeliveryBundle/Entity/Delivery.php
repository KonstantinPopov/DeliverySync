<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Delivery
 * @ORM\Table(name="delivery")
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="Транспортная компания с таким названием уже существует")
 */
class Delivery
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
     * @ORM\Column(name="name", type="string", length=255, options={"comment"="Название ТК"})
     * @Assert\NotBlank(message="Не указано название транспортной компании")
     */    
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Warehouse", mappedBy="warehouses")
     */
    private $warehouses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="deliveries")
     */
    private $clients;
    
    /**
     * @ORM\OneToMany(targetEntity="Region", mappedBy="regions")
     */
    private $regions;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="cities")
     */
    private $cities;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Delivery
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Delivery
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Delivery
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Delivery
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    
        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Add warehouses
     *
     * @param \Nitra\DeliveryBundle\Entity\Warehouse $warehouses
     * @return Delivery
     */
    public function addWarehouse(\Nitra\DeliveryBundle\Entity\Warehouse $warehouses)
    {
        $this->warehouses[] = $warehouses;
    
        return $this;
    }

    /**
     * Remove warehouses
     *
     * @param \Nitra\DeliveryBundle\Entity\Warehouse $warehouses
     */
    public function removeWarehouse(\Nitra\DeliveryBundle\Entity\Warehouse $warehouses)
    {
        $this->warehouses->removeElement($warehouses);
    }

    /**
     * Get warehouses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

    /**
     * Add clients
     *
     * @param \Nitra\DeliveryBundle\Entity\Client $clients
     * @return Delivery
     */
    public function addClient(\Nitra\DeliveryBundle\Entity\Client $clients)
    {
        $this->clients[] = $clients;
    
        return $this;
    }

    /**
     * Remove clients
     *
     * @param \Nitra\DeliveryBundle\Entity\Client $clients
     */
    public function removeClient(\Nitra\DeliveryBundle\Entity\Client $clients)
    {
        $this->clients->removeElement($clients);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add regions
     *
     * @param \Nitra\DeliveryBundle\Entity\Region $regions
     * @return Delivery
     */
    public function addRegion(\Nitra\DeliveryBundle\Entity\Region $regions)
    {
        $this->regions[] = $regions;
    
        return $this;
    }

    /**
     * Remove regions
     *
     * @param \Nitra\DeliveryBundle\Entity\Region $regions
     */
    public function removeRegion(\Nitra\DeliveryBundle\Entity\Region $regions)
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

    /**
     * Add cities
     *
     * @param \Nitra\DeliveryBundle\Entity\City $cities
     * @return Delivery
     */
    public function addCitie(\Nitra\DeliveryBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;
    
        return $this;
    }

    /**
     * Remove cities
     *
     * @param \Nitra\DeliveryBundle\Entity\City $cities
     */
    public function removeCitie(\Nitra\DeliveryBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }
}