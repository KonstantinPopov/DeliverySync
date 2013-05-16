<?php

namespace Nitra\DeliveryCostBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryCostBundle\Entity\NovaposhtaTarify AS NovaposhtaTarify;

class LoadNovaposhtaTarifyData implements FixtureInterface
{
    /**--
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // склад-склад
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(1);
//        $tarif->setTarif(1.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(2);
//        $tarif->setTarif(1.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(2);
//        $tarif->setTarif(1.20);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(3);
//        $tarif->setTarif(1.65);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(4);
//        $tarif->setTarif(2.10);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(5);
//        $tarif->setTarif(2.55);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-склад');
//        $tarif->setZoneId(6);
//        $tarif->setTarif(3.10);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //склад-дверь или дверь-склад
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('Фирменный пакет и конверт');
//        $tarif->setTarif(20.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('2-10');
//        $tarif->setTarif(25.00);
//        $tarif->setMin(2);
//        $tarif->setMax(10);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('11-100');
//        $tarif->setTarif(40.00);
//        $tarif->setMin(11);
//        $tarif->setMax(100);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('101-500');
//        $tarif->setTarif(75.00);
//        $tarif->setMin(101);
//        $tarif->setMax(500);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('501-1000');
//        $tarif->setTarif(100.00);
//        $tarif->setMin(501);
//        $tarif->setMax(1000);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('1001-1500');
//        $tarif->setTarif(150.00);
//        $tarif->setMin(1001);
//        $tarif->setMax(1500);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('склад-двери');
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(75.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //дверь-дверь
//        //Для зоны № 1
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(45.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(45.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(55.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(70.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(85.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(100.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(120.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(135.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(165.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(245.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(290.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(340.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(385.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(430.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(480.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(545.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(770.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(1000.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(1300.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(1500.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(1);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(540.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //Для зоны № 2
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(45.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(55.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(65.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(75.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(85.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(105.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(130.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(150.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(190.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(275.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(330.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(390.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(450.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(500.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(565.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(650.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(915.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(1200.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(1550.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(1850.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(2);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(660.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //Для зоны № 3
//         $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(45.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(55.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(65.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(75.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(95.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(115.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(140.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(170.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(205.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(315.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(400.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(470.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(550.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(620.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(695.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(800.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(1130.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(1505.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(1950.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(2315.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(3);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(840.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //Для зоны № 4
//         $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(50.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(60.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(70.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(85.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(105.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(125.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(170.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(210.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(270.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(380.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(475.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(580.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(670.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(765.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(870.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(1150.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(1430.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(1900.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(2450.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(2950.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(4);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(1050.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //Для зоны № 5
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(55.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(65.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(75.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(90.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(110.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(130.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(185.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(260.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(330.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(440.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(550.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(680.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(800.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(910.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(1050.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(1300.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(1800.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(2300.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(2900.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(3600.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(5);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(1230.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        //Для зоны № 6
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('Фирменный конверт');
//        $tarif->setTarif(65.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('Фирменный пакет');
//        $tarif->setTarif(80.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('2-5');
//        $tarif->setMin(2);
//        $tarif->setMax(5);
//        $tarif->setTarif(90.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('6-10');
//        $tarif->setMin(6);
//        $tarif->setMax(10);
//        $tarif->setTarif(120.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('11-20');
//        $tarif->setMin(11);
//        $tarif->setMax(20);
//        $tarif->setTarif(145.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('21-30');
//        $tarif->setMin(21);
//        $tarif->setMax(30);
//        $tarif->setTarif(155.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('31-50');
//        $tarif->setMin(31);
//        $tarif->setMax(50);
//        $tarif->setTarif(210.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('51-75');
//        $tarif->setMin(51);
//        $tarif->setMax(75);
//        $tarif->setTarif(320.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('76-100');
//        $tarif->setMin(76);
//        $tarif->setMax(100);
//        $tarif->setTarif(430.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('101-150');
//        $tarif->setMin(101);
//        $tarif->setMax(150);
//        $tarif->setTarif(580.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('151-200');
//        $tarif->setMin(151);
//        $tarif->setMax(200);
//        $tarif->setTarif(665.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('201-250');
//        $tarif->setMin(201);
//        $tarif->setMax(250);
//        $tarif->setTarif(760.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('251-300');
//        $tarif->setMin(251);
//        $tarif->setMax(300);
//        $tarif->setTarif(920.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('301-350');
//        $tarif->setMin(301);
//        $tarif->setMax(350);
//        $tarif->setTarif(1060.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('351-400');
//        $tarif->setMin(351);
//        $tarif->setMax(400);
//        $tarif->setTarif(1210.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('401-500');
//        $tarif->setMin(401);
//        $tarif->setMax(500);
//        $tarif->setTarif(1600.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('501-750');
//        $tarif->setMin(501);
//        $tarif->setMax(750);
//        $tarif->setTarif(2050.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('751-1000');
//        $tarif->setMin(751);
//        $tarif->setMax(1000);
//        $tarif->setTarif(2680.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('1001-1250');
//        $tarif->setMin(1001);
//        $tarif->setMax(1250);
//        $tarif->setTarif(3450.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('1251-1500');
//        $tarif->setMin(1251);
//        $tarif->setMax(1500);
//        $tarif->setTarif(4200.00);
//        $manager->persist($tarif);
//        $manager->flush();
//        
//        $tarif = new NovaposhtaTarify();
//        $tarif->setType('двери-двери');
//        $tarif->setZoneId(6);
//        $tarif->setWeight('За каждые 500 кг после 1500 кг');
//        $tarif->setTarif(1350.00);
//        $manager->persist($tarif);
//        $manager->flush();
    }
}

