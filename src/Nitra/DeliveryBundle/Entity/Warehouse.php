<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Department
 * @ORM\Table(name="delivery_warehouses")
 * @ORM\Entity  
 */
//@UniqueEntity(fields={"delivery_id", "ware_id"}, message="Отделение данной компании с таким идентификатором уже существует")
class Warehouse
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
     * @ORM\Column(name="name", type="string", length=255, options={"comment"="Название отделения"})
     * @Assert\NotBlank(message="Не указано название отделения компании")
     */
    private $name;

    /**
     * @var string $address
     * @ORM\Column(name="address", type="string", length=255, options={"comment"="Адрес отделения"})
     * @Assert\NotBlank(message="Не указан адресс отделения компании")
     */
    private $address;

    /**
     * @var string $phone
     * @ORM\Column(name="phone", type="string", length=255, options={"comment"="Телефон отделения"})
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="warehouses")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * @Assert\Type(type="City")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="Delivery", inversedBy="warehouses")
     * @ORM\JoinColumn(name="delivery_id", referencedColumnName="id")
     * @Assert\Type(type="Delivery")
     */
    private $delivery;

    /**
     * Широта
     * @var decimal $latitude
     * @ORM\Column(name="latitude", type="decimal", precision=13, scale=8, options={"comment"="Широта"})
     */
    private $latitude;

    /**
     * Долгота
     * @var decimal $longitude
     * @ORM\Column(name="longitude", type="decimal", precision=13, scale=8, options={"comment"="Долгота"})
     */
    private $longitude;
    
//   /**
//    * @var type string
//    * @ORM\Column(name="ware_id_city", type = "string", length=10, nullable = true)
//    */
//    private $wareIdCity;
//
//    /**
//     * @var type string
//     * @ORM\Column(name="ware_id", type = "string", length=10)
//     */
//    private $wareId;
    
//    /**
//     * Constructor
//     */
//    public function __construct()
//    {
//    }
    
    /**
     * Entity to string
     * @return string 
     */
    public function __toString()
    {
        return (string)$this->getName();
    }
    
}