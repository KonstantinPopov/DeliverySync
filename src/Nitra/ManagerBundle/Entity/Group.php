<?php

namespace Nitra\ManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Entity\Group as BaseGroup;

/**
 *
 * @ORM\Table(name = "manager_group")
 * @ORM\Entity
 * 
 */
class Group extends BaseGroup
{

    protected $roles = array();

    public function __construct()
    {
        
    }

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

    public function __toString()
    {
        return $this->getName();
    }

}