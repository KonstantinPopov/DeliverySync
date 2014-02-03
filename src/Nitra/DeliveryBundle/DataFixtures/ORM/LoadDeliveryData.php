<?php
namespace Nitra\DeliveryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryBundle\Entity\Delivery;

/**
 * LoadDeliveryData
 */
class LoadDeliveryData extends AbstractFixture implements OrderedFixtureInterface
{
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 0; // the order in which fixtures will be loaded
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $delivery1 = new Delivery(); 
        $delivery1->setName('Новая почта'); 
        $manager->persist($delivery1); 
        $this->addReference('deliveryNovaposhta', $delivery1);

        
        $delivery2 = new Delivery(); 
        $delivery2->setName('ИнТайм'); 
        $manager->persist($delivery2); 
        $this->addReference('deliveryIntime', $delivery2);
        
        $delivery3 = new Delivery(); 
        $delivery3->setName('АвтоЛюкс'); 
        $manager->persist($delivery3); 
        $this->addReference('deliveryAutolux', $delivery3);
        
//        $delivery3 = new Delivery(); 
//        $delivery3->setName('Delivery Auto'); 
//        $manager->persist($delivery3); 
//        
//        $delivery4 = new Delivery(); 
//        $delivery4->setName('Ваш Час'); 
//        $manager->persist($delivery4); 
//        
//        $delivery5 = new Delivery(); 
//        $delivery5->setName('ЕвроЭкспресс'); 
//        $manager->persist($delivery5); 
//        
//        $delivery6 = new Delivery(); 
//        $delivery6->setName('МистЭкспресс'); 
//        $manager->persist($delivery6); 
//        
//        $delivery7 = new Delivery(); 
//        $delivery7->setName('САТ'); 
//        $manager->persist($delivery7); 
//        
//        $delivery8 = new Delivery(); 
//        $delivery8->setName('ПЭК'); 
//        $manager->persist($delivery8); 

		// сохранить 
		$manager->flush();

    }
    
}
