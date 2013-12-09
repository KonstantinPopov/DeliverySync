<?php
namespace Nitra\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Nitra\ManagerBundle\Entity\Role
 * @ORM\Table(name="manager_role")
 * @ORM\Entity(repositoryClass="Nitra\ManagerBundle\Repository\RoleRepository")
 * @UniqueEntity(fields="name", message="Роль с таким названием уже существует")
 */
class Role
{

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Не указано название")
     * 
     */
    private $name;
    
     /**
     * @var string $description
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank(message="Не указано описание")
     */
    private $description;
    
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
     * @return Role
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
     * Set description
     *
     * @param string $description
     * @return Role
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
}