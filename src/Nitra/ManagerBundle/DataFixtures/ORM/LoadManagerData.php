<?php
namespace Nitra\ManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\ManagerBundle\Entity\Manager;
/**
 * LoadManagerData
 */
class LoadManagerData extends AbstractFixture implements OrderedFixtureInterface
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
        
        // создать менеджера
        $manager_1 = new Manager();
        $manager_1->setUsername('admin');
        $manager_1->setPlainPassword('admin');
        $manager_1->setSuperAdmin(true);
        $manager_1->setEnabled(true);
        $manager_1->setEmail('ad@ad.ad');
        $manager->persist($manager_1);
        
        // сохранить 
        $manager->flush();
    }
    
}
