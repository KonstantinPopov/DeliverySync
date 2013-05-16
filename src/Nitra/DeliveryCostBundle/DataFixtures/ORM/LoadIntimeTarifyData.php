<?php

namespace Nitra\DeliveryCostBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryCostBundle\Entity\IntimeTarify AS IntimeTarify;

class LoadIntimeTarifyData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // для справочника Ин-тайм тарифов на доставку или забор грузов в населённые пункты
        // для Киева
        $tarif = new IntimeTarify();
        $tarif->setPackageType('Конверт фирменный');
        $tarif->setCity('Киев');
        $tarif->setTarif(20.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setPackageType('Пакет фирменный');
        $tarif->setCity('Киев');
        $tarif->setTarif(25.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMax(10);
        $tarif->setSizeMax(0.04);
        $tarif->setTarif(35.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(11);
        $tarif->setWeigthMax(99);
        $tarif->setSizeMin(0.05);
        $tarif->setSizeMax(0.39);
        $tarif->setTarif(50.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(100);
        $tarif->setWeigthMax(499);
        $tarif->setSizeMin(0.4);
        $tarif->setSizeMax(1.99);
        $tarif->setTarif(60.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(500);
        $tarif->setWeigthMax(999);
        $tarif->setSizeMin(2.00);
        $tarif->setSizeMax(3.99);
        $tarif->setTarif(80.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(1000);
        $tarif->setWeigthMax(1999);
        $tarif->setSizeMin(4.00);
        $tarif->setSizeMax(7.99);
        $tarif->setTarif(120.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(2000);
        $tarif->setWeigthMax(2999);
        $tarif->setSizeMin(8.00);
        $tarif->setSizeMax(11.99);
        $tarif->setTarif(200.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(3000);
        $tarif->setWeigthMax(4999);
        $tarif->setSizeMin(12.00);
        $tarif->setSizeMax(19.99);
        $tarif->setTarif(300.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setCity('Киев');
        $tarif->setWeigthMin(5000);
        $tarif->setSizeMin(20.00);
        $tarif->setTarif(600.00);
        $manager->persist($tarif);
        $manager->flush();
        

        // для других городов
        
        $tarif = new IntimeTarify();
        $tarif->setPackageType('Конверт фирменный');
        $tarif->setTarif(20.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setPackageType('Пакет фирменный');
        $tarif->setTarif(25.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMax(10);
        $tarif->setSizeMax(0.04);
        $tarif->setTarif(35.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(11);
        $tarif->setWeigthMax(99);
        $tarif->setSizeMin(0.05);
        $tarif->setSizeMax(0.39);
        $tarif->setTarif(50.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(100);
        $tarif->setWeigthMax(499);
        $tarif->setSizeMin(0.4);
        $tarif->setSizeMax(1.99);
        $tarif->setTarif(60.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(500);
        $tarif->setWeigthMax(999);
        $tarif->setSizeMin(2.00);
        $tarif->setSizeMax(3.99);
        $tarif->setTarif(80.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(1000);
        $tarif->setWeigthMax(1999);
        $tarif->setSizeMin(4.00);
        $tarif->setSizeMax(7.99);
        $tarif->setTarif(120.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(2000);
        $tarif->setWeigthMax(2999);
        $tarif->setSizeMin(8.00);
        $tarif->setSizeMax(11.99);
        $tarif->setTarif(160.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(3000);
        $tarif->setWeigthMax(4999);
        $tarif->setSizeMin(12.00);
        $tarif->setSizeMax(19.99);
        $tarif->setTarif(200.00);
        $manager->persist($tarif);
        $manager->flush();
        
        $tarif = new IntimeTarify();
        $tarif->setWeigthMin(5000);
        $tarif->setSizeMin(20.00);
        $tarif->setTarif(500.00);
        $manager->persist($tarif);
        $manager->flush();
    }
}


