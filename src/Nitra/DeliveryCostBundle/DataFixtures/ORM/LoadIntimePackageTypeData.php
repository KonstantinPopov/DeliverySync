<?php

namespace Nitra\DeliveryCostBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryCostBundle\Entity\IntimePackageType AS IntimePackageType;

class LoadIntimePackageTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $package = new IntimePackageType();
        $package->setName('секьюрпак');
        $package->setCost(4.80);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофроящик(700х500х500)');
        $package->setCost(13.50);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофроящик(500х400х300)');
        $package->setCost(8.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофроящик(469х279х190)');
        $package->setCost(7.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофроящик(347х274х190)');
        $package->setCost(5.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофроящик(200х120х80)');
        $package->setCost(3.50);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('гофрокартон и стрейчпленка');
        $package->setCost(12.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('мешки большие с пломбой');
        $package->setCost(12.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('мешки для мелкого груза с пломбой');
        $package->setCost(2.65);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('пакет фирменный пластиковый А3');
        $package->setCost(3.50);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('конверт фирменный бумажный А4');
        $package->setCost(2.50);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('паллетирование');
        $package->setCost(45.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('ящик для автостекла');
        $package->setCost(12.00);
        $manager->persist($package);
        $manager->flush();
        
        $package = new IntimePackageType();
        $package->setName('Воздушно-пузырьковая пленка (цена за 1м)');
        $package->setCost(12.00);
        $manager->persist($package);
        $manager->flush();
    }
}


