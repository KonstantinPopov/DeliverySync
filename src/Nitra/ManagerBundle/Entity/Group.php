<?php
namespace Nitra\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Entity\Group as BaseGroup;

/**
 *
 * @ORM\Table(name = "manager_group")
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="Группа с таким названием уже существует.")
 */
class Group extends BaseGroup
{
    /**
     * @var array - массив привелегий
     */
    protected $roles = array();
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * Entity to string
     * @return string 
     */
    public function __toString()
    {
        return (string)$this->getName();
    }

}