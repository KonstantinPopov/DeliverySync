<?php

namespace Tetradka\OrderBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\ManagerBundle\Entity\Manager AS Manager;

class LoadManagerData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager_1 = new Manager();
        $manager_1->setUsername('admin');
        $manager_1->setPlainPassword('admin');
        $manager_1->setSuperAdmin(true);
        $manager_1->setEnabled(true);
        $manager_1->setEmail('ad@ad.ad');

        $manager->persist($manager_1);
        $manager->flush();
    }
}
