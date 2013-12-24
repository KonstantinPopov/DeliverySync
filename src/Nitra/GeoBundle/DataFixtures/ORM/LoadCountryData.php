<?php
//namespace Nitra\GeoBundle\DataFixtures\ORM;
//
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Nitra\GeoBundle\Entity\Country;
//
///**
// * LoadCountryData
// */
//class LoadCountryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
//{
//    
//    /**
//     * @var ContainerInterface
//     */
//    private $container;
//    
//    /**
//     * @var \Doctrine\ORM\EntityManager $em
//     */
//    private $em;
//        
//    /**
//     * {@inheritDoc}
//     */
//    public function getOrder()
//    {
//        return 1; // the order in which fixtures will be loaded
//    }
//    
//    /**
//     * {@inheritDoc}
//     */
//    public function setContainer(ContainerInterface $container = null)
//    {
//        // уствноыить контейнер
//        $this->container = $container;
//        
//        // установить EntityManager
//        $this->em = $this->container->get('doctrine')->getManager();
//    }
//        
//        
//    /**
//     * {@inheritDoc}
//     */
//    public function load(ObjectManager $manager)
//    {
//        
//		$country1 = new Country();
//		$country1->setId(1);
//		$country1->setName('Украина');
//		$manager->persist($country1); 
//
//		$country2 = new Country();
//		$country2->setId(2);
//		$country2->setName('Россия');
//		$manager->persist($country2); 
//
//		// сохранить 
//		$manager->flush();
//
//    }
//    
//}