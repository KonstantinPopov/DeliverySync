<?php
namespace Nitra\DeliveryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\DeliveryBundle\Entity\Client;

/**
 * LoadClientData
 */
class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $client1 = new Client();
        $client1->setName('NitraLabs.com');
        $client1->setToken(sha1('clientToken::'.uniqid().'::'. microtime(true)));
        $client1->addDeliverie($this->getReference('deliveryNovaposhta'));
        $client1->addDeliverie($this->getReference('deliveryIntime'));
        $manager->persist($client1);
        
        $client2 = new Client();
        $client2->setName('Rezina.CC');
        $client2->setToken(sha1('clientToken::'.uniqid().'::'. microtime(true)));
        $client2->addDeliverie($this->getReference('deliveryNovaposhta'));
        $client2->addDeliverie($this->getReference('deliveryIntime'));
        $manager->persist($client2);
        
        $client3 = new Client();
        $client3->setName('Rezina.NET');
        $client3->setToken(sha1('clientToken::'.uniqid().'::'. microtime(true)));
        $client3->addDeliverie($this->getReference('deliveryNovaposhta'));
        $client3->addDeliverie($this->getReference('deliveryIntime'));
        $manager->persist($client3);
        
		// сохранить 
		$manager->flush();

    }
    
}
