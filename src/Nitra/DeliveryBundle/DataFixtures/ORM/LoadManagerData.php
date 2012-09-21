<?php

namespace Nitra\DeliveryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryBundle\Entity\DeliveryService AS DeliveryService;

class LoadManagerData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $ds_1 = new DeliveryService();
        $ds_1->setName('Новая почта');
        $ds_1->setSettings(array('363e5b2b2fb02543a9cedc6e4f1470bc'));
        $manager->persist($ds_1);
        
        $ds_2 = new DeliveryService();
        $ds_2->setName('ИнТайм');
        $manager->persist($ds_2);
        
        $ds_3 = new DeliveryService();
        $ds_3->setName('Delivery Auto');
        $manager->persist($ds_3);
        
        $ds_4 = new DeliveryService();
        $ds_4->setName('Ваш Час');
        $manager->persist($ds_4);
        
        $ds_5 = new DeliveryService();
        $ds_5->setName('ЕвроЭкспресс');
        $manager->persist($ds_5);
        
        $ds_6 = new DeliveryService();
        $ds_6->setName('МистЭкспресс');
        $manager->persist($ds_6);
        
        $ds_7 = new DeliveryService();
        $ds_7->setName('САТ');
        $manager->persist($ds_7);
        $manager->flush();
    }
}
