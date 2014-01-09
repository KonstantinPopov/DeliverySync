<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Nitra\DeliveryBundle\Entity\City;
/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131211185646 extends AbstractMigration implements ContainerAwareInterface
{
    
    /**
     * @var ContainerInterface
     */
    private $container;
    
    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    private $em;
    
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // уствноыить контейнер
        $this->container = $container;
        
        // установить EntityManager
        $this->em = $this->container->get('doctrine')->getManager();
    }
    
    
    public function up(Schema $schema)
    {
        // получить все города доставки
        $deliveryCity = $this->em->getRepository('NitraDeliveryBundle:DeliveryCity')->findAll();
        foreach($deliveryCity as $dsCity) {
            
            $city = new City();
            $city->setGeoCity($dsCity->getCity());
            $city->setName($dsCity->getName());
            $this->em->persist($city);
        }
        
        // сохранить
        $this->em->flush();
        
    }

    public function down(Schema $schema)
    {
        
    }
}
    