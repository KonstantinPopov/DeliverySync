<?php
namespace Nitra\ManagerBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="manager_user")
 * @UniqueEntity(fields="username", message="Пользователь с таким логином уже существует.")
 * @UniqueEntity(fields="email", message="Пользователь с таким Email уже существует.")
 */
class Manager extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Nitra\DeliveryBundle\Entity\Client", mappedBy="user")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * @Assert\Type(type="Nitra\DeliveryBundle\Entity\Client")
     */
    private $client;
    
   /**
     * @ORM\ManyToMany(targetEntity="Nitra\ManagerBundle\Entity\Group")
     * @ORM\JoinTable(name="manager_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        // конструктор родителя
        parent::__construct();
        
        // группы 
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set client
     *
     * @param \Nitra\DeliveryBundle\Entity\Client $client
     * @return Manager
     */
    public function setClient(\Nitra\DeliveryBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \Nitra\DeliveryBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    
}