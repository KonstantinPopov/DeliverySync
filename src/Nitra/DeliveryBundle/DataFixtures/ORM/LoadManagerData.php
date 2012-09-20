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
        $manager->flush();
    }
}
