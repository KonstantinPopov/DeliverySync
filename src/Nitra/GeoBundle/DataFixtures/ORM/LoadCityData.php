<?php
//namespace Nitra\GeoBundle\DataFixtures\ORM;
//
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Nitra\GeoBundle\Entity\City;
//
///**
// * LoadCityData
// */
//class LoadCityData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
//        return 3; // the order in which fixtures will be loaded
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
//		$city1= new City();
//		$city1->setId(1);
//		$city1->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1->setName('Абазовка');
//		$manager->persist($city1); 
//
//		$city2= new City();
//		$city2->setId(2);
//		$city2->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2->setName('Авангард');
//		$manager->persist($city2); 
//
//		$city3= new City();
//		$city3->setId(3);
//		$city3->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city3->setName('Авдеевка');
//		$manager->persist($city3); 
//
//		$city4= new City();
//		$city4->setId(4);
//		$city4->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city4->setName('Аграрное');
//		$manager->persist($city4); 
//
//		$city5= new City();
//		$city5->setId(5);
//		$city5->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city5->setName('Агрономичное');
//		$manager->persist($city5); 
//
//		$city6= new City();
//		$city6->setId(6);
//		$city6->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city6->setName('Агрономия');
//		$manager->persist($city6); 
//
//		$city7= new City();
//		$city7->setId(7);
//		$city7->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city7->setName('Адамполь');
//		$manager->persist($city7); 
//
//		$city8= new City();
//		$city8->setId(8);
//		$city8->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city8->setName('Аджамка');
//		$manager->persist($city8); 
//
//		$city9= new City();
//		$city9->setId(9);
//		$city9->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city9->setName('Азовское');
//		$manager->persist($city9); 
//
//		$city10= new City();
//		$city10->setId(10);
//		$city10->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city10->setName('Акимовка');
//		$manager->persist($city10); 
//
//		$city11= new City();
//		$city11->setId(11);
//		$city11->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city11->setName('Александрия');
//		$manager->persist($city11); 
//
//		$city12= new City();
//		$city12->setId(12);
//		$city12->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city12->setName('Александровка');
//		$manager->persist($city12); 
//
//		$city13= new City();
//		$city13->setId(13);
//		$city13->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city13->setName('Александровка');
//		$manager->persist($city13); 
//
//		$city14= new City();
//		$city14->setId(14);
//		$city14->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city14->setName('Александровка');
//		$manager->persist($city14); 
//
//		$city15= new City();
//		$city15->setId(15);
//		$city15->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city15->setName('Александровка');
//		$manager->persist($city15); 
//
//		$city16= new City();
//		$city16->setId(16);
//		$city16->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city16->setName('Александровка');
//		$manager->persist($city16); 
//
//		$city17= new City();
//		$city17->setId(17);
//		$city17->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city17->setName('Александровка');
//		$manager->persist($city17); 
//
//		$city18= new City();
//		$city18->setId(18);
//		$city18->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city18->setName('Александровка');
//		$manager->persist($city18); 
//
//		$city19= new City();
//		$city19->setId(19);
//		$city19->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city19->setName('Александровск');
//		$manager->persist($city19); 
//
//		$city20= new City();
//		$city20->setId(20);
//		$city20->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city20->setName('Александрополь');
//		$manager->persist($city20); 
//
//		$city21= new City();
//		$city21->setId(21);
//		$city21->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city21->setName('Алексеевка');
//		$manager->persist($city21); 
//
//		$city22= new City();
//		$city22->setId(22);
//		$city22->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city22->setName('Алексеево-Дружковка');
//		$manager->persist($city22); 
//
//		$city23= new City();
//		$city23->setId(23);
//		$city23->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city23->setName('Алмазная');
//		$manager->persist($city23); 
//
//		$city24= new City();
//		$city24->setId(24);
//		$city24->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city24->setName('Алтыновка');
//		$manager->persist($city24); 
//
//		$city25= new City();
//		$city25->setId(25);
//		$city25->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city25->setName('Алупка');
//		$manager->persist($city25); 
//
//		$city26= new City();
//		$city26->setId(26);
//		$city26->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city26->setName('Алушта');
//		$manager->persist($city26); 
//
//		$city27= new City();
//		$city27->setId(27);
//		$city27->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city27->setName('Алчевск');
//		$manager->persist($city27); 
//
//		$city28= new City();
//		$city28->setId(28);
//		$city28->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city28->setName('Амвросиевка');
//		$manager->persist($city28); 
//
//		$city29= new City();
//		$city29->setId(29);
//		$city29->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city29->setName('Ананьев');
//		$manager->persist($city29); 
//
//		$city30= new City();
//		$city30->setId(30);
//		$city30->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city30->setName('Андреевка');
//		$manager->persist($city30); 
//
//		$city31= new City();
//		$city31->setId(31);
//		$city31->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city31->setName('Андреевка');
//		$manager->persist($city31); 
//
//		$city32= new City();
//		$city32->setId(32);
//		$city32->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city32->setName('Андреевка');
//		$manager->persist($city32); 
//
//		$city33= new City();
//		$city33->setId(33);
//		$city33->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city33->setName('Андреевка');
//		$manager->persist($city33); 
//
//		$city34= new City();
//		$city34->setId(34);
//		$city34->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city34->setName('Андреевка');
//		$manager->persist($city34); 
//
//		$city35= new City();
//		$city35->setId(35);
//		$city35->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city35->setName('Андрияшивка');
//		$manager->persist($city35); 
//
//		$city36= new City();
//		$city36->setId(36);
//		$city36->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city36->setName('Андрушевка');
//		$manager->persist($city36); 
//
//		$city37= new City();
//		$city37->setId(37);
//		$city37->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city37->setName('Андрушки');
//		$manager->persist($city37); 
//
//		$city38= new City();
//		$city38->setId(38);
//		$city38->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city38->setName('Аннополь');
//		$manager->persist($city38); 
//
//		$city39= new City();
//		$city39->setId(39);
//		$city39->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city39->setName('Анталовцы');
//		$manager->persist($city39); 
//
//		$city40= new City();
//		$city40->setId(40);
//		$city40->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city40->setName('Антоновка');
//		$manager->persist($city40); 
//
//		$city41= new City();
//		$city41->setId(41);
//		$city41->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city41->setName('Антоновка');
//		$manager->persist($city41); 
//
//		$city42= new City();
//		$city42->setId(42);
//		$city42->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city42->setName('Антополь');
//		$manager->persist($city42); 
//
//		$city43= new City();
//		$city43->setId(43);
//		$city43->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city43->setName('Антрацит');
//		$manager->persist($city43); 
//
//		$city44= new City();
//		$city44->setId(44);
//		$city44->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city44->setName('Апостолово');
//		$manager->persist($city44); 
//
//		$city45= new City();
//		$city45->setId(45);
//		$city45->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city45->setName('Арбузинка');
//		$manager->persist($city45); 
//
//		$city46= new City();
//		$city46->setId(46);
//		$city46->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city46->setName('Армянск');
//		$manager->persist($city46); 
//
//		$city47= new City();
//		$city47->setId(47);
//		$city47->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city47->setName('Артема');
//		$manager->persist($city47); 
//
//		$city48= new City();
//		$city48->setId(48);
//		$city48->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city48->setName('Артемовка');
//		$manager->persist($city48); 
//
//		$city49= new City();
//		$city49->setId(49);
//		$city49->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city49->setName('Артемово');
//		$manager->persist($city49); 
//
//		$city50= new City();
//		$city50->setId(50);
//		$city50->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city50->setName('Артемовск');
//		$manager->persist($city50); 
//
//		$city51= new City();
//		$city51->setId(51);
//		$city51->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city51->setName('Артемовск');
//		$manager->persist($city51); 
//
//		$city52= new City();
//		$city52->setId(52);
//		$city52->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city52->setName('Артемовское');
//		$manager->persist($city52); 
//
//		$city53= new City();
//		$city53->setId(53);
//		$city53->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city53->setName('Арциз');
//		$manager->persist($city53); 
//
//		$city54= new City();
//		$city54->setId(54);
//		$city54->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city54->setName('Аскания-Нова');
//		$manager->persist($city54); 
//
//		$city55= new City();
//		$city55->setId(55);
//		$city55->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city55->setName('Аулы');
//		$manager->persist($city55); 
//
//		$city56= new City();
//		$city56->setId(56);
//		$city56->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city56->setName('Ахтырка');
//		$manager->persist($city56); 
//
//		$city57= new City();
//		$city57->setId(57);
//		$city57->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city57->setName('Аэрофлотский');
//		$manager->persist($city57); 
//
//		$city58= new City();
//		$city58->setId(58);
//		$city58->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city58->setName('Бабаи');
//		$manager->persist($city58); 
//
//		$city59= new City();
//		$city59->setId(59);
//		$city59->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city59->setName('Бабанка');
//		$manager->persist($city59); 
//
//		$city60= new City();
//		$city60->setId(60);
//		$city60->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city60->setName('Бабин');
//		$manager->persist($city60); 
//
//		$city61= new City();
//		$city61->setId(61);
//		$city61->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city61->setName('Бабин');
//		$manager->persist($city61); 
//
//		$city62= new City();
//		$city62->setId(62);
//		$city62->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city62->setName('Бабинцы');
//		$manager->persist($city62); 
//
//		$city63= new City();
//		$city63->setId(63);
//		$city63->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city63->setName('Багерово');
//		$manager->persist($city63); 
//
//		$city64= new City();
//		$city64->setId(64);
//		$city64->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city64->setName('Багрин');
//		$manager->persist($city64); 
//
//		$city65= new City();
//		$city65->setId(65);
//		$city65->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city65->setName('Базальтовое');
//		$manager->persist($city65); 
//
//		$city66= new City();
//		$city66->setId(66);
//		$city66->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city66->setName('Байбузы');
//		$manager->persist($city66); 
//
//		$city67= new City();
//		$city67->setId(67);
//		$city67->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city67->setName('Байковцы');
//		$manager->persist($city67); 
//
//		$city68= new City();
//		$city68->setId(68);
//		$city68->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city68->setName('Байрачки');
//		$manager->persist($city68); 
//
//		$city69= new City();
//		$city69->setId(69);
//		$city69->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city69->setName('Балабино');
//		$manager->persist($city69); 
//
//		$city70= new City();
//		$city70->setId(70);
//		$city70->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city70->setName('Балаклея');
//		$manager->persist($city70); 
//
//		$city71= new City();
//		$city71->setId(71);
//		$city71->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city71->setName('Балки');
//		$manager->persist($city71); 
//
//		$city72= new City();
//		$city72->setId(72);
//		$city72->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city72->setName('Баловка');
//		$manager->persist($city72); 
//
//		$city73= new City();
//		$city73->setId(73);
//		$city73->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city73->setName('Баловное');
//		$manager->persist($city73); 
//
//		$city74= new City();
//		$city74->setId(74);
//		$city74->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city74->setName('Балта');
//		$manager->persist($city74); 
//
//		$city75= new City();
//		$city75->setId(75);
//		$city75->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city75->setName('Бандурка');
//		$manager->persist($city75); 
//
//		$city76= new City();
//		$city76->setId(76);
//		$city76->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city76->setName('Баничи');
//		$manager->persist($city76); 
//
//		$city77= new City();
//		$city77->setId(77);
//		$city77->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city77->setName('Баня лысовицкая');
//		$manager->persist($city77); 
//
//		$city78= new City();
//		$city78->setId(78);
//		$city78->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city78->setName('Бар');
//		$manager->persist($city78); 
//
//		$city79= new City();
//		$city79->setId(79);
//		$city79->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city79->setName('Баранинцы');
//		$manager->persist($city79); 
//
//		$city80= new City();
//		$city80->setId(80);
//		$city80->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city80->setName('Барановка');
//		$manager->persist($city80); 
//
//		$city81= new City();
//		$city81->setId(81);
//		$city81->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city81->setName('Барвенково');
//		$manager->persist($city81); 
//
//		$city82= new City();
//		$city82->setId(82);
//		$city82->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city82->setName('Барвинок');
//		$manager->persist($city82); 
//
//		$city83= new City();
//		$city83->setId(83);
//		$city83->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city83->setName('Бармашово');
//		$manager->persist($city83); 
//
//		$city84= new City();
//		$city84->setId(84);
//		$city84->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city84->setName('Барышевка');
//		$manager->persist($city84); 
//
//		$city85= new City();
//		$city85->setId(85);
//		$city85->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city85->setName('Басовка');
//		$manager->persist($city85); 
//
//		$city86= new City();
//		$city86->setId(86);
//		$city86->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city86->setName('Батурин');
//		$manager->persist($city86); 
//
//		$city87= new City();
//		$city87->setId(87);
//		$city87->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city87->setName('Батьево');
//		$manager->persist($city87); 
//
//		$city88= new City();
//		$city88->setId(88);
//		$city88->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city88->setName('Бахматовцы');
//		$manager->persist($city88); 
//
//		$city89= new City();
//		$city89->setId(89);
//		$city89->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city89->setName('Бахмач');
//		$manager->persist($city89); 
//
//		$city90= new City();
//		$city90->setId(90);
//		$city90->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city90->setName('Бахмутское');
//		$manager->persist($city90); 
//
//		$city91= new City();
//		$city91->setId(91);
//		$city91->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city91->setName('Бахчисарай');
//		$manager->persist($city91); 
//
//		$city92= new City();
//		$city92->setId(92);
//		$city92->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city92->setName('Баштанка');
//		$manager->persist($city92); 
//
//		$city93= new City();
//		$city93->setId(93);
//		$city93->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city93->setName('Бедевля');
//		$manager->persist($city93); 
//
//		$city94= new City();
//		$city94->setId(94);
//		$city94->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city94->setName('Безлюдовка');
//		$manager->persist($city94); 
//
//		$city95= new City();
//		$city95->setId(95);
//		$city95->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city95->setName('Безпятное');
//		$manager->persist($city95); 
//
//		$city96= new City();
//		$city96->setId(96);
//		$city96->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city96->setName('Безугловка');
//		$manager->persist($city96); 
//
//		$city97= new City();
//		$city97->setId(97);
//		$city97->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city97->setName('Белая');
//		$manager->persist($city97); 
//
//		$city98= new City();
//		$city98->setId(98);
//		$city98->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city98->setName('Белая гора');
//		$manager->persist($city98); 
//
//		$city99= new City();
//		$city99->setId(99);
//		$city99->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city99->setName('Белая Криница');
//		$manager->persist($city99); 
//
//		$city100= new City();
//		$city100->setId(100);
//		$city100->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city100->setName('Белая криница');
//		$manager->persist($city100); 
//
//		$city101= new City();
//		$city101->setId(101);
//		$city101->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city101->setName('Белая');
//		$manager->persist($city101); 
//
//		$city102= new City();
//		$city102->setId(102);
//		$city102->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city102->setName('Бел-Днестр');
//		$manager->persist($city102); 
//
//		$city103= new City();
//		$city103->setId(103);
//		$city103->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city103->setName('Белз');
//		$manager->persist($city103); 
//
//		$city104= new City();
//		$city104->setId(104);
//		$city104->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city104->setName('Белики');
//		$manager->persist($city104); 
//
//		$city105= new City();
//		$city105->setId(105);
//		$city105->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city105->setName('Белин');
//		$manager->persist($city105); 
//
//		$city106= new City();
//		$city106->setId(106);
//		$city106->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city106->setName('Белино');
//		$manager->persist($city106); 
//
//		$city107= new City();
//		$city107->setId(107);
//		$city107->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city107->setName('Белицкое');
//		$manager->persist($city107); 
//
//		$city108= new City();
//		$city108->setId(108);
//		$city108->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city108->setName('Белки');
//		$manager->persist($city108); 
//
//		$city109= new City();
//		$city109->setId(109);
//		$city109->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city109->setName('Белобожница');
//		$manager->persist($city109); 
//
//		$city110= new City();
//		$city110->setId(110);
//		$city110->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city110->setName('Беловодск');
//		$manager->persist($city110); 
//
//		$city111= new City();
//		$city111->setId(111);
//		$city111->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city111->setName('Беловоды');
//		$manager->persist($city111); 
//
//		$city112= new City();
//		$city112->setId(112);
//		$city112->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city112->setName('Белоглинка');
//		$manager->persist($city112); 
//
//		$city113= new City();
//		$city113->setId(113);
//		$city113->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city113->setName('Голая');
//		$manager->persist($city113); 
//
//		$city114= new City();
//		$city114->setId(114);
//		$city114->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city114->setName('Белогорск');
//		$manager->persist($city114); 
//
//		$city115= new City();
//		$city115->setId(115);
//		$city115->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city115->setName('Белогорье');
//		$manager->persist($city115); 
//
//		$city116= new City();
//		$city116->setId(116);
//		$city116->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city116->setName('Белое');
//		$manager->persist($city116); 
//
//		$city117= new City();
//		$city117->setId(117);
//		$city117->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city117->setName('Белозерка');
//		$manager->persist($city117); 
//
//		$city118= new City();
//		$city118->setId(118);
//		$city118->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city118->setName('Белозерское');
//		$manager->persist($city118); 
//
//		$city119= new City();
//		$city119->setId(119);
//		$city119->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city119->setName('Белозорье');
//		$manager->persist($city119); 
//
//		$city120= new City();
//		$city120->setId(120);
//		$city120->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city120->setName('Белокриница');
//		$manager->persist($city120); 
//
//		$city121= new City();
//		$city121->setId(121);
//		$city121->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city121->setName('Белокузьминовка');
//		$manager->persist($city121); 
//
//		$city122= new City();
//		$city122->setId(122);
//		$city122->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city122->setName('Белокуракино');
//		$manager->persist($city122); 
//
//		$city123= new City();
//		$city123->setId(123);
//		$city123->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city123->setName('Белополье');
//		$manager->persist($city123); 
//
//		$city124= new City();
//		$city124->setId(124);
//		$city124->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city124->setName('Белореченский');
//		$manager->persist($city124); 
//
//		$city125= new City();
//		$city125->setId(125);
//		$city125->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city125->setName('Белошицкая слобода');
//		$manager->persist($city125); 
//
//		$city126= new City();
//		$city126->setId(126);
//		$city126->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city126->setName('Белый колодезь');
//		$manager->persist($city126); 
//
//		$city127= new City();
//		$city127->setId(127);
//		$city127->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city127->setName('Беляевка');
//		$manager->persist($city127); 
//
//		$city128= new City();
//		$city128->setId(128);
//		$city128->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city128->setName('Бердичев');
//		$manager->persist($city128); 
//
//		$city129= new City();
//		$city129->setId(129);
//		$city129->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city129->setName('Бердянск');
//		$manager->persist($city129); 
//
//		$city130= new City();
//		$city130->setId(130);
//		$city130->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city130->setName('Бердянское');
//		$manager->persist($city130); 
//
//		$city131= new City();
//		$city131->setId(131);
//		$city131->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city131->setName('Берегово');
//		$manager->persist($city131); 
//
//		$city132= new City();
//		$city132->setId(132);
//		$city132->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city132->setName('Берегомет');
//		$manager->persist($city132); 
//
//		$city133= new City();
//		$city133->setId(133);
//		$city133->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city133->setName('Бережаны');
//		$manager->persist($city133); 
//
//		$city134= new City();
//		$city134->setId(134);
//		$city134->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city134->setName('Бережинка');
//		$manager->persist($city134); 
//
//		$city135= new City();
//		$city135->setId(135);
//		$city135->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city135->setName('Береза');
//		$manager->persist($city135); 
//
//		$city136= new City();
//		$city136->setId(136);
//		$city136->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city136->setName('Березанка');
//		$manager->persist($city136); 
//
//		$city137= new City();
//		$city137->setId(137);
//		$city137->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city137->setName('Березанка');
//		$manager->persist($city137); 
//
//		$city138= new City();
//		$city138->setId(138);
//		$city138->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city138->setName('Березань');
//		$manager->persist($city138); 
//
//		$city139= new City();
//		$city139->setId(139);
//		$city139->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city139->setName('Березина');
//		$manager->persist($city139); 
//
//		$city140= new City();
//		$city140->setId(140);
//		$city140->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city140->setName('Березино');
//		$manager->persist($city140); 
//
//		$city141= new City();
//		$city141->setId(141);
//		$city141->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city141->setName('Березна');
//		$manager->persist($city141); 
//
//		$city142= new City();
//		$city142->setId(142);
//		$city142->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city142->setName('Березнеговатое');
//		$manager->persist($city142); 
//
//		$city143= new City();
//		$city143->setId(143);
//		$city143->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city143->setName('Березно');
//		$manager->persist($city143); 
//
//		$city144= new City();
//		$city144->setId(144);
//		$city144->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city144->setName('Березовка');
//		$manager->persist($city144); 
//
//		$city145= new City();
//		$city145->setId(145);
//		$city145->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city145->setName('Березовка');
//		$manager->persist($city145); 
//
//		$city146= new City();
//		$city146->setId(146);
//		$city146->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city146->setName('Березово');
//		$manager->persist($city146); 
//
//		$city147= new City();
//		$city147->setId(147);
//		$city147->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city147->setName('Берека');
//		$manager->persist($city147); 
//
//		$city148= new City();
//		$city148->setId(148);
//		$city148->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city148->setName('Берестечко');
//		$manager->persist($city148); 
//
//		$city149= new City();
//		$city149->setId(149);
//		$city149->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city149->setName('Берестовец');
//		$manager->persist($city149); 
//
//		$city150= new City();
//		$city150->setId(150);
//		$city150->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city150->setName('Берислав');
//		$manager->persist($city150); 
//
//		$city151= new City();
//		$city151->setId(151);
//		$city151->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city151->setName('Бершадь');
//		$manager->persist($city151); 
//
//		$city152= new City();
//		$city152->setId(152);
//		$city152->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city152->setName('Беспечная');
//		$manager->persist($city152); 
//
//		$city153= new City();
//		$city153->setId(153);
//		$city153->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city153->setName('Бехи');
//		$manager->persist($city153); 
//
//		$city154= new City();
//		$city154->setId(154);
//		$city154->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city154->setName('Биологичное');
//		$manager->persist($city154); 
//
//		$city155= new City();
//		$city155->setId(155);
//		$city155->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city155->setName('Бирки');
//		$manager->persist($city155); 
//
//		$city156= new City();
//		$city156->setId(156);
//		$city156->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city156->setName('Бисковичи');
//		$manager->persist($city156); 
//
//		$city157= new City();
//		$city157->setId(157);
//		$city157->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city157->setName('Ближнее');
//		$manager->persist($city157); 
//
//		$city158= new City();
//		$city158->setId(158);
//		$city158->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city158->setName('Близнецы');
//		$manager->persist($city158); 
//
//		$city159= new City();
//		$city159->setId(159);
//		$city159->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city159->setName('Блиставица');
//		$manager->persist($city159); 
//
//		$city160= new City();
//		$city160->setId(160);
//		$city160->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city160->setName('Бобрик');
//		$manager->persist($city160); 
//
//		$city161= new City();
//		$city161->setId(161);
//		$city161->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city161->setName('Бобриково');
//		$manager->persist($city161); 
//
//		$city162= new City();
//		$city162->setId(162);
//		$city162->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city162->setName('Бобринец');
//		$manager->persist($city162); 
//
//		$city163= new City();
//		$city163->setId(163);
//		$city163->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city163->setName('Бобрка');
//		$manager->persist($city163); 
//
//		$city164= new City();
//		$city164->setId(164);
//		$city164->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city164->setName('Бобровица');
//		$manager->persist($city164); 
//
//		$city165= new City();
//		$city165->setId(165);
//		$city165->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city165->setName('Боброво');
//		$manager->persist($city165); 
//
//		$city166= new City();
//		$city166->setId(166);
//		$city166->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city166->setName('Богдан');
//		$manager->persist($city166); 
//
//		$city167= new City();
//		$city167->setId(167);
//		$city167->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city167->setName('Богдановка');
//		$manager->persist($city167); 
//
//		$city168= new City();
//		$city168->setId(168);
//		$city168->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city168->setName('Богдановка');
//		$manager->persist($city168); 
//
//		$city169= new City();
//		$city169->setId(169);
//		$city169->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city169->setName('Богдановка');
//		$manager->persist($city169); 
//
//		$city170= new City();
//		$city170->setId(170);
//		$city170->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city170->setName('Богдановка');
//		$manager->persist($city170); 
//
//		$city171= new City();
//		$city171->setId(171);
//		$city171->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city171->setName('Богдановцы');
//		$manager->persist($city171); 
//
//		$city172= new City();
//		$city172->setId(172);
//		$city172->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city172->setName('Богодухов');
//		$manager->persist($city172); 
//
//		$city173= new City();
//		$city173->setId(173);
//		$city173->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city173->setName('Богородчаны');
//		$manager->persist($city173); 
//
//		$city174= new City();
//		$city174->setId(174);
//		$city174->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city174->setName('Богоявленка');
//		$manager->persist($city174); 
//
//		$city175= new City();
//		$city175->setId(175);
//		$city175->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city175->setName('Богуслав');
//		$manager->persist($city175); 
//
//		$city176= new City();
//		$city176->setId(176);
//		$city176->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city176->setName('Богуслав');
//		$manager->persist($city176); 
//
//		$city177= new City();
//		$city177->setId(177);
//		$city177->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city177->setName('Боднаров');
//		$manager->persist($city177); 
//
//		$city178= new City();
//		$city178->setId(178);
//		$city178->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city178->setName('Божковское');
//		$manager->persist($city178); 
//
//		$city179= new City();
//		$city179->setId(179);
//		$city179->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city179->setName('Боков');
//		$manager->persist($city179); 
//
//		$city180= new City();
//		$city180->setId(180);
//		$city180->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city180->setName('Болград');
//		$manager->persist($city180); 
//
//		$city181= new City();
//		$city181->setId(181);
//		$city181->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city181->setName('Болехов');
//		$manager->persist($city181); 
//
//		$city182= new City();
//		$city182->setId(182);
//		$city182->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city182->setName('Большая Виска');
//		$manager->persist($city182); 
//
//		$city183= new City();
//		$city183->setId(183);
//		$city183->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city183->setName('Большой Олексин');
//		$manager->persist($city183); 
//
//		$city184= new City();
//		$city184->setId(184);
//		$city184->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city184->setName('Бондаренково');
//		$manager->persist($city184); 
//
//		$city185= new City();
//		$city185->setId(185);
//		$city185->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city185->setName('Бондари');
//		$manager->persist($city185); 
//
//		$city186= new City();
//		$city186->setId(186);
//		$city186->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city186->setName('Бондаривка');
//		$manager->persist($city186); 
//
//		$city187= new City();
//		$city187->setId(187);
//		$city187->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city187->setName('Боратин');
//		$manager->persist($city187); 
//
//		$city188= new City();
//		$city188->setId(188);
//		$city188->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city188->setName('Борзна');
//		$manager->persist($city188); 
//
//		$city189= new City();
//		$city189->setId(189);
//		$city189->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city189->setName('Борислав');
//		$manager->persist($city189); 
//
//		$city190= new City();
//		$city190->setId(190);
//		$city190->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city190->setName('Борисполь');
//		$manager->persist($city190); 
//
//		$city191= new City();
//		$city191->setId(191);
//		$city191->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city191->setName('Борки');
//		$manager->persist($city191); 
//
//		$city192= new City();
//		$city192->setId(192);
//		$city192->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city192->setName('Борки');
//		$manager->persist($city192); 
//
//		$city193= new City();
//		$city193->setId(193);
//		$city193->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city193->setName('Боровая (Харьков)');
//		$manager->persist($city193); 
//
//		$city194= new City();
//		$city194->setId(194);
//		$city194->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city194->setName('Боровая');
//		$manager->persist($city194); 
//
//		$city195= new City();
//		$city195->setId(195);
//		$city195->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city195->setName('Боровеньки');
//		$manager->persist($city195); 
//
//		$city196= new City();
//		$city196->setId(196);
//		$city196->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city196->setName('Боровское');
//		$manager->persist($city196); 
//
//		$city197= new City();
//		$city197->setId(197);
//		$city197->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city197->setName('Боровцы');
//		$manager->persist($city197); 
//
//		$city198= new City();
//		$city198->setId(198);
//		$city198->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city198->setName('Бородянка');
//		$manager->persist($city198); 
//
//		$city199= new City();
//		$city199->setId(199);
//		$city199->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city199->setName('Борозенское');
//		$manager->persist($city199); 
//
//		$city200= new City();
//		$city200->setId(200);
//		$city200->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city200->setName('Боромля');
//		$manager->persist($city200); 
//
//		$city201= new City();
//		$city201->setId(201);
//		$city201->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city201->setName('Боромыки');
//		$manager->persist($city201); 
//
//		$city202= new City();
//		$city202->setId(202);
//		$city202->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city202->setName('Боронява');
//		$manager->persist($city202); 
//
//		$city203= new City();
//		$city203->setId(203);
//		$city203->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city203->setName('Бортничи');
//		$manager->persist($city203); 
//
//		$city204= new City();
//		$city204->setId(204);
//		$city204->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city204->setName('Борщев');
//		$manager->persist($city204); 
//
//		$city205= new City();
//		$city205->setId(205);
//		$city205->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city205->setName('Борщи');
//		$manager->persist($city205); 
//
//		$city206= new City();
//		$city206->setId(206);
//		$city206->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city206->setName('Бохоники');
//		$manager->persist($city206); 
//
//		$city207= new City();
//		$city207->setId(207);
//		$city207->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city207->setName('Бояны');
//		$manager->persist($city207); 
//
//		$city208= new City();
//		$city208->setId(208);
//		$city208->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city208->setName('Боярка');
//		$manager->persist($city208); 
//
//		$city209= new City();
//		$city209->setId(209);
//		$city209->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city209->setName('Брагиновка');
//		$manager->persist($city209); 
//
//		$city210= new City();
//		$city210->setId(210);
//		$city210->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city210->setName('Брагиновка');
//		$manager->persist($city210); 
//
//		$city211= new City();
//		$city211->setId(211);
//		$city211->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city211->setName('Браилов');
//		$manager->persist($city211); 
//
//		$city212= new City();
//		$city212->setId(212);
//		$city212->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city212->setName('Братское');
//		$manager->persist($city212); 
//
//		$city213= new City();
//		$city213->setId(213);
//		$city213->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city213->setName('Братское');
//		$manager->persist($city213); 
//
//		$city214= new City();
//		$city214->setId(214);
//		$city214->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city214->setName('Брацлав');
//		$manager->persist($city214); 
//
//		$city215= new City();
//		$city215->setId(215);
//		$city215->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city215->setName('Бригинцы');
//		$manager->persist($city215); 
//
//		$city216= new City();
//		$city216->setId(216);
//		$city216->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city216->setName('Брилевка');
//		$manager->persist($city216); 
//
//		$city217= new City();
//		$city217->setId(217);
//		$city217->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city217->setName('Бритовка');
//		$manager->persist($city217); 
//
//		$city218= new City();
//		$city218->setId(218);
//		$city218->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city218->setName('Бровары');
//		$manager->persist($city218); 
//
//		$city219= new City();
//		$city219->setId(219);
//		$city219->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city219->setName('Бродецкое');
//		$manager->persist($city219); 
//
//		$city220= new City();
//		$city220->setId(220);
//		$city220->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city220->setName('Броды');
//		$manager->persist($city220); 
//
//		$city221= new City();
//		$city221->setId(221);
//		$city221->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city221->setName('Броницкая Гута');
//		$manager->persist($city221); 
//
//		$city222= new City();
//		$city222->setId(222);
//		$city222->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city222->setName('Брошнив');
//		$manager->persist($city222); 
//
//		$city223= new City();
//		$city223->setId(223);
//		$city223->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city223->setName('Брошнив-Осада');
//		$manager->persist($city223); 
//
//		$city224= new City();
//		$city224->setId(224);
//		$city224->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city224->setName('Брусилов');
//		$manager->persist($city224); 
//
//		$city225= new City();
//		$city225->setId(225);
//		$city225->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city225->setName('Брюховичи');
//		$manager->persist($city225); 
//
//		$city226= new City();
//		$city226->setId(226);
//		$city226->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city226->setName('Брянка');
//		$manager->persist($city226); 
//
//		$city227= new City();
//		$city227->setId(227);
//		$city227->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city227->setName('Бугаевка');
//		$manager->persist($city227); 
//
//		$city228= new City();
//		$city228->setId(228);
//		$city228->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city228->setName('Бугрин');
//		$manager->persist($city228); 
//
//		$city229= new City();
//		$city229->setId(229);
//		$city229->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city229->setName('Бугское');
//		$manager->persist($city229); 
//
//		$city230= new City();
//		$city230->setId(230);
//		$city230->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city230->setName('Буданов');
//		$manager->persist($city230); 
//
//		$city231= new City();
//		$city231->setId(231);
//		$city231->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city231->setName('Будивельное');
//		$manager->persist($city231); 
//
//		$city232= new City();
//		$city232->setId(232);
//		$city232->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city232->setName('Будилка');
//		$manager->persist($city232); 
//
//		$city233= new City();
//		$city233->setId(233);
//		$city233->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city233->setName('Будище');
//		$manager->persist($city233); 
//
//		$city234= new City();
//		$city234->setId(234);
//		$city234->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city234->setName('Будки');
//		$manager->persist($city234); 
//
//		$city235= new City();
//		$city235->setId(235);
//		$city235->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city235->setName('Буды');
//		$manager->persist($city235); 
//
//		$city236= new City();
//		$city236->setId(236);
//		$city236->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city236->setName('Бужанка');
//		$manager->persist($city236); 
//
//		$city237= new City();
//		$city237->setId(237);
//		$city237->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city237->setName('Бузовая');
//		$manager->persist($city237); 
//
//		$city238= new City();
//		$city238->setId(238);
//		$city238->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city238->setName('Бузуков');
//		$manager->persist($city238); 
//
//		$city239= new City();
//		$city239->setId(239);
//		$city239->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city239->setName('Буймеровка');
//		$manager->persist($city239); 
//
//		$city240= new City();
//		$city240->setId(240);
//		$city240->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city240->setName('Бурлача балка');
//		$manager->persist($city240); 
//
//		$city241= new City();
//		$city241->setId(241);
//		$city241->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city241->setName('Буртын');
//		$manager->persist($city241); 
//
//		$city242= new City();
//		$city242->setId(242);
//		$city242->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city242->setName('Бурштын');
//		$manager->persist($city242); 
//
//		$city243= new City();
//		$city243->setId(243);
//		$city243->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city243->setName('Бурынь');
//		$manager->persist($city243); 
//
//		$city244= new City();
//		$city244->setId(244);
//		$city244->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city244->setName('Буск');
//		$manager->persist($city244); 
//
//		$city245= new City();
//		$city245->setId(245);
//		$city245->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city245->setName('Бутенки');
//		$manager->persist($city245); 
//
//		$city246= new City();
//		$city246->setId(246);
//		$city246->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city246->setName('Буцин');
//		$manager->persist($city246); 
//
//		$city247= new City();
//		$city247->setId(247);
//		$city247->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city247->setName('Буча');
//		$manager->persist($city247); 
//
//		$city248= new City();
//		$city248->setId(248);
//		$city248->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city248->setName('Бучалы');
//		$manager->persist($city248); 
//
//		$city249= new City();
//		$city249->setId(249);
//		$city249->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city249->setName('Бучач');
//		$manager->persist($city249); 
//
//		$city250= new City();
//		$city250->setId(250);
//		$city250->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city250->setName('Буштыно');
//		$manager->persist($city250); 
//
//		$city251= new City();
//		$city251->setId(251);
//		$city251->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city251->setName('Быковка');
//		$manager->persist($city251); 
//
//		$city252= new City();
//		$city252->setId(252);
//		$city252->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city252->setName('Былбасовка');
//		$manager->persist($city252); 
//
//		$city253= new City();
//		$city253->setId(253);
//		$city253->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city253->setName('Быстрик');
//		$manager->persist($city253); 
//
//		$city254= new City();
//		$city254->setId(254);
//		$city254->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city254->setName('Быстричи');
//		$manager->persist($city254); 
//
//		$city255= new City();
//		$city255->setId(255);
//		$city255->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city255->setName('В.Киреевка');
//		$manager->persist($city255); 
//
//		$city256= new City();
//		$city256->setId(256);
//		$city256->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city256->setName('Валки');
//		$manager->persist($city256); 
//
//		$city257= new City();
//		$city257->setId(257);
//		$city257->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city257->setName('Валовое');
//		$manager->persist($city257); 
//
//		$city258= new City();
//		$city258->setId(258);
//		$city258->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city258->setName('Валуйское');
//		$manager->persist($city258); 
//
//		$city259= new City();
//		$city259->setId(259);
//		$city259->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city259->setName('Валя кузьмина');
//		$manager->persist($city259); 
//
//		$city260= new City();
//		$city260->setId(260);
//		$city260->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city260->setName('Валява');
//		$manager->persist($city260); 
//
//		$city261= new City();
//		$city261->setId(261);
//		$city261->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city261->setName('Ваньковичи');
//		$manager->persist($city261); 
//
//		$city262= new City();
//		$city262->setId(262);
//		$city262->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city262->setName('Вапнярка');
//		$manager->persist($city262); 
//
//		$city263= new City();
//		$city263->setId(263);
//		$city263->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city263->setName('Варва');
//		$manager->persist($city263); 
//
//		$city264= new City();
//		$city264->setId(264);
//		$city264->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city264->setName('Варваринцы');
//		$manager->persist($city264); 
//
//		$city265= new City();
//		$city265->setId(265);
//		$city265->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city265->setName('Варковичи');
//		$manager->persist($city265); 
//
//		$city266= new City();
//		$city266->setId(266);
//		$city266->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city266->setName('Вары');
//		$manager->persist($city266); 
//
//		$city267= new City();
//		$city267->setId(267);
//		$city267->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city267->setName('Васильевка');
//		$manager->persist($city267); 
//
//		$city268= new City();
//		$city268->setId(268);
//		$city268->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city268->setName('Васильков');
//		$manager->persist($city268); 
//
//		$city269= new City();
//		$city269->setId(269);
//		$city269->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city269->setName('Васильков');
//		$manager->persist($city269); 
//
//		$city270= new City();
//		$city270->setId(270);
//		$city270->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city270->setName('Васильковка');
//		$manager->persist($city270); 
//
//		$city271= new City();
//		$city271->setId(271);
//		$city271->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city271->setName('Васищево');
//		$manager->persist($city271); 
//
//		$city272= new City();
//		$city272->setId(272);
//		$city272->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city272->setName('Васьковичи');
//		$manager->persist($city272); 
//
//		$city273= new City();
//		$city273->setId(273);
//		$city273->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city273->setName('Ватутино');
//		$manager->persist($city273); 
//
//		$city274= new City();
//		$city274->setId(274);
//		$city274->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city274->setName('Ватутино');
//		$manager->persist($city274); 
//
//		$city275= new City();
//		$city275->setId(275);
//		$city275->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city275->setName('Вахрушево');
//		$manager->persist($city275); 
//
//		$city276= new City();
//		$city276->setId(276);
//		$city276->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city276->setName('Вашковцы');
//		$manager->persist($city276); 
//
//		$city277= new City();
//		$city277->setId(277);
//		$city277->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city277->setName('Введенка');
//		$manager->persist($city277); 
//
//		$city278= new City();
//		$city278->setId(278);
//		$city278->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city278->setName('Великая Александровка');
//		$manager->persist($city278); 
//
//		$city279= new City();
//		$city279->setId(279);
//		$city279->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city279->setName('Великая Багачка');
//		$manager->persist($city279); 
//
//		$city280= new City();
//		$city280->setId(280);
//		$city280->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city280->setName('Великая бакта');
//		$manager->persist($city280); 
//
//		$city281= new City();
//		$city281->setId(281);
//		$city281->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city281->setName('Великая Белозерка');
//		$manager->persist($city281); 
//
//		$city282= new City();
//		$city282->setId(282);
//		$city282->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city282->setName('Великая Березовица');
//		$manager->persist($city282); 
//
//		$city283= new City();
//		$city283->setId(283);
//		$city283->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city283->setName('Великая глуша');
//		$manager->persist($city283); 
//
//		$city284= new City();
//		$city284->setId(284);
//		$city284->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city284->setName('Великая горожанка');
//		$manager->persist($city284); 
//
//		$city285= new City();
//		$city285->setId(285);
//		$city285->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city285->setName('Великая добронь');
//		$manager->persist($city285); 
//
//		$city286= new City();
//		$city286->setId(286);
//		$city286->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city286->setName('Великая дорога');
//		$manager->persist($city286); 
//
//		$city287= new City();
//		$city287->setId(287);
//		$city287->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city287->setName('Великая дочь');
//		$manager->persist($city287); 
//
//		$city288= new City();
//		$city288->setId(288);
//		$city288->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city288->setName('Великая кардашинка');
//		$manager->persist($city288); 
//
//		$city289= new City();
//		$city289->setId(289);
//		$city289->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city289->setName('Великая круча');
//		$manager->persist($city289); 
//
//		$city290= new City();
//		$city290->setId(290);
//		$city290->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city290->setName('Великая Лепетиха');
//		$manager->persist($city290); 
//
//		$city291= new City();
//		$city291->setId(291);
//		$city291->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city291->setName('Великая');
//		$manager->persist($city291); 
//
//		$city292= new City();
//		$city292->setId(292);
//		$city292->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city292->setName('Великая Новоселка');
//		$manager->persist($city292); 
//
//		$city293= new City();
//		$city293->setId(293);
//		$city293->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city293->setName('Великая омеляна');
//		$manager->persist($city293); 
//
//		$city294= new City();
//		$city294->setId(294);
//		$city294->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city294->setName('Великая Писаревка');
//		$manager->persist($city294); 
//
//		$city295= new City();
//		$city295->setId(295);
//		$city295->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city295->setName('Великая северинка');
//		$manager->persist($city295); 
//
//		$city296= new City();
//		$city296->setId(296);
//		$city296->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city296->setName('Великая чернеччина');
//		$manager->persist($city296); 
//
//		$city297= new City();
//		$city297->setId(297);
//		$city297->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city297->setName('Великая яблоновка');
//		$manager->persist($city297); 
//
//		$city298= new City();
//		$city298->setId(298);
//		$city298->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city298->setName('Великие Борки');
//		$manager->persist($city298); 
//
//		$city299= new City();
//		$city299->setId(299);
//		$city299->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city299->setName('Великие вильмы');
//		$manager->persist($city299); 
//
//		$city300= new City();
//		$city300->setId(300);
//		$city300->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city300->setName('Великие гаи');
//		$manager->persist($city300); 
//
//		$city301= new City();
//		$city301->setId(301);
//		$city301->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city301->setName('Великие Глебовичи');
//		$manager->persist($city301); 
//
//		$city302= new City();
//		$city302->setId(302);
//		$city302->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city302->setName('Великие гуляки');
//		$manager->persist($city302); 
//
//		$city303= new City();
//		$city303->setId(303);
//		$city303->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city303->setName('Великие Дедеркалы');
//		$manager->persist($city303); 
//
//		$city304= new City();
//		$city304->setId(304);
//		$city304->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city304->setName('Великие Копани');
//		$manager->persist($city304); 
//
//		$city305= new City();
//		$city305->setId(305);
//		$city305->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city305->setName('Великие Коровинцы');
//		$manager->persist($city305); 
//
//		$city306= new City();
//		$city306->setId(306);
//		$city306->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city306->setName('Великие крынки');
//		$manager->persist($city306); 
//
//		$city307= new City();
//		$city307->setId(307);
//		$city307->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city307->setName('Великие лазы');
//		$manager->persist($city307); 
//
//		$city308= new City();
//		$city308->setId(308);
//		$city308->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city308->setName('Великие лучки');
//		$manager->persist($city308); 
//
//		$city309= new City();
//		$city309->setId(309);
//		$city309->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city309->setName('Великие Мосты');
//		$manager->persist($city309); 
//
//		$city310= new City();
//		$city310->setId(310);
//		$city310->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city310->setName('Великие низгорцы');
//		$manager->persist($city310); 
//
//		$city311= new City();
//		$city311->setId(311);
//		$city311->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city311->setName('Великие проходы');
//		$manager->persist($city311); 
//
//		$city312= new City();
//		$city312->setId(312);
//		$city312->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city312->setName('Великий алексин');
//		$manager->persist($city312); 
//
//		$city313= new City();
//		$city313->setId(313);
//		$city313->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city313->setName('Великий Березный');
//		$manager->persist($city313); 
//
//		$city314= new City();
//		$city314->setId(314);
//		$city314->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city314->setName('Великий Бурлук');
//		$manager->persist($city314); 
//
//		$city315= new City();
//		$city315->setId(315);
//		$city315->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city315->setName('Великий Бычков');
//		$manager->persist($city315); 
//
//		$city316= new City();
//		$city316->setId(316);
//		$city316->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city316->setName('Великий Глубочек');
//		$manager->persist($city316); 
//
//		$city317= new City();
//		$city317->setId(317);
//		$city317->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city317->setName('Великий житин');
//		$manager->persist($city317); 
//
//		$city318= new City();
//		$city318->setId(318);
//		$city318->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city318->setName('Великий кучуров');
//		$manager->persist($city318); 
//
//		$city319= new City();
//		$city319->setId(319);
//		$city319->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city319->setName('Великий Любень');
//		$manager->persist($city319); 
//
//		$city320= new City();
//		$city320->setId(320);
//		$city320->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city320->setName('Великий мытник');
//		$manager->persist($city320); 
//
//		$city321= new City();
//		$city321->setId(321);
//		$city321->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city321->setName('Великий омеляник');
//		$manager->persist($city321); 
//
//		$city322= new City();
//		$city322->setId(322);
//		$city322->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city322->setName('Великодолинское');
//		$manager->persist($city322); 
//
//		$city323= new City();
//		$city323->setId(323);
//		$city323->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city323->setName('Великое колодно');
//		$manager->persist($city323); 
//
//		$city324= new City();
//		$city324->setId(324);
//		$city324->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city324->setName('Великоселки');
//		$manager->persist($city324); 
//
//		$city325= new City();
//		$city325->setId(325);
//		$city325->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city325->setName('Великоцк');
//		$manager->persist($city325); 
//
//		$city326= new City();
//		$city326->setId(326);
//		$city326->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city326->setName('Вельшанка');
//		$manager->persist($city326); 
//
//		$city327= new City();
//		$city327->setId(327);
//		$city327->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city327->setName('Вендичаны');
//		$manager->persist($city327); 
//
//		$city328= new City();
//		$city328->setId(328);
//		$city328->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city328->setName('Веприк');
//		$manager->persist($city328); 
//
//		$city329= new City();
//		$city329->setId(329);
//		$city329->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city329->setName('Вербка');
//		$manager->persist($city329); 
//
//		$city330= new City();
//		$city330->setId(330);
//		$city330->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city330->setName('Вербки');
//		$manager->persist($city330); 
//
//		$city331= new City();
//		$city331->setId(331);
//		$city331->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city331->setName('Верблюжка');
//		$manager->persist($city331); 
//
//		$city332= new City();
//		$city332->setId(332);
//		$city332->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city332->setName('Вербовец');
//		$manager->persist($city332); 
//
//		$city333= new City();
//		$city333->setId(333);
//		$city333->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city333->setName('Вербовец');
//		$manager->persist($city333); 
//
//		$city334= new City();
//		$city334->setId(334);
//		$city334->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city334->setName('Вергулевка');
//		$manager->persist($city334); 
//
//		$city335= new City();
//		$city335->setId(335);
//		$city335->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city335->setName('Вергуны');
//		$manager->persist($city335); 
//
//		$city336= new City();
//		$city336->setId(336);
//		$city336->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city336->setName('Вересневое');
//		$manager->persist($city336); 
//
//		$city337= new City();
//		$city337->setId(337);
//		$city337->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city337->setName('Вересы');
//		$manager->persist($city337); 
//
//		$city338= new City();
//		$city338->setId(338);
//		$city338->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city338->setName('Вертиевка');
//		$manager->persist($city338); 
//
//		$city339= new City();
//		$city339->setId(339);
//		$city339->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city339->setName('Верхнеднепровск');
//		$manager->persist($city339); 
//
//		$city340= new City();
//		$city340->setId(340);
//		$city340->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city340->setName('Верхнее водяное');
//		$manager->persist($city340); 
//
//		$city341= new City();
//		$city341->setId(341);
//		$city341->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city341->setName('Верхнее синевидное');
//		$manager->persist($city341); 
//
//		$city342= new City();
//		$city342->setId(342);
//		$city342->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city342->setName('Верхнесадовое');
//		$manager->persist($city342); 
//
//		$city343= new City();
//		$city343->setId(343);
//		$city343->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city343->setName('Верхние серогозы');
//		$manager->persist($city343); 
//
//		$city344= new City();
//		$city344->setId(344);
//		$city344->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city344->setName('Верхний Рогачик');
//		$manager->persist($city344); 
//
//		$city345= new City();
//		$city345->setId(345);
//		$city345->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city345->setName('Верхний струтинь');
//		$manager->persist($city345); 
//
//		$city346= new City();
//		$city346->setId(346);
//		$city346->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city346->setName('Верхний токмак первый');
//		$manager->persist($city346); 
//
//		$city347= new City();
//		$city347->setId(347);
//		$city347->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city347->setName('Верхнячка');
//		$manager->persist($city347); 
//
//		$city348= new City();
//		$city348->setId(348);
//		$city348->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city348->setName('Верхняя криница');
//		$manager->persist($city348); 
//
//		$city349= new City();
//		$city349->setId(349);
//		$city349->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city349->setName('Верхняя сыроватка');
//		$manager->persist($city349); 
//
//		$city350= new City();
//		$city350->setId(350);
//		$city350->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city350->setName('Верхов');
//		$manager->persist($city350); 
//
//		$city351= new City();
//		$city351->setId(351);
//		$city351->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city351->setName('Верховина');
//		$manager->persist($city351); 
//
//		$city352= new City();
//		$city352->setId(352);
//		$city352->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city352->setName('Верховцево');
//		$manager->persist($city352); 
//
//		$city353= new City();
//		$city353->setId(353);
//		$city353->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city353->setName('Веселиново');
//		$manager->persist($city353); 
//
//		$city354= new City();
//		$city354->setId(354);
//		$city354->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city354->setName('Веселое');
//		$manager->persist($city354); 
//
//		$city355= new City();
//		$city355->setId(355);
//		$city355->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city355->setName('Веселое');
//		$manager->persist($city355); 
//
//		$city356= new City();
//		$city356->setId(356);
//		$city356->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city356->setName('Веселое');
//		$manager->persist($city356); 
//
//		$city357= new City();
//		$city357->setId(357);
//		$city357->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city357->setName('Весняное');
//		$manager->persist($city357); 
//
//		$city358= new City();
//		$city358->setId(358);
//		$city358->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city358->setName('Виженка');
//		$manager->persist($city358); 
//
//		$city359= new City();
//		$city359->setId(359);
//		$city359->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city359->setName('Вижница');
//		$manager->persist($city359); 
//
//		$city360= new City();
//		$city360->setId(360);
//		$city360->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city360->setName('Визирка');
//		$manager->persist($city360); 
//
//		$city361= new City();
//		$city361->setId(361);
//		$city361->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city361->setName('Вилино');
//		$manager->persist($city361); 
//
//		$city362= new City();
//		$city362->setId(362);
//		$city362->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city362->setName('Вилково');
//		$manager->persist($city362); 
//
//		$city363= new City();
//		$city363->setId(363);
//		$city363->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city363->setName('Вилы');
//		$manager->persist($city363); 
//
//		$city364= new City();
//		$city364->setId(364);
//		$city364->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city364->setName('Вильховец');
//		$manager->persist($city364); 
//
//		$city365= new City();
//		$city365->setId(365);
//		$city365->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city365->setName('Винники');
//		$manager->persist($city365); 
//
//		$city366= new City();
//		$city366->setId(366);
//		$city366->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city366->setName('Винники');
//		$manager->persist($city366); 
//
//		$city367= new City();
//		$city367->setId(367);
//		$city367->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city367->setName('Винница');
//		$manager->persist($city367); 
//
//		$city368= new City();
//		$city368->setId(368);
//		$city368->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city368->setName('Винницкие ставы');
//		$manager->persist($city368); 
//
//		$city369= new City();
//		$city369->setId(369);
//		$city369->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city369->setName('Винницкие хутора');
//		$manager->persist($city369); 
//
//		$city370= new City();
//		$city370->setId(370);
//		$city370->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city370->setName('Виноградное');
//		$manager->persist($city370); 
//
//		$city371= new City();
//		$city371->setId(371);
//		$city371->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city371->setName('Виноградов');
//		$manager->persist($city371); 
//
//		$city372= new City();
//		$city372->setId(372);
//		$city372->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city372->setName('Виньковцы');
//		$manager->persist($city372); 
//
//		$city373= new City();
//		$city373->setId(373);
//		$city373->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city373->setName('Вита-почтовая');
//		$manager->persist($city373); 
//
//		$city374= new City();
//		$city374->setId(374);
//		$city374->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city374->setName('Витино');
//		$manager->persist($city374); 
//
//		$city375= new City();
//		$city375->setId(375);
//		$city375->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city375->setName('Витязевка');
//		$manager->persist($city375); 
//
//		$city376= new City();
//		$city376->setId(376);
//		$city376->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city376->setName('Вишневец');
//		$manager->persist($city376); 
//
//		$city377= new City();
//		$city377->setId(377);
//		$city377->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city377->setName('Вишневое');
//		$manager->persist($city377); 
//
//		$city378= new City();
//		$city378->setId(378);
//		$city378->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city378->setName('Вишневое');
//		$manager->persist($city378); 
//
//		$city379= new City();
//		$city379->setId(379);
//		$city379->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city379->setName('Вишневое');
//		$manager->persist($city379); 
//
//		$city380= new City();
//		$city380->setId(380);
//		$city380->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city380->setName('Вишневчик');
//		$manager->persist($city380); 
//
//		$city381= new City();
//		$city381->setId(381);
//		$city381->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city381->setName('Владимир-Волынский');
//		$manager->persist($city381); 
//
//		$city382= new City();
//		$city382->setId(382);
//		$city382->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city382->setName('Владимирец');
//		$manager->persist($city382); 
//
//		$city383= new City();
//		$city383->setId(383);
//		$city383->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city383->setName('Владимирец');
//		$manager->persist($city383); 
//
//		$city384= new City();
//		$city384->setId(384);
//		$city384->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city384->setName('Владимировка');
//		$manager->persist($city384); 
//
//		$city385= new City();
//		$city385->setId(385);
//		$city385->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city385->setName('Владимировка');
//		$manager->persist($city385); 
//
//		$city386= new City();
//		$city386->setId(386);
//		$city386->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city386->setName('Владимировка');
//		$manager->persist($city386); 
//
//		$city387= new City();
//		$city387->setId(387);
//		$city387->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city387->setName('Владимировка');
//		$manager->persist($city387); 
//
//		$city388= new City();
//		$city388->setId(388);
//		$city388->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city388->setName('Владимировское');
//		$manager->persist($city388); 
//
//		$city389= new City();
//		$city389->setId(389);
//		$city389->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city389->setName('Власовка');
//		$manager->persist($city389); 
//
//		$city390= new City();
//		$city390->setId(390);
//		$city390->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city390->setName('Водица');
//		$manager->persist($city390); 
//
//		$city391= new City();
//		$city391->setId(391);
//		$city391->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city391->setName('Вознесенск');
//		$manager->persist($city391); 
//
//		$city392= new City();
//		$city392->setId(392);
//		$city392->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city392->setName('Вознесенское');
//		$manager->persist($city392); 
//
//		$city393= new City();
//		$city393->setId(393);
//		$city393->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city393->setName('Войково');
//		$manager->persist($city393); 
//
//		$city394= new City();
//		$city394->setId(394);
//		$city394->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city394->setName('Войновка');
//		$manager->persist($city394); 
//
//		$city395= new City();
//		$city395->setId(395);
//		$city395->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city395->setName('Войновка');
//		$manager->persist($city395); 
//
//		$city396= new City();
//		$city396->setId(396);
//		$city396->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city396->setName('Войтовка');
//		$manager->persist($city396); 
//
//		$city397= new City();
//		$city397->setId(397);
//		$city397->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city397->setName('Войтово');
//		$manager->persist($city397); 
//
//		$city398= new City();
//		$city398->setId(398);
//		$city398->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city398->setName('Войтовцы');
//		$manager->persist($city398); 
//
//		$city399= new City();
//		$city399->setId(399);
//		$city399->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city399->setName('Волковинцы');
//		$manager->persist($city399); 
//
//		$city400= new City();
//		$city400->setId(400);
//		$city400->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city400->setName('Волноваха');
//		$manager->persist($city400); 
//
//		$city401= new City();
//		$city401->setId(401);
//		$city401->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city401->setName('Воловец');
//		$manager->persist($city401); 
//
//		$city402= new City();
//		$city402->setId(402);
//		$city402->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city402->setName('Володарка');
//		$manager->persist($city402); 
//
//		$city403= new City();
//		$city403->setId(403);
//		$city403->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city403->setName('Володарск');
//		$manager->persist($city403); 
//
//		$city404= new City();
//		$city404->setId(404);
//		$city404->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city404->setName('Володарск-Волынский');
//		$manager->persist($city404); 
//
//		$city405= new City();
//		$city405->setId(405);
//		$city405->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city405->setName('Володарское');
//		$manager->persist($city405); 
//
//		$city406= new City();
//		$city406->setId(406);
//		$city406->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city406->setName('Волосское');
//		$manager->persist($city406); 
//
//		$city407= new City();
//		$city407->setId(407);
//		$city407->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city407->setName('Волочиск');
//		$manager->persist($city407); 
//
//		$city408= new City();
//		$city408->setId(408);
//		$city408->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city408->setName('Волчанск');
//		$manager->persist($city408); 
//
//		$city409= new City();
//		$city409->setId(409);
//		$city409->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city409->setName('Волчинец');
//		$manager->persist($city409); 
//
//		$city410= new City();
//		$city410->setId(410);
//		$city410->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city410->setName('Волчковцы');
//		$manager->persist($city410); 
//
//		$city411= new City();
//		$city411->setId(411);
//		$city411->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city411->setName('Вольногорск');
//		$manager->persist($city411); 
//
//		$city412= new City();
//		$city412->setId(412);
//		$city412->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city412->setName('Вольное');
//		$manager->persist($city412); 
//
//		$city413= new City();
//		$city413->setId(413);
//		$city413->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city413->setName('Вольнянск');
//		$manager->persist($city413); 
//
//		$city414= new City();
//		$city414->setId(414);
//		$city414->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city414->setName('Воля-бартатовская');
//		$manager->persist($city414); 
//
//		$city415= new City();
//		$city415->setId(415);
//		$city415->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city415->setName('Воля-высоцкая');
//		$manager->persist($city415); 
//
//		$city416= new City();
//		$city416->setId(416);
//		$city416->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city416->setName('Воля-ковельская');
//		$manager->persist($city416); 
//
//		$city417= new City();
//		$city417->setId(417);
//		$city417->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city417->setName('Ворзель');
//		$manager->persist($city417); 
//
//		$city418= new City();
//		$city418->setId(418);
//		$city418->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city418->setName('Ворожба');
//		$manager->persist($city418); 
//
//		$city419= new City();
//		$city419->setId(419);
//		$city419->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city419->setName('Воронеж');
//		$manager->persist($city419); 
//
//		$city420= new City();
//		$city420->setId(420);
//		$city420->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city420->setName('Воронов');
//		$manager->persist($city420); 
//
//		$city421= new City();
//		$city421->setId(421);
//		$city421->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city421->setName('Вороновица');
//		$manager->persist($city421); 
//
//		$city422= new City();
//		$city422->setId(422);
//		$city422->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city422->setName('Вороновица');
//		$manager->persist($city422); 
//
//		$city423= new City();
//		$city423->setId(423);
//		$city423->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city423->setName('Вороняки');
//		$manager->persist($city423); 
//
//		$city424= new City();
//		$city424->setId(424);
//		$city424->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city424->setName('Ворохта');
//		$manager->persist($city424); 
//
//		$city425= new City();
//		$city425->setId(425);
//		$city425->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city425->setName('Воскресенск');
//		$manager->persist($city425); 
//
//		$city426= new City();
//		$city426->setId(426);
//		$city426->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city426->setName('Восход');
//		$manager->persist($city426); 
//
//		$city427= new City();
//		$city427->setId(427);
//		$city427->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city427->setName('Врадиевка');
//		$manager->persist($city427); 
//
//		$city428= new City();
//		$city428->setId(428);
//		$city428->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city428->setName('Всеволодовка');
//		$manager->persist($city428); 
//
//		$city429= new City();
//		$city429->setId(429);
//		$city429->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city429->setName('Вузлове');
//		$manager->persist($city429); 
//
//		$city430= new City();
//		$city430->setId(430);
//		$city430->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city430->setName('Выбрановка');
//		$manager->persist($city430); 
//
//		$city431= new City();
//		$city431->setId(431);
//		$city431->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city431->setName('Выгода');
//		$manager->persist($city431); 
//
//		$city432= new City();
//		$city432->setId(432);
//		$city432->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city432->setName('Выгода');
//		$manager->persist($city432); 
//
//		$city433= new City();
//		$city433->setId(433);
//		$city433->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city433->setName('Выдвиженец');
//		$manager->persist($city433); 
//
//		$city434= new City();
//		$city434->setId(434);
//		$city434->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city434->setName('Вылок');
//		$manager->persist($city434); 
//
//		$city435= new City();
//		$city435->setId(435);
//		$city435->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city435->setName('Высокий');
//		$manager->persist($city435); 
//
//		$city436= new City();
//		$city436->setId(436);
//		$city436->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city436->setName('Высокогорное');
//		$manager->persist($city436); 
//
//		$city437= new City();
//		$city437->setId(437);
//		$city437->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city437->setName('Высокополье');
//		$manager->persist($city437); 
//
//		$city438= new City();
//		$city438->setId(438);
//		$city438->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city438->setName('Высоцк');
//		$manager->persist($city438); 
//
//		$city439= new City();
//		$city439->setId(439);
//		$city439->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city439->setName('Высшетарасовка');
//		$manager->persist($city439); 
//
//		$city440= new City();
//		$city440->setId(440);
//		$city440->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city440->setName('Вышгород');
//		$manager->persist($city440); 
//
//		$city441= new City();
//		$city441->setId(441);
//		$city441->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city441->setName('Вышевичи');
//		$manager->persist($city441); 
//
//		$city442= new City();
//		$city442->setId(442);
//		$city442->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city442->setName('Вышеольчедаев');
//		$manager->persist($city442); 
//
//		$city443= new City();
//		$city443->setId(443);
//		$city443->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city443->setName('Вышково');
//		$manager->persist($city443); 
//
//		$city444= new City();
//		$city444->setId(444);
//		$city444->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city444->setName('Вязовое');
//		$manager->persist($city444); 
//
//		$city445= new City();
//		$city445->setId(445);
//		$city445->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city445->setName('Гавриловка');
//		$manager->persist($city445); 
//
//		$city446= new City();
//		$city446->setId(446);
//		$city446->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city446->setName('Гавриловка');
//		$manager->persist($city446); 
//
//		$city447= new City();
//		$city447->setId(447);
//		$city447->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city447->setName('Гавришовка');
//		$manager->persist($city447); 
//
//		$city448= new City();
//		$city448->setId(448);
//		$city448->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city448->setName('Гадяч');
//		$manager->persist($city448); 
//
//		$city449= new City();
//		$city449->setId(449);
//		$city449->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city449->setName('Гаевое');
//		$manager->persist($city449); 
//
//		$city450= new City();
//		$city450->setId(450);
//		$city450->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city450->setName('Гайворон');
//		$manager->persist($city450); 
//
//		$city451= new City();
//		$city451->setId(451);
//		$city451->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city451->setName('Гайсин');
//		$manager->persist($city451); 
//
//		$city452= new City();
//		$city452->setId(452);
//		$city452->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city452->setName('Галич');
//		$manager->persist($city452); 
//
//		$city453= new City();
//		$city453->setId(453);
//		$city453->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city453->setName('Галяво');
//		$manager->persist($city453); 
//
//		$city454= new City();
//		$city454->setId(454);
//		$city454->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city454->setName('Ганичи');
//		$manager->persist($city454); 
//
//		$city455= new City();
//		$city455->setId(455);
//		$city455->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city455->setName('Ганнополь');
//		$manager->persist($city455); 
//
//		$city456= new City();
//		$city456->setId(456);
//		$city456->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city456->setName('Гарбузин');
//		$manager->persist($city456); 
//
//		$city457= new City();
//		$city457->setId(457);
//		$city457->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city457->setName('Гаспра');
//		$manager->persist($city457); 
//
//		$city458= new City();
//		$city458->setId(458);
//		$city458->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city458->setName('Гатное');
//		$manager->persist($city458); 
//
//		$city459= new City();
//		$city459->setId(459);
//		$city459->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city459->setName('Гвардейское');
//		$manager->persist($city459); 
//
//		$city460= new City();
//		$city460->setId(460);
//		$city460->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city460->setName('Гвардейское');
//		$manager->persist($city460); 
//
//		$city461= new City();
//		$city461->setId(461);
//		$city461->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city461->setName('Гвардейское');
//		$manager->persist($city461); 
//
//		$city462= new City();
//		$city462->setId(462);
//		$city462->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city462->setName('Гвоздец');
//		$manager->persist($city462); 
//
//		$city463= new City();
//		$city463->setId(463);
//		$city463->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city463->setName('Гельмязов');
//		$manager->persist($city463); 
//
//		$city464= new City();
//		$city464->setId(464);
//		$city464->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city464->setName('Гениченская горка');
//		$manager->persist($city464); 
//
//		$city465= new City();
//		$city465->setId(465);
//		$city465->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city465->setName('Геническ');
//		$manager->persist($city465); 
//
//		$city466= new City();
//		$city466->setId(466);
//		$city466->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city466->setName('Георгиевка');
//		$manager->persist($city466); 
//
//		$city467= new City();
//		$city467->setId(467);
//		$city467->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city467->setName('Герасимовка');
//		$manager->persist($city467); 
//
//		$city468= new City();
//		$city468->setId(468);
//		$city468->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city468->setName('Геройское');
//		$manager->persist($city468); 
//
//		$city469= new City();
//		$city469->setId(469);
//		$city469->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city469->setName('Геронимовка');
//		$manager->persist($city469); 
//
//		$city470= new City();
//		$city470->setId(470);
//		$city470->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city470->setName('Герца');
//		$manager->persist($city470); 
//
//		$city471= new City();
//		$city471->setId(471);
//		$city471->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city471->setName('Герыня');
//		$manager->persist($city471); 
//
//		$city472= new City();
//		$city472->setId(472);
//		$city472->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city472->setName('Глеваха');
//		$manager->persist($city472); 
//
//		$city473= new City();
//		$city473->setId(473);
//		$city473->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city473->setName('Глинница');
//		$manager->persist($city473); 
//
//		$city474= new City();
//		$city474->setId(474);
//		$city474->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city474->setName('Глиняны');
//		$manager->persist($city474); 
//
//		$city475= new City();
//		$city475->setId(475);
//		$city475->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city475->setName('Глобино');
//		$manager->persist($city475); 
//
//		$city476= new City();
//		$city476->setId(476);
//		$city476->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city476->setName('Глубокий');
//		$manager->persist($city476); 
//
//		$city477= new City();
//		$city477->setId(477);
//		$city477->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city477->setName('Глубокий поток');
//		$manager->persist($city477); 
//
//		$city478= new City();
//		$city478->setId(478);
//		$city478->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city478->setName('Глубочица');
//		$manager->persist($city478); 
//
//		$city479= new City();
//		$city479->setId(479);
//		$city479->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city479->setName('Глухов');
//		$manager->persist($city479); 
//
//		$city480= new City();
//		$city480->setId(480);
//		$city480->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city480->setName('Глуховцы');
//		$manager->persist($city480); 
//
//		$city481= new City();
//		$city481->setId(481);
//		$city481->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city481->setName('Глыбокая');
//		$manager->persist($city481); 
//
//		$city482= new City();
//		$city482->setId(482);
//		$city482->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city482->setName('Гнединцы');
//		$manager->persist($city482); 
//
//		$city483= new City();
//		$city483->setId(483);
//		$city483->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city483->setName('Гнивань');
//		$manager->persist($city483); 
//
//		$city484= new City();
//		$city484->setId(484);
//		$city484->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city484->setName('Гнидын');
//		$manager->persist($city484); 
//
//		$city485= new City();
//		$city485->setId(485);
//		$city485->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city485->setName('Гнилички');
//		$manager->persist($city485); 
//
//		$city486= new City();
//		$city486->setId(486);
//		$city486->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city486->setName('Гоголев');
//		$manager->persist($city486); 
//
//		$city487= new City();
//		$city487->setId(487);
//		$city487->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city487->setName('Гоголево');
//		$manager->persist($city487); 
//
//		$city488= new City();
//		$city488->setId(488);
//		$city488->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city488->setName('Гожулы');
//		$manager->persist($city488); 
//
//		$city489= new City();
//		$city489->setId(489);
//		$city489->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city489->setName('Голая Пристань');
//		$manager->persist($city489); 
//
//		$city490= new City();
//		$city490->setId(490);
//		$city490->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city490->setName('Голобы');
//		$manager->persist($city490); 
//
//		$city491= new City();
//		$city491->setId(491);
//		$city491->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city491->setName('Голованевск');
//		$manager->persist($city491); 
//
//		$city492= new City();
//		$city492->setId(492);
//		$city492->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city492->setName('Головино');
//		$manager->persist($city492); 
//
//		$city493= new City();
//		$city493->setId(493);
//		$city493->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city493->setName('Головковка');
//		$manager->persist($city493); 
//
//		$city494= new City();
//		$city494->setId(494);
//		$city494->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city494->setName('Головчинцы');
//		$manager->persist($city494); 
//
//		$city495= new City();
//		$city495->setId(495);
//		$city495->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city495->setName('Голубовка');
//		$manager->persist($city495); 
//
//		$city496= new City();
//		$city496->setId(496);
//		$city496->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city496->setName('Голубой Залив');
//		$manager->persist($city496); 
//
//		$city497= new City();
//		$city497->setId(497);
//		$city497->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city497->setName('Гоноривка');
//		$manager->persist($city497); 
//
//		$city498= new City();
//		$city498->setId(498);
//		$city498->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city498->setName('Гонтов яр');
//		$manager->persist($city498); 
//
//		$city499= new City();
//		$city499->setId(499);
//		$city499->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city499->setName('Горбаневка');
//		$manager->persist($city499); 
//
//		$city500= new City();
//		$city500->setId(500);
//		$city500->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city500->setName('Горенка');
//		$manager->persist($city500); 
//
//		$city501= new City();
//		$city501->setId(501);
//		$city501->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city501->setName('Горишний');
//		$manager->persist($city501); 
//
//		$city502= new City();
//		$city502->setId(502);
//		$city502->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city502->setName('Горловка');
//		$manager->persist($city502); 
//
//		$city503= new City();
//		$city503->setId(503);
//		$city503->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city503->setName('Горное');
//		$manager->persist($city503); 
//
//		$city504= new City();
//		$city504->setId(504);
//		$city504->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city504->setName('Горное');
//		$manager->persist($city504); 
//
//		$city505= new City();
//		$city505->setId(505);
//		$city505->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city505->setName('Горностаевка');
//		$manager->persist($city505); 
//
//		$city506= new City();
//		$city506->setId(506);
//		$city506->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city506->setName('Горный');
//		$manager->persist($city506); 
//
//		$city507= new City();
//		$city507->setId(507);
//		$city507->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city507->setName('Горняк');
//		$manager->persist($city507); 
//
//		$city508= new City();
//		$city508->setId(508);
//		$city508->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city508->setName('Горняк');
//		$manager->persist($city508); 
//
//		$city509= new City();
//		$city509->setId(509);
//		$city509->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city509->setName('Горняцкое');
//		$manager->persist($city509); 
//
//		$city510= new City();
//		$city510->setId(510);
//		$city510->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city510->setName('Городенка');
//		$manager->persist($city510); 
//
//		$city511= new City();
//		$city511->setId(511);
//		$city511->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city511->setName('Городище');
//		$manager->persist($city511); 
//
//		$city512= new City();
//		$city512->setId(512);
//		$city512->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city512->setName('Городище-Пустоваровка');
//		$manager->persist($city512); 
//
//		$city513= new City();
//		$city513->setId(513);
//		$city513->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city513->setName('Городковка');
//		$manager->persist($city513); 
//
//		$city514= new City();
//		$city514->setId(514);
//		$city514->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city514->setName('Городница');
//		$manager->persist($city514); 
//
//		$city515= new City();
//		$city515->setId(515);
//		$city515->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city515->setName('Городня');
//		$manager->persist($city515); 
//
//		$city516= new City();
//		$city516->setId(516);
//		$city516->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city516->setName('Городок');
//		$manager->persist($city516); 
//
//		$city517= new City();
//		$city517->setId(517);
//		$city517->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city517->setName('Городок');
//		$manager->persist($city517); 
//
//		$city518= new City();
//		$city518->setId(518);
//		$city518->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city518->setName('Городок(Хмельницкий)');
//		$manager->persist($city518); 
//
//		$city519= new City();
//		$city519->setId(519);
//		$city519->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city519->setName('Городок(Львов)');
//		$manager->persist($city519); 
//
//		$city520= new City();
//		$city520->setId(520);
//		$city520->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city520->setName('Горонглаб');
//		$manager->persist($city520); 
//
//		$city521= new City();
//		$city521->setId(521);
//		$city521->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city521->setName('Горохов');
//		$manager->persist($city521); 
//
//		$city522= new City();
//		$city522->setId(522);
//		$city522->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city522->setName('Гороховка');
//		$manager->persist($city522); 
//
//		$city523= new City();
//		$city523->setId(523);
//		$city523->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city523->setName('Горское');
//		$manager->persist($city523); 
//
//		$city524= new City();
//		$city524->setId(524);
//		$city524->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city524->setName('Горщик');
//		$manager->persist($city524); 
//
//		$city525= new City();
//		$city525->setId(525);
//		$city525->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city525->setName('Горькая полонка');
//		$manager->persist($city525); 
//
//		$city526= new City();
//		$city526->setId(526);
//		$city526->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city526->setName('Горького');
//		$manager->persist($city526); 
//
//		$city527= new City();
//		$city527->setId(527);
//		$city527->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city527->setName('Гостинное');
//		$manager->persist($city527); 
//
//		$city528= new City();
//		$city528->setId(528);
//		$city528->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city528->setName('Гостинцово');
//		$manager->persist($city528); 
//
//		$city529= new City();
//		$city529->setId(529);
//		$city529->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city529->setName('Гостомель');
//		$manager->persist($city529); 
//
//		$city530= new City();
//		$city530->setId(530);
//		$city530->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city530->setName('Гоща');
//		$manager->persist($city530); 
//
//		$city531= new City();
//		$city531->setId(531);
//		$city531->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city531->setName('Грабовец');
//		$manager->persist($city531); 
//
//		$city532= new City();
//		$city532->setId(532);
//		$city532->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city532->setName('Градижск');
//		$manager->persist($city532); 
//
//		$city533= new City();
//		$city533->setId(533);
//		$city533->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city533->setName('Гранитное');
//		$manager->persist($city533); 
//
//		$city534= new City();
//		$city534->setId(534);
//		$city534->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city534->setName('Гранитное');
//		$manager->persist($city534); 
//
//		$city535= new City();
//		$city535->setId(535);
//		$city535->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city535->setName('Гранитное');
//		$manager->persist($city535); 
//
//		$city536= new City();
//		$city536->setId(536);
//		$city536->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city536->setName('Гребенка');
//		$manager->persist($city536); 
//
//		$city537= new City();
//		$city537->setId(537);
//		$city537->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city537->setName('Гребёнки');
//		$manager->persist($city537); 
//
//		$city538= new City();
//		$city538->setId(538);
//		$city538->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city538->setName('Гребенов');
//		$manager->persist($city538); 
//
//		$city539= new City();
//		$city539->setId(539);
//		$city539->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city539->setName('Гребля');
//		$manager->persist($city539); 
//
//		$city540= new City();
//		$city540->setId(540);
//		$city540->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city540->setName('Григоровка');
//		$manager->persist($city540); 
//
//		$city541= new City();
//		$city541->setId(541);
//		$city541->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city541->setName('Григорьевка');
//		$manager->persist($city541); 
//
//		$city542= new City();
//		$city542->setId(542);
//		$city542->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city542->setName('Гримайлов');
//		$manager->persist($city542); 
//
//		$city543= new City();
//		$city543->setId(543);
//		$city543->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city543->setName('Грицев');
//		$manager->persist($city543); 
//
//		$city544= new City();
//		$city544->setId(544);
//		$city544->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city544->setName('Гришино');
//		$manager->persist($city544); 
//
//		$city545= new City();
//		$city545->setId(545);
//		$city545->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city545->setName('Гришковцы');
//		$manager->persist($city545); 
//
//		$city546= new City();
//		$city546->setId(546);
//		$city546->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city546->setName('Грозино');
//		$manager->persist($city546); 
//
//		$city547= new City();
//		$city547->setId(547);
//		$city547->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city547->setName('Грузевица');
//		$manager->persist($city547); 
//
//		$city548= new City();
//		$city548->setId(548);
//		$city548->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city548->setName('Грузское');
//		$manager->persist($city548); 
//
//		$city549= new City();
//		$city549->setId(549);
//		$city549->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city549->setName('Грушево');
//		$manager->persist($city549); 
//
//		$city550= new City();
//		$city550->setId(550);
//		$city550->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city550->setName('Грушка');
//		$manager->persist($city550); 
//
//		$city551= new City();
//		$city551->setId(551);
//		$city551->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city551->setName('Грушка');
//		$manager->persist($city551); 
//
//		$city552= new City();
//		$city552->setId(552);
//		$city552->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city552->setName('Грэсовский');
//		$manager->persist($city552); 
//
//		$city553= new City();
//		$city553->setId(553);
//		$city553->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city553->setName('Гряда');
//		$manager->persist($city553); 
//
//		$city554= new City();
//		$city554->setId(554);
//		$city554->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city554->setName('Грязное');
//		$manager->persist($city554); 
//
//		$city555= new City();
//		$city555->setId(555);
//		$city555->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city555->setName('Губиниха');
//		$manager->persist($city555); 
//
//		$city556= new City();
//		$city556->setId(556);
//		$city556->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city556->setName('Гуйва');
//		$manager->persist($city556); 
//
//		$city557= new City();
//		$city557->setId(557);
//		$city557->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city557->setName('Гульск');
//		$manager->persist($city557); 
//
//		$city558= new City();
//		$city558->setId(558);
//		$city558->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city558->setName('Гуляйполе');
//		$manager->persist($city558); 
//
//		$city559= new City();
//		$city559->setId(559);
//		$city559->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city559->setName('Гуменцы');
//		$manager->persist($city559); 
//
//		$city560= new City();
//		$city560->setId(560);
//		$city560->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city560->setName('Гупаловка');
//		$manager->persist($city560); 
//
//		$city561= new City();
//		$city561->setId(561);
//		$city561->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city561->setName('Гурзуф');
//		$manager->persist($city561); 
//
//		$city562= new City();
//		$city562->setId(562);
//		$city562->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city562->setName('Гуровщина');
//		$manager->persist($city562); 
//
//		$city563= new City();
//		$city563->setId(563);
//		$city563->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city563->setName('Гусятин');
//		$manager->persist($city563); 
//
//		$city564= new City();
//		$city564->setId(564);
//		$city564->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city564->setName('Гуты');
//		$manager->persist($city564); 
//
//		$city565= new City();
//		$city565->setId(565);
//		$city565->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city565->setName('Давыдковцы');
//		$manager->persist($city565); 
//
//		$city566= new City();
//		$city566->setId(566);
//		$city566->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city566->setName('Давыдов');
//		$manager->persist($city566); 
//
//		$city567= new City();
//		$city567->setId(567);
//		$city567->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city567->setName('Далекое');
//		$manager->persist($city567); 
//
//		$city568= new City();
//		$city568->setId(568);
//		$city568->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city568->setName('Даниловка');
//		$manager->persist($city568); 
//
//		$city569= new City();
//		$city569->setId(569);
//		$city569->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city569->setName('Дарьевка');
//		$manager->persist($city569); 
//
//		$city570= new City();
//		$city570->setId(570);
//		$city570->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city570->setName('Дачное');
//		$manager->persist($city570); 
//
//		$city571= new City();
//		$city571->setId(571);
//		$city571->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city571->setName('Дашава');
//		$manager->persist($city571); 
//
//		$city572= new City();
//		$city572->setId(572);
//		$city572->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city572->setName('Дашев');
//		$manager->persist($city572); 
//
//		$city573= new City();
//		$city573->setId(573);
//		$city573->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city573->setName('Дашев');
//		$manager->persist($city573); 
//
//		$city574= new City();
//		$city574->setId(574);
//		$city574->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city574->setName('Дашковка');
//		$manager->persist($city574); 
//
//		$city575= new City();
//		$city575->setId(575);
//		$city575->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city575->setName('Дашуковка');
//		$manager->persist($city575); 
//
//		$city576= new City();
//		$city576->setId(576);
//		$city576->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city576->setName('Двуречная');
//		$manager->persist($city576); 
//
//		$city577= new City();
//		$city577->setId(577);
//		$city577->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city577->setName('Дебальцево');
//		$manager->persist($city577); 
//
//		$city578= new City();
//		$city578->setId(578);
//		$city578->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city578->setName('Девичье поле');
//		$manager->persist($city578); 
//
//		$city579= new City();
//		$city579->setId(579);
//		$city579->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city579->setName('Девладово');
//		$manager->persist($city579); 
//
//		$city580= new City();
//		$city580->setId(580);
//		$city580->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city580->setName('Дедычи');
//		$manager->persist($city580); 
//
//		$city581= new City();
//		$city581->setId(581);
//		$city581->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city581->setName('Деловое');
//		$manager->persist($city581); 
//
//		$city582= new City();
//		$city582->setId(582);
//		$city582->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city582->setName('Делятин');
//		$manager->persist($city582); 
//
//		$city583= new City();
//		$city583->setId(583);
//		$city583->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city583->setName('Демидов');
//		$manager->persist($city583); 
//
//		$city584= new City();
//		$city584->setId(584);
//		$city584->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city584->setName('Демидовка');
//		$manager->persist($city584); 
//
//		$city585= new City();
//		$city585->setId(585);
//		$city585->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city585->setName('Демьянов');
//		$manager->persist($city585); 
//
//		$city586= new City();
//		$city586->setId(586);
//		$city586->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city586->setName('Дениховка');
//		$manager->persist($city586); 
//
//		$city587= new City();
//		$city587->setId(587);
//		$city587->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city587->setName('Деньги');
//		$manager->persist($city587); 
//
//		$city588= new City();
//		$city588->setId(588);
//		$city588->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city588->setName('Деражное');
//		$manager->persist($city588); 
//
//		$city589= new City();
//		$city589->setId(589);
//		$city589->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city589->setName('Деражня');
//		$manager->persist($city589); 
//
//		$city590= new City();
//		$city590->setId(590);
//		$city590->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city590->setName('Дергачи');
//		$manager->persist($city590); 
//
//		$city591= new City();
//		$city591->setId(591);
//		$city591->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city591->setName('Деребчин');
//		$manager->persist($city591); 
//
//		$city592= new City();
//		$city592->setId(592);
//		$city592->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city592->setName('Дериевка');
//		$manager->persist($city592); 
//
//		$city593= new City();
//		$city593->setId(593);
//		$city593->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city593->setName('Дерно');
//		$manager->persist($city593); 
//
//		$city594= new City();
//		$city594->setId(594);
//		$city594->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city594->setName('Джанкой');
//		$manager->persist($city594); 
//
//		$city595= new City();
//		$city595->setId(595);
//		$city595->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city595->setName('Джурин');
//		$manager->persist($city595); 
//
//		$city596= new City();
//		$city596->setId(596);
//		$city596->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city596->setName('Джуров');
//		$manager->persist($city596); 
//
//		$city597= new City();
//		$city597->setId(597);
//		$city597->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city597->setName('Дзвиняч');
//		$manager->persist($city597); 
//
//		$city598= new City();
//		$city598->setId(598);
//		$city598->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city598->setName('Дзензеловка');
//		$manager->persist($city598); 
//
//		$city599= new City();
//		$city599->setId(599);
//		$city599->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city599->setName('Дзержинск');
//		$manager->persist($city599); 
//
//		$city600= new City();
//		$city600->setId(600);
//		$city600->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city600->setName('Дзержинск');
//		$manager->persist($city600); 
//
//		$city601= new City();
//		$city601->setId(601);
//		$city601->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city601->setName('Дзержинский');
//		$manager->persist($city601); 
//
//		$city602= new City();
//		$city602->setId(602);
//		$city602->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city602->setName('Дзержинское');
//		$manager->persist($city602); 
//
//		$city603= new City();
//		$city603->setId(603);
//		$city603->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city603->setName('Дзинилор');
//		$manager->persist($city603); 
//
//		$city604= new City();
//		$city604->setId(604);
//		$city604->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city604->setName('Дзыговка');
//		$manager->persist($city604); 
//
//		$city605= new City();
//		$city605->setId(605);
//		$city605->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city605->setName('Диброва');
//		$manager->persist($city605); 
//
//		$city606= new City();
//		$city606->setId(606);
//		$city606->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city606->setName('Диброва');
//		$manager->persist($city606); 
//
//		$city607= new City();
//		$city607->setId(607);
//		$city607->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city607->setName('Диканька');
//		$manager->persist($city607); 
//
//		$city608= new City();
//		$city608->setId(608);
//		$city608->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city608->setName('Димитров');
//		$manager->persist($city608); 
//
//		$city609= new City();
//		$city609->setId(609);
//		$city609->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city609->setName('Димитрово');
//		$manager->persist($city609); 
//
//		$city610= new City();
//		$city610->setId(610);
//		$city610->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city610->setName('Дмитровка');
//		$manager->persist($city610); 
//
//		$city611= new City();
//		$city611->setId(611);
//		$city611->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city611->setName('Дмитровка');
//		$manager->persist($city611); 
//
//		$city612= new City();
//		$city612->setId(612);
//		$city612->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city612->setName('Дмитровка');
//		$manager->persist($city612); 
//
//		$city613= new City();
//		$city613->setId(613);
//		$city613->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city613->setName('Днепровка');
//		$manager->persist($city613); 
//
//		$city614= new City();
//		$city614->setId(614);
//		$city614->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city614->setName('Днепровское');
//		$manager->persist($city614); 
//
//		$city615= new City();
//		$city615->setId(615);
//		$city615->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city615->setName('Днепродзержинск');
//		$manager->persist($city615); 
//
//		$city616= new City();
//		$city616->setId(616);
//		$city616->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city616->setName('Днепропетровск');
//		$manager->persist($city616); 
//
//		$city617= new City();
//		$city617->setId(617);
//		$city617->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city617->setName('Днепрорудное');
//		$manager->persist($city617); 
//
//		$city618= new City();
//		$city618->setId(618);
//		$city618->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city618->setName('Днепряны');
//		$manager->persist($city618); 
//
//		$city619= new City();
//		$city619->setId(619);
//		$city619->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city619->setName('Добровеличковка');
//		$manager->persist($city619); 
//
//		$city620= new City();
//		$city620->setId(620);
//		$city620->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city620->setName('Добровляны');
//		$manager->persist($city620); 
//
//		$city621= new City();
//		$city621->setId(621);
//		$city621->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city621->setName('Доброе');
//		$manager->persist($city621); 
//
//		$city622= new City();
//		$city622->setId(622);
//		$city622->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city622->setName('Добромиль');
//		$manager->persist($city622); 
//
//		$city623= new City();
//		$city623->setId(623);
//		$city623->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city623->setName('Доброполье');
//		$manager->persist($city623); 
//
//		$city624= new City();
//		$city624->setId(624);
//		$city624->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city624->setName('Добротвор');
//		$manager->persist($city624); 
//
//		$city625= new City();
//		$city625->setId(625);
//		$city625->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city625->setName('Добрянка');
//		$manager->persist($city625); 
//
//		$city626= new City();
//		$city626->setId(626);
//		$city626->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city626->setName('Добрянское');
//		$manager->persist($city626); 
//
//		$city627= new City();
//		$city627->setId(627);
//		$city627->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city627->setName('Добряны');
//		$manager->persist($city627); 
//
//		$city628= new City();
//		$city628->setId(628);
//		$city628->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city628->setName('Довбыш');
//		$manager->persist($city628); 
//
//		$city629= new City();
//		$city629->setId(629);
//		$city629->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city629->setName('Довгалевское');
//		$manager->persist($city629); 
//
//		$city630= new City();
//		$city630->setId(630);
//		$city630->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city630->setName('Довжок');
//		$manager->persist($city630); 
//
//		$city631= new City();
//		$city631->setId(631);
//		$city631->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city631->setName('Докучаевск');
//		$manager->persist($city631); 
//
//		$city632= new City();
//		$city632->setId(632);
//		$city632->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city632->setName('Долгое');
//		$manager->persist($city632); 
//
//		$city633= new City();
//		$city633->setId(633);
//		$city633->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city633->setName('Должанка');
//		$manager->persist($city633); 
//
//		$city634= new City();
//		$city634->setId(634);
//		$city634->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city634->setName('Должик');
//		$manager->persist($city634); 
//
//		$city635= new City();
//		$city635->setId(635);
//		$city635->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city635->setName('Долина');
//		$manager->persist($city635); 
//
//		$city636= new City();
//		$city636->setId(636);
//		$city636->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city636->setName('Долина');
//		$manager->persist($city636); 
//
//		$city637= new City();
//		$city637->setId(637);
//		$city637->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city637->setName('Долиновка');
//		$manager->persist($city637); 
//
//		$city638= new City();
//		$city638->setId(638);
//		$city638->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city638->setName('Долинская');
//		$manager->persist($city638); 
//
//		$city639= new City();
//		$city639->setId(639);
//		$city639->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city639->setName('Долинское');
//		$manager->persist($city639); 
//
//		$city640= new City();
//		$city640->setId(640);
//		$city640->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city640->setName('Долишнее залучье');
//		$manager->persist($city640); 
//
//		$city641= new City();
//		$city641->setId(641);
//		$city641->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city641->setName('Доманевка');
//		$manager->persist($city641); 
//
//		$city642= new City();
//		$city642->setId(642);
//		$city642->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city642->setName('Донецк');
//		$manager->persist($city642); 
//
//		$city643= new City();
//		$city643->setId(643);
//		$city643->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city643->setName('Донецкое');
//		$manager->persist($city643); 
//
//		$city644= new City();
//		$city644->setId(644);
//		$city644->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city644->setName('Донское');
//		$manager->persist($city644); 
//
//		$city645= new City();
//		$city645->setId(645);
//		$city645->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city645->setName('Донское');
//		$manager->persist($city645); 
//
//		$city646= new City();
//		$city646->setId(646);
//		$city646->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city646->setName('Дорожное');
//		$manager->persist($city646); 
//
//		$city647= new City();
//		$city647->setId(647);
//		$city647->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city647->setName('Дослидницкое');
//		$manager->persist($city647); 
//
//		$city648= new City();
//		$city648->setId(648);
//		$city648->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city648->setName('Дослидное');
//		$manager->persist($city648); 
//
//		$city649= new City();
//		$city649->setId(649);
//		$city649->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city649->setName('Драбов');
//		$manager->persist($city649); 
//
//		$city650= new City();
//		$city650->setId(650);
//		$city650->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city650->setName('Драбово-барятинское');
//		$manager->persist($city650); 
//
//		$city651= new City();
//		$city651->setId(651);
//		$city651->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city651->setName('Драгово');
//		$manager->persist($city651); 
//
//		$city652= new City();
//		$city652->setId(652);
//		$city652->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city652->setName('Драгомирчаны');
//		$manager->persist($city652); 
//
//		$city653= new City();
//		$city653->setId(653);
//		$city653->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city653->setName('Дробышево');
//		$manager->persist($city653); 
//
//		$city654= new City();
//		$city654->setId(654);
//		$city654->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city654->setName('Дрогобыч');
//		$manager->persist($city654); 
//
//		$city655= new City();
//		$city655->setId(655);
//		$city655->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city655->setName('Дружба');
//		$manager->persist($city655); 
//
//		$city656= new City();
//		$city656->setId(656);
//		$city656->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city656->setName('Дружба');
//		$manager->persist($city656); 
//
//		$city657= new City();
//		$city657->setId(657);
//		$city657->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city657->setName('Дружба');
//		$manager->persist($city657); 
//
//		$city658= new City();
//		$city658->setId(658);
//		$city658->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city658->setName('Дружелюбовка');
//		$manager->persist($city658); 
//
//		$city659= new City();
//		$city659->setId(659);
//		$city659->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city659->setName('Дружковка');
//		$manager->persist($city659); 
//
//		$city660= new City();
//		$city660->setId(660);
//		$city660->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city660->setName('Дуба');
//		$manager->persist($city660); 
//
//		$city661= new City();
//		$city661->setId(661);
//		$city661->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city661->setName('Дубечно');
//		$manager->persist($city661); 
//
//		$city662= new City();
//		$city662->setId(662);
//		$city662->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city662->setName('Дубиевка');
//		$manager->persist($city662); 
//
//		$city663= new City();
//		$city663->setId(663);
//		$city663->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city663->setName('Дубина');
//		$manager->persist($city663); 
//
//		$city664= new City();
//		$city664->setId(664);
//		$city664->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city664->setName('Дубляны');
//		$manager->persist($city664); 
//
//		$city665= new City();
//		$city665->setId(665);
//		$city665->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city665->setName('Дубляны');
//		$manager->persist($city665); 
//
//		$city666= new City();
//		$city666->setId(666);
//		$city666->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city666->setName('Дубно');
//		$manager->persist($city666); 
//
//		$city667= new City();
//		$city667->setId(667);
//		$city667->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city667->setName('Дубовое');
//		$manager->persist($city667); 
//
//		$city668= new City();
//		$city668->setId(668);
//		$city668->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city668->setName('Дубовое');
//		$manager->persist($city668); 
//
//		$city669= new City();
//		$city669->setId(669);
//		$city669->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city669->setName('Дубовский');
//		$manager->persist($city669); 
//
//		$city670= new City();
//		$city670->setId(670);
//		$city670->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city670->setName('Дубовцы');
//		$manager->persist($city670); 
//
//		$city671= new City();
//		$city671->setId(671);
//		$city671->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city671->setName('Дубовязовка');
//		$manager->persist($city671); 
//
//		$city672= new City();
//		$city672->setId(672);
//		$city672->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city672->setName('Дубриничи');
//		$manager->persist($city672); 
//
//		$city673= new City();
//		$city673->setId(673);
//		$city673->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city673->setName('Дубровица');
//		$manager->persist($city673); 
//
//		$city674= new City();
//		$city674->setId(674);
//		$city674->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city674->setName('Дубы');
//		$manager->persist($city674); 
//
//		$city675= new City();
//		$city675->setId(675);
//		$city675->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city675->setName('Дулибы');
//		$manager->persist($city675); 
//
//		$city676= new City();
//		$city676->setId(676);
//		$city676->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city676->setName('Дулово');
//		$manager->persist($city676); 
//
//		$city677= new City();
//		$city677->setId(677);
//		$city677->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city677->setName('Дунаевцы');
//		$manager->persist($city677); 
//
//		$city678= new City();
//		$city678->setId(678);
//		$city678->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city678->setName('Дунаевцы');
//		$manager->persist($city678); 
//
//		$city679= new City();
//		$city679->setId(679);
//		$city679->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city679->setName('Дыйда');
//		$manager->persist($city679); 
//
//		$city680= new City();
//		$city680->setId(680);
//		$city680->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city680->setName('Дымер');
//		$manager->persist($city680); 
//
//		$city681= new City();
//		$city681->setId(681);
//		$city681->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city681->setName('Евпатория');
//		$manager->persist($city681); 
//
//		$city682= new City();
//		$city682->setId(682);
//		$city682->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city682->setName('Езуполь');
//		$manager->persist($city682); 
//
//		$city683= new City();
//		$city683->setId(683);
//		$city683->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city683->setName('Еланец');
//		$manager->persist($city683); 
//
//		$city684= new City();
//		$city684->setId(684);
//		$city684->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city684->setName('Елизаветградка');
//		$manager->persist($city684); 
//
//		$city685= new City();
//		$city685->setId(685);
//		$city685->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city685->setName('Елизарово');
//		$manager->persist($city685); 
//
//		$city686= new City();
//		$city686->setId(686);
//		$city686->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city686->setName('Емильчино');
//		$manager->persist($city686); 
//
//		$city687= new City();
//		$city687->setId(687);
//		$city687->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city687->setName('Енакиево');
//		$manager->persist($city687); 
//
//		$city688= new City();
//		$city688->setId(688);
//		$city688->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city688->setName('Ерки');
//		$manager->persist($city688); 
//
//		$city689= new City();
//		$city689->setId(689);
//		$city689->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city689->setName('Есауловка');
//		$manager->persist($city689); 
//
//		$city690= new City();
//		$city690->setId(690);
//		$city690->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city690->setName('Жабелевка');
//		$manager->persist($city690); 
//
//		$city691= new City();
//		$city691->setId(691);
//		$city691->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city691->setName('Жабка');
//		$manager->persist($city691); 
//
//		$city692= new City();
//		$city692->setId(692);
//		$city692->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city692->setName('Жашков');
//		$manager->persist($city692); 
//
//		$city693= new City();
//		$city693->setId(693);
//		$city693->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city693->setName('Жванец');
//		$manager->persist($city693); 
//
//		$city694= new City();
//		$city694->setId(694);
//		$city694->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city694->setName('Жвирка');
//		$manager->persist($city694); 
//
//		$city695= new City();
//		$city695->setId(695);
//		$city695->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city695->setName('Ждановка');
//		$manager->persist($city695); 
//
//		$city696= new City();
//		$city696->setId(696);
//		$city696->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city696->setName('Ждановка');
//		$manager->persist($city696); 
//
//		$city697= new City();
//		$city697->setId(697);
//		$city697->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city697->setName('Жданово');
//		$manager->persist($city697); 
//
//		$city698= new City();
//		$city698->setId(698);
//		$city698->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city698->setName('Ждениево');
//		$manager->persist($city698); 
//
//		$city699= new City();
//		$city699->setId(699);
//		$city699->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city699->setName('Желтые Воды');
//		$manager->persist($city699); 
//
//		$city700= new City();
//		$city700->setId(700);
//		$city700->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city700->setName('Желябовка');
//		$manager->persist($city700); 
//
//		$city701= new City();
//		$city701->setId(701);
//		$city701->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city701->setName('Жеребково');
//		$manager->persist($city701); 
//
//		$city702= new City();
//		$city702->setId(702);
//		$city702->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city702->setName('Жидачов');
//		$manager->persist($city702); 
//
//		$city703= new City();
//		$city703->setId(703);
//		$city703->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city703->setName('Житомир');
//		$manager->persist($city703); 
//
//		$city704= new City();
//		$city704->setId(704);
//		$city704->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city704->setName('Жмеринка');
//		$manager->persist($city704); 
//
//		$city705= new City();
//		$city705->setId(705);
//		$city705->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city705->setName('Жовтневое');
//		$manager->persist($city705); 
//
//		$city706= new City();
//		$city706->setId(706);
//		$city706->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city706->setName('Жовтневое');
//		$manager->persist($city706); 
//
//		$city707= new City();
//		$city707->setId(707);
//		$city707->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city707->setName('Жовтневое');
//		$manager->persist($city707); 
//
//		$city708= new City();
//		$city708->setId(708);
//		$city708->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city708->setName('Жовтневое');
//		$manager->persist($city708); 
//
//		$city709= new City();
//		$city709->setId(709);
//		$city709->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city709->setName('Жовтневое');
//		$manager->persist($city709); 
//
//		$city710= new City();
//		$city710->setId(710);
//		$city710->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city710->setName('Жовтневое');
//		$manager->persist($city710); 
//
//		$city711= new City();
//		$city711->setId(711);
//		$city711->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city711->setName('Жовтневое');
//		$manager->persist($city711); 
//
//		$city712= new City();
//		$city712->setId(712);
//		$city712->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city712->setName('Жовква');
//		$manager->persist($city712); 
//
//		$city713= new City();
//		$city713->setId(713);
//		$city713->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city713->setName('Жовква');
//		$manager->persist($city713); 
//
//		$city714= new City();
//		$city714->setId(714);
//		$city714->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city714->setName('Жулин');
//		$manager->persist($city714); 
//
//		$city715= new City();
//		$city715->setId(715);
//		$city715->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city715->setName('Журавичи');
//		$manager->persist($city715); 
//
//		$city716= new City();
//		$city716->setId(716);
//		$city716->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city716->setName('Журавки');
//		$manager->persist($city716); 
//
//		$city717= new City();
//		$city717->setId(717);
//		$city717->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city717->setName('Журавлевка');
//		$manager->persist($city717); 
//
//		$city718= new City();
//		$city718->setId(718);
//		$city718->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city718->setName('Заболотов (Снятинский р-н)');
//		$manager->persist($city718); 
//
//		$city719= new City();
//		$city719->setId(719);
//		$city719->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city719->setName('Забороль');
//		$manager->persist($city719); 
//
//		$city720= new City();
//		$city720->setId(720);
//		$city720->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city720->setName('Завалье (Кировоград обл.)');
//		$manager->persist($city720); 
//
//		$city721= new City();
//		$city721->setId(721);
//		$city721->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city721->setName('Завалье');
//		$manager->persist($city721); 
//
//		$city722= new City();
//		$city722->setId(722);
//		$city722->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city722->setName('Завидово');
//		$manager->persist($city722); 
//
//		$city723= new City();
//		$city723->setId(723);
//		$city723->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city723->setName('Заводское');
//		$manager->persist($city723); 
//
//		$city724= new City();
//		$city724->setId(724);
//		$city724->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city724->setName('Завой');
//		$manager->persist($city724); 
//
//		$city725= new City();
//		$city725->setId(725);
//		$city725->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city725->setName('Загвоздье');
//		$manager->persist($city725); 
//
//		$city726= new City();
//		$city726->setId(726);
//		$city726->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city726->setName('Загнитков');
//		$manager->persist($city726); 
//
//		$city727= new City();
//		$city727->setId(727);
//		$city727->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city727->setName('Загорное');
//		$manager->persist($city727); 
//
//		$city728= new City();
//		$city728->setId(728);
//		$city728->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city728->setName('Задельское');
//		$manager->persist($city728); 
//
//		$city729= new City();
//		$city729->setId(729);
//		$city729->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city729->setName('Заднестрянск');
//		$manager->persist($city729); 
//
//		$city730= new City();
//		$city730->setId(730);
//		$city730->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city730->setName('Зазимье');
//		$manager->persist($city730); 
//
//		$city731= new City();
//		$city731->setId(731);
//		$city731->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city731->setName('Закупное');
//		$manager->persist($city731); 
//
//		$city732= new City();
//		$city732->setId(732);
//		$city732->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city732->setName('Залесочье');
//		$manager->persist($city732); 
//
//		$city733= new City();
//		$city733->setId(733);
//		$city733->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city733->setName('Залещики');
//		$manager->persist($city733); 
//
//		$city734= new City();
//		$city734->setId(734);
//		$city734->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city734->setName('Зализничное');
//		$manager->persist($city734); 
//
//		$city735= new City();
//		$city735->setId(735);
//		$city735->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city735->setName('Зализничное');
//		$manager->persist($city735); 
//
//		$city736= new City();
//		$city736->setId(736);
//		$city736->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city736->setName('Зализный порт');
//		$manager->persist($city736); 
//
//		$city737= new City();
//		$city737->setId(737);
//		$city737->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city737->setName('Зализцы');
//		$manager->persist($city737); 
//
//		$city738= new City();
//		$city738->setId(738);
//		$city738->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city738->setName('Замглай');
//		$manager->persist($city738); 
//
//		$city739= new City();
//		$city739->setId(739);
//		$city739->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city739->setName('Замличи');
//		$manager->persist($city739); 
//
//		$city740= new City();
//		$city740->setId(740);
//		$city740->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city740->setName('Заможное');
//		$manager->persist($city740); 
//
//		$city741= new City();
//		$city741->setId(741);
//		$city741->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city741->setName('Заозерное');
//		$manager->persist($city741); 
//
//		$city742= new City();
//		$city742->setId(742);
//		$city742->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city742->setName('Запорожье');
//		$manager->persist($city742); 
//
//		$city743= new City();
//		$city743->setId(743);
//		$city743->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city743->setName('Запытов');
//		$manager->persist($city743); 
//
//		$city744= new City();
//		$city744->setId(744);
//		$city744->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city744->setName('Зарванцы');
//		$manager->persist($city744); 
//
//		$city745= new City();
//		$city745->setId(745);
//		$city745->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city745->setName('Заречаны');
//		$manager->persist($city745); 
//
//		$city746= new City();
//		$city746->setId(746);
//		$city746->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city746->setName('Заречное');
//		$manager->persist($city746); 
//
//		$city747= new City();
//		$city747->setId(747);
//		$city747->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city747->setName('Заречье');
//		$manager->persist($city747); 
//
//		$city748= new City();
//		$city748->setId(748);
//		$city748->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city748->setName('Заречье');
//		$manager->persist($city748); 
//
//		$city749= new City();
//		$city749->setId(749);
//		$city749->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city749->setName('Зарожаны');
//		$manager->persist($city749); 
//
//		$city750= new City();
//		$city750->setId(750);
//		$city750->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city750->setName('Заря');
//		$manager->persist($city750); 
//
//		$city751= new City();
//		$city751->setId(751);
//		$city751->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city751->setName('Заря');
//		$manager->persist($city751); 
//
//		$city752= new City();
//		$city752->setId(752);
//		$city752->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city752->setName('Заставна');
//		$manager->persist($city752); 
//
//		$city753= new City();
//		$city753->setId(753);
//		$city753->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city753->setName('Застеночное');
//		$manager->persist($city753); 
//
//		$city754= new City();
//		$city754->setId(754);
//		$city754->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city754->setName('Засулье');
//		$manager->persist($city754); 
//
//		$city755= new City();
//		$city755->setId(755);
//		$city755->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city755->setName('Затишье');
//		$manager->persist($city755); 
//
//		$city756= new City();
//		$city756->setId(756);
//		$city756->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city756->setName('Затока');
//		$manager->persist($city756); 
//
//		$city757= new City();
//		$city757->setId(757);
//		$city757->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city757->setName('Зачепиловка');
//		$manager->persist($city757); 
//
//		$city758= new City();
//		$city758->setId(758);
//		$city758->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city758->setName('Збараж');
//		$manager->persist($city758); 
//
//		$city759= new City();
//		$city759->setId(759);
//		$city759->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city759->setName('Зборов');
//		$manager->persist($city759); 
//
//		$city760= new City();
//		$city760->setId(760);
//		$city760->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city760->setName('Звенигородка');
//		$manager->persist($city760); 
//
//		$city761= new City();
//		$city761->setId(761);
//		$city761->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city761->setName('Згуровка');
//		$manager->persist($city761); 
//
//		$city762= new City();
//		$city762->setId(762);
//		$city762->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city762->setName('Здолбунов');
//		$manager->persist($city762); 
//
//		$city763= new City();
//		$city763->setId(763);
//		$city763->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city763->setName('Зеленая');
//		$manager->persist($city763); 
//
//		$city764= new City();
//		$city764->setId(764);
//		$city764->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city764->setName('Зеленодольськ');
//		$manager->persist($city764); 
//
//		$city765= new City();
//		$city765->setId(765);
//		$city765->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city765->setName('Зеленый гай');
//		$manager->persist($city765); 
//
//		$city766= new City();
//		$city766->setId(766);
//		$city766->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city766->setName('Зелив');
//		$manager->persist($city766); 
//
//		$city767= new City();
//		$city767->setId(767);
//		$city767->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city767->setName('Зеньков');
//		$manager->persist($city767); 
//
//		$city768= new City();
//		$city768->setId(768);
//		$city768->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city768->setName('Зеньков');
//		$manager->persist($city768); 
//
//		$city769= new City();
//		$city769->setId(769);
//		$city769->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city769->setName('Зидьки');
//		$manager->persist($city769); 
//
//		$city770= new City();
//		$city770->setId(770);
//		$city770->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city770->setName('Зимняя Вода');
//		$manager->persist($city770); 
//
//		$city771= new City();
//		$city771->setId(771);
//		$city771->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city771->setName('Зимогорье');
//		$manager->persist($city771); 
//
//		$city772= new City();
//		$city772->setId(772);
//		$city772->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city772->setName('Зиньков');
//		$manager->persist($city772); 
//
//		$city773= new City();
//		$city773->setId(773);
//		$city773->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city773->setName('Зирне');
//		$manager->persist($city773); 
//
//		$city774= new City();
//		$city774->setId(774);
//		$city774->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city774->setName('Златоустовка');
//		$manager->persist($city774); 
//
//		$city775= new City();
//		$city775->setId(775);
//		$city775->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city775->setName('Змиев');
//		$manager->persist($city775); 
//
//		$city776= new City();
//		$city776->setId(776);
//		$city776->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city776->setName('Змиенец');
//		$manager->persist($city776); 
//
//		$city777= new City();
//		$city777->setId(777);
//		$city777->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city777->setName('Знаменка');
//		$manager->persist($city777); 
//
//		$city778= new City();
//		$city778->setId(778);
//		$city778->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city778->setName('Зняцево');
//		$manager->persist($city778); 
//
//		$city779= new City();
//		$city779->setId(779);
//		$city779->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city779->setName('Золотаревка');
//		$manager->persist($city779); 
//
//		$city780= new City();
//		$city780->setId(780);
//		$city780->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city780->setName('Золотники');
//		$manager->persist($city780); 
//
//		$city781= new City();
//		$city781->setId(781);
//		$city781->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city781->setName('Золотое');
//		$manager->persist($city781); 
//
//		$city782= new City();
//		$city782->setId(782);
//		$city782->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city782->setName('Золотой Поток');
//		$manager->persist($city782); 
//
//		$city783= new City();
//		$city783->setId(783);
//		$city783->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city783->setName('Золотоноша');
//		$manager->persist($city783); 
//
//		$city784= new City();
//		$city784->setId(784);
//		$city784->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city784->setName('Золочев (Харьковськая обл.)');
//		$manager->persist($city784); 
//
//		$city785= new City();
//		$city785->setId(785);
//		$city785->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city785->setName('Золочев');
//		$manager->persist($city785); 
//
//		$city786= new City();
//		$city786->setId(786);
//		$city786->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city786->setName('Зоринск');
//		$manager->persist($city786); 
//
//		$city787= new City();
//		$city787->setId(787);
//		$city787->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city787->setName('Зоротовичи');
//		$manager->persist($city787); 
//
//		$city788= new City();
//		$city788->setId(788);
//		$city788->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city788->setName('Зубра');
//		$manager->persist($city788); 
//
//		$city789= new City();
//		$city789->setId(789);
//		$city789->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city789->setName('Зугрес');
//		$manager->persist($city789); 
//
//		$city790= new City();
//		$city790->setId(790);
//		$city790->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city790->setName('Зуя');
//		$manager->persist($city790); 
//
//		$city791= new City();
//		$city791->setId(791);
//		$city791->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city791->setName('Иване-пусте');
//		$manager->persist($city791); 
//
//		$city792= new City();
//		$city792->setId(792);
//		$city792->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city792->setName('Иваничи');
//		$manager->persist($city792); 
//
//		$city793= new City();
//		$city793->setId(793);
//		$city793->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city793->setName('Иванков');
//		$manager->persist($city793); 
//
//		$city794= new City();
//		$city794->setId(794);
//		$city794->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city794->setName('Иванков');
//		$manager->persist($city794); 
//
//		$city795= new City();
//		$city795->setId(795);
//		$city795->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city795->setName('Иванковцы');
//		$manager->persist($city795); 
//
//		$city796= new City();
//		$city796->setId(796);
//		$city796->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city796->setName('Ивано-Благодатное');
//		$manager->persist($city796); 
//
//		$city797= new City();
//		$city797->setId(797);
//		$city797->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city797->setName('Ивано-франково');
//		$manager->persist($city797); 
//
//		$city798= new City();
//		$city798->setId(798);
//		$city798->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city798->setName('Ивано-Франковск');
//		$manager->persist($city798); 
//
//		$city799= new City();
//		$city799->setId(799);
//		$city799->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city799->setName('Ивано-яризовка');
//		$manager->persist($city799); 
//
//		$city800= new City();
//		$city800->setId(800);
//		$city800->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city800->setName('Иванов');
//		$manager->persist($city800); 
//
//		$city801= new City();
//		$city801->setId(801);
//		$city801->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city801->setName('Ивановка');
//		$manager->persist($city801); 
//
//		$city802= new City();
//		$city802->setId(802);
//		$city802->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city802->setName('Ивановка (Мелитополь)');
//		$manager->persist($city802); 
//
//		$city803= new City();
//		$city803->setId(803);
//		$city803->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city803->setName('Ивановка');
//		$manager->persist($city803); 
//
//		$city804= new City();
//		$city804->setId(804);
//		$city804->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city804->setName('Ивановка');
//		$manager->persist($city804); 
//
//		$city805= new City();
//		$city805->setId(805);
//		$city805->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city805->setName('Ивановка (Одесса)');
//		$manager->persist($city805); 
//
//		$city806= new City();
//		$city806->setId(806);
//		$city806->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city806->setName('Ивановка');
//		$manager->persist($city806); 
//
//		$city807= new City();
//		$city807->setId(807);
//		$city807->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city807->setName('Ивановцы');
//		$manager->persist($city807); 
//
//		$city808= new City();
//		$city808->setId(808);
//		$city808->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city808->setName('Иванополь');
//		$manager->persist($city808); 
//
//		$city809= new City();
//		$city809->setId(809);
//		$city809->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city809->setName('Иванополье');
//		$manager->persist($city809); 
//
//		$city810= new City();
//		$city810->setId(810);
//		$city810->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city810->setName('Иванчи');
//		$manager->persist($city810); 
//
//		$city811= new City();
//		$city811->setId(811);
//		$city811->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city811->setName('Иванычи');
//		$manager->persist($city811); 
//
//		$city812= new City();
//		$city812->setId(812);
//		$city812->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city812->setName('Иваньки');
//		$manager->persist($city812); 
//
//		$city813= new City();
//		$city813->setId(813);
//		$city813->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city813->setName('пвашковка');
//		$manager->persist($city813); 
//
//		$city814= new City();
//		$city814->setId(814);
//		$city814->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city814->setName('Иза');
//		$manager->persist($city814); 
//
//		$city815= new City();
//		$city815->setId(815);
//		$city815->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city815->setName('Измаил');
//		$manager->persist($city815); 
//
//		$city816= new City();
//		$city816->setId(816);
//		$city816->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city816->setName('Изюм');
//		$manager->persist($city816); 
//
//		$city817= new City();
//		$city817->setId(817);
//		$city817->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city817->setName('Изяслав');
//		$manager->persist($city817); 
//
//		$city818= new City();
//		$city818->setId(818);
//		$city818->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city818->setName('Илларионово');
//		$manager->persist($city818); 
//
//		$city819= new City();
//		$city819->setId(819);
//		$city819->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city819->setName('Иллинцы');
//		$manager->persist($city819); 
//
//		$city820= new City();
//		$city820->setId(820);
//		$city820->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city820->setName('Иловайск');
//		$manager->persist($city820); 
//
//		$city821= new City();
//		$city821->setId(821);
//		$city821->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city821->setName('Ильинцы');
//		$manager->persist($city821); 
//
//		$city822= new City();
//		$city822->setId(822);
//		$city822->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city822->setName('Ильича');
//		$manager->persist($city822); 
//
//		$city823= new City();
//		$city823->setId(823);
//		$city823->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city823->setName('Ильичевка');
//		$manager->persist($city823); 
//
//		$city824= new City();
//		$city824->setId(824);
//		$city824->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city824->setName('Ильичевск');
//		$manager->persist($city824); 
//
//		$city825= new City();
//		$city825->setId(825);
//		$city825->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city825->setName('Ильичовское');
//		$manager->persist($city825); 
//
//		$city826= new City();
//		$city826->setId(826);
//		$city826->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city826->setName('Ильница');
//		$manager->persist($city826); 
//
//		$city827= new City();
//		$city827->setId(827);
//		$city827->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city827->setName('Ингулец');
//		$manager->persist($city827); 
//
//		$city828= new City();
//		$city828->setId(828);
//		$city828->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city828->setName('Ингулец');
//		$manager->persist($city828); 
//
//		$city829= new City();
//		$city829->setId(829);
//		$city829->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city829->setName('Инкерман');
//		$manager->persist($city829); 
//
//		$city830= new City();
//		$city830->setId(830);
//		$city830->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city830->setName('Иосиповка');
//		$manager->persist($city830); 
//
//		$city831= new City();
//		$city831->setId(831);
//		$city831->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city831->setName('Ирклиев');
//		$manager->persist($city831); 
//
//		$city832= new City();
//		$city832->setId(832);
//		$city832->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city832->setName('Ирпень');
//		$manager->persist($city832); 
//
//		$city833= new City();
//		$city833->setId(833);
//		$city833->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city833->setName('Иршава');
//		$manager->persist($city833); 
//
//		$city834= new City();
//		$city834->setId(834);
//		$city834->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city834->setName('Иршанск');
//		$manager->persist($city834); 
//
//		$city835= new City();
//		$city835->setId(835);
//		$city835->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city835->setName('Исаево');
//		$manager->persist($city835); 
//
//		$city836= new City();
//		$city836->setId(836);
//		$city836->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city836->setName('Испас');
//		$manager->persist($city836); 
//
//		$city837= new City();
//		$city837->setId(837);
//		$city837->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city837->setName('Ичня');
//		$manager->persist($city837); 
//
//		$city838= new City();
//		$city838->setId(838);
//		$city838->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city838->setName('Йосиповка');
//		$manager->persist($city838); 
//
//		$city839= new City();
//		$city839->setId(839);
//		$city839->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city839->setName('Йосиповка');
//		$manager->persist($city839); 
//
//		$city840= new City();
//		$city840->setId(840);
//		$city840->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city840->setName('Кавуны');
//		$manager->persist($city840); 
//
//		$city841= new City();
//		$city841->setId(841);
//		$city841->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city841->setName('Кагарлык');
//		$manager->persist($city841); 
//
//		$city842= new City();
//		$city842->setId(842);
//		$city842->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city842->setName('Казанка');
//		$manager->persist($city842); 
//
//		$city843= new City();
//		$city843->setId(843);
//		$city843->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city843->setName('Казатин');
//		$manager->persist($city843); 
//
//		$city844= new City();
//		$city844->setId(844);
//		$city844->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city844->setName('Казацкое');
//		$manager->persist($city844); 
//
//		$city845= new City();
//		$city845->setId(845);
//		$city845->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city845->setName('Казачьи лагеря');
//		$manager->persist($city845); 
//
//		$city846= new City();
//		$city846->setId(846);
//		$city846->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city846->setName('Казачья Лопань');
//		$manager->persist($city846); 
//
//		$city847= new City();
//		$city847->setId(847);
//		$city847->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city847->setName('Калайдинцы');
//		$manager->persist($city847); 
//
//		$city848= new City();
//		$city848->setId(848);
//		$city848->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city848->setName('Калантаев');
//		$manager->persist($city848); 
//
//		$city849= new City();
//		$city849->setId(849);
//		$city849->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city849->setName('Каланчак');
//		$manager->persist($city849); 
//
//		$city850= new City();
//		$city850->setId(850);
//		$city850->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city850->setName('Калининское');
//		$manager->persist($city850); 
//
//		$city851= new City();
//		$city851->setId(851);
//		$city851->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city851->setName('Калинов');
//		$manager->persist($city851); 
//
//		$city852= new City();
//		$city852->setId(852);
//		$city852->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city852->setName('Калиновка');
//		$manager->persist($city852); 
//
//		$city853= new City();
//		$city853->setId(853);
//		$city853->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city853->setName('Калиновка');
//		$manager->persist($city853); 
//
//		$city854= new City();
//		$city854->setId(854);
//		$city854->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city854->setName('Калиновка');
//		$manager->persist($city854); 
//
//		$city855= new City();
//		$city855->setId(855);
//		$city855->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city855->setName('Калиновка(Винница)');
//		$manager->persist($city855); 
//
//		$city856= new City();
//		$city856->setId(856);
//		$city856->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city856->setName('Калиновка');
//		$manager->persist($city856); 
//
//		$city857= new City();
//		$city857->setId(857);
//		$city857->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city857->setName('Калиновка');
//		$manager->persist($city857); 
//
//		$city858= new City();
//		$city858->setId(858);
//		$city858->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city858->setName('Калиновка вторая');
//		$manager->persist($city858); 
//
//		$city859= new City();
//		$city859->setId(859);
//		$city859->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city859->setName('Калины');
//		$manager->persist($city859); 
//
//		$city860= new City();
//		$city860->setId(860);
//		$city860->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city860->setName('Калита');
//		$manager->persist($city860); 
//
//		$city861= new City();
//		$city861->setId(861);
//		$city861->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city861->setName('Калмазово');
//		$manager->persist($city861); 
//
//		$city862= new City();
//		$city862->setId(862);
//		$city862->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city862->setName('Калуш');
//		$manager->persist($city862); 
//
//		$city863= new City();
//		$city863->setId(863);
//		$city863->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city863->setName('Камбурлиевка');
//		$manager->persist($city863); 
//
//		$city864= new City();
//		$city864->setId(864);
//		$city864->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city864->setName('Каменец-Подольский');
//		$manager->persist($city864); 
//
//		$city865= new City();
//		$city865->setId(865);
//		$city865->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city865->setName('Каменица');
//		$manager->persist($city865); 
//
//		$city866= new City();
//		$city866->setId(866);
//		$city866->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city866->setName('Каменка');
//		$manager->persist($city866); 
//
//		$city867= new City();
//		$city867->setId(867);
//		$city867->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city867->setName('Каменка');
//		$manager->persist($city867); 
//
//		$city868= new City();
//		$city868->setId(868);
//		$city868->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city868->setName('Каменка');
//		$manager->persist($city868); 
//
//		$city869= new City();
//		$city869->setId(869);
//		$city869->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city869->setName('Каменка-Бугская');
//		$manager->persist($city869); 
//
//		$city870= new City();
//		$city870->setId(870);
//		$city870->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city870->setName('Каменка-Днепровская');
//		$manager->persist($city870); 
//
//		$city871= new City();
//		$city871->setId(871);
//		$city871->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city871->setName('Каменногорка');
//		$manager->persist($city871); 
//
//		$city872= new City();
//		$city872->setId(872);
//		$city872->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city872->setName('Каменный брод');
//		$manager->persist($city872); 
//
//		$city873= new City();
//		$city873->setId(873);
//		$city873->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city873->setName('Каменный Брод');
//		$manager->persist($city873); 
//
//		$city874= new City();
//		$city874->setId(874);
//		$city874->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city874->setName('Каменный мост');
//		$manager->persist($city874); 
//
//		$city875= new City();
//		$city875->setId(875);
//		$city875->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city875->setName('Каменный Мост');
//		$manager->persist($city875); 
//
//		$city876= new City();
//		$city876->setId(876);
//		$city876->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city876->setName('Каменоломня');
//		$manager->persist($city876); 
//
//		$city877= new City();
//		$city877->setId(877);
//		$city877->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city877->setName('Каменское');
//		$manager->persist($city877); 
//
//		$city878= new City();
//		$city878->setId(878);
//		$city878->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city878->setName('Камень-Каширский');
//		$manager->persist($city878); 
//
//		$city879= new City();
//		$city879->setId(879);
//		$city879->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city879->setName('Камыш-Заря');
//		$manager->persist($city879); 
//
//		$city880= new City();
//		$city880->setId(880);
//		$city880->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city880->setName('Камышаны');
//		$manager->persist($city880); 
//
//		$city881= new City();
//		$city881->setId(881);
//		$city881->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city881->setName('Камышеваха');
//		$manager->persist($city881); 
//
//		$city882= new City();
//		$city882->setId(882);
//		$city882->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city882->setName('Камышня');
//		$manager->persist($city882); 
//
//		$city883= new City();
//		$city883->setId(883);
//		$city883->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city883->setName('Камянское');
//		$manager->persist($city883); 
//
//		$city884= new City();
//		$city884->setId(884);
//		$city884->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city884->setName('Канев');
//		$manager->persist($city884); 
//
//		$city885= new City();
//		$city885->setId(885);
//		$city885->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city885->setName('Каневское');
//		$manager->persist($city885); 
//
//		$city886= new City();
//		$city886->setId(886);
//		$city886->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city886->setName('Капитановка');
//		$manager->persist($city886); 
//
//		$city887= new City();
//		$city887->setId(887);
//		$city887->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city887->setName('Капитоловка');
//		$manager->persist($city887); 
//
//		$city888= new City();
//		$city888->setId(888);
//		$city888->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city888->setName('Капустин');
//		$manager->persist($city888); 
//
//		$city889= new City();
//		$city889->setId(889);
//		$city889->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city889->setName('Карловка');
//		$manager->persist($city889); 
//
//		$city890= new City();
//		$city890->setId(890);
//		$city890->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city890->setName('Каролино-бугаз');
//		$manager->persist($city890); 
//
//		$city891= new City();
//		$city891->setId(891);
//		$city891->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city891->setName('Карпаты');
//		$manager->persist($city891); 
//
//		$city892= new City();
//		$city892->setId(892);
//		$city892->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city892->setName('Карьерное');
//		$manager->persist($city892); 
//
//		$city893= new City();
//		$city893->setId(893);
//		$city893->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city893->setName('Карьерное');
//		$manager->persist($city893); 
//
//		$city894= new City();
//		$city894->setId(894);
//		$city894->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city894->setName('Катериновка');
//		$manager->persist($city894); 
//
//		$city895= new City();
//		$city895->setId(895);
//		$city895->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city895->setName('Катериновка');
//		$manager->persist($city895); 
//
//		$city896= new City();
//		$city896->setId(896);
//		$city896->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city896->setName('Катеринополь');
//		$manager->persist($city896); 
//
//		$city897= new City();
//		$city897->setId(897);
//		$city897->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city897->setName('Каховка');
//		$manager->persist($city897); 
//
//		$city898= new City();
//		$city898->setId(898);
//		$city898->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city898->setName('Кацивели');
//		$manager->persist($city898); 
//
//		$city899= new City();
//		$city899->setId(899);
//		$city899->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city899->setName('Кача');
//		$manager->persist($city899); 
//
//		$city900= new City();
//		$city900->setId(900);
//		$city900->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city900->setName('Кашперовка');
//		$manager->persist($city900); 
//
//		$city901= new City();
//		$city901->setId(901);
//		$city901->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city901->setName('Квасилов');
//		$manager->persist($city901); 
//
//		$city902= new City();
//		$city902->setId(902);
//		$city902->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city902->setName('Квасы');
//		$manager->persist($city902); 
//
//		$city903= new City();
//		$city903->setId(903);
//		$city903->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city903->setName('Кегичевка');
//		$manager->persist($city903); 
//
//		$city904= new City();
//		$city904->setId(904);
//		$city904->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city904->setName('Кельменцы');
//		$manager->persist($city904); 
//
//		$city905= new City();
//		$city905->setId(905);
//		$city905->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city905->setName('Кендерешов');
//		$manager->persist($city905); 
//
//		$city906= new City();
//		$city906->setId(906);
//		$city906->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city906->setName('Керчь');
//		$manager->persist($city906); 
//
//		$city907= new City();
//		$city907->setId(907);
//		$city907->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city907->setName('Киверцы');
//		$manager->persist($city907); 
//
//		$city908= new City();
//		$city908->setId(908);
//		$city908->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city908->setName('Киев');
//		$manager->persist($city908); 
//
//		$city909= new City();
//		$city909->setId(909);
//		$city909->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city909->setName('Киенка');
//		$manager->persist($city909); 
//
//		$city910= new City();
//		$city910->setId(910);
//		$city910->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city910->setName('Килия');
//		$manager->persist($city910); 
//
//		$city911= new City();
//		$city911->setId(911);
//		$city911->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city911->setName('Кильчень');
//		$manager->persist($city911); 
//
//		$city912= new City();
//		$city912->setId(912);
//		$city912->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city912->setName('Кирданы');
//		$manager->persist($city912); 
//
//		$city913= new City();
//		$city913->setId(913);
//		$city913->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city913->setName('Кириковка');
//		$manager->persist($city913); 
//
//		$city914= new City();
//		$city914->setId(914);
//		$city914->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city914->setName('Кирилловка');
//		$manager->persist($city914); 
//
//		$city915= new City();
//		$city915->setId(915);
//		$city915->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city915->setName('Кирнасивка');
//		$manager->persist($city915); 
//
//		$city916= new City();
//		$city916->setId(916);
//		$city916->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city916->setName('Кировка');
//		$manager->persist($city916); 
//
//		$city917= new City();
//		$city917->setId(917);
//		$city917->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city917->setName('Кировоград');
//		$manager->persist($city917); 
//
//		$city918= new City();
//		$city918->setId(918);
//		$city918->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city918->setName('Кировск');
//		$manager->persist($city918); 
//
//		$city919= new City();
//		$city919->setId(919);
//		$city919->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city919->setName('Кировское');
//		$manager->persist($city919); 
//
//		$city920= new City();
//		$city920->setId(920);
//		$city920->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city920->setName('Кировское');
//		$manager->persist($city920); 
//
//		$city921= new City();
//		$city921->setId(921);
//		$city921->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city921->setName('Кировское (Донецк)');
//		$manager->persist($city921); 
//
//		$city922= new City();
//		$city922->setId(922);
//		$city922->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city922->setName('Киселев');
//		$manager->persist($city922); 
//
//		$city923= new City();
//		$city923->setId(923);
//		$city923->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city923->setName('Киселевка');
//		$manager->persist($city923); 
//
//		$city924= new City();
//		$city924->setId(924);
//		$city924->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city924->setName('Кисели');
//		$manager->persist($city924); 
//
//		$city925= new City();
//		$city925->setId(925);
//		$city925->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city925->setName('Кицмань');
//		$manager->persist($city925); 
//
//		$city926= new City();
//		$city926->setId(926);
//		$city926->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city926->setName('Кишин');
//		$manager->persist($city926); 
//
//		$city927= new City();
//		$city927->setId(927);
//		$city927->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city927->setName('Кияж');
//		$manager->persist($city927); 
//
//		$city928= new City();
//		$city928->setId(928);
//		$city928->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city928->setName('Кияница');
//		$manager->persist($city928); 
//
//		$city929= new City();
//		$city929->setId(929);
//		$city929->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city929->setName('Кияница');
//		$manager->persist($city929); 
//
//		$city930= new City();
//		$city930->setId(930);
//		$city930->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city930->setName('Клавдиево-Тарасово');
//		$manager->persist($city930); 
//
//		$city931= new City();
//		$city931->setId(931);
//		$city931->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city931->setName('Клевань');
//		$manager->persist($city931); 
//
//		$city932= new City();
//		$city932->setId(932);
//		$city932->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city932->setName('Клембовка');
//		$manager->persist($city932); 
//
//		$city933= new City();
//		$city933->setId(933);
//		$city933->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city933->setName('Клембовка');
//		$manager->persist($city933); 
//
//		$city934= new City();
//		$city934->setId(934);
//		$city934->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city934->setName('Кленовая');
//		$manager->persist($city934); 
//
//		$city935= new City();
//		$city935->setId(935);
//		$city935->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city935->setName('Кленовец');
//		$manager->persist($city935); 
//
//		$city936= new City();
//		$city936->setId(936);
//		$city936->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city936->setName('Кленовка');
//		$manager->persist($city936); 
//
//		$city937= new City();
//		$city937->setId(937);
//		$city937->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city937->setName('Кленовый');
//		$manager->persist($city937); 
//
//		$city938= new City();
//		$city938->setId(938);
//		$city938->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city938->setName('Клесов');
//		$manager->persist($city938); 
//
//		$city939= new City();
//		$city939->setId(939);
//		$city939->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city939->setName('Клетчин');
//		$manager->persist($city939); 
//
//		$city940= new City();
//		$city940->setId(940);
//		$city940->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city940->setName('Климашовка');
//		$manager->persist($city940); 
//
//		$city941= new City();
//		$city941->setId(941);
//		$city941->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city941->setName('Клинцы');
//		$manager->persist($city941); 
//
//		$city942= new City();
//		$city942->setId(942);
//		$city942->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city942->setName('Клишковцы');
//		$manager->persist($city942); 
//
//		$city943= new City();
//		$city943->setId(943);
//		$city943->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city943->setName('Ключарки');
//		$manager->persist($city943); 
//
//		$city944= new City();
//		$city944->setId(944);
//		$city944->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city944->setName('Княжелука');
//		$manager->persist($city944); 
//
//		$city945= new City();
//		$city945->setId(945);
//		$city945->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city945->setName('Княжичи');
//		$manager->persist($city945); 
//
//		$city946= new City();
//		$city946->setId(946);
//		$city946->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city946->setName('Княжполь');
//		$manager->persist($city946); 
//
//		$city947= new City();
//		$city947->setId(947);
//		$city947->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city947->setName('Кобеляки');
//		$manager->persist($city947); 
//
//		$city948= new City();
//		$city948->setId(948);
//		$city948->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city948->setName('Коблево');
//		$manager->persist($city948); 
//
//		$city949= new City();
//		$city949->setId(949);
//		$city949->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city949->setName('Кобылецкая поляна');
//		$manager->persist($city949); 
//
//		$city950= new City();
//		$city950->setId(950);
//		$city950->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city950->setName('Ковалевка');
//		$manager->persist($city950); 
//
//		$city951= new City();
//		$city951->setId(951);
//		$city951->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city951->setName('Ковалевка');
//		$manager->persist($city951); 
//
//		$city952= new City();
//		$city952->setId(952);
//		$city952->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city952->setName('Ковалевка');
//		$manager->persist($city952); 
//
//		$city953= new City();
//		$city953->setId(953);
//		$city953->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city953->setName('Ковель');
//		$manager->persist($city953); 
//
//		$city954= new City();
//		$city954->setId(954);
//		$city954->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city954->setName('Ковпыта');
//		$manager->persist($city954); 
//
//		$city955= new City();
//		$city955->setId(955);
//		$city955->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city955->setName('Ковшаровка');
//		$manager->persist($city955); 
//
//		$city956= new City();
//		$city956->setId(956);
//		$city956->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city956->setName('Ковяги');
//		$manager->persist($city956); 
//
//		$city957= new City();
//		$city957->setId(957);
//		$city957->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city957->setName('Кодра');
//		$manager->persist($city957); 
//
//		$city958= new City();
//		$city958->setId(958);
//		$city958->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city958->setName('Кодыма');
//		$manager->persist($city958); 
//
//		$city959= new City();
//		$city959->setId(959);
//		$city959->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city959->setName('Кожанка');
//		$manager->persist($city959); 
//
//		$city960= new City();
//		$city960->setId(960);
//		$city960->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city960->setName('Коза');
//		$manager->persist($city960); 
//
//		$city961= new City();
//		$city961->setId(961);
//		$city961->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city961->setName('Козелец');
//		$manager->persist($city961); 
//
//		$city962= new City();
//		$city962->setId(962);
//		$city962->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city962->setName('Козельщина');
//		$manager->persist($city962); 
//
//		$city963= new City();
//		$city963->setId(963);
//		$city963->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city963->setName('Козин');
//		$manager->persist($city963); 
//
//		$city964= new City();
//		$city964->setId(964);
//		$city964->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city964->setName('Козин');
//		$manager->persist($city964); 
//
//		$city965= new City();
//		$city965->setId(965);
//		$city965->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city965->setName('Козлов');
//		$manager->persist($city965); 
//
//		$city966= new City();
//		$city966->setId(966);
//		$city966->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city966->setName('Козова');
//		$manager->persist($city966); 
//
//		$city967= new City();
//		$city967->setId(967);
//		$city967->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city967->setName('Козятин');
//		$manager->persist($city967); 
//
//		$city968= new City();
//		$city968->setId(968);
//		$city968->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city968->setName('Коктебель');
//		$manager->persist($city968); 
//
//		$city969= new City();
//		$city969->setId(969);
//		$city969->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city969->setName('Коларовка');
//		$manager->persist($city969); 
//
//		$city970= new City();
//		$city970->setId(970);
//		$city970->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city970->setName('Колки');
//		$manager->persist($city970); 
//
//		$city971= new City();
//		$city971->setId(971);
//		$city971->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city971->setName('Колоденка');
//		$manager->persist($city971); 
//
//		$city972= new City();
//		$city972->setId(972);
//		$city972->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city972->setName('Колодистое');
//		$manager->persist($city972); 
//
//		$city973= new City();
//		$city973->setId(973);
//		$city973->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city973->setName('Коломак');
//		$manager->persist($city973); 
//
//		$city974= new City();
//		$city974->setId(974);
//		$city974->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city974->setName('Коломыя');
//		$manager->persist($city974); 
//
//		$city975= new City();
//		$city975->setId(975);
//		$city975->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city975->setName('Колочава');
//		$manager->persist($city975); 
//
//		$city976= new City();
//		$city976->setId(976);
//		$city976->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city976->setName('Колычовка');
//		$manager->persist($city976); 
//
//		$city977= new City();
//		$city977->setId(977);
//		$city977->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city977->setName('Кольчино');
//		$manager->persist($city977); 
//
//		$city978= new City();
//		$city978->setId(978);
//		$city978->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city978->setName('Кольчугино');
//		$manager->persist($city978); 
//
//		$city979= new City();
//		$city979->setId(979);
//		$city979->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city979->setName('Комарно');
//		$manager->persist($city979); 
//
//		$city980= new City();
//		$city980->setId(980);
//		$city980->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city980->setName('Комаровцы');
//		$manager->persist($city980); 
//
//		$city981= new City();
//		$city981->setId(981);
//		$city981->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city981->setName('Коминтерн');
//		$manager->persist($city981); 
//
//		$city982= new City();
//		$city982->setId(982);
//		$city982->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city982->setName('Коминтерновское');
//		$manager->persist($city982); 
//
//		$city983= new City();
//		$city983->setId(983);
//		$city983->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city983->setName('Комиссаровка');
//		$manager->persist($city983); 
//
//		$city984= new City();
//		$city984->setId(984);
//		$city984->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city984->setName('Коммуна');
//		$manager->persist($city984); 
//
//		$city985= new City();
//		$city985->setId(985);
//		$city985->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city985->setName('Коммунар');
//		$manager->persist($city985); 
//
//		$city986= new City();
//		$city986->setId(986);
//		$city986->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city986->setName('Коммунар');
//		$manager->persist($city986); 
//
//		$city987= new City();
//		$city987->setId(987);
//		$city987->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city987->setName('Компанеевка');
//		$manager->persist($city987); 
//
//		$city988= new City();
//		$city988->setId(988);
//		$city988->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city988->setName('Комсомольск');
//		$manager->persist($city988); 
//
//		$city989= new City();
//		$city989->setId(989);
//		$city989->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city989->setName('Комсомольский');
//		$manager->persist($city989); 
//
//		$city990= new City();
//		$city990->setId(990);
//		$city990->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city990->setName('Комсомольское (Харьков)');
//		$manager->persist($city990); 
//
//		$city991= new City();
//		$city991->setId(991);
//		$city991->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city991->setName('Комсомольское (Донецк)');
//		$manager->persist($city991); 
//
//		$city992= new City();
//		$city992->setId(992);
//		$city992->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city992->setName('Комсомольское');
//		$manager->persist($city992); 
//
//		$city993= new City();
//		$city993->setId(993);
//		$city993->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city993->setName('Кондратовка');
//		$manager->persist($city993); 
//
//		$city994= new City();
//		$city994->setId(994);
//		$city994->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city994->setName('Кононовка');
//		$manager->persist($city994); 
//
//		$city995= new City();
//		$city995->setId(995);
//		$city995->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city995->setName('Конопница');
//		$manager->persist($city995); 
//
//		$city996= new City();
//		$city996->setId(996);
//		$city996->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city996->setName('Конотоп');
//		$manager->persist($city996); 
//
//		$city997= new City();
//		$city997->setId(997);
//		$city997->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city997->setName('Константиновка');
//		$manager->persist($city997); 
//
//		$city998= new City();
//		$city998->setId(998);
//		$city998->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city998->setName('Константиновка');
//		$manager->persist($city998); 
//
//		$city999= new City();
//		$city999->setId(999);
//		$city999->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city999->setName('Константиновка');
//		$manager->persist($city999); 
//
//		$city1000= new City();
//		$city1000->setId(1000);
//		$city1000->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1000->setName('Константиновка');
//		$manager->persist($city1000); 
//
//		$city1001= new City();
//		$city1001->setId(1001);
//		$city1001->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1001->setName('Константиновка');
//		$manager->persist($city1001); 
//
//		$city1002= new City();
//		$city1002->setId(1002);
//		$city1002->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1002->setName('Константиновка');
//		$manager->persist($city1002); 
//
//		$city1003= new City();
//		$city1003->setId(1003);
//		$city1003->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1003->setName('Копайгород');
//		$manager->persist($city1003); 
//
//		$city1004= new City();
//		$city1004->setId(1004);
//		$city1004->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1004->setName('Копылы');
//		$manager->persist($city1004); 
//
//		$city1005= new City();
//		$city1005->setId(1005);
//		$city1005->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1005->setName('Копыстин');
//		$manager->persist($city1005); 
//
//		$city1006= new City();
//		$city1006->setId(1006);
//		$city1006->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1006->setName('Копычинцы');
//		$manager->persist($city1006); 
//
//		$city1007= new City();
//		$city1007->setId(1007);
//		$city1007->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1007->setName('Копычинцы');
//		$manager->persist($city1007); 
//
//		$city1008= new City();
//		$city1008->setId(1008);
//		$city1008->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1008->setName('Корделевка');
//		$manager->persist($city1008); 
//
//		$city1009= new City();
//		$city1009->setId(1009);
//		$city1009->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1009->setName('Кореиз');
//		$manager->persist($city1009); 
//
//		$city1010= new City();
//		$city1010->setId(1010);
//		$city1010->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1010->setName('Корец');
//		$manager->persist($city1010); 
//
//		$city1011= new City();
//		$city1011->setId(1011);
//		$city1011->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1011->setName('Коржова');
//		$manager->persist($city1011); 
//
//		$city1012= new City();
//		$city1012->setId(1012);
//		$city1012->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1012->setName('Корнин');
//		$manager->persist($city1012); 
//
//		$city1013= new City();
//		$city1013->setId(1013);
//		$city1013->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1013->setName('Корнин');
//		$manager->persist($city1013); 
//
//		$city1014= new City();
//		$city1014->setId(1014);
//		$city1014->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1014->setName('Корнич');
//		$manager->persist($city1014); 
//
//		$city1015= new City();
//		$city1015->setId(1015);
//		$city1015->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1015->setName('Корничи');
//		$manager->persist($city1015); 
//
//		$city1016= new City();
//		$city1016->setId(1016);
//		$city1016->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1016->setName('Коробки');
//		$manager->persist($city1016); 
//
//		$city1017= new City();
//		$city1017->setId(1017);
//		$city1017->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1017->setName('Коробочкино');
//		$manager->persist($city1017); 
//
//		$city1018= new City();
//		$city1018->setId(1018);
//		$city1018->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1018->setName('Коровия');
//		$manager->persist($city1018); 
//
//		$city1019= new City();
//		$city1019->setId(1019);
//		$city1019->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1019->setName('Королевка');
//		$manager->persist($city1019); 
//
//		$city1020= new City();
//		$city1020->setId(1020);
//		$city1020->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1020->setName('Королевка');
//		$manager->persist($city1020); 
//
//		$city1021= new City();
//		$city1021->setId(1021);
//		$city1021->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1021->setName('Королево');
//		$manager->persist($city1021); 
//
//		$city1022= new City();
//		$city1022->setId(1022);
//		$city1022->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1022->setName('Короп');
//		$manager->persist($city1022); 
//
//		$city1023= new City();
//		$city1023->setId(1023);
//		$city1023->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1023->setName('Коропец');
//		$manager->persist($city1023); 
//
//		$city1024= new City();
//		$city1024->setId(1024);
//		$city1024->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1024->setName('Коропуж');
//		$manager->persist($city1024); 
//
//		$city1025= new City();
//		$city1025->setId(1025);
//		$city1025->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1025->setName('Коростень');
//		$manager->persist($city1025); 
//
//		$city1026= new City();
//		$city1026->setId(1026);
//		$city1026->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1026->setName('Коростов');
//		$manager->persist($city1026); 
//
//		$city1027= new City();
//		$city1027->setId(1027);
//		$city1027->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1027->setName('Коростышев');
//		$manager->persist($city1027); 
//
//		$city1028= new City();
//		$city1028->setId(1028);
//		$city1028->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1028->setName('Коротыч');
//		$manager->persist($city1028); 
//
//		$city1029= new City();
//		$city1029->setId(1029);
//		$city1029->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1029->setName('Корсунка');
//		$manager->persist($city1029); 
//
//		$city1030= new City();
//		$city1030->setId(1030);
//		$city1030->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1030->setName('Корсунь-Шевченковский');
//		$manager->persist($city1030); 
//
//		$city1031= new City();
//		$city1031->setId(1031);
//		$city1031->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1031->setName('Корчев');
//		$manager->persist($city1031); 
//
//		$city1032= new City();
//		$city1032->setId(1032);
//		$city1032->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1032->setName('Корчевка');
//		$manager->persist($city1032); 
//
//		$city1033= new City();
//		$city1033->setId(1033);
//		$city1033->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1033->setName('Корысть');
//		$manager->persist($city1033); 
//
//		$city1034= new City();
//		$city1034->setId(1034);
//		$city1034->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1034->setName('Корытное');
//		$manager->persist($city1034); 
//
//		$city1035= new City();
//		$city1035->setId(1035);
//		$city1035->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1035->setName('Корюковка');
//		$manager->persist($city1035); 
//
//		$city1036= new City();
//		$city1036->setId(1036);
//		$city1036->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1036->setName('Косов');
//		$manager->persist($city1036); 
//
//		$city1037= new City();
//		$city1037->setId(1037);
//		$city1037->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1037->setName('Косов');
//		$manager->persist($city1037); 
//
//		$city1038= new City();
//		$city1038->setId(1038);
//		$city1038->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1038->setName('Косовка');
//		$manager->persist($city1038); 
//
//		$city1039= new City();
//		$city1039->setId(1039);
//		$city1039->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1039->setName('Косовская поляна');
//		$manager->persist($city1039); 
//
//		$city1040= new City();
//		$city1040->setId(1040);
//		$city1040->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1040->setName('Косонь');
//		$manager->persist($city1040); 
//
//		$city1041= new City();
//		$city1041->setId(1041);
//		$city1041->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1041->setName('Костинцы');
//		$manager->persist($city1041); 
//
//		$city1042= new City();
//		$city1042->setId(1042);
//		$city1042->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1042->setName('Костополь');
//		$manager->persist($city1042); 
//
//		$city1043= new City();
//		$city1043->setId(1043);
//		$city1043->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1043->setName('Кострижевка');
//		$manager->persist($city1043); 
//
//		$city1044= new City();
//		$city1044->setId(1044);
//		$city1044->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1044->setName('Котельва');
//		$manager->persist($city1044); 
//
//		$city1045= new City();
//		$city1045->setId(1045);
//		$city1045->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1045->setName('Котов');
//		$manager->persist($city1045); 
//
//		$city1046= new City();
//		$city1046->setId(1046);
//		$city1046->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1046->setName('Котовка');
//		$manager->persist($city1046); 
//
//		$city1047= new City();
//		$city1047->setId(1047);
//		$city1047->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1047->setName('Котовка');
//		$manager->persist($city1047); 
//
//		$city1048= new City();
//		$city1048->setId(1048);
//		$city1048->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1048->setName('Котовск');
//		$manager->persist($city1048); 
//
//		$city1049= new City();
//		$city1049->setId(1049);
//		$city1049->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1049->setName('Коцюбинское');
//		$manager->persist($city1049); 
//
//		$city1050= new City();
//		$city1050->setId(1050);
//		$city1050->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1050->setName('Коцюры');
//		$manager->persist($city1050); 
//
//		$city1051= new City();
//		$city1051->setId(1051);
//		$city1051->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1051->setName('Кочеров');
//		$manager->persist($city1051); 
//
//		$city1052= new City();
//		$city1052->setId(1052);
//		$city1052->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1052->setName('Кочеток');
//		$manager->persist($city1052); 
//
//		$city1053= new City();
//		$city1053->setId(1053);
//		$city1053->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1053->setName('Кошелевка');
//		$manager->persist($city1053); 
//
//		$city1054= new City();
//		$city1054->setId(1054);
//		$city1054->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1054->setName('Краковец');
//		$manager->persist($city1054); 
//
//		$city1055= new City();
//		$city1055->setId(1055);
//		$city1055->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1055->setName('Краматорск');
//		$manager->persist($city1055); 
//
//		$city1056= new City();
//		$city1056->setId(1056);
//		$city1056->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1056->setName('Крапивное');
//		$manager->persist($city1056); 
//
//		$city1057= new City();
//		$city1057->setId(1057);
//		$city1057->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1057->setName('Крапивня');
//		$manager->persist($city1057); 
//
//		$city1058= new City();
//		$city1058->setId(1058);
//		$city1058->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1058->setName('Крапивня');
//		$manager->persist($city1058); 
//
//		$city1059= new City();
//		$city1059->setId(1059);
//		$city1059->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1059->setName('Красилов');
//		$manager->persist($city1059); 
//
//		$city1060= new City();
//		$city1060->setId(1060);
//		$city1060->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1060->setName('Красиловка');
//		$manager->persist($city1060); 
//
//		$city1061= new City();
//		$city1061->setId(1061);
//		$city1061->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1061->setName('Красная поляна');
//		$manager->persist($city1061); 
//
//		$city1062= new City();
//		$city1062->setId(1062);
//		$city1062->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1062->setName('Красноармейск');
//		$manager->persist($city1062); 
//
//		$city1063= new City();
//		$city1063->setId(1063);
//		$city1063->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1063->setName('Красногвардейский');
//		$manager->persist($city1063); 
//
//		$city1064= new City();
//		$city1064->setId(1064);
//		$city1064->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1064->setName('Красногвардейское');
//		$manager->persist($city1064); 
//
//		$city1065= new City();
//		$city1065->setId(1065);
//		$city1065->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1065->setName('Красногвардейское');
//		$manager->persist($city1065); 
//
//		$city1066= new City();
//		$city1066->setId(1066);
//		$city1066->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1066->setName('Красногорка');
//		$manager->persist($city1066); 
//
//		$city1067= new City();
//		$city1067->setId(1067);
//		$city1067->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1067->setName('Красногоровка');
//		$manager->persist($city1067); 
//
//		$city1068= new City();
//		$city1068->setId(1068);
//		$city1068->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1068->setName('Красногоровка');
//		$manager->persist($city1068); 
//
//		$city1069= new City();
//		$city1069->setId(1069);
//		$city1069->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1069->setName('Красноград');
//		$manager->persist($city1069); 
//
//		$city1070= new City();
//		$city1070->setId(1070);
//		$city1070->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1070->setName('Краснодон');
//		$manager->persist($city1070); 
//
//		$city1071= new City();
//		$city1071->setId(1071);
//		$city1071->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1071->setName('Красное');
//		$manager->persist($city1071); 
//
//		$city1072= new City();
//		$city1072->setId(1072);
//		$city1072->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1072->setName('Красное');
//		$manager->persist($city1072); 
//
//		$city1073= new City();
//		$city1073->setId(1073);
//		$city1073->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1073->setName('Красное');
//		$manager->persist($city1073); 
//
//		$city1074= new City();
//		$city1074->setId(1074);
//		$city1074->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1074->setName('Красное');
//		$manager->persist($city1074); 
//
//		$city1075= new City();
//		$city1075->setId(1075);
//		$city1075->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1075->setName('Красное');
//		$manager->persist($city1075); 
//
//		$city1076= new City();
//		$city1076->setId(1076);
//		$city1076->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1076->setName('Красное');
//		$manager->persist($city1076); 
//
//		$city1077= new City();
//		$city1077->setId(1077);
//		$city1077->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1077->setName('Красноильск');
//		$manager->persist($city1077); 
//
//		$city1078= new City();
//		$city1078->setId(1078);
//		$city1078->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1078->setName('Краснокаменка');
//		$manager->persist($city1078); 
//
//		$city1079= new City();
//		$city1079->setId(1079);
//		$city1079->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1079->setName('Краснокутск');
//		$manager->persist($city1079); 
//
//		$city1080= new City();
//		$city1080->setId(1080);
//		$city1080->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1080->setName('Краснолучский');
//		$manager->persist($city1080); 
//
//		$city1081= new City();
//		$city1081->setId(1081);
//		$city1081->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1081->setName('Краснопавловка');
//		$manager->persist($city1081); 
//
//		$city1082= new City();
//		$city1082->setId(1082);
//		$city1082->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1082->setName('Красноперекопск');
//		$manager->persist($city1082); 
//
//		$city1083= new City();
//		$city1083->setId(1083);
//		$city1083->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1083->setName('Краснополь');
//		$manager->persist($city1083); 
//
//		$city1084= new City();
//		$city1084->setId(1084);
//		$city1084->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1084->setName('Краснополье');
//		$manager->persist($city1084); 
//
//		$city1085= new City();
//		$city1085->setId(1085);
//		$city1085->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1085->setName('Краснореченское');
//		$manager->persist($city1085); 
//
//		$city1086= new City();
//		$city1086->setId(1086);
//		$city1086->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1086->setName('Красноселка');
//		$manager->persist($city1086); 
//
//		$city1087= new City();
//		$city1087->setId(1087);
//		$city1087->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1087->setName('Красноселка');
//		$manager->persist($city1087); 
//
//		$city1088= new City();
//		$city1088->setId(1088);
//		$city1088->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1088->setName('Красноселка');
//		$manager->persist($city1088); 
//
//		$city1089= new City();
//		$city1089->setId(1089);
//		$city1089->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1089->setName('Красные Окны');
//		$manager->persist($city1089); 
//
//		$city1090= new City();
//		$city1090->setId(1090);
//		$city1090->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1090->setName('Красный Кут');
//		$manager->persist($city1090); 
//
//		$city1091= new City();
//		$city1091->setId(1091);
//		$city1091->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1091->setName('Красный Лиман');
//		$manager->persist($city1091); 
//
//		$city1092= new City();
//		$city1092->setId(1092);
//		$city1092->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1092->setName('Красный Луч');
//		$manager->persist($city1092); 
//
//		$city1093= new City();
//		$city1093->setId(1093);
//		$city1093->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1093->setName('Красный партизан');
//		$manager->persist($city1093); 
//
//		$city1094= new City();
//		$city1094->setId(1094);
//		$city1094->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1094->setName('Кременец');
//		$manager->persist($city1094); 
//
//		$city1095= new City();
//		$city1095->setId(1095);
//		$city1095->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1095->setName('Кременец');
//		$manager->persist($city1095); 
//
//		$city1096= new City();
//		$city1096->setId(1096);
//		$city1096->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1096->setName('Кременная');
//		$manager->persist($city1096); 
//
//		$city1097= new City();
//		$city1097->setId(1097);
//		$city1097->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1097->setName('Кременчуг');
//		$manager->persist($city1097); 
//
//		$city1098= new City();
//		$city1098->setId(1098);
//		$city1098->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1098->setName('Кременчуки');
//		$manager->persist($city1098); 
//
//		$city1099= new City();
//		$city1099->setId(1099);
//		$city1099->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1099->setName('Кремидовка');
//		$manager->persist($city1099); 
//
//		$city1100= new City();
//		$city1100->setId(1100);
//		$city1100->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1100->setName('Крепенский');
//		$manager->persist($city1100); 
//
//		$city1101= new City();
//		$city1101->setId(1101);
//		$city1101->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1101->setName('Крестище');
//		$manager->persist($city1101); 
//
//		$city1102= new City();
//		$city1102->setId(1102);
//		$city1102->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1102->setName('Кривбасс');
//		$manager->persist($city1102); 
//
//		$city1103= new City();
//		$city1103->setId(1103);
//		$city1103->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1103->setName('Кривое Озеро');
//		$manager->persist($city1103); 
//
//		$city1104= new City();
//		$city1104->setId(1104);
//		$city1104->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1104->setName('Кривой Рог');
//		$manager->persist($city1104); 
//
//		$city1105= new City();
//		$city1105->setId(1105);
//		$city1105->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1105->setName('Кримское');
//		$manager->persist($city1105); 
//
//		$city1106= new City();
//		$city1106->setId(1106);
//		$city1106->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1106->setName('Кринички');
//		$manager->persist($city1106); 
//
//		$city1107= new City();
//		$city1107->setId(1107);
//		$city1107->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1107->setName('Криничное');
//		$manager->persist($city1107); 
//
//		$city1108= new City();
//		$city1108->setId(1108);
//		$city1108->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1108->setName('Криховцы');
//		$manager->persist($city1108); 
//
//		$city1109= new City();
//		$city1109->setId(1109);
//		$city1109->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1109->setName('Кролевец');
//		$manager->persist($city1109); 
//
//		$city1110= new City();
//		$city1110->setId(1110);
//		$city1110->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1110->setName('Кротенки');
//		$manager->persist($city1110); 
//
//		$city1111= new City();
//		$city1111->setId(1111);
//		$city1111->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1111->setName('Крупа');
//		$manager->persist($city1111); 
//
//		$city1112= new City();
//		$city1112->setId(1112);
//		$city1112->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1112->setName('Крыжановка');
//		$manager->persist($city1112); 
//
//		$city1113= new City();
//		$city1113->setId(1113);
//		$city1113->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1113->setName('Крыжополь');
//		$manager->persist($city1113); 
//
//		$city1114= new City();
//		$city1114->setId(1114);
//		$city1114->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1114->setName('Крымок');
//		$manager->persist($city1114); 
//
//		$city1115= new City();
//		$city1115->setId(1115);
//		$city1115->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1115->setName('Крюковщина');
//		$manager->persist($city1115); 
//
//		$city1116= new City();
//		$city1116->setId(1116);
//		$city1116->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1116->setName('Ксаверов');
//		$manager->persist($city1116); 
//
//		$city1117= new City();
//		$city1117->setId(1117);
//		$city1117->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1117->setName('Ксаверовка');
//		$manager->persist($city1117); 
//
//		$city1118= new City();
//		$city1118->setId(1118);
//		$city1118->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1118->setName('Кузнецовск');
//		$manager->persist($city1118); 
//
//		$city1119= new City();
//		$city1119->setId(1119);
//		$city1119->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1119->setName('Куйбышево');
//		$manager->persist($city1119); 
//
//		$city1120= new City();
//		$city1120->setId(1120);
//		$city1120->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1120->setName('Куйбышево');
//		$manager->persist($city1120); 
//
//		$city1121= new City();
//		$city1121->setId(1121);
//		$city1121->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1121->setName('Куликов');
//		$manager->persist($city1121); 
//
//		$city1122= new City();
//		$city1122->setId(1122);
//		$city1122->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1122->setName('Куликовка');
//		$manager->persist($city1122); 
//
//		$city1123= new City();
//		$city1123->setId(1123);
//		$city1123->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1123->setName('Кулиничи');
//		$manager->persist($city1123); 
//
//		$city1124= new City();
//		$city1124->setId(1124);
//		$city1124->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1124->setName('Кульчин');
//		$manager->persist($city1124); 
//
//		$city1125= new City();
//		$city1125->setId(1125);
//		$city1125->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1125->setName('Кумари');
//		$manager->persist($city1125); 
//
//		$city1126= new City();
//		$city1126->setId(1126);
//		$city1126->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1126->setName('Купин');
//		$manager->persist($city1126); 
//
//		$city1127= new City();
//		$city1127->setId(1127);
//		$city1127->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1127->setName('Купянск');
//		$manager->persist($city1127); 
//
//		$city1128= new City();
//		$city1128->setId(1128);
//		$city1128->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1128->setName('Кураховка');
//		$manager->persist($city1128); 
//
//		$city1129= new City();
//		$city1129->setId(1129);
//		$city1129->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1129->setName('Курахово');
//		$manager->persist($city1129); 
//
//		$city1130= new City();
//		$city1130->setId(1130);
//		$city1130->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1130->setName('Курдюмовка');
//		$manager->persist($city1130); 
//
//		$city1131= new City();
//		$city1131->setId(1131);
//		$city1131->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1131->setName('Куриловка');
//		$manager->persist($city1131); 
//
//		$city1132= new City();
//		$city1132->setId(1132);
//		$city1132->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1132->setName('Куриловка');
//		$manager->persist($city1132); 
//
//		$city1133= new City();
//		$city1133->setId(1133);
//		$city1133->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1133->setName('Куровичи');
//		$manager->persist($city1133); 
//
//		$city1134= new City();
//		$city1134->setId(1134);
//		$city1134->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1134->setName('Курпаты');
//		$manager->persist($city1134); 
//
//		$city1135= new City();
//		$city1135->setId(1135);
//		$city1135->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1135->setName('Куснища');
//		$manager->persist($city1135); 
//
//		$city1136= new City();
//		$city1136->setId(1136);
//		$city1136->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1136->setName('Кустин');
//		$manager->persist($city1136); 
//
//		$city1137= new City();
//		$city1137->setId(1137);
//		$city1137->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1137->setName('Куты');
//		$manager->persist($city1137); 
//
//		$city1138= new City();
//		$city1138->setId(1138);
//		$city1138->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1138->setName('Куты вторые');
//		$manager->persist($city1138); 
//
//		$city1139= new City();
//		$city1139->setId(1139);
//		$city1139->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1139->setName('Куштановица');
//		$manager->persist($city1139); 
//
//		$city1140= new City();
//		$city1140->setId(1140);
//		$city1140->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1140->setName('Кушугум');
//		$manager->persist($city1140); 
//
//		$city1141= new City();
//		$city1141->setId(1141);
//		$city1141->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1141->setName('Куяновка');
//		$manager->persist($city1141); 
//
//		$city1142= new City();
//		$city1142->setId(1142);
//		$city1142->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1142->setName('Ладан');
//		$manager->persist($city1142); 
//
//		$city1143= new City();
//		$city1143->setId(1143);
//		$city1143->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1143->setName('Ладинка');
//		$manager->persist($city1143); 
//
//		$city1144= new City();
//		$city1144->setId(1144);
//		$city1144->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1144->setName('Ладыжин');
//		$manager->persist($city1144); 
//
//		$city1145= new City();
//		$city1145->setId(1145);
//		$city1145->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1145->setName('Ладыжинка');
//		$manager->persist($city1145); 
//
//		$city1146= new City();
//		$city1146->setId(1146);
//		$city1146->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1146->setName('Лазорки');
//		$manager->persist($city1146); 
//
//		$city1147= new City();
//		$city1147->setId(1147);
//		$city1147->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1147->setName('Лазурное');
//		$manager->persist($city1147); 
//
//		$city1148= new City();
//		$city1148->setId(1148);
//		$city1148->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1148->setName('Лазы');
//		$manager->persist($city1148); 
//
//		$city1149= new City();
//		$city1149->setId(1149);
//		$city1149->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1149->setName('Ланна');
//		$manager->persist($city1149); 
//
//		$city1150= new City();
//		$city1150->setId(1150);
//		$city1150->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1150->setName('Ланна.');
//		$manager->persist($city1150); 
//
//		$city1151= new City();
//		$city1151->setId(1151);
//		$city1151->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1151->setName('Лановцы');
//		$manager->persist($city1151); 
//
//		$city1152= new City();
//		$city1152->setId(1152);
//		$city1152->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1152->setName('Ланчин');
//		$manager->persist($city1152); 
//
//		$city1153= new City();
//		$city1153->setId(1153);
//		$city1153->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1153->setName('Лапаевка');
//		$manager->persist($city1153); 
//
//		$city1154= new City();
//		$city1154->setId(1154);
//		$city1154->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1154->setName('Ларжанка');
//		$manager->persist($city1154); 
//
//		$city1155= new City();
//		$city1155->setId(1155);
//		$city1155->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1155->setName('Лебедевка');
//		$manager->persist($city1155); 
//
//		$city1156= new City();
//		$city1156->setId(1156);
//		$city1156->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1156->setName('Лебедин');
//		$manager->persist($city1156); 
//
//		$city1157= new City();
//		$city1157->setId(1157);
//		$city1157->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1157->setName('Лебяжье');
//		$manager->persist($city1157); 
//
//		$city1158= new City();
//		$city1158->setId(1158);
//		$city1158->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1158->setName('Левинцы');
//		$manager->persist($city1158); 
//
//		$city1159= new City();
//		$city1159->setId(1159);
//		$city1159->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1159->setName('Лекаревка');
//		$manager->persist($city1159); 
//
//		$city1160= new City();
//		$city1160->setId(1160);
//		$city1160->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1160->setName('Лелюховка');
//		$manager->persist($city1160); 
//
//		$city1161= new City();
//		$city1161->setId(1161);
//		$city1161->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1161->setName('Ленино');
//		$manager->persist($city1161); 
//
//		$city1162= new City();
//		$city1162->setId(1162);
//		$city1162->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1162->setName('Ленковцы');
//		$manager->persist($city1162); 
//
//		$city1163= new City();
//		$city1163->setId(1163);
//		$city1163->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1163->setName('Лесная дача');
//		$manager->persist($city1163); 
//
//		$city1164= new City();
//		$city1164->setId(1164);
//		$city1164->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1164->setName('Лесовые гриневцы');
//		$manager->persist($city1164); 
//
//		$city1165= new City();
//		$city1165->setId(1165);
//		$city1165->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1165->setName('Леськи');
//		$manager->persist($city1165); 
//
//		$city1166= new City();
//		$city1166->setId(1166);
//		$city1166->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1166->setName('Летичев');
//		$manager->persist($city1166); 
//
//		$city1167= new City();
//		$city1167->setId(1167);
//		$city1167->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1167->setName('Летки');
//		$manager->persist($city1167); 
//
//		$city1168= new City();
//		$city1168->setId(1168);
//		$city1168->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1168->setName('Лешня');
//		$manager->persist($city1168); 
//
//		$city1169= new City();
//		$city1169->setId(1169);
//		$city1169->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1169->setName('Ливадия');
//		$manager->persist($city1169); 
//
//		$city1170= new City();
//		$city1170->setId(1170);
//		$city1170->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1170->setName('Лиман');
//		$manager->persist($city1170); 
//
//		$city1171= new City();
//		$city1171->setId(1171);
//		$city1171->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1171->setName('Лиманское');
//		$manager->persist($city1171); 
//
//		$city1172= new City();
//		$city1172->setId(1172);
//		$city1172->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1172->setName('Лиманы');
//		$manager->persist($city1172); 
//
//		$city1173= new City();
//		$city1173->setId(1173);
//		$city1173->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1173->setName('Линовица');
//		$manager->persist($city1173); 
//
//		$city1174= new City();
//		$city1174->setId(1174);
//		$city1174->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1174->setName('Линцы');
//		$manager->persist($city1174); 
//
//		$city1175= new City();
//		$city1175->setId(1175);
//		$city1175->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1175->setName('Липины');
//		$manager->persist($city1175); 
//
//		$city1176= new City();
//		$city1176->setId(1176);
//		$city1176->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1176->setName('Липники');
//		$manager->persist($city1176); 
//
//		$city1177= new City();
//		$city1177->setId(1177);
//		$city1177->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1177->setName('Липняжка');
//		$manager->persist($city1177); 
//
//		$city1178= new City();
//		$city1178->setId(1178);
//		$city1178->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1178->setName('Липовая Долина');
//		$manager->persist($city1178); 
//
//		$city1179= new City();
//		$city1179->setId(1179);
//		$city1179->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1179->setName('Липовец');
//		$manager->persist($city1179); 
//
//		$city1180= new City();
//		$city1180->setId(1180);
//		$city1180->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1180->setName('Липовец');
//		$manager->persist($city1180); 
//
//		$city1181= new City();
//		$city1181->setId(1181);
//		$city1181->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1181->setName('Липовка');
//		$manager->persist($city1181); 
//
//		$city1182= new City();
//		$city1182->setId(1182);
//		$city1182->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1182->setName('Липцы');
//		$manager->persist($city1182); 
//
//		$city1183= new City();
//		$city1183->setId(1183);
//		$city1183->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1183->setName('Лисец');
//		$manager->persist($city1183); 
//
//		$city1184= new City();
//		$city1184->setId(1184);
//		$city1184->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1184->setName('Лисиничи');
//		$manager->persist($city1184); 
//
//		$city1185= new City();
//		$city1185->setId(1185);
//		$city1185->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1185->setName('Лисичанск');
//		$manager->persist($city1185); 
//
//		$city1186= new City();
//		$city1186->setId(1186);
//		$city1186->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1186->setName('Лисичево');
//		$manager->persist($city1186); 
//
//		$city1187= new City();
//		$city1187->setId(1187);
//		$city1187->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1187->setName('Литин');
//		$manager->persist($city1187); 
//
//		$city1188= new City();
//		$city1188->setId(1188);
//		$city1188->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1188->setName('Лоза');
//		$manager->persist($city1188); 
//
//		$city1189= new City();
//		$city1189->setId(1189);
//		$city1189->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1189->setName('Лозоватка');
//		$manager->persist($city1189); 
//
//		$city1190= new City();
//		$city1190->setId(1190);
//		$city1190->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1190->setName('Лозовая');
//		$manager->persist($city1190); 
//
//		$city1191= new City();
//		$city1191->setId(1191);
//		$city1191->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1191->setName('Лозовое');
//		$manager->persist($city1191); 
//
//		$city1192= new City();
//		$city1192->setId(1192);
//		$city1192->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1192->setName('Лозовский');
//		$manager->persist($city1192); 
//
//		$city1193= new City();
//		$city1193->setId(1193);
//		$city1193->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1193->setName('Локачи');
//		$manager->persist($city1193); 
//
//		$city1194= new City();
//		$city1194->setId(1194);
//		$city1194->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1194->setName('Лолин');
//		$manager->persist($city1194); 
//
//		$city1195= new City();
//		$city1195->setId(1195);
//		$city1195->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1195->setName('Лопатин');
//		$manager->persist($city1195); 
//
//		$city1196= new City();
//		$city1196->setId(1196);
//		$city1196->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1196->setName('Лопушня');
//		$manager->persist($city1196); 
//
//		$city1197= new City();
//		$city1197->setId(1197);
//		$city1197->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1197->setName('Лосиновка');
//		$manager->persist($city1197); 
//
//		$city1198= new City();
//		$city1198->setId(1198);
//		$city1198->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1198->setName('Лохвица');
//		$manager->persist($city1198); 
//
//		$city1199= new City();
//		$city1199->setId(1199);
//		$city1199->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1199->setName('Лубны');
//		$manager->persist($city1199); 
//
//		$city1200= new City();
//		$city1200->setId(1200);
//		$city1200->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1200->setName('Луганск');
//		$manager->persist($city1200); 
//
//		$city1201= new City();
//		$city1201->setId(1201);
//		$city1201->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1201->setName('Лугины');
//		$manager->persist($city1201); 
//
//		$city1202= new City();
//		$city1202->setId(1202);
//		$city1202->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1202->setName('Лужаны');
//		$manager->persist($city1202); 
//
//		$city1203= new City();
//		$city1203->setId(1203);
//		$city1203->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1203->setName('Лужин');
//		$manager->persist($city1203); 
//
//		$city1204= new City();
//		$city1204->setId(1204);
//		$city1204->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1204->setName('Лука');
//		$manager->persist($city1204); 
//
//		$city1205= new City();
//		$city1205->setId(1205);
//		$city1205->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1205->setName('Лука- мелешковская');
//		$manager->persist($city1205); 
//
//		$city1206= new City();
//		$city1206->setId(1206);
//		$city1206->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1206->setName('Лукашево');
//		$manager->persist($city1206); 
//
//		$city1207= new City();
//		$city1207->setId(1207);
//		$city1207->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1207->setName('Луки');
//		$manager->persist($city1207); 
//
//		$city1208= new City();
//		$city1208->setId(1208);
//		$city1208->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1208->setName('Луков');
//		$manager->persist($city1208); 
//
//		$city1209= new City();
//		$city1209->setId(1209);
//		$city1209->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1209->setName('Лукьяновка');
//		$manager->persist($city1209); 
//
//		$city1210= new City();
//		$city1210->setId(1210);
//		$city1210->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1210->setName('Луначарское');
//		$manager->persist($city1210); 
//
//		$city1211= new City();
//		$city1211->setId(1211);
//		$city1211->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1211->setName('Лутовиновка');
//		$manager->persist($city1211); 
//
//		$city1212= new City();
//		$city1212->setId(1212);
//		$city1212->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1212->setName('Лутугино');
//		$manager->persist($city1212); 
//
//		$city1213= new City();
//		$city1213->setId(1213);
//		$city1213->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1213->setName('Луцк');
//		$manager->persist($city1213); 
//
//		$city1214= new City();
//		$city1214->setId(1214);
//		$city1214->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1214->setName('Луч');
//		$manager->persist($city1214); 
//
//		$city1215= new City();
//		$city1215->setId(1215);
//		$city1215->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1215->setName('Лысянка');
//		$manager->persist($city1215); 
//
//		$city1216= new City();
//		$city1216->setId(1216);
//		$city1216->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1216->setName('Лыще');
//		$manager->persist($city1216); 
//
//		$city1217= new City();
//		$city1217->setId(1217);
//		$city1217->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1217->setName('Львов');
//		$manager->persist($city1217); 
//
//		$city1218= new City();
//		$city1218->setId(1218);
//		$city1218->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1218->setName('Любар');
//		$manager->persist($city1218); 
//
//		$city1219= new City();
//		$city1219->setId(1219);
//		$city1219->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1219->setName('Любашевка');
//		$manager->persist($city1219); 
//
//		$city1220= new City();
//		$city1220->setId(1220);
//		$city1220->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1220->setName('Любеч');
//		$manager->persist($city1220); 
//
//		$city1221= new City();
//		$city1221->setId(1221);
//		$city1221->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1221->setName('Любешов');
//		$manager->persist($city1221); 
//
//		$city1222= new City();
//		$city1222->setId(1222);
//		$city1222->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1222->setName('Любимовка');
//		$manager->persist($city1222); 
//
//		$city1223= new City();
//		$city1223->setId(1223);
//		$city1223->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1223->setName('Любинцы');
//		$manager->persist($city1223); 
//
//		$city1224= new City();
//		$city1224->setId(1224);
//		$city1224->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1224->setName('Любитов');
//		$manager->persist($city1224); 
//
//		$city1225= new City();
//		$city1225->setId(1225);
//		$city1225->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1225->setName('Люблинец');
//		$manager->persist($city1225); 
//
//		$city1226= new City();
//		$city1226->setId(1226);
//		$city1226->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1226->setName('Любомль');
//		$manager->persist($city1226); 
//
//		$city1227= new City();
//		$city1227->setId(1227);
//		$city1227->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1227->setName('Люботин');
//		$manager->persist($city1227); 
//
//		$city1228= new City();
//		$city1228->setId(1228);
//		$city1228->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1228->setName('Любша');
//		$manager->persist($city1228); 
//
//		$city1229= new City();
//		$city1229->setId(1229);
//		$city1229->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1229->setName('Люцерна');
//		$manager->persist($city1229); 
//
//		$city1230= new City();
//		$city1230->setId(1230);
//		$city1230->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1230->setName('Мавковичи');
//		$manager->persist($city1230); 
//
//		$city1231= new City();
//		$city1231->setId(1231);
//		$city1231->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1231->setName('Магдалиновка');
//		$manager->persist($city1231); 
//
//		$city1232= new City();
//		$city1232->setId(1232);
//		$city1232->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1232->setName('Мазанка');
//		$manager->persist($city1232); 
//
//		$city1233= new City();
//		$city1233->setId(1233);
//		$city1233->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1233->setName('Майдан');
//		$manager->persist($city1233); 
//
//		$city1234= new City();
//		$city1234->setId(1234);
//		$city1234->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1234->setName('Майдан');
//		$manager->persist($city1234); 
//
//		$city1235= new City();
//		$city1235->setId(1235);
//		$city1235->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1235->setName('Майданец');
//		$manager->persist($city1235); 
//
//		$city1236= new City();
//		$city1236->setId(1236);
//		$city1236->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1236->setName('Майское');
//		$manager->persist($city1236); 
//
//		$city1237= new City();
//		$city1237->setId(1237);
//		$city1237->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1237->setName('Макаров');
//		$manager->persist($city1237); 
//
//		$city1238= new City();
//		$city1238->setId(1238);
//		$city1238->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1238->setName('Макеевка');
//		$manager->persist($city1238); 
//
//		$city1239= new City();
//		$city1239->setId(1239);
//		$city1239->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1239->setName('Маков');
//		$manager->persist($city1239); 
//
//		$city1240= new City();
//		$city1240->setId(1240);
//		$city1240->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1240->setName('Макошино');
//		$manager->persist($city1240); 
//
//		$city1241= new City();
//		$city1241->setId(1241);
//		$city1241->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1241->setName('Малая Виска');
//		$manager->persist($city1241); 
//
//		$city1242= new City();
//		$city1242->setId(1242);
//		$city1242->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1242->setName('Малая Даниловка');
//		$manager->persist($city1242); 
//
//		$city1243= new City();
//		$city1243->setId(1243);
//		$city1243->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1243->setName('Малая копаня');
//		$manager->persist($city1243); 
//
//		$city1244= new City();
//		$city1244->setId(1244);
//		$city1244->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1244->setName('Малая павловка');
//		$manager->persist($city1244); 
//
//		$city1245= new City();
//		$city1245->setId(1245);
//		$city1245->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1245->setName('Малая рогозянка');
//		$manager->persist($city1245); 
//
//		$city1246= new City();
//		$city1246->setId(1246);
//		$city1246->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1246->setName('Малая Снитынка');
//		$manager->persist($city1246); 
//
//		$city1247= new City();
//		$city1247->setId(1247);
//		$city1247->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1247->setName('Малая Супоевка');
//		$manager->persist($city1247); 
//
//		$city1248= new City();
//		$city1248->setId(1248);
//		$city1248->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1248->setName('Малая Токаровка');
//		$manager->persist($city1248); 
//
//		$city1249= new City();
//		$city1249->setId(1249);
//		$city1249->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1249->setName('Малая токмачка');
//		$manager->persist($city1249); 
//
//		$city1250= new City();
//		$city1250->setId(1250);
//		$city1250->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1250->setName('Малая турья');
//		$manager->persist($city1250); 
//
//		$city1251= new City();
//		$city1251->setId(1251);
//		$city1251->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1251->setName('Малехов');
//		$manager->persist($city1251); 
//
//		$city1252= new City();
//		$city1252->setId(1252);
//		$city1252->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1252->setName('Малин');
//		$manager->persist($city1252); 
//
//		$city1253= new City();
//		$city1253->setId(1253);
//		$city1253->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1253->setName('Малиничи');
//		$manager->persist($city1253); 
//
//		$city1254= new City();
//		$city1254->setId(1254);
//		$city1254->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1254->setName('Малиновка');
//		$manager->persist($city1254); 
//
//		$city1255= new City();
//		$city1255->setId(1255);
//		$city1255->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1255->setName('Малиновка');
//		$manager->persist($city1255); 
//
//		$city1256= new City();
//		$city1256->setId(1256);
//		$city1256->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1256->setName('Малодолинское');
//		$manager->persist($city1256); 
//
//		$city1257= new City();
//		$city1257->setId(1257);
//		$city1257->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1257->setName('Малокатериновка');
//		$manager->persist($city1257); 
//
//		$city1258= new City();
//		$city1258->setId(1258);
//		$city1258->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1258->setName('Малокаховка');
//		$manager->persist($city1258); 
//
//		$city1259= new City();
//		$city1259->setId(1259);
//		$city1259->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1259->setName('Малореченское');
//		$manager->persist($city1259); 
//
//		$city1260= new City();
//		$city1260->setId(1260);
//		$city1260->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1260->setName('Малые Бережцы');
//		$manager->persist($city1260); 
//
//		$city1261= new City();
//		$city1261->setId(1261);
//		$city1261->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1261->setName('Малые Подлески');
//		$manager->persist($city1261); 
//
//		$city1262= new City();
//		$city1262->setId(1262);
//		$city1262->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1262->setName('Малый березный');
//		$manager->persist($city1262); 
//
//		$city1263= new City();
//		$city1263->setId(1263);
//		$city1263->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1263->setName('Малый бузуков');
//		$manager->persist($city1263); 
//
//		$city1264= new City();
//		$city1264->setId(1264);
//		$city1264->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1264->setName('Малый маяк');
//		$manager->persist($city1264); 
//
//		$city1265= new City();
//		$city1265->setId(1265);
//		$city1265->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1265->setName('Малый мытник');
//		$manager->persist($city1265); 
//
//		$city1266= new City();
//		$city1266->setId(1266);
//		$city1266->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1266->setName('Малый шпаков');
//		$manager->persist($city1266); 
//
//		$city1267= new City();
//		$city1267->setId(1267);
//		$city1267->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1267->setName('Мальчицы');
//		$manager->persist($city1267); 
//
//		$city1268= new City();
//		$city1268->setId(1268);
//		$city1268->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1268->setName('Мамаевцы');
//		$manager->persist($city1268); 
//
//		$city1269= new City();
//		$city1269->setId(1269);
//		$city1269->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1269->setName('Мамалыга');
//		$manager->persist($city1269); 
//
//		$city1270= new City();
//		$city1270->setId(1270);
//		$city1270->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1270->setName('Мамрин');
//		$manager->persist($city1270); 
//
//		$city1271= new City();
//		$city1271->setId(1271);
//		$city1271->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1271->setName('Мангуш');
//		$manager->persist($city1271); 
//
//		$city1272= new City();
//		$city1272->setId(1272);
//		$city1272->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1272->setName('Маневичи');
//		$manager->persist($city1272); 
//
//		$city1273= new City();
//		$city1273->setId(1273);
//		$city1273->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1273->setName('Манченки');
//		$manager->persist($city1273); 
//
//		$city1274= new City();
//		$city1274->setId(1274);
//		$city1274->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1274->setName('Маньковка');
//		$manager->persist($city1274); 
//
//		$city1275= new City();
//		$city1275->setId(1275);
//		$city1275->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1275->setName('Марганец');
//		$manager->persist($city1275); 
//
//		$city1276= new City();
//		$city1276->setId(1276);
//		$city1276->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1276->setName('Мариничи');
//		$manager->persist($city1276); 
//
//		$city1277= new City();
//		$city1277->setId(1277);
//		$city1277->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1277->setName('Мариуполь');
//		$manager->persist($city1277); 
//
//		$city1278= new City();
//		$city1278->setId(1278);
//		$city1278->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1278->setName('Марковка');
//		$manager->persist($city1278); 
//
//		$city1279= new City();
//		$city1279->setId(1279);
//		$city1279->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1279->setName('Марково');
//		$manager->persist($city1279); 
//
//		$city1280= new City();
//		$city1280->setId(1280);
//		$city1280->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1280->setName('Мартово');
//		$manager->persist($city1280); 
//
//		$city1281= new City();
//		$city1281->setId(1281);
//		$city1281->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1281->setName('Мартыновка');
//		$manager->persist($city1281); 
//
//		$city1282= new City();
//		$city1282->setId(1282);
//		$city1282->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1282->setName('Марфовка');
//		$manager->persist($city1282); 
//
//		$city1283= new City();
//		$city1283->setId(1283);
//		$city1283->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1283->setName('Мархаловка');
//		$manager->persist($city1283); 
//
//		$city1284= new City();
//		$city1284->setId(1284);
//		$city1284->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1284->setName('Марьевка');
//		$manager->persist($city1284); 
//
//		$city1285= new City();
//		$city1285->setId(1285);
//		$city1285->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1285->setName('Марьинка');
//		$manager->persist($city1285); 
//
//		$city1286= new City();
//		$city1286->setId(1286);
//		$city1286->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1286->setName('Марьяновка');
//		$manager->persist($city1286); 
//
//		$city1287= new City();
//		$city1287->setId(1287);
//		$city1287->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1287->setName('Марьяновка');
//		$manager->persist($city1287); 
//
//		$city1288= new City();
//		$city1288->setId(1288);
//		$city1288->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1288->setName('Марьяновка');
//		$manager->persist($city1288); 
//
//		$city1289= new City();
//		$city1289->setId(1289);
//		$city1289->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1289->setName('Марьяновка');
//		$manager->persist($city1289); 
//
//		$city1290= new City();
//		$city1290->setId(1290);
//		$city1290->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1290->setName('Масевцы');
//		$manager->persist($city1290); 
//
//		$city1291= new City();
//		$city1291->setId(1291);
//		$city1291->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1291->setName('Массандра');
//		$manager->persist($city1291); 
//
//		$city1292= new City();
//		$city1292->setId(1292);
//		$city1292->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1292->setName('Матиясово');
//		$manager->persist($city1292); 
//
//		$city1293= new City();
//		$city1293->setId(1293);
//		$city1293->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1293->setName('Матусив');
//		$manager->persist($city1293); 
//
//		$city1294= new City();
//		$city1294->setId(1294);
//		$city1294->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1294->setName('Махаринцы');
//		$manager->persist($city1294); 
//
//		$city1295= new City();
//		$city1295->setId(1295);
//		$city1295->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1295->setName('Мацьковцы');
//		$manager->persist($city1295); 
//
//		$city1296= new City();
//		$city1296->setId(1296);
//		$city1296->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1296->setName('Машевка');
//		$manager->persist($city1296); 
//
//		$city1297= new City();
//		$city1297->setId(1297);
//		$city1297->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1297->setName('Маяки');
//		$manager->persist($city1297); 
//
//		$city1298= new City();
//		$city1298->setId(1298);
//		$city1298->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1298->setName('Маяки');
//		$manager->persist($city1298); 
//
//		$city1299= new City();
//		$city1299->setId(1299);
//		$city1299->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1299->setName('Межводное');
//		$manager->persist($city1299); 
//
//		$city1300= new City();
//		$city1300->setId(1300);
//		$city1300->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1300->setName('Межгорье');
//		$manager->persist($city1300); 
//
//		$city1301= new City();
//		$city1301->setId(1301);
//		$city1301->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1301->setName('Межевая');
//		$manager->persist($city1301); 
//
//		$city1302= new City();
//		$city1302->setId(1302);
//		$city1302->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1302->setName('Межирич');
//		$manager->persist($city1302); 
//
//		$city1303= new City();
//		$city1303->setId(1303);
//		$city1303->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1303->setName('Межирич');
//		$manager->persist($city1303); 
//
//		$city1304= new City();
//		$city1304->setId(1304);
//		$city1304->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1304->setName('Межирич');
//		$manager->persist($city1304); 
//
//		$city1305= new City();
//		$city1305->setId(1305);
//		$city1305->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1305->setName('Межиричка');
//		$manager->persist($city1305); 
//
//		$city1306= new City();
//		$city1306->setId(1306);
//		$city1306->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1306->setName('Мезеновка');
//		$manager->persist($city1306); 
//
//		$city1307= new City();
//		$city1307->setId(1307);
//		$city1307->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1307->setName('Мелиоративное');
//		$manager->persist($city1307); 
//
//		$city1308= new City();
//		$city1308->setId(1308);
//		$city1308->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1308->setName('Мелитополь');
//		$manager->persist($city1308); 
//
//		$city1309= new City();
//		$city1309->setId(1309);
//		$city1309->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1309->setName('Меловое');
//		$manager->persist($city1309); 
//
//		$city1310= new City();
//		$city1310->setId(1310);
//		$city1310->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1310->setName('Мельница-Подольская');
//		$manager->persist($city1310); 
//
//		$city1311= new City();
//		$city1311->setId(1311);
//		$city1311->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1311->setName('Мена');
//		$manager->persist($city1311); 
//
//		$city1312= new City();
//		$city1312->setId(1312);
//		$city1312->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1312->setName('Менжинское');
//		$manager->persist($city1312); 
//
//		$city1313= new City();
//		$city1313->setId(1313);
//		$city1313->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1313->setName('Мервичи');
//		$manager->persist($city1313); 
//
//		$city1314= new City();
//		$city1314->setId(1314);
//		$city1314->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1314->setName('Мерефа');
//		$manager->persist($city1314); 
//
//		$city1315= new City();
//		$city1315->setId(1315);
//		$city1315->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1315->setName('Мешково-погорелово');
//		$manager->persist($city1315); 
//
//		$city1316= new City();
//		$city1316->setId(1316);
//		$city1316->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1316->setName('Мизикевича');
//		$manager->persist($city1316); 
//
//		$city1317= new City();
//		$city1317->setId(1317);
//		$city1317->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1317->setName('Мизоч');
//		$manager->persist($city1317); 
//
//		$city1318= new City();
//		$city1318->setId(1318);
//		$city1318->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1318->setName('Миклашев');
//		$manager->persist($city1318); 
//
//		$city1319= new City();
//		$city1319->setId(1319);
//		$city1319->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1319->setName('Микулинцы');
//		$manager->persist($city1319); 
//
//		$city1320= new City();
//		$city1320->setId(1320);
//		$city1320->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1320->setName('Микуличин');
//		$manager->persist($city1320); 
//
//		$city1321= new City();
//		$city1321->setId(1321);
//		$city1321->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1321->setName('Минай');
//		$manager->persist($city1321); 
//
//		$city1322= new City();
//		$city1322->setId(1322);
//		$city1322->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1322->setName('Миргород');
//		$manager->persist($city1322); 
//
//		$city1323= new City();
//		$city1323->setId(1323);
//		$city1323->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1323->setName('Мирное');
//		$manager->persist($city1323); 
//
//		$city1324= new City();
//		$city1324->setId(1324);
//		$city1324->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1324->setName('Мирное');
//		$manager->persist($city1324); 
//
//		$city1325= new City();
//		$city1325->setId(1325);
//		$city1325->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1325->setName('Мирное');
//		$manager->persist($city1325); 
//
//		$city1326= new City();
//		$city1326->setId(1326);
//		$city1326->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1326->setName('Мирное');
//		$manager->persist($city1326); 
//
//		$city1327= new City();
//		$city1327->setId(1327);
//		$city1327->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1327->setName('Мирное');
//		$manager->persist($city1327); 
//
//		$city1328= new City();
//		$city1328->setId(1328);
//		$city1328->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1328->setName('Мирный');
//		$manager->persist($city1328); 
//
//		$city1329= new City();
//		$city1329->setId(1329);
//		$city1329->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1329->setName('Мировое');
//		$manager->persist($city1329); 
//
//		$city1330= new City();
//		$city1330->setId(1330);
//		$city1330->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1330->setName('Миролюбовка');
//		$manager->persist($city1330); 
//
//		$city1331= new City();
//		$city1331->setId(1331);
//		$city1331->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1331->setName('Мироновский');
//		$manager->persist($city1331); 
//
//		$city1332= new City();
//		$city1332->setId(1332);
//		$city1332->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1332->setName('Мироновка');
//		$manager->persist($city1332); 
//
//		$city1333= new City();
//		$city1333->setId(1333);
//		$city1333->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1333->setName('Мирополь');
//		$manager->persist($city1333); 
//
//		$city1334= new City();
//		$city1334->setId(1334);
//		$city1334->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1334->setName('Миусинск');
//		$manager->persist($city1334); 
//
//		$city1335= new City();
//		$city1335->setId(1335);
//		$city1335->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1335->setName('Михайловка');
//		$manager->persist($city1335); 
//
//		$city1336= new City();
//		$city1336->setId(1336);
//		$city1336->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1336->setName('Михайловка');
//		$manager->persist($city1336); 
//
//		$city1337= new City();
//		$city1337->setId(1337);
//		$city1337->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1337->setName('Михайловка');
//		$manager->persist($city1337); 
//
//		$city1338= new City();
//		$city1338->setId(1338);
//		$city1338->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1338->setName('Михайловка');
//		$manager->persist($city1338); 
//
//		$city1339= new City();
//		$city1339->setId(1339);
//		$city1339->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1339->setName('Михайловка');
//		$manager->persist($city1339); 
//
//		$city1340= new City();
//		$city1340->setId(1340);
//		$city1340->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1340->setName('Михайловка');
//		$manager->persist($city1340); 
//
//		$city1341= new City();
//		$city1341->setId(1341);
//		$city1341->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1341->setName('Михайловка');
//		$manager->persist($city1341); 
//
//		$city1342= new City();
//		$city1342->setId(1342);
//		$city1342->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1342->setName('Михайловское');
//		$manager->persist($city1342); 
//
//		$city1343= new City();
//		$city1343->setId(1343);
//		$city1343->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1343->setName('Михайлючка');
//		$manager->persist($city1343); 
//
//		$city1344= new City();
//		$city1344->setId(1344);
//		$city1344->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1344->setName('Михальча');
//		$manager->persist($city1344); 
//
//		$city1345= new City();
//		$city1345->setId(1345);
//		$city1345->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1345->setName('Млиев');
//		$manager->persist($city1345); 
//
//		$city1346= new City();
//		$city1346->setId(1346);
//		$city1346->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1346->setName('Млинов');
//		$manager->persist($city1346); 
//
//		$city1347= new City();
//		$city1347->setId(1347);
//		$city1347->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1347->setName('Млиновцы');
//		$manager->persist($city1347); 
//
//		$city1348= new City();
//		$city1348->setId(1348);
//		$city1348->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1348->setName('Млыны');
//		$manager->persist($city1348); 
//
//		$city1349= new City();
//		$city1349->setId(1349);
//		$city1349->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1349->setName('Могилев-Подольский');
//		$manager->persist($city1349); 
//
//		$city1350= new City();
//		$city1350->setId(1350);
//		$city1350->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1350->setName('Могилевка');
//		$manager->persist($city1350); 
//
//		$city1351= new City();
//		$city1351->setId(1351);
//		$city1351->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1351->setName('Могиляны');
//		$manager->persist($city1351); 
//
//		$city1352= new City();
//		$city1352->setId(1352);
//		$city1352->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1352->setName('Моевка');
//		$manager->persist($city1352); 
//
//		$city1353= new City();
//		$city1353->setId(1353);
//		$city1353->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1353->setName('Моквин');
//		$manager->persist($city1353); 
//
//		$city1354= new City();
//		$city1354->setId(1354);
//		$city1354->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1354->setName('Молница');
//		$manager->persist($city1354); 
//
//		$city1355= new City();
//		$city1355->setId(1355);
//		$city1355->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1355->setName('Молодежное');
//		$manager->persist($city1355); 
//
//		$city1356= new City();
//		$city1356->setId(1356);
//		$city1356->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1356->setName('Молодежное');
//		$manager->persist($city1356); 
//
//		$city1357= new City();
//		$city1357->setId(1357);
//		$city1357->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1357->setName('Молодежное');
//		$manager->persist($city1357); 
//
//		$city1358= new City();
//		$city1358->setId(1358);
//		$city1358->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1358->setName('Молодежное');
//		$manager->persist($city1358); 
//
//		$city1359= new City();
//		$city1359->setId(1359);
//		$city1359->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1359->setName('Молодецкое');
//		$manager->persist($city1359); 
//
//		$city1360= new City();
//		$city1360->setId(1360);
//		$city1360->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1360->setName('Молодогвардейск');
//		$manager->persist($city1360); 
//
//		$city1361= new City();
//		$city1361->setId(1361);
//		$city1361->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1361->setName('Молочанск');
//		$manager->persist($city1361); 
//
//		$city1362= new City();
//		$city1362->setId(1362);
//		$city1362->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1362->setName('Монастыриска');
//		$manager->persist($city1362); 
//
//		$city1363= new City();
//		$city1363->setId(1363);
//		$city1363->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1363->setName('Монастырище');
//		$manager->persist($city1363); 
//
//		$city1364= new City();
//		$city1364->setId(1364);
//		$city1364->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1364->setName('Моршин');
//		$manager->persist($city1364); 
//
//		$city1365= new City();
//		$city1365->setId(1365);
//		$city1365->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1365->setName('Моспино');
//		$manager->persist($city1365); 
//
//		$city1366= new City();
//		$city1366->setId(1366);
//		$city1366->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1366->setName('Мостиска');
//		$manager->persist($city1366); 
//
//		$city1367= new City();
//		$city1367->setId(1367);
//		$city1367->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1367->setName('Мостовое');
//		$manager->persist($city1367); 
//
//		$city1368= new City();
//		$city1368->setId(1368);
//		$city1368->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1368->setName('Мотыжин');
//		$manager->persist($city1368); 
//
//		$city1369= new City();
//		$city1369->setId(1369);
//		$city1369->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1369->setName('Мраморное');
//		$manager->persist($city1369); 
//
//		$city1370= new City();
//		$city1370->setId(1370);
//		$city1370->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1370->setName('Мужиево');
//		$manager->persist($city1370); 
//
//		$city1371= new City();
//		$city1371->setId(1371);
//		$city1371->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1371->setName('Музычи');
//		$manager->persist($city1371); 
//
//		$city1372= new City();
//		$city1372->setId(1372);
//		$city1372->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1372->setName('Мукачево');
//		$manager->persist($city1372); 
//
//		$city1373= new City();
//		$city1373->setId(1373);
//		$city1373->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1373->setName('Муратово');
//		$manager->persist($city1373); 
//
//		$city1374= new City();
//		$city1374->setId(1374);
//		$city1374->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1374->setName('Мурафа');
//		$manager->persist($city1374); 
//
//		$city1375= new City();
//		$city1375->setId(1375);
//		$city1375->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1375->setName('Мурованое');
//		$manager->persist($city1375); 
//
//		$city1376= new City();
//		$city1376->setId(1376);
//		$city1376->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1376->setName('Мурованые Куриловцы');
//		$manager->persist($city1376); 
//
//		$city1377= new City();
//		$city1377->setId(1377);
//		$city1377->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1377->setName('Мусиевка');
//		$manager->persist($city1377); 
//
//		$city1378= new City();
//		$city1378->setId(1378);
//		$city1378->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1378->setName('Мутвица');
//		$manager->persist($city1378); 
//
//		$city1379= new City();
//		$city1379->setId(1379);
//		$city1379->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1379->setName('Мыла');
//		$manager->persist($city1379); 
//
//		$city1380= new City();
//		$city1380->setId(1380);
//		$city1380->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1380->setName('Набутов');
//		$manager->persist($city1380); 
//
//		$city1381= new City();
//		$city1381->setId(1381);
//		$city1381->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1381->setName('Навария');
//		$manager->persist($city1381); 
//
//		$city1382= new City();
//		$city1382->setId(1382);
//		$city1382->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1382->setName('Нагорное');
//		$manager->persist($city1382); 
//
//		$city1383= new City();
//		$city1383->setId(1383);
//		$city1383->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1383->setName('Нагорянка');
//		$manager->persist($city1383); 
//
//		$city1384= new City();
//		$city1384->setId(1384);
//		$city1384->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1384->setName('Надвирна');
//		$manager->persist($city1384); 
//
//		$city1385= new City();
//		$city1385->setId(1385);
//		$city1385->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1385->setName('Надворная');
//		$manager->persist($city1385); 
//
//		$city1386= new City();
//		$city1386->setId(1386);
//		$city1386->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1386->setName('Надеждовка');
//		$manager->persist($city1386); 
//
//		$city1387= new City();
//		$city1387->setId(1387);
//		$city1387->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1387->setName('Надиев');
//		$manager->persist($city1387); 
//
//		$city1388= new City();
//		$city1388->setId(1388);
//		$city1388->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1388->setName('Надречное');
//		$manager->persist($city1388); 
//
//		$city1389= new City();
//		$city1389->setId(1389);
//		$city1389->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1389->setName('Надыбы');
//		$manager->persist($city1389); 
//
//		$city1390= new City();
//		$city1390->setId(1390);
//		$city1390->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1390->setName('Надычи');
//		$manager->persist($city1390); 
//
//		$city1391= new City();
//		$city1391->setId(1391);
//		$city1391->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1391->setName('Наркевичи');
//		$manager->persist($city1391); 
//
//		$city1392= new City();
//		$city1392->setId(1392);
//		$city1392->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1392->setName('Народичи');
//		$manager->persist($city1392); 
//
//		$city1393= new City();
//		$city1393->setId(1393);
//		$city1393->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1393->setName('Наталино');
//		$manager->persist($city1393); 
//
//		$city1394= new City();
//		$city1394->setId(1394);
//		$city1394->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1394->setName('Небелица');
//		$manager->persist($city1394); 
//
//		$city1395= new City();
//		$city1395->setId(1395);
//		$city1395->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1395->setName('Невицкое');
//		$manager->persist($city1395); 
//
//		$city1396= new City();
//		$city1396->setId(1396);
//		$city1396->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1396->setName('Недайвода');
//		$manager->persist($city1396); 
//
//		$city1397= new City();
//		$city1397->setId(1397);
//		$city1397->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1397->setName('Недригайлов');
//		$manager->persist($city1397); 
//
//		$city1398= new City();
//		$city1398->setId(1398);
//		$city1398->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1398->setName('Нежин');
//		$manager->persist($city1398); 
//
//		$city1399= new City();
//		$city1399->setId(1399);
//		$city1399->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1399->setName('Некрасово');
//		$manager->persist($city1399); 
//
//		$city1400= new City();
//		$city1400->setId(1400);
//		$city1400->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1400->setName('Нелиповцы');
//		$manager->persist($city1400); 
//
//		$city1401= new City();
//		$city1401->setId(1401);
//		$city1401->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1401->setName('Немешаево');
//		$manager->persist($city1401); 
//
//		$city1402= new City();
//		$city1402->setId(1402);
//		$city1402->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1402->setName('Немиров');
//		$manager->persist($city1402); 
//
//		$city1403= new City();
//		$city1403->setId(1403);
//		$city1403->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1403->setName('Немиров');
//		$manager->persist($city1403); 
//
//		$city1404= new City();
//		$city1404->setId(1404);
//		$city1404->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1404->setName('Неопалимовка');
//		$manager->persist($city1404); 
//
//		$city1405= new City();
//		$city1405->setId(1405);
//		$city1405->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1405->setName('Неполоковцы');
//		$manager->persist($city1405); 
//
//		$city1406= new City();
//		$city1406->setId(1406);
//		$city1406->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1406->setName('Нересница');
//		$manager->persist($city1406); 
//
//		$city1407= new City();
//		$city1407->setId(1407);
//		$city1407->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1407->setName('Нерубайское');
//		$manager->persist($city1407); 
//
//		$city1408= new City();
//		$city1408->setId(1408);
//		$city1408->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1408->setName('Несвич');
//		$manager->persist($city1408); 
//
//		$city1409= new City();
//		$city1409->setId(1409);
//		$city1409->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1409->setName('Нестерварка');
//		$manager->persist($city1409); 
//
//		$city1410= new City();
//		$city1410->setId(1410);
//		$city1410->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1410->setName('Нестеривци');
//		$manager->persist($city1410); 
//
//		$city1411= new City();
//		$city1411->setId(1411);
//		$city1411->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1411->setName('Нетешин');
//		$manager->persist($city1411); 
//
//		$city1412= new City();
//		$city1412->setId(1412);
//		$city1412->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1412->setName('Нехвороща');
//		$manager->persist($city1412); 
//
//		$city1413= new City();
//		$city1413->setId(1413);
//		$city1413->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1413->setName('Нещеретово');
//		$manager->persist($city1413); 
//
//		$city1414= new City();
//		$city1414->setId(1414);
//		$city1414->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1414->setName('Нива трудовая');
//		$manager->persist($city1414); 
//
//		$city1415= new City();
//		$city1415->setId(1415);
//		$city1415->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1415->setName('Нижнегорский');
//		$manager->persist($city1415); 
//
//		$city1416= new City();
//		$city1416->setId(1416);
//		$city1416->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1416->setName('Нижнее селище');
//		$manager->persist($city1416); 
//
//		$city1417= new City();
//		$city1417->setId(1417);
//		$city1417->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1417->setName('Нижние ворота');
//		$manager->persist($city1417); 
//
//		$city1418= new City();
//		$city1418->setId(1418);
//		$city1418->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1418->setName('Нижние Серогозы');
//		$manager->persist($city1418); 
//
//		$city1419= new City();
//		$city1419->setId(1419);
//		$city1419->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1419->setName('Нижний вербиж');
//		$manager->persist($city1419); 
//
//		$city1420= new City();
//		$city1420->setId(1420);
//		$city1420->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1420->setName('Нижний нагольчик');
//		$manager->persist($city1420); 
//
//		$city1421= new City();
//		$city1421->setId(1421);
//		$city1421->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1421->setName('Нижняя яблонька');
//		$manager->persist($city1421); 
//
//		$city1422= new City();
//		$city1422->setId(1422);
//		$city1422->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1422->setName('Низшая дубечня');
//		$manager->persist($city1422); 
//
//		$city1423= new City();
//		$city1423->setId(1423);
//		$city1423->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1423->setName('Низы');
//		$manager->persist($city1423); 
//
//		$city1424= new City();
//		$city1424->setId(1424);
//		$city1424->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1424->setName('Никита');
//		$manager->persist($city1424); 
//
//		$city1425= new City();
//		$city1425->setId(1425);
//		$city1425->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1425->setName('Никитинцы');
//		$manager->persist($city1425); 
//
//		$city1426= new City();
//		$city1426->setId(1426);
//		$city1426->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1426->setName('Николаев(Львов)');
//		$manager->persist($city1426); 
//
//		$city1427= new City();
//		$city1427->setId(1427);
//		$city1427->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1427->setName('Николаев');
//		$manager->persist($city1427); 
//
//		$city1428= new City();
//		$city1428->setId(1428);
//		$city1428->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1428->setName('Николаев');
//		$manager->persist($city1428); 
//
//		$city1429= new City();
//		$city1429->setId(1429);
//		$city1429->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1429->setName('Николаевка');
//		$manager->persist($city1429); 
//
//		$city1430= new City();
//		$city1430->setId(1430);
//		$city1430->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1430->setName('Николаевка');
//		$manager->persist($city1430); 
//
//		$city1431= new City();
//		$city1431->setId(1431);
//		$city1431->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1431->setName('Николаевка (Донецк)');
//		$manager->persist($city1431); 
//
//		$city1432= new City();
//		$city1432->setId(1432);
//		$city1432->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1432->setName('Николаевка (Днепропетровск)');
//		$manager->persist($city1432); 
//
//		$city1433= new City();
//		$city1433->setId(1433);
//		$city1433->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1433->setName('Николаевка');
//		$manager->persist($city1433); 
//
//		$city1434= new City();
//		$city1434->setId(1434);
//		$city1434->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1434->setName('Николаевка');
//		$manager->persist($city1434); 
//
//		$city1435= new City();
//		$city1435->setId(1435);
//		$city1435->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1435->setName('Николаевка');
//		$manager->persist($city1435); 
//
//		$city1436= new City();
//		$city1436->setId(1436);
//		$city1436->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1436->setName('Николаевка');
//		$manager->persist($city1436); 
//
//		$city1437= new City();
//		$city1437->setId(1437);
//		$city1437->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1437->setName('Николаевское');
//		$manager->persist($city1437); 
//
//		$city1438= new City();
//		$city1438->setId(1438);
//		$city1438->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1438->setName('Николайполье');
//		$manager->persist($city1438); 
//
//		$city1439= new City();
//		$city1439->setId(1439);
//		$city1439->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1439->setName('Никополь');
//		$manager->persist($city1439); 
//
//		$city1440= new City();
//		$city1440->setId(1440);
//		$city1440->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1440->setName('Новая Боровая');
//		$manager->persist($city1440); 
//
//		$city1441= new City();
//		$city1441->setId(1441);
//		$city1441->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1441->setName('Новая Водолага');
//		$manager->persist($city1441); 
//
//		$city1442= new City();
//		$city1442->setId(1442);
//		$city1442->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1442->setName('Новая Галещина');
//		$manager->persist($city1442); 
//
//		$city1443= new City();
//		$city1443->setId(1443);
//		$city1443->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1443->setName('Новая дмитровка');
//		$manager->persist($city1443); 
//
//		$city1444= new City();
//		$city1444->setId(1444);
//		$city1444->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1444->setName('Новая долина');
//		$manager->persist($city1444); 
//
//		$city1445= new City();
//		$city1445->setId(1445);
//		$city1445->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1445->setName('Новая дофиновка');
//		$manager->persist($city1445); 
//
//		$city1446= new City();
//		$city1446->setId(1446);
//		$city1446->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1446->setName('Новая збурьевка');
//		$manager->persist($city1446); 
//
//		$city1447= new City();
//		$city1447->setId(1447);
//		$city1447->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1447->setName('Новая Каховка');
//		$manager->persist($city1447); 
//
//		$city1448= new City();
//		$city1448->setId(1448);
//		$city1448->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1448->setName('Новая лешня');
//		$manager->persist($city1448); 
//
//		$city1449= new City();
//		$city1449->setId(1449);
//		$city1449->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1449->setName('Новая Любомирка');
//		$manager->persist($city1449); 
//
//		$city1450= new City();
//		$city1450->setId(1450);
//		$city1450->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1450->setName('Новая маячка');
//		$manager->persist($city1450); 
//
//		$city1451= new City();
//		$city1451->setId(1451);
//		$city1451->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1451->setName('Новая некрасовка');
//		$manager->persist($city1451); 
//
//		$city1452= new City();
//		$city1452->setId(1452);
//		$city1452->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1452->setName('Новая Одесса');
//		$manager->persist($city1452); 
//
//		$city1453= new City();
//		$city1453->setId(1453);
//		$city1453->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1453->setName('Новая прага');
//		$manager->persist($city1453); 
//
//		$city1454= new City();
//		$city1454->setId(1454);
//		$city1454->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1454->setName('Новая русь');
//		$manager->persist($city1454); 
//
//		$city1455= new City();
//		$city1455->setId(1455);
//		$city1455->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1455->setName('Новая Ушица');
//		$manager->persist($city1455); 
//
//		$city1456= new City();
//		$city1456->setId(1456);
//		$city1456->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1456->setName('Новгород-Северский');
//		$manager->persist($city1456); 
//
//		$city1457= new City();
//		$city1457->setId(1457);
//		$city1457->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1457->setName('Новгородка');
//		$manager->persist($city1457); 
//
//		$city1458= new City();
//		$city1458->setId(1458);
//		$city1458->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1458->setName('Новгородское');
//		$manager->persist($city1458); 
//
//		$city1459= new City();
//		$city1459->setId(1459);
//		$city1459->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1459->setName('Новица');
//		$manager->persist($city1459); 
//
//		$city1460= new City();
//		$city1460->setId(1460);
//		$city1460->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1460->setName('Новоаврамовка');
//		$manager->persist($city1460); 
//
//		$city1461= new City();
//		$city1461->setId(1461);
//		$city1461->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1461->setName('Новоазовск');
//		$manager->persist($city1461); 
//
//		$city1462= new City();
//		$city1462->setId(1462);
//		$city1462->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1462->setName('Новоайдар');
//		$manager->persist($city1462); 
//
//		$city1463= new City();
//		$city1463->setId(1463);
//		$city1463->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1463->setName('Новоалександровка');
//		$manager->persist($city1463); 
//
//		$city1464= new City();
//		$city1464->setId(1464);
//		$city1464->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1464->setName('Новоалександровка');
//		$manager->persist($city1464); 
//
//		$city1465= new City();
//		$city1465->setId(1465);
//		$city1465->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1465->setName('Новоалексеевка');
//		$manager->persist($city1465); 
//
//		$city1466= new City();
//		$city1466->setId(1466);
//		$city1466->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1466->setName('Новоамвросиевское');
//		$manager->persist($city1466); 
//
//		$city1467= new City();
//		$city1467->setId(1467);
//		$city1467->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1467->setName('Новоархангельск');
//		$manager->persist($city1467); 
//
//		$city1468= new City();
//		$city1468->setId(1468);
//		$city1468->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1468->setName('Новобогдановка');
//		$manager->persist($city1468); 
//
//		$city1469= new City();
//		$city1469->setId(1469);
//		$city1469->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1469->setName('Новоборисовка');
//		$manager->persist($city1469); 
//
//		$city1470= new City();
//		$city1470->setId(1470);
//		$city1470->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1470->setName('Нововолынск');
//		$manager->persist($city1470); 
//
//		$city1471= new City();
//		$city1471->setId(1471);
//		$city1471->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1471->setName('Нововоронцовка');
//		$manager->persist($city1471); 
//
//		$city1472= new City();
//		$city1472->setId(1472);
//		$city1472->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1472->setName('Новоград-Волынский');
//		$manager->persist($city1472); 
//
//		$city1473= new City();
//		$city1473->setId(1473);
//		$city1473->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1473->setName('Новогригоровка');
//		$manager->persist($city1473); 
//
//		$city1474= new City();
//		$city1474->setId(1474);
//		$city1474->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1474->setName('Новогродовка');
//		$manager->persist($city1474); 
//
//		$city1475= new City();
//		$city1475->setId(1475);
//		$city1475->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1475->setName('Новогуйвинское');
//		$manager->persist($city1475); 
//
//		$city1476= new City();
//		$city1476->setId(1476);
//		$city1476->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1476->setName('Новодарьевка');
//		$manager->persist($city1476); 
//
//		$city1477= new City();
//		$city1477->setId(1477);
//		$city1477->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1477->setName('Новоднестровск');
//		$manager->persist($city1477); 
//
//		$city1478= new City();
//		$city1478->setId(1478);
//		$city1478->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1478->setName('Новодонецкое');
//		$manager->persist($city1478); 
//
//		$city1479= new City();
//		$city1479->setId(1479);
//		$city1479->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1479->setName('Новодружеск');
//		$manager->persist($city1479); 
//
//		$city1480= new City();
//		$city1480->setId(1480);
//		$city1480->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1480->setName('Новое');
//		$manager->persist($city1480); 
//
//		$city1481= new City();
//		$city1481->setId(1481);
//		$city1481->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1481->setName('Новое');
//		$manager->persist($city1481); 
//
//		$city1482= new City();
//		$city1482->setId(1482);
//		$city1482->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1482->setName('Новое давыдково');
//		$manager->persist($city1482); 
//
//		$city1483= new City();
//		$city1483->setId(1483);
//		$city1483->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1483->setName('Новое запорожье');
//		$manager->persist($city1483); 
//
//		$city1484= new City();
//		$city1484->setId(1484);
//		$city1484->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1484->setName('Новое Село');
//		$manager->persist($city1484); 
//
//		$city1485= new City();
//		$city1485->setId(1485);
//		$city1485->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1485->setName('Новозарьевка');
//		$manager->persist($city1485); 
//
//		$city1486= new City();
//		$city1486->setId(1486);
//		$city1486->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1486->setName('Новоивановка');
//		$manager->persist($city1486); 
//
//		$city1487= new City();
//		$city1487->setId(1487);
//		$city1487->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1487->setName('Новолозоватка');
//		$manager->persist($city1487); 
//
//		$city1488= new City();
//		$city1488->setId(1488);
//		$city1488->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1488->setName('Новолюбимовка');
//		$manager->persist($city1488); 
//
//		$city1489= new City();
//		$city1489->setId(1489);
//		$city1489->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1489->setName('Новомалин');
//		$manager->persist($city1489); 
//
//		$city1490= new City();
//		$city1490->setId(1490);
//		$city1490->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1490->setName('Новомиргород');
//		$manager->persist($city1490); 
//
//		$city1491= new City();
//		$city1491->setId(1491);
//		$city1491->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1491->setName('Новомосковск');
//		$manager->persist($city1491); 
//
//		$city1492= new City();
//		$city1492->setId(1492);
//		$city1492->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1492->setName('Новониколаевка');
//		$manager->persist($city1492); 
//
//		$city1493= new City();
//		$city1493->setId(1493);
//		$city1493->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1493->setName('Новониколаевка');
//		$manager->persist($city1493); 
//
//		$city1494= new City();
//		$city1494->setId(1494);
//		$city1494->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1494->setName('Новониколаевка');
//		$manager->persist($city1494); 
//
//		$city1495= new City();
//		$city1495->setId(1495);
//		$city1495->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1495->setName('Новониколаевка');
//		$manager->persist($city1495); 
//
//		$city1496= new City();
//		$city1496->setId(1496);
//		$city1496->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1496->setName('Новоозерное');
//		$manager->persist($city1496); 
//
//		$city1497= new City();
//		$city1497->setId(1497);
//		$city1497->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1497->setName('Новоозерянка');
//		$manager->persist($city1497); 
//
//		$city1498= new City();
//		$city1498->setId(1498);
//		$city1498->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1498->setName('Новоолександровка');
//		$manager->persist($city1498); 
//
//		$city1499= new City();
//		$city1499->setId(1499);
//		$city1499->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1499->setName('Новоореховка');
//		$manager->persist($city1499); 
//
//		$city1500= new City();
//		$city1500->setId(1500);
//		$city1500->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1500->setName('Новооржицкое');
//		$manager->persist($city1500); 
//
//		$city1501= new City();
//		$city1501->setId(1501);
//		$city1501->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1501->setName('Новоосиново');
//		$manager->persist($city1501); 
//
//		$city1502= new City();
//		$city1502->setId(1502);
//		$city1502->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1502->setName('Новопавловка');
//		$manager->persist($city1502); 
//
//		$city1503= new City();
//		$city1503->setId(1503);
//		$city1503->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1503->setName('Новопетровка');
//		$manager->persist($city1503); 
//
//		$city1504= new City();
//		$city1504->setId(1504);
//		$city1504->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1504->setName('Новопетровское');
//		$manager->persist($city1504); 
//
//		$city1505= new City();
//		$city1505->setId(1505);
//		$city1505->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1505->setName('Новопокровка');
//		$manager->persist($city1505); 
//
//		$city1506= new City();
//		$city1506->setId(1506);
//		$city1506->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1506->setName('Новополье');
//		$manager->persist($city1506); 
//
//		$city1507= new City();
//		$city1507->setId(1507);
//		$city1507->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1507->setName('Новопсков');
//		$manager->persist($city1507); 
//
//		$city1508= new City();
//		$city1508->setId(1508);
//		$city1508->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1508->setName('Новоселица');
//		$manager->persist($city1508); 
//
//		$city1509= new City();
//		$city1509->setId(1509);
//		$city1509->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1509->setName('Новоселица');
//		$manager->persist($city1509); 
//
//		$city1510= new City();
//		$city1510->setId(1510);
//		$city1510->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1510->setName('Новоселка');
//		$manager->persist($city1510); 
//
//		$city1511= new City();
//		$city1511->setId(1511);
//		$city1511->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1511->setName('Новоселки');
//		$manager->persist($city1511); 
//
//		$city1512= new City();
//		$city1512->setId(1512);
//		$city1512->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1512->setName('Новоселовка');
//		$manager->persist($city1512); 
//
//		$city1513= new City();
//		$city1513->setId(1513);
//		$city1513->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1513->setName('Новоселовка');
//		$manager->persist($city1513); 
//
//		$city1514= new City();
//		$city1514->setId(1514);
//		$city1514->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1514->setName('Новоселовское');
//		$manager->persist($city1514); 
//
//		$city1515= new City();
//		$city1515->setId(1515);
//		$city1515->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1515->setName('Новосельское');
//		$manager->persist($city1515); 
//
//		$city1516= new City();
//		$city1516->setId(1516);
//		$city1516->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1516->setName('Новотроицкое');
//		$manager->persist($city1516); 
//
//		$city1517= new City();
//		$city1517->setId(1517);
//		$city1517->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1517->setName('Новотроицкое');
//		$manager->persist($city1517); 
//
//		$city1518= new City();
//		$city1518->setId(1518);
//		$city1518->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1518->setName('Новоукраинка');
//		$manager->persist($city1518); 
//
//		$city1519= new City();
//		$city1519->setId(1519);
//		$city1519->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1519->setName('Новоукраинка');
//		$manager->persist($city1519); 
//
//		$city1520= new City();
//		$city1520->setId(1520);
//		$city1520->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1520->setName('Новоэкономическое');
//		$manager->persist($city1520); 
//
//		$city1521= new City();
//		$city1521->setId(1521);
//		$city1521->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1521->setName('Новояворовск');
//		$manager->persist($city1521); 
//
//		$city1522= new City();
//		$city1522->setId(1522);
//		$city1522->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1522->setName('Новые безрадичи');
//		$manager->persist($city1522); 
//
//		$city1523= new City();
//		$city1523->setId(1523);
//		$city1523->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1523->setName('Новые Белокоровичи');
//		$manager->persist($city1523); 
//
//		$city1524= new City();
//		$city1524->setId(1524);
//		$city1524->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1524->setName('Новые беляры');
//		$manager->persist($city1524); 
//
//		$city1525= new City();
//		$city1525->setId(1525);
//		$city1525->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1525->setName('Новые Млыны');
//		$manager->persist($city1525); 
//
//		$city1526= new City();
//		$city1526->setId(1526);
//		$city1526->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1526->setName('Новые петровцы');
//		$manager->persist($city1526); 
//
//		$city1527= new City();
//		$city1527->setId(1527);
//		$city1527->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1527->setName('Новые Санжары');
//		$manager->persist($city1527); 
//
//		$city1528= new City();
//		$city1528->setId(1528);
//		$city1528->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1528->setName('Новый белоус');
//		$manager->persist($city1528); 
//
//		$city1529= new City();
//		$city1529->setId(1529);
//		$city1529->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1529->setName('Новый Буг');
//		$manager->persist($city1529); 
//
//		$city1530= new City();
//		$city1530->setId(1530);
//		$city1530->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1530->setName('Новый Быков');
//		$manager->persist($city1530); 
//
//		$city1531= new City();
//		$city1531->setId(1531);
//		$city1531->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1531->setName('Новый корец');
//		$manager->persist($city1531); 
//
//		$city1532= new City();
//		$city1532->setId(1532);
//		$city1532->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1532->setName('Новый кривин');
//		$manager->persist($city1532); 
//
//		$city1533= new City();
//		$city1533->setId(1533);
//		$city1533->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1533->setName('Новый мизунь');
//		$manager->persist($city1533); 
//
//		$city1534= new City();
//		$city1534->setId(1534);
//		$city1534->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1534->setName('Новый Раздел');
//		$manager->persist($city1534); 
//
//		$city1535= new City();
//		$city1535->setId(1535);
//		$city1535->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1535->setName('Новый Свет');
//		$manager->persist($city1535); 
//
//		$city1536= new City();
//		$city1536->setId(1536);
//		$city1536->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1536->setName('Новый Свет');
//		$manager->persist($city1536); 
//
//		$city1537= new City();
//		$city1537->setId(1537);
//		$city1537->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1537->setName('Новый ярычев');
//		$manager->persist($city1537); 
//
//		$city1538= new City();
//		$city1538->setId(1538);
//		$city1538->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1538->setName('Норинск');
//		$manager->persist($city1538); 
//
//		$city1539= new City();
//		$city1539->setId(1539);
//		$city1539->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1539->setName('Носовка');
//		$manager->persist($city1539); 
//
//		$city1540= new City();
//		$city1540->setId(1540);
//		$city1540->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1540->setName('Обаров');
//		$manager->persist($city1540); 
//
//		$city1541= new City();
//		$city1541->setId(1541);
//		$city1541->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1541->setName('Обертин');
//		$manager->persist($city1541); 
//
//		$city1542= new City();
//		$city1542->setId(1542);
//		$city1542->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1542->setName('Ободовка');
//		$manager->persist($city1542); 
//
//		$city1543= new City();
//		$city1543->setId(1543);
//		$city1543->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1543->setName('Обозновка');
//		$manager->persist($city1543); 
//
//		$city1544= new City();
//		$city1544->setId(1544);
//		$city1544->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1544->setName('Оболонье');
//		$manager->persist($city1544); 
//
//		$city1545= new City();
//		$city1545->setId(1545);
//		$city1545->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1545->setName('Оброшино');
//		$manager->persist($city1545); 
//
//		$city1546= new City();
//		$city1546->setId(1546);
//		$city1546->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1546->setName('Обухов');
//		$manager->persist($city1546); 
//
//		$city1547= new City();
//		$city1547->setId(1547);
//		$city1547->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1547->setName('Овадное');
//		$manager->persist($city1547); 
//
//		$city1548= new City();
//		$city1548->setId(1548);
//		$city1548->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1548->setName('Овидиополь');
//		$manager->persist($city1548); 
//
//		$city1549= new City();
//		$city1549->setId(1549);
//		$city1549->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1549->setName('Овруч');
//		$manager->persist($city1549); 
//
//		$city1550= new City();
//		$city1550->setId(1550);
//		$city1550->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1550->setName('Одая');
//		$manager->persist($city1550); 
//
//		$city1551= new City();
//		$city1551->setId(1551);
//		$city1551->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1551->setName('Одесса');
//		$manager->persist($city1551); 
//
//		$city1552= new City();
//		$city1552->setId(1552);
//		$city1552->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1552->setName('Оженин');
//		$manager->persist($city1552); 
//
//		$city1553= new City();
//		$city1553->setId(1553);
//		$city1553->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1553->setName('Озера');
//		$manager->persist($city1553); 
//
//		$city1554= new City();
//		$city1554->setId(1554);
//		$city1554->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1554->setName('Озерное');
//		$manager->persist($city1554); 
//
//		$city1555= new City();
//		$city1555->setId(1555);
//		$city1555->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1555->setName('Озерцо');
//		$manager->persist($city1555); 
//
//		$city1556= new City();
//		$city1556->setId(1556);
//		$city1556->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1556->setName('Озеряны');
//		$manager->persist($city1556); 
//
//		$city1557= new City();
//		$city1557->setId(1557);
//		$city1557->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1557->setName('Озирне');
//		$manager->persist($city1557); 
//
//		$city1558= new City();
//		$city1558->setId(1558);
//		$city1558->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1558->setName('Окно');
//		$manager->persist($city1558); 
//
//		$city1559= new City();
//		$city1559->setId(1559);
//		$city1559->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1559->setName('Окно');
//		$manager->persist($city1559); 
//
//		$city1560= new City();
//		$city1560->setId(1560);
//		$city1560->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1560->setName('Октябрськое');
//		$manager->persist($city1560); 
//
//		$city1561= new City();
//		$city1561->setId(1561);
//		$city1561->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1561->setName('Октябрьское');
//		$manager->persist($city1561); 
//
//		$city1562= new City();
//		$city1562->setId(1562);
//		$city1562->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1562->setName('Олевск');
//		$manager->persist($city1562); 
//
//		$city1563= new City();
//		$city1563->setId(1563);
//		$city1563->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1563->setName('Олекс');
//		$manager->persist($city1563); 
//
//		$city1564= new City();
//		$city1564->setId(1564);
//		$city1564->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1564->setName('Олешин');
//		$manager->persist($city1564); 
//
//		$city1565= new City();
//		$city1565->setId(1565);
//		$city1565->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1565->setName('Олешник');
//		$manager->persist($city1565); 
//
//		$city1566= new City();
//		$city1566->setId(1566);
//		$city1566->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1566->setName('Олешов');
//		$manager->persist($city1566); 
//
//		$city1567= new City();
//		$city1567->setId(1567);
//		$city1567->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1567->setName('Олива');
//		$manager->persist($city1567); 
//
//		$city1568= new City();
//		$city1568->setId(1568);
//		$city1568->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1568->setName('Олиевка');
//		$manager->persist($city1568); 
//
//		$city1569= new City();
//		$city1569->setId(1569);
//		$city1569->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1569->setName('Олишевка');
//		$manager->persist($city1569); 
//
//		$city1570= new City();
//		$city1570->setId(1570);
//		$city1570->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1570->setName('Олыка');
//		$manager->persist($city1570); 
//
//		$city1571= new City();
//		$city1571->setId(1571);
//		$city1571->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1571->setName('Ольгинка');
//		$manager->persist($city1571); 
//
//		$city1572= new City();
//		$city1572->setId(1572);
//		$city1572->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1572->setName('Ольховое');
//		$manager->persist($city1572); 
//
//		$city1573= new City();
//		$city1573->setId(1573);
//		$city1573->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1573->setName('Ольховцы');
//		$manager->persist($city1573); 
//
//		$city1574= new City();
//		$city1574->setId(1574);
//		$city1574->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1574->setName('Ольховцы-лазы');
//		$manager->persist($city1574); 
//
//		$city1575= new City();
//		$city1575->setId(1575);
//		$city1575->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1575->setName('Ольшана');
//		$manager->persist($city1575); 
//
//		$city1576= new City();
//		$city1576->setId(1576);
//		$city1576->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1576->setName('Ольшана');
//		$manager->persist($city1576); 
//
//		$city1577= new City();
//		$city1577->setId(1577);
//		$city1577->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1577->setName('Ольшанка');
//		$manager->persist($city1577); 
//
//		$city1578= new City();
//		$city1578->setId(1578);
//		$city1578->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1578->setName('Ольшанка');
//		$manager->persist($city1578); 
//
//		$city1579= new City();
//		$city1579->setId(1579);
//		$city1579->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1579->setName('Ольшанское');
//		$manager->persist($city1579); 
//
//		$city1580= new City();
//		$city1580->setId(1580);
//		$city1580->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1580->setName('Ольшаны');
//		$manager->persist($city1580); 
//
//		$city1581= new City();
//		$city1581->setId(1581);
//		$city1581->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1581->setName('Оникеево');
//		$manager->persist($city1581); 
//
//		$city1582= new City();
//		$city1582->setId(1582);
//		$city1582->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1582->setName('Ониськово');
//		$manager->persist($city1582); 
//
//		$city1583= new City();
//		$city1583->setId(1583);
//		$city1583->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1583->setName('Онишки');
//		$manager->persist($city1583); 
//
//		$city1584= new City();
//		$city1584->setId(1584);
//		$city1584->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1584->setName('Онуфриевка');
//		$manager->persist($city1584); 
//
//		$city1585= new City();
//		$city1585->setId(1585);
//		$city1585->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1585->setName('Опоры');
//		$manager->persist($city1585); 
//
//		$city1586= new City();
//		$city1586->setId(1586);
//		$city1586->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1586->setName('Опошня');
//		$manager->persist($city1586); 
//
//		$city1587= new City();
//		$city1587->setId(1587);
//		$city1587->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1587->setName('Опытное');
//		$manager->persist($city1587); 
//
//		$city1588= new City();
//		$city1588->setId(1588);
//		$city1588->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1588->setName('Оратов');
//		$manager->persist($city1588); 
//
//		$city1589= new City();
//		$city1589->setId(1589);
//		$city1589->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1589->setName('Оратов');
//		$manager->persist($city1589); 
//
//		$city1590= new City();
//		$city1590->setId(1590);
//		$city1590->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1590->setName('Орвяница');
//		$manager->persist($city1590); 
//
//		$city1591= new City();
//		$city1591->setId(1591);
//		$city1591->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1591->setName('Орджоникидзе');
//		$manager->persist($city1591); 
//
//		$city1592= new City();
//		$city1592->setId(1592);
//		$city1592->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1592->setName('Орджоникидзе');
//		$manager->persist($city1592); 
//
//		$city1593= new City();
//		$city1593->setId(1593);
//		$city1593->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1593->setName('Орджоникидзе');
//		$manager->persist($city1593); 
//
//		$city1594= new City();
//		$city1594->setId(1594);
//		$city1594->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1594->setName('Ореанда');
//		$manager->persist($city1594); 
//
//		$city1595= new City();
//		$city1595->setId(1595);
//		$city1595->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1595->setName('Орехов');
//		$manager->persist($city1595); 
//
//		$city1596= new City();
//		$city1596->setId(1596);
//		$city1596->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1596->setName('Ореховка');
//		$manager->persist($city1596); 
//
//		$city1597= new City();
//		$city1597->setId(1597);
//		$city1597->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1597->setName('Ореховка');
//		$manager->persist($city1597); 
//
//		$city1598= new City();
//		$city1598->setId(1598);
//		$city1598->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1598->setName('Орехово');
//		$manager->persist($city1598); 
//
//		$city1599= new City();
//		$city1599->setId(1599);
//		$city1599->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1599->setName('Оржев');
//		$manager->persist($city1599); 
//
//		$city1600= new City();
//		$city1600->setId(1600);
//		$city1600->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1600->setName('Оржица');
//		$manager->persist($city1600); 
//
//		$city1601= new City();
//		$city1601->setId(1601);
//		$city1601->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1601->setName('Орилька-1');
//		$manager->persist($city1601); 
//
//		$city1602= new City();
//		$city1602->setId(1602);
//		$city1602->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1602->setName('Орловщина');
//		$manager->persist($city1602); 
//
//		$city1603= new City();
//		$city1603->setId(1603);
//		$city1603->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1603->setName('Осипенко');
//		$manager->persist($city1603); 
//
//		$city1604= new City();
//		$city1604->setId(1604);
//		$city1604->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1604->setName('Останино');
//		$manager->persist($city1604); 
//
//		$city1605= new City();
//		$city1605->setId(1605);
//		$city1605->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1605->setName('Остер');
//		$manager->persist($city1605); 
//
//		$city1606= new City();
//		$city1606->setId(1606);
//		$city1606->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1606->setName('Остки');
//		$manager->persist($city1606); 
//
//		$city1607= new City();
//		$city1607->setId(1607);
//		$city1607->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1607->setName('Остров');
//		$manager->persist($city1607); 
//
//		$city1608= new City();
//		$city1608->setId(1608);
//		$city1608->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1608->setName('Остров');
//		$manager->persist($city1608); 
//
//		$city1609= new City();
//		$city1609->setId(1609);
//		$city1609->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1609->setName('Острог');
//		$manager->persist($city1609); 
//
//		$city1610= new City();
//		$city1610->setId(1610);
//		$city1610->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1610->setName('Острожец');
//		$manager->persist($city1610); 
//
//		$city1611= new City();
//		$city1611->setId(1611);
//		$city1611->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1611->setName('Осыково');
//		$manager->persist($city1611); 
//
//		$city1612= new City();
//		$city1612->setId(1612);
//		$city1612->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1612->setName('Отрадное');
//		$manager->persist($city1612); 
//
//		$city1613= new City();
//		$city1613->setId(1613);
//		$city1613->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1613->setName('Отрадное');
//		$manager->persist($city1613); 
//
//		$city1614= new City();
//		$city1614->setId(1614);
//		$city1614->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1614->setName('Отыния');
//		$manager->persist($city1614); 
//
//		$city1615= new City();
//		$city1615->setId(1615);
//		$city1615->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1615->setName('Очаков');
//		$manager->persist($city1615); 
//
//		$city1616= new City();
//		$city1616->setId(1616);
//		$city1616->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1616->setName('Очеретино');
//		$manager->persist($city1616); 
//
//		$city1617= new City();
//		$city1617->setId(1617);
//		$city1617->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1617->setName('Павлов');
//		$manager->persist($city1617); 
//
//		$city1618= new City();
//		$city1618->setId(1618);
//		$city1618->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1618->setName('Павловка');
//		$manager->persist($city1618); 
//
//		$city1619= new City();
//		$city1619->setId(1619);
//		$city1619->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1619->setName('Павловка');
//		$manager->persist($city1619); 
//
//		$city1620= new City();
//		$city1620->setId(1620);
//		$city1620->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1620->setName('Павловка');
//		$manager->persist($city1620); 
//
//		$city1621= new City();
//		$city1621->setId(1621);
//		$city1621->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1621->setName('Павлоград');
//		$manager->persist($city1621); 
//
//		$city1622= new City();
//		$city1622->setId(1622);
//		$city1622->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1622->setName('Павлыш');
//		$manager->persist($city1622); 
//
//		$city1623= new City();
//		$city1623->setId(1623);
//		$city1623->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1623->setName('Павшино');
//		$manager->persist($city1623); 
//
//		$city1624= new City();
//		$city1624->setId(1624);
//		$city1624->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1624->setName('Паляничинцы');
//		$manager->persist($city1624); 
//
//		$city1625= new City();
//		$city1625->setId(1625);
//		$city1625->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1625->setName('Пантелеймоновка');
//		$manager->persist($city1625); 
//
//		$city1626= new City();
//		$city1626->setId(1626);
//		$city1626->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1626->setName('Панютино');
//		$manager->persist($city1626); 
//
//		$city1627= new City();
//		$city1627->setId(1627);
//		$city1627->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1627->setName('Парафиевка');
//		$manager->persist($city1627); 
//
//		$city1628= new City();
//		$city1628->setId(1628);
//		$city1628->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1628->setName('Парипсы');
//		$manager->persist($city1628); 
//
//		$city1629= new City();
//		$city1629->setId(1629);
//		$city1629->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1629->setName('Парковое');
//		$manager->persist($city1629); 
//
//		$city1630= new City();
//		$city1630->setId(1630);
//		$city1630->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1630->setName('Партенит');
//		$manager->persist($city1630); 
//
//		$city1631= new City();
//		$city1631->setId(1631);
//		$city1631->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1631->setName('Партизанское');
//		$manager->persist($city1631); 
//
//		$city1632= new City();
//		$city1632->setId(1632);
//		$city1632->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1632->setName('Партизаны');
//		$manager->persist($city1632); 
//
//		$city1633= new City();
//		$city1633->setId(1633);
//		$city1633->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1633->setName('Пархомовка');
//		$manager->persist($city1633); 
//
//		$city1634= new City();
//		$city1634->setId(1634);
//		$city1634->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1634->setName('Пацканево');
//		$manager->persist($city1634); 
//
//		$city1635= new City();
//		$city1635->setId(1635);
//		$city1635->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1635->setName('Первозвановка');
//		$manager->persist($city1635); 
//
//		$city1636= new City();
//		$city1636->setId(1636);
//		$city1636->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1636->setName('Первомайск');
//		$manager->persist($city1636); 
//
//		$city1637= new City();
//		$city1637->setId(1637);
//		$city1637->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1637->setName('Первомайск(Луганская обл.)');
//		$manager->persist($city1637); 
//
//		$city1638= new City();
//		$city1638->setId(1638);
//		$city1638->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1638->setName('Первомайск');
//		$manager->persist($city1638); 
//
//		$city1639= new City();
//		$city1639->setId(1639);
//		$city1639->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1639->setName('Первомайский');
//		$manager->persist($city1639); 
//
//		$city1640= new City();
//		$city1640->setId(1640);
//		$city1640->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1640->setName('Первомайское');
//		$manager->persist($city1640); 
//
//		$city1641= new City();
//		$city1641->setId(1641);
//		$city1641->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1641->setName('Первомайское');
//		$manager->persist($city1641); 
//
//		$city1642= new City();
//		$city1642->setId(1642);
//		$city1642->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1642->setName('Перевальное');
//		$manager->persist($city1642); 
//
//		$city1643= new City();
//		$city1643->setId(1643);
//		$city1643->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1643->setName('Перевальск');
//		$manager->persist($city1643); 
//
//		$city1644= new City();
//		$city1644->setId(1644);
//		$city1644->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1644->setName('Перегоновка');
//		$manager->persist($city1644); 
//
//		$city1645= new City();
//		$city1645->setId(1645);
//		$city1645->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1645->setName('Перекрестовка');
//		$manager->persist($city1645); 
//
//		$city1646= new City();
//		$city1646->setId(1646);
//		$city1646->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1646->setName('Перемога');
//		$manager->persist($city1646); 
//
//		$city1647= new City();
//		$city1647->setId(1647);
//		$city1647->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1647->setName('Перемышляны');
//		$manager->persist($city1647); 
//
//		$city1648= new City();
//		$city1648->setId(1648);
//		$city1648->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1648->setName('Перерыв');
//		$manager->persist($city1648); 
//
//		$city1649= new City();
//		$city1649->setId(1649);
//		$city1649->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1649->setName('Пересадовка');
//		$manager->persist($city1649); 
//
//		$city1650= new City();
//		$city1650->setId(1650);
//		$city1650->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1650->setName('Пересечная');
//		$manager->persist($city1650); 
//
//		$city1651= new City();
//		$city1651->setId(1651);
//		$city1651->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1651->setName('Перечин');
//		$manager->persist($city1651); 
//
//		$city1652= new City();
//		$city1652->setId(1652);
//		$city1652->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1652->setName('Перещепине');
//		$manager->persist($city1652); 
//
//		$city1653= new City();
//		$city1653->setId(1653);
//		$city1653->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1653->setName('Переяслав-Хмельницкий');
//		$manager->persist($city1653); 
//
//		$city1654= new City();
//		$city1654->setId(1654);
//		$city1654->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1654->setName('Перлявка');
//		$manager->persist($city1654); 
//
//		$city1655= new City();
//		$city1655->setId(1655);
//		$city1655->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1655->setName('Перово');
//		$manager->persist($city1655); 
//
//		$city1656= new City();
//		$city1656->setId(1656);
//		$city1656->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1656->setName('Перше травня');
//		$manager->persist($city1656); 
//
//		$city1657= new City();
//		$city1657->setId(1657);
//		$city1657->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1657->setName('Першотравенск');
//		$manager->persist($city1657); 
//
//		$city1658= new City();
//		$city1658->setId(1658);
//		$city1658->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1658->setName('Першотравенск');
//		$manager->persist($city1658); 
//
//		$city1659= new City();
//		$city1659->setId(1659);
//		$city1659->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1659->setName('Першотравневое');
//		$manager->persist($city1659); 
//
//		$city1660= new City();
//		$city1660->setId(1660);
//		$city1660->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1660->setName('Первомай');
//		$manager->persist($city1660); 
//
//		$city1661= new City();
//		$city1661->setId(1661);
//		$city1661->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1661->setName('Пески');
//		$manager->persist($city1661); 
//
//		$city1662= new City();
//		$city1662->setId(1662);
//		$city1662->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1662->setName('Пески');
//		$manager->persist($city1662); 
//
//		$city1663= new City();
//		$city1663->setId(1663);
//		$city1663->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1663->setName('Песковка');
//		$manager->persist($city1663); 
//
//		$city1664= new City();
//		$city1664->setId(1664);
//		$city1664->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1664->setName('Песочин');
//		$manager->persist($city1664); 
//
//		$city1665= new City();
//		$city1665->setId(1665);
//		$city1665->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1665->setName('Пестрялово');
//		$manager->persist($city1665); 
//
//		$city1666= new City();
//		$city1666->setId(1666);
//		$city1666->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1666->setName('Песчанка');
//		$manager->persist($city1666); 
//
//		$city1667= new City();
//		$city1667->setId(1667);
//		$city1667->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1667->setName('Песчанка');
//		$manager->persist($city1667); 
//
//		$city1668= new City();
//		$city1668->setId(1668);
//		$city1668->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1668->setName('Песчаное');
//		$manager->persist($city1668); 
//
//		$city1669= new City();
//		$city1669->setId(1669);
//		$city1669->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1669->setName('Песчаное');
//		$manager->persist($city1669); 
//
//		$city1670= new City();
//		$city1670->setId(1670);
//		$city1670->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1670->setName('Песчаное');
//		$manager->persist($city1670); 
//
//		$city1671= new City();
//		$city1671->setId(1671);
//		$city1671->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1671->setName('Петриков');
//		$manager->persist($city1671); 
//
//		$city1672= new City();
//		$city1672->setId(1672);
//		$city1672->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1672->setName('Петриковка');
//		$manager->persist($city1672); 
//
//		$city1673= new City();
//		$city1673->setId(1673);
//		$city1673->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1673->setName('Петровка');
//		$manager->persist($city1673); 
//
//		$city1674= new City();
//		$city1674->setId(1674);
//		$city1674->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1674->setName('Петровка');
//		$manager->persist($city1674); 
//
//		$city1675= new City();
//		$city1675->setId(1675);
//		$city1675->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1675->setName('Петровка');
//		$manager->persist($city1675); 
//
//		$city1676= new City();
//		$city1676->setId(1676);
//		$city1676->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1676->setName('Петровка');
//		$manager->persist($city1676); 
//
//		$city1677= new City();
//		$city1677->setId(1677);
//		$city1677->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1677->setName('Петровка-роменская');
//		$manager->persist($city1677); 
//
//		$city1678= new City();
//		$city1678->setId(1678);
//		$city1678->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1678->setName('Петрово');
//		$manager->persist($city1678); 
//
//		$city1679= new City();
//		$city1679->setId(1679);
//		$city1679->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1679->setName('Петровское');
//		$manager->persist($city1679); 
//
//		$city1680= new City();
//		$city1680->setId(1680);
//		$city1680->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1680->setName('Петровское');
//		$manager->persist($city1680); 
//
//		$city1681= new City();
//		$city1681->setId(1681);
//		$city1681->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1681->setName('Петровское');
//		$manager->persist($city1681); 
//
//		$city1682= new City();
//		$city1682->setId(1682);
//		$city1682->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1682->setName('Петровское');
//		$manager->persist($city1682); 
//
//		$city1683= new City();
//		$city1683->setId(1683);
//		$city1683->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1683->setName('Петродолинское');
//		$manager->persist($city1683); 
//
//		$city1684= new City();
//		$city1684->setId(1684);
//		$city1684->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1684->setName('Петропавловка');
//		$manager->persist($city1684); 
//
//		$city1685= new City();
//		$city1685->setId(1685);
//		$city1685->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1685->setName('Петропавловская Борщаговка');
//		$manager->persist($city1685); 
//
//		$city1686= new City();
//		$city1686->setId(1686);
//		$city1686->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1686->setName('Петрушки');
//		$manager->persist($city1686); 
//
//		$city1687= new City();
//		$city1687->setId(1687);
//		$city1687->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1687->setName('Печенеги');
//		$manager->persist($city1687); 
//
//		$city1688= new City();
//		$city1688->setId(1688);
//		$city1688->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1688->setName('Печенежин');
//		$manager->persist($city1688); 
//
//		$city1689= new City();
//		$city1689->setId(1689);
//		$city1689->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1689->setName('Пещанка');
//		$manager->persist($city1689); 
//
//		$city1690= new City();
//		$city1690->setId(1690);
//		$city1690->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1690->setName('Пивденное');
//		$manager->persist($city1690); 
//
//		$city1691= new City();
//		$city1691->setId(1691);
//		$city1691->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1691->setName('Пивденное');
//		$manager->persist($city1691); 
//
//		$city1692= new City();
//		$city1692->setId(1692);
//		$city1692->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1692->setName('Пидбирцы');
//		$manager->persist($city1692); 
//
//		$city1693= new City();
//		$city1693->setId(1693);
//		$city1693->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1693->setName('Пилиповичи');
//		$manager->persist($city1693); 
//
//		$city1694= new City();
//		$city1694->setId(1694);
//		$city1694->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1694->setName('Пилиповка');
//		$manager->persist($city1694); 
//
//		$city1695= new City();
//		$city1695->setId(1695);
//		$city1695->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1695->setName('Пилипча');
//		$manager->persist($city1695); 
//
//		$city1696= new City();
//		$city1696->setId(1696);
//		$city1696->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1696->setName('Пионерское');
//		$manager->persist($city1696); 
//
//		$city1697= new City();
//		$city1697->setId(1697);
//		$city1697->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1697->setName('Пироговка');
//		$manager->persist($city1697); 
//
//		$city1698= new City();
//		$city1698->setId(1698);
//		$city1698->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1698->setName('Пирятин');
//		$manager->persist($city1698); 
//
//		$city1699= new City();
//		$city1699->setId(1699);
//		$city1699->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1699->setName('Писаревка');
//		$manager->persist($city1699); 
//
//		$city1700= new City();
//		$city1700->setId(1700);
//		$city1700->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1700->setName('Пискуновка');
//		$manager->persist($city1700); 
//
//		$city1701= new City();
//		$city1701->setId(1701);
//		$city1701->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1701->setName('Плавинище');
//		$manager->persist($city1701); 
//
//		$city1702= new City();
//		$city1702->setId(1702);
//		$city1702->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1702->setName('Платоново');
//		$manager->persist($city1702); 
//
//		$city1703= new City();
//		$city1703->setId(1703);
//		$city1703->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1703->setName('Плесецкое');
//		$manager->persist($city1703); 
//
//		$city1704= new City();
//		$city1704->setId(1704);
//		$city1704->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1704->setName('Плетеный ташлык');
//		$manager->persist($city1704); 
//
//		$city1705= new City();
//		$city1705->setId(1705);
//		$city1705->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1705->setName('Плоске');
//		$manager->persist($city1705); 
//
//		$city1706= new City();
//		$city1706->setId(1706);
//		$city1706->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1706->setName('Плотыча');
//		$manager->persist($city1706); 
//
//		$city1707= new City();
//		$city1707->setId(1707);
//		$city1707->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1707->setName('Пнев');
//		$manager->persist($city1707); 
//
//		$city1708= new City();
//		$city1708->setId(1708);
//		$city1708->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1708->setName('Побережье');
//		$manager->persist($city1708); 
//
//		$city1709= new City();
//		$city1709->setId(1709);
//		$city1709->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1709->setName('Побугское');
//		$manager->persist($city1709); 
//
//		$city1710= new City();
//		$city1710->setId(1710);
//		$city1710->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1710->setName('Повитное');
//		$manager->persist($city1710); 
//
//		$city1711= new City();
//		$city1711->setId(1711);
//		$city1711->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1711->setName('Поворск');
//		$manager->persist($city1711); 
//
//		$city1712= new City();
//		$city1712->setId(1712);
//		$city1712->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1712->setName('Погорельцы');
//		$manager->persist($city1712); 
//
//		$city1713= new City();
//		$city1713->setId(1713);
//		$city1713->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1713->setName('Погребище');
//		$manager->persist($city1713); 
//
//		$city1714= new City();
//		$city1714->setId(1714);
//		$city1714->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1714->setName('Погребище первое');
//		$manager->persist($city1714); 
//
//		$city1715= new City();
//		$city1715->setId(1715);
//		$city1715->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1715->setName('Погребы');
//		$manager->persist($city1715); 
//
//		$city1716= new City();
//		$city1716->setId(1716);
//		$city1716->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1716->setName('Подберезцы');
//		$manager->persist($city1716); 
//
//		$city1717= new City();
//		$city1717->setId(1717);
//		$city1717->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1717->setName('Подбуж');
//		$manager->persist($city1717); 
//
//		$city1718= new City();
//		$city1718->setId(1718);
//		$city1718->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1718->setName('Подволочиск');
//		$manager->persist($city1718); 
//
//		$city1719= new City();
//		$city1719->setId(1719);
//		$city1719->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1719->setName('Подворки');
//		$manager->persist($city1719); 
//
//		$city1720= new City();
//		$city1720->setId(1720);
//		$city1720->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1720->setName('Подвысокое');
//		$manager->persist($city1720); 
//
//		$city1721= new City();
//		$city1721->setId(1721);
//		$city1721->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1721->setName('Подгайцы');
//		$manager->persist($city1721); 
//
//		$city1722= new City();
//		$city1722->setId(1722);
//		$city1722->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1722->setName('Подгайцы');
//		$manager->persist($city1722); 
//
//		$city1723= new City();
//		$city1723->setId(1723);
//		$city1723->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1723->setName('Подгайцы');
//		$manager->persist($city1723); 
//
//		$city1724= new City();
//		$city1724->setId(1724);
//		$city1724->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1724->setName('Подгородная');
//		$manager->persist($city1724); 
//
//		$city1725= new City();
//		$city1725->setId(1725);
//		$city1725->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1725->setName('Подгородное');
//		$manager->persist($city1725); 
//
//		$city1726= new City();
//		$city1726->setId(1726);
//		$city1726->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1726->setName('Подгородное');
//		$manager->persist($city1726); 
//
//		$city1727= new City();
//		$city1727->setId(1727);
//		$city1727->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1727->setName('Подгородное');
//		$manager->persist($city1727); 
//
//		$city1728= new City();
//		$city1728->setId(1728);
//		$city1728->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1728->setName('Подгородное');
//		$manager->persist($city1728); 
//
//		$city1729= new City();
//		$city1729->setId(1729);
//		$city1729->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1729->setName('Подгорцы');
//		$manager->persist($city1729); 
//
//		$city1730= new City();
//		$city1730->setId(1730);
//		$city1730->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1730->setName('Подгорье');
//		$manager->persist($city1730); 
//
//		$city1731= new City();
//		$city1731->setId(1731);
//		$city1731->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1731->setName('Подкамень');
//		$manager->persist($city1731); 
//
//		$city1732= new City();
//		$city1732->setId(1732);
//		$city1732->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1732->setName('Подмихайля');
//		$manager->persist($city1732); 
//
//		$city1733= new City();
//		$city1733->setId(1733);
//		$city1733->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1733->setName('Подобовец');
//		$manager->persist($city1733); 
//
//		$city1734= new City();
//		$city1734->setId(1734);
//		$city1734->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1734->setName('Подорожное');
//		$manager->persist($city1734); 
//
//		$city1735= new City();
//		$city1735->setId(1735);
//		$city1735->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1735->setName('Подпечеры');
//		$manager->persist($city1735); 
//
//		$city1736= new City();
//		$city1736->setId(1736);
//		$city1736->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1736->setName('Пожарское');
//		$manager->persist($city1736); 
//
//		$city1737= new City();
//		$city1737->setId(1737);
//		$city1737->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1737->setName('Покотиловка');
//		$manager->persist($city1737); 
//
//		$city1738= new City();
//		$city1738->setId(1738);
//		$city1738->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1738->setName('Покровская богачка');
//		$manager->persist($city1738); 
//
//		$city1739= new City();
//		$city1739->setId(1739);
//		$city1739->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1739->setName('Покровское');
//		$manager->persist($city1739); 
//
//		$city1740= new City();
//		$city1740->setId(1740);
//		$city1740->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1740->setName('Покровское');
//		$manager->persist($city1740); 
//
//		$city1741= new City();
//		$city1741->setId(1741);
//		$city1741->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1741->setName('Покровское');
//		$manager->persist($city1741); 
//
//		$city1742= new City();
//		$city1742->setId(1742);
//		$city1742->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1742->setName('Полевая');
//		$manager->persist($city1742); 
//
//		$city1743= new City();
//		$city1743->setId(1743);
//		$city1743->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1743->setName('Полесское');
//		$manager->persist($city1743); 
//
//		$city1744= new City();
//		$city1744->setId(1744);
//		$city1744->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1744->setName('Политрудня');
//		$manager->persist($city1744); 
//
//		$city1745= new City();
//		$city1745->setId(1745);
//		$city1745->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1745->setName('Половинкино');
//		$manager->persist($city1745); 
//
//		$city1746= new City();
//		$city1746->setId(1746);
//		$city1746->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1746->setName('Половинчик');
//		$manager->persist($city1746); 
//
//		$city1747= new City();
//		$city1747->setId(1747);
//		$city1747->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1747->setName('Пологи');
//		$manager->persist($city1747); 
//
//		$city1748= new City();
//		$city1748->setId(1748);
//		$city1748->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1748->setName('Пологи');
//		$manager->persist($city1748); 
//
//		$city1749= new City();
//		$city1749->setId(1749);
//		$city1749->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1749->setName('Пологи-вергуны');
//		$manager->persist($city1749); 
//
//		$city1750= new City();
//		$city1750->setId(1750);
//		$city1750->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1750->setName('Полонка');
//		$manager->persist($city1750); 
//
//		$city1751= new City();
//		$city1751->setId(1751);
//		$city1751->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1751->setName('Полонное');
//		$manager->persist($city1751); 
//
//		$city1752= new City();
//		$city1752->setId(1752);
//		$city1752->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1752->setName('Полтава');
//		$manager->persist($city1752); 
//
//		$city1753= new City();
//		$city1753->setId(1753);
//		$city1753->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1753->setName('Полтавка');
//		$manager->persist($city1753); 
//
//		$city1754= new City();
//		$city1754->setId(1754);
//		$city1754->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1754->setName('Поляна');
//		$manager->persist($city1754); 
//
//		$city1755= new City();
//		$city1755->setId(1755);
//		$city1755->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1755->setName('Поляница');
//		$manager->persist($city1755); 
//
//		$city1756= new City();
//		$city1756->setId(1756);
//		$city1756->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1756->setName('Полянка');
//		$manager->persist($city1756); 
//
//		$city1757= new City();
//		$city1757->setId(1757);
//		$city1757->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1757->setName('Полянь');
//		$manager->persist($city1757); 
//
//		$city1758= new City();
//		$city1758->setId(1758);
//		$city1758->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1758->setName('Помична');
//		$manager->persist($city1758); 
//
//		$city1759= new City();
//		$city1759->setId(1759);
//		$city1759->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1759->setName('Понизовка');
//		$manager->persist($city1759); 
//
//		$city1760= new City();
//		$city1760->setId(1760);
//		$city1760->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1760->setName('Понинка');
//		$manager->persist($city1760); 
//
//		$city1761= new City();
//		$city1761->setId(1761);
//		$city1761->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1761->setName('Попасная');
//		$manager->persist($city1761); 
//
//		$city1762= new City();
//		$city1762->setId(1762);
//		$city1762->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1762->setName('Попасное');
//		$manager->persist($city1762); 
//
//		$city1763= new City();
//		$city1763->setId(1763);
//		$city1763->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1763->setName('Попельня');
//		$manager->persist($city1763); 
//
//		$city1764= new City();
//		$city1764->setId(1764);
//		$city1764->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1764->setName('Попельня');
//		$manager->persist($city1764); 
//
//		$city1765= new City();
//		$city1765->setId(1765);
//		$city1765->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1765->setName('Поповка');
//		$manager->persist($city1765); 
//
//		$city1766= new City();
//		$city1766->setId(1766);
//		$city1766->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1766->setName('Поповка');
//		$manager->persist($city1766); 
//
//		$city1767= new City();
//		$city1767->setId(1767);
//		$city1767->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1767->setName('Попово');
//		$manager->persist($city1767); 
//
//		$city1768= new City();
//		$city1768->setId(1768);
//		$city1768->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1768->setName('Поромовка');
//		$manager->persist($city1768); 
//
//		$city1769= new City();
//		$city1769->setId(1769);
//		$city1769->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1769->setName('Поташ');
//		$manager->persist($city1769); 
//
//		$city1770= new City();
//		$city1770->setId(1770);
//		$city1770->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1770->setName('Потоки');
//		$manager->persist($city1770); 
//
//		$city1771= new City();
//		$city1771->setId(1771);
//		$city1771->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1771->setName('Почаев');
//		$manager->persist($city1771); 
//
//		$city1772= new City();
//		$city1772->setId(1772);
//		$city1772->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1772->setName('Почапинцы');
//		$manager->persist($city1772); 
//
//		$city1773= new City();
//		$city1773->setId(1773);
//		$city1773->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1773->setName('Почапинцы');
//		$manager->persist($city1773); 
//
//		$city1774= new City();
//		$city1774->setId(1774);
//		$city1774->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1774->setName('Почтовое');
//		$manager->persist($city1774); 
//
//		$city1775= new City();
//		$city1775->setId(1775);
//		$city1775->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1775->setName('Предтечино');
//		$manager->persist($city1775); 
//
//		$city1776= new City();
//		$city1776->setId(1776);
//		$city1776->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1776->setName('Преображенка');
//		$manager->persist($city1776); 
//
//		$city1777= new City();
//		$city1777->setId(1777);
//		$city1777->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1777->setName('Приазовское');
//		$manager->persist($city1777); 
//
//		$city1778= new City();
//		$city1778->setId(1778);
//		$city1778->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1778->setName('Прибрежное');
//		$manager->persist($city1778); 
//
//		$city1779= new City();
//		$city1779->setId(1779);
//		$city1779->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1779->setName('Прибугское');
//		$manager->persist($city1779); 
//
//		$city1780= new City();
//		$city1780->setId(1780);
//		$city1780->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1780->setName('Прибужаны');
//		$manager->persist($city1780); 
//
//		$city1781= new City();
//		$city1781->setId(1781);
//		$city1781->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1781->setName('Прибужье');
//		$manager->persist($city1781); 
//
//		$city1782= new City();
//		$city1782->setId(1782);
//		$city1782->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1782->setName('Приветное');
//		$manager->persist($city1782); 
//
//		$city1783= new City();
//		$city1783->setId(1783);
//		$city1783->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1783->setName('Приволье');
//		$manager->persist($city1783); 
//
//		$city1784= new City();
//		$city1784->setId(1784);
//		$city1784->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1784->setName('Приволье');
//		$manager->persist($city1784); 
//
//		$city1785= new City();
//		$city1785->setId(1785);
//		$city1785->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1785->setName('Приднепрянское');
//		$manager->persist($city1785); 
//
//		$city1786= new City();
//		$city1786->setId(1786);
//		$city1786->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1786->setName('Приколотное');
//		$manager->persist($city1786); 
//
//		$city1787= new City();
//		$city1787->setId(1787);
//		$city1787->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1787->setName('Прилиманское');
//		$manager->persist($city1787); 
//
//		$city1788= new City();
//		$city1788->setId(1788);
//		$city1788->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1788->setName('Прилуки');
//		$manager->persist($city1788); 
//
//		$city1789= new City();
//		$city1789->setId(1789);
//		$city1789->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1789->setName('Приморск');
//		$manager->persist($city1789); 
//
//		$city1790= new City();
//		$city1790->setId(1790);
//		$city1790->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1790->setName('Приморский');
//		$manager->persist($city1790); 
//
//		$city1791= new City();
//		$city1791->setId(1791);
//		$city1791->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1791->setName('Приозерное');
//		$manager->persist($city1791); 
//
//		$city1792= new City();
//		$city1792->setId(1792);
//		$city1792->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1792->setName('Приозерное');
//		$manager->persist($city1792); 
//
//		$city1793= new City();
//		$city1793->setId(1793);
//		$city1793->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1793->setName('Пристанционное');
//		$manager->persist($city1793); 
//
//		$city1794= new City();
//		$city1794->setId(1794);
//		$city1794->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1794->setName('Пришиб');
//		$manager->persist($city1794); 
//
//		$city1795= new City();
//		$city1795->setId(1795);
//		$city1795->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1795->setName('Пришиб');
//		$manager->persist($city1795); 
//
//		$city1796= new City();
//		$city1796->setId(1796);
//		$city1796->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1796->setName('Приютовка');
//		$manager->persist($city1796); 
//
//		$city1797= new City();
//		$city1797->setId(1797);
//		$city1797->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1797->setName('Пробежная');
//		$manager->persist($city1797); 
//
//		$city1798= new City();
//		$city1798->setId(1798);
//		$city1798->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1798->setName('Пролетарский');
//		$manager->persist($city1798); 
//
//		$city1799= new City();
//		$city1799->setId(1799);
//		$city1799->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1799->setName('Пролиски');
//		$manager->persist($city1799); 
//
//		$city1800= new City();
//		$city1800->setId(1800);
//		$city1800->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1800->setName('Просяная');
//		$manager->persist($city1800); 
//
//		$city1801= new City();
//		$city1801->setId(1801);
//		$city1801->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1801->setName('Протопоповка');
//		$manager->persist($city1801); 
//
//		$city1802= new City();
//		$city1802->setId(1802);
//		$city1802->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1802->setName('Проходы');
//		$manager->persist($city1802); 
//
//		$city1803= new City();
//		$city1803->setId(1803);
//		$city1803->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1803->setName('Прохоровка');
//		$manager->persist($city1803); 
//
//		$city1804= new City();
//		$city1804->setId(1804);
//		$city1804->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1804->setName('Процев');
//		$manager->persist($city1804); 
//
//		$city1805= new City();
//		$city1805->setId(1805);
//		$city1805->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1805->setName('Прудянка');
//		$manager->persist($city1805); 
//
//		$city1806= new City();
//		$city1806->setId(1806);
//		$city1806->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1806->setName('Пряжов');
//		$manager->persist($city1806); 
//
//		$city1807= new City();
//		$city1807->setId(1807);
//		$city1807->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1807->setName('Пукеничи');
//		$manager->persist($city1807); 
//
//		$city1808= new City();
//		$city1808->setId(1808);
//		$city1808->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1808->setName('Пустомыты');
//		$manager->persist($city1808); 
//
//		$city1809= new City();
//		$city1809->setId(1809);
//		$city1809->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1809->setName('Путивль');
//		$manager->persist($city1809); 
//
//		$city1810= new City();
//		$city1810->setId(1810);
//		$city1810->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1810->setName('Путила');
//		$manager->persist($city1810); 
//
//		$city1811= new City();
//		$city1811->setId(1811);
//		$city1811->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1811->setName('Пуховка');
//		$manager->persist($city1811); 
//
//		$city1812= new City();
//		$city1812->setId(1812);
//		$city1812->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1812->setName('Пушкаревка');
//		$manager->persist($city1812); 
//
//		$city1813= new City();
//		$city1813->setId(1813);
//		$city1813->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1813->setName('Пышковцы');
//		$manager->persist($city1813); 
//
//		$city1814= new City();
//		$city1814->setId(1814);
//		$city1814->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1814->setName('Пятихатки');
//		$manager->persist($city1814); 
//
//		$city1815= new City();
//		$city1815->setId(1815);
//		$city1815->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1815->setName('Рава-Русская');
//		$manager->persist($city1815); 
//
//		$city1816= new City();
//		$city1816->setId(1816);
//		$city1816->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1816->setName('Равнополье');
//		$manager->persist($city1816); 
//
//		$city1817= new City();
//		$city1817->setId(1817);
//		$city1817->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1817->setName('Раденск');
//		$manager->persist($city1817); 
//
//		$city1818= new City();
//		$city1818->setId(1818);
//		$city1818->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1818->setName('Радехов');
//		$manager->persist($city1818); 
//
//		$city1819= new City();
//		$city1819->setId(1819);
//		$city1819->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1819->setName('Радомышль');
//		$manager->persist($city1819); 
//
//		$city1820= new City();
//		$city1820->setId(1820);
//		$city1820->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1820->setName('Радомышль');
//		$manager->persist($city1820); 
//
//		$city1821= new City();
//		$city1821->setId(1821);
//		$city1821->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1821->setName('Радостное');
//		$manager->persist($city1821); 
//
//		$city1822= new City();
//		$city1822->setId(1822);
//		$city1822->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1822->setName('Радушное');
//		$manager->persist($city1822); 
//
//		$city1823= new City();
//		$city1823->setId(1823);
//		$city1823->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1823->setName('Радча');
//		$manager->persist($city1823); 
//
//		$city1824= new City();
//		$city1824->setId(1824);
//		$city1824->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1824->setName('Радивилов');
//		$manager->persist($city1824); 
//
//		$city1825= new City();
//		$city1825->setId(1825);
//		$city1825->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1825->setName('Радыжево');
//		$manager->persist($city1825); 
//
//		$city1826= new City();
//		$city1826->setId(1826);
//		$city1826->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1826->setName('Радянское');
//		$manager->persist($city1826); 
//
//		$city1827= new City();
//		$city1827->setId(1827);
//		$city1827->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1827->setName('Раздельная');
//		$manager->persist($city1827); 
//
//		$city1828= new City();
//		$city1828->setId(1828);
//		$city1828->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1828->setName('Раздольное');
//		$manager->persist($city1828); 
//
//		$city1829= new City();
//		$city1829->setId(1829);
//		$city1829->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1829->setName('Райгородок');
//		$manager->persist($city1829); 
//
//		$city1830= new City();
//		$city1830->setId(1830);
//		$city1830->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1830->setName('Ракита');
//		$manager->persist($city1830); 
//
//		$city1831= new City();
//		$city1831->setId(1831);
//		$city1831->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1831->setName('Ракитное');
//		$manager->persist($city1831); 
//
//		$city1832= new City();
//		$city1832->setId(1832);
//		$city1832->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1832->setName('Ракитное');
//		$manager->persist($city1832); 
//
//		$city1833= new City();
//		$city1833->setId(1833);
//		$city1833->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1833->setName('Раково');
//		$manager->persist($city1833); 
//
//		$city1834= new City();
//		$city1834->setId(1834);
//		$city1834->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1834->setName('Раковчик');
//		$manager->persist($city1834); 
//
//		$city1835= new City();
//		$city1835->setId(1835);
//		$city1835->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1835->setName('Ракошино');
//		$manager->persist($city1835); 
//
//		$city1836= new City();
//		$city1836->setId(1836);
//		$city1836->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1836->setName('Рассошенцы');
//		$manager->persist($city1836); 
//
//		$city1837= new City();
//		$city1837->setId(1837);
//		$city1837->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1837->setName('Ратно');
//		$manager->persist($city1837); 
//
//		$city1838= new City();
//		$city1838->setId(1838);
//		$city1838->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1838->setName('Ратнов');
//		$manager->persist($city1838); 
//
//		$city1839= new City();
//		$city1839->setId(1839);
//		$city1839->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1839->setName('Ратовцы');
//		$manager->persist($city1839); 
//
//		$city1840= new City();
//		$city1840->setId(1840);
//		$city1840->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1840->setName('Рафайловка');
//		$manager->persist($city1840); 
//
//		$city1841= new City();
//		$city1841->setId(1841);
//		$city1841->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1841->setName('Рафаловка');
//		$manager->persist($city1841); 
//
//		$city1842= new City();
//		$city1842->setId(1842);
//		$city1842->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1842->setName('Рахов');
//		$manager->persist($city1842); 
//
//		$city1843= new City();
//		$city1843->setId(1843);
//		$city1843->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1843->setName('Рацево');
//		$manager->persist($city1843); 
//
//		$city1844= new City();
//		$city1844->setId(1844);
//		$city1844->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1844->setName('Рачин');
//		$manager->persist($city1844); 
//
//		$city1845= new City();
//		$city1845->setId(1845);
//		$city1845->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1845->setName('Рачин');
//		$manager->persist($city1845); 
//
//		$city1846= new City();
//		$city1846->setId(1846);
//		$city1846->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1846->setName('Рени');
//		$manager->persist($city1846); 
//
//		$city1847= new City();
//		$city1847->setId(1847);
//		$city1847->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1847->setName('Репки');
//		$manager->persist($city1847); 
//
//		$city1848= new City();
//		$city1848->setId(1848);
//		$city1848->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1848->setName('Решетиловка');
//		$manager->persist($city1848); 
//
//		$city1849= new City();
//		$city1849->setId(1849);
//		$city1849->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1849->setName('Ржищев');
//		$manager->persist($city1849); 
//
//		$city1850= new City();
//		$city1850->setId(1850);
//		$city1850->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1850->setName('Ровеньки');
//		$manager->persist($city1850); 
//
//		$city1851= new City();
//		$city1851->setId(1851);
//		$city1851->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1851->setName('Ровно');
//		$manager->persist($city1851); 
//
//		$city1852= new City();
//		$city1852->setId(1852);
//		$city1852->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1852->setName('Ровное');
//		$manager->persist($city1852); 
//
//		$city1853= new City();
//		$city1853->setId(1853);
//		$city1853->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1853->setName('Ровное');
//		$manager->persist($city1853); 
//
//		$city1854= new City();
//		$city1854->setId(1854);
//		$city1854->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1854->setName('Ровное (Кировоград, Новоукраинский р-н)');
//		$manager->persist($city1854); 
//
//		$city1855= new City();
//		$city1855->setId(1855);
//		$city1855->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1855->setName('Ровное');
//		$manager->persist($city1855); 
//
//		$city1856= new City();
//		$city1856->setId(1856);
//		$city1856->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1856->setName('Рогань');
//		$manager->persist($city1856); 
//
//		$city1857= new City();
//		$city1857->setId(1857);
//		$city1857->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1857->setName('Рогатин');
//		$manager->persist($city1857); 
//
//		$city1858= new City();
//		$city1858->setId(1858);
//		$city1858->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1858->setName('Рогачин');
//		$manager->persist($city1858); 
//
//		$city1859= new City();
//		$city1859->setId(1859);
//		$city1859->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1859->setName('Рогозов');
//		$manager->persist($city1859); 
//
//		$city1860= new City();
//		$city1860->setId(1860);
//		$city1860->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1860->setName('Родаково');
//		$manager->persist($city1860); 
//
//		$city1861= new City();
//		$city1861->setId(1861);
//		$city1861->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1861->setName('Родинское');
//		$manager->persist($city1861); 
//
//		$city1862= new City();
//		$city1862->setId(1862);
//		$city1862->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1862->setName('Родниковое');
//		$manager->persist($city1862); 
//
//		$city1863= new City();
//		$city1863->setId(1863);
//		$city1863->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1863->setName('Рожище');
//		$manager->persist($city1863); 
//
//		$city1864= new City();
//		$city1864->setId(1864);
//		$city1864->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1864->setName('Рожны');
//		$manager->persist($city1864); 
//
//		$city1865= new City();
//		$city1865->setId(1865);
//		$city1865->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1865->setName('Рожнятов');
//		$manager->persist($city1865); 
//
//		$city1866= new City();
//		$city1866->setId(1866);
//		$city1866->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1866->setName('Розвадов');
//		$manager->persist($city1866); 
//
//		$city1867= new City();
//		$city1867->setId(1867);
//		$city1867->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1867->setName('Розгирче');
//		$manager->persist($city1867); 
//
//		$city1868= new City();
//		$city1868->setId(1868);
//		$city1868->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1868->setName('Роздол');
//		$manager->persist($city1868); 
//
//		$city1869= new City();
//		$city1869->setId(1869);
//		$city1869->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1869->setName('Роздольное');
//		$manager->persist($city1869); 
//
//		$city1870= new City();
//		$city1870->setId(1870);
//		$city1870->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1870->setName('Розовка');
//		$manager->persist($city1870); 
//
//		$city1871= new City();
//		$city1871->setId(1871);
//		$city1871->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1871->setName('Розовка');
//		$manager->persist($city1871); 
//
//		$city1872= new City();
//		$city1872->setId(1872);
//		$city1872->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1872->setName('Розтоки');
//		$manager->persist($city1872); 
//
//		$city1873= new City();
//		$city1873->setId(1873);
//		$city1873->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1873->setName('Рокини');
//		$manager->persist($city1873); 
//
//		$city1874= new City();
//		$city1874->setId(1874);
//		$city1874->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1874->setName('Рокитное (Ровно)');
//		$manager->persist($city1874); 
//
//		$city1875= new City();
//		$city1875->setId(1875);
//		$city1875->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1875->setName('Рокитное');
//		$manager->persist($city1875); 
//
//		$city1876= new City();
//		$city1876->setId(1876);
//		$city1876->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1876->setName('Рокосово');
//		$manager->persist($city1876); 
//
//		$city1877= new City();
//		$city1877->setId(1877);
//		$city1877->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1877->setName('Романины');
//		$manager->persist($city1877); 
//
//		$city1878= new City();
//		$city1878->setId(1878);
//		$city1878->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city1878->setName('Романов');
//		$manager->persist($city1878); 
//
//		$city1879= new City();
//		$city1879->setId(1879);
//		$city1879->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1879->setName('Романов');
//		$manager->persist($city1879); 
//
//		$city1880= new City();
//		$city1880->setId(1880);
//		$city1880->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1880->setName('Ромны');
//		$manager->persist($city1880); 
//
//		$city1881= new City();
//		$city1881->setId(1881);
//		$city1881->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1881->setName('Росава');
//		$manager->persist($city1881); 
//
//		$city1882= new City();
//		$city1882->setId(1882);
//		$city1882->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1882->setName('Роскошная');
//		$manager->persist($city1882); 
//
//		$city1883= new City();
//		$city1883->setId(1883);
//		$city1883->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1883->setName('Роскошное');
//		$manager->persist($city1883); 
//
//		$city1884= new City();
//		$city1884->setId(1884);
//		$city1884->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1884->setName('Рославичи');
//		$manager->persist($city1884); 
//
//		$city1885= new City();
//		$city1885->setId(1885);
//		$city1885->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1885->setName('Росохач');
//		$manager->persist($city1885); 
//
//		$city1886= new City();
//		$city1886->setId(1886);
//		$city1886->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1886->setName('Росоша');
//		$manager->persist($city1886); 
//
//		$city1887= new City();
//		$city1887->setId(1887);
//		$city1887->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1887->setName('Россоша');
//		$manager->persist($city1887); 
//
//		$city1888= new City();
//		$city1888->setId(1888);
//		$city1888->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1888->setName('Ростоки');
//		$manager->persist($city1888); 
//
//		$city1889= new City();
//		$city1889->setId(1889);
//		$city1889->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1889->setName('Ротмистровка');
//		$manager->persist($city1889); 
//
//		$city1890= new City();
//		$city1890->setId(1890);
//		$city1890->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1890->setName('Рубежное');
//		$manager->persist($city1890); 
//
//		$city1891= new City();
//		$city1891->setId(1891);
//		$city1891->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1891->setName('Рудки');
//		$manager->persist($city1891); 
//
//		$city1892= new City();
//		$city1892->setId(1892);
//		$city1892->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1892->setName('Руднево');
//		$manager->persist($city1892); 
//
//		$city1893= new City();
//		$city1893->setId(1893);
//		$city1893->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1893->setName('Рудница');
//		$manager->persist($city1893); 
//
//		$city1894= new City();
//		$city1894->setId(1894);
//		$city1894->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1894->setName('Рудно');
//		$manager->persist($city1894); 
//
//		$city1895= new City();
//		$city1895->setId(1895);
//		$city1895->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1895->setName('Рудня-новенькая');
//		$manager->persist($city1895); 
//
//		$city1896= new City();
//		$city1896->setId(1896);
//		$city1896->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1896->setName('Ружин');
//		$manager->persist($city1896); 
//
//		$city1897= new City();
//		$city1897->setId(1897);
//		$city1897->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1897->setName('Русановцы');
//		$manager->persist($city1897); 
//
//		$city1898= new City();
//		$city1898->setId(1898);
//		$city1898->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1898->setName('Русская поляна');
//		$manager->persist($city1898); 
//
//		$city1899= new City();
//		$city1899->setId(1899);
//		$city1899->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1899->setName('Рыбаковка');
//		$manager->persist($city1899); 
//
//		$city1900= new City();
//		$city1900->setId(1900);
//		$city1900->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1900->setName('Рыбинск');
//		$manager->persist($city1900); 
//
//		$city1901= new City();
//		$city1901->setId(1901);
//		$city1901->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1901->setName('Рыхтичи');
//		$manager->persist($city1901); 
//
//		$city1902= new City();
//		$city1902->setId(1902);
//		$city1902->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1902->setName('с. Воссиятское');
//		$manager->persist($city1902); 
//
//		$city1903= new City();
//		$city1903->setId(1903);
//		$city1903->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1903->setName('с. Литвинец');
//		$manager->persist($city1903); 
//
//		$city1904= new City();
//		$city1904->setId(1904);
//		$city1904->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1904->setName('с. Лозуватка');
//		$manager->persist($city1904); 
//
//		$city1905= new City();
//		$city1905->setId(1905);
//		$city1905->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1905->setName('с. Михайловка');
//		$manager->persist($city1905); 
//
//		$city1906= new City();
//		$city1906->setId(1906);
//		$city1906->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1906->setName('с. Поповцы');
//		$manager->persist($city1906); 
//
//		$city1907= new City();
//		$city1907->setId(1907);
//		$city1907->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1907->setName('Савинцы');
//		$manager->persist($city1907); 
//
//		$city1908= new City();
//		$city1908->setId(1908);
//		$city1908->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1908->setName('Саврань');
//		$manager->persist($city1908); 
//
//		$city1909= new City();
//		$city1909->setId(1909);
//		$city1909->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1909->setName('Сагуновка');
//		$manager->persist($city1909); 
//
//		$city1910= new City();
//		$city1910->setId(1910);
//		$city1910->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1910->setName('Сад');
//		$manager->persist($city1910); 
//
//		$city1911= new City();
//		$city1911->setId(1911);
//		$city1911->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1911->setName('Саджава');
//		$manager->persist($city1911); 
//
//		$city1912= new City();
//		$city1912->setId(1912);
//		$city1912->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city1912->setName('Саджавка');
//		$manager->persist($city1912); 
//
//		$city1913= new City();
//		$city1913->setId(1913);
//		$city1913->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1913->setName('Садовое');
//		$manager->persist($city1913); 
//
//		$city1914= new City();
//		$city1914->setId(1914);
//		$city1914->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1914->setName('Саки');
//		$manager->persist($city1914); 
//
//		$city1915= new City();
//		$city1915->setId(1915);
//		$city1915->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1915->setName('Салганы');
//		$manager->persist($city1915); 
//
//		$city1916= new City();
//		$city1916->setId(1916);
//		$city1916->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1916->setName('Саливонки');
//		$manager->persist($city1916); 
//
//		$city1917= new City();
//		$city1917->setId(1917);
//		$city1917->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1917->setName('Сальково');
//		$manager->persist($city1917); 
//
//		$city1918= new City();
//		$city1918->setId(1918);
//		$city1918->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1918->setName('Самбор');
//		$manager->persist($city1918); 
//
//		$city1919= new City();
//		$city1919->setId(1919);
//		$city1919->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1919->setName('Самгородок');
//		$manager->persist($city1919); 
//
//		$city1920= new City();
//		$city1920->setId(1920);
//		$city1920->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1920->setName('Самотоевка');
//		$manager->persist($city1920); 
//
//		$city1921= new City();
//		$city1921->setId(1921);
//		$city1921->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1921->setName('Самсоновка');
//		$manager->persist($city1921); 
//
//		$city1922= new City();
//		$city1922->setId(1922);
//		$city1922->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1922->setName('Санаторное');
//		$manager->persist($city1922); 
//
//		$city1923= new City();
//		$city1923->setId(1923);
//		$city1923->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1923->setName('Саранчуки');
//		$manager->persist($city1923); 
//
//		$city1924= new City();
//		$city1924->setId(1924);
//		$city1924->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1924->setName('Сарата');
//		$manager->persist($city1924); 
//
//		$city1925= new City();
//		$city1925->setId(1925);
//		$city1925->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1925->setName('Сарны');
//		$manager->persist($city1925); 
//
//		$city1926= new City();
//		$city1926->setId(1926);
//		$city1926->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1926->setName('Сартана');
//		$manager->persist($city1926); 
//
//		$city1927= new City();
//		$city1927->setId(1927);
//		$city1927->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1927->setName('Сасово');
//		$manager->persist($city1927); 
//
//		$city1928= new City();
//		$city1928->setId(1928);
//		$city1928->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1928->setName('Сатанив');
//		$manager->persist($city1928); 
//
//		$city1929= new City();
//		$city1929->setId(1929);
//		$city1929->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1929->setName('Сафьяны');
//		$manager->persist($city1929); 
//
//		$city1930= new City();
//		$city1930->setId(1930);
//		$city1930->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1930->setName('Сахкамень');
//		$manager->persist($city1930); 
//
//		$city1931= new City();
//		$city1931->setId(1931);
//		$city1931->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1931->setName('Сахновщина');
//		$manager->persist($city1931); 
//
//		$city1932= new City();
//		$city1932->setId(1932);
//		$city1932->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1932->setName('Свалява');
//		$manager->persist($city1932); 
//
//		$city1933= new City();
//		$city1933->setId(1933);
//		$city1933->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1933->setName('Сватово');
//		$manager->persist($city1933); 
//
//		$city1934= new City();
//		$city1934->setId(1934);
//		$city1934->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1934->setName('Свердловск');
//		$manager->persist($city1934); 
//
//		$city1935= new City();
//		$city1935->setId(1935);
//		$city1935->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1935->setName('Свеса');
//		$manager->persist($city1935); 
//
//		$city1936= new City();
//		$city1936->setId(1936);
//		$city1936->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city1936->setName('Светловодск');
//		$manager->persist($city1936); 
//
//		$city1937= new City();
//		$city1937->setId(1937);
//		$city1937->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1937->setName('Светлогорское');
//		$manager->persist($city1937); 
//
//		$city1938= new City();
//		$city1938->setId(1938);
//		$city1938->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1938->setName('Светлодарск');
//		$manager->persist($city1938); 
//
//		$city1939= new City();
//		$city1939->setId(1939);
//		$city1939->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1939->setName('Свидовок');
//		$manager->persist($city1939); 
//
//		$city1940= new City();
//		$city1940->setId(1940);
//		$city1940->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1940->setName('Свитанок');
//		$manager->persist($city1940); 
//
//		$city1941= new City();
//		$city1941->setId(1941);
//		$city1941->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1941->setName('Святиловка');
//		$manager->persist($city1941); 
//
//		$city1942= new City();
//		$city1942->setId(1942);
//		$city1942->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1942->setName('Святогорск');
//		$manager->persist($city1942); 
//
//		$city1943= new City();
//		$city1943->setId(1943);
//		$city1943->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1943->setName('Севастополь');
//		$manager->persist($city1943); 
//
//		$city1944= new City();
//		$city1944->setId(1944);
//		$city1944->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1944->setName('Севериновка');
//		$manager->persist($city1944); 
//
//		$city1945= new City();
//		$city1945->setId(1945);
//		$city1945->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1945->setName('Северодонецк');
//		$manager->persist($city1945); 
//
//		$city1946= new City();
//		$city1946->setId(1946);
//		$city1946->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1946->setName('Северск');
//		$manager->persist($city1946); 
//
//		$city1947= new City();
//		$city1947->setId(1947);
//		$city1947->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1947->setName('Седнев');
//		$manager->persist($city1947); 
//
//		$city1948= new City();
//		$city1948->setId(1948);
//		$city1948->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1948->setName('Селезневка');
//		$manager->persist($city1948); 
//
//		$city1949= new City();
//		$city1949->setId(1949);
//		$city1949->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1949->setName('Селещина');
//		$manager->persist($city1949); 
//
//		$city1950= new City();
//		$city1950->setId(1950);
//		$city1950->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1950->setName('Селидово');
//		$manager->persist($city1950); 
//
//		$city1951= new City();
//		$city1951->setId(1951);
//		$city1951->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city1951->setName('Селище');
//		$manager->persist($city1951); 
//
//		$city1952= new City();
//		$city1952->setId(1952);
//		$city1952->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1952->setName('Селище');
//		$manager->persist($city1952); 
//
//		$city1953= new City();
//		$city1953->setId(1953);
//		$city1953->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city1953->setName('Селище');
//		$manager->persist($city1953); 
//
//		$city1954= new City();
//		$city1954->setId(1954);
//		$city1954->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city1954->setName('Селятин');
//		$manager->persist($city1954); 
//
//		$city1955= new City();
//		$city1955->setId(1955);
//		$city1955->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city1955->setName('Семеновка');
//		$manager->persist($city1955); 
//
//		$city1956= new City();
//		$city1956->setId(1956);
//		$city1956->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city1956->setName('Семеновка (Кременчуг)');
//		$manager->persist($city1956); 
//
//		$city1957= new City();
//		$city1957->setId(1957);
//		$city1957->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1957->setName('Семеновка (Черниговская обл.)');
//		$manager->persist($city1957); 
//
//		$city1958= new City();
//		$city1958->setId(1958);
//		$city1958->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1958->setName('Семеновка');
//		$manager->persist($city1958); 
//
//		$city1959= new City();
//		$city1959->setId(1959);
//		$city1959->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1959->setName('Семиполки');
//		$manager->persist($city1959); 
//
//		$city1960= new City();
//		$city1960->setId(1960);
//		$city1960->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1960->setName('Семихатка');
//		$manager->persist($city1960); 
//
//		$city1961= new City();
//		$city1961->setId(1961);
//		$city1961->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1961->setName('Сенокосное');
//		$manager->persist($city1961); 
//
//		$city1962= new City();
//		$city1962->setId(1962);
//		$city1962->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1962->setName('Сеньковка');
//		$manager->persist($city1962); 
//
//		$city1963= new City();
//		$city1963->setId(1963);
//		$city1963->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1963->setName('Сеньковка');
//		$manager->persist($city1963); 
//
//		$city1964= new City();
//		$city1964->setId(1964);
//		$city1964->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city1964->setName('Сергеевка');
//		$manager->persist($city1964); 
//
//		$city1965= new City();
//		$city1965->setId(1965);
//		$city1965->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1965->setName('Серебряное');
//		$manager->persist($city1965); 
//
//		$city1966= new City();
//		$city1966->setId(1966);
//		$city1966->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1966->setName('Середина-Буда');
//		$manager->persist($city1966); 
//
//		$city1967= new City();
//		$city1967->setId(1967);
//		$city1967->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1967->setName('Серединка');
//		$manager->persist($city1967); 
//
//		$city1968= new City();
//		$city1968->setId(1968);
//		$city1968->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1968->setName('Симеиз');
//		$manager->persist($city1968); 
//
//		$city1969= new City();
//		$city1969->setId(1969);
//		$city1969->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city1969->setName('Симерки');
//		$manager->persist($city1969); 
//
//		$city1970= new City();
//		$city1970->setId(1970);
//		$city1970->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1970->setName('Симферополь');
//		$manager->persist($city1970); 
//
//		$city1971= new City();
//		$city1971->setId(1971);
//		$city1971->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1971->setName('Сингуры');
//		$manager->persist($city1971); 
//
//		$city1972= new City();
//		$city1972->setId(1972);
//		$city1972->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1972->setName('Синельниково');
//		$manager->persist($city1972); 
//
//		$city1973= new City();
//		$city1973->setId(1973);
//		$city1973->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1973->setName('Синяк');
//		$manager->persist($city1973); 
//
//		$city1974= new City();
//		$city1974->setId(1974);
//		$city1974->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1974->setName('Ситковцы');
//		$manager->persist($city1974); 
//
//		$city1975= new City();
//		$city1975->setId(1975);
//		$city1975->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1975->setName('Ситняки');
//		$manager->persist($city1975); 
//
//		$city1976= new City();
//		$city1976->setId(1976);
//		$city1976->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city1976->setName('Скадовск');
//		$manager->persist($city1976); 
//
//		$city1977= new City();
//		$city1977->setId(1977);
//		$city1977->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1977->setName('Скала-Подольская');
//		$manager->persist($city1977); 
//
//		$city1978= new City();
//		$city1978->setId(1978);
//		$city1978->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1978->setName('Скалат');
//		$manager->persist($city1978); 
//
//		$city1979= new City();
//		$city1979->setId(1979);
//		$city1979->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1979->setName('Скалистое');
//		$manager->persist($city1979); 
//
//		$city1980= new City();
//		$city1980->setId(1980);
//		$city1980->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1980->setName('Сквира');
//		$manager->persist($city1980); 
//
//		$city1981= new City();
//		$city1981->setId(1981);
//		$city1981->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city1981->setName('Скворцово');
//		$manager->persist($city1981); 
//
//		$city1982= new City();
//		$city1982->setId(1982);
//		$city1982->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1982->setName('Сколе');
//		$manager->persist($city1982); 
//
//		$city1983= new City();
//		$city1983->setId(1983);
//		$city1983->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city1983->setName('Скоморошки');
//		$manager->persist($city1983); 
//
//		$city1984= new City();
//		$city1984->setId(1984);
//		$city1984->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city1984->setName('Слабин');
//		$manager->persist($city1984); 
//
//		$city1985= new City();
//		$city1985->setId(1985);
//		$city1985->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city1985->setName('Славгород');
//		$manager->persist($city1985); 
//
//		$city1986= new City();
//		$city1986->setId(1986);
//		$city1986->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1986->setName('Славское');
//		$manager->persist($city1986); 
//
//		$city1987= new City();
//		$city1987->setId(1987);
//		$city1987->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1987->setName('Славута');
//		$manager->persist($city1987); 
//
//		$city1988= new City();
//		$city1988->setId(1988);
//		$city1988->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city1988->setName('Славутич');
//		$manager->persist($city1988); 
//
//		$city1989= new City();
//		$city1989->setId(1989);
//		$city1989->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city1989->setName('Славяносербск');
//		$manager->persist($city1989); 
//
//		$city1990= new City();
//		$city1990->setId(1990);
//		$city1990->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city1990->setName('Славянск');
//		$manager->persist($city1990); 
//
//		$city1991= new City();
//		$city1991->setId(1991);
//		$city1991->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city1991->setName('Слатино');
//		$manager->persist($city1991); 
//
//		$city1992= new City();
//		$city1992->setId(1992);
//		$city1992->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city1992->setName('Сливино');
//		$manager->persist($city1992); 
//
//		$city1993= new City();
//		$city1993->setId(1993);
//		$city1993->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1993->setName('Слобода');
//		$manager->persist($city1993); 
//
//		$city1994= new City();
//		$city1994->setId(1994);
//		$city1994->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city1994->setName('Слобода');
//		$manager->persist($city1994); 
//
//		$city1995= new City();
//		$city1995->setId(1995);
//		$city1995->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city1995->setName('Слободище');
//		$manager->persist($city1995); 
//
//		$city1996= new City();
//		$city1996->setId(1996);
//		$city1996->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city1996->setName('Слободка');
//		$manager->persist($city1996); 
//
//		$city1997= new City();
//		$city1997->setId(1997);
//		$city1997->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city1997->setName('Слободка');
//		$manager->persist($city1997); 
//
//		$city1998= new City();
//		$city1998->setId(1998);
//		$city1998->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1998->setName('Слободка-гуменецкая');
//		$manager->persist($city1998); 
//
//		$city1999= new City();
//		$city1999->setId(1999);
//		$city1999->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city1999->setName('Слободка-рыхтивская');
//		$manager->persist($city1999); 
//
//		$city2000= new City();
//		$city2000->setId(2000);
//		$city2000->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2000->setName('Словяносербка');
//		$manager->persist($city2000); 
//
//		$city2001= new City();
//		$city2001->setId(2001);
//		$city2001->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2001->setName('Смела');
//		$manager->persist($city2001); 
//
//		$city2002= new City();
//		$city2002->setId(2002);
//		$city2002->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2002->setName('Смелое');
//		$manager->persist($city2002); 
//
//		$city2003= new City();
//		$city2003->setId(2003);
//		$city2003->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2003->setName('Смодна');
//		$manager->persist($city2003); 
//
//		$city2004= new City();
//		$city2004->setId(2004);
//		$city2004->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2004->setName('Смолино');
//		$manager->persist($city2004); 
//
//		$city2005= new City();
//		$city2005->setId(2005);
//		$city2005->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2005->setName('Смотрич');
//		$manager->persist($city2005); 
//
//		$city2006= new City();
//		$city2006->setId(2006);
//		$city2006->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2006->setName('Смыга');
//		$manager->persist($city2006); 
//
//		$city2007= new City();
//		$city2007->setId(2007);
//		$city2007->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2007->setName('Смыковцы');
//		$manager->persist($city2007); 
//
//		$city2008= new City();
//		$city2008->setId(2008);
//		$city2008->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2008->setName('Снежное');
//		$manager->persist($city2008); 
//
//		$city2009= new City();
//		$city2009->setId(2009);
//		$city2009->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city2009->setName('Снигиревка');
//		$manager->persist($city2009); 
//
//		$city2010= new City();
//		$city2010->setId(2010);
//		$city2010->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2010->setName('Снятин');
//		$manager->persist($city2010); 
//
//		$city2011= new City();
//		$city2011->setId(2011);
//		$city2011->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2011->setName('Снятын');
//		$manager->persist($city2011); 
//
//		$city2012= new City();
//		$city2012->setId(2012);
//		$city2012->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2012->setName('Собич');
//		$manager->persist($city2012); 
//
//		$city2013= new City();
//		$city2013->setId(2013);
//		$city2013->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2013->setName('Соболевка');
//		$manager->persist($city2013); 
//
//		$city2014= new City();
//		$city2014->setId(2014);
//		$city2014->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2014->setName('Советский');
//		$manager->persist($city2014); 
//
//		$city2015= new City();
//		$city2015->setId(2015);
//		$city2015->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2015->setName('Советское');
//		$manager->persist($city2015); 
//
//		$city2016= new City();
//		$city2016->setId(2016);
//		$city2016->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2016->setName('Созоновка');
//		$manager->persist($city2016); 
//
//		$city2017= new City();
//		$city2017->setId(2017);
//		$city2017->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2017->setName('Сокаль');
//		$manager->persist($city2017); 
//
//		$city2018= new City();
//		$city2018->setId(2018);
//		$city2018->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2018->setName('Сокиринцы');
//		$manager->persist($city2018); 
//
//		$city2019= new City();
//		$city2019->setId(2019);
//		$city2019->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2019->setName('Сокиричи');
//		$manager->persist($city2019); 
//
//		$city2020= new City();
//		$city2020->setId(2020);
//		$city2020->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2020->setName('Сокирница');
//		$manager->persist($city2020); 
//
//		$city2021= new City();
//		$city2021->setId(2021);
//		$city2021->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2021->setName('Сокиряны');
//		$manager->persist($city2021); 
//
//		$city2022= new City();
//		$city2022->setId(2022);
//		$city2022->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2022->setName('Соколец');
//		$manager->persist($city2022); 
//
//		$city2023= new City();
//		$city2023->setId(2023);
//		$city2023->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2023->setName('Соколовка');
//		$manager->persist($city2023); 
//
//		$city2024= new City();
//		$city2024->setId(2024);
//		$city2024->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2024->setName('Соколовское');
//		$manager->persist($city2024); 
//
//		$city2025= new City();
//		$city2025->setId(2025);
//		$city2025->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2025->setName('Сокольники');
//		$manager->persist($city2025); 
//
//		$city2026= new City();
//		$city2026->setId(2026);
//		$city2026->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2026->setName('Соледар');
//		$manager->persist($city2026); 
//
//		$city2027= new City();
//		$city2027->setId(2027);
//		$city2027->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2027->setName('Соленое');
//		$manager->persist($city2027); 
//
//		$city2028= new City();
//		$city2028->setId(2028);
//		$city2028->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2028->setName('Солнечное');
//		$manager->persist($city2028); 
//
//		$city2029= new City();
//		$city2029->setId(2029);
//		$city2029->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2029->setName('Солнечное');
//		$manager->persist($city2029); 
//
//		$city2030= new City();
//		$city2030->setId(2030);
//		$city2030->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2030->setName('Соломоново');
//		$manager->persist($city2030); 
//
//		$city2031= new City();
//		$city2031->setId(2031);
//		$city2031->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2031->setName('Солонив');
//		$manager->persist($city2031); 
//
//		$city2032= new City();
//		$city2032->setId(2032);
//		$city2032->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2032->setName('Солоницевка');
//		$manager->persist($city2032); 
//
//		$city2033= new City();
//		$city2033->setId(2033);
//		$city2033->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2033->setName('Солонка');
//		$manager->persist($city2033); 
//
//		$city2034= new City();
//		$city2034->setId(2034);
//		$city2034->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2034->setName('Солотвин');
//		$manager->persist($city2034); 
//
//		$city2035= new City();
//		$city2035->setId(2035);
//		$city2035->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2035->setName('Солотвино');
//		$manager->persist($city2035); 
//
//		$city2036= new City();
//		$city2036->setId(2036);
//		$city2036->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2036->setName('Соляное');
//		$manager->persist($city2036); 
//
//		$city2037= new City();
//		$city2037->setId(2037);
//		$city2037->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2037->setName('Сопов');
//		$manager->persist($city2037); 
//
//		$city2038= new City();
//		$city2038->setId(2038);
//		$city2038->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2038->setName('Сосница');
//		$manager->persist($city2038); 
//
//		$city2039= new City();
//		$city2039->setId(2039);
//		$city2039->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2039->setName('Сосновка');
//		$manager->persist($city2039); 
//
//		$city2040= new City();
//		$city2040->setId(2040);
//		$city2040->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2040->setName('Сосновка');
//		$manager->persist($city2040); 
//
//		$city2041= new City();
//		$city2041->setId(2041);
//		$city2041->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2041->setName('Сосновое');
//		$manager->persist($city2041); 
//
//		$city2042= new City();
//		$city2042->setId(2042);
//		$city2042->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2042->setName('Сосоновка');
//		$manager->persist($city2042); 
//
//		$city2043= new City();
//		$city2043->setId(2043);
//		$city2043->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2043->setName('Софиевка');
//		$manager->persist($city2043); 
//
//		$city2044= new City();
//		$city2044->setId(2044);
//		$city2044->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2044->setName('Софиевская Борщаговка');
//		$manager->persist($city2044); 
//
//		$city2045= new City();
//		$city2045->setId(2045);
//		$city2045->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2045->setName('Софиевский');
//		$manager->persist($city2045); 
//
//		$city2046= new City();
//		$city2046->setId(2046);
//		$city2046->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2046->setName('Спартак');
//		$manager->persist($city2046); 
//
//		$city2047= new City();
//		$city2047->setId(2047);
//		$city2047->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2047->setName('Среднее');
//		$manager->persist($city2047); 
//
//		$city2048= new City();
//		$city2048->setId(2048);
//		$city2048->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2048->setName('Среднее водяное');
//		$manager->persist($city2048); 
//
//		$city2049= new City();
//		$city2049->setId(2049);
//		$city2049->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2049->setName('Средний бабин');
//		$manager->persist($city2049); 
//
//		$city2050= new City();
//		$city2050->setId(2050);
//		$city2050->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2050->setName('Ставище');
//		$manager->persist($city2050); 
//
//		$city2051= new City();
//		$city2051->setId(2051);
//		$city2051->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2051->setName('Стайки');
//		$manager->persist($city2051); 
//
//		$city2052= new City();
//		$city2052->setId(2052);
//		$city2052->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2052->setName('Станица Луганская');
//		$manager->persist($city2052); 
//
//		$city2053= new City();
//		$city2053->setId(2053);
//		$city2053->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2053->setName('Станишовка');
//		$manager->persist($city2053); 
//
//		$city2054= new City();
//		$city2054->setId(2054);
//		$city2054->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2054->setName('Старая Выжевка');
//		$manager->persist($city2054); 
//
//		$city2055= new City();
//		$city2055->setId(2055);
//		$city2055->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2055->setName('Старая збурьевка');
//		$manager->persist($city2055); 
//
//		$city2056= new City();
//		$city2056->setId(2056);
//		$city2056->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2056->setName('Старая ивановка');
//		$manager->persist($city2056); 
//
//		$city2057= new City();
//		$city2057->setId(2057);
//		$city2057->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2057->setName('Старая некрасовка');
//		$manager->persist($city2057); 
//
//		$city2058= new City();
//		$city2058->setId(2058);
//		$city2058->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2058->setName('Старая Синява');
//		$manager->persist($city2058); 
//
//		$city2059= new City();
//		$city2059->setId(2059);
//		$city2059->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2059->setName('Старобельск');
//		$manager->persist($city2059); 
//
//		$city2060= new City();
//		$city2060->setId(2060);
//		$city2060->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2060->setName('Старобешево');
//		$manager->persist($city2060); 
//
//		$city2061= new City();
//		$city2061->setId(2061);
//		$city2061->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2061->setName('Староверовка');
//		$manager->persist($city2061); 
//
//		$city2062= new City();
//		$city2062->setId(2062);
//		$city2062->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2062->setName('Старовойтово');
//		$manager->persist($city2062); 
//
//		$city2063= new City();
//		$city2063->setId(2063);
//		$city2063->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2063->setName('Старое');
//		$manager->persist($city2063); 
//
//		$city2064= new City();
//		$city2064->setId(2064);
//		$city2064->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2064->setName('Старое село');
//		$manager->persist($city2064); 
//
//		$city2065= new City();
//		$city2065->setId(2065);
//		$city2065->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2065->setName('Староконстантинов');
//		$manager->persist($city2065); 
//
//		$city2066= new City();
//		$city2066->setId(2066);
//		$city2066->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2066->setName('Старомихайловка');
//		$manager->persist($city2066); 
//
//		$city2067= new City();
//		$city2067->setId(2067);
//		$city2067->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2067->setName('Староселье');
//		$manager->persist($city2067); 
//
//		$city2068= new City();
//		$city2068->setId(2068);
//		$city2068->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2068->setName('Старые бабаны');
//		$manager->persist($city2068); 
//
//		$city2069= new City();
//		$city2069->setId(2069);
//		$city2069->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2069->setName('Старые кодаки');
//		$manager->persist($city2069); 
//
//		$city2070= new City();
//		$city2070->setId(2070);
//		$city2070->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2070->setName('Старые петровцы');
//		$manager->persist($city2070); 
//
//		$city2071= new City();
//		$city2071->setId(2071);
//		$city2071->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2071->setName('Старый белоус');
//		$manager->persist($city2071); 
//
//		$city2072= new City();
//		$city2072->setId(2072);
//		$city2072->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2072->setName('Старый косов');
//		$manager->persist($city2072); 
//
//		$city2073= new City();
//		$city2073->setId(2073);
//		$city2073->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2073->setName('Старый кривин');
//		$manager->persist($city2073); 
//
//		$city2074= new City();
//		$city2074->setId(2074);
//		$city2074->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2074->setName('Старый крым');
//		$manager->persist($city2074); 
//
//		$city2075= new City();
//		$city2075->setId(2075);
//		$city2075->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2075->setName('Старый Крым');
//		$manager->persist($city2075); 
//
//		$city2076= new City();
//		$city2076->setId(2076);
//		$city2076->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2076->setName('Старый Мерчик');
//		$manager->persist($city2076); 
//
//		$city2077= new City();
//		$city2077->setId(2077);
//		$city2077->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2077->setName('Старый Салтов');
//		$manager->persist($city2077); 
//
//		$city2078= new City();
//		$city2078->setId(2078);
//		$city2078->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2078->setName('Старый Самбор');
//		$manager->persist($city2078); 
//
//		$city2079= new City();
//		$city2079->setId(2079);
//		$city2079->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2079->setName('Старый солотвин');
//		$manager->persist($city2079); 
//
//		$city2080= new City();
//		$city2080->setId(2080);
//		$city2080->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2080->setName('Старый ярычев');
//		$manager->persist($city2080); 
//
//		$city2081= new City();
//		$city2081->setId(2081);
//		$city2081->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2081->setName('Стаханов');
//		$manager->persist($city2081); 
//
//		$city2082= new City();
//		$city2082->setId(2082);
//		$city2082->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2082->setName('Стеблев');
//		$manager->persist($city2082); 
//
//		$city2083= new City();
//		$city2083->setId(2083);
//		$city2083->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2083->setName('Стеблевка');
//		$manager->persist($city2083); 
//
//		$city2084= new City();
//		$city2084->setId(2084);
//		$city2084->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2084->setName('Стебник');
//		$manager->persist($city2084); 
//
//		$city2085= new City();
//		$city2085->setId(2085);
//		$city2085->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2085->setName('Степановка');
//		$manager->persist($city2085); 
//
//		$city2086= new City();
//		$city2086->setId(2086);
//		$city2086->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2086->setName('Степановка');
//		$manager->persist($city2086); 
//
//		$city2087= new City();
//		$city2087->setId(2087);
//		$city2087->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2087->setName('Степань');
//		$manager->persist($city2087); 
//
//		$city2088= new City();
//		$city2088->setId(2088);
//		$city2088->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2088->setName('Стецковка');
//		$manager->persist($city2088); 
//
//		$city2089= new City();
//		$city2089->setId(2089);
//		$city2089->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2089->setName('Стожково');
//		$manager->persist($city2089); 
//
//		$city2090= new City();
//		$city2090->setId(2090);
//		$city2090->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2090->setName('Стопчатов');
//		$manager->persist($city2090); 
//
//		$city2091= new City();
//		$city2091->setId(2091);
//		$city2091->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2091->setName('Сторожинец');
//		$manager->persist($city2091); 
//
//		$city2092= new City();
//		$city2092->setId(2092);
//		$city2092->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2092->setName('Сторонибабы');
//		$manager->persist($city2092); 
//
//		$city2093= new City();
//		$city2093->setId(2093);
//		$city2093->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2093->setName('Стоянка');
//		$manager->persist($city2093); 
//
//		$city2094= new City();
//		$city2094->setId(2094);
//		$city2094->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2094->setName('Страбычово');
//		$manager->persist($city2094); 
//
//		$city2095= new City();
//		$city2095->setId(2095);
//		$city2095->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2095->setName('Страдч');
//		$manager->persist($city2095); 
//
//		$city2096= new City();
//		$city2096->setId(2096);
//		$city2096->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2096->setName('Страшевичи');
//		$manager->persist($city2096); 
//
//		$city2097= new City();
//		$city2097->setId(2097);
//		$city2097->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2097->setName('Стриганы');
//		$manager->persist($city2097); 
//
//		$city2098= new City();
//		$city2098->setId(2098);
//		$city2098->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2098->setName('Стрижавка');
//		$manager->persist($city2098); 
//
//		$city2099= new City();
//		$city2099->setId(2099);
//		$city2099->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2099->setName('Стрижевка');
//		$manager->persist($city2099); 
//
//		$city2100= new City();
//		$city2100->setId(2100);
//		$city2100->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2100->setName('Строинцы');
//		$manager->persist($city2100); 
//
//		$city2101= new City();
//		$city2101->setId(2101);
//		$city2101->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2101->setName('Струга');
//		$manager->persist($city2101); 
//
//		$city2102= new City();
//		$city2102->setId(2102);
//		$city2102->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2102->setName('Струмовка');
//		$manager->persist($city2102); 
//
//		$city2103= new City();
//		$city2103->setId(2103);
//		$city2103->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2103->setName('Струсов');
//		$manager->persist($city2103); 
//
//		$city2104= new City();
//		$city2104->setId(2104);
//		$city2104->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2104->setName('Стрый');
//		$manager->persist($city2104); 
//
//		$city2105= new City();
//		$city2105->setId(2105);
//		$city2105->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2105->setName('Студеная');
//		$manager->persist($city2105); 
//
//		$city2106= new City();
//		$city2106->setId(2106);
//		$city2106->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2106->setName('Ступки');
//		$manager->persist($city2106); 
//
//		$city2107= new City();
//		$city2107->setId(2107);
//		$city2107->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2107->setName('Стуфчинцы');
//		$manager->persist($city2107); 
//
//		$city2108= new City();
//		$city2108->setId(2108);
//		$city2108->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2108->setName('Субботцы');
//		$manager->persist($city2108); 
//
//		$city2109= new City();
//		$city2109->setId(2109);
//		$city2109->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2109->setName('Суворово');
//		$manager->persist($city2109); 
//
//		$city2110= new City();
//		$city2110->setId(2110);
//		$city2110->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2110->setName('Судак');
//		$manager->persist($city2110); 
//
//		$city2111= new City();
//		$city2111->setId(2111);
//		$city2111->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2111->setName('Судилков');
//		$manager->persist($city2111); 
//
//		$city2112= new City();
//		$city2112->setId(2112);
//		$city2112->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2112->setName('Судовая вишня');
//		$manager->persist($city2112); 
//
//		$city2113= new City();
//		$city2113->setId(2113);
//		$city2113->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2113->setName('Сумы');
//		$manager->persist($city2113); 
//
//		$city2114= new City();
//		$city2114->setId(2114);
//		$city2114->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2114->setName('Сурско-литовское');
//		$manager->persist($city2114); 
//
//		$city2115= new City();
//		$city2115->setId(2115);
//		$city2115->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2115->setName('Суск');
//		$manager->persist($city2115); 
//
//		$city2116= new City();
//		$city2116->setId(2116);
//		$city2116->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2116->setName('Суслы');
//		$manager->persist($city2116); 
//
//		$city2117= new City();
//		$city2117->setId(2117);
//		$city2117->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2117->setName('Сутиски');
//		$manager->persist($city2117); 
//
//		$city2118= new City();
//		$city2118->setId(2118);
//		$city2118->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2118->setName('Суходольск');
//		$manager->persist($city2118); 
//
//		$city2119= new City();
//		$city2119->setId(2119);
//		$city2119->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2119->setName('Сушковка');
//		$manager->persist($city2119); 
//
//		$city2120= new City();
//		$city2120->setId(2120);
//		$city2120->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2120->setName('Сходница');
//		$manager->persist($city2120); 
//
//		$city2121= new City();
//		$city2121->setId(2121);
//		$city2121->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2121->setName('Счастливое');
//		$manager->persist($city2121); 
//
//		$city2122= new City();
//		$city2122->setId(2122);
//		$city2122->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2122->setName('Счастливцево');
//		$manager->persist($city2122); 
//
//		$city2123= new City();
//		$city2123->setId(2123);
//		$city2123->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2123->setName('Счастье');
//		$manager->persist($city2123); 
//
//		$city2124= new City();
//		$city2124->setId(2124);
//		$city2124->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2124->setName('Сычавка');
//		$manager->persist($city2124); 
//
//		$city2125= new City();
//		$city2125->setId(2125);
//		$city2125->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2125->setName('Сюртэ');
//		$manager->persist($city2125); 
//
//		$city2126= new City();
//		$city2126->setId(2126);
//		$city2126->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2126->setName('Сядрине');
//		$manager->persist($city2126); 
//
//		$city2127= new City();
//		$city2127->setId(2127);
//		$city2127->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2127->setName('Табаки');
//		$manager->persist($city2127); 
//
//		$city2128= new City();
//		$city2128->setId(2128);
//		$city2128->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2128->setName('Таврийск');
//		$manager->persist($city2128); 
//
//		$city2129= new City();
//		$city2129->setId(2129);
//		$city2129->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2129->setName('Таврия');
//		$manager->persist($city2129); 
//
//		$city2130= new City();
//		$city2130->setId(2130);
//		$city2130->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2130->setName('Таирово');
//		$manager->persist($city2130); 
//
//		$city2131= new City();
//		$city2131->setId(2131);
//		$city2131->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2131->setName('Талалаевка');
//		$manager->persist($city2131); 
//
//		$city2132= new City();
//		$city2132->setId(2132);
//		$city2132->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2132->setName('Тальное');
//		$manager->persist($city2132); 
//
//		$city2133= new City();
//		$city2133->setId(2133);
//		$city2133->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2133->setName('Тамбовка');
//		$manager->persist($city2133); 
//
//		$city2134= new City();
//		$city2134->setId(2134);
//		$city2134->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2134->setName('Тараканов');
//		$manager->persist($city2134); 
//
//		$city2135= new City();
//		$city2135->setId(2135);
//		$city2135->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2135->setName('Тарановка');
//		$manager->persist($city2135); 
//
//		$city2136= new City();
//		$city2136->setId(2136);
//		$city2136->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2136->setName('Тарасовка');
//		$manager->persist($city2136); 
//
//		$city2137= new City();
//		$city2137->setId(2137);
//		$city2137->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2137->setName('Тарасово');
//		$manager->persist($city2137); 
//
//		$city2138= new City();
//		$city2138->setId(2138);
//		$city2138->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2138->setName('Тараща');
//		$manager->persist($city2138); 
//
//		$city2139= new City();
//		$city2139->setId(2139);
//		$city2139->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2139->setName('Таромское');
//		$manager->persist($city2139); 
//
//		$city2140= new City();
//		$city2140->setId(2140);
//		$city2140->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2140->setName('Тарутино');
//		$manager->persist($city2140); 
//
//		$city2141= new City();
//		$city2141->setId(2141);
//		$city2141->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2141->setName('Татарбунары');
//		$manager->persist($city2141); 
//
//		$city2142= new City();
//		$city2142->setId(2142);
//		$city2142->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2142->setName('Татаров');
//		$manager->persist($city2142); 
//
//		$city2143= new City();
//		$city2143->setId(2143);
//		$city2143->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2143->setName('Тельманово');
//		$manager->persist($city2143); 
//
//		$city2144= new City();
//		$city2144->setId(2144);
//		$city2144->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2144->setName('Теофиполь');
//		$manager->persist($city2144); 
//
//		$city2145= new City();
//		$city2145->setId(2145);
//		$city2145->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2145->setName('Теплик');
//		$manager->persist($city2145); 
//
//		$city2146= new City();
//		$city2146->setId(2146);
//		$city2146->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2146->setName('Тепличное');
//		$manager->persist($city2146); 
//
//		$city2147= new City();
//		$city2147->setId(2147);
//		$city2147->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2147->setName('Тепловка');
//		$manager->persist($city2147); 
//
//		$city2148= new City();
//		$city2148->setId(2148);
//		$city2148->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2148->setName('Теплогорск');
//		$manager->persist($city2148); 
//
//		$city2149= new City();
//		$city2149->setId(2149);
//		$city2149->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2149->setName('Теплодар');
//		$manager->persist($city2149); 
//
//		$city2150= new City();
//		$city2150->setId(2150);
//		$city2150->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2150->setName('Теребовля');
//		$manager->persist($city2150); 
//
//		$city2151= new City();
//		$city2151->setId(2151);
//		$city2151->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2151->setName('Терезино');
//		$manager->persist($city2151); 
//
//		$city2152= new City();
//		$city2152->setId(2152);
//		$city2152->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2152->setName('Тересва');
//		$manager->persist($city2152); 
//
//		$city2153= new City();
//		$city2153->setId(2153);
//		$city2153->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2153->setName('Терешки');
//		$manager->persist($city2153); 
//
//		$city2154= new City();
//		$city2154->setId(2154);
//		$city2154->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2154->setName('Терноватое');
//		$manager->persist($city2154); 
//
//		$city2155= new City();
//		$city2155->setId(2155);
//		$city2155->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2155->setName('Терновка');
//		$manager->persist($city2155); 
//
//		$city2156= new City();
//		$city2156->setId(2156);
//		$city2156->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2156->setName('Терново');
//		$manager->persist($city2156); 
//
//		$city2157= new City();
//		$city2157->setId(2157);
//		$city2157->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2157->setName('Тернополь');
//		$manager->persist($city2157); 
//
//		$city2158= new City();
//		$city2158->setId(2158);
//		$city2158->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2158->setName('Терны');
//		$manager->persist($city2158); 
//
//		$city2159= new City();
//		$city2159->setId(2159);
//		$city2159->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2159->setName('Тетеревка');
//		$manager->persist($city2159); 
//
//		$city2160= new City();
//		$city2160->setId(2160);
//		$city2160->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2160->setName('Тетиев');
//		$manager->persist($city2160); 
//
//		$city2161= new City();
//		$city2161->setId(2161);
//		$city2161->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2161->setName('Тиврев');
//		$manager->persist($city2161); 
//
//		$city2162= new City();
//		$city2162->setId(2162);
//		$city2162->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2162->setName('Тиловое');
//		$manager->persist($city2162); 
//
//		$city2163= new City();
//		$city2163->setId(2163);
//		$city2163->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2163->setName('Тисменница');
//		$manager->persist($city2163); 
//
//		$city2164= new City();
//		$city2164->setId(2164);
//		$city2164->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2164->setName('Титусовка');
//		$manager->persist($city2164); 
//
//		$city2165= new City();
//		$city2165->setId(2165);
//		$city2165->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2165->setName('Тишковичи');
//		$manager->persist($city2165); 
//
//		$city2166= new City();
//		$city2166->setId(2166);
//		$city2166->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2166->setName('Толкователь');
//		$manager->persist($city2166); 
//
//		$city2167= new City();
//		$city2167->setId(2167);
//		$city2167->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2167->setName('Токмак');
//		$manager->persist($city2167); 
//
//		$city2168= new City();
//		$city2168->setId(2168);
//		$city2168->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2168->setName('Токмаковка');
//		$manager->persist($city2168); 
//
//		$city2169= new City();
//		$city2169->setId(2169);
//		$city2169->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2169->setName('Токовское');
//		$manager->persist($city2169); 
//
//		$city2170= new City();
//		$city2170->setId(2170);
//		$city2170->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2170->setName('Толстое');
//		$manager->persist($city2170); 
//
//		$city2171= new City();
//		$city2171->setId(2171);
//		$city2171->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2171->setName('Толстолуг');
//		$manager->persist($city2171); 
//
//		$city2172= new City();
//		$city2172->setId(2172);
//		$city2172->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2172->setName('Томаковка');
//		$manager->persist($city2172); 
//
//		$city2173= new City();
//		$city2173->setId(2173);
//		$city2173->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2173->setName('Томашгород');
//		$manager->persist($city2173); 
//
//		$city2174= new City();
//		$city2174->setId(2174);
//		$city2174->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2174->setName('Томашовка');
//		$manager->persist($city2174); 
//
//		$city2175= new City();
//		$city2175->setId(2175);
//		$city2175->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2175->setName('Томашполь');
//		$manager->persist($city2175); 
//
//		$city2176= new City();
//		$city2176->setId(2176);
//		$city2176->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2176->setName('Топильня');
//		$manager->persist($city2176); 
//
//		$city2177= new City();
//		$city2177->setId(2177);
//		$city2177->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2177->setName('Топольное');
//		$manager->persist($city2177); 
//
//		$city2178= new City();
//		$city2178->setId(2178);
//		$city2178->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2178->setName('Топоровцы');
//		$manager->persist($city2178); 
//
//		$city2179= new City();
//		$city2179->setId(2179);
//		$city2179->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2179->setName('Торговица');
//		$manager->persist($city2179); 
//
//		$city2180= new City();
//		$city2180->setId(2180);
//		$city2180->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2180->setName('Торговица');
//		$manager->persist($city2180); 
//
//		$city2181= new City();
//		$city2181->setId(2181);
//		$city2181->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2181->setName('Торез');
//		$manager->persist($city2181); 
//
//		$city2182= new City();
//		$city2182->setId(2182);
//		$city2182->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2182->setName('Торское');
//		$manager->persist($city2182); 
//
//		$city2183= new City();
//		$city2183->setId(2183);
//		$city2183->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2183->setName('Торчин');
//		$manager->persist($city2183); 
//
//		$city2184= new City();
//		$city2184->setId(2184);
//		$city2184->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2184->setName('Тошковка');
//		$manager->persist($city2184); 
//
//		$city2185= new City();
//		$city2185->setId(2185);
//		$city2185->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2185->setName('Требухов');
//		$manager->persist($city2185); 
//
//		$city2186= new City();
//		$city2186->setId(2186);
//		$city2186->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2186->setName('Треповка');
//		$manager->persist($city2186); 
//
//		$city2187= new City();
//		$city2187->setId(2187);
//		$city2187->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2187->setName('Троицкое');
//		$manager->persist($city2187); 
//
//		$city2188= new City();
//		$city2188->setId(2188);
//		$city2188->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2188->setName('Тростянец');
//		$manager->persist($city2188); 
//
//		$city2189= new City();
//		$city2189->setId(2189);
//		$city2189->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2189->setName('Тростянец (Винницкая обл.)');
//		$manager->persist($city2189); 
//
//		$city2190= new City();
//		$city2190->setId(2190);
//		$city2190->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2190->setName('Тростянец');
//		$manager->persist($city2190); 
//
//		$city2191= new City();
//		$city2191->setId(2191);
//		$city2191->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2191->setName('Трускавец');
//		$manager->persist($city2191); 
//
//		$city2192= new City();
//		$city2192->setId(2192);
//		$city2192->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2192->setName('Тужилов');
//		$manager->persist($city2192); 
//
//		$city2193= new City();
//		$city2193->setId(2193);
//		$city2193->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2193->setName('Тульчин');
//		$manager->persist($city2193); 
//
//		$city2194= new City();
//		$city2194->setId(2194);
//		$city2194->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2194->setName('Турбов');
//		$manager->persist($city2194); 
//
//		$city2195= new City();
//		$city2195->setId(2195);
//		$city2195->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2195->setName('Турийск');
//		$manager->persist($city2195); 
//
//		$city2196= new City();
//		$city2196->setId(2196);
//		$city2196->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2196->setName('Турички');
//		$manager->persist($city2196); 
//
//		$city2197= new City();
//		$city2197->setId(2197);
//		$city2197->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2197->setName('Турка');
//		$manager->persist($city2197); 
//
//		$city2198= new City();
//		$city2198->setId(2198);
//		$city2198->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2198->setName('Турка');
//		$manager->persist($city2198); 
//
//		$city2199= new City();
//		$city2199->setId(2199);
//		$city2199->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2199->setName('Турьи реметы');
//		$manager->persist($city2199); 
//
//		$city2200= new City();
//		$city2200->setId(2200);
//		$city2200->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2200->setName('Тывров');
//		$manager->persist($city2200); 
//
//		$city2201= new City();
//		$city2201->setId(2201);
//		$city2201->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2201->setName('Тысменица');
//		$manager->persist($city2201); 
//
//		$city2202= new City();
//		$city2202->setId(2202);
//		$city2202->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2202->setName('Тютьки');
//		$manager->persist($city2202); 
//
//		$city2203= new City();
//		$city2203->setId(2203);
//		$city2203->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2203->setName('Тячев');
//		$manager->persist($city2203); 
//
//		$city2204= new City();
//		$city2204->setId(2204);
//		$city2204->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2204->setName('Углегорск');
//		$manager->persist($city2204); 
//
//		$city2205= new City();
//		$city2205->setId(2205);
//		$city2205->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2205->setName('Угледар');
//		$manager->persist($city2205); 
//
//		$city2206= new City();
//		$city2206->setId(2206);
//		$city2206->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2206->setName('Угля');
//		$manager->persist($city2206); 
//
//		$city2207= new City();
//		$city2207->setId(2207);
//		$city2207->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2207->setName('Угнев');
//		$manager->persist($city2207); 
//
//		$city2208= new City();
//		$city2208->setId(2208);
//		$city2208->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2208->setName('Угорники');
//		$manager->persist($city2208); 
//
//		$city2209= new City();
//		$city2209->setId(2209);
//		$city2209->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2209->setName('Угринов');
//		$manager->persist($city2209); 
//
//		$city2210= new City();
//		$city2210->setId(2210);
//		$city2210->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2210->setName('Угроеды');
//		$manager->persist($city2210); 
//
//		$city2211= new City();
//		$city2211->setId(2211);
//		$city2211->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2211->setName('Удачное');
//		$manager->persist($city2211); 
//
//		$city2212= new City();
//		$city2212->setId(2212);
//		$city2212->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2212->setName('Удич');
//		$manager->persist($city2212); 
//
//		$city2213= new City();
//		$city2213->setId(2213);
//		$city2213->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2213->setName('Удрицк');
//		$manager->persist($city2213); 
//
//		$city2214= new City();
//		$city2214->setId(2214);
//		$city2214->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2214->setName('Ужгород');
//		$manager->persist($city2214); 
//
//		$city2215= new City();
//		$city2215->setId(2215);
//		$city2215->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2215->setName('Узин');
//		$manager->persist($city2215); 
//
//		$city2216= new City();
//		$city2216->setId(2216);
//		$city2216->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2216->setName('Українка');
//		$manager->persist($city2216); 
//
//		$city2217= new City();
//		$city2217->setId(2217);
//		$city2217->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2217->setName('Украинск');
//		$manager->persist($city2217); 
//
//		$city2218= new City();
//		$city2218->setId(2218);
//		$city2218->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2218->setName('Укромное');
//		$manager->persist($city2218); 
//
//		$city2219= new City();
//		$city2219->setId(2219);
//		$city2219->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2219->setName('Уладовка');
//		$manager->persist($city2219); 
//
//		$city2220= new City();
//		$city2220->setId(2220);
//		$city2220->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2220->setName('Уланов');
//		$manager->persist($city2220); 
//
//		$city2221= new City();
//		$city2221->setId(2221);
//		$city2221->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2221->setName('Улашановка');
//		$manager->persist($city2221); 
//
//		$city2222= new City();
//		$city2222->setId(2222);
//		$city2222->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2222->setName('Ульяновка');
//		$manager->persist($city2222); 
//
//		$city2223= new City();
//		$city2223->setId(2223);
//		$city2223->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2223->setName('Умань');
//		$manager->persist($city2223); 
//
//		$city2224= new City();
//		$city2224->setId(2224);
//		$city2224->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2224->setName('Усатово');
//		$manager->persist($city2224); 
//
//		$city2225= new City();
//		$city2225->setId(2225);
//		$city2225->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2225->setName('Успенка');
//		$manager->persist($city2225); 
//
//		$city2226= new City();
//		$city2226->setId(2226);
//		$city2226->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2226->setName('Устерики');
//		$manager->persist($city2226); 
//
//		$city2227= new City();
//		$city2227->setId(2227);
//		$city2227->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2227->setName('Устивица');
//		$manager->persist($city2227); 
//
//		$city2228= new City();
//		$city2228->setId(2228);
//		$city2228->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2228->setName('Устилуг');
//		$manager->persist($city2228); 
//
//		$city2229= new City();
//		$city2229->setId(2229);
//		$city2229->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2229->setName('Устимовка');
//		$manager->persist($city2229); 
//
//		$city2230= new City();
//		$city2230->setId(2230);
//		$city2230->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2230->setName('Устиновка');
//		$manager->persist($city2230); 
//
//		$city2231= new City();
//		$city2231->setId(2231);
//		$city2231->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2231->setName('Усть-Черна');
//		$manager->persist($city2231); 
//
//		$city2232= new City();
//		$city2232->setId(2232);
//		$city2232->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2232->setName('Утковка');
//		$manager->persist($city2232); 
//
//		$city2233= new City();
//		$city2233->setId(2233);
//		$city2233->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2233->setName('Ушомир');
//		$manager->persist($city2233); 
//
//		$city2234= new City();
//		$city2234->setId(2234);
//		$city2234->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2234->setName('Фанчиково');
//		$manager->persist($city2234); 
//
//		$city2235= new City();
//		$city2235->setId(2235);
//		$city2235->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2235->setName('Фастов');
//		$manager->persist($city2235); 
//
//		$city2236= new City();
//		$city2236->setId(2236);
//		$city2236->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2236->setName('Фащевка');
//		$manager->persist($city2236); 
//
//		$city2237= new City();
//		$city2237->setId(2237);
//		$city2237->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2237->setName('Федоровка');
//		$manager->persist($city2237); 
//
//		$city2238= new City();
//		$city2238->setId(2238);
//		$city2238->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2238->setName('Феодосия');
//		$manager->persist($city2238); 
//
//		$city2239= new City();
//		$city2239->setId(2239);
//		$city2239->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2239->setName('Фонтанка');
//		$manager->persist($city2239); 
//
//		$city2240= new City();
//		$city2240->setId(2240);
//		$city2240->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2240->setName('Фонтаны');
//		$manager->persist($city2240); 
//
//		$city2241= new City();
//		$city2241->setId(2241);
//		$city2241->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2241->setName('Форос');
//		$manager->persist($city2241); 
//
//		$city2242= new City();
//		$city2242->setId(2242);
//		$city2242->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2242->setName('Фрунзе');
//		$manager->persist($city2242); 
//
//		$city2243= new City();
//		$city2243->setId(2243);
//		$city2243->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2243->setName('Фрунзе');
//		$manager->persist($city2243); 
//
//		$city2244= new City();
//		$city2244->setId(2244);
//		$city2244->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2244->setName('Фрунзовка');
//		$manager->persist($city2244); 
//
//		$city2245= new City();
//		$city2245->setId(2245);
//		$city2245->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2245->setName('Фурсы');
//		$manager->persist($city2245); 
//
//		$city2246= new City();
//		$city2246->setId(2246);
//		$city2246->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2246->setName('Халтурино');
//		$manager->persist($city2246); 
//
//		$city2247= new City();
//		$city2247->setId(2247);
//		$city2247->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2247->setName('Халтурино');
//		$manager->persist($city2247); 
//
//		$city2248= new City();
//		$city2248->setId(2248);
//		$city2248->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2248->setName('Харцызск');
//		$manager->persist($city2248); 
//
//		$city2249= new City();
//		$city2249->setId(2249);
//		$city2249->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2249->setName('Харьков');
//		$manager->persist($city2249); 
//
//		$city2250= new City();
//		$city2250->setId(2250);
//		$city2250->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2250->setName('Хащеватое');
//		$manager->persist($city2250); 
//
//		$city2251= new City();
//		$city2251->setId(2251);
//		$city2251->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2251->setName('Хащевое');
//		$manager->persist($city2251); 
//
//		$city2252= new City();
//		$city2252->setId(2252);
//		$city2252->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2252->setName('Херсон');
//		$manager->persist($city2252); 
//
//		$city2253= new City();
//		$city2253->setId(2253);
//		$city2253->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2253->setName('Хижинцы');
//		$manager->persist($city2253); 
//
//		$city2254= new City();
//		$city2254->setId(2254);
//		$city2254->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2254->setName('Хиночи');
//		$manager->persist($city2254); 
//
//		$city2255= new City();
//		$city2255->setId(2255);
//		$city2255->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2255->setName('Хирев');
//		$manager->persist($city2255); 
//
//		$city2256= new City();
//		$city2256->setId(2256);
//		$city2256->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2256->setName('Хишевичи');
//		$manager->persist($city2256); 
//
//		$city2257= new City();
//		$city2257->setId(2257);
//		$city2257->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2257->setName('Хлебодарское');
//		$manager->persist($city2257); 
//
//		$city2258= new City();
//		$city2258->setId(2258);
//		$city2258->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2258->setName('Хлыстуновка');
//		$manager->persist($city2258); 
//
//		$city2259= new City();
//		$city2259->setId(2259);
//		$city2259->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2259->setName('Хмельник');
//		$manager->persist($city2259); 
//
//		$city2260= new City();
//		$city2260->setId(2260);
//		$city2260->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2260->setName('Хмельницкий');
//		$manager->persist($city2260); 
//
//		$city2261= new City();
//		$city2261->setId(2261);
//		$city2261->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2261->setName('Ходаки');
//		$manager->persist($city2261); 
//
//		$city2262= new City();
//		$city2262->setId(2262);
//		$city2262->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2262->setName('Ходовичи');
//		$manager->persist($city2262); 
//
//		$city2263= new City();
//		$city2263->setId(2263);
//		$city2263->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2263->setName('Ходоров');
//		$manager->persist($city2263); 
//
//		$city2264= new City();
//		$city2264->setId(2264);
//		$city2264->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2264->setName('Ходоров');
//		$manager->persist($city2264); 
//
//		$city2265= new City();
//		$city2265->setId(2265);
//		$city2265->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2265->setName('Ходосовка');
//		$manager->persist($city2265); 
//
//		$city2266= new City();
//		$city2266->setId(2266);
//		$city2266->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2266->setName('Холодная балка');
//		$manager->persist($city2266); 
//
//		$city2267= new City();
//		$city2267->setId(2267);
//		$city2267->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2267->setName('Холодноводка');
//		$manager->persist($city2267); 
//
//		$city2268= new City();
//		$city2268->setId(2268);
//		$city2268->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2268->setName('Холоднянское');
//		$manager->persist($city2268); 
//
//		$city2269= new City();
//		$city2269->setId(2269);
//		$city2269->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2269->setName('Хорол');
//		$manager->persist($city2269); 
//
//		$city2270= new City();
//		$city2270->setId(2270);
//		$city2270->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2270->setName('Хоростков');
//		$manager->persist($city2270); 
//
//		$city2271= new City();
//		$city2271->setId(2271);
//		$city2271->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2271->setName('Хорошево');
//		$manager->persist($city2271); 
//
//		$city2272= new City();
//		$city2272->setId(2272);
//		$city2272->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2272->setName('Хотень');
//		$manager->persist($city2272); 
//
//		$city2273= new City();
//		$city2273->setId(2273);
//		$city2273->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2273->setName('Хотин');
//		$manager->persist($city2273); 
//
//		$city2274= new City();
//		$city2274->setId(2274);
//		$city2274->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2274->setName('Хотов');
//		$manager->persist($city2274); 
//
//		$city2275= new City();
//		$city2275->setId(2275);
//		$city2275->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2275->setName('Хрещатик');
//		$manager->persist($city2275); 
//
//		$city2276= new City();
//		$city2276->setId(2276);
//		$city2276->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2276->setName('Хриплин');
//		$manager->persist($city2276); 
//
//		$city2277= new City();
//		$city2277->setId(2277);
//		$city2277->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2277->setName('Христиновка');
//		$manager->persist($city2277); 
//
//		$city2278= new City();
//		$city2278->setId(2278);
//		$city2278->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2278->setName('Христофоровка');
//		$manager->persist($city2278); 
//
//		$city2279= new City();
//		$city2279->setId(2279);
//		$city2279->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2279->setName('Хрящеватое');
//		$manager->persist($city2279); 
//
//		$city2280= new City();
//		$city2280->setId(2280);
//		$city2280->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2280->setName('Хуст');
//		$manager->persist($city2280); 
//
//		$city2281= new City();
//		$city2281->setId(2281);
//		$city2281->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2281->setName('Хутор-Будилов');
//		$manager->persist($city2281); 
//
//		$city2282= new City();
//		$city2282->setId(2282);
//		$city2282->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2282->setName('Царедаровка');
//		$manager->persist($city2282); 
//
//		$city2283= new City();
//		$city2283->setId(2283);
//		$city2283->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2283->setName('Царичанка');
//		$manager->persist($city2283); 
//
//		$city2284= new City();
//		$city2284->setId(2284);
//		$city2284->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2284->setName('Цибулев');
//		$manager->persist($city2284); 
//
//		$city2285= new City();
//		$city2285->setId(2285);
//		$city2285->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2285->setName('Цибулево');
//		$manager->persist($city2285); 
//
//		$city2286= new City();
//		$city2286->setId(2286);
//		$city2286->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2286->setName('Цинева');
//		$manager->persist($city2286); 
//
//		$city2287= new City();
//		$city2287->setId(2287);
//		$city2287->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2287->setName('Циркуны');
//		$manager->persist($city2287); 
//
//		$city2288= new City();
//		$city2288->setId(2288);
//		$city2288->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2288->setName('Цукурино');
//		$manager->persist($city2288); 
//
//		$city2289= new City();
//		$city2289->setId(2289);
//		$city2289->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2289->setName('Цумань');
//		$manager->persist($city2289); 
//
//		$city2290= new City();
//		$city2290->setId(2290);
//		$city2290->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2290->setName('Цюрупинск');
//		$manager->persist($city2290); 
//
//		$city2291= new City();
//		$city2291->setId(2291);
//		$city2291->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2291->setName('Чабаны');
//		$manager->persist($city2291); 
//
//		$city2292= new City();
//		$city2292->setId(2292);
//		$city2292->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2292->setName('Чагор');
//		$manager->persist($city2292); 
//
//		$city2293= new City();
//		$city2293->setId(2293);
//		$city2293->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2293->setName('Чайкино');
//		$manager->persist($city2293); 
//
//		$city2294= new City();
//		$city2294->setId(2294);
//		$city2294->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2294->setName('Чапаевка');
//		$manager->persist($city2294); 
//
//		$city2295= new City();
//		$city2295->setId(2295);
//		$city2295->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2295->setName('Чапаево');
//		$manager->persist($city2295); 
//
//		$city2296= new City();
//		$city2296->setId(2296);
//		$city2296->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2296->setName('Чаплинка');
//		$manager->persist($city2296); 
//
//		$city2297= new City();
//		$city2297->setId(2297);
//		$city2297->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2297->setName('Чаплино');
//		$manager->persist($city2297); 
//
//		$city2298= new City();
//		$city2298->setId(2298);
//		$city2298->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2298->setName('Чаруков');
//		$manager->persist($city2298); 
//
//		$city2299= new City();
//		$city2299->setId(2299);
//		$city2299->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2299->setName('Часниковка');
//		$manager->persist($city2299); 
//
//		$city2300= new City();
//		$city2300->setId(2300);
//		$city2300->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2300->setName('Часов Яр');
//		$manager->persist($city2300); 
//
//		$city2301= new City();
//		$city2301->setId(2301);
//		$city2301->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2301->setName('Чемерин');
//		$manager->persist($city2301); 
//
//		$city2302= new City();
//		$city2302->setId(2302);
//		$city2302->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2302->setName('Чемерисы-барские');
//		$manager->persist($city2302); 
//
//		$city2303= new City();
//		$city2303->setId(2303);
//		$city2303->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2303->setName('Чемеровцы');
//		$manager->persist($city2303); 
//
//		$city2304= new City();
//		$city2304->setId(2304);
//		$city2304->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2304->setName('Червоная Зирка');
//		$manager->persist($city2304); 
//
//		$city2305= new City();
//		$city2305->setId(2305);
//		$city2305->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2305->setName('Червоная каменка');
//		$manager->persist($city2305); 
//
//		$city2306= new City();
//		$city2306->setId(2306);
//		$city2306->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2306->setName('Червоная слобода');
//		$manager->persist($city2306); 
//
//		$city2307= new City();
//		$city2307->setId(2307);
//		$city2307->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2307->setName('Червоная слобода');
//		$manager->persist($city2307); 
//
//		$city2308= new City();
//		$city2308->setId(2308);
//		$city2308->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2308->setName('Червоная украина');
//		$manager->persist($city2308); 
//
//		$city2309= new City();
//		$city2309->setId(2309);
//		$city2309->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2309->setName('Червоноармейск');
//		$manager->persist($city2309); 
//
//		$city2310= new City();
//		$city2310->setId(2310);
//		$city2310->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2310->setName('Червоноармейское');
//		$manager->persist($city2310); 
//
//		$city2311= new City();
//		$city2311->setId(2311);
//		$city2311->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2311->setName('Червоноград');
//		$manager->persist($city2311); 
//
//		$city2312= new City();
//		$city2312->setId(2312);
//		$city2312->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2312->setName('Червоногранитное');
//		$manager->persist($city2312); 
//
//		$city2313= new City();
//		$city2313->setId(2313);
//		$city2313->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2313->setName('Червоногригоровка');
//		$manager->persist($city2313); 
//
//		$city2314= new City();
//		$city2314->setId(2314);
//		$city2314->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2314->setName('Червоноднепровка');
//		$manager->persist($city2314); 
//
//		$city2315= new City();
//		$city2315->setId(2315);
//		$city2315->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2315->setName('Червоное');
//		$manager->persist($city2315); 
//
//		$city2316= new City();
//		$city2316->setId(2316);
//		$city2316->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2316->setName('Червоное');
//		$manager->persist($city2316); 
//
//		$city2317= new City();
//		$city2317->setId(2317);
//		$city2317->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2317->setName('Червонозаводское');
//		$manager->persist($city2317); 
//
//		$city2318= new City();
//		$city2318->setId(2318);
//		$city2318->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2318->setName('Червонопартизанск');
//		$manager->persist($city2318); 
//
//		$city2319= new City();
//		$city2319->setId(2319);
//		$city2319->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2319->setName('Червоные поды');
//		$manager->persist($city2319); 
//
//		$city2320= new City();
//		$city2320->setId(2320);
//		$city2320->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2320->setName('Червоный Донец');
//		$manager->persist($city2320); 
//
//		$city2321= new City();
//		$city2321->setId(2321);
//		$city2321->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2321->setName('Червоный кут');
//		$manager->persist($city2321); 
//
//		$city2322= new City();
//		$city2322->setId(2322);
//		$city2322->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2322->setName('Черкасская Лозовая');
//		$manager->persist($city2322); 
//
//		$city2323= new City();
//		$city2323->setId(2323);
//		$city2323->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2323->setName('Черкасское');
//		$manager->persist($city2323); 
//
//		$city2324= new City();
//		$city2324->setId(2324);
//		$city2324->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2324->setName('Черкассы');
//		$manager->persist($city2324); 
//
//		$city2325= new City();
//		$city2325->setId(2325);
//		$city2325->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2325->setName('Черляны');
//		$manager->persist($city2325); 
//
//		$city2326= new City();
//		$city2326->setId(2326);
//		$city2326->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2326->setName('Черневцы');
//		$manager->persist($city2326); 
//
//		$city2327= new City();
//		$city2327->setId(2327);
//		$city2327->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2327->setName('Чернигов');
//		$manager->persist($city2327); 
//
//		$city2328= new City();
//		$city2328->setId(2328);
//		$city2328->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2328->setName('Черниговка');
//		$manager->persist($city2328); 
//
//		$city2329= new City();
//		$city2329->setId(2329);
//		$city2329->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2329->setName('Чернобай');
//		$manager->persist($city2329); 
//
//		$city2330= new City();
//		$city2330->setId(2330);
//		$city2330->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2330->setName('Чернобыль');
//		$manager->persist($city2330); 
//
//		$city2331= new City();
//		$city2331->setId(2331);
//		$city2331->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2331->setName('Черновцы');
//		$manager->persist($city2331); 
//
//		$city2332= new City();
//		$city2332->setId(2332);
//		$city2332->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2332->setName('Черногородка');
//		$manager->persist($city2332); 
//
//		$city2333= new City();
//		$city2333->setId(2333);
//		$city2333->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2333->setName('Черномин');
//		$manager->persist($city2333); 
//
//		$city2334= new City();
//		$city2334->setId(2334);
//		$city2334->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2334->setName('Черноморское');
//		$manager->persist($city2334); 
//
//		$city2335= new City();
//		$city2335->setId(2335);
//		$city2335->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2335->setName('Черноморское');
//		$manager->persist($city2335); 
//
//		$city2336= new City();
//		$city2336->setId(2336);
//		$city2336->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2336->setName('Черноморьевка');
//		$manager->persist($city2336); 
//
//		$city2337= new City();
//		$city2337->setId(2337);
//		$city2337->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2337->setName('Чернотисов');
//		$manager->persist($city2337); 
//
//		$city2338= new City();
//		$city2338->setId(2338);
//		$city2338->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2338->setName('Чернухи');
//		$manager->persist($city2338); 
//
//		$city2339= new City();
//		$city2339->setId(2339);
//		$city2339->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2339->setName('Черный остров');
//		$manager->persist($city2339); 
//
//		$city2340= new City();
//		$city2340->setId(2340);
//		$city2340->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2340->setName('Чернянка');
//		$manager->persist($city2340); 
//
//		$city2341= new City();
//		$city2341->setId(2341);
//		$city2341->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2341->setName('Чернятин');
//		$manager->persist($city2341); 
//
//		$city2342= new City();
//		$city2342->setId(2342);
//		$city2342->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2342->setName('Черняхов');
//		$manager->persist($city2342); 
//
//		$city2343= new City();
//		$city2343->setId(2343);
//		$city2343->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2343->setName('Черняховка');
//		$manager->persist($city2343); 
//
//		$city2344= new City();
//		$city2344->setId(2344);
//		$city2344->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2344->setName('Чертория');
//		$manager->persist($city2344); 
//
//		$city2345= new City();
//		$city2345->setId(2345);
//		$city2345->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2345->setName('Чечелево');
//		$manager->persist($city2345); 
//
//		$city2346= new City();
//		$city2346->setId(2346);
//		$city2346->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2346->setName('Чечельник');
//		$manager->persist($city2346); 
//
//		$city2347= new City();
//		$city2347->setId(2347);
//		$city2347->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2347->setName('Чигирин');
//		$manager->persist($city2347); 
//
//		$city2348= new City();
//		$city2348->setId(2348);
//		$city2348->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2348->setName('Чижовка');
//		$manager->persist($city2348); 
//
//		$city2349= new City();
//		$city2349->setId(2349);
//		$city2349->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2349->setName('Чинадиево');
//		$manager->persist($city2349); 
//
//		$city2350= new City();
//		$city2350->setId(2350);
//		$city2350->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2350->setName('Чистенькое');
//		$manager->persist($city2350); 
//
//		$city2351= new City();
//		$city2351->setId(2351);
//		$city2351->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2351->setName('Чистополье');
//		$manager->persist($city2351); 
//
//		$city2352= new City();
//		$city2352->setId(2352);
//		$city2352->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2352->setName('Чкаловка');
//		$manager->persist($city2352); 
//
//		$city2353= new City();
//		$city2353->setId(2353);
//		$city2353->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2353->setName('Чкалово');
//		$manager->persist($city2353); 
//
//		$city2354= new City();
//		$city2354->setId(2354);
//		$city2354->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2354->setName('Чкалово');
//		$manager->persist($city2354); 
//
//		$city2355= new City();
//		$city2355->setId(2355);
//		$city2355->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2355->setName('Чкалово');
//		$manager->persist($city2355); 
//
//		$city2356= new City();
//		$city2356->setId(2356);
//		$city2356->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2356->setName('Чкаловское');
//		$manager->persist($city2356); 
//
//		$city2357= new City();
//		$city2357->setId(2357);
//		$city2357->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2357->setName('Чмыровка');
//		$manager->persist($city2357); 
//
//		$city2358= new City();
//		$city2358->setId(2358);
//		$city2358->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2358->setName('Чома');
//		$manager->persist($city2358); 
//
//		$city2359= new City();
//		$city2359->setId(2359);
//		$city2359->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2359->setName('Чоп');
//		$manager->persist($city2359); 
//
//		$city2360= new City();
//		$city2360->setId(2360);
//		$city2360->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2360->setName('Чоповичи');
//		$manager->persist($city2360); 
//
//		$city2361= new City();
//		$city2361->setId(2361);
//		$city2361->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2361->setName('Чортков');
//		$manager->persist($city2361); 
//
//		$city2362= new City();
//		$city2362->setId(2362);
//		$city2362->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2362->setName('Чубинское');
//		$manager->persist($city2362); 
//
//		$city2363= new City();
//		$city2363->setId(2363);
//		$city2363->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2363->setName('Чугуев');
//		$manager->persist($city2363); 
//
//		$city2364= new City();
//		$city2364->setId(2364);
//		$city2364->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2364->setName('Чуднов');
//		$manager->persist($city2364); 
//
//		$city2365= new City();
//		$city2365->setId(2365);
//		$city2365->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2365->setName('Чуква');
//		$manager->persist($city2365); 
//
//		$city2366= new City();
//		$city2366->setId(2366);
//		$city2366->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2366->setName('Чумаки');
//		$manager->persist($city2366); 
//
//		$city2367= new City();
//		$city2367->setId(2367);
//		$city2367->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2367->setName('Чупаховка');
//		$manager->persist($city2367); 
//
//		$city2368= new City();
//		$city2368->setId(2368);
//		$city2368->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2368->setName('Чутово');
//		$manager->persist($city2368); 
//
//		$city2369= new City();
//		$city2369->setId(2369);
//		$city2369->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2369->setName('Шабельня');
//		$manager->persist($city2369); 
//
//		$city2370= new City();
//		$city2370->setId(2370);
//		$city2370->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2370->setName('Шабо');
//		$manager->persist($city2370); 
//
//		$city2371= new City();
//		$city2371->setId(2371);
//		$city2371->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2371->setName('Шаланки');
//		$manager->persist($city2371); 
//
//		$city2372= new City();
//		$city2372->setId(2372);
//		$city2372->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2372->setName('Шалыгино');
//		$manager->persist($city2372); 
//
//		$city2373= new City();
//		$city2373->setId(2373);
//		$city2373->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2373->setName('Шамраевка');
//		$manager->persist($city2373); 
//
//		$city2374= new City();
//		$city2374->setId(2374);
//		$city2374->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2374->setName('Шаргород');
//		$manager->persist($city2374); 
//
//		$city2375= new City();
//		$city2375->setId(2375);
//		$city2375->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2375->setName('Шаровечка');
//		$manager->persist($city2375); 
//
//		$city2376= new City();
//		$city2376->setId(2376);
//		$city2376->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2376->setName('Шатрище');
//		$manager->persist($city2376); 
//
//		$city2377= new City();
//		$city2377->setId(2377);
//		$city2377->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2377->setName('Шахворостовка');
//		$manager->persist($city2377); 
//
//		$city2378= new City();
//		$city2378->setId(2378);
//		$city2378->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2378->setName('Шахтерск');
//		$manager->persist($city2378); 
//
//		$city2379= new City();
//		$city2379->setId(2379);
//		$city2379->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2379->setName('Шахтерское');
//		$manager->persist($city2379); 
//
//		$city2380= new City();
//		$city2380->setId(2380);
//		$city2380->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2380->setName('Шахтное');
//		$manager->persist($city2380); 
//
//		$city2381= new City();
//		$city2381->setId(2381);
//		$city2381->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2381->setName('Шацк');
//		$manager->persist($city2381); 
//
//		$city2382= new City();
//		$city2382->setId(2382);
//		$city2382->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2382->setName('Швайковка');
//		$manager->persist($city2382); 
//
//		$city2383= new City();
//		$city2383->setId(2383);
//		$city2383->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2383->setName('Шевченково');
//		$manager->persist($city2383); 
//
//		$city2384= new City();
//		$city2384->setId(2384);
//		$city2384->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2384->setName('Шевченково');
//		$manager->persist($city2384); 
//
//		$city2385= new City();
//		$city2385->setId(2385);
//		$city2385->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2385->setName('Шевченково');
//		$manager->persist($city2385); 
//
//		$city2386= new City();
//		$city2386->setId(2386);
//		$city2386->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2386->setName('Шевченково');
//		$manager->persist($city2386); 
//
//		$city2387= new City();
//		$city2387->setId(2387);
//		$city2387->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2387->setName('Шелестово');
//		$manager->persist($city2387); 
//
//		$city2388= new City();
//		$city2388->setId(2388);
//		$city2388->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2388->setName('Шелудьковка');
//		$manager->persist($city2388); 
//
//		$city2389= new City();
//		$city2389->setId(2389);
//		$city2389->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2389->setName('Шенборн');
//		$manager->persist($city2389); 
//
//		$city2390= new City();
//		$city2390->setId(2390);
//		$city2390->setRegion($this->em->getReference('NitraGeoBundle:Region', 3)); 
//		$city2390->setName('Шепель');
//		$manager->persist($city2390); 
//
//		$city2391= new City();
//		$city2391->setId(2391);
//		$city2391->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2391->setName('Шепетовка');
//		$manager->persist($city2391); 
//
//		$city2392= new City();
//		$city2392->setId(2392);
//		$city2392->setRegion($this->em->getReference('NitraGeoBundle:Region', 11)); 
//		$city2392->setName('Шестаковка');
//		$manager->persist($city2392); 
//
//		$city2393= new City();
//		$city2393->setId(2393);
//		$city2393->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2393->setName('Шестовица');
//		$manager->persist($city2393); 
//
//		$city2394= new City();
//		$city2394->setId(2394);
//		$city2394->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2394->setName('Шешоры');
//		$manager->persist($city2394); 
//
//		$city2395= new City();
//		$city2395->setId(2395);
//		$city2395->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2395->setName('Шибене');
//		$manager->persist($city2395); 
//
//		$city2396= new City();
//		$city2396->setId(2396);
//		$city2396->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2396->setName('Широкая гребля');
//		$manager->persist($city2396); 
//
//		$city2397= new City();
//		$city2397->setId(2397);
//		$city2397->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2397->setName('Широкое');
//		$manager->persist($city2397); 
//
//		$city2398= new City();
//		$city2398->setId(2398);
//		$city2398->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2398->setName('Широкое');
//		$manager->persist($city2398); 
//
//		$city2399= new City();
//		$city2399->setId(2399);
//		$city2399->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2399->setName('Широкое');
//		$manager->persist($city2399); 
//
//		$city2400= new City();
//		$city2400->setId(2400);
//		$city2400->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2400->setName('Широкое');
//		$manager->persist($city2400); 
//
//		$city2401= new City();
//		$city2401->setId(2401);
//		$city2401->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2401->setName('Ширяево');
//		$manager->persist($city2401); 
//
//		$city2402= new City();
//		$city2402->setId(2402);
//		$city2402->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2402->setName('Шишаки');
//		$manager->persist($city2402); 
//
//		$city2403= new City();
//		$city2403->setId(2403);
//		$city2403->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2403->setName('Шкаровка');
//		$manager->persist($city2403); 
//
//		$city2404= new City();
//		$city2404->setId(2404);
//		$city2404->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2404->setName('Шкло');
//		$manager->persist($city2404); 
//
//		$city2405= new City();
//		$city2405->setId(2405);
//		$city2405->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2405->setName('Шкурупиевка');
//		$manager->persist($city2405); 
//
//		$city2406= new City();
//		$city2406->setId(2406);
//		$city2406->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2406->setName('Шляхтинцы');
//		$manager->persist($city2406); 
//
//		$city2407= new City();
//		$city2407->setId(2407);
//		$city2407->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2407->setName('Шолохово');
//		$manager->persist($city2407); 
//
//		$city2408= new City();
//		$city2408->setId(2408);
//		$city2408->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2408->setName('Шостка');
//		$manager->persist($city2408); 
//
//		$city2409= new City();
//		$city2409->setId(2409);
//		$city2409->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2409->setName('Шпанов');
//		$manager->persist($city2409); 
//
//		$city2410= new City();
//		$city2410->setId(2410);
//		$city2410->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city2410->setName('Шпетки');
//		$manager->persist($city2410); 
//
//		$city2411= new City();
//		$city2411->setId(2411);
//		$city2411->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2411->setName('Шпиков');
//		$manager->persist($city2411); 
//
//		$city2412= new City();
//		$city2412->setId(2412);
//		$city2412->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2412->setName('Шпола');
//		$manager->persist($city2412); 
//
//		$city2413= new City();
//		$city2413->setId(2413);
//		$city2413->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2413->setName('Шрамковка');
//		$manager->persist($city2413); 
//
//		$city2414= new City();
//		$city2414->setId(2414);
//		$city2414->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2414->setName('Шубков');
//		$manager->persist($city2414); 
//
//		$city2415= new City();
//		$city2415->setId(2415);
//		$city2415->setRegion($this->em->getReference('NitraGeoBundle:Region', 19)); 
//		$city2415->setName('Шумск');
//		$manager->persist($city2415); 
//
//		$city2416= new City();
//		$city2416->setId(2416);
//		$city2416->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2416->setName('Щебетовка');
//		$manager->persist($city2416); 
//
//		$city2417= new City();
//		$city2417->setId(2417);
//		$city2417->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2417->setName('Щелкино');
//		$manager->persist($city2417); 
//
//		$city2418= new City();
//		$city2418->setId(2418);
//		$city2418->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2418->setName('Щербани');
//		$manager->persist($city2418); 
//
//		$city2419= new City();
//		$city2419->setId(2419);
//		$city2419->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2419->setName('Щирец');
//		$manager->persist($city2419); 
//
//		$city2420= new City();
//		$city2420->setId(2420);
//		$city2420->setRegion($this->em->getReference('NitraGeoBundle:Region', 24)); 
//		$city2420->setName('Щорс');
//		$manager->persist($city2420); 
//
//		$city2421= new City();
//		$city2421->setId(2421);
//		$city2421->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2421->setName('Щорсовка');
//		$manager->persist($city2421); 
//
//		$city2422= new City();
//		$city2422->setId(2422);
//		$city2422->setRegion($this->em->getReference('NitraGeoBundle:Region', 21)); 
//		$city2422->setName('Щорсовка');
//		$manager->persist($city2422); 
//
//		$city2423= new City();
//		$city2423->setId(2423);
//		$city2423->setRegion($this->em->getReference('NitraGeoBundle:Region', 8)); 
//		$city2423->setName('Энергодар');
//		$manager->persist($city2423); 
//
//		$city2424= new City();
//		$city2424->setId(2424);
//		$city2424->setRegion($this->em->getReference('NitraGeoBundle:Region', 20)); 
//		$city2424->setName('Эсхар');
//		$manager->persist($city2424); 
//
//		$city2425= new City();
//		$city2425->setId(2425);
//		$city2425->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2425->setName('Юбилейное');
//		$manager->persist($city2425); 
//
//		$city2426= new City();
//		$city2426->setId(2426);
//		$city2426->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2426->setName('Юбилейное');
//		$manager->persist($city2426); 
//
//		$city2427= new City();
//		$city2427->setId(2427);
//		$city2427->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2427->setName('Южная ломоватка');
//		$manager->persist($city2427); 
//
//		$city2428= new City();
//		$city2428->setId(2428);
//		$city2428->setRegion($this->em->getReference('NitraGeoBundle:Region', 14)); 
//		$city2428->setName('Южноукраинск');
//		$manager->persist($city2428); 
//
//		$city2429= new City();
//		$city2429->setId(2429);
//		$city2429->setRegion($this->em->getReference('NitraGeoBundle:Region', 15)); 
//		$city2429->setName('Южный');
//		$manager->persist($city2429); 
//
//		$city2430= new City();
//		$city2430->setId(2430);
//		$city2430->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2430->setName('Юзефо-Николаевка');
//		$manager->persist($city2430); 
//
//		$city2431= new City();
//		$city2431->setId(2431);
//		$city2431->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2431->setName('Юнокоммунаровск');
//		$manager->persist($city2431); 
//
//		$city2432= new City();
//		$city2432->setId(2432);
//		$city2432->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2432->setName('Юркивцы с.');
//		$manager->persist($city2432); 
//
//		$city2433= new City();
//		$city2433->setId(2433);
//		$city2433->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2433->setName('Юрковка');
//		$manager->persist($city2433); 
//
//		$city2434= new City();
//		$city2434->setId(2434);
//		$city2434->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2434->setName('Юровка с.');
//		$manager->persist($city2434); 
//
//		$city2435= new City();
//		$city2435->setId(2435);
//		$city2435->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2435->setName('Юрьевка');
//		$manager->persist($city2435); 
//
//		$city2436= new City();
//		$city2436->setId(2436);
//		$city2436->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2436->setName('Юрьевка');
//		$manager->persist($city2436); 
//
//		$city2437= new City();
//		$city2437->setId(2437);
//		$city2437->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city2437->setName('Юрьевка');
//		$manager->persist($city2437); 
//
//		$city2438= new City();
//		$city2438->setId(2438);
//		$city2438->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2438->setName('Яблонец');
//		$manager->persist($city2438); 
//
//		$city2439= new City();
//		$city2439->setId(2439);
//		$city2439->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2439->setName('Яблоница');
//		$manager->persist($city2439); 
//
//		$city2440= new City();
//		$city2440->setId(2440);
//		$city2440->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2440->setName('Яблонов');
//		$manager->persist($city2440); 
//
//		$city2441= new City();
//		$city2441->setId(2441);
//		$city2441->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2441->setName('Яворов');
//		$manager->persist($city2441); 
//
//		$city2442= new City();
//		$city2442->setId(2442);
//		$city2442->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2442->setName('Яготин');
//		$manager->persist($city2442); 
//
//		$city2443= new City();
//		$city2443->setId(2443);
//		$city2443->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2443->setName('Яковлевка');
//		$manager->persist($city2443); 
//
//		$city2444= new City();
//		$city2444->setId(2444);
//		$city2444->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2444->setName('Якушинцы');
//		$manager->persist($city2444); 
//
//		$city2445= new City();
//		$city2445->setId(2445);
//		$city2445->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2445->setName('Ялта');
//		$manager->persist($city2445); 
//
//		$city2446= new City();
//		$city2446->setId(2446);
//		$city2446->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2446->setName('Ялта');
//		$manager->persist($city2446); 
//
//		$city2447= new City();
//		$city2447->setId(2447);
//		$city2447->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2447->setName('Ялтушков');
//		$manager->persist($city2447); 
//
//		$city2448= new City();
//		$city2448->setId(2448);
//		$city2448->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2448->setName('Ямница');
//		$manager->persist($city2448); 
//
//		$city2449= new City();
//		$city2449->setId(2449);
//		$city2449->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2449->setName('Ямполь');
//		$manager->persist($city2449); 
//
//		$city2450= new City();
//		$city2450->setId(2450);
//		$city2450->setRegion($this->em->getReference('NitraGeoBundle:Region', 18)); 
//		$city2450->setName('Ямполь (Шостка)');
//		$manager->persist($city2450); 
//
//		$city2451= new City();
//		$city2451->setId(2451);
//		$city2451->setRegion($this->em->getReference('NitraGeoBundle:Region', 2)); 
//		$city2451->setName('Ямполь');
//		$manager->persist($city2451); 
//
//		$city2452= new City();
//		$city2452->setId(2452);
//		$city2452->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2452->setName('Ямполь');
//		$manager->persist($city2452); 
//
//		$city2453= new City();
//		$city2453->setId(2453);
//		$city2453->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2453->setName('Янтарное');
//		$manager->persist($city2453); 
//
//		$city2454= new City();
//		$city2454->setId(2454);
//		$city2454->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city2454->setName('Яремча');
//		$manager->persist($city2454); 
//
//		$city2455= new City();
//		$city2455->setId(2455);
//		$city2455->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city2455->setName('Яреськи');
//		$manager->persist($city2455); 
//
//		$city2456= new City();
//		$city2456->setId(2456);
//		$city2456->setRegion($this->em->getReference('NitraGeoBundle:Region', 22)); 
//		$city2456->setName('Ярмолинцы');
//		$manager->persist($city2456); 
//
//		$city2457= new City();
//		$city2457->setId(2457);
//		$city2457->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2457->setName('Ярославка');
//		$manager->persist($city2457); 
//
//		$city2458= new City();
//		$city2458->setId(2458);
//		$city2458->setRegion($this->em->getReference('NitraGeoBundle:Region', 23)); 
//		$city2458->setName('Ярошевка');
//		$manager->persist($city2458); 
//
//		$city2459= new City();
//		$city2459->setId(2459);
//		$city2459->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city2459->setName('Ярунь');
//		$manager->persist($city2459); 
//
//		$city2460= new City();
//		$city2460->setId(2460);
//		$city2460->setRegion($this->em->getReference('NitraGeoBundle:Region', 12)); 
//		$city2460->setName('Ясеновский');
//		$manager->persist($city2460); 
//
//		$city2461= new City();
//		$city2461->setId(2461);
//		$city2461->setRegion($this->em->getReference('NitraGeoBundle:Region', 13)); 
//		$city2461->setName('Ясеновцы');
//		$manager->persist($city2461); 
//
//		$city2462= new City();
//		$city2462->setId(2462);
//		$city2462->setRegion($this->em->getReference('NitraGeoBundle:Region', 5)); 
//		$city2462->setName('Ясиноватая');
//		$manager->persist($city2462); 
//
//		$city2463= new City();
//		$city2463->setId(2463);
//		$city2463->setRegion($this->em->getReference('NitraGeoBundle:Region', 7)); 
//		$city2463->setName('Ясиня');
//		$manager->persist($city2463); 
//
//		$city2464= new City();
//		$city2464->setId(2464);
//		$city2464->setRegion($this->em->getReference('NitraGeoBundle:Region', 17)); 
//		$city2464->setName('Ясногорка');
//		$manager->persist($city2464); 
//
//		$city2465= new City();
//		$city2465->setId(2465);
//		$city2465->setRegion($this->em->getReference('NitraGeoBundle:Region', 10)); 
//		$city2465->setName('Ясногородка');
//		$manager->persist($city2465); 
//
//		$city2466= new City();
//		$city2466->setId(2466);
//		$city2466->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city2466->setName('Ясное');
//		$manager->persist($city2466); 
//
//		$city2467= new City();
//		$city2467->setId(2467);
//		$city2467->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2467->setName('Алейск');
//		$manager->persist($city2467); 
//
//		$city2468= new City();
//		$city2468->setId(2468);
//		$city2468->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2468->setName('Алтайское');
//		$manager->persist($city2468); 
//
//		$city2469= new City();
//		$city2469->setId(2469);
//		$city2469->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2469->setName('Барнаул');
//		$manager->persist($city2469); 
//
//		$city2470= new City();
//		$city2470->setId(2470);
//		$city2470->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2470->setName('Белокуриха');
//		$manager->persist($city2470); 
//
//		$city2471= new City();
//		$city2471->setId(2471);
//		$city2471->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2471->setName('Белоярск');
//		$manager->persist($city2471); 
//
//		$city2472= new City();
//		$city2472->setId(2472);
//		$city2472->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2472->setName('Бийск');
//		$manager->persist($city2472); 
//
//		$city2473= new City();
//		$city2473->setId(2473);
//		$city2473->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2473->setName('Бийск-Зональная');
//		$manager->persist($city2473); 
//
//		$city2474= new City();
//		$city2474->setId(2474);
//		$city2474->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2474->setName('Благовещенка');
//		$manager->persist($city2474); 
//
//		$city2475= new City();
//		$city2475->setId(2475);
//		$city2475->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2475->setName('Волчиха');
//		$manager->persist($city2475); 
//
//		$city2476= new City();
//		$city2476->setId(2476);
//		$city2476->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2476->setName('Заринск');
//		$manager->persist($city2476); 
//
//		$city2477= new City();
//		$city2477->setId(2477);
//		$city2477->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2477->setName('Змеиногорск');
//		$manager->persist($city2477); 
//
//		$city2478= new City();
//		$city2478->setId(2478);
//		$city2478->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2478->setName('Камень-на-Оби');
//		$manager->persist($city2478); 
//
//		$city2479= new City();
//		$city2479->setId(2479);
//		$city2479->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2479->setName('Кулунда');
//		$manager->persist($city2479); 
//
//		$city2480= new City();
//		$city2480->setId(2480);
//		$city2480->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2480->setName('Новоалтайск');
//		$manager->persist($city2480); 
//
//		$city2481= new City();
//		$city2481->setId(2481);
//		$city2481->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2481->setName('Новосиликатный');
//		$manager->persist($city2481); 
//
//		$city2482= new City();
//		$city2482->setId(2482);
//		$city2482->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2482->setName('Павловск');
//		$manager->persist($city2482); 
//
//		$city2483= new City();
//		$city2483->setId(2483);
//		$city2483->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2483->setName('Поспелиха');
//		$manager->persist($city2483); 
//
//		$city2484= new City();
//		$city2484->setId(2484);
//		$city2484->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2484->setName('Ребриха');
//		$manager->persist($city2484); 
//
//		$city2485= new City();
//		$city2485->setId(2485);
//		$city2485->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2485->setName('Рубцовск');
//		$manager->persist($city2485); 
//
//		$city2486= new City();
//		$city2486->setId(2486);
//		$city2486->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2486->setName('Сибирский');
//		$manager->persist($city2486); 
//
//		$city2487= new City();
//		$city2487->setId(2487);
//		$city2487->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2487->setName('Тальменка');
//		$manager->persist($city2487); 
//
//		$city2488= new City();
//		$city2488->setId(2488);
//		$city2488->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2488->setName('Усть-Калманка');
//		$manager->persist($city2488); 
//
//		$city2489= new City();
//		$city2489->setId(2489);
//		$city2489->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2489->setName('Шелаболиха');
//		$manager->persist($city2489); 
//
//		$city2490= new City();
//		$city2490->setId(2490);
//		$city2490->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2490->setName('Шипуново');
//		$manager->persist($city2490); 
//
//		$city2491= new City();
//		$city2491->setId(2491);
//		$city2491->setRegion($this->em->getReference('NitraGeoBundle:Region', 26)); 
//		$city2491->setName('Яровое');
//		$manager->persist($city2491); 
//
//		$city2492= new City();
//		$city2492->setId(2492);
//		$city2492->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2492->setName('Архара');
//		$manager->persist($city2492); 
//
//		$city2493= new City();
//		$city2493->setId(2493);
//		$city2493->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2493->setName('Благовещенск');
//		$manager->persist($city2493); 
//
//		$city2494= new City();
//		$city2494->setId(2494);
//		$city2494->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2494->setName('Благовещенск (Игнатьево)');
//		$manager->persist($city2494); 
//
//		$city2495= new City();
//		$city2495->setId(2495);
//		$city2495->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2495->setName('Бомнак');
//		$manager->persist($city2495); 
//
//		$city2496= new City();
//		$city2496->setId(2496);
//		$city2496->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2496->setName('Екатеринославка');
//		$manager->persist($city2496); 
//
//		$city2497= new City();
//		$city2497->setId(2497);
//		$city2497->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2497->setName('Завитинск');
//		$manager->persist($city2497); 
//
//		$city2498= new City();
//		$city2498->setId(2498);
//		$city2498->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2498->setName('Зея');
//		$manager->persist($city2498); 
//
//		$city2499= new City();
//		$city2499->setId(2499);
//		$city2499->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2499->setName('Ивановка');
//		$manager->persist($city2499); 
//
//		$city2500= new City();
//		$city2500->setId(2500);
//		$city2500->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2500->setName('Игнашино');
//		$manager->persist($city2500); 
//
//		$city2501= new City();
//		$city2501->setId(2501);
//		$city2501->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2501->setName('Магдагачи');
//		$manager->persist($city2501); 
//
//		$city2502= new City();
//		$city2502->setId(2502);
//		$city2502->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2502->setName('Мазаново');
//		$manager->persist($city2502); 
//
//		$city2503= new City();
//		$city2503->setId(2503);
//		$city2503->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2503->setName('Поярково');
//		$manager->persist($city2503); 
//
//		$city2504= new City();
//		$city2504->setId(2504);
//		$city2504->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2504->setName('Прогресс');
//		$manager->persist($city2504); 
//
//		$city2505= new City();
//		$city2505->setId(2505);
//		$city2505->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2505->setName('Райчихинск');
//		$manager->persist($city2505); 
//
//		$city2506= new City();
//		$city2506->setId(2506);
//		$city2506->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2506->setName('Свободный');
//		$manager->persist($city2506); 
//
//		$city2507= new City();
//		$city2507->setId(2507);
//		$city2507->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2507->setName('Серышево');
//		$manager->persist($city2507); 
//
//		$city2508= new City();
//		$city2508->setId(2508);
//		$city2508->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2508->setName('Сковородино');
//		$manager->persist($city2508); 
//
//		$city2509= new City();
//		$city2509->setId(2509);
//		$city2509->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2509->setName('Тында');
//		$manager->persist($city2509); 
//
//		$city2510= new City();
//		$city2510->setId(2510);
//		$city2510->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2510->setName('Усть-Нюкжа');
//		$manager->persist($city2510); 
//
//		$city2511= new City();
//		$city2511->setId(2511);
//		$city2511->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2511->setName('Шимановск');
//		$manager->persist($city2511); 
//
//		$city2512= new City();
//		$city2512->setId(2512);
//		$city2512->setRegion($this->em->getReference('NitraGeoBundle:Region', 27)); 
//		$city2512->setName('Экимчан');
//		$manager->persist($city2512); 
//
//		$city2513= new City();
//		$city2513->setId(2513);
//		$city2513->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2513->setName('Амдерма');
//		$manager->persist($city2513); 
//
//		$city2514= new City();
//		$city2514->setId(2514);
//		$city2514->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2514->setName('Архангельск');
//		$manager->persist($city2514); 
//
//		$city2515= new City();
//		$city2515->setId(2515);
//		$city2515->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2515->setName('Архангельск (Васьково)');
//		$manager->persist($city2515); 
//
//		$city2516= new City();
//		$city2516->setId(2516);
//		$city2516->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2516->setName('Архангельск (Талаги)');
//		$manager->persist($city2516); 
//
//		$city2517= new City();
//		$city2517->setId(2517);
//		$city2517->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2517->setName('Вельск');
//		$manager->persist($city2517); 
//
//		$city2518= new City();
//		$city2518->setId(2518);
//		$city2518->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2518->setName('Верхняя Тойма');
//		$manager->persist($city2518); 
//
//		$city2519= new City();
//		$city2519->setId(2519);
//		$city2519->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2519->setName('Двинской Березник');
//		$manager->persist($city2519); 
//
//		$city2520= new City();
//		$city2520->setId(2520);
//		$city2520->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2520->setName('Каргополь');
//		$manager->persist($city2520); 
//
//		$city2521= new City();
//		$city2521->setId(2521);
//		$city2521->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2521->setName('Карпогоры');
//		$manager->persist($city2521); 
//
//		$city2522= new City();
//		$city2522->setId(2522);
//		$city2522->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2522->setName('Коноша');
//		$manager->persist($city2522); 
//
//		$city2523= new City();
//		$city2523->setId(2523);
//		$city2523->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2523->setName('Коряжма');
//		$manager->persist($city2523); 
//
//		$city2524= new City();
//		$city2524->setId(2524);
//		$city2524->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2524->setName('Котлас');
//		$manager->persist($city2524); 
//
//		$city2525= new City();
//		$city2525->setId(2525);
//		$city2525->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2525->setName('Красноборск');
//		$manager->persist($city2525); 
//
//		$city2526= new City();
//		$city2526->setId(2526);
//		$city2526->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2526->setName('Лешуконское');
//		$manager->persist($city2526); 
//
//		$city2527= new City();
//		$city2527->setId(2527);
//		$city2527->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2527->setName('Малые Кармакулы');
//		$manager->persist($city2527); 
//
//		$city2528= new City();
//		$city2528->setId(2528);
//		$city2528->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2528->setName('Мезень');
//		$manager->persist($city2528); 
//
//		$city2529= new City();
//		$city2529->setId(2529);
//		$city2529->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2529->setName('Нарьян-Мар');
//		$manager->persist($city2529); 
//
//		$city2530= new City();
//		$city2530->setId(2530);
//		$city2530->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2530->setName('Нижняя Пеша');
//		$manager->persist($city2530); 
//
//		$city2531= new City();
//		$city2531->setId(2531);
//		$city2531->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2531->setName('Новодвинск');
//		$manager->persist($city2531); 
//
//		$city2532= new City();
//		$city2532->setId(2532);
//		$city2532->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2532->setName('Няндома');
//		$manager->persist($city2532); 
//
//		$city2533= new City();
//		$city2533->setId(2533);
//		$city2533->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2533->setName('Онега');
//		$manager->persist($city2533); 
//
//		$city2534= new City();
//		$city2534->setId(2534);
//		$city2534->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2534->setName('Пинега');
//		$manager->persist($city2534); 
//
//		$city2535= new City();
//		$city2535->setId(2535);
//		$city2535->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2535->setName('Плесецк');
//		$manager->persist($city2535); 
//
//		$city2536= new City();
//		$city2536->setId(2536);
//		$city2536->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2536->setName('Северодвинск');
//		$manager->persist($city2536); 
//
//		$city2537= new City();
//		$city2537->setId(2537);
//		$city2537->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2537->setName('Соловки');
//		$manager->persist($city2537); 
//
//		$city2538= new City();
//		$city2538->setId(2538);
//		$city2538->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2538->setName('Сольвычегодск');
//		$manager->persist($city2538); 
//
//		$city2539= new City();
//		$city2539->setId(2539);
//		$city2539->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2539->setName('Холмогоры');
//		$manager->persist($city2539); 
//
//		$city2540= new City();
//		$city2540->setId(2540);
//		$city2540->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2540->setName('Шенкурск');
//		$manager->persist($city2540); 
//
//		$city2541= new City();
//		$city2541->setId(2541);
//		$city2541->setRegion($this->em->getReference('NitraGeoBundle:Region', 28)); 
//		$city2541->setName('Яренск');
//		$manager->persist($city2541); 
//
//		$city2542= new City();
//		$city2542->setId(2542);
//		$city2542->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2542->setName('Астрахань');
//		$manager->persist($city2542); 
//
//		$city2543= new City();
//		$city2543->setId(2543);
//		$city2543->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2543->setName('Астрахань (Нариманово)');
//		$manager->persist($city2543); 
//
//		$city2544= new City();
//		$city2544->setId(2544);
//		$city2544->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2544->setName('Ахтубинск');
//		$manager->persist($city2544); 
//
//		$city2545= new City();
//		$city2545->setId(2545);
//		$city2545->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2545->setName('Верхний Баскунчак');
//		$manager->persist($city2545); 
//
//		$city2546= new City();
//		$city2546->setId(2546);
//		$city2546->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2546->setName('Енотаевка');
//		$manager->persist($city2546); 
//
//		$city2547= new City();
//		$city2547->setId(2547);
//		$city2547->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2547->setName('Знаменск');
//		$manager->persist($city2547); 
//
//		$city2548= new City();
//		$city2548->setId(2548);
//		$city2548->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2548->setName('Икряное');
//		$manager->persist($city2548); 
//
//		$city2549= new City();
//		$city2549->setId(2549);
//		$city2549->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2549->setName('Камызяк');
//		$manager->persist($city2549); 
//
//		$city2550= new City();
//		$city2550->setId(2550);
//		$city2550->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2550->setName('Красный Яр');
//		$manager->persist($city2550); 
//
//		$city2551= new City();
//		$city2551->setId(2551);
//		$city2551->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2551->setName('Нариманов');
//		$manager->persist($city2551); 
//
//		$city2552= new City();
//		$city2552->setId(2552);
//		$city2552->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2552->setName('Харабали');
//		$manager->persist($city2552); 
//
//		$city2553= new City();
//		$city2553->setId(2553);
//		$city2553->setRegion($this->em->getReference('NitraGeoBundle:Region', 29)); 
//		$city2553->setName('Черный Яр');
//		$manager->persist($city2553); 
//
//		$city2554= new City();
//		$city2554->setId(2554);
//		$city2554->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2554->setName('Белгород');
//		$manager->persist($city2554); 
//
//		$city2555= new City();
//		$city2555->setId(2555);
//		$city2555->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2555->setName('Борисовка');
//		$manager->persist($city2555); 
//
//		$city2556= new City();
//		$city2556->setId(2556);
//		$city2556->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2556->setName('Валуйки');
//		$manager->persist($city2556); 
//
//		$city2557= new City();
//		$city2557->setId(2557);
//		$city2557->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2557->setName('Волоконовка');
//		$manager->persist($city2557); 
//
//		$city2558= new City();
//		$city2558->setId(2558);
//		$city2558->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2558->setName('Готня');
//		$manager->persist($city2558); 
//
//		$city2559= new City();
//		$city2559->setId(2559);
//		$city2559->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2559->setName('Губкин');
//		$manager->persist($city2559); 
//
//		$city2560= new City();
//		$city2560->setId(2560);
//		$city2560->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2560->setName('Короча');
//		$manager->persist($city2560); 
//
//		$city2561= new City();
//		$city2561->setId(2561);
//		$city2561->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2561->setName('Новый Оскол');
//		$manager->persist($city2561); 
//
//		$city2562= new City();
//		$city2562->setId(2562);
//		$city2562->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2562->setName('Разумное');
//		$manager->persist($city2562); 
//
//		$city2563= new City();
//		$city2563->setId(2563);
//		$city2563->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2563->setName('Старый Оскол');
//		$manager->persist($city2563); 
//
//		$city2564= new City();
//		$city2564->setId(2564);
//		$city2564->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2564->setName('Строитель');
//		$manager->persist($city2564); 
//
//		$city2565= new City();
//		$city2565->setId(2565);
//		$city2565->setRegion($this->em->getReference('NitraGeoBundle:Region', 30)); 
//		$city2565->setName('Шебекино');
//		$manager->persist($city2565); 
//
//		$city2566= new City();
//		$city2566->setId(2566);
//		$city2566->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2566->setName('Белые Берега');
//		$manager->persist($city2566); 
//
//		$city2567= new City();
//		$city2567->setId(2567);
//		$city2567->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2567->setName('Брянск');
//		$manager->persist($city2567); 
//
//		$city2568= new City();
//		$city2568->setId(2568);
//		$city2568->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2568->setName('Дятьково');
//		$manager->persist($city2568); 
//
//		$city2569= new City();
//		$city2569->setId(2569);
//		$city2569->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2569->setName('Жуковка');
//		$manager->persist($city2569); 
//
//		$city2570= new City();
//		$city2570->setId(2570);
//		$city2570->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2570->setName('Злынка');
//		$manager->persist($city2570); 
//
//		$city2571= new City();
//		$city2571->setId(2571);
//		$city2571->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2571->setName('Карачев');
//		$manager->persist($city2571); 
//
//		$city2572= new City();
//		$city2572->setId(2572);
//		$city2572->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2572->setName('Клетня');
//		$manager->persist($city2572); 
//
//		$city2573= new City();
//		$city2573->setId(2573);
//		$city2573->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2573->setName('Климово');
//		$manager->persist($city2573); 
//
//		$city2574= new City();
//		$city2574->setId(2574);
//		$city2574->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2574->setName('Красная Гора');
//		$manager->persist($city2574); 
//
//		$city2575= new City();
//		$city2575->setId(2575);
//		$city2575->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2575->setName('Локоть');
//		$manager->persist($city2575); 
//
//		$city2576= new City();
//		$city2576->setId(2576);
//		$city2576->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2576->setName('Навля');
//		$manager->persist($city2576); 
//
//		$city2577= new City();
//		$city2577->setId(2577);
//		$city2577->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2577->setName('Новозыбков');
//		$manager->persist($city2577); 
//
//		$city2578= new City();
//		$city2578->setId(2578);
//		$city2578->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2578->setName('Погар');
//		$manager->persist($city2578); 
//
//		$city2579= new City();
//		$city2579->setId(2579);
//		$city2579->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2579->setName('Почеп');
//		$manager->persist($city2579); 
//
//		$city2580= new City();
//		$city2580->setId(2580);
//		$city2580->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2580->setName('Сельцо');
//		$manager->persist($city2580); 
//
//		$city2581= new City();
//		$city2581->setId(2581);
//		$city2581->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2581->setName('Стародуб');
//		$manager->persist($city2581); 
//
//		$city2582= new City();
//		$city2582->setId(2582);
//		$city2582->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2582->setName('Сураж');
//		$manager->persist($city2582); 
//
//		$city2583= new City();
//		$city2583->setId(2583);
//		$city2583->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2583->setName('Трубчевск');
//		$manager->persist($city2583); 
//
//		$city2584= new City();
//		$city2584->setId(2584);
//		$city2584->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2584->setName('Унеча');
//		$manager->persist($city2584); 
//
//		$city2585= new City();
//		$city2585->setId(2585);
//		$city2585->setRegion($this->em->getReference('NitraGeoBundle:Region', 31)); 
//		$city2585->setName('Фокино');
//		$manager->persist($city2585); 
//
//		$city2586= new City();
//		$city2586->setId(2586);
//		$city2586->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2586->setName('Александров');
//		$manager->persist($city2586); 
//
//		$city2587= new City();
//		$city2587->setId(2587);
//		$city2587->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2587->setName('Владимир');
//		$manager->persist($city2587); 
//
//		$city2588= new City();
//		$city2588->setId(2588);
//		$city2588->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2588->setName('Вязники');
//		$manager->persist($city2588); 
//
//		$city2589= new City();
//		$city2589->setId(2589);
//		$city2589->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2589->setName('Гороховец');
//		$manager->persist($city2589); 
//
//		$city2590= new City();
//		$city2590->setId(2590);
//		$city2590->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2590->setName('Гусь-Хрустальный');
//		$manager->persist($city2590); 
//
//		$city2591= new City();
//		$city2591->setId(2591);
//		$city2591->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2591->setName('Камешково');
//		$manager->persist($city2591); 
//
//		$city2592= new City();
//		$city2592->setId(2592);
//		$city2592->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2592->setName('Карабаново');
//		$manager->persist($city2592); 
//
//		$city2593= new City();
//		$city2593->setId(2593);
//		$city2593->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2593->setName('Киржач');
//		$manager->persist($city2593); 
//
//		$city2594= new City();
//		$city2594->setId(2594);
//		$city2594->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2594->setName('Ковров');
//		$manager->persist($city2594); 
//
//		$city2595= new City();
//		$city2595->setId(2595);
//		$city2595->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2595->setName('Красный Октябрь');
//		$manager->persist($city2595); 
//
//		$city2596= new City();
//		$city2596->setId(2596);
//		$city2596->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2596->setName('Лакинск');
//		$manager->persist($city2596); 
//
//		$city2597= new City();
//		$city2597->setId(2597);
//		$city2597->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2597->setName('Меленки');
//		$manager->persist($city2597); 
//
//		$city2598= new City();
//		$city2598->setId(2598);
//		$city2598->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2598->setName('Муром');
//		$manager->persist($city2598); 
//
//		$city2599= new City();
//		$city2599->setId(2599);
//		$city2599->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2599->setName('Петушки');
//		$manager->persist($city2599); 
//
//		$city2600= new City();
//		$city2600->setId(2600);
//		$city2600->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2600->setName('Покров');
//		$manager->persist($city2600); 
//
//		$city2601= new City();
//		$city2601->setId(2601);
//		$city2601->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2601->setName('Радужный');
//		$manager->persist($city2601); 
//
//		$city2602= new City();
//		$city2602->setId(2602);
//		$city2602->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2602->setName('Собинка');
//		$manager->persist($city2602); 
//
//		$city2603= new City();
//		$city2603->setId(2603);
//		$city2603->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2603->setName('Струнино');
//		$manager->persist($city2603); 
//
//		$city2604= new City();
//		$city2604->setId(2604);
//		$city2604->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2604->setName('Судогда');
//		$manager->persist($city2604); 
//
//		$city2605= new City();
//		$city2605->setId(2605);
//		$city2605->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2605->setName('Суздаль');
//		$manager->persist($city2605); 
//
//		$city2606= new City();
//		$city2606->setId(2606);
//		$city2606->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2606->setName('Юрьевец');
//		$manager->persist($city2606); 
//
//		$city2607= new City();
//		$city2607->setId(2607);
//		$city2607->setRegion($this->em->getReference('NitraGeoBundle:Region', 32)); 
//		$city2607->setName('Юрьев-Польский');
//		$manager->persist($city2607); 
//
//		$city2608= new City();
//		$city2608->setId(2608);
//		$city2608->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2608->setName('Быково');
//		$manager->persist($city2608); 
//
//		$city2609= new City();
//		$city2609->setId(2609);
//		$city2609->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2609->setName('Волгоград');
//		$manager->persist($city2609); 
//
//		$city2610= new City();
//		$city2610->setId(2610);
//		$city2610->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2610->setName('Волгоград (Гумрак)');
//		$manager->persist($city2610); 
//
//		$city2611= new City();
//		$city2611->setId(2611);
//		$city2611->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2611->setName('Волжский');
//		$manager->persist($city2611); 
//
//		$city2612= new City();
//		$city2612->setId(2612);
//		$city2612->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2612->setName('Горьковский');
//		$manager->persist($city2612); 
//
//		$city2613= new City();
//		$city2613->setId(2613);
//		$city2613->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2613->setName('Дубовка');
//		$manager->persist($city2613); 
//
//		$city2614= new City();
//		$city2614->setId(2614);
//		$city2614->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2614->setName('Елань');
//		$manager->persist($city2614); 
//
//		$city2615= new City();
//		$city2615->setId(2615);
//		$city2615->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2615->setName('Жирновск');
//		$manager->persist($city2615); 
//
//		$city2616= new City();
//		$city2616->setId(2616);
//		$city2616->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2616->setName('Иловля');
//		$manager->persist($city2616); 
//
//		$city2617= new City();
//		$city2617->setId(2617);
//		$city2617->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2617->setName('Калач-на-Дону');
//		$manager->persist($city2617); 
//
//		$city2618= new City();
//		$city2618->setId(2618);
//		$city2618->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2618->setName('Камышин');
//		$manager->persist($city2618); 
//
//		$city2619= new City();
//		$city2619->setId(2619);
//		$city2619->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2619->setName('Клетская');
//		$manager->persist($city2619); 
//
//		$city2620= new City();
//		$city2620->setId(2620);
//		$city2620->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2620->setName('Котельниково');
//		$manager->persist($city2620); 
//
//		$city2621= new City();
//		$city2621->setId(2621);
//		$city2621->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2621->setName('Котово');
//		$manager->persist($city2621); 
//
//		$city2622= new City();
//		$city2622->setId(2622);
//		$city2622->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2622->setName('Краснооктябрьский');
//		$manager->persist($city2622); 
//
//		$city2623= new City();
//		$city2623->setId(2623);
//		$city2623->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2623->setName('Краснослободск');
//		$manager->persist($city2623); 
//
//		$city2624= new City();
//		$city2624->setId(2624);
//		$city2624->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2624->setName('Ленинск');
//		$manager->persist($city2624); 
//
//		$city2625= new City();
//		$city2625->setId(2625);
//		$city2625->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2625->setName('Николаевск');
//		$manager->persist($city2625); 
//
//		$city2626= new City();
//		$city2626->setId(2626);
//		$city2626->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2626->setName('Новоаннинский');
//		$manager->persist($city2626); 
//
//		$city2627= new City();
//		$city2627->setId(2627);
//		$city2627->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2627->setName('Новониколаевский');
//		$manager->persist($city2627); 
//
//		$city2628= new City();
//		$city2628->setId(2628);
//		$city2628->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2628->setName('Ольховка');
//		$manager->persist($city2628); 
//
//		$city2629= new City();
//		$city2629->setId(2629);
//		$city2629->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2629->setName('Палласовка');
//		$manager->persist($city2629); 
//
//		$city2630= new City();
//		$city2630->setId(2630);
//		$city2630->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2630->setName('Петров Вал');
//		$manager->persist($city2630); 
//
//		$city2631= new City();
//		$city2631->setId(2631);
//		$city2631->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2631->setName('Преображенская');
//		$manager->persist($city2631); 
//
//		$city2632= new City();
//		$city2632->setId(2632);
//		$city2632->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2632->setName('Рудня');
//		$manager->persist($city2632); 
//
//		$city2633= new City();
//		$city2633->setId(2633);
//		$city2633->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2633->setName('Светлый Яр');
//		$manager->persist($city2633); 
//
//		$city2634= new City();
//		$city2634->setId(2634);
//		$city2634->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2634->setName('Серафимович');
//		$manager->persist($city2634); 
//
//		$city2635= new City();
//		$city2635->setId(2635);
//		$city2635->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2635->setName('Средняя Ахтуба');
//		$manager->persist($city2635); 
//
//		$city2636= new City();
//		$city2636->setId(2636);
//		$city2636->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2636->setName('Суровикино');
//		$manager->persist($city2636); 
//
//		$city2637= new City();
//		$city2637->setId(2637);
//		$city2637->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2637->setName('Урюпинск');
//		$manager->persist($city2637); 
//
//		$city2638= new City();
//		$city2638->setId(2638);
//		$city2638->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2638->setName('Фролово');
//		$manager->persist($city2638); 
//
//		$city2639= new City();
//		$city2639->setId(2639);
//		$city2639->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2639->setName('Чернышковский');
//		$manager->persist($city2639); 
//
//		$city2640= new City();
//		$city2640->setId(2640);
//		$city2640->setRegion($this->em->getReference('NitraGeoBundle:Region', 33)); 
//		$city2640->setName('Эльтон');
//		$manager->persist($city2640); 
//
//		$city2641= new City();
//		$city2641->setId(2641);
//		$city2641->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2641->setName('Бабаево');
//		$manager->persist($city2641); 
//
//		$city2642= new City();
//		$city2642->setId(2642);
//		$city2642->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2642->setName('Белозерск');
//		$manager->persist($city2642); 
//
//		$city2643= new City();
//		$city2643->setId(2643);
//		$city2643->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2643->setName('Великий Устюг');
//		$manager->persist($city2643); 
//
//		$city2644= new City();
//		$city2644->setId(2644);
//		$city2644->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2644->setName('Верховажье');
//		$manager->persist($city2644); 
//
//		$city2645= new City();
//		$city2645->setId(2645);
//		$city2645->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2645->setName('Вожега');
//		$manager->persist($city2645); 
//
//		$city2646= new City();
//		$city2646->setId(2646);
//		$city2646->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2646->setName('Вологда');
//		$manager->persist($city2646); 
//
//		$city2647= new City();
//		$city2647->setId(2647);
//		$city2647->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2647->setName('Вытегра');
//		$manager->persist($city2647); 
//
//		$city2648= new City();
//		$city2648->setId(2648);
//		$city2648->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2648->setName('Грязовец');
//		$manager->persist($city2648); 
//
//		$city2649= new City();
//		$city2649->setId(2649);
//		$city2649->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2649->setName('Кадуй');
//		$manager->persist($city2649); 
//
//		$city2650= new City();
//		$city2650->setId(2650);
//		$city2650->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2650->setName('Кириллов');
//		$manager->persist($city2650); 
//
//		$city2651= new City();
//		$city2651->setId(2651);
//		$city2651->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2651->setName('Кичменгский Городок');
//		$manager->persist($city2651); 
//
//		$city2652= new City();
//		$city2652->setId(2652);
//		$city2652->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2652->setName('Никольск');
//		$manager->persist($city2652); 
//
//		$city2653= new City();
//		$city2653->setId(2653);
//		$city2653->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2653->setName('Нюксеница');
//		$manager->persist($city2653); 
//
//		$city2654= new City();
//		$city2654->setId(2654);
//		$city2654->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2654->setName('Сокол');
//		$manager->persist($city2654); 
//
//		$city2655= new City();
//		$city2655->setId(2655);
//		$city2655->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2655->setName('Тарногский Городок');
//		$manager->persist($city2655); 
//
//		$city2656= new City();
//		$city2656->setId(2656);
//		$city2656->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2656->setName('Тотьма');
//		$manager->persist($city2656); 
//
//		$city2657= new City();
//		$city2657->setId(2657);
//		$city2657->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2657->setName('Устюжна');
//		$manager->persist($city2657); 
//
//		$city2658= new City();
//		$city2658->setId(2658);
//		$city2658->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2658->setName('Харовск');
//		$manager->persist($city2658); 
//
//		$city2659= new City();
//		$city2659->setId(2659);
//		$city2659->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2659->setName('Чагода');
//		$manager->persist($city2659); 
//
//		$city2660= new City();
//		$city2660->setId(2660);
//		$city2660->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2660->setName('Череповец');
//		$manager->persist($city2660); 
//
//		$city2661= new City();
//		$city2661->setId(2661);
//		$city2661->setRegion($this->em->getReference('NitraGeoBundle:Region', 34)); 
//		$city2661->setName('Шексна');
//		$manager->persist($city2661); 
//
//		$city2662= new City();
//		$city2662->setId(2662);
//		$city2662->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2662->setName('Анна');
//		$manager->persist($city2662); 
//
//		$city2663= new City();
//		$city2663->setId(2663);
//		$city2663->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2663->setName('Бобров');
//		$manager->persist($city2663); 
//
//		$city2664= new City();
//		$city2664->setId(2664);
//		$city2664->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2664->setName('Богучар');
//		$manager->persist($city2664); 
//
//		$city2665= new City();
//		$city2665->setId(2665);
//		$city2665->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2665->setName('Борисоглебск');
//		$manager->persist($city2665); 
//
//		$city2666= new City();
//		$city2666->setId(2666);
//		$city2666->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2666->setName('Бутурлиновка');
//		$manager->persist($city2666); 
//
//		$city2667= new City();
//		$city2667->setId(2667);
//		$city2667->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2667->setName('Воробьевка');
//		$manager->persist($city2667); 
//
//		$city2668= new City();
//		$city2668->setId(2668);
//		$city2668->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2668->setName('Воронеж');
//		$manager->persist($city2668); 
//
//		$city2669= new City();
//		$city2669->setId(2669);
//		$city2669->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2669->setName('Грибановский');
//		$manager->persist($city2669); 
//
//		$city2670= new City();
//		$city2670->setId(2670);
//		$city2670->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2670->setName('Калач');
//		$manager->persist($city2670); 
//
//		$city2671= new City();
//		$city2671->setId(2671);
//		$city2671->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2671->setName('Кантемировка');
//		$manager->persist($city2671); 
//
//		$city2672= new City();
//		$city2672->setId(2672);
//		$city2672->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2672->setName('Лиски');
//		$manager->persist($city2672); 
//
//		$city2673= new City();
//		$city2673->setId(2673);
//		$city2673->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2673->setName('Нижнедевицк');
//		$manager->persist($city2673); 
//
//		$city2674= new City();
//		$city2674->setId(2674);
//		$city2674->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2674->setName('Новая Усмань');
//		$manager->persist($city2674); 
//
//		$city2675= new City();
//		$city2675->setId(2675);
//		$city2675->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2675->setName('Нововоронеж');
//		$manager->persist($city2675); 
//
//		$city2676= new City();
//		$city2676->setId(2676);
//		$city2676->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2676->setName('Новохоперск');
//		$manager->persist($city2676); 
//
//		$city2677= new City();
//		$city2677->setId(2677);
//		$city2677->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2677->setName('Ольховатка');
//		$manager->persist($city2677); 
//
//		$city2678= new City();
//		$city2678->setId(2678);
//		$city2678->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2678->setName('Острогожск');
//		$manager->persist($city2678); 
//
//		$city2679= new City();
//		$city2679->setId(2679);
//		$city2679->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2679->setName('Поворино');
//		$manager->persist($city2679); 
//
//		$city2680= new City();
//		$city2680->setId(2680);
//		$city2680->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2680->setName('Подгоренский');
//		$manager->persist($city2680); 
//
//		$city2681= new City();
//		$city2681->setId(2681);
//		$city2681->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2681->setName('Придонской');
//		$manager->persist($city2681); 
//
//		$city2682= new City();
//		$city2682->setId(2682);
//		$city2682->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2682->setName('Россошь');
//		$manager->persist($city2682); 
//
//		$city2683= new City();
//		$city2683->setId(2683);
//		$city2683->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2683->setName('Семилуки');
//		$manager->persist($city2683); 
//
//		$city2684= new City();
//		$city2684->setId(2684);
//		$city2684->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2684->setName('Сомово');
//		$manager->persist($city2684); 
//
//		$city2685= new City();
//		$city2685->setId(2685);
//		$city2685->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2685->setName('Таловая');
//		$manager->persist($city2685); 
//
//		$city2686= new City();
//		$city2686->setId(2686);
//		$city2686->setRegion($this->em->getReference('NitraGeoBundle:Region', 35)); 
//		$city2686->setName('Эртиль');
//		$manager->persist($city2686); 
//
//		$city2687= new City();
//		$city2687->setId(2687);
//		$city2687->setRegion($this->em->getReference('NitraGeoBundle:Region', 36)); 
//		$city2687->setName('Амурзет');
//		$manager->persist($city2687); 
//
//		$city2688= new City();
//		$city2688->setId(2688);
//		$city2688->setRegion($this->em->getReference('NitraGeoBundle:Region', 36)); 
//		$city2688->setName('Биробиджан');
//		$manager->persist($city2688); 
//
//		$city2689= new City();
//		$city2689->setId(2689);
//		$city2689->setRegion($this->em->getReference('NitraGeoBundle:Region', 36)); 
//		$city2689->setName('Ленинское');
//		$manager->persist($city2689); 
//
//		$city2690= new City();
//		$city2690->setId(2690);
//		$city2690->setRegion($this->em->getReference('NitraGeoBundle:Region', 36)); 
//		$city2690->setName('Облучье');
//		$manager->persist($city2690); 
//
//		$city2691= new City();
//		$city2691->setId(2691);
//		$city2691->setRegion($this->em->getReference('NitraGeoBundle:Region', 36)); 
//		$city2691->setName('Смидович');
//		$manager->persist($city2691); 
//
//		$city2692= new City();
//		$city2692->setId(2692);
//		$city2692->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2692->setName('Агинское');
//		$manager->persist($city2692); 
//
//		$city2693= new City();
//		$city2693->setId(2693);
//		$city2693->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2693->setName('Акша');
//		$manager->persist($city2693); 
//
//		$city2694= new City();
//		$city2694->setId(2694);
//		$city2694->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2694->setName('Александровский Завод');
//		$manager->persist($city2694); 
//
//		$city2695= new City();
//		$city2695->setId(2695);
//		$city2695->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2695->setName('Балей');
//		$manager->persist($city2695); 
//
//		$city2696= new City();
//		$city2696->setId(2696);
//		$city2696->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2696->setName('Борзя');
//		$manager->persist($city2696); 
//
//		$city2697= new City();
//		$city2697->setId(2697);
//		$city2697->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2697->setName('Дарасун');
//		$manager->persist($city2697); 
//
//		$city2698= new City();
//		$city2698->setId(2698);
//		$city2698->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2698->setName('Дульдурга');
//		$manager->persist($city2698); 
//
//		$city2699= new City();
//		$city2699->setId(2699);
//		$city2699->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2699->setName('Забайкальск');
//		$manager->persist($city2699); 
//
//		$city2700= new City();
//		$city2700->setId(2700);
//		$city2700->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2700->setName('Калга');
//		$manager->persist($city2700); 
//
//		$city2701= new City();
//		$city2701->setId(2701);
//		$city2701->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2701->setName('Карымское');
//		$manager->persist($city2701); 
//
//		$city2702= new City();
//		$city2702->setId(2702);
//		$city2702->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2702->setName('Конкудера');
//		$manager->persist($city2702); 
//
//		$city2703= new City();
//		$city2703->setId(2703);
//		$city2703->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2703->setName('Краснокаменск');
//		$manager->persist($city2703); 
//
//		$city2704= new City();
//		$city2704->setId(2704);
//		$city2704->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2704->setName('Красный Чикой');
//		$manager->persist($city2704); 
//
//		$city2705= new City();
//		$city2705->setId(2705);
//		$city2705->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2705->setName('Кыра');
//		$manager->persist($city2705); 
//
//		$city2706= new City();
//		$city2706->setId(2706);
//		$city2706->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2706->setName('Могойтуй');
//		$manager->persist($city2706); 
//
//		$city2707= new City();
//		$city2707->setId(2707);
//		$city2707->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2707->setName('Могоча');
//		$manager->persist($city2707); 
//
//		$city2708= new City();
//		$city2708->setId(2708);
//		$city2708->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2708->setName('Нерчинск');
//		$manager->persist($city2708); 
//
//		$city2709= new City();
//		$city2709->setId(2709);
//		$city2709->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2709->setName('Нерчинский з-д');
//		$manager->persist($city2709); 
//
//		$city2710= new City();
//		$city2710->setId(2710);
//		$city2710->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2710->setName('Нижний Цасучей');
//		$manager->persist($city2710); 
//
//		$city2711= new City();
//		$city2711->setId(2711);
//		$city2711->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2711->setName('Оловянная');
//		$manager->persist($city2711); 
//
//		$city2712= new City();
//		$city2712->setId(2712);
//		$city2712->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2712->setName('Петровск-Забайкальский');
//		$manager->persist($city2712); 
//
//		$city2713= new City();
//		$city2713->setId(2713);
//		$city2713->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2713->setName('Приаргунск');
//		$manager->persist($city2713); 
//
//		$city2714= new City();
//		$city2714->setId(2714);
//		$city2714->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2714->setName('Сретенск');
//		$manager->persist($city2714); 
//
//		$city2715= new City();
//		$city2715->setId(2715);
//		$city2715->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2715->setName('Тунгокочен');
//		$manager->persist($city2715); 
//
//		$city2716= new City();
//		$city2716->setId(2716);
//		$city2716->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2716->setName('Тупик');
//		$manager->persist($city2716); 
//
//		$city2717= new City();
//		$city2717->setId(2717);
//		$city2717->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2717->setName('Улеты');
//		$manager->persist($city2717); 
//
//		$city2718= new City();
//		$city2718->setId(2718);
//		$city2718->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2718->setName('Усть-Каренга');
//		$manager->persist($city2718); 
//
//		$city2719= new City();
//		$city2719->setId(2719);
//		$city2719->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2719->setName('Хилок');
//		$manager->persist($city2719); 
//
//		$city2720= new City();
//		$city2720->setId(2720);
//		$city2720->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2720->setName('Чара');
//		$manager->persist($city2720); 
//
//		$city2721= new City();
//		$city2721->setId(2721);
//		$city2721->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2721->setName('Чернышевск');
//		$manager->persist($city2721); 
//
//		$city2722= new City();
//		$city2722->setId(2722);
//		$city2722->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2722->setName('Чита');
//		$manager->persist($city2722); 
//
//		$city2723= new City();
//		$city2723->setId(2723);
//		$city2723->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2723->setName('Чита (Кадала)');
//		$manager->persist($city2723); 
//
//		$city2724= new City();
//		$city2724->setId(2724);
//		$city2724->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2724->setName('Шелопугино');
//		$manager->persist($city2724); 
//
//		$city2725= new City();
//		$city2725->setId(2725);
//		$city2725->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2725->setName('Шерловая Гора');
//		$manager->persist($city2725); 
//
//		$city2726= new City();
//		$city2726->setId(2726);
//		$city2726->setRegion($this->em->getReference('NitraGeoBundle:Region', 37)); 
//		$city2726->setName('Шилка');
//		$manager->persist($city2726); 
//
//		$city2727= new City();
//		$city2727->setId(2727);
//		$city2727->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2727->setName('Верхний Ландех');
//		$manager->persist($city2727); 
//
//		$city2728= new City();
//		$city2728->setId(2728);
//		$city2728->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2728->setName('Вичуга');
//		$manager->persist($city2728); 
//
//		$city2729= new City();
//		$city2729->setId(2729);
//		$city2729->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2729->setName('Гаврилов Посад');
//		$manager->persist($city2729); 
//
//		$city2730= new City();
//		$city2730->setId(2730);
//		$city2730->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2730->setName('Заволжск');
//		$manager->persist($city2730); 
//
//		$city2731= new City();
//		$city2731->setId(2731);
//		$city2731->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2731->setName('Иваново');
//		$manager->persist($city2731); 
//
//		$city2732= new City();
//		$city2732->setId(2732);
//		$city2732->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2732->setName('Иваново (Южный)');
//		$manager->persist($city2732); 
//
//		$city2733= new City();
//		$city2733->setId(2733);
//		$city2733->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2733->setName('Кинешма');
//		$manager->persist($city2733); 
//
//		$city2734= new City();
//		$city2734->setId(2734);
//		$city2734->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2734->setName('Кохма');
//		$manager->persist($city2734); 
//
//		$city2735= new City();
//		$city2735->setId(2735);
//		$city2735->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2735->setName('Лух');
//		$manager->persist($city2735); 
//
//		$city2736= new City();
//		$city2736->setId(2736);
//		$city2736->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2736->setName('Наволоки');
//		$manager->persist($city2736); 
//
//		$city2737= new City();
//		$city2737->setId(2737);
//		$city2737->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2737->setName('Палех');
//		$manager->persist($city2737); 
//
//		$city2738= new City();
//		$city2738->setId(2738);
//		$city2738->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2738->setName('Плес');
//		$manager->persist($city2738); 
//
//		$city2739= new City();
//		$city2739->setId(2739);
//		$city2739->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2739->setName('Приволжск');
//		$manager->persist($city2739); 
//
//		$city2740= new City();
//		$city2740->setId(2740);
//		$city2740->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2740->setName('Пучеж');
//		$manager->persist($city2740); 
//
//		$city2741= new City();
//		$city2741->setId(2741);
//		$city2741->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2741->setName('Родники');
//		$manager->persist($city2741); 
//
//		$city2742= new City();
//		$city2742->setId(2742);
//		$city2742->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2742->setName('Тейково');
//		$manager->persist($city2742); 
//
//		$city2743= new City();
//		$city2743->setId(2743);
//		$city2743->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2743->setName('Фурманов');
//		$manager->persist($city2743); 
//
//		$city2744= new City();
//		$city2744->setId(2744);
//		$city2744->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2744->setName('Шуя');
//		$manager->persist($city2744); 
//
//		$city2745= new City();
//		$city2745->setId(2745);
//		$city2745->setRegion($this->em->getReference('NitraGeoBundle:Region', 38)); 
//		$city2745->setName('Южа');
//		$manager->persist($city2745); 
//
//		$city2746= new City();
//		$city2746->setId(2746);
//		$city2746->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2746->setName('Ангарск');
//		$manager->persist($city2746); 
//
//		$city2747= new City();
//		$city2747->setId(2747);
//		$city2747->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2747->setName('Байкальск');
//		$manager->persist($city2747); 
//
//		$city2748= new City();
//		$city2748->setId(2748);
//		$city2748->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2748->setName('Балаганск');
//		$manager->persist($city2748); 
//
//		$city2749= new City();
//		$city2749->setId(2749);
//		$city2749->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2749->setName('Баяндай');
//		$manager->persist($city2749); 
//
//		$city2750= new City();
//		$city2750->setId(2750);
//		$city2750->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2750->setName('Бодайбо');
//		$manager->persist($city2750); 
//
//		$city2751= new City();
//		$city2751->setId(2751);
//		$city2751->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2751->setName('Бохан');
//		$manager->persist($city2751); 
//
//		$city2752= new City();
//		$city2752->setId(2752);
//		$city2752->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2752->setName('Братск');
//		$manager->persist($city2752); 
//
//		$city2753= new City();
//		$city2753->setId(2753);
//		$city2753->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2753->setName('Верхняя Гутара');
//		$manager->persist($city2753); 
//
//		$city2754= new City();
//		$city2754->setId(2754);
//		$city2754->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2754->setName('Вихоревка');
//		$manager->persist($city2754); 
//
//		$city2755= new City();
//		$city2755->setId(2755);
//		$city2755->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2755->setName('Дабады');
//		$manager->persist($city2755); 
//
//		$city2756= new City();
//		$city2756->setId(2756);
//		$city2756->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2756->setName('Еланцы');
//		$manager->persist($city2756); 
//
//		$city2757= new City();
//		$city2757->setId(2757);
//		$city2757->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2757->setName('Ербогачен');
//		$manager->persist($city2757); 
//
//		$city2758= new City();
//		$city2758->setId(2758);
//		$city2758->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2758->setName('Железногорск-Илимский');
//		$manager->persist($city2758); 
//
//		$city2759= new City();
//		$city2759->setId(2759);
//		$city2759->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2759->setName('Жигалово');
//		$manager->persist($city2759); 
//
//		$city2760= new City();
//		$city2760->setId(2760);
//		$city2760->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2760->setName('Залари');
//		$manager->persist($city2760); 
//
//		$city2761= new City();
//		$city2761->setId(2761);
//		$city2761->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2761->setName('Зима');
//		$manager->persist($city2761); 
//
//		$city2762= new City();
//		$city2762->setId(2762);
//		$city2762->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2762->setName('Иркутск');
//		$manager->persist($city2762); 
//
//		$city2763= new City();
//		$city2763->setId(2763);
//		$city2763->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2763->setName('Казачинское');
//		$manager->persist($city2763); 
//
//		$city2764= new City();
//		$city2764->setId(2764);
//		$city2764->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2764->setName('Карам');
//		$manager->persist($city2764); 
//
//		$city2765= new City();
//		$city2765->setId(2765);
//		$city2765->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2765->setName('Качуг');
//		$manager->persist($city2765); 
//
//		$city2766= new City();
//		$city2766->setId(2766);
//		$city2766->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2766->setName('Киренск');
//		$manager->persist($city2766); 
//
//		$city2767= new City();
//		$city2767->setId(2767);
//		$city2767->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2767->setName('Куйтун');
//		$manager->persist($city2767); 
//
//		$city2768= new City();
//		$city2768->setId(2768);
//		$city2768->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2768->setName('Кутулик');
//		$manager->persist($city2768); 
//
//		$city2769= new City();
//		$city2769->setId(2769);
//		$city2769->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2769->setName('Листвянка');
//		$manager->persist($city2769); 
//
//		$city2770= new City();
//		$city2770->setId(2770);
//		$city2770->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2770->setName('Магистральный');
//		$manager->persist($city2770); 
//
//		$city2771= new City();
//		$city2771->setId(2771);
//		$city2771->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2771->setName('Мама');
//		$manager->persist($city2771); 
//
//		$city2772= new City();
//		$city2772->setId(2772);
//		$city2772->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2772->setName('Нижнеудинск');
//		$manager->persist($city2772); 
//
//		$city2773= new City();
//		$city2773->setId(2773);
//		$city2773->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2773->setName('Новая Игирма');
//		$manager->persist($city2773); 
//
//		$city2774= new City();
//		$city2774->setId(2774);
//		$city2774->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2774->setName('Новонукутский');
//		$manager->persist($city2774); 
//
//		$city2775= new City();
//		$city2775->setId(2775);
//		$city2775->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2775->setName('Новочунка');
//		$manager->persist($city2775); 
//
//		$city2776= new City();
//		$city2776->setId(2776);
//		$city2776->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2776->setName('Оса');
//		$manager->persist($city2776); 
//
//		$city2777= new City();
//		$city2777->setId(2777);
//		$city2777->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2777->setName('Сарма');
//		$manager->persist($city2777); 
//
//		$city2778= new City();
//		$city2778->setId(2778);
//		$city2778->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2778->setName('Саянск');
//		$manager->persist($city2778); 
//
//		$city2779= new City();
//		$city2779->setId(2779);
//		$city2779->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2779->setName('Свирск');
//		$manager->persist($city2779); 
//
//		$city2780= new City();
//		$city2780->setId(2780);
//		$city2780->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2780->setName('Слюдянка');
//		$manager->persist($city2780); 
//
//		$city2781= new City();
//		$city2781->setId(2781);
//		$city2781->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2781->setName('Тайшет');
//		$manager->persist($city2781); 
//
//		$city2782= new City();
//		$city2782->setId(2782);
//		$city2782->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2782->setName('Токма');
//		$manager->persist($city2782); 
//
//		$city2783= new City();
//		$city2783->setId(2783);
//		$city2783->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2783->setName('Тулун');
//		$manager->persist($city2783); 
//
//		$city2784= new City();
//		$city2784->setId(2784);
//		$city2784->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2784->setName('Усолье-Сибирское');
//		$manager->persist($city2784); 
//
//		$city2785= new City();
//		$city2785->setId(2785);
//		$city2785->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2785->setName('Усть-Илимск');
//		$manager->persist($city2785); 
//
//		$city2786= new City();
//		$city2786->setId(2786);
//		$city2786->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2786->setName('Усть-Кут');
//		$manager->persist($city2786); 
//
//		$city2787= new City();
//		$city2787->setId(2787);
//		$city2787->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2787->setName('Усть-Ордынский');
//		$manager->persist($city2787); 
//
//		$city2788= new City();
//		$city2788->setId(2788);
//		$city2788->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2788->setName('Усть-Уда');
//		$manager->persist($city2788); 
//
//		$city2789= new City();
//		$city2789->setId(2789);
//		$city2789->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2789->setName('Хужир');
//		$manager->persist($city2789); 
//
//		$city2790= new City();
//		$city2790->setId(2790);
//		$city2790->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2790->setName('Черемхово');
//		$manager->persist($city2790); 
//
//		$city2791= new City();
//		$city2791->setId(2791);
//		$city2791->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2791->setName('Чунский');
//		$manager->persist($city2791); 
//
//		$city2792= new City();
//		$city2792->setId(2792);
//		$city2792->setRegion($this->em->getReference('NitraGeoBundle:Region', 39)); 
//		$city2792->setName('Шелехов');
//		$manager->persist($city2792); 
//
//		$city2793= new City();
//		$city2793->setId(2793);
//		$city2793->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2793->setName('Баксан');
//		$manager->persist($city2793); 
//
//		$city2794= new City();
//		$city2794->setId(2794);
//		$city2794->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2794->setName('Заюково');
//		$manager->persist($city2794); 
//
//		$city2795= new City();
//		$city2795->setId(2795);
//		$city2795->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2795->setName('Исламей');
//		$manager->persist($city2795); 
//
//		$city2796= new City();
//		$city2796->setId(2796);
//		$city2796->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2796->setName('Кашхатау');
//		$manager->persist($city2796); 
//
//		$city2797= new City();
//		$city2797->setId(2797);
//		$city2797->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2797->setName('Кенже');
//		$manager->persist($city2797); 
//
//		$city2798= new City();
//		$city2798->setId(2798);
//		$city2798->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2798->setName('Майский');
//		$manager->persist($city2798); 
//
//		$city2799= new City();
//		$city2799->setId(2799);
//		$city2799->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2799->setName('Нальчик');
//		$manager->persist($city2799); 
//
//		$city2800= new City();
//		$city2800->setId(2800);
//		$city2800->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2800->setName('Нартан');
//		$manager->persist($city2800); 
//
//		$city2801= new City();
//		$city2801->setId(2801);
//		$city2801->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2801->setName('Нарткала');
//		$manager->persist($city2801); 
//
//		$city2802= new City();
//		$city2802->setId(2802);
//		$city2802->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2802->setName('Прохладный');
//		$manager->persist($city2802); 
//
//		$city2803= new City();
//		$city2803->setId(2803);
//		$city2803->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2803->setName('Терек');
//		$manager->persist($city2803); 
//
//		$city2804= new City();
//		$city2804->setId(2804);
//		$city2804->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2804->setName('Терскол');
//		$manager->persist($city2804); 
//
//		$city2805= new City();
//		$city2805->setId(2805);
//		$city2805->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2805->setName('Тырныауз');
//		$manager->persist($city2805); 
//
//		$city2806= new City();
//		$city2806->setId(2806);
//		$city2806->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2806->setName('Хасанья');
//		$manager->persist($city2806); 
//
//		$city2807= new City();
//		$city2807->setId(2807);
//		$city2807->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2807->setName('Чегем');
//		$manager->persist($city2807); 
//
//		$city2808= new City();
//		$city2808->setId(2808);
//		$city2808->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2808->setName('Чегем Второй');
//		$manager->persist($city2808); 
//
//		$city2809= new City();
//		$city2809->setId(2809);
//		$city2809->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2809->setName('Чегет');
//		$manager->persist($city2809); 
//
//		$city2810= new City();
//		$city2810->setId(2810);
//		$city2810->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2810->setName('Шалушка');
//		$manager->persist($city2810); 
//
//		$city2811= new City();
//		$city2811->setId(2811);
//		$city2811->setRegion($this->em->getReference('NitraGeoBundle:Region', 40)); 
//		$city2811->setName('Эльбрус');
//		$manager->persist($city2811); 
//
//		$city2812= new City();
//		$city2812->setId(2812);
//		$city2812->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2812->setName('Балтийск');
//		$manager->persist($city2812); 
//
//		$city2813= new City();
//		$city2813->setId(2813);
//		$city2813->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2813->setName('Гвардейск');
//		$manager->persist($city2813); 
//
//		$city2814= new City();
//		$city2814->setId(2814);
//		$city2814->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2814->setName('Гурьевск');
//		$manager->persist($city2814); 
//
//		$city2815= new City();
//		$city2815->setId(2815);
//		$city2815->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2815->setName('Гусев');
//		$manager->persist($city2815); 
//
//		$city2816= new City();
//		$city2816->setId(2816);
//		$city2816->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2816->setName('Зеленоградск');
//		$manager->persist($city2816); 
//
//		$city2817= new City();
//		$city2817->setId(2817);
//		$city2817->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2817->setName('Калининград');
//		$manager->persist($city2817); 
//
//		$city2818= new City();
//		$city2818->setId(2818);
//		$city2818->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2818->setName('Калининград (Храброво)');
//		$manager->persist($city2818); 
//
//		$city2819= new City();
//		$city2819->setId(2819);
//		$city2819->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2819->setName('Мамоново');
//		$manager->persist($city2819); 
//
//		$city2820= new City();
//		$city2820->setId(2820);
//		$city2820->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2820->setName('Неман');
//		$manager->persist($city2820); 
//
//		$city2821= new City();
//		$city2821->setId(2821);
//		$city2821->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2821->setName('Озёрск');
//		$manager->persist($city2821); 
//
//		$city2822= new City();
//		$city2822->setId(2822);
//		$city2822->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2822->setName('Пионерский');
//		$manager->persist($city2822); 
//
//		$city2823= new City();
//		$city2823->setId(2823);
//		$city2823->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2823->setName('Полесск');
//		$manager->persist($city2823); 
//
//		$city2824= new City();
//		$city2824->setId(2824);
//		$city2824->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2824->setName('Правдинск');
//		$manager->persist($city2824); 
//
//		$city2825= new City();
//		$city2825->setId(2825);
//		$city2825->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2825->setName('Светлогорск');
//		$manager->persist($city2825); 
//
//		$city2826= new City();
//		$city2826->setId(2826);
//		$city2826->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2826->setName('Светлый');
//		$manager->persist($city2826); 
//
//		$city2827= new City();
//		$city2827->setId(2827);
//		$city2827->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2827->setName('Советск');
//		$manager->persist($city2827); 
//
//		$city2828= new City();
//		$city2828->setId(2828);
//		$city2828->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2828->setName('Черняховск');
//		$manager->persist($city2828); 
//
//		$city2829= new City();
//		$city2829->setId(2829);
//		$city2829->setRegion($this->em->getReference('NitraGeoBundle:Region', 41)); 
//		$city2829->setName('Янтарный');
//		$manager->persist($city2829); 
//
//		$city2830= new City();
//		$city2830->setId(2830);
//		$city2830->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2830->setName('Балабаново');
//		$manager->persist($city2830); 
//
//		$city2831= new City();
//		$city2831->setId(2831);
//		$city2831->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2831->setName('Белоусово');
//		$manager->persist($city2831); 
//
//		$city2832= new City();
//		$city2832->setId(2832);
//		$city2832->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2832->setName('Боровск');
//		$manager->persist($city2832); 
//
//		$city2833= new City();
//		$city2833->setId(2833);
//		$city2833->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2833->setName('Воротынск');
//		$manager->persist($city2833); 
//
//		$city2834= new City();
//		$city2834->setId(2834);
//		$city2834->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2834->setName('Ермолино');
//		$manager->persist($city2834); 
//
//		$city2835= new City();
//		$city2835->setId(2835);
//		$city2835->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2835->setName('Жиздра');
//		$manager->persist($city2835); 
//
//		$city2836= new City();
//		$city2836->setId(2836);
//		$city2836->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2836->setName('Жуков');
//		$manager->persist($city2836); 
//
//		$city2837= new City();
//		$city2837->setId(2837);
//		$city2837->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2837->setName('Калуга');
//		$manager->persist($city2837); 
//
//		$city2838= new City();
//		$city2838->setId(2838);
//		$city2838->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2838->setName('Калуга (Грабцево)');
//		$manager->persist($city2838); 
//
//		$city2839= new City();
//		$city2839->setId(2839);
//		$city2839->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2839->setName('Киров');
//		$manager->persist($city2839); 
//
//		$city2840= new City();
//		$city2840->setId(2840);
//		$city2840->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2840->setName('Козельск');
//		$manager->persist($city2840); 
//
//		$city2841= new City();
//		$city2841->setId(2841);
//		$city2841->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2841->setName('Кондрово');
//		$manager->persist($city2841); 
//
//		$city2842= new City();
//		$city2842->setId(2842);
//		$city2842->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2842->setName('Кремёнки');
//		$manager->persist($city2842); 
//
//		$city2843= new City();
//		$city2843->setId(2843);
//		$city2843->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2843->setName('Людиново');
//		$manager->persist($city2843); 
//
//		$city2844= new City();
//		$city2844->setId(2844);
//		$city2844->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2844->setName('Малоярославец');
//		$manager->persist($city2844); 
//
//		$city2845= new City();
//		$city2845->setId(2845);
//		$city2845->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2845->setName('Мосальск');
//		$manager->persist($city2845); 
//
//		$city2846= new City();
//		$city2846->setId(2846);
//		$city2846->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2846->setName('Обнинск');
//		$manager->persist($city2846); 
//
//		$city2847= new City();
//		$city2847->setId(2847);
//		$city2847->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2847->setName('Сосенский');
//		$manager->persist($city2847); 
//
//		$city2848= new City();
//		$city2848->setId(2848);
//		$city2848->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2848->setName('Спас-Деменск');
//		$manager->persist($city2848); 
//
//		$city2849= new City();
//		$city2849->setId(2849);
//		$city2849->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2849->setName('Сухиничи');
//		$manager->persist($city2849); 
//
//		$city2850= new City();
//		$city2850->setId(2850);
//		$city2850->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2850->setName('Товарково');
//		$manager->persist($city2850); 
//
//		$city2851= new City();
//		$city2851->setId(2851);
//		$city2851->setRegion($this->em->getReference('NitraGeoBundle:Region', 42)); 
//		$city2851->setName('Ульяново');
//		$manager->persist($city2851); 
//
//		$city2852= new City();
//		$city2852->setId(2852);
//		$city2852->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2852->setName('Большерецк');
//		$manager->persist($city2852); 
//
//		$city2853= new City();
//		$city2853->setId(2853);
//		$city2853->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2853->setName('Верхнее Пенжино');
//		$manager->persist($city2853); 
//
//		$city2854= new City();
//		$city2854->setId(2854);
//		$city2854->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2854->setName('Вилючинск');
//		$manager->persist($city2854); 
//
//		$city2855= new City();
//		$city2855->setId(2855);
//		$city2855->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2855->setName('Гора Морозная');
//		$manager->persist($city2855); 
//
//		$city2856= new City();
//		$city2856->setId(2856);
//		$city2856->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2856->setName('Елизово');
//		$manager->persist($city2856); 
//
//		$city2857= new City();
//		$city2857->setId(2857);
//		$city2857->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2857->setName('Ключи');
//		$manager->persist($city2857); 
//
//		$city2858= new City();
//		$city2858->setId(2858);
//		$city2858->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2858->setName('Мильково');
//		$manager->persist($city2858); 
//
//		$city2859= new City();
//		$city2859->setId(2859);
//		$city2859->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2859->setName('Никольское');
//		$manager->persist($city2859); 
//
//		$city2860= new City();
//		$city2860->setId(2860);
//		$city2860->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2860->setName('Оссора');
//		$manager->persist($city2860); 
//
//		$city2861= new City();
//		$city2861->setId(2861);
//		$city2861->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2861->setName('Палана');
//		$manager->persist($city2861); 
//
//		$city2862= new City();
//		$city2862->setId(2862);
//		$city2862->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2862->setName('Петропавловск-Камчатский');
//		$manager->persist($city2862); 
//
//		$city2863= new City();
//		$city2863->setId(2863);
//		$city2863->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2863->setName('Петропавловск-Камчатский (Елизово)');
//		$manager->persist($city2863); 
//
//		$city2864= new City();
//		$city2864->setId(2864);
//		$city2864->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2864->setName('Слаутное');
//		$manager->persist($city2864); 
//
//		$city2865= new City();
//		$city2865->setId(2865);
//		$city2865->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2865->setName('Соболево');
//		$manager->persist($city2865); 
//
//		$city2866= new City();
//		$city2866->setId(2866);
//		$city2866->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2866->setName('Тигиль');
//		$manager->persist($city2866); 
//
//		$city2867= new City();
//		$city2867->setId(2867);
//		$city2867->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2867->setName('Тиличики');
//		$manager->persist($city2867); 
//
//		$city2868= new City();
//		$city2868->setId(2868);
//		$city2868->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2868->setName('Усть-Камчатск');
//		$manager->persist($city2868); 
//
//		$city2869= new City();
//		$city2869->setId(2869);
//		$city2869->setRegion($this->em->getReference('NitraGeoBundle:Region', 43)); 
//		$city2869->setName('Эссо');
//		$manager->persist($city2869); 
//
//		$city2870= new City();
//		$city2870->setId(2870);
//		$city2870->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2870->setName('Архыз');
//		$manager->persist($city2870); 
//
//		$city2871= new City();
//		$city2871->setId(2871);
//		$city2871->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2871->setName('Домбай');
//		$manager->persist($city2871); 
//
//		$city2872= new City();
//		$city2872->setId(2872);
//		$city2872->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2872->setName('Зеленчукская');
//		$manager->persist($city2872); 
//
//		$city2873= new City();
//		$city2873->setId(2873);
//		$city2873->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2873->setName('Карачаевск');
//		$manager->persist($city2873); 
//
//		$city2874= new City();
//		$city2874->setId(2874);
//		$city2874->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2874->setName('Преградная');
//		$manager->persist($city2874); 
//
//		$city2875= new City();
//		$city2875->setId(2875);
//		$city2875->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2875->setName('Теберда');
//		$manager->persist($city2875); 
//
//		$city2876= new City();
//		$city2876->setId(2876);
//		$city2876->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2876->setName('Усть-Джегута');
//		$manager->persist($city2876); 
//
//		$city2877= new City();
//		$city2877->setId(2877);
//		$city2877->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2877->setName('Учкекен');
//		$manager->persist($city2877); 
//
//		$city2878= new City();
//		$city2878->setId(2878);
//		$city2878->setRegion($this->em->getReference('NitraGeoBundle:Region', 44)); 
//		$city2878->setName('Черкесск');
//		$manager->persist($city2878); 
//
//		$city2879= new City();
//		$city2879->setId(2879);
//		$city2879->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2879->setName('Анжеро-Судженск');
//		$manager->persist($city2879); 
//
//		$city2880= new City();
//		$city2880->setId(2880);
//		$city2880->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2880->setName('Бачатский');
//		$manager->persist($city2880); 
//
//		$city2881= new City();
//		$city2881->setId(2881);
//		$city2881->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2881->setName('Белово');
//		$manager->persist($city2881); 
//
//		$city2882= new City();
//		$city2882->setId(2882);
//		$city2882->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2882->setName('Березовский');
//		$manager->persist($city2882); 
//
//		$city2883= new City();
//		$city2883->setId(2883);
//		$city2883->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2883->setName('Верх-Чебула');
//		$manager->persist($city2883); 
//
//		$city2884= new City();
//		$city2884->setId(2884);
//		$city2884->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2884->setName('Грамотеино');
//		$manager->persist($city2884); 
//
//		$city2885= new City();
//		$city2885->setId(2885);
//		$city2885->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2885->setName('Инской');
//		$manager->persist($city2885); 
//
//		$city2886= new City();
//		$city2886->setId(2886);
//		$city2886->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2886->setName('Калтан');
//		$manager->persist($city2886); 
//
//		$city2887= new City();
//		$city2887->setId(2887);
//		$city2887->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2887->setName('Кедровка');
//		$manager->persist($city2887); 
//
//		$city2888= new City();
//		$city2888->setId(2888);
//		$city2888->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2888->setName('Кемерово');
//		$manager->persist($city2888); 
//
//		$city2889= new City();
//		$city2889->setId(2889);
//		$city2889->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2889->setName('Киселевск');
//		$manager->persist($city2889); 
//
//		$city2890= new City();
//		$city2890->setId(2890);
//		$city2890->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2890->setName('Краснобродский');
//		$manager->persist($city2890); 
//
//		$city2891= new City();
//		$city2891->setId(2891);
//		$city2891->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2891->setName('Ленинск-Кузнецкий');
//		$manager->persist($city2891); 
//
//		$city2892= new City();
//		$city2892->setId(2892);
//		$city2892->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2892->setName('Мариинск');
//		$manager->persist($city2892); 
//
//		$city2893= new City();
//		$city2893->setId(2893);
//		$city2893->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2893->setName('Междуреченск');
//		$manager->persist($city2893); 
//
//		$city2894= new City();
//		$city2894->setId(2894);
//		$city2894->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2894->setName('Мыски');
//		$manager->persist($city2894); 
//
//		$city2895= new City();
//		$city2895->setId(2895);
//		$city2895->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2895->setName('Новокузнецк');
//		$manager->persist($city2895); 
//
//		$city2896= new City();
//		$city2896->setId(2896);
//		$city2896->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2896->setName('Новокузнецк (Спиченково)');
//		$manager->persist($city2896); 
//
//		$city2897= new City();
//		$city2897->setId(2897);
//		$city2897->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2897->setName('Осинники');
//		$manager->persist($city2897); 
//
//		$city2898= new City();
//		$city2898->setId(2898);
//		$city2898->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2898->setName('Полысаево');
//		$manager->persist($city2898); 
//
//		$city2899= new City();
//		$city2899->setId(2899);
//		$city2899->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2899->setName('Прокопьевск');
//		$manager->persist($city2899); 
//
//		$city2900= new City();
//		$city2900->setId(2900);
//		$city2900->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2900->setName('Промышленная');
//		$manager->persist($city2900); 
//
//		$city2901= new City();
//		$city2901->setId(2901);
//		$city2901->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2901->setName('Тайга');
//		$manager->persist($city2901); 
//
//		$city2902= new City();
//		$city2902->setId(2902);
//		$city2902->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2902->setName('Таштагол');
//		$manager->persist($city2902); 
//
//		$city2903= new City();
//		$city2903->setId(2903);
//		$city2903->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2903->setName('Тисуль');
//		$manager->persist($city2903); 
//
//		$city2904= new City();
//		$city2904->setId(2904);
//		$city2904->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2904->setName('Топки');
//		$manager->persist($city2904); 
//
//		$city2905= new City();
//		$city2905->setId(2905);
//		$city2905->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2905->setName('Тяжинский');
//		$manager->persist($city2905); 
//
//		$city2906= new City();
//		$city2906->setId(2906);
//		$city2906->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2906->setName('Шерегеш');
//		$manager->persist($city2906); 
//
//		$city2907= new City();
//		$city2907->setId(2907);
//		$city2907->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2907->setName('Юрга');
//		$manager->persist($city2907); 
//
//		$city2908= new City();
//		$city2908->setId(2908);
//		$city2908->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2908->setName('Яшкино');
//		$manager->persist($city2908); 
//
//		$city2909= new City();
//		$city2909->setId(2909);
//		$city2909->setRegion($this->em->getReference('NitraGeoBundle:Region', 45)); 
//		$city2909->setName('Яя');
//		$manager->persist($city2909); 
//
//		$city2910= new City();
//		$city2910->setId(2910);
//		$city2910->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2910->setName('Афанасьево');
//		$manager->persist($city2910); 
//
//		$city2911= new City();
//		$city2911->setId(2911);
//		$city2911->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2911->setName('Белая Холуница');
//		$manager->persist($city2911); 
//
//		$city2912= new City();
//		$city2912->setId(2912);
//		$city2912->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2912->setName('Богородское');
//		$manager->persist($city2912); 
//
//		$city2913= new City();
//		$city2913->setId(2913);
//		$city2913->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2913->setName('Вахруши');
//		$manager->persist($city2913); 
//
//		$city2914= new City();
//		$city2914->setId(2914);
//		$city2914->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2914->setName('Верхошижемье');
//		$manager->persist($city2914); 
//
//		$city2915= new City();
//		$city2915->setId(2915);
//		$city2915->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2915->setName('Вятские Поляны');
//		$manager->persist($city2915); 
//
//		$city2916= new City();
//		$city2916->setId(2916);
//		$city2916->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2916->setName('Даровской');
//		$manager->persist($city2916); 
//
//		$city2917= new City();
//		$city2917->setId(2917);
//		$city2917->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2917->setName('Зуевка');
//		$manager->persist($city2917); 
//
//		$city2918= new City();
//		$city2918->setId(2918);
//		$city2918->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2918->setName('Кикнур');
//		$manager->persist($city2918); 
//
//		$city2919= new City();
//		$city2919->setId(2919);
//		$city2919->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2919->setName('Кильмезь');
//		$manager->persist($city2919); 
//
//		$city2920= new City();
//		$city2920->setId(2920);
//		$city2920->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2920->setName('Кирово-Чепецк');
//		$manager->persist($city2920); 
//
//		$city2921= new City();
//		$city2921->setId(2921);
//		$city2921->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2921->setName('Киров');
//		$manager->persist($city2921); 
//
//		$city2922= new City();
//		$city2922->setId(2922);
//		$city2922->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2922->setName('Кирс');
//		$manager->persist($city2922); 
//
//		$city2923= new City();
//		$city2923->setId(2923);
//		$city2923->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2923->setName('Котельнич');
//		$manager->persist($city2923); 
//
//		$city2924= new City();
//		$city2924->setId(2924);
//		$city2924->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2924->setName('Кумены');
//		$manager->persist($city2924); 
//
//		$city2925= new City();
//		$city2925->setId(2925);
//		$city2925->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2925->setName('Лальск');
//		$manager->persist($city2925); 
//
//		$city2926= new City();
//		$city2926->setId(2926);
//		$city2926->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2926->setName('Луза');
//		$manager->persist($city2926); 
//
//		$city2927= new City();
//		$city2927->setId(2927);
//		$city2927->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2927->setName('Лянгасово');
//		$manager->persist($city2927); 
//
//		$city2928= new City();
//		$city2928->setId(2928);
//		$city2928->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2928->setName('Малмыж');
//		$manager->persist($city2928); 
//
//		$city2929= new City();
//		$city2929->setId(2929);
//		$city2929->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2929->setName('Мураши');
//		$manager->persist($city2929); 
//
//		$city2930= new City();
//		$city2930->setId(2930);
//		$city2930->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2930->setName('Нагорск');
//		$manager->persist($city2930); 
//
//		$city2931= new City();
//		$city2931->setId(2931);
//		$city2931->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2931->setName('Нема');
//		$manager->persist($city2931); 
//
//		$city2932= new City();
//		$city2932->setId(2932);
//		$city2932->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2932->setName('Нолинск');
//		$manager->persist($city2932); 
//
//		$city2933= new City();
//		$city2933->setId(2933);
//		$city2933->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2933->setName('Омутнинск');
//		$manager->persist($city2933); 
//
//		$city2934= new City();
//		$city2934->setId(2934);
//		$city2934->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2934->setName('Опарино');
//		$manager->persist($city2934); 
//
//		$city2935= new City();
//		$city2935->setId(2935);
//		$city2935->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2935->setName('Подосиновец');
//		$manager->persist($city2935); 
//
//		$city2936= new City();
//		$city2936->setId(2936);
//		$city2936->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2936->setName('Санчурск');
//		$manager->persist($city2936); 
//
//		$city2937= new City();
//		$city2937->setId(2937);
//		$city2937->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2937->setName('Слободской');
//		$manager->persist($city2937); 
//
//		$city2938= new City();
//		$city2938->setId(2938);
//		$city2938->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2938->setName('Суна');
//		$manager->persist($city2938); 
//
//		$city2939= new City();
//		$city2939->setId(2939);
//		$city2939->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2939->setName('Уни');
//		$manager->persist($city2939); 
//
//		$city2940= new City();
//		$city2940->setId(2940);
//		$city2940->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2940->setName('Уржум');
//		$manager->persist($city2940); 
//
//		$city2941= new City();
//		$city2941->setId(2941);
//		$city2941->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2941->setName('Фаленки');
//		$manager->persist($city2941); 
//
//		$city2942= new City();
//		$city2942->setId(2942);
//		$city2942->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2942->setName('Шабалино');
//		$manager->persist($city2942); 
//
//		$city2943= new City();
//		$city2943->setId(2943);
//		$city2943->setRegion($this->em->getReference('NitraGeoBundle:Region', 46)); 
//		$city2943->setName('Яранск');
//		$manager->persist($city2943); 
//
//		$city2944= new City();
//		$city2944->setId(2944);
//		$city2944->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2944->setName('Буй');
//		$manager->persist($city2944); 
//
//		$city2945= new City();
//		$city2945->setId(2945);
//		$city2945->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2945->setName('Ветлужский');
//		$manager->persist($city2945); 
//
//		$city2946= new City();
//		$city2946->setId(2946);
//		$city2946->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2946->setName('Волгореченск');
//		$manager->persist($city2946); 
//
//		$city2947= new City();
//		$city2947->setId(2947);
//		$city2947->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2947->setName('Вохма');
//		$manager->persist($city2947); 
//
//		$city2948= new City();
//		$city2948->setId(2948);
//		$city2948->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2948->setName('Георгиевское');
//		$manager->persist($city2948); 
//
//		$city2949= new City();
//		$city2949->setId(2949);
//		$city2949->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2949->setName('Кологрив');
//		$manager->persist($city2949); 
//
//		$city2950= new City();
//		$city2950->setId(2950);
//		$city2950->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2950->setName('Кострома');
//		$manager->persist($city2950); 
//
//		$city2951= new City();
//		$city2951->setId(2951);
//		$city2951->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2951->setName('Кострома (Сокеркино)');
//		$manager->persist($city2951); 
//
//		$city2952= new City();
//		$city2952->setId(2952);
//		$city2952->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2952->setName('Макарьев');
//		$manager->persist($city2952); 
//
//		$city2953= new City();
//		$city2953->setId(2953);
//		$city2953->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2953->setName('Мантурово');
//		$manager->persist($city2953); 
//
//		$city2954= new City();
//		$city2954->setId(2954);
//		$city2954->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2954->setName('Нерехта');
//		$manager->persist($city2954); 
//
//		$city2955= new City();
//		$city2955->setId(2955);
//		$city2955->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2955->setName('Нея');
//		$manager->persist($city2955); 
//
//		$city2956= new City();
//		$city2956->setId(2956);
//		$city2956->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2956->setName('Пыщуг');
//		$manager->persist($city2956); 
//
//		$city2957= new City();
//		$city2957->setId(2957);
//		$city2957->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2957->setName('Солигалич');
//		$manager->persist($city2957); 
//
//		$city2958= new City();
//		$city2958->setId(2958);
//		$city2958->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2958->setName('Чухлома');
//		$manager->persist($city2958); 
//
//		$city2959= new City();
//		$city2959->setId(2959);
//		$city2959->setRegion($this->em->getReference('NitraGeoBundle:Region', 47)); 
//		$city2959->setName('Шарья');
//		$manager->persist($city2959); 
//
//		$city2960= new City();
//		$city2960->setId(2960);
//		$city2960->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2960->setName('Абинск');
//		$manager->persist($city2960); 
//
//		$city2961= new City();
//		$city2961->setId(2961);
//		$city2961->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2961->setName('Адлер');
//		$manager->persist($city2961); 
//
//		$city2962= new City();
//		$city2962->setId(2962);
//		$city2962->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2962->setName('Адлер Веселое');
//		$manager->persist($city2962); 
//
//		$city2963= new City();
//		$city2963->setId(2963);
//		$city2963->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2963->setName('Адлер Веселое-Мира');
//		$manager->persist($city2963); 
//
//		$city2964= new City();
//		$city2964->setId(2964);
//		$city2964->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2964->setName('Адлер (Голицыно)');
//		$manager->persist($city2964); 
//
//		$city2965= new City();
//		$city2965->setId(2965);
//		$city2965->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2965->setName('Адлер Ермоловка-МК');
//		$manager->persist($city2965); 
//
//		$city2966= new City();
//		$city2966->setId(2966);
//		$city2966->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2966->setName('Адлер Лесное');
//		$manager->persist($city2966); 
//
//		$city2967= new City();
//		$city2967->setId(2967);
//		$city2967->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2967->setName('Адлер Молдовка');
//		$manager->persist($city2967); 
//
//		$city2968= new City();
//		$city2968->setId(2968);
//		$city2968->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2968->setName('Адлер (м/с)');
//		$manager->persist($city2968); 
//
//		$city2969= new City();
//		$city2969->setId(2969);
//		$city2969->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2969->setName('Адлер Норлуйс');
//		$manager->persist($city2969); 
//
//		$city2970= new City();
//		$city2970->setId(2970);
//		$city2970->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2970->setName('Адлер Пихтинка МК');
//		$manager->persist($city2970); 
//
//		$city2971= new City();
//		$city2971->setId(2971);
//		$city2971->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2971->setName('Адлер Пограничник');
//		$manager->persist($city2971); 
//
//		$city2972= new City();
//		$city2972->setId(2972);
//		$city2972->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2972->setName('Альпика-1000 АМС');
//		$manager->persist($city2972); 
//
//		$city2973= new City();
//		$city2973->setId(2973);
//		$city2973->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2973->setName('Альпика-1500 АМС');
//		$manager->persist($city2973); 
//
//		$city2974= new City();
//		$city2974->setId(2974);
//		$city2974->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2974->setName('АМС 11(х. Аибга) RKHU1');
//		$manager->persist($city2974); 
//
//		$city2975= new City();
//		$city2975->setId(2975);
//		$city2975->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2975->setName('АМС 12(старт мужской) RKHU2');
//		$manager->persist($city2975); 
//
//		$city2976= new City();
//		$city2976->setId(2976);
//		$city2976->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2976->setName('АМС 13(старт женский) RKHU3');
//		$manager->persist($city2976); 
//
//		$city2977= new City();
//		$city2977->setId(2977);
//		$city2977->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2977->setName('АМС 14(середина трассы) RKHU4');
//		$manager->persist($city2977); 
//
//		$city2978= new City();
//		$city2978->setId(2978);
//		$city2978->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2978->setName('Анапа');
//		$manager->persist($city2978); 
//
//		$city2979= new City();
//		$city2979->setId(2979);
//		$city2979->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2979->setName('Анапа (Витязево)');
//		$manager->persist($city2979); 
//
//		$city2980= new City();
//		$city2980->setId(2980);
//		$city2980->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2980->setName('Анапская');
//		$manager->persist($city2980); 
//
//		$city2981= new City();
//		$city2981->setId(2981);
//		$city2981->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2981->setName('Анастасиевская');
//		$manager->persist($city2981); 
//
//		$city2982= new City();
//		$city2982->setId(2982);
//		$city2982->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2982->setName('Апшеронск');
//		$manager->persist($city2982); 
//
//		$city2983= new City();
//		$city2983->setId(2983);
//		$city2983->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2983->setName('Армавир');
//		$manager->persist($city2983); 
//
//		$city2984= new City();
//		$city2984->setId(2984);
//		$city2984->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2984->setName('Афипский');
//		$manager->persist($city2984); 
//
//		$city2985= new City();
//		$city2985->setId(2985);
//		$city2985->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2985->setName('Ахтырский');
//		$manager->persist($city2985); 
//
//		$city2986= new City();
//		$city2986->setId(2986);
//		$city2986->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2986->setName('Белая Глина');
//		$manager->persist($city2986); 
//
//		$city2987= new City();
//		$city2987->setId(2987);
//		$city2987->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2987->setName('Белореченск');
//		$manager->persist($city2987); 
//
//		$city2988= new City();
//		$city2988->setId(2988);
//		$city2988->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2988->setName('Благовещенская');
//		$manager->persist($city2988); 
//
//		$city2989= new City();
//		$city2989->setId(2989);
//		$city2989->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2989->setName('Брюховецкая');
//		$manager->persist($city2989); 
//
//		$city2990= new City();
//		$city2990->setId(2990);
//		$city2990->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2990->setName('Варениковская');
//		$manager->persist($city2990); 
//
//		$city2991= new City();
//		$city2991->setId(2991);
//		$city2991->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2991->setName('Васюринская');
//		$manager->persist($city2991); 
//
//		$city2992= new City();
//		$city2992->setId(2992);
//		$city2992->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2992->setName('Выселки');
//		$manager->persist($city2992); 
//
//		$city2993= new City();
//		$city2993->setId(2993);
//		$city2993->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2993->setName('Геленджик');
//		$manager->persist($city2993); 
//
//		$city2994= new City();
//		$city2994->setId(2994);
//		$city2994->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2994->setName('Горячий Ключ');
//		$manager->persist($city2994); 
//
//		$city2995= new City();
//		$city2995->setId(2995);
//		$city2995->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2995->setName('Г-П Биатлон-1400 (Ирам)');
//		$manager->persist($city2995); 
//
//		$city2996= new City();
//		$city2996->setId(2996);
//		$city2996->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2996->setName('Г-П Биатлон-1500 (Ирам)');
//		$manager->persist($city2996); 
//
//		$city2997= new City();
//		$city2997->setId(2997);
//		$city2997->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2997->setName('Г-П Биатлонный стадион (Ирам)');
//		$manager->persist($city2997); 
//
//		$city2998= new City();
//		$city2998->setId(2998);
//		$city2998->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2998->setName('Г-П Лыжный стадион (Ирам)');
//		$manager->persist($city2998); 
//
//		$city2999= new City();
//		$city2999->setId(2999);
//		$city2999->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city2999->setName('Гулькевичи');
//		$manager->persist($city2999); 
//
//		$city3000= new City();
//		$city3000->setId(3000);
//		$city3000->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3000->setName('Дагомыс');
//		$manager->persist($city3000); 
//
//		$city3001= new City();
//		$city3001->setId(3001);
//		$city3001->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3001->setName('Двубратский');
//		$manager->persist($city3001); 
//
//		$city3002= new City();
//		$city3002->setId(3002);
//		$city3002->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3002->setName('Динская');
//		$manager->persist($city3002); 
//
//		$city3003= new City();
//		$city3003->setId(3003);
//		$city3003->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3003->setName('Ейск');
//		$manager->persist($city3003); 
//
//		$city3004= new City();
//		$city3004->setId(3004);
//		$city3004->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3004->setName('Елизаветинская');
//		$manager->persist($city3004); 
//
//		$city3005= new City();
//		$city3005->setId(3005);
//		$city3005->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3005->setName('Ильский');
//		$manager->persist($city3005); 
//
//		$city3006= new City();
//		$city3006->setId(3006);
//		$city3006->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3006->setName('Имеретинская бухта');
//		$manager->persist($city3006); 
//
//		$city3007= new City();
//		$city3007->setId(3007);
//		$city3007->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3007->setName('Ирклиевская');
//		$manager->persist($city3007); 
//
//		$city3008= new City();
//		$city3008->setId(3008);
//		$city3008->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3008->setName('Кавказская');
//		$manager->persist($city3008); 
//
//		$city3009= new City();
//		$city3009->setId(3009);
//		$city3009->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3009->setName('Казанская');
//		$manager->persist($city3009); 
//
//		$city3010= new City();
//		$city3010->setId(3010);
//		$city3010->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3010->setName('Каладжинская');
//		$manager->persist($city3010); 
//
//		$city3011= new City();
//		$city3011->setId(3011);
//		$city3011->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3011->setName('Калинино');
//		$manager->persist($city3011); 
//
//		$city3012= new City();
//		$city3012->setId(3012);
//		$city3012->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3012->setName('Калининская');
//		$manager->persist($city3012); 
//
//		$city3013= new City();
//		$city3013->setId(3013);
//		$city3013->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3013->setName('Каневская');
//		$manager->persist($city3013); 
//
//		$city3014= new City();
//		$city3014->setId(3014);
//		$city3014->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3014->setName('Кепша АМС');
//		$manager->persist($city3014); 
//
//		$city3015= new City();
//		$city3015->setId(3015);
//		$city3015->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3015->setName('Кореновск');
//		$manager->persist($city3015); 
//
//		$city3016= new City();
//		$city3016->setId(3016);
//		$city3016->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3016->setName('Красная поляна-Верблюд');
//		$manager->persist($city3016); 
//
//		$city3017= new City();
//		$city3017->setId(3017);
//		$city3017->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3017->setName('Краснодар');
//		$manager->persist($city3017); 
//
//		$city3018= new City();
//		$city3018->setId(3018);
//		$city3018->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3018->setName('Краснодар (Пашковский)');
//		$manager->persist($city3018); 
//
//		$city3019= new City();
//		$city3019->setId(3019);
//		$city3019->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3019->setName('Кропоткин');
//		$manager->persist($city3019); 
//
//		$city3020= new City();
//		$city3020->setId(3020);
//		$city3020->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3020->setName('Крыловская');
//		$manager->persist($city3020); 
//
//		$city3021= new City();
//		$city3021->setId(3021);
//		$city3021->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3021->setName('Крымск');
//		$manager->persist($city3021); 
//
//		$city3022= new City();
//		$city3022->setId(3022);
//		$city3022->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3022->setName('Курганинск');
//		$manager->persist($city3022); 
//
//		$city3023= new City();
//		$city3023->setId(3023);
//		$city3023->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3023->setName('Кучугуры');
//		$manager->persist($city3023); 
//
//		$city3024= new City();
//		$city3024->setId(3024);
//		$city3024->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3024->setName('Кущевская');
//		$manager->persist($city3024); 
//
//		$city3025= new City();
//		$city3025->setId(3025);
//		$city3025->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3025->setName('Лабинск');
//		$manager->persist($city3025); 
//
//		$city3026= new City();
//		$city3026->setId(3026);
//		$city3026->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3026->setName('Лаго-Наки плато');
//		$manager->persist($city3026); 
//
//		$city3027= new City();
//		$city3027->setId(3027);
//		$city3027->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3027->setName('Ладожская');
//		$manager->persist($city3027); 
//
//		$city3028= new City();
//		$city3028->setId(3028);
//		$city3028->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3028->setName('Лазаревское');
//		$manager->persist($city3028); 
//
//		$city3029= new City();
//		$city3029->setId(3029);
//		$city3029->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3029->setName('Лазаревское АМС');
//		$manager->persist($city3029); 
//
//		$city3030= new City();
//		$city3030->setId(3030);
//		$city3030->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3030->setName('Ленинградская');
//		$manager->persist($city3030); 
//
//		$city3031= new City();
//		$city3031->setId(3031);
//		$city3031->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3031->setName('Магри АМС');
//		$manager->persist($city3031); 
//
//		$city3032= new City();
//		$city3032->setId(3032);
//		$city3032->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3032->setName('Марьянская');
//		$manager->persist($city3032); 
//
//		$city3033= new City();
//		$city3033->setId(3033);
//		$city3033->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3033->setName('Медведовская');
//		$manager->persist($city3033); 
//
//		$city3034= new City();
//		$city3034->setId(3034);
//		$city3034->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3034->setName('Мостовской');
//		$manager->persist($city3034); 
//
//		$city3035= new City();
//		$city3035->setId(3035);
//		$city3035->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3035->setName('Новодеревянковская');
//		$manager->persist($city3035); 
//
//		$city3036= new City();
//		$city3036->setId(3036);
//		$city3036->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3036->setName('Новокубанск');
//		$manager->persist($city3036); 
//
//		$city3037= new City();
//		$city3037->setId(3037);
//		$city3037->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3037->setName('Новоминская');
//		$manager->persist($city3037); 
//
//		$city3038= new City();
//		$city3038->setId(3038);
//		$city3038->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3038->setName('Новомихайловский');
//		$manager->persist($city3038); 
//
//		$city3039= new City();
//		$city3039->setId(3039);
//		$city3039->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3039->setName('Новопокровская');
//		$manager->persist($city3039); 
//
//		$city3040= new City();
//		$city3040->setId(3040);
//		$city3040->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3040->setName('Новороссийск');
//		$manager->persist($city3040); 
//
//		$city3041= new City();
//		$city3041->setId(3041);
//		$city3041->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3041->setName('Новотитаровская');
//		$manager->persist($city3041); 
//
//		$city3042= new City();
//		$city3042->setId(3042);
//		$city3042->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3042->setName('Октябрьская');
//		$manager->persist($city3042); 
//
//		$city3043= new City();
//		$city3043->setId(3043);
//		$city3043->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3043->setName('Отрадная');
//		$manager->persist($city3043); 
//
//		$city3044= new City();
//		$city3044->setId(3044);
//		$city3044->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3044->setName('Павловская');
//		$manager->persist($city3044); 
//
//		$city3045= new City();
//		$city3045->setId(3045);
//		$city3045->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3045->setName('Пашковский');
//		$manager->persist($city3045); 
//
//		$city3046= new City();
//		$city3046->setId(3046);
//		$city3046->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3046->setName('Петровская');
//		$manager->persist($city3046); 
//
//		$city3047= new City();
//		$city3047->setId(3047);
//		$city3047->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3047->setName('Платнировская');
//		$manager->persist($city3047); 
//
//		$city3048= new City();
//		$city3048->setId(3048);
//		$city3048->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3048->setName('Полтавская');
//		$manager->persist($city3048); 
//
//		$city3049= new City();
//		$city3049->setId(3049);
//		$city3049->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3049->setName('Приморско-Ахтарск');
//		$manager->persist($city3049); 
//
//		$city3050= new City();
//		$city3050->setId(3050);
//		$city3050->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3050->setName('Псебай');
//		$manager->persist($city3050); 
//
//		$city3051= new City();
//		$city3051->setId(3051);
//		$city3051->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3051->setName('РГМ Агро Сочи АМК');
//		$manager->persist($city3051); 
//
//		$city3052= new City();
//		$city3052->setId(3052);
//		$city3052->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3052->setName('РГМ Аибга АМК');
//		$manager->persist($city3052); 
//
//		$city3053= new City();
//		$city3053->setId(3053);
//		$city3053->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3053->setName('РГМ Кордон Лаура АМК');
//		$manager->persist($city3053); 
//
//		$city3054= new City();
//		$city3054->setId(3054);
//		$city3054->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3054->setName('РГМ Красная поляна АМК');
//		$manager->persist($city3054); 
//
//		$city3055= new City();
//		$city3055->setId(3055);
//		$city3055->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3055->setName('Р-Х АМС 17 (зона финиша, 980) RKHU07');
//		$manager->persist($city3055); 
//
//		$city3056= new City();
//		$city3056->setId(3056);
//		$city3056->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3056->setName('Р-Х АМС 18 (женский старт, 1740) RKHU08');
//		$manager->persist($city3056); 
//
//		$city3057= new City();
//		$city3057->setId(3057);
//		$city3057->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3057->setName('Санно-бобслейная трасса');
//		$manager->persist($city3057); 
//
//		$city3058= new City();
//		$city3058->setId(3058);
//		$city3058->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3058->setName('С-Б Сани-700 (Ирам)');
//		$manager->persist($city3058); 
//
//		$city3059= new City();
//		$city3059->setId(3059);
//		$city3059->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3059->setName('С-Б Сани-830 (Ирам)');
//		$manager->persist($city3059); 
//
//		$city3060= new City();
//		$city3060->setId(3060);
//		$city3060->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3060->setName('Северская');
//		$manager->persist($city3060); 
//
//		$city3061= new City();
//		$city3061->setId(3061);
//		$city3061->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3061->setName('Славянск-на-Кубани');
//		$manager->persist($city3061); 
//
//		$city3062= new City();
//		$city3062->setId(3062);
//		$city3062->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3062->setName('Солох Аул АМС');
//		$manager->persist($city3062); 
//
//		$city3063= new City();
//		$city3063->setId(3063);
//		$city3063->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3063->setName('Сочи');
//		$manager->persist($city3063); 
//
//		$city3064= new City();
//		$city3064->setId(3064);
//		$city3064->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3064->setName('Сочи (Адлер)');
//		$manager->persist($city3064); 
//
//		$city3065= new City();
//		$city3065->setId(3065);
//		$city3065->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3065->setName('Сочи Ахун');
//		$manager->persist($city3065); 
//
//		$city3066= new City();
//		$city3066->setId(3066);
//		$city3066->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3066->setName('Сочи Зубова щель');
//		$manager->persist($city3066); 
//
//		$city3067= new City();
//		$city3067->setId(3067);
//		$city3067->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3067->setName('Сочи Калиново озеро');
//		$manager->persist($city3067); 
//
//		$city3068= new City();
//		$city3068->setId(3068);
//		$city3068->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3068->setName('Сочи Красная Поляна');
//		$manager->persist($city3068); 
//
//		$city3069= new City();
//		$city3069->setId(3069);
//		$city3069->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3069->setName('Сочи Лоо-башня');
//		$manager->persist($city3069); 
//
//		$city3070= new City();
//		$city3070->setId(3070);
//		$city3070->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3070->setName('Сочи Мацеста Чай');
//		$manager->persist($city3070); 
//
//		$city3071= new City();
//		$city3071->setId(3071);
//		$city3071->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3071->setName('Сочи Обзорная');
//		$manager->persist($city3071); 
//
//		$city3072= new City();
//		$city3072->setId(3072);
//		$city3072->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3072->setName('Сочи Пластунка');
//		$manager->persist($city3072); 
//
//		$city3073= new City();
//		$city3073->setId(3073);
//		$city3073->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3073->setName('Сочи Эсто Садок');
//		$manager->persist($city3073); 
//
//		$city3074= new City();
//		$city3074->setId(3074);
//		$city3074->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3074->setName('Старовеличковская');
//		$manager->persist($city3074); 
//
//		$city3075= new City();
//		$city3075->setId(3075);
//		$city3075->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3075->setName('Стародеревянковская');
//		$manager->persist($city3075); 
//
//		$city3076= new City();
//		$city3076->setId(3076);
//		$city3076->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3076->setName('Старокорсунская');
//		$manager->persist($city3076); 
//
//		$city3077= new City();
//		$city3077->setId(3077);
//		$city3077->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3077->setName('Староминская');
//		$manager->persist($city3077); 
//
//		$city3078= new City();
//		$city3078->setId(3078);
//		$city3078->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3078->setName('Старомышастовская');
//		$manager->persist($city3078); 
//
//		$city3079= new City();
//		$city3079->setId(3079);
//		$city3079->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3079->setName('Старонижестеблиевская');
//		$manager->persist($city3079); 
//
//		$city3080= new City();
//		$city3080->setId(3080);
//		$city3080->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3080->setName('Старотитаровская');
//		$manager->persist($city3080); 
//
//		$city3081= new City();
//		$city3081->setId(3081);
//		$city3081->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3081->setName('Старощербиновская');
//		$manager->persist($city3081); 
//
//		$city3082= new City();
//		$city3082->setId(3082);
//		$city3082->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3082->setName('Тамань');
//		$manager->persist($city3082); 
//
//		$city3083= new City();
//		$city3083->setId(3083);
//		$city3083->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3083->setName('Тбилисская');
//		$manager->persist($city3083); 
//
//		$city3084= new City();
//		$city3084->setId(3084);
//		$city3084->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3084->setName('Темрюк');
//		$manager->persist($city3084); 
//
//		$city3085= new City();
//		$city3085->setId(3085);
//		$city3085->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3085->setName('Тимашевск');
//		$manager->persist($city3085); 
//
//		$city3086= new City();
//		$city3086->setId(3086);
//		$city3086->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3086->setName('Тихорецк');
//		$manager->persist($city3086); 
//
//		$city3087= new City();
//		$city3087->setId(3087);
//		$city3087->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3087->setName('Т-П Трамплин-800 (Ирам)');
//		$manager->persist($city3087); 
//
//		$city3088= new City();
//		$city3088->setId(3088);
//		$city3088->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3088->setName('Туапсе');
//		$manager->persist($city3088); 
//
//		$city3089= new City();
//		$city3089->setId(3089);
//		$city3089->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3089->setName('Успенская');
//		$manager->persist($city3089); 
//
//		$city3090= new City();
//		$city3090->setId(3090);
//		$city3090->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3090->setName('Успенское');
//		$manager->persist($city3090); 
//
//		$city3091= new City();
//		$city3091->setId(3091);
//		$city3091->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3091->setName('Усть-Лабинск');
//		$manager->persist($city3091); 
//
//		$city3092= new City();
//		$city3092->setId(3092);
//		$city3092->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3092->setName('Ф-С Сноуборд-1025 (Ирам)');
//		$manager->persist($city3092); 
//
//		$city3093= new City();
//		$city3093->setId(3093);
//		$city3093->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3093->setName('Ф-С Фристайл-1080 (Ирам)');
//		$manager->persist($city3093); 
//
//		$city3094= new City();
//		$city3094->setId(3094);
//		$city3094->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3094->setName('Хадыженск');
//		$manager->persist($city3094); 
//
//		$city3095= new City();
//		$city3095->setId(3095);
//		$city3095->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3095->setName('Холмская');
//		$manager->persist($city3095); 
//
//		$city3096= new City();
//		$city3096->setId(3096);
//		$city3096->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3096->setName('Хоста');
//		$manager->persist($city3096); 
//
//		$city3097= new City();
//		$city3097->setId(3097);
//		$city3097->setRegion($this->em->getReference('NitraGeoBundle:Region', 48)); 
//		$city3097->setName('Шкуринская');
//		$manager->persist($city3097); 
//
//		$city3098= new City();
//		$city3098->setId(3098);
//		$city3098->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3098->setName('Абан');
//		$manager->persist($city3098); 
//
//		$city3099= new City();
//		$city3099->setId(3099);
//		$city3099->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3099->setName('Агата');
//		$manager->persist($city3099); 
//
//		$city3100= new City();
//		$city3100->setId(3100);
//		$city3100->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3100->setName('Ачинск');
//		$manager->persist($city3100); 
//
//		$city3101= new City();
//		$city3101->setId(3101);
//		$city3101->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3101->setName('Байкит');
//		$manager->persist($city3101); 
//
//		$city3102= new City();
//		$city3102->setId(3102);
//		$city3102->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3102->setName('Балахта');
//		$manager->persist($city3102); 
//
//		$city3103= new City();
//		$city3103->setId(3103);
//		$city3103->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3103->setName('Боготол');
//		$manager->persist($city3103); 
//
//		$city3104= new City();
//		$city3104->setId(3104);
//		$city3104->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3104->setName('Богучаны');
//		$manager->persist($city3104); 
//
//		$city3105= new City();
//		$city3105->setId(3105);
//		$city3105->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3105->setName('Большая Мурта');
//		$manager->persist($city3105); 
//
//		$city3106= new City();
//		$city3106->setId(3106);
//		$city3106->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3106->setName('Большой Улуй');
//		$manager->persist($city3106); 
//
//		$city3107= new City();
//		$city3107->setId(3107);
//		$city3107->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3107->setName('Бородино');
//		$manager->persist($city3107); 
//
//		$city3108= new City();
//		$city3108->setId(3108);
//		$city3108->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3108->setName('Ванавара');
//		$manager->persist($city3108); 
//
//		$city3109= new City();
//		$city3109->setId(3109);
//		$city3109->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3109->setName('Ванкор');
//		$manager->persist($city3109); 
//
//		$city3110= new City();
//		$city3110->setId(3110);
//		$city3110->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3110->setName('Волочанка');
//		$manager->persist($city3110); 
//
//		$city3111= new City();
//		$city3111->setId(3111);
//		$city3111->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3111->setName('Дивногорск');
//		$manager->persist($city3111); 
//
//		$city3112= new City();
//		$city3112->setId(3112);
//		$city3112->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3112->setName('Диксон');
//		$manager->persist($city3112); 
//
//		$city3113= new City();
//		$city3113->setId(3113);
//		$city3113->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3113->setName('Дубинино');
//		$manager->persist($city3113); 
//
//		$city3114= new City();
//		$city3114->setId(3114);
//		$city3114->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3114->setName('Дудинка');
//		$manager->persist($city3114); 
//
//		$city3115= new City();
//		$city3115->setId(3115);
//		$city3115->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3115->setName('Емельяново');
//		$manager->persist($city3115); 
//
//		$city3116= new City();
//		$city3116->setId(3116);
//		$city3116->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3116->setName('Енисейск');
//		$manager->persist($city3116); 
//
//		$city3117= new City();
//		$city3117->setId(3117);
//		$city3117->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3117->setName('Ермаковское');
//		$manager->persist($city3117); 
//
//		$city3118= new City();
//		$city3118->setId(3118);
//		$city3118->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3118->setName('Железногорск');
//		$manager->persist($city3118); 
//
//		$city3119= new City();
//		$city3119->setId(3119);
//		$city3119->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3119->setName('Заозерный');
//		$manager->persist($city3119); 
//
//		$city3120= new City();
//		$city3120->setId(3120);
//		$city3120->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3120->setName('Зеленогорск');
//		$manager->persist($city3120); 
//
//		$city3121= new City();
//		$city3121->setId(3121);
//		$city3121->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3121->setName('Игарка');
//		$manager->persist($city3121); 
//
//		$city3122= new City();
//		$city3122->setId(3122);
//		$city3122->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3122->setName('Идринское');
//		$manager->persist($city3122); 
//
//		$city3123= new City();
//		$city3123->setId(3123);
//		$city3123->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3123->setName('Иланский');
//		$manager->persist($city3123); 
//
//		$city3124= new City();
//		$city3124->setId(3124);
//		$city3124->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3124->setName('Ирбейское');
//		$manager->persist($city3124); 
//
//		$city3125= new City();
//		$city3125->setId(3125);
//		$city3125->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3125->setName('Кайеркан');
//		$manager->persist($city3125); 
//
//		$city3126= new City();
//		$city3126->setId(3126);
//		$city3126->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3126->setName('Канск');
//		$manager->persist($city3126); 
//
//		$city3127= new City();
//		$city3127->setId(3127);
//		$city3127->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3127->setName('Каратузское');
//		$manager->persist($city3127); 
//
//		$city3128= new City();
//		$city3128->setId(3128);
//		$city3128->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3128->setName('Караул');
//		$manager->persist($city3128); 
//
//		$city3129= new City();
//		$city3129->setId(3129);
//		$city3129->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3129->setName('Кежма');
//		$manager->persist($city3129); 
//
//		$city3130= new City();
//		$city3130->setId(3130);
//		$city3130->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3130->setName('Кодинск');
//		$manager->persist($city3130); 
//
//		$city3131= new City();
//		$city3131->setId(3131);
//		$city3131->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3131->setName('Краснотуранск');
//		$manager->persist($city3131); 
//
//		$city3132= new City();
//		$city3132->setId(3132);
//		$city3132->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3132->setName('Красноярск');
//		$manager->persist($city3132); 
//
//		$city3133= new City();
//		$city3133->setId(3133);
//		$city3133->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3133->setName('Красноярск (Емельяново)');
//		$manager->persist($city3133); 
//
//		$city3134= new City();
//		$city3134->setId(3134);
//		$city3134->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3134->setName('Красноярск (Черемшанка)');
//		$manager->persist($city3134); 
//
//		$city3135= new City();
//		$city3135->setId(3135);
//		$city3135->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3135->setName('Курагино');
//		$manager->persist($city3135); 
//
//		$city3136= new City();
//		$city3136->setId(3136);
//		$city3136->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3136->setName('Лесосибирск');
//		$manager->persist($city3136); 
//
//		$city3137= new City();
//		$city3137->setId(3137);
//		$city3137->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3137->setName('Минусинск');
//		$manager->persist($city3137); 
//
//		$city3138= new City();
//		$city3138->setId(3138);
//		$city3138->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3138->setName('Мотыгино');
//		$manager->persist($city3138); 
//
//		$city3139= new City();
//		$city3139->setId(3139);
//		$city3139->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3139->setName('Мыс Стерлегова');
//		$manager->persist($city3139); 
//
//		$city3140= new City();
//		$city3140->setId(3140);
//		$city3140->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3140->setName('Назарово');
//		$manager->persist($city3140); 
//
//		$city3141= new City();
//		$city3141->setId(3141);
//		$city3141->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3141->setName('Новобирилюссы');
//		$manager->persist($city3141); 
//
//		$city3142= new City();
//		$city3142->setId(3142);
//		$city3142->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3142->setName('Новоселово');
//		$manager->persist($city3142); 
//
//		$city3143= new City();
//		$city3143->setId(3143);
//		$city3143->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3143->setName('Норильск');
//		$manager->persist($city3143); 
//
//		$city3144= new City();
//		$city3144->setId(3144);
//		$city3144->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3144->setName('Норильск (Алыкель)');
//		$manager->persist($city3144); 
//
//		$city3145= new City();
//		$city3145->setId(3145);
//		$city3145->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3145->setName('Пировское');
//		$manager->persist($city3145); 
//
//		$city3146= new City();
//		$city3146->setId(3146);
//		$city3146->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3146->setName('Северо-Енисейский');
//		$manager->persist($city3146); 
//
//		$city3147= new City();
//		$city3147->setId(3147);
//		$city3147->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3147->setName('Снежногорск');
//		$manager->persist($city3147); 
//
//		$city3148= new City();
//		$city3148->setId(3148);
//		$city3148->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3148->setName('Солнечный');
//		$manager->persist($city3148); 
//
//		$city3149= new City();
//		$city3149->setId(3149);
//		$city3149->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3149->setName('Сосновоборск');
//		$manager->persist($city3149); 
//
//		$city3150= new City();
//		$city3150->setId(3150);
//		$city3150->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3150->setName('Сухобузимское');
//		$manager->persist($city3150); 
//
//		$city3151= new City();
//		$city3151->setId(3151);
//		$city3151->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3151->setName('Талнах');
//		$manager->persist($city3151); 
//
//		$city3152= new City();
//		$city3152->setId(3152);
//		$city3152->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3152->setName('Тасеево');
//		$manager->persist($city3152); 
//
//		$city3153= new City();
//		$city3153->setId(3153);
//		$city3153->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3153->setName('Тура');
//		$manager->persist($city3153); 
//
//		$city3154= new City();
//		$city3154->setId(3154);
//		$city3154->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3154->setName('Туруханск');
//		$manager->persist($city3154); 
//
//		$city3155= new City();
//		$city3155->setId(3155);
//		$city3155->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3155->setName('Тутончаны');
//		$manager->persist($city3155); 
//
//		$city3156= new City();
//		$city3156->setId(3156);
//		$city3156->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3156->setName('Тюхтет');
//		$manager->persist($city3156); 
//
//		$city3157= new City();
//		$city3157->setId(3157);
//		$city3157->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3157->setName('Ужур');
//		$manager->persist($city3157); 
//
//		$city3158= new City();
//		$city3158->setId(3158);
//		$city3158->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3158->setName('Уяр');
//		$manager->persist($city3158); 
//
//		$city3159= new City();
//		$city3159->setId(3159);
//		$city3159->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3159->setName('Хатанга');
//		$manager->persist($city3159); 
//
//		$city3160= new City();
//		$city3160->setId(3160);
//		$city3160->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3160->setName('Челюскин');
//		$manager->persist($city3160); 
//
//		$city3161= new City();
//		$city3161->setId(3161);
//		$city3161->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3161->setName('Черемушки');
//		$manager->persist($city3161); 
//
//		$city3162= new City();
//		$city3162->setId(3162);
//		$city3162->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3162->setName('Шалинское');
//		$manager->persist($city3162); 
//
//		$city3163= new City();
//		$city3163->setId(3163);
//		$city3163->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3163->setName('Шарыпово');
//		$manager->persist($city3163); 
//
//		$city3164= new City();
//		$city3164->setId(3164);
//		$city3164->setRegion($this->em->getReference('NitraGeoBundle:Region', 49)); 
//		$city3164->setName('Шушенское');
//		$manager->persist($city3164); 
//
//		$city3165= new City();
//		$city3165->setId(3165);
//		$city3165->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3165->setName('Варгаши');
//		$manager->persist($city3165); 
//
//		$city3166= new City();
//		$city3166->setId(3166);
//		$city3166->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3166->setName('Глядянское');
//		$manager->persist($city3166); 
//
//		$city3167= new City();
//		$city3167->setId(3167);
//		$city3167->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3167->setName('Далматово');
//		$manager->persist($city3167); 
//
//		$city3168= new City();
//		$city3168->setId(3168);
//		$city3168->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3168->setName('Звериноголовское');
//		$manager->persist($city3168); 
//
//		$city3169= new City();
//		$city3169->setId(3169);
//		$city3169->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3169->setName('Каргаполье');
//		$manager->persist($city3169); 
//
//		$city3170= new City();
//		$city3170->setId(3170);
//		$city3170->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3170->setName('Катайск');
//		$manager->persist($city3170); 
//
//		$city3171= new City();
//		$city3171->setId(3171);
//		$city3171->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3171->setName('Курган');
//		$manager->persist($city3171); 
//
//		$city3172= new City();
//		$city3172->setId(3172);
//		$city3172->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3172->setName('Куртамыш');
//		$manager->persist($city3172); 
//
//		$city3173= new City();
//		$city3173->setId(3173);
//		$city3173->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3173->setName('Макушино');
//		$manager->persist($city3173); 
//
//		$city3174= new City();
//		$city3174->setId(3174);
//		$city3174->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3174->setName('Мишкино');
//		$manager->persist($city3174); 
//
//		$city3175= new City();
//		$city3175->setId(3175);
//		$city3175->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3175->setName('Мокроусово');
//		$manager->persist($city3175); 
//
//		$city3176= new City();
//		$city3176->setId(3176);
//		$city3176->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3176->setName('Петухово');
//		$manager->persist($city3176); 
//
//		$city3177= new City();
//		$city3177->setId(3177);
//		$city3177->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3177->setName('Половинное');
//		$manager->persist($city3177); 
//
//		$city3178= new City();
//		$city3178->setId(3178);
//		$city3178->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3178->setName('Целинное');
//		$manager->persist($city3178); 
//
//		$city3179= new City();
//		$city3179->setId(3179);
//		$city3179->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3179->setName('Частоозерье');
//		$manager->persist($city3179); 
//
//		$city3180= new City();
//		$city3180->setId(3180);
//		$city3180->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3180->setName('Шадринск');
//		$manager->persist($city3180); 
//
//		$city3181= new City();
//		$city3181->setId(3181);
//		$city3181->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3181->setName('Шатрово');
//		$manager->persist($city3181); 
//
//		$city3182= new City();
//		$city3182->setId(3182);
//		$city3182->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3182->setName('Шумиха');
//		$manager->persist($city3182); 
//
//		$city3183= new City();
//		$city3183->setId(3183);
//		$city3183->setRegion($this->em->getReference('NitraGeoBundle:Region', 50)); 
//		$city3183->setName('Щучье');
//		$manager->persist($city3183); 
//
//		$city3184= new City();
//		$city3184->setId(3184);
//		$city3184->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3184->setName('Большое Солдатское');
//		$manager->persist($city3184); 
//
//		$city3185= new City();
//		$city3185->setId(3185);
//		$city3185->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3185->setName('Горшечное');
//		$manager->persist($city3185); 
//
//		$city3186= new City();
//		$city3186->setId(3186);
//		$city3186->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3186->setName('Дмитриев-Льговский');
//		$manager->persist($city3186); 
//
//		$city3187= new City();
//		$city3187->setId(3187);
//		$city3187->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3187->setName('Касторное');
//		$manager->persist($city3187); 
//
//		$city3188= new City();
//		$city3188->setId(3188);
//		$city3188->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3188->setName('Коренево');
//		$manager->persist($city3188); 
//
//		$city3189= new City();
//		$city3189->setId(3189);
//		$city3189->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3189->setName('Курск');
//		$manager->persist($city3189); 
//
//		$city3190= new City();
//		$city3190->setId(3190);
//		$city3190->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3190->setName('Курск (Восточный)');
//		$manager->persist($city3190); 
//
//		$city3191= new City();
//		$city3191->setId(3191);
//		$city3191->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3191->setName('Курчатов');
//		$manager->persist($city3191); 
//
//		$city3192= new City();
//		$city3192->setId(3192);
//		$city3192->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3192->setName('Льгов');
//		$manager->persist($city3192); 
//
//		$city3193= new City();
//		$city3193->setId(3193);
//		$city3193->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3193->setName('Медвенка');
//		$manager->persist($city3193); 
//
//		$city3194= new City();
//		$city3194->setId(3194);
//		$city3194->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3194->setName('Обоянь');
//		$manager->persist($city3194); 
//
//		$city3195= new City();
//		$city3195->setId(3195);
//		$city3195->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3195->setName('Поныри');
//		$manager->persist($city3195); 
//
//		$city3196= new City();
//		$city3196->setId(3196);
//		$city3196->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3196->setName('Рыльск');
//		$manager->persist($city3196); 
//
//		$city3197= new City();
//		$city3197->setId(3197);
//		$city3197->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3197->setName('Тим');
//		$manager->persist($city3197); 
//
//		$city3198= new City();
//		$city3198->setId(3198);
//		$city3198->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3198->setName('Фатеж');
//		$manager->persist($city3198); 
//
//		$city3199= new City();
//		$city3199->setId(3199);
//		$city3199->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3199->setName('Хомутовка');
//		$manager->persist($city3199); 
//
//		$city3200= new City();
//		$city3200->setId(3200);
//		$city3200->setRegion($this->em->getReference('NitraGeoBundle:Region', 51)); 
//		$city3200->setName('Щигры');
//		$manager->persist($city3200); 
//
//		$city3201= new City();
//		$city3201->setId(3201);
//		$city3201->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3201->setName('Бокситогорск');
//		$manager->persist($city3201); 
//
//		$city3202= new City();
//		$city3202->setId(3202);
//		$city3202->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3202->setName('Волосово');
//		$manager->persist($city3202); 
//
//		$city3203= new City();
//		$city3203->setId(3203);
//		$city3203->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3203->setName('Волхов');
//		$manager->persist($city3203); 
//
//		$city3204= new City();
//		$city3204->setId(3204);
//		$city3204->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3204->setName('Всеволожск');
//		$manager->persist($city3204); 
//
//		$city3205= new City();
//		$city3205->setId(3205);
//		$city3205->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3205->setName('Выборг');
//		$manager->persist($city3205); 
//
//		$city3206= new City();
//		$city3206->setId(3206);
//		$city3206->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3206->setName('Вырица');
//		$manager->persist($city3206); 
//
//		$city3207= new City();
//		$city3207->setId(3207);
//		$city3207->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3207->setName('Гатчина');
//		$manager->persist($city3207); 
//
//		$city3208= new City();
//		$city3208->setId(3208);
//		$city3208->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3208->setName('Горелово');
//		$manager->persist($city3208); 
//
//		$city3209= new City();
//		$city3209->setId(3209);
//		$city3209->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3209->setName('Ивангород');
//		$manager->persist($city3209); 
//
//		$city3210= new City();
//		$city3210->setId(3210);
//		$city3210->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3210->setName('Игора');
//		$manager->persist($city3210); 
//
//		$city3211= new City();
//		$city3211->setId(3211);
//		$city3211->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3211->setName('Кингисепп');
//		$manager->persist($city3211); 
//
//		$city3212= new City();
//		$city3212->setId(3212);
//		$city3212->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3212->setName('Кириши');
//		$manager->persist($city3212); 
//
//		$city3213= new City();
//		$city3213->setId(3213);
//		$city3213->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3213->setName('Колпино');
//		$manager->persist($city3213); 
//
//		$city3214= new City();
//		$city3214->setId(3214);
//		$city3214->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3214->setName('Кронштадт');
//		$manager->persist($city3214); 
//
//		$city3215= new City();
//		$city3215->setId(3215);
//		$city3215->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3215->setName('Лодейное Поле');
//		$manager->persist($city3215); 
//
//		$city3216= new City();
//		$city3216->setId(3216);
//		$city3216->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3216->setName('Ломоносов');
//		$manager->persist($city3216); 
//
//		$city3217= new City();
//		$city3217->setId(3217);
//		$city3217->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3217->setName('Луга');
//		$manager->persist($city3217); 
//
//		$city3218= new City();
//		$city3218->setId(3218);
//		$city3218->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3218->setName('Любань');
//		$manager->persist($city3218); 
//
//		$city3219= new City();
//		$city3219->setId(3219);
//		$city3219->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3219->setName('Пикалево');
//		$manager->persist($city3219); 
//
//		$city3220= new City();
//		$city3220->setId(3220);
//		$city3220->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3220->setName('Подпорожье');
//		$manager->persist($city3220); 
//
//		$city3221= new City();
//		$city3221->setId(3221);
//		$city3221->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3221->setName('Посёлок имени Морозова');
//		$manager->persist($city3221); 
//
//		$city3222= new City();
//		$city3222->setId(3222);
//		$city3222->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3222->setName('Приозерск');
//		$manager->persist($city3222); 
//
//		$city3223= new City();
//		$city3223->setId(3223);
//		$city3223->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3223->setName('Санкт-Петербург');
//		$manager->persist($city3223); 
//
//		$city3224= new City();
//		$city3224->setId(3224);
//		$city3224->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3224->setName('Санкт-Петербург (Пулково)');
//		$manager->persist($city3224); 
//
//		$city3225= new City();
//		$city3225->setId(3225);
//		$city3225->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3225->setName('Светогорск');
//		$manager->persist($city3225); 
//
//		$city3226= new City();
//		$city3226->setId(3226);
//		$city3226->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3226->setName('Сертолово');
//		$manager->persist($city3226); 
//
//		$city3227= new City();
//		$city3227->setId(3227);
//		$city3227->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3227->setName('Сиверский');
//		$manager->persist($city3227); 
//
//		$city3228= new City();
//		$city3228->setId(3228);
//		$city3228->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3228->setName('Сланцы');
//		$manager->persist($city3228); 
//
//		$city3229= new City();
//		$city3229->setId(3229);
//		$city3229->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3229->setName('Сосновый Бор');
//		$manager->persist($city3229); 
//
//		$city3230= new City();
//		$city3230->setId(3230);
//		$city3230->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3230->setName('Сясьстрой');
//		$manager->persist($city3230); 
//
//		$city3231= new City();
//		$city3231->setId(3231);
//		$city3231->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3231->setName('Тихвин');
//		$manager->persist($city3231); 
//
//		$city3232= new City();
//		$city3232->setId(3232);
//		$city3232->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3232->setName('Токсово');
//		$manager->persist($city3232); 
//
//		$city3233= new City();
//		$city3233->setId(3233);
//		$city3233->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3233->setName('Тосно');
//		$manager->persist($city3233); 
//
//		$city3234= new City();
//		$city3234->setId(3234);
//		$city3234->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3234->setName('Чудово');
//		$manager->persist($city3234); 
//
//		$city3235= new City();
//		$city3235->setId(3235);
//		$city3235->setRegion($this->em->getReference('NitraGeoBundle:Region', 52)); 
//		$city3235->setName('Шлиссельбург');
//		$manager->persist($city3235); 
//
//		$city3236= new City();
//		$city3236->setId(3236);
//		$city3236->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3236->setName('Волово');
//		$manager->persist($city3236); 
//
//		$city3237= new City();
//		$city3237->setId(3237);
//		$city3237->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3237->setName('Грязи');
//		$manager->persist($city3237); 
//
//		$city3238= new City();
//		$city3238->setId(3238);
//		$city3238->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3238->setName('Данков');
//		$manager->persist($city3238); 
//
//		$city3239= new City();
//		$city3239->setId(3239);
//		$city3239->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3239->setName('Елец');
//		$manager->persist($city3239); 
//
//		$city3240= new City();
//		$city3240->setId(3240);
//		$city3240->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3240->setName('Задонск');
//		$manager->persist($city3240); 
//
//		$city3241= new City();
//		$city3241->setId(3241);
//		$city3241->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3241->setName('Измалково');
//		$manager->persist($city3241); 
//
//		$city3242= new City();
//		$city3242->setId(3242);
//		$city3242->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3242->setName('Лебедянь');
//		$manager->persist($city3242); 
//
//		$city3243= new City();
//		$city3243->setId(3243);
//		$city3243->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3243->setName('Лев Толстой');
//		$manager->persist($city3243); 
//
//		$city3244= new City();
//		$city3244->setId(3244);
//		$city3244->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3244->setName('Липецк');
//		$manager->persist($city3244); 
//
//		$city3245= new City();
//		$city3245->setId(3245);
//		$city3245->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3245->setName('Тербуны');
//		$manager->persist($city3245); 
//
//		$city3246= new City();
//		$city3246->setId(3246);
//		$city3246->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3246->setName('Усмань');
//		$manager->persist($city3246); 
//
//		$city3247= new City();
//		$city3247->setId(3247);
//		$city3247->setRegion($this->em->getReference('NitraGeoBundle:Region', 53)); 
//		$city3247->setName('Чаплыгин');
//		$manager->persist($city3247); 
//
//		$city3248= new City();
//		$city3248->setId(3248);
//		$city3248->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3248->setName('Беринговский');
//		$manager->persist($city3248); 
//
//		$city3249= new City();
//		$city3249->setId(3249);
//		$city3249->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3249->setName('Кулу');
//		$manager->persist($city3249); 
//
//		$city3250= new City();
//		$city3250->setId(3250);
//		$city3250->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3250->setName('Магадан');
//		$manager->persist($city3250); 
//
//		$city3251= new City();
//		$city3251->setId(3251);
//		$city3251->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3251->setName('Магадан (Сокол)');
//		$manager->persist($city3251); 
//
//		$city3252= new City();
//		$city3252->setId(3252);
//		$city3252->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3252->setName('Меренга');
//		$manager->persist($city3252); 
//
//		$city3253= new City();
//		$city3253->setId(3253);
//		$city3253->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3253->setName('Мыс Шмидта');
//		$manager->persist($city3253); 
//
//		$city3254= new City();
//		$city3254->setId(3254);
//		$city3254->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3254->setName('Ола');
//		$manager->persist($city3254); 
//
//		$city3255= new City();
//		$city3255->setId(3255);
//		$city3255->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3255->setName('Омсукчан');
//		$manager->persist($city3255); 
//
//		$city3256= new City();
//		$city3256->setId(3256);
//		$city3256->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3256->setName('Палатка');
//		$manager->persist($city3256); 
//
//		$city3257= new City();
//		$city3257->setId(3257);
//		$city3257->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3257->setName('Северо-Эвенск');
//		$manager->persist($city3257); 
//
//		$city3258= new City();
//		$city3258->setId(3258);
//		$city3258->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3258->setName('Сеймчан');
//		$manager->persist($city3258); 
//
//		$city3259= new City();
//		$city3259->setId(3259);
//		$city3259->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3259->setName('Сусуман');
//		$manager->persist($city3259); 
//
//		$city3260= new City();
//		$city3260->setId(3260);
//		$city3260->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3260->setName('Усть-Омчуг');
//		$manager->persist($city3260); 
//
//		$city3261= new City();
//		$city3261->setId(3261);
//		$city3261->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3261->setName('Эвенск');
//		$manager->persist($city3261); 
//
//		$city3262= new City();
//		$city3262->setId(3262);
//		$city3262->setRegion($this->em->getReference('NitraGeoBundle:Region', 54)); 
//		$city3262->setName('Ягодное');
//		$manager->persist($city3262); 
//
//		$city3263= new City();
//		$city3263->setId(3263);
//		$city3263->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3263->setName('Апрелевка');
//		$manager->persist($city3263); 
//
//		$city3264= new City();
//		$city3264->setId(3264);
//		$city3264->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3264->setName('Архангельское (Усадьба Джаз)');
//		$manager->persist($city3264); 
//
//		$city3265= new City();
//		$city3265->setId(3265);
//		$city3265->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3265->setName('Балашиха');
//		$manager->persist($city3265); 
//
//		$city3266= new City();
//		$city3266->setId(3266);
//		$city3266->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3266->setName('Белоозёрский');
//		$manager->persist($city3266); 
//
//		$city3267= new City();
//		$city3267->setId(3267);
//		$city3267->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3267->setName('Бронницы');
//		$manager->persist($city3267); 
//
//		$city3268= new City();
//		$city3268->setId(3268);
//		$city3268->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3268->setName('Видное');
//		$manager->persist($city3268); 
//
//		$city3269= new City();
//		$city3269->setId(3269);
//		$city3269->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3269->setName('Внуково');
//		$manager->persist($city3269); 
//
//		$city3270= new City();
//		$city3270->setId(3270);
//		$city3270->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3270->setName('Волоколамск');
//		$manager->persist($city3270); 
//
//		$city3271= new City();
//		$city3271->setId(3271);
//		$city3271->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3271->setName('Высоковск');
//		$manager->persist($city3271); 
//
//		$city3272= new City();
//		$city3272->setId(3272);
//		$city3272->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3272->setName('Голицыно');
//		$manager->persist($city3272); 
//
//		$city3273= new City();
//		$city3273->setId(3273);
//		$city3273->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3273->setName('Давыдово');
//		$manager->persist($city3273); 
//
//		$city3274= new City();
//		$city3274->setId(3274);
//		$city3274->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3274->setName('Дедовск');
//		$manager->persist($city3274); 
//
//		$city3275= new City();
//		$city3275->setId(3275);
//		$city3275->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3275->setName('Дмитров');
//		$manager->persist($city3275); 
//
//		$city3276= new City();
//		$city3276->setId(3276);
//		$city3276->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3276->setName('Долгопрудный');
//		$manager->persist($city3276); 
//
//		$city3277= new City();
//		$city3277->setId(3277);
//		$city3277->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3277->setName('Домодедово');
//		$manager->persist($city3277); 
//
//		$city3278= new City();
//		$city3278->setId(3278);
//		$city3278->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3278->setName('Дрезна');
//		$manager->persist($city3278); 
//
//		$city3279= new City();
//		$city3279->setId(3279);
//		$city3279->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3279->setName('Дубна');
//		$manager->persist($city3279); 
//
//		$city3280= new City();
//		$city3280->setId(3280);
//		$city3280->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3280->setName('Егорьевск');
//		$manager->persist($city3280); 
//
//		$city3281= new City();
//		$city3281->setId(3281);
//		$city3281->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3281->setName('Железнодорожный');
//		$manager->persist($city3281); 
//
//		$city3282= new City();
//		$city3282->setId(3282);
//		$city3282->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3282->setName('Жуковский');
//		$manager->persist($city3282); 
//
//		$city3283= new City();
//		$city3283->setId(3283);
//		$city3283->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3283->setName('Запрудня');
//		$manager->persist($city3283); 
//
//		$city3284= new City();
//		$city3284->setId(3284);
//		$city3284->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3284->setName('Зарайск');
//		$manager->persist($city3284); 
//
//		$city3285= new City();
//		$city3285->setId(3285);
//		$city3285->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3285->setName('Звенигород');
//		$manager->persist($city3285); 
//
//		$city3286= new City();
//		$city3286->setId(3286);
//		$city3286->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3286->setName('Зеленоград');
//		$manager->persist($city3286); 
//
//		$city3287= new City();
//		$city3287->setId(3287);
//		$city3287->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3287->setName('Ивантеевка');
//		$manager->persist($city3287); 
//
//		$city3288= new City();
//		$city3288->setId(3288);
//		$city3288->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3288->setName('Истра');
//		$manager->persist($city3288); 
//
//		$city3289= new City();
//		$city3289->setId(3289);
//		$city3289->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3289->setName('Калининец');
//		$manager->persist($city3289); 
//
//		$city3290= new City();
//		$city3290->setId(3290);
//		$city3290->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3290->setName('Кашира');
//		$manager->persist($city3290); 
//
//		$city3291= new City();
//		$city3291->setId(3291);
//		$city3291->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3291->setName('Климовск');
//		$manager->persist($city3291); 
//
//		$city3292= new City();
//		$city3292->setId(3292);
//		$city3292->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3292->setName('Клин');
//		$manager->persist($city3292); 
//
//		$city3293= new City();
//		$city3293->setId(3293);
//		$city3293->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3293->setName('Коломна');
//		$manager->persist($city3293); 
//
//		$city3294= new City();
//		$city3294->setId(3294);
//		$city3294->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3294->setName('Королев');
//		$manager->persist($city3294); 
//
//		$city3295= new City();
//		$city3295->setId(3295);
//		$city3295->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3295->setName('Котельники');
//		$manager->persist($city3295); 
//
//		$city3296= new City();
//		$city3296->setId(3296);
//		$city3296->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3296->setName('Красково');
//		$manager->persist($city3296); 
//
//		$city3297= new City();
//		$city3297->setId(3297);
//		$city3297->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3297->setName('Красногорск');
//		$manager->persist($city3297); 
//
//		$city3298= new City();
//		$city3298->setId(3298);
//		$city3298->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3298->setName('Краснозаводск');
//		$manager->persist($city3298); 
//
//		$city3299= new City();
//		$city3299->setId(3299);
//		$city3299->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3299->setName('Краснознаменск');
//		$manager->persist($city3299); 
//
//		$city3300= new City();
//		$city3300->setId(3300);
//		$city3300->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3300->setName('Кубинка');
//		$manager->persist($city3300); 
//
//		$city3301= new City();
//		$city3301->setId(3301);
//		$city3301->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3301->setName('Куровское');
//		$manager->persist($city3301); 
//
//		$city3302= new City();
//		$city3302->setId(3302);
//		$city3302->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3302->setName('Ликино-Дулёво');
//		$manager->persist($city3302); 
//
//		$city3303= new City();
//		$city3303->setId(3303);
//		$city3303->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3303->setName('Лобня');
//		$manager->persist($city3303); 
//
//		$city3304= new City();
//		$city3304->setId(3304);
//		$city3304->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3304->setName('Лопатинский');
//		$manager->persist($city3304); 
//
//		$city3305= new City();
//		$city3305->setId(3305);
//		$city3305->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3305->setName('Лосино-Петровский');
//		$manager->persist($city3305); 
//
//		$city3306= new City();
//		$city3306->setId(3306);
//		$city3306->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3306->setName('Лотошино');
//		$manager->persist($city3306); 
//
//		$city3307= new City();
//		$city3307->setId(3307);
//		$city3307->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3307->setName('Луховицы');
//		$manager->persist($city3307); 
//
//		$city3308= new City();
//		$city3308->setId(3308);
//		$city3308->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3308->setName('Лыткарино');
//		$manager->persist($city3308); 
//
//		$city3309= new City();
//		$city3309->setId(3309);
//		$city3309->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3309->setName('Львовский');
//		$manager->persist($city3309); 
//
//		$city3310= new City();
//		$city3310->setId(3310);
//		$city3310->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3310->setName('Люберцы');
//		$manager->persist($city3310); 
//
//		$city3311= new City();
//		$city3311->setId(3311);
//		$city3311->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3311->setName('Малаховка');
//		$manager->persist($city3311); 
//
//		$city3312= new City();
//		$city3312->setId(3312);
//		$city3312->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3312->setName('Можайск');
//		$manager->persist($city3312); 
//
//		$city3313= new City();
//		$city3313->setId(3313);
//		$city3313->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3313->setName('Монино');
//		$manager->persist($city3313); 
//
//		$city3314= new City();
//		$city3314->setId(3314);
//		$city3314->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3314->setName('Москва');
//		$manager->persist($city3314); 
//
//		$city3315= new City();
//		$city3315->setId(3315);
//		$city3315->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3315->setName('Москва (Балчуг)');
//		$manager->persist($city3315); 
//
//		$city3316= new City();
//		$city3316->setId(3316);
//		$city3316->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3316->setName('Москва (Быково)');
//		$manager->persist($city3316); 
//
//		$city3317= new City();
//		$city3317->setId(3317);
//		$city3317->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3317->setName('Москва (Внуково)');
//		$manager->persist($city3317); 
//
//		$city3318= new City();
//		$city3318->setId(3318);
//		$city3318->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3318->setName('Москва (Домодедово)');
//		$manager->persist($city3318); 
//
//		$city3319= new City();
//		$city3319->setId(3319);
//		$city3319->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3319->setName('Москва (Остафьево)');
//		$manager->persist($city3319); 
//
//		$city3320= new City();
//		$city3320->setId(3320);
//		$city3320->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3320->setName('Москва (Тушино)');
//		$manager->persist($city3320); 
//
//		$city3321= new City();
//		$city3321->setId(3321);
//		$city3321->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3321->setName('Москва Царицыно');
//		$manager->persist($city3321); 
//
//		$city3322= new City();
//		$city3322->setId(3322);
//		$city3322->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3322->setName('Москва (Шереметьево)');
//		$manager->persist($city3322); 
//
//		$city3323= new City();
//		$city3323->setId(3323);
//		$city3323->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3323->setName('Мосрентген');
//		$manager->persist($city3323); 
//
//		$city3324= new City();
//		$city3324->setId(3324);
//		$city3324->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3324->setName('Мытищи');
//		$manager->persist($city3324); 
//
//		$city3325= new City();
//		$city3325->setId(3325);
//		$city3325->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3325->setName('Наро-Фоминск');
//		$manager->persist($city3325); 
//
//		$city3326= new City();
//		$city3326->setId(3326);
//		$city3326->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3326->setName('Нахабино');
//		$manager->persist($city3326); 
//
//		$city3327= new City();
//		$city3327->setId(3327);
//		$city3327->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3327->setName('Никольско-Архангельский');
//		$manager->persist($city3327); 
//
//		$city3328= new City();
//		$city3328->setId(3328);
//		$city3328->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3328->setName('Ногинск');
//		$manager->persist($city3328); 
//
//		$city3329= new City();
//		$city3329->setId(3329);
//		$city3329->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3329->setName('Обухово');
//		$manager->persist($city3329); 
//
//		$city3330= new City();
//		$city3330->setId(3330);
//		$city3330->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3330->setName('Одинцово');
//		$manager->persist($city3330); 
//
//		$city3331= new City();
//		$city3331->setId(3331);
//		$city3331->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3331->setName('Ожерелье');
//		$manager->persist($city3331); 
//
//		$city3332= new City();
//		$city3332->setId(3332);
//		$city3332->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3332->setName('Озёры');
//		$manager->persist($city3332); 
//
//		$city3333= new City();
//		$city3333->setId(3333);
//		$city3333->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3333->setName('Октябрьский');
//		$manager->persist($city3333); 
//
//		$city3334= new City();
//		$city3334->setId(3334);
//		$city3334->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3334->setName('Орехово-Зуево');
//		$manager->persist($city3334); 
//
//		$city3335= new City();
//		$city3335->setId(3335);
//		$city3335->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3335->setName('Павловский Посад');
//		$manager->persist($city3335); 
//
//		$city3336= new City();
//		$city3336->setId(3336);
//		$city3336->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3336->setName('Пересвет');
//		$manager->persist($city3336); 
//
//		$city3337= new City();
//		$city3337->setId(3337);
//		$city3337->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3337->setName('Подольск');
//		$manager->persist($city3337); 
//
//		$city3338= new City();
//		$city3338->setId(3338);
//		$city3338->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3338->setName('Правдинский');
//		$manager->persist($city3338); 
//
//		$city3339= new City();
//		$city3339->setId(3339);
//		$city3339->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3339->setName('Протвино');
//		$manager->persist($city3339); 
//
//		$city3340= new City();
//		$city3340->setId(3340);
//		$city3340->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3340->setName('Пушкино');
//		$manager->persist($city3340); 
//
//		$city3341= new City();
//		$city3341->setId(3341);
//		$city3341->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3341->setName('Пущино');
//		$manager->persist($city3341); 
//
//		$city3342= new City();
//		$city3342->setId(3342);
//		$city3342->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3342->setName('Раменское');
//		$manager->persist($city3342); 
//
//		$city3343= new City();
//		$city3343->setId(3343);
//		$city3343->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3343->setName('Реутов');
//		$manager->persist($city3343); 
//
//		$city3344= new City();
//		$city3344->setId(3344);
//		$city3344->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3344->setName('РИФ+КИБ');
//		$manager->persist($city3344); 
//
//		$city3345= new City();
//		$city3345->setId(3345);
//		$city3345->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3345->setName('Рошаль');
//		$manager->persist($city3345); 
//
//		$city3346= new City();
//		$city3346->setId(3346);
//		$city3346->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3346->setName('Руза');
//		$manager->persist($city3346); 
//
//		$city3347= new City();
//		$city3347->setId(3347);
//		$city3347->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3347->setName('Савостино');
//		$manager->persist($city3347); 
//
//		$city3348= new City();
//		$city3348->setId(3348);
//		$city3348->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3348->setName('Сергиев Посад');
//		$manager->persist($city3348); 
//
//		$city3349= new City();
//		$city3349->setId(3349);
//		$city3349->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3349->setName('Серебряные Пруды');
//		$manager->persist($city3349); 
//
//		$city3350= new City();
//		$city3350->setId(3350);
//		$city3350->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3350->setName('Серпухов');
//		$manager->persist($city3350); 
//
//		$city3351= new City();
//		$city3351->setId(3351);
//		$city3351->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3351->setName('Солнечногорск');
//		$manager->persist($city3351); 
//
//		$city3352= new City();
//		$city3352->setId(3352);
//		$city3352->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3352->setName('Софрино');
//		$manager->persist($city3352); 
//
//		$city3353= new City();
//		$city3353->setId(3353);
//		$city3353->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3353->setName('Старая Купавна');
//		$manager->persist($city3353); 
//
//		$city3354= new City();
//		$city3354->setId(3354);
//		$city3354->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3354->setName('Ступино');
//		$manager->persist($city3354); 
//
//		$city3355= new City();
//		$city3355->setId(3355);
//		$city3355->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3355->setName('Сходня');
//		$manager->persist($city3355); 
//
//		$city3356= new City();
//		$city3356->setId(3356);
//		$city3356->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3356->setName('Талдом');
//		$manager->persist($city3356); 
//
//		$city3357= new City();
//		$city3357->setId(3357);
//		$city3357->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3357->setName('Томилино');
//		$manager->persist($city3357); 
//
//		$city3358= new City();
//		$city3358->setId(3358);
//		$city3358->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3358->setName('Троицк');
//		$manager->persist($city3358); 
//
//		$city3359= new City();
//		$city3359->setId(3359);
//		$city3359->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3359->setName('Тучково');
//		$manager->persist($city3359); 
//
//		$city3360= new City();
//		$city3360->setId(3360);
//		$city3360->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3360->setName('Уваровка');
//		$manager->persist($city3360); 
//
//		$city3361= new City();
//		$city3361->setId(3361);
//		$city3361->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3361->setName('Удельная');
//		$manager->persist($city3361); 
//
//		$city3362= new City();
//		$city3362->setId(3362);
//		$city3362->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3362->setName('Фрязино');
//		$manager->persist($city3362); 
//
//		$city3363= new City();
//		$city3363->setId(3363);
//		$city3363->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3363->setName('Фряново');
//		$manager->persist($city3363); 
//
//		$city3364= new City();
//		$city3364->setId(3364);
//		$city3364->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3364->setName('Химки');
//		$manager->persist($city3364); 
//
//		$city3365= new City();
//		$city3365->setId(3365);
//		$city3365->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3365->setName('Хотьково');
//		$manager->persist($city3365); 
//
//		$city3366= new City();
//		$city3366->setId(3366);
//		$city3366->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3366->setName('Черноголовка');
//		$manager->persist($city3366); 
//
//		$city3367= new City();
//		$city3367->setId(3367);
//		$city3367->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3367->setName('Черусти');
//		$manager->persist($city3367); 
//
//		$city3368= new City();
//		$city3368->setId(3368);
//		$city3368->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3368->setName('Чехов');
//		$manager->persist($city3368); 
//
//		$city3369= new City();
//		$city3369->setId(3369);
//		$city3369->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3369->setName('Шатура');
//		$manager->persist($city3369); 
//
//		$city3370= new City();
//		$city3370->setId(3370);
//		$city3370->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3370->setName('Шаховская');
//		$manager->persist($city3370); 
//
//		$city3371= new City();
//		$city3371->setId(3371);
//		$city3371->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3371->setName('Шереметьево');
//		$manager->persist($city3371); 
//
//		$city3372= new City();
//		$city3372->setId(3372);
//		$city3372->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3372->setName('Щербинка');
//		$manager->persist($city3372); 
//
//		$city3373= new City();
//		$city3373->setId(3373);
//		$city3373->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3373->setName('Щёлково');
//		$manager->persist($city3373); 
//
//		$city3374= new City();
//		$city3374->setId(3374);
//		$city3374->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3374->setName('Электрогорск');
//		$manager->persist($city3374); 
//
//		$city3375= new City();
//		$city3375->setId(3375);
//		$city3375->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3375->setName('Электросталь');
//		$manager->persist($city3375); 
//
//		$city3376= new City();
//		$city3376->setId(3376);
//		$city3376->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3376->setName('Электроугли');
//		$manager->persist($city3376); 
//
//		$city3377= new City();
//		$city3377->setId(3377);
//		$city3377->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3377->setName('Юбилейный');
//		$manager->persist($city3377); 
//
//		$city3378= new City();
//		$city3378->setId(3378);
//		$city3378->setRegion($this->em->getReference('NitraGeoBundle:Region', 55)); 
//		$city3378->setName('Яхрома');
//		$manager->persist($city3378); 
//
//		$city3379= new City();
//		$city3379->setId(3379);
//		$city3379->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3379->setName('Апатиты');
//		$manager->persist($city3379); 
//
//		$city3380= new City();
//		$city3380->setId(3380);
//		$city3380->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3380->setName('Гаджиево');
//		$manager->persist($city3380); 
//
//		$city3381= new City();
//		$city3381->setId(3381);
//		$city3381->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3381->setName('Заозерск');
//		$manager->persist($city3381); 
//
//		$city3382= new City();
//		$city3382->setId(3382);
//		$city3382->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3382->setName('Заполярный');
//		$manager->persist($city3382); 
//
//		$city3383= new City();
//		$city3383->setId(3383);
//		$city3383->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3383->setName('Кандалакша');
//		$manager->persist($city3383); 
//
//		$city3384= new City();
//		$city3384->setId(3384);
//		$city3384->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3384->setName('Ковдор');
//		$manager->persist($city3384); 
//
//		$city3385= new City();
//		$city3385->setId(3385);
//		$city3385->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3385->setName('Кола');
//		$manager->persist($city3385); 
//
//		$city3386= new City();
//		$city3386->setId(3386);
//		$city3386->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3386->setName('Ловозеро');
//		$manager->persist($city3386); 
//
//		$city3387= new City();
//		$city3387->setId(3387);
//		$city3387->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3387->setName('Мончегорск');
//		$manager->persist($city3387); 
//
//		$city3388= new City();
//		$city3388->setId(3388);
//		$city3388->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3388->setName('Мурманск');
//		$manager->persist($city3388); 
//
//		$city3389= new City();
//		$city3389->setId(3389);
//		$city3389->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3389->setName('Мурмаши');
//		$manager->persist($city3389); 
//
//		$city3390= new City();
//		$city3390->setId(3390);
//		$city3390->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3390->setName('Никель');
//		$manager->persist($city3390); 
//
//		$city3391= new City();
//		$city3391->setId(3391);
//		$city3391->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3391->setName('Оленегорск');
//		$manager->persist($city3391); 
//
//		$city3392= new City();
//		$city3392->setId(3392);
//		$city3392->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3392->setName('Печенга');
//		$manager->persist($city3392); 
//
//		$city3393= new City();
//		$city3393->setId(3393);
//		$city3393->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3393->setName('Полярные Зори');
//		$manager->persist($city3393); 
//
//		$city3394= new City();
//		$city3394->setId(3394);
//		$city3394->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3394->setName('Полярный');
//		$manager->persist($city3394); 
//
//		$city3395= new City();
//		$city3395->setId(3395);
//		$city3395->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3395->setName('Североморск');
//		$manager->persist($city3395); 
//
//		$city3396= new City();
//		$city3396->setId(3396);
//		$city3396->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3396->setName('Териберка');
//		$manager->persist($city3396); 
//
//		$city3397= new City();
//		$city3397->setId(3397);
//		$city3397->setRegion($this->em->getReference('NitraGeoBundle:Region', 56)); 
//		$city3397->setName('Умба');
//		$manager->persist($city3397); 
//
//		$city3398= new City();
//		$city3398->setId(3398);
//		$city3398->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3398->setName('Ардатов');
//		$manager->persist($city3398); 
//
//		$city3399= new City();
//		$city3399->setId(3399);
//		$city3399->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3399->setName('Арзамас');
//		$manager->persist($city3399); 
//
//		$city3400= new City();
//		$city3400->setId(3400);
//		$city3400->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3400->setName('Балахна');
//		$manager->persist($city3400); 
//
//		$city3401= new City();
//		$city3401->setId(3401);
//		$city3401->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3401->setName('Богородск');
//		$manager->persist($city3401); 
//
//		$city3402= new City();
//		$city3402->setId(3402);
//		$city3402->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3402->setName('Болдино');
//		$manager->persist($city3402); 
//
//		$city3403= new City();
//		$city3403->setId(3403);
//		$city3403->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3403->setName('Большое Мурашкино');
//		$manager->persist($city3403); 
//
//		$city3404= new City();
//		$city3404->setId(3404);
//		$city3404->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3404->setName('Бор');
//		$manager->persist($city3404); 
//
//		$city3405= new City();
//		$city3405->setId(3405);
//		$city3405->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3405->setName('Бутурлино');
//		$manager->persist($city3405); 
//
//		$city3406= new City();
//		$city3406->setId(3406);
//		$city3406->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3406->setName('Варнавино');
//		$manager->persist($city3406); 
//
//		$city3407= new City();
//		$city3407->setId(3407);
//		$city3407->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3407->setName('Ветлуга');
//		$manager->persist($city3407); 
//
//		$city3408= new City();
//		$city3408->setId(3408);
//		$city3408->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3408->setName('Ворсма');
//		$manager->persist($city3408); 
//
//		$city3409= new City();
//		$city3409->setId(3409);
//		$city3409->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3409->setName('Воскресенское');
//		$manager->persist($city3409); 
//
//		$city3410= new City();
//		$city3410->setId(3410);
//		$city3410->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3410->setName('Выкса');
//		$manager->persist($city3410); 
//
//		$city3411= new City();
//		$city3411->setId(3411);
//		$city3411->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3411->setName('Городец');
//		$manager->persist($city3411); 
//
//		$city3412= new City();
//		$city3412->setId(3412);
//		$city3412->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3412->setName('Дальнее Константиново');
//		$manager->persist($city3412); 
//
//		$city3413= new City();
//		$city3413->setId(3413);
//		$city3413->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3413->setName('Заволжье');
//		$manager->persist($city3413); 
//
//		$city3414= new City();
//		$city3414->setId(3414);
//		$city3414->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3414->setName('Красные Баки');
//		$manager->persist($city3414); 
//
//		$city3415= new City();
//		$city3415->setId(3415);
//		$city3415->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3415->setName('Кстово');
//		$manager->persist($city3415); 
//
//		$city3416= new City();
//		$city3416->setId(3416);
//		$city3416->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3416->setName('Кулебаки');
//		$manager->persist($city3416); 
//
//		$city3417= new City();
//		$city3417->setId(3417);
//		$city3417->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3417->setName('Лукоянов');
//		$manager->persist($city3417); 
//
//		$city3418= new City();
//		$city3418->setId(3418);
//		$city3418->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3418->setName('Лысково');
//		$manager->persist($city3418); 
//
//		$city3419= new City();
//		$city3419->setId(3419);
//		$city3419->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3419->setName('Мулино');
//		$manager->persist($city3419); 
//
//		$city3420= new City();
//		$city3420->setId(3420);
//		$city3420->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3420->setName('Навашино');
//		$manager->persist($city3420); 
//
//		$city3421= new City();
//		$city3421->setId(3421);
//		$city3421->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3421->setName('Нижний Новгород');
//		$manager->persist($city3421); 
//
//		$city3422= new City();
//		$city3422->setId(3422);
//		$city3422->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3422->setName('Нижний Новгород (Стригино)');
//		$manager->persist($city3422); 
//
//		$city3423= new City();
//		$city3423->setId(3423);
//		$city3423->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3423->setName('Павлово');
//		$manager->persist($city3423); 
//
//		$city3424= new City();
//		$city3424->setId(3424);
//		$city3424->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3424->setName('Перевоз');
//		$manager->persist($city3424); 
//
//		$city3425= new City();
//		$city3425->setId(3425);
//		$city3425->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3425->setName('Починки');
//		$manager->persist($city3425); 
//
//		$city3426= new City();
//		$city3426->setId(3426);
//		$city3426->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3426->setName('Саров');
//		$manager->persist($city3426); 
//
//		$city3427= new City();
//		$city3427->setId(3427);
//		$city3427->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3427->setName('Семенов');
//		$manager->persist($city3427); 
//
//		$city3428= new City();
//		$city3428->setId(3428);
//		$city3428->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3428->setName('Сергач');
//		$manager->persist($city3428); 
//
//		$city3429= new City();
//		$city3429->setId(3429);
//		$city3429->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3429->setName('Сеченово');
//		$manager->persist($city3429); 
//
//		$city3430= new City();
//		$city3430->setId(3430);
//		$city3430->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3430->setName('Сокольское');
//		$manager->persist($city3430); 
//
//		$city3431= new City();
//		$city3431->setId(3431);
//		$city3431->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3431->setName('Сосновское');
//		$manager->persist($city3431); 
//
//		$city3432= new City();
//		$city3432->setId(3432);
//		$city3432->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3432->setName('Тоншаево');
//		$manager->persist($city3432); 
//
//		$city3433= new City();
//		$city3433->setId(3433);
//		$city3433->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3433->setName('Урень');
//		$manager->persist($city3433); 
//
//		$city3434= new City();
//		$city3434->setId(3434);
//		$city3434->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3434->setName('Чкаловск');
//		$manager->persist($city3434); 
//
//		$city3435= new City();
//		$city3435->setId(3435);
//		$city3435->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3435->setName('Шатки');
//		$manager->persist($city3435); 
//
//		$city3436= new City();
//		$city3436->setId(3436);
//		$city3436->setRegion($this->em->getReference('NitraGeoBundle:Region', 57)); 
//		$city3436->setName('Шахунья');
//		$manager->persist($city3436); 
//
//		$city3437= new City();
//		$city3437->setId(3437);
//		$city3437->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3437->setName('Боровичи');
//		$manager->persist($city3437); 
//
//		$city3438= new City();
//		$city3438->setId(3438);
//		$city3438->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3438->setName('Валдай');
//		$manager->persist($city3438); 
//
//		$city3439= new City();
//		$city3439->setId(3439);
//		$city3439->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3439->setName('Великий Новгород');
//		$manager->persist($city3439); 
//
//		$city3440= new City();
//		$city3440->setId(3440);
//		$city3440->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3440->setName('Демянск');
//		$manager->persist($city3440); 
//
//		$city3441= new City();
//		$city3441->setId(3441);
//		$city3441->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3441->setName('Крестцы');
//		$manager->persist($city3441); 
//
//		$city3442= new City();
//		$city3442->setId(3442);
//		$city3442->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3442->setName('Малая Вишера');
//		$manager->persist($city3442); 
//
//		$city3443= new City();
//		$city3443->setId(3443);
//		$city3443->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3443->setName('Марево');
//		$manager->persist($city3443); 
//
//		$city3444= new City();
//		$city3444->setId(3444);
//		$city3444->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3444->setName('Окуловка');
//		$manager->persist($city3444); 
//
//		$city3445= new City();
//		$city3445->setId(3445);
//		$city3445->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3445->setName('Панковка');
//		$manager->persist($city3445); 
//
//		$city3446= new City();
//		$city3446->setId(3446);
//		$city3446->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3446->setName('Парфино');
//		$manager->persist($city3446); 
//
//		$city3447= new City();
//		$city3447->setId(3447);
//		$city3447->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3447->setName('Пестово');
//		$manager->persist($city3447); 
//
//		$city3448= new City();
//		$city3448->setId(3448);
//		$city3448->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3448->setName('Поддорье');
//		$manager->persist($city3448); 
//
//		$city3449= new City();
//		$city3449->setId(3449);
//		$city3449->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3449->setName('Сольцы');
//		$manager->persist($city3449); 
//
//		$city3450= new City();
//		$city3450->setId(3450);
//		$city3450->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3450->setName('Старая Русса');
//		$manager->persist($city3450); 
//
//		$city3451= new City();
//		$city3451->setId(3451);
//		$city3451->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3451->setName('Хвойная');
//		$manager->persist($city3451); 
//
//		$city3452= new City();
//		$city3452->setId(3452);
//		$city3452->setRegion($this->em->getReference('NitraGeoBundle:Region', 58)); 
//		$city3452->setName('Холм');
//		$manager->persist($city3452); 
//
//		$city3453= new City();
//		$city3453->setId(3453);
//		$city3453->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3453->setName('Баган');
//		$manager->persist($city3453); 
//
//		$city3454= new City();
//		$city3454->setId(3454);
//		$city3454->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3454->setName('Барабинск');
//		$manager->persist($city3454); 
//
//		$city3455= new City();
//		$city3455->setId(3455);
//		$city3455->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3455->setName('Бердск');
//		$manager->persist($city3455); 
//
//		$city3456= new City();
//		$city3456->setId(3456);
//		$city3456->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3456->setName('Болотное');
//		$manager->persist($city3456); 
//
//		$city3457= new City();
//		$city3457->setId(3457);
//		$city3457->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3457->setName('Венгерово');
//		$manager->persist($city3457); 
//
//		$city3458= new City();
//		$city3458->setId(3458);
//		$city3458->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3458->setName('Довольное');
//		$manager->persist($city3458); 
//
//		$city3459= new City();
//		$city3459->setId(3459);
//		$city3459->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3459->setName('Здвинск');
//		$manager->persist($city3459); 
//
//		$city3460= new City();
//		$city3460->setId(3460);
//		$city3460->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3460->setName('Искитим');
//		$manager->persist($city3460); 
//
//		$city3461= new City();
//		$city3461->setId(3461);
//		$city3461->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3461->setName('Карасук');
//		$manager->persist($city3461); 
//
//		$city3462= new City();
//		$city3462->setId(3462);
//		$city3462->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3462->setName('Каргат');
//		$manager->persist($city3462); 
//
//		$city3463= new City();
//		$city3463->setId(3463);
//		$city3463->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3463->setName('Колывань');
//		$manager->persist($city3463); 
//
//		$city3464= new City();
//		$city3464->setId(3464);
//		$city3464->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3464->setName('Кольцово');
//		$manager->persist($city3464); 
//
//		$city3465= new City();
//		$city3465->setId(3465);
//		$city3465->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3465->setName('Коченево');
//		$manager->persist($city3465); 
//
//		$city3466= new City();
//		$city3466->setId(3466);
//		$city3466->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3466->setName('Кочки');
//		$manager->persist($city3466); 
//
//		$city3467= new City();
//		$city3467->setId(3467);
//		$city3467->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3467->setName('Краснозерское');
//		$manager->persist($city3467); 
//
//		$city3468= new City();
//		$city3468->setId(3468);
//		$city3468->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3468->setName('Краснообск');
//		$manager->persist($city3468); 
//
//		$city3469= new City();
//		$city3469->setId(3469);
//		$city3469->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3469->setName('Куйбышев');
//		$manager->persist($city3469); 
//
//		$city3470= new City();
//		$city3470->setId(3470);
//		$city3470->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3470->setName('Купино');
//		$manager->persist($city3470); 
//
//		$city3471= new City();
//		$city3471->setId(3471);
//		$city3471->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3471->setName('Кыштовка');
//		$manager->persist($city3471); 
//
//		$city3472= new City();
//		$city3472->setId(3472);
//		$city3472->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3472->setName('Линёво');
//		$manager->persist($city3472); 
//
//		$city3473= new City();
//		$city3473->setId(3473);
//		$city3473->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3473->setName('Маслянино');
//		$manager->persist($city3473); 
//
//		$city3474= new City();
//		$city3474->setId(3474);
//		$city3474->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3474->setName('Мошково');
//		$manager->persist($city3474); 
//
//		$city3475= new City();
//		$city3475->setId(3475);
//		$city3475->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3475->setName('Новосибирск');
//		$manager->persist($city3475); 
//
//		$city3476= new City();
//		$city3476->setId(3476);
//		$city3476->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3476->setName('Новосибирск (Северный)');
//		$manager->persist($city3476); 
//
//		$city3477= new City();
//		$city3477->setId(3477);
//		$city3477->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3477->setName('Новосибирск (Толмачево)');
//		$manager->persist($city3477); 
//
//		$city3478= new City();
//		$city3478->setId(3478);
//		$city3478->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3478->setName('Обь');
//		$manager->persist($city3478); 
//
//		$city3479= new City();
//		$city3479->setId(3479);
//		$city3479->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3479->setName('Ордынское');
//		$manager->persist($city3479); 
//
//		$city3480= new City();
//		$city3480->setId(3480);
//		$city3480->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3480->setName('Северное');
//		$manager->persist($city3480); 
//
//		$city3481= new City();
//		$city3481->setId(3481);
//		$city3481->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3481->setName('Сузун');
//		$manager->persist($city3481); 
//
//		$city3482= new City();
//		$city3482->setId(3482);
//		$city3482->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3482->setName('Татарск');
//		$manager->persist($city3482); 
//
//		$city3483= new City();
//		$city3483->setId(3483);
//		$city3483->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3483->setName('Тогучин');
//		$manager->persist($city3483); 
//
//		$city3484= new City();
//		$city3484->setId(3484);
//		$city3484->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3484->setName('Убинское');
//		$manager->persist($city3484); 
//
//		$city3485= new City();
//		$city3485->setId(3485);
//		$city3485->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3485->setName('Усть-Тарка');
//		$manager->persist($city3485); 
//
//		$city3486= new City();
//		$city3486->setId(3486);
//		$city3486->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3486->setName('Чаны');
//		$manager->persist($city3486); 
//
//		$city3487= new City();
//		$city3487->setId(3487);
//		$city3487->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3487->setName('Черепаново');
//		$manager->persist($city3487); 
//
//		$city3488= new City();
//		$city3488->setId(3488);
//		$city3488->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3488->setName('Чистоозерное');
//		$manager->persist($city3488); 
//
//		$city3489= new City();
//		$city3489->setId(3489);
//		$city3489->setRegion($this->em->getReference('NitraGeoBundle:Region', 59)); 
//		$city3489->setName('Чулым');
//		$manager->persist($city3489); 
//
//		$city3490= new City();
//		$city3490->setId(3490);
//		$city3490->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3490->setName('Азово');
//		$manager->persist($city3490); 
//
//		$city3491= new City();
//		$city3491->setId(3491);
//		$city3491->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3491->setName('Большеречье');
//		$manager->persist($city3491); 
//
//		$city3492= new City();
//		$city3492->setId(3492);
//		$city3492->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3492->setName('Большие Уки');
//		$manager->persist($city3492); 
//
//		$city3493= new City();
//		$city3493->setId(3493);
//		$city3493->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3493->setName('Горьковское');
//		$manager->persist($city3493); 
//
//		$city3494= new City();
//		$city3494->setId(3494);
//		$city3494->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3494->setName('Знаменское');
//		$manager->persist($city3494); 
//
//		$city3495= new City();
//		$city3495->setId(3495);
//		$city3495->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3495->setName('Исилькуль');
//		$manager->persist($city3495); 
//
//		$city3496= new City();
//		$city3496->setId(3496);
//		$city3496->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3496->setName('Калачинск');
//		$manager->persist($city3496); 
//
//		$city3497= new City();
//		$city3497->setId(3497);
//		$city3497->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3497->setName('Колосовка');
//		$manager->persist($city3497); 
//
//		$city3498= new City();
//		$city3498->setId(3498);
//		$city3498->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3498->setName('Кормиловка');
//		$manager->persist($city3498); 
//
//		$city3499= new City();
//		$city3499->setId(3499);
//		$city3499->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3499->setName('Крутинка');
//		$manager->persist($city3499); 
//
//		$city3500= new City();
//		$city3500->setId(3500);
//		$city3500->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3500->setName('Лузино');
//		$manager->persist($city3500); 
//
//		$city3501= new City();
//		$city3501->setId(3501);
//		$city3501->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3501->setName('Любинский');
//		$manager->persist($city3501); 
//
//		$city3502= new City();
//		$city3502->setId(3502);
//		$city3502->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3502->setName('Москаленки');
//		$manager->persist($city3502); 
//
//		$city3503= new City();
//		$city3503->setId(3503);
//		$city3503->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3503->setName('Муромцево');
//		$manager->persist($city3503); 
//
//		$city3504= new City();
//		$city3504->setId(3504);
//		$city3504->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3504->setName('Называевск');
//		$manager->persist($city3504); 
//
//		$city3505= new City();
//		$city3505->setId(3505);
//		$city3505->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3505->setName('Нижняя Омка');
//		$manager->persist($city3505); 
//
//		$city3506= new City();
//		$city3506->setId(3506);
//		$city3506->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3506->setName('Одесское');
//		$manager->persist($city3506); 
//
//		$city3507= new City();
//		$city3507->setId(3507);
//		$city3507->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3507->setName('Оконешниково');
//		$manager->persist($city3507); 
//
//		$city3508= new City();
//		$city3508->setId(3508);
//		$city3508->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3508->setName('Омск');
//		$manager->persist($city3508); 
//
//		$city3509= new City();
//		$city3509->setId(3509);
//		$city3509->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3509->setName('Омск (Центральный)');
//		$manager->persist($city3509); 
//
//		$city3510= new City();
//		$city3510->setId(3510);
//		$city3510->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3510->setName('Павлоградка');
//		$manager->persist($city3510); 
//
//		$city3511= new City();
//		$city3511->setId(3511);
//		$city3511->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3511->setName('Саргатское');
//		$manager->persist($city3511); 
//
//		$city3512= new City();
//		$city3512->setId(3512);
//		$city3512->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3512->setName('Седельниково');
//		$manager->persist($city3512); 
//
//		$city3513= new City();
//		$city3513->setId(3513);
//		$city3513->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3513->setName('Таврическое');
//		$manager->persist($city3513); 
//
//		$city3514= new City();
//		$city3514->setId(3514);
//		$city3514->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3514->setName('Тара');
//		$manager->persist($city3514); 
//
//		$city3515= new City();
//		$city3515->setId(3515);
//		$city3515->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3515->setName('Тевриз');
//		$manager->persist($city3515); 
//
//		$city3516= new City();
//		$city3516->setId(3516);
//		$city3516->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3516->setName('Тюкалинск');
//		$manager->persist($city3516); 
//
//		$city3517= new City();
//		$city3517->setId(3517);
//		$city3517->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3517->setName('Усть-Ишим');
//		$manager->persist($city3517); 
//
//		$city3518= new City();
//		$city3518->setId(3518);
//		$city3518->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3518->setName('Черлак');
//		$manager->persist($city3518); 
//
//		$city3519= new City();
//		$city3519->setId(3519);
//		$city3519->setRegion($this->em->getReference('NitraGeoBundle:Region', 60)); 
//		$city3519->setName('Шербакуль');
//		$manager->persist($city3519); 
//
//		$city3520= new City();
//		$city3520->setId(3520);
//		$city3520->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3520->setName('Абдулино');
//		$manager->persist($city3520); 
//
//		$city3521= new City();
//		$city3521->setId(3521);
//		$city3521->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3521->setName('Адамовка');
//		$manager->persist($city3521); 
//
//		$city3522= new City();
//		$city3522->setId(3522);
//		$city3522->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3522->setName('Акбулак');
//		$manager->persist($city3522); 
//
//		$city3523= new City();
//		$city3523->setId(3523);
//		$city3523->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3523->setName('Бугуруслан');
//		$manager->persist($city3523); 
//
//		$city3524= new City();
//		$city3524->setId(3524);
//		$city3524->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3524->setName('Бузулук');
//		$manager->persist($city3524); 
//
//		$city3525= new City();
//		$city3525->setId(3525);
//		$city3525->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3525->setName('Гай');
//		$manager->persist($city3525); 
//
//		$city3526= new City();
//		$city3526->setId(3526);
//		$city3526->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3526->setName('Грачевка');
//		$manager->persist($city3526); 
//
//		$city3527= new City();
//		$city3527->setId(3527);
//		$city3527->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3527->setName('Домбаровский');
//		$manager->persist($city3527); 
//
//		$city3528= new City();
//		$city3528->setId(3528);
//		$city3528->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3528->setName('Илек');
//		$manager->persist($city3528); 
//
//		$city3529= new City();
//		$city3529->setId(3529);
//		$city3529->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3529->setName('Кваркено');
//		$manager->persist($city3529); 
//
//		$city3530= new City();
//		$city3530->setId(3530);
//		$city3530->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3530->setName('Кувандык');
//		$manager->persist($city3530); 
//
//		$city3531= new City();
//		$city3531->setId(3531);
//		$city3531->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3531->setName('Курманаевка');
//		$manager->persist($city3531); 
//
//		$city3532= new City();
//		$city3532->setId(3532);
//		$city3532->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3532->setName('Матвеевка');
//		$manager->persist($city3532); 
//
//		$city3533= new City();
//		$city3533->setId(3533);
//		$city3533->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3533->setName('Медногорск');
//		$manager->persist($city3533); 
//
//		$city3534= new City();
//		$city3534->setId(3534);
//		$city3534->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3534->setName('Новоорск');
//		$manager->persist($city3534); 
//
//		$city3535= new City();
//		$city3535->setId(3535);
//		$city3535->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3535->setName('Новосергиевка');
//		$manager->persist($city3535); 
//
//		$city3536= new City();
//		$city3536->setId(3536);
//		$city3536->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3536->setName('Новотроицк');
//		$manager->persist($city3536); 
//
//		$city3537= new City();
//		$city3537->setId(3537);
//		$city3537->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3537->setName('Оренбург');
//		$manager->persist($city3537); 
//
//		$city3538= new City();
//		$city3538->setId(3538);
//		$city3538->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3538->setName('Орск');
//		$manager->persist($city3538); 
//
//		$city3539= new City();
//		$city3539->setId(3539);
//		$city3539->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3539->setName('Плешаново');
//		$manager->persist($city3539); 
//
//		$city3540= new City();
//		$city3540->setId(3540);
//		$city3540->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3540->setName('Пономаревка');
//		$manager->persist($city3540); 
//
//		$city3541= new City();
//		$city3541->setId(3541);
//		$city3541->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3541->setName('Сакмара');
//		$manager->persist($city3541); 
//
//		$city3542= new City();
//		$city3542->setId(3542);
//		$city3542->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3542->setName('Саракташ');
//		$manager->persist($city3542); 
//
//		$city3543= new City();
//		$city3543->setId(3543);
//		$city3543->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3543->setName('Соль-Илецк');
//		$manager->persist($city3543); 
//
//		$city3544= new City();
//		$city3544->setId(3544);
//		$city3544->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3544->setName('Сорочинск');
//		$manager->persist($city3544); 
//
//		$city3545= new City();
//		$city3545->setId(3545);
//		$city3545->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3545->setName('Ташла');
//		$manager->persist($city3545); 
//
//		$city3546= new City();
//		$city3546->setId(3546);
//		$city3546->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3546->setName('Тоцкое Второе');
//		$manager->persist($city3546); 
//
//		$city3547= new City();
//		$city3547->setId(3547);
//		$city3547->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3547->setName('Тюльган');
//		$manager->persist($city3547); 
//
//		$city3548= new City();
//		$city3548->setId(3548);
//		$city3548->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3548->setName('Шарлык');
//		$manager->persist($city3548); 
//
//		$city3549= new City();
//		$city3549->setId(3549);
//		$city3549->setRegion($this->em->getReference('NitraGeoBundle:Region', 61)); 
//		$city3549->setName('Ясный');
//		$manager->persist($city3549); 
//
//		$city3550= new City();
//		$city3550->setId(3550);
//		$city3550->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3550->setName('Болхов');
//		$manager->persist($city3550); 
//
//		$city3551= new City();
//		$city3551->setId(3551);
//		$city3551->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3551->setName('Верховье');
//		$manager->persist($city3551); 
//
//		$city3552= new City();
//		$city3552->setId(3552);
//		$city3552->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3552->setName('Дмитровск-Орловский');
//		$manager->persist($city3552); 
//
//		$city3553= new City();
//		$city3553->setId(3553);
//		$city3553->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3553->setName('Ливны');
//		$manager->persist($city3553); 
//
//		$city3554= new City();
//		$city3554->setId(3554);
//		$city3554->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3554->setName('Малоархангельск');
//		$manager->persist($city3554); 
//
//		$city3555= new City();
//		$city3555->setId(3555);
//		$city3555->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3555->setName('Мценск');
//		$manager->persist($city3555); 
//
//		$city3556= new City();
//		$city3556->setId(3556);
//		$city3556->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3556->setName('Новосиль');
//		$manager->persist($city3556); 
//
//		$city3557= new City();
//		$city3557->setId(3557);
//		$city3557->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3557->setName('Орел');
//		$manager->persist($city3557); 
//
//		$city3558= new City();
//		$city3558->setId(3558);
//		$city3558->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3558->setName('Орел (Южный)');
//		$manager->persist($city3558); 
//
//		$city3559= new City();
//		$city3559->setId(3559);
//		$city3559->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3559->setName('Сосково');
//		$manager->persist($city3559); 
//
//		$city3560= new City();
//		$city3560->setId(3560);
//		$city3560->setRegion($this->em->getReference('NitraGeoBundle:Region', 62)); 
//		$city3560->setName('Шаблыкино');
//		$manager->persist($city3560); 
//
//		$city3561= new City();
//		$city3561->setId(3561);
//		$city3561->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3561->setName('Башмаково');
//		$manager->persist($city3561); 
//
//		$city3562= new City();
//		$city3562->setId(3562);
//		$city3562->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3562->setName('Беково');
//		$manager->persist($city3562); 
//
//		$city3563= new City();
//		$city3563->setId(3563);
//		$city3563->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3563->setName('Белинский');
//		$manager->persist($city3563); 
//
//		$city3564= new City();
//		$city3564->setId(3564);
//		$city3564->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3564->setName('Вадинск');
//		$manager->persist($city3564); 
//
//		$city3565= new City();
//		$city3565->setId(3565);
//		$city3565->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3565->setName('Заречный');
//		$manager->persist($city3565); 
//
//		$city3566= new City();
//		$city3566->setId(3566);
//		$city3566->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3566->setName('Земетчино');
//		$manager->persist($city3566); 
//
//		$city3567= new City();
//		$city3567->setId(3567);
//		$city3567->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3567->setName('Кондоль');
//		$manager->persist($city3567); 
//
//		$city3568= new City();
//		$city3568->setId(3568);
//		$city3568->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3568->setName('Кузнецк');
//		$manager->persist($city3568); 
//
//		$city3569= new City();
//		$city3569->setId(3569);
//		$city3569->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3569->setName('Лопатино');
//		$manager->persist($city3569); 
//
//		$city3570= new City();
//		$city3570->setId(3570);
//		$city3570->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3570->setName('Малая Сердоба');
//		$manager->persist($city3570); 
//
//		$city3571= new City();
//		$city3571->setId(3571);
//		$city3571->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3571->setName('Мокшан');
//		$manager->persist($city3571); 
//
//		$city3572= new City();
//		$city3572->setId(3572);
//		$city3572->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3572->setName('Наровчат');
//		$manager->persist($city3572); 
//
//		$city3573= new City();
//		$city3573->setId(3573);
//		$city3573->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3573->setName('Нижний Ломов');
//		$manager->persist($city3573); 
//
//		$city3574= new City();
//		$city3574->setId(3574);
//		$city3574->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3574->setName('Пачелма');
//		$manager->persist($city3574); 
//
//		$city3575= new City();
//		$city3575->setId(3575);
//		$city3575->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3575->setName('Пенза');
//		$manager->persist($city3575); 
//
//		$city3576= new City();
//		$city3576->setId(3576);
//		$city3576->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3576->setName('Пенза (Терновка)');
//		$manager->persist($city3576); 
//
//		$city3577= new City();
//		$city3577->setId(3577);
//		$city3577->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3577->setName('Русский Камешкир');
//		$manager->persist($city3577); 
//
//		$city3578= new City();
//		$city3578->setId(3578);
//		$city3578->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3578->setName('Сердобск');
//		$manager->persist($city3578); 
//
//		$city3579= new City();
//		$city3579->setId(3579);
//		$city3579->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3579->setName('Спасск');
//		$manager->persist($city3579); 
//
//		$city3580= new City();
//		$city3580->setId(3580);
//		$city3580->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3580->setName('Тамала');
//		$manager->persist($city3580); 
//
//		$city3581= new City();
//		$city3581->setId(3581);
//		$city3581->setRegion($this->em->getReference('NitraGeoBundle:Region', 63)); 
//		$city3581->setName('Шемышейка');
//		$manager->persist($city3581); 
//
//		$city3582= new City();
//		$city3582->setId(3582);
//		$city3582->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3582->setName('Барда');
//		$manager->persist($city3582); 
//
//		$city3583= new City();
//		$city3583->setId(3583);
//		$city3583->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3583->setName('Березники');
//		$manager->persist($city3583); 
//
//		$city3584= new City();
//		$city3584->setId(3584);
//		$city3584->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3584->setName('Большая Соснова');
//		$manager->persist($city3584); 
//
//		$city3585= new City();
//		$city3585->setId(3585);
//		$city3585->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3585->setName('Верещагино');
//		$manager->persist($city3585); 
//
//		$city3586= new City();
//		$city3586->setId(3586);
//		$city3586->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3586->setName('Гайны');
//		$manager->persist($city3586); 
//
//		$city3587= new City();
//		$city3587->setId(3587);
//		$city3587->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3587->setName('Горнозаводск');
//		$manager->persist($city3587); 
//
//		$city3588= new City();
//		$city3588->setId(3588);
//		$city3588->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3588->setName('Гремячинск');
//		$manager->persist($city3588); 
//
//		$city3589= new City();
//		$city3589->setId(3589);
//		$city3589->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3589->setName('Губаха');
//		$manager->persist($city3589); 
//
//		$city3590= new City();
//		$city3590->setId(3590);
//		$city3590->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3590->setName('Елово');
//		$manager->persist($city3590); 
//
//		$city3591= new City();
//		$city3591->setId(3591);
//		$city3591->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3591->setName('Ильинский');
//		$manager->persist($city3591); 
//
//		$city3592= new City();
//		$city3592->setId(3592);
//		$city3592->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3592->setName('Карагай');
//		$manager->persist($city3592); 
//
//		$city3593= new City();
//		$city3593->setId(3593);
//		$city3593->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3593->setName('Кизел');
//		$manager->persist($city3593); 
//
//		$city3594= new City();
//		$city3594->setId(3594);
//		$city3594->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3594->setName('Коса');
//		$manager->persist($city3594); 
//
//		$city3595= new City();
//		$city3595->setId(3595);
//		$city3595->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3595->setName('Кочево');
//		$manager->persist($city3595); 
//
//		$city3596= new City();
//		$city3596->setId(3596);
//		$city3596->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3596->setName('Красновишерск');
//		$manager->persist($city3596); 
//
//		$city3597= new City();
//		$city3597->setId(3597);
//		$city3597->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3597->setName('Краснокамск');
//		$manager->persist($city3597); 
//
//		$city3598= new City();
//		$city3598->setId(3598);
//		$city3598->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3598->setName('Кудымкар');
//		$manager->persist($city3598); 
//
//		$city3599= new City();
//		$city3599->setId(3599);
//		$city3599->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3599->setName('Куеда');
//		$manager->persist($city3599); 
//
//		$city3600= new City();
//		$city3600->setId(3600);
//		$city3600->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3600->setName('Кунгур');
//		$manager->persist($city3600); 
//
//		$city3601= new City();
//		$city3601->setId(3601);
//		$city3601->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3601->setName('Лысьва');
//		$manager->persist($city3601); 
//
//		$city3602= new City();
//		$city3602->setId(3602);
//		$city3602->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3602->setName('Ныроб');
//		$manager->persist($city3602); 
//
//		$city3603= new City();
//		$city3603->setId(3603);
//		$city3603->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3603->setName('Нытва');
//		$manager->persist($city3603); 
//
//		$city3604= new City();
//		$city3604->setId(3604);
//		$city3604->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3604->setName('Орда');
//		$manager->persist($city3604); 
//
//		$city3605= new City();
//		$city3605->setId(3605);
//		$city3605->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3605->setName('Оханск');
//		$manager->persist($city3605); 
//
//		$city3606= new City();
//		$city3606->setId(3606);
//		$city3606->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3606->setName('Очер');
//		$manager->persist($city3606); 
//
//		$city3607= new City();
//		$city3607->setId(3607);
//		$city3607->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3607->setName('Пермь');
//		$manager->persist($city3607); 
//
//		$city3608= new City();
//		$city3608->setId(3608);
//		$city3608->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3608->setName('Пермь (Большое Савино)');
//		$manager->persist($city3608); 
//
//		$city3609= new City();
//		$city3609->setId(3609);
//		$city3609->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3609->setName('Полазна');
//		$manager->persist($city3609); 
//
//		$city3610= new City();
//		$city3610->setId(3610);
//		$city3610->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3610->setName('Сива');
//		$manager->persist($city3610); 
//
//		$city3611= new City();
//		$city3611->setId(3611);
//		$city3611->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3611->setName('Соликамск');
//		$manager->persist($city3611); 
//
//		$city3612= new City();
//		$city3612->setId(3612);
//		$city3612->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3612->setName('Суксун');
//		$manager->persist($city3612); 
//
//		$city3613= new City();
//		$city3613->setId(3613);
//		$city3613->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3613->setName('Тулпан');
//		$manager->persist($city3613); 
//
//		$city3614= new City();
//		$city3614->setId(3614);
//		$city3614->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3614->setName('Углеуральский');
//		$manager->persist($city3614); 
//
//		$city3615= new City();
//		$city3615->setId(3615);
//		$city3615->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3615->setName('Уинское');
//		$manager->persist($city3615); 
//
//		$city3616= new City();
//		$city3616->setId(3616);
//		$city3616->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3616->setName('Усолье');
//		$manager->persist($city3616); 
//
//		$city3617= new City();
//		$city3617->setId(3617);
//		$city3617->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3617->setName('Усть-Кишерть');
//		$manager->persist($city3617); 
//
//		$city3618= new City();
//		$city3618->setId(3618);
//		$city3618->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3618->setName('Чайковский');
//		$manager->persist($city3618); 
//
//		$city3619= new City();
//		$city3619->setId(3619);
//		$city3619->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3619->setName('Частые');
//		$manager->persist($city3619); 
//
//		$city3620= new City();
//		$city3620->setId(3620);
//		$city3620->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3620->setName('Чердынь');
//		$manager->persist($city3620); 
//
//		$city3621= new City();
//		$city3621->setId(3621);
//		$city3621->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3621->setName('Чермоз');
//		$manager->persist($city3621); 
//
//		$city3622= new City();
//		$city3622->setId(3622);
//		$city3622->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3622->setName('Чернушка');
//		$manager->persist($city3622); 
//
//		$city3623= new City();
//		$city3623->setId(3623);
//		$city3623->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3623->setName('Чусовой');
//		$manager->persist($city3623); 
//
//		$city3624= new City();
//		$city3624->setId(3624);
//		$city3624->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3624->setName('Юрла');
//		$manager->persist($city3624); 
//
//		$city3625= new City();
//		$city3625->setId(3625);
//		$city3625->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3625->setName('Юсьва');
//		$manager->persist($city3625); 
//
//		$city3626= new City();
//		$city3626->setId(3626);
//		$city3626->setRegion($this->em->getReference('NitraGeoBundle:Region', 64)); 
//		$city3626->setName('Яйва');
//		$manager->persist($city3626); 
//
//		$city3627= new City();
//		$city3627->setId(3627);
//		$city3627->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3627->setName('Анучино');
//		$manager->persist($city3627); 
//
//		$city3628= new City();
//		$city3628->setId(3628);
//		$city3628->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3628->setName('Арсеньев');
//		$manager->persist($city3628); 
//
//		$city3629= new City();
//		$city3629->setId(3629);
//		$city3629->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3629->setName('Артем');
//		$manager->persist($city3629); 
//
//		$city3630= new City();
//		$city3630->setId(3630);
//		$city3630->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3630->setName('Большой Камень');
//		$manager->persist($city3630); 
//
//		$city3631= new City();
//		$city3631->setId(3631);
//		$city3631->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3631->setName('Владивосток');
//		$manager->persist($city3631); 
//
//		$city3632= new City();
//		$city3632->setId(3632);
//		$city3632->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3632->setName('Владивосток (Кневичи)');
//		$manager->persist($city3632); 
//
//		$city3633= new City();
//		$city3633->setId(3633);
//		$city3633->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3633->setName('Восток');
//		$manager->persist($city3633); 
//
//		$city3634= new City();
//		$city3634->setId(3634);
//		$city3634->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3634->setName('Дальнегорск');
//		$manager->persist($city3634); 
//
//		$city3635= new City();
//		$city3635->setId(3635);
//		$city3635->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3635->setName('Дальнереченск');
//		$manager->persist($city3635); 
//
//		$city3636= new City();
//		$city3636->setId(3636);
//		$city3636->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3636->setName('Кавалерово');
//		$manager->persist($city3636); 
//
//		$city3637= new City();
//		$city3637->setId(3637);
//		$city3637->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3637->setName('Камень-Рыболов');
//		$manager->persist($city3637); 
//
//		$city3638= new City();
//		$city3638->setId(3638);
//		$city3638->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3638->setName('Кировский');
//		$manager->persist($city3638); 
//
//		$city3639= new City();
//		$city3639->setId(3639);
//		$city3639->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3639->setName('Лазо');
//		$manager->persist($city3639); 
//
//		$city3640= new City();
//		$city3640->setId(3640);
//		$city3640->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3640->setName('Лесозаводск');
//		$manager->persist($city3640); 
//
//		$city3641= new City();
//		$city3641->setId(3641);
//		$city3641->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3641->setName('Лучегорск');
//		$manager->persist($city3641); 
//
//		$city3642= new City();
//		$city3642->setId(3642);
//		$city3642->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3642->setName('Находка');
//		$manager->persist($city3642); 
//
//		$city3643= new City();
//		$city3643->setId(3643);
//		$city3643->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3643->setName('Ольга');
//		$manager->persist($city3643); 
//
//		$city3644= new City();
//		$city3644->setId(3644);
//		$city3644->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3644->setName('Партизанск');
//		$manager->persist($city3644); 
//
//		$city3645= new City();
//		$city3645->setId(3645);
//		$city3645->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3645->setName('Пограничный');
//		$manager->persist($city3645); 
//
//		$city3646= new City();
//		$city3646->setId(3646);
//		$city3646->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3646->setName('Покровка');
//		$manager->persist($city3646); 
//
//		$city3647= new City();
//		$city3647->setId(3647);
//		$city3647->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3647->setName('Посьет');
//		$manager->persist($city3647); 
//
//		$city3648= new City();
//		$city3648->setId(3648);
//		$city3648->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3648->setName('Славянка');
//		$manager->persist($city3648); 
//
//		$city3649= new City();
//		$city3649->setId(3649);
//		$city3649->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3649->setName('Спасск-Дальний');
//		$manager->persist($city3649); 
//
//		$city3650= new City();
//		$city3650->setId(3650);
//		$city3650->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3650->setName('Терней');
//		$manager->persist($city3650); 
//
//		$city3651= new City();
//		$city3651->setId(3651);
//		$city3651->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3651->setName('Трудовое');
//		$manager->persist($city3651); 
//
//		$city3652= new City();
//		$city3652->setId(3652);
//		$city3652->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3652->setName('Уссурийск');
//		$manager->persist($city3652); 
//
//		$city3653= new City();
//		$city3653->setId(3653);
//		$city3653->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3653->setName('Хасан');
//		$manager->persist($city3653); 
//
//		$city3654= new City();
//		$city3654->setId(3654);
//		$city3654->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3654->setName('Хороль');
//		$manager->persist($city3654); 
//
//		$city3655= new City();
//		$city3655->setId(3655);
//		$city3655->setRegion($this->em->getReference('NitraGeoBundle:Region', 65)); 
//		$city3655->setName('Чугуевка');
//		$manager->persist($city3655); 
//
//		$city3656= new City();
//		$city3656->setId(3656);
//		$city3656->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3656->setName('Великие Луки');
//		$manager->persist($city3656); 
//
//		$city3657= new City();
//		$city3657->setId(3657);
//		$city3657->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3657->setName('Гдов');
//		$manager->persist($city3657); 
//
//		$city3658= new City();
//		$city3658->setId(3658);
//		$city3658->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3658->setName('Дедовичи');
//		$manager->persist($city3658); 
//
//		$city3659= new City();
//		$city3659->setId(3659);
//		$city3659->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3659->setName('Денёво');
//		$manager->persist($city3659); 
//
//		$city3660= new City();
//		$city3660->setId(3660);
//		$city3660->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3660->setName('Дно');
//		$manager->persist($city3660); 
//
//		$city3661= new City();
//		$city3661->setId(3661);
//		$city3661->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3661->setName('Красногородск');
//		$manager->persist($city3661); 
//
//		$city3662= new City();
//		$city3662->setId(3662);
//		$city3662->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3662->setName('Невель');
//		$manager->persist($city3662); 
//
//		$city3663= new City();
//		$city3663->setId(3663);
//		$city3663->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3663->setName('Опочка');
//		$manager->persist($city3663); 
//
//		$city3664= new City();
//		$city3664->setId(3664);
//		$city3664->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3664->setName('Печоры');
//		$manager->persist($city3664); 
//
//		$city3665= new City();
//		$city3665->setId(3665);
//		$city3665->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3665->setName('Плюсса');
//		$manager->persist($city3665); 
//
//		$city3666= new City();
//		$city3666->setId(3666);
//		$city3666->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3666->setName('Порхов');
//		$manager->persist($city3666); 
//
//		$city3667= new City();
//		$city3667->setId(3667);
//		$city3667->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3667->setName('Псков');
//		$manager->persist($city3667); 
//
//		$city3668= new City();
//		$city3668->setId(3668);
//		$city3668->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3668->setName('Псков (Кресты)');
//		$manager->persist($city3668); 
//
//		$city3669= new City();
//		$city3669->setId(3669);
//		$city3669->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3669->setName('Пустошка');
//		$manager->persist($city3669); 
//
//		$city3670= new City();
//		$city3670->setId(3670);
//		$city3670->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3670->setName('Пушкинские Горы');
//		$manager->persist($city3670); 
//
//		$city3671= new City();
//		$city3671->setId(3671);
//		$city3671->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3671->setName('Пыталово');
//		$manager->persist($city3671); 
//
//		$city3672= new City();
//		$city3672->setId(3672);
//		$city3672->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3672->setName('Себеж');
//		$manager->persist($city3672); 
//
//		$city3673= new City();
//		$city3673->setId(3673);
//		$city3673->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3673->setName('Струги-Красные');
//		$manager->persist($city3673); 
//
//		$city3674= new City();
//		$city3674->setId(3674);
//		$city3674->setRegion($this->em->getReference('NitraGeoBundle:Region', 66)); 
//		$city3674->setName('Сущево');
//		$manager->persist($city3674); 
//
//		$city3675= new City();
//		$city3675->setId(3675);
//		$city3675->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3675->setName('Адыгейск');
//		$manager->persist($city3675); 
//
//		$city3676= new City();
//		$city3676->setId(3676);
//		$city3676->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3676->setName('Гиагинская');
//		$manager->persist($city3676); 
//
//		$city3677= new City();
//		$city3677->setId(3677);
//		$city3677->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3677->setName('Майкоп');
//		$manager->persist($city3677); 
//
//		$city3678= new City();
//		$city3678->setId(3678);
//		$city3678->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3678->setName('Тульский');
//		$manager->persist($city3678); 
//
//		$city3679= new City();
//		$city3679->setId(3679);
//		$city3679->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3679->setName('Ханская');
//		$manager->persist($city3679); 
//
//		$city3680= new City();
//		$city3680->setId(3680);
//		$city3680->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3680->setName('Энем');
//		$manager->persist($city3680); 
//
//		$city3681= new City();
//		$city3681->setId(3681);
//		$city3681->setRegion($this->em->getReference('NitraGeoBundle:Region', 67)); 
//		$city3681->setName('Яблоновский');
//		$manager->persist($city3681); 
//
//		$city3682= new City();
//		$city3682->setId(3682);
//		$city3682->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3682->setName('Горно-Алтайск');
//		$manager->persist($city3682); 
//
//		$city3683= new City();
//		$city3683->setId(3683);
//		$city3683->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3683->setName('Кош-Агач');
//		$manager->persist($city3683); 
//
//		$city3684= new City();
//		$city3684->setId(3684);
//		$city3684->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3684->setName('Майма');
//		$manager->persist($city3684); 
//
//		$city3685= new City();
//		$city3685->setId(3685);
//		$city3685->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3685->setName('Манжерок');
//		$manager->persist($city3685); 
//
//		$city3686= new City();
//		$city3686->setId(3686);
//		$city3686->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3686->setName('Онгудай');
//		$manager->persist($city3686); 
//
//		$city3687= new City();
//		$city3687->setId(3687);
//		$city3687->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3687->setName('Турочак');
//		$manager->persist($city3687); 
//
//		$city3688= new City();
//		$city3688->setId(3688);
//		$city3688->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3688->setName('Усть-Кан');
//		$manager->persist($city3688); 
//
//		$city3689= new City();
//		$city3689->setId(3689);
//		$city3689->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3689->setName('Усть-Кокса');
//		$manager->persist($city3689); 
//
//		$city3690= new City();
//		$city3690->setId(3690);
//		$city3690->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3690->setName('Усть-Улаган');
//		$manager->persist($city3690); 
//
//		$city3691= new City();
//		$city3691->setId(3691);
//		$city3691->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3691->setName('Чемал');
//		$manager->persist($city3691); 
//
//		$city3692= new City();
//		$city3692->setId(3692);
//		$city3692->setRegion($this->em->getReference('NitraGeoBundle:Region', 68)); 
//		$city3692->setName('Шебалино');
//		$manager->persist($city3692); 
//
//		$city3693= new City();
//		$city3693->setId(3693);
//		$city3693->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3693->setName('Агидель');
//		$manager->persist($city3693); 
//
//		$city3694= new City();
//		$city3694->setId(3694);
//		$city3694->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3694->setName('Акъяр');
//		$manager->persist($city3694); 
//
//		$city3695= new City();
//		$city3695->setId(3695);
//		$city3695->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3695->setName('Архангельское');
//		$manager->persist($city3695); 
//
//		$city3696= new City();
//		$city3696->setId(3696);
//		$city3696->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3696->setName('Аскарово');
//		$manager->persist($city3696); 
//
//		$city3697= new City();
//		$city3697->setId(3697);
//		$city3697->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3697->setName('Аскино');
//		$manager->persist($city3697); 
//
//		$city3698= new City();
//		$city3698->setId(3698);
//		$city3698->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3698->setName('Баймак');
//		$manager->persist($city3698); 
//
//		$city3699= new City();
//		$city3699->setId(3699);
//		$city3699->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3699->setName('Бакалы');
//		$manager->persist($city3699); 
//
//		$city3700= new City();
//		$city3700->setId(3700);
//		$city3700->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3700->setName('Белебей');
//		$manager->persist($city3700); 
//
//		$city3701= new City();
//		$city3701->setId(3701);
//		$city3701->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3701->setName('Белорецк');
//		$manager->persist($city3701); 
//
//		$city3702= new City();
//		$city3702->setId(3702);
//		$city3702->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3702->setName('Бижбуляк');
//		$manager->persist($city3702); 
//
//		$city3703= new City();
//		$city3703->setId(3703);
//		$city3703->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3703->setName('Бирск');
//		$manager->persist($city3703); 
//
//		$city3704= new City();
//		$city3704->setId(3704);
//		$city3704->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3704->setName('Буздяк');
//		$manager->persist($city3704); 
//
//		$city3705= new City();
//		$city3705->setId(3705);
//		$city3705->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3705->setName('Бураево');
//		$manager->persist($city3705); 
//
//		$city3706= new City();
//		$city3706->setId(3706);
//		$city3706->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3706->setName('Верхнеяркеево');
//		$manager->persist($city3706); 
//
//		$city3707= new City();
//		$city3707->setId(3707);
//		$city3707->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3707->setName('Верхние Киги');
//		$manager->persist($city3707); 
//
//		$city3708= new City();
//		$city3708->setId(3708);
//		$city3708->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3708->setName('Верхние Татышлы');
//		$manager->persist($city3708); 
//
//		$city3709= new City();
//		$city3709->setId(3709);
//		$city3709->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3709->setName('Давлеканово');
//		$manager->persist($city3709); 
//
//		$city3710= new City();
//		$city3710->setId(3710);
//		$city3710->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3710->setName('Дюртюли');
//		$manager->persist($city3710); 
//
//		$city3711= new City();
//		$city3711->setId(3711);
//		$city3711->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3711->setName('Зилаир');
//		$manager->persist($city3711); 
//
//		$city3712= new City();
//		$city3712->setId(3712);
//		$city3712->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3712->setName('Иглино');
//		$manager->persist($city3712); 
//
//		$city3713= new City();
//		$city3713->setId(3713);
//		$city3713->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3713->setName('Исянгулово');
//		$manager->persist($city3713); 
//
//		$city3714= new City();
//		$city3714->setId(3714);
//		$city3714->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3714->setName('Ишимбай');
//		$manager->persist($city3714); 
//
//		$city3715= new City();
//		$city3715->setId(3715);
//		$city3715->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3715->setName('Калтасы');
//		$manager->persist($city3715); 
//
//		$city3716= new City();
//		$city3716->setId(3716);
//		$city3716->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3716->setName('Кандры');
//		$manager->persist($city3716); 
//
//		$city3717= new City();
//		$city3717->setId(3717);
//		$city3717->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3717->setName('Караидель');
//		$manager->persist($city3717); 
//
//		$city3718= new City();
//		$city3718->setId(3718);
//		$city3718->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3718->setName('Кармаскалы');
//		$manager->persist($city3718); 
//
//		$city3719= new City();
//		$city3719->setId(3719);
//		$city3719->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3719->setName('Киргиз-Мияки');
//		$manager->persist($city3719); 
//
//		$city3720= new City();
//		$city3720->setId(3720);
//		$city3720->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3720->setName('Красная Горка');
//		$manager->persist($city3720); 
//
//		$city3721= new City();
//		$city3721->setId(3721);
//		$city3721->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3721->setName('Красноусольский');
//		$manager->persist($city3721); 
//
//		$city3722= new City();
//		$city3722->setId(3722);
//		$city3722->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3722->setName('Кумертау');
//		$manager->persist($city3722); 
//
//		$city3723= new City();
//		$city3723->setId(3723);
//		$city3723->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3723->setName('Кушнаренково');
//		$manager->persist($city3723); 
//
//		$city3724= new City();
//		$city3724->setId(3724);
//		$city3724->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3724->setName('Мелеуз');
//		$manager->persist($city3724); 
//
//		$city3725= new City();
//		$city3725->setId(3725);
//		$city3725->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3725->setName('Месягутово');
//		$manager->persist($city3725); 
//
//		$city3726= new City();
//		$city3726->setId(3726);
//		$city3726->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3726->setName('Мраково');
//		$manager->persist($city3726); 
//
//		$city3727= new City();
//		$city3727->setId(3727);
//		$city3727->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3727->setName('Нефтекамск');
//		$manager->persist($city3727); 
//
//		$city3728= new City();
//		$city3728->setId(3728);
//		$city3728->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3728->setName('Новобелокатай');
//		$manager->persist($city3728); 
//
//		$city3729= new City();
//		$city3729->setId(3729);
//		$city3729->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3729->setName('Приютово');
//		$manager->persist($city3729); 
//
//		$city3730= new City();
//		$city3730->setId(3730);
//		$city3730->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3730->setName('Раевский');
//		$manager->persist($city3730); 
//
//		$city3731= new City();
//		$city3731->setId(3731);
//		$city3731->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3731->setName('Салават');
//		$manager->persist($city3731); 
//
//		$city3732= new City();
//		$city3732->setId(3732);
//		$city3732->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3732->setName('Серафимовский');
//		$manager->persist($city3732); 
//
//		$city3733= new City();
//		$city3733->setId(3733);
//		$city3733->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3733->setName('Сибай');
//		$manager->persist($city3733); 
//
//		$city3734= new City();
//		$city3734->setId(3734);
//		$city3734->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3734->setName('Старосубхангулово');
//		$manager->persist($city3734); 
//
//		$city3735= new City();
//		$city3735->setId(3735);
//		$city3735->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3735->setName('Стерлибашево');
//		$manager->persist($city3735); 
//
//		$city3736= new City();
//		$city3736->setId(3736);
//		$city3736->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3736->setName('Стерлитамак');
//		$manager->persist($city3736); 
//
//		$city3737= new City();
//		$city3737->setId(3737);
//		$city3737->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3737->setName('Толбазы');
//		$manager->persist($city3737); 
//
//		$city3738= new City();
//		$city3738->setId(3738);
//		$city3738->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3738->setName('Туймазы');
//		$manager->persist($city3738); 
//
//		$city3739= new City();
//		$city3739->setId(3739);
//		$city3739->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3739->setName('Уфа');
//		$manager->persist($city3739); 
//
//		$city3740= new City();
//		$city3740->setId(3740);
//		$city3740->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3740->setName('Учалы');
//		$manager->persist($city3740); 
//
//		$city3741= new City();
//		$city3741->setId(3741);
//		$city3741->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3741->setName('Чекмагуш');
//		$manager->persist($city3741); 
//
//		$city3742= new City();
//		$city3742->setId(3742);
//		$city3742->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3742->setName('Чишмы');
//		$manager->persist($city3742); 
//
//		$city3743= new City();
//		$city3743->setId(3743);
//		$city3743->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3743->setName('Шаран');
//		$manager->persist($city3743); 
//
//		$city3744= new City();
//		$city3744->setId(3744);
//		$city3744->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3744->setName('Языково');
//		$manager->persist($city3744); 
//
//		$city3745= new City();
//		$city3745->setId(3745);
//		$city3745->setRegion($this->em->getReference('NitraGeoBundle:Region', 69)); 
//		$city3745->setName('Янаул');
//		$manager->persist($city3745); 
//
//		$city3746= new City();
//		$city3746->setId(3746);
//		$city3746->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3746->setName('Аршан');
//		$manager->persist($city3746); 
//
//		$city3747= new City();
//		$city3747->setId(3747);
//		$city3747->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3747->setName('Багдарин');
//		$manager->persist($city3747); 
//
//		$city3748= new City();
//		$city3748->setId(3748);
//		$city3748->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3748->setName('Баргузин');
//		$manager->persist($city3748); 
//
//		$city3749= new City();
//		$city3749->setId(3749);
//		$city3749->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3749->setName('Бичура');
//		$manager->persist($city3749); 
//
//		$city3750= new City();
//		$city3750->setId(3750);
//		$city3750->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3750->setName('Гусиноозерск');
//		$manager->persist($city3750); 
//
//		$city3751= new City();
//		$city3751->setId(3751);
//		$city3751->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3751->setName('Заиграево');
//		$manager->persist($city3751); 
//
//		$city3752= new City();
//		$city3752->setId(3752);
//		$city3752->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3752->setName('Закаменск');
//		$manager->persist($city3752); 
//
//		$city3753= new City();
//		$city3753->setId(3753);
//		$city3753->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3753->setName('Иволгинск');
//		$manager->persist($city3753); 
//
//		$city3754= new City();
//		$city3754->setId(3754);
//		$city3754->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3754->setName('Илька');
//		$manager->persist($city3754); 
//
//		$city3755= new City();
//		$city3755->setId(3755);
//		$city3755->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3755->setName('Кабанск');
//		$manager->persist($city3755); 
//
//		$city3756= new City();
//		$city3756->setId(3756);
//		$city3756->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3756->setName('Карафтит');
//		$manager->persist($city3756); 
//
//		$city3757= new City();
//		$city3757->setId(3757);
//		$city3757->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3757->setName('Кижинга');
//		$manager->persist($city3757); 
//
//		$city3758= new City();
//		$city3758->setId(3758);
//		$city3758->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3758->setName('Курумкан');
//		$manager->persist($city3758); 
//
//		$city3759= new City();
//		$city3759->setId(3759);
//		$city3759->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3759->setName('Кырен');
//		$manager->persist($city3759); 
//
//		$city3760= new City();
//		$city3760->setId(3760);
//		$city3760->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3760->setName('Кяхта');
//		$manager->persist($city3760); 
//
//		$city3761= new City();
//		$city3761->setId(3761);
//		$city3761->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3761->setName('Мухоршибирь');
//		$manager->persist($city3761); 
//
//		$city3762= new City();
//		$city3762->setId(3762);
//		$city3762->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3762->setName('Нижнеангарск');
//		$manager->persist($city3762); 
//
//		$city3763= new City();
//		$city3763->setId(3763);
//		$city3763->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3763->setName('Онохой');
//		$manager->persist($city3763); 
//
//		$city3764= new City();
//		$city3764->setId(3764);
//		$city3764->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3764->setName('Орлик');
//		$manager->persist($city3764); 
//
//		$city3765= new City();
//		$city3765->setId(3765);
//		$city3765->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3765->setName('Северобайкальск');
//		$manager->persist($city3765); 
//
//		$city3766= new City();
//		$city3766->setId(3766);
//		$city3766->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3766->setName('Селенгинск');
//		$manager->persist($city3766); 
//
//		$city3767= new City();
//		$city3767->setId(3767);
//		$city3767->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3767->setName('Сосново-Озерское');
//		$manager->persist($city3767); 
//
//		$city3768= new City();
//		$city3768->setId(3768);
//		$city3768->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3768->setName('Таксимо');
//		$manager->persist($city3768); 
//
//		$city3769= new City();
//		$city3769->setId(3769);
//		$city3769->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3769->setName('Тарбагатай');
//		$manager->persist($city3769); 
//
//		$city3770= new City();
//		$city3770->setId(3770);
//		$city3770->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3770->setName('Томпа');
//		$manager->persist($city3770); 
//
//		$city3771= new City();
//		$city3771->setId(3771);
//		$city3771->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3771->setName('Турунтаево');
//		$manager->persist($city3771); 
//
//		$city3772= new City();
//		$city3772->setId(3772);
//		$city3772->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3772->setName('Уакит');
//		$manager->persist($city3772); 
//
//		$city3773= new City();
//		$city3773->setId(3773);
//		$city3773->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3773->setName('Улан-Удэ');
//		$manager->persist($city3773); 
//
//		$city3774= new City();
//		$city3774->setId(3774);
//		$city3774->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3774->setName('Улан-Удэ (Байкал)');
//		$manager->persist($city3774); 
//
//		$city3775= new City();
//		$city3775->setId(3775);
//		$city3775->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3775->setName('Усть-Баргузин');
//		$manager->persist($city3775); 
//
//		$city3776= new City();
//		$city3776->setId(3776);
//		$city3776->setRegion($this->em->getReference('NitraGeoBundle:Region', 70)); 
//		$city3776->setName('Хоринск');
//		$manager->persist($city3776); 
//
//		$city3777= new City();
//		$city3777->setId(3777);
//		$city3777->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3777->setName('Агвали');
//		$manager->persist($city3777); 
//
//		$city3778= new City();
//		$city3778->setId(3778);
//		$city3778->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3778->setName('Ахты');
//		$manager->persist($city3778); 
//
//		$city3779= new City();
//		$city3779->setId(3779);
//		$city3779->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3779->setName('Бабаюрт');
//		$manager->persist($city3779); 
//
//		$city3780= new City();
//		$city3780->setId(3780);
//		$city3780->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3780->setName('Белиджи');
//		$manager->persist($city3780); 
//
//		$city3781= new City();
//		$city3781->setId(3781);
//		$city3781->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3781->setName('Ботлих');
//		$manager->persist($city3781); 
//
//		$city3782= new City();
//		$city3782->setId(3782);
//		$city3782->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3782->setName('Буйнакск');
//		$manager->persist($city3782); 
//
//		$city3783= new City();
//		$city3783->setId(3783);
//		$city3783->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3783->setName('Гергебиль');
//		$manager->persist($city3783); 
//
//		$city3784= new City();
//		$city3784->setId(3784);
//		$city3784->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3784->setName('Гуниб');
//		$manager->persist($city3784); 
//
//		$city3785= new City();
//		$city3785->setId(3785);
//		$city3785->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3785->setName('Дагестанские Огни');
//		$manager->persist($city3785); 
//
//		$city3786= new City();
//		$city3786->setId(3786);
//		$city3786->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3786->setName('Дербент');
//		$manager->persist($city3786); 
//
//		$city3787= new City();
//		$city3787->setId(3787);
//		$city3787->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3787->setName('Дылым');
//		$manager->persist($city3787); 
//
//		$city3788= new City();
//		$city3788->setId(3788);
//		$city3788->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3788->setName('Избербаш');
//		$manager->persist($city3788); 
//
//		$city3789= new City();
//		$city3789->setId(3789);
//		$city3789->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3789->setName('Карабудахкент');
//		$manager->persist($city3789); 
//
//		$city3790= new City();
//		$city3790->setId(3790);
//		$city3790->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3790->setName('Каспийск');
//		$manager->persist($city3790); 
//
//		$city3791= new City();
//		$city3791->setId(3791);
//		$city3791->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3791->setName('Касумкент');
//		$manager->persist($city3791); 
//
//		$city3792= new City();
//		$city3792->setId(3792);
//		$city3792->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3792->setName('Каякент');
//		$manager->persist($city3792); 
//
//		$city3793= new City();
//		$city3793->setId(3793);
//		$city3793->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3793->setName('Кизилюрт');
//		$manager->persist($city3793); 
//
//		$city3794= new City();
//		$city3794->setId(3794);
//		$city3794->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3794->setName('Кизляр');
//		$manager->persist($city3794); 
//
//		$city3795= new City();
//		$city3795->setId(3795);
//		$city3795->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3795->setName('Кумух');
//		$manager->persist($city3795); 
//
//		$city3796= new City();
//		$city3796->setId(3796);
//		$city3796->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3796->setName('Курах');
//		$manager->persist($city3796); 
//
//		$city3797= new City();
//		$city3797->setId(3797);
//		$city3797->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3797->setName('Леваши');
//		$manager->persist($city3797); 
//
//		$city3798= new City();
//		$city3798->setId(3798);
//		$city3798->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3798->setName('Ленинкент');
//		$manager->persist($city3798); 
//
//		$city3799= new City();
//		$city3799->setId(3799);
//		$city3799->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3799->setName('Маджалис');
//		$manager->persist($city3799); 
//
//		$city3800= new City();
//		$city3800->setId(3800);
//		$city3800->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3800->setName('Махачкала');
//		$manager->persist($city3800); 
//
//		$city3801= new City();
//		$city3801->setId(3801);
//		$city3801->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3801->setName('Махачкала (Уйташ)');
//		$manager->persist($city3801); 
//
//		$city3802= new City();
//		$city3802->setId(3802);
//		$city3802->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3802->setName('Нижнее Казанище');
//		$manager->persist($city3802); 
//
//		$city3803= new City();
//		$city3803->setId(3803);
//		$city3803->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3803->setName('Рутул');
//		$manager->persist($city3803); 
//
//		$city3804= new City();
//		$city3804->setId(3804);
//		$city3804->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3804->setName('Сергокала');
//		$manager->persist($city3804); 
//
//		$city3805= new City();
//		$city3805->setId(3805);
//		$city3805->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3805->setName('Султан-Янги-Юрт');
//		$manager->persist($city3805); 
//
//		$city3806= new City();
//		$city3806->setId(3806);
//		$city3806->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3806->setName('Тарумовка');
//		$manager->persist($city3806); 
//
//		$city3807= new City();
//		$city3807->setId(3807);
//		$city3807->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3807->setName('Терекли-Мектеб');
//		$manager->persist($city3807); 
//
//		$city3808= new City();
//		$city3808->setId(3808);
//		$city3808->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3808->setName('Тлярата');
//		$manager->persist($city3808); 
//
//		$city3809= new City();
//		$city3809->setId(3809);
//		$city3809->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3809->setName('Уркарах');
//		$manager->persist($city3809); 
//
//		$city3810= new City();
//		$city3810->setId(3810);
//		$city3810->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3810->setName('Усухчай');
//		$manager->persist($city3810); 
//
//		$city3811= new City();
//		$city3811->setId(3811);
//		$city3811->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3811->setName('Хасавюрт');
//		$manager->persist($city3811); 
//
//		$city3812= new City();
//		$city3812->setId(3812);
//		$city3812->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3812->setName('Хив');
//		$manager->persist($city3812); 
//
//		$city3813= new City();
//		$city3813->setId(3813);
//		$city3813->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3813->setName('Хунзах');
//		$manager->persist($city3813); 
//
//		$city3814= new City();
//		$city3814->setId(3814);
//		$city3814->setRegion($this->em->getReference('NitraGeoBundle:Region', 71)); 
//		$city3814->setName('Южно-Сухокумск');
//		$manager->persist($city3814); 
//
//		$city3815= new City();
//		$city3815->setId(3815);
//		$city3815->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3815->setName('Кантышево');
//		$manager->persist($city3815); 
//
//		$city3816= new City();
//		$city3816->setId(3816);
//		$city3816->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3816->setName('Карабулак');
//		$manager->persist($city3816); 
//
//		$city3817= new City();
//		$city3817->setId(3817);
//		$city3817->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3817->setName('Магас');
//		$manager->persist($city3817); 
//
//		$city3818= new City();
//		$city3818->setId(3818);
//		$city3818->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3818->setName('Малгобек');
//		$manager->persist($city3818); 
//
//		$city3819= new City();
//		$city3819->setId(3819);
//		$city3819->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3819->setName('Назрань');
//		$manager->persist($city3819); 
//
//		$city3820= new City();
//		$city3820->setId(3820);
//		$city3820->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3820->setName('Нестеровская');
//		$manager->persist($city3820); 
//
//		$city3821= new City();
//		$city3821->setId(3821);
//		$city3821->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3821->setName('Орджоникидзевская');
//		$manager->persist($city3821); 
//
//		$city3822= new City();
//		$city3822->setId(3822);
//		$city3822->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3822->setName('Сагопши');
//		$manager->persist($city3822); 
//
//		$city3823= new City();
//		$city3823->setId(3823);
//		$city3823->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3823->setName('Сурхахи');
//		$manager->persist($city3823); 
//
//		$city3824= new City();
//		$city3824->setId(3824);
//		$city3824->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3824->setName('Троицкая');
//		$manager->persist($city3824); 
//
//		$city3825= new City();
//		$city3825->setId(3825);
//		$city3825->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3825->setName('Экажево');
//		$manager->persist($city3825); 
//
//		$city3826= new City();
//		$city3826->setId(3826);
//		$city3826->setRegion($this->em->getReference('NitraGeoBundle:Region', 72)); 
//		$city3826->setName('Яндаре');
//		$manager->persist($city3826); 
//
//		$city3827= new City();
//		$city3827->setId(3827);
//		$city3827->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3827->setName('Ики-Бурул');
//		$manager->persist($city3827); 
//
//		$city3828= new City();
//		$city3828->setId(3828);
//		$city3828->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3828->setName('Кетченеры');
//		$manager->persist($city3828); 
//
//		$city3829= new City();
//		$city3829->setId(3829);
//		$city3829->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3829->setName('Лагань');
//		$manager->persist($city3829); 
//
//		$city3830= new City();
//		$city3830->setId(3830);
//		$city3830->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3830->setName('Малые Дербеты');
//		$manager->persist($city3830); 
//
//		$city3831= new City();
//		$city3831->setId(3831);
//		$city3831->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3831->setName('Элиста');
//		$manager->persist($city3831); 
//
//		$city3832= new City();
//		$city3832->setId(3832);
//		$city3832->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3832->setName('Юста');
//		$manager->persist($city3832); 
//
//		$city3833= new City();
//		$city3833->setId(3833);
//		$city3833->setRegion($this->em->getReference('NitraGeoBundle:Region', 73)); 
//		$city3833->setName('Яшкуль');
//		$manager->persist($city3833); 
//
//		$city3834= new City();
//		$city3834->setId(3834);
//		$city3834->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3834->setName('Беломорск');
//		$manager->persist($city3834); 
//
//		$city3835= new City();
//		$city3835->setId(3835);
//		$city3835->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3835->setName('Калевала');
//		$manager->persist($city3835); 
//
//		$city3836= new City();
//		$city3836->setId(3836);
//		$city3836->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3836->setName('Кемь-Порт');
//		$manager->persist($city3836); 
//
//		$city3837= new City();
//		$city3837->setId(3837);
//		$city3837->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3837->setName('Кондопога');
//		$manager->persist($city3837); 
//
//		$city3838= new City();
//		$city3838->setId(3838);
//		$city3838->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3838->setName('Костомукша');
//		$manager->persist($city3838); 
//
//		$city3839= new City();
//		$city3839->setId(3839);
//		$city3839->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3839->setName('Лахденпохья');
//		$manager->persist($city3839); 
//
//		$city3840= new City();
//		$city3840->setId(3840);
//		$city3840->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3840->setName('Медвежьегорск');
//		$manager->persist($city3840); 
//
//		$city3841= new City();
//		$city3841->setId(3841);
//		$city3841->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3841->setName('Надвоицы');
//		$manager->persist($city3841); 
//
//		$city3842= new City();
//		$city3842->setId(3842);
//		$city3842->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3842->setName('Олонец');
//		$manager->persist($city3842); 
//
//		$city3843= new City();
//		$city3843->setId(3843);
//		$city3843->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3843->setName('Петрозаводск');
//		$manager->persist($city3843); 
//
//		$city3844= new City();
//		$city3844->setId(3844);
//		$city3844->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3844->setName('Питкяранта');
//		$manager->persist($city3844); 
//
//		$city3845= new City();
//		$city3845->setId(3845);
//		$city3845->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3845->setName('Пряжа');
//		$manager->persist($city3845); 
//
//		$city3846= new City();
//		$city3846->setId(3846);
//		$city3846->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3846->setName('Пудож');
//		$manager->persist($city3846); 
//
//		$city3847= new City();
//		$city3847->setId(3847);
//		$city3847->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3847->setName('Сегежа');
//		$manager->persist($city3847); 
//
//		$city3848= new City();
//		$city3848->setId(3848);
//		$city3848->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3848->setName('Сортавала');
//		$manager->persist($city3848); 
//
//		$city3849= new City();
//		$city3849->setId(3849);
//		$city3849->setRegion($this->em->getReference('NitraGeoBundle:Region', 74)); 
//		$city3849->setName('Суоярви');
//		$manager->persist($city3849); 
//
//		$city3850= new City();
//		$city3850->setId(3850);
//		$city3850->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3850->setName('Вендинга');
//		$manager->persist($city3850); 
//
//		$city3851= new City();
//		$city3851->setId(3851);
//		$city3851->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3851->setName('Воргашор');
//		$manager->persist($city3851); 
//
//		$city3852= new City();
//		$city3852->setId(3852);
//		$city3852->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3852->setName('Воркута');
//		$manager->persist($city3852); 
//
//		$city3853= new City();
//		$city3853->setId(3853);
//		$city3853->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3853->setName('Вуктыл');
//		$manager->persist($city3853); 
//
//		$city3854= new City();
//		$city3854->setId(3854);
//		$city3854->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3854->setName('Выльгорт');
//		$manager->persist($city3854); 
//
//		$city3855= new City();
//		$city3855->setId(3855);
//		$city3855->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3855->setName('Емва');
//		$manager->persist($city3855); 
//
//		$city3856= new City();
//		$city3856->setId(3856);
//		$city3856->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3856->setName('Ижма');
//		$manager->persist($city3856); 
//
//		$city3857= new City();
//		$city3857->setId(3857);
//		$city3857->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3857->setName('Инта');
//		$manager->persist($city3857); 
//
//		$city3858= new City();
//		$city3858->setId(3858);
//		$city3858->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3858->setName('Кажим');
//		$manager->persist($city3858); 
//
//		$city3859= new City();
//		$city3859->setId(3859);
//		$city3859->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3859->setName('Койгородок');
//		$manager->persist($city3859); 
//
//		$city3860= new City();
//		$city3860->setId(3860);
//		$city3860->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3860->setName('Кослан');
//		$manager->persist($city3860); 
//
//		$city3861= new City();
//		$city3861->setId(3861);
//		$city3861->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3861->setName('Микунь');
//		$manager->persist($city3861); 
//
//		$city3862= new City();
//		$city3862->setId(3862);
//		$city3862->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3862->setName('Нижний Одес');
//		$manager->persist($city3862); 
//
//		$city3863= new City();
//		$city3863->setId(3863);
//		$city3863->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3863->setName('Обьячево');
//		$manager->persist($city3863); 
//
//		$city3864= new City();
//		$city3864->setId(3864);
//		$city3864->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3864->setName('Печора');
//		$manager->persist($city3864); 
//
//		$city3865= new City();
//		$city3865->setId(3865);
//		$city3865->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3865->setName('Сосногорск');
//		$manager->persist($city3865); 
//
//		$city3866= new City();
//		$city3866->setId(3866);
//		$city3866->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3866->setName('Сыктывкар');
//		$manager->persist($city3866); 
//
//		$city3867= new City();
//		$city3867->setId(3867);
//		$city3867->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3867->setName('Троицко-Печорск');
//		$manager->persist($city3867); 
//
//		$city3868= new City();
//		$city3868->setId(3868);
//		$city3868->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3868->setName('Усинск');
//		$manager->persist($city3868); 
//
//		$city3869= new City();
//		$city3869->setId(3869);
//		$city3869->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3869->setName('Усть-Кулом');
//		$manager->persist($city3869); 
//
//		$city3870= new City();
//		$city3870->setId(3870);
//		$city3870->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3870->setName('Усть-Цильма');
//		$manager->persist($city3870); 
//
//		$city3871= new City();
//		$city3871->setId(3871);
//		$city3871->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3871->setName('Ухта');
//		$manager->persist($city3871); 
//
//		$city3872= new City();
//		$city3872->setId(3872);
//		$city3872->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3872->setName('Щельяюр');
//		$manager->persist($city3872); 
//
//		$city3873= new City();
//		$city3873->setId(3873);
//		$city3873->setRegion($this->em->getReference('NitraGeoBundle:Region', 75)); 
//		$city3873->setName('Якша');
//		$manager->persist($city3873); 
//
//		$city3874= new City();
//		$city3874->setId(3874);
//		$city3874->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3874->setName('Волжск');
//		$manager->persist($city3874); 
//
//		$city3875= new City();
//		$city3875->setId(3875);
//		$city3875->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3875->setName('Звенигово');
//		$manager->persist($city3875); 
//
//		$city3876= new City();
//		$city3876->setId(3876);
//		$city3876->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3876->setName('Йошкар-Ола');
//		$manager->persist($city3876); 
//
//		$city3877= new City();
//		$city3877->setId(3877);
//		$city3877->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3877->setName('Козьмодемьянск');
//		$manager->persist($city3877); 
//
//		$city3878= new City();
//		$city3878->setId(3878);
//		$city3878->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3878->setName('Куженер');
//		$manager->persist($city3878); 
//
//		$city3879= new City();
//		$city3879->setId(3879);
//		$city3879->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3879->setName('Медведево');
//		$manager->persist($city3879); 
//
//		$city3880= new City();
//		$city3880->setId(3880);
//		$city3880->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3880->setName('Морки');
//		$manager->persist($city3880); 
//
//		$city3881= new City();
//		$city3881->setId(3881);
//		$city3881->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3881->setName('Новый Торьял');
//		$manager->persist($city3881); 
//
//		$city3882= new City();
//		$city3882->setId(3882);
//		$city3882->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3882->setName('Параньга');
//		$manager->persist($city3882); 
//
//		$city3883= new City();
//		$city3883->setId(3883);
//		$city3883->setRegion($this->em->getReference('NitraGeoBundle:Region', 76)); 
//		$city3883->setName('Сернур');
//		$manager->persist($city3883); 
//
//		$city3884= new City();
//		$city3884->setId(3884);
//		$city3884->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3884->setName('Атяшево');
//		$manager->persist($city3884); 
//
//		$city3885= new City();
//		$city3885->setId(3885);
//		$city3885->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3885->setName('Большие Березники');
//		$manager->persist($city3885); 
//
//		$city3886= new City();
//		$city3886->setId(3886);
//		$city3886->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3886->setName('Большое Игнатово');
//		$manager->persist($city3886); 
//
//		$city3887= new City();
//		$city3887->setId(3887);
//		$city3887->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3887->setName('Дубенки');
//		$manager->persist($city3887); 
//
//		$city3888= new City();
//		$city3888->setId(3888);
//		$city3888->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3888->setName('Зубова Поляна');
//		$manager->persist($city3888); 
//
//		$city3889= new City();
//		$city3889->setId(3889);
//		$city3889->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3889->setName('Инсар');
//		$manager->persist($city3889); 
//
//		$city3890= new City();
//		$city3890->setId(3890);
//		$city3890->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3890->setName('Кемля');
//		$manager->persist($city3890); 
//
//		$city3891= new City();
//		$city3891->setId(3891);
//		$city3891->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3891->setName('Ковылкино');
//		$manager->persist($city3891); 
//
//		$city3892= new City();
//		$city3892->setId(3892);
//		$city3892->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3892->setName('Рузаевка');
//		$manager->persist($city3892); 
//
//		$city3893= new City();
//		$city3893->setId(3893);
//		$city3893->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3893->setName('Саранск');
//		$manager->persist($city3893); 
//
//		$city3894= new City();
//		$city3894->setId(3894);
//		$city3894->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3894->setName('Старое Шайгово');
//		$manager->persist($city3894); 
//
//		$city3895= new City();
//		$city3895->setId(3895);
//		$city3895->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3895->setName('Темников');
//		$manager->persist($city3895); 
//
//		$city3896= new City();
//		$city3896->setId(3896);
//		$city3896->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3896->setName('Теньгушево');
//		$manager->persist($city3896); 
//
//		$city3897= new City();
//		$city3897->setId(3897);
//		$city3897->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3897->setName('Торбеево');
//		$manager->persist($city3897); 
//
//		$city3898= new City();
//		$city3898->setId(3898);
//		$city3898->setRegion($this->em->getReference('NitraGeoBundle:Region', 77)); 
//		$city3898->setName('Чамзинка');
//		$manager->persist($city3898); 
//
//		$city3899= new City();
//		$city3899->setId(3899);
//		$city3899->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3899->setName('Айхал');
//		$manager->persist($city3899); 
//
//		$city3900= new City();
//		$city3900->setId(3900);
//		$city3900->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3900->setName('Алдан');
//		$manager->persist($city3900); 
//
//		$city3901= new City();
//		$city3901->setId(3901);
//		$city3901->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3901->setName('Аллах-Юнь');
//		$manager->persist($city3901); 
//
//		$city3902= new City();
//		$city3902->setId(3902);
//		$city3902->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3902->setName('Амга');
//		$manager->persist($city3902); 
//
//		$city3903= new City();
//		$city3903->setId(3903);
//		$city3903->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3903->setName('Батагай');
//		$manager->persist($city3903); 
//
//		$city3904= new City();
//		$city3904->setId(3904);
//		$city3904->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3904->setName('Батагай-Алыта');
//		$manager->persist($city3904); 
//
//		$city3905= new City();
//		$city3905->setId(3905);
//		$city3905->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3905->setName('Бердигестях');
//		$manager->persist($city3905); 
//
//		$city3906= new City();
//		$city3906->setId(3906);
//		$city3906->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3906->setName('Борогонцы');
//		$manager->persist($city3906); 
//
//		$city3907= new City();
//		$city3907->setId(3907);
//		$city3907->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3907->setName('Верхневилюйск');
//		$manager->persist($city3907); 
//
//		$city3908= new City();
//		$city3908->setId(3908);
//		$city3908->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3908->setName('Верхоянск');
//		$manager->persist($city3908); 
//
//		$city3909= new City();
//		$city3909->setId(3909);
//		$city3909->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3909->setName('Вилюйск');
//		$manager->persist($city3909); 
//
//		$city3910= new City();
//		$city3910->setId(3910);
//		$city3910->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3910->setName('Витим');
//		$manager->persist($city3910); 
//
//		$city3911= new City();
//		$city3911->setId(3911);
//		$city3911->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3911->setName('Депутатский');
//		$manager->persist($city3911); 
//
//		$city3912= new City();
//		$city3912->setId(3912);
//		$city3912->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3912->setName('Жиганск');
//		$manager->persist($city3912); 
//
//		$city3913= new City();
//		$city3913->setId(3913);
//		$city3913->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3913->setName('Зырянка');
//		$manager->persist($city3913); 
//
//		$city3914= new City();
//		$city3914->setId(3914);
//		$city3914->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3914->setName('Кутана');
//		$manager->persist($city3914); 
//
//		$city3915= new City();
//		$city3915->setId(3915);
//		$city3915->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3915->setName('Ленск');
//		$manager->persist($city3915); 
//
//		$city3916= new City();
//		$city3916->setId(3916);
//		$city3916->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3916->setName('Маган');
//		$manager->persist($city3916); 
//
//		$city3917= new City();
//		$city3917->setId(3917);
//		$city3917->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3917->setName('Майя');
//		$manager->persist($city3917); 
//
//		$city3918= new City();
//		$city3918->setId(3918);
//		$city3918->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3918->setName('Намцы');
//		$manager->persist($city3918); 
//
//		$city3919= new City();
//		$city3919->setId(3919);
//		$city3919->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3919->setName('Нерюнгри');
//		$manager->persist($city3919); 
//
//		$city3920= new City();
//		$city3920->setId(3920);
//		$city3920->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3920->setName('Нерюнгри (Чульман)');
//		$manager->persist($city3920); 
//
//		$city3921= new City();
//		$city3921->setId(3921);
//		$city3921->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3921->setName('Нижний Бестях');
//		$manager->persist($city3921); 
//
//		$city3922= new City();
//		$city3922->setId(3922);
//		$city3922->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3922->setName('Нюрба');
//		$manager->persist($city3922); 
//
//		$city3923= new City();
//		$city3923->setId(3923);
//		$city3923->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3923->setName('Оймякон');
//		$manager->persist($city3923); 
//
//		$city3924= new City();
//		$city3924->setId(3924);
//		$city3924->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3924->setName('Олекминск');
//		$manager->persist($city3924); 
//
//		$city3925= new City();
//		$city3925->setId(3925);
//		$city3925->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3925->setName('Оленек');
//		$manager->persist($city3925); 
//
//		$city3926= new City();
//		$city3926->setId(3926);
//		$city3926->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3926->setName('Покровск');
//		$manager->persist($city3926); 
//
//		$city3927= new City();
//		$city3927->setId(3927);
//		$city3927->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3927->setName('Сангар');
//		$manager->persist($city3927); 
//
//		$city3928= new City();
//		$city3928->setId(3928);
//		$city3928->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3928->setName('Саскылах');
//		$manager->persist($city3928); 
//
//		$city3929= new City();
//		$city3929->setId(3929);
//		$city3929->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3929->setName('Среднеколымск');
//		$manager->persist($city3929); 
//
//		$city3930= new City();
//		$city3930->setId(3930);
//		$city3930->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3930->setName('Сунтар');
//		$manager->persist($city3930); 
//
//		$city3931= new City();
//		$city3931->setId(3931);
//		$city3931->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3931->setName('Тикси');
//		$manager->persist($city3931); 
//
//		$city3932= new City();
//		$city3932->setId(3932);
//		$city3932->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3932->setName('Томмот');
//		$manager->persist($city3932); 
//
//		$city3933= new City();
//		$city3933->setId(3933);
//		$city3933->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3933->setName('Томпо');
//		$manager->persist($city3933); 
//
//		$city3934= new City();
//		$city3934->setId(3934);
//		$city3934->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3934->setName('Удачный');
//		$manager->persist($city3934); 
//
//		$city3935= new City();
//		$city3935->setId(3935);
//		$city3935->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3935->setName('Усть-Мая');
//		$manager->persist($city3935); 
//
//		$city3936= new City();
//		$city3936->setId(3936);
//		$city3936->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3936->setName('Усть-Нера');
//		$manager->persist($city3936); 
//
//		$city3937= new City();
//		$city3937->setId(3937);
//		$city3937->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3937->setName('Черский');
//		$manager->persist($city3937); 
//
//		$city3938= new City();
//		$city3938->setId(3938);
//		$city3938->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3938->setName('Чокурдах');
//		$manager->persist($city3938); 
//
//		$city3939= new City();
//		$city3939->setId(3939);
//		$city3939->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3939->setName('Чурапча');
//		$manager->persist($city3939); 
//
//		$city3940= new City();
//		$city3940->setId(3940);
//		$city3940->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3940->setName('Чыаппара');
//		$manager->persist($city3940); 
//
//		$city3941= new City();
//		$city3941->setId(3941);
//		$city3941->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3941->setName('Шелагонцы');
//		$manager->persist($city3941); 
//
//		$city3942= new City();
//		$city3942->setId(3942);
//		$city3942->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3942->setName('Ытык-Кюёль');
//		$manager->persist($city3942); 
//
//		$city3943= new City();
//		$city3943->setId(3943);
//		$city3943->setRegion($this->em->getReference('NitraGeoBundle:Region', 78)); 
//		$city3943->setName('Якутск');
//		$manager->persist($city3943); 
//
//		$city3944= new City();
//		$city3944->setId(3944);
//		$city3944->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3944->setName('Алагир');
//		$manager->persist($city3944); 
//
//		$city3945= new City();
//		$city3945->setId(3945);
//		$city3945->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3945->setName('Ардон');
//		$manager->persist($city3945); 
//
//		$city3946= new City();
//		$city3946->setId(3946);
//		$city3946->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3946->setName('Беслан');
//		$manager->persist($city3946); 
//
//		$city3947= new City();
//		$city3947->setId(3947);
//		$city3947->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3947->setName('Владикавказ');
//		$manager->persist($city3947); 
//
//		$city3948= new City();
//		$city3948->setId(3948);
//		$city3948->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3948->setName('Дигора');
//		$manager->persist($city3948); 
//
//		$city3949= new City();
//		$city3949->setId(3949);
//		$city3949->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3949->setName('Заводской');
//		$manager->persist($city3949); 
//
//		$city3950= new City();
//		$city3950->setId(3950);
//		$city3950->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3950->setName('Моздок');
//		$manager->persist($city3950); 
//
//		$city3951= new City();
//		$city3951->setId(3951);
//		$city3951->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3951->setName('Ногир');
//		$manager->persist($city3951); 
//
//		$city3952= new City();
//		$city3952->setId(3952);
//		$city3952->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3952->setName('Сунжа');
//		$manager->persist($city3952); 
//
//		$city3953= new City();
//		$city3953->setId(3953);
//		$city3953->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3953->setName('Чикола');
//		$manager->persist($city3953); 
//
//		$city3954= new City();
//		$city3954->setId(3954);
//		$city3954->setRegion($this->em->getReference('NitraGeoBundle:Region', 79)); 
//		$city3954->setName('Эльхотово');
//		$manager->persist($city3954); 
//
//		$city3955= new City();
//		$city3955->setId(3955);
//		$city3955->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3955->setName('Агрыз');
//		$manager->persist($city3955); 
//
//		$city3956= new City();
//		$city3956->setId(3956);
//		$city3956->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3956->setName('Азнакаево');
//		$manager->persist($city3956); 
//
//		$city3957= new City();
//		$city3957->setId(3957);
//		$city3957->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3957->setName('Аксубаево');
//		$manager->persist($city3957); 
//
//		$city3958= new City();
//		$city3958->setId(3958);
//		$city3958->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3958->setName('Акташ');
//		$manager->persist($city3958); 
//
//		$city3959= new City();
//		$city3959->setId(3959);
//		$city3959->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3959->setName('Альметьевск');
//		$manager->persist($city3959); 
//
//		$city3960= new City();
//		$city3960->setId(3960);
//		$city3960->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3960->setName('Арск');
//		$manager->persist($city3960); 
//
//		$city3961= new City();
//		$city3961->setId(3961);
//		$city3961->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3961->setName('Бавлы');
//		$manager->persist($city3961); 
//
//		$city3962= new City();
//		$city3962->setId(3962);
//		$city3962->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3962->setName('Базарные Матаки');
//		$manager->persist($city3962); 
//
//		$city3963= new City();
//		$city3963->setId(3963);
//		$city3963->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3963->setName('Балтаси');
//		$manager->persist($city3963); 
//
//		$city3964= new City();
//		$city3964->setId(3964);
//		$city3964->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3964->setName('Болгар');
//		$manager->persist($city3964); 
//
//		$city3965= new City();
//		$city3965->setId(3965);
//		$city3965->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3965->setName('Большая Атня');
//		$manager->persist($city3965); 
//
//		$city3966= new City();
//		$city3966->setId(3966);
//		$city3966->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3966->setName('Бугульма');
//		$manager->persist($city3966); 
//
//		$city3967= new City();
//		$city3967->setId(3967);
//		$city3967->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3967->setName('Буинск');
//		$manager->persist($city3967); 
//
//		$city3968= new City();
//		$city3968->setId(3968);
//		$city3968->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3968->setName('Васильево');
//		$manager->persist($city3968); 
//
//		$city3969= new City();
//		$city3969->setId(3969);
//		$city3969->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3969->setName('Верхний Услон');
//		$manager->persist($city3969); 
//
//		$city3970= new City();
//		$city3970->setId(3970);
//		$city3970->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3970->setName('Джалиль');
//		$manager->persist($city3970); 
//
//		$city3971= new City();
//		$city3971->setId(3971);
//		$city3971->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3971->setName('Дрожжаное');
//		$manager->persist($city3971); 
//
//		$city3972= new City();
//		$city3972->setId(3972);
//		$city3972->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3972->setName('Елабуга');
//		$manager->persist($city3972); 
//
//		$city3973= new City();
//		$city3973->setId(3973);
//		$city3973->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3973->setName('Заинск');
//		$manager->persist($city3973); 
//
//		$city3974= new City();
//		$city3974->setId(3974);
//		$city3974->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3974->setName('Казань');
//		$manager->persist($city3974); 
//
//		$city3975= new City();
//		$city3975->setId(3975);
//		$city3975->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3975->setName('Камские Поляны');
//		$manager->persist($city3975); 
//
//		$city3976= new City();
//		$city3976->setId(3976);
//		$city3976->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3976->setName('Камское Устье');
//		$manager->persist($city3976); 
//
//		$city3977= new City();
//		$city3977->setId(3977);
//		$city3977->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3977->setName('Кукмор');
//		$manager->persist($city3977); 
//
//		$city3978= new City();
//		$city3978->setId(3978);
//		$city3978->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3978->setName('Лаишево');
//		$manager->persist($city3978); 
//
//		$city3979= new City();
//		$city3979->setId(3979);
//		$city3979->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3979->setName('Лениногорск');
//		$manager->persist($city3979); 
//
//		$city3980= new City();
//		$city3980->setId(3980);
//		$city3980->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3980->setName('Мамадыш');
//		$manager->persist($city3980); 
//
//		$city3981= new City();
//		$city3981->setId(3981);
//		$city3981->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3981->setName('Менделеевск');
//		$manager->persist($city3981); 
//
//		$city3982= new City();
//		$city3982->setId(3982);
//		$city3982->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3982->setName('Мензелинск');
//		$manager->persist($city3982); 
//
//		$city3983= new City();
//		$city3983->setId(3983);
//		$city3983->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3983->setName('Муслюмово');
//		$manager->persist($city3983); 
//
//		$city3984= new City();
//		$city3984->setId(3984);
//		$city3984->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3984->setName('Набережные Челны');
//		$manager->persist($city3984); 
//
//		$city3985= new City();
//		$city3985->setId(3985);
//		$city3985->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3985->setName('Нижнекамск');
//		$manager->persist($city3985); 
//
//		$city3986= new City();
//		$city3986->setId(3986);
//		$city3986->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3986->setName('Нижнекамск (Бегишево)');
//		$manager->persist($city3986); 
//
//		$city3987= new City();
//		$city3987->setId(3987);
//		$city3987->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3987->setName('Нижняя Мактама');
//		$manager->persist($city3987); 
//
//		$city3988= new City();
//		$city3988->setId(3988);
//		$city3988->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3988->setName('Нурлат');
//		$manager->persist($city3988); 
//
//		$city3989= new City();
//		$city3989->setId(3989);
//		$city3989->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3989->setName('Олуяз');
//		$manager->persist($city3989); 
//
//		$city3990= new City();
//		$city3990->setId(3990);
//		$city3990->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3990->setName('Рыбная Слобода');
//		$manager->persist($city3990); 
//
//		$city3991= new City();
//		$city3991->setId(3991);
//		$city3991->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3991->setName('Сарманово');
//		$manager->persist($city3991); 
//
//		$city3992= new City();
//		$city3992->setId(3992);
//		$city3992->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3992->setName('Тетюши');
//		$manager->persist($city3992); 
//
//		$city3993= new City();
//		$city3993->setId(3993);
//		$city3993->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3993->setName('Тюлячи');
//		$manager->persist($city3993); 
//
//		$city3994= new City();
//		$city3994->setId(3994);
//		$city3994->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3994->setName('Уруссу');
//		$manager->persist($city3994); 
//
//		$city3995= new City();
//		$city3995->setId(3995);
//		$city3995->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3995->setName('Черемшан');
//		$manager->persist($city3995); 
//
//		$city3996= new City();
//		$city3996->setId(3996);
//		$city3996->setRegion($this->em->getReference('NitraGeoBundle:Region', 80)); 
//		$city3996->setName('Чистополь');
//		$manager->persist($city3996); 
//
//		$city3997= new City();
//		$city3997->setId(3997);
//		$city3997->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city3997->setName('Ак-Довурак');
//		$manager->persist($city3997); 
//
//		$city3998= new City();
//		$city3998->setId(3998);
//		$city3998->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city3998->setName('Каа-Хем');
//		$manager->persist($city3998); 
//
//		$city3999= new City();
//		$city3999->setId(3999);
//		$city3999->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city3999->setName('Кунгуртуг');
//		$manager->persist($city3999); 
//
//		$city4000= new City();
//		$city4000->setId(4000);
//		$city4000->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4000->setName('Кызыл');
//		$manager->persist($city4000); 
//
//		$city4001= new City();
//		$city4001->setId(4001);
//		$city4001->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4001->setName('Кызыл-Мажалык');
//		$manager->persist($city4001); 
//
//		$city4002= new City();
//		$city4002->setId(4002);
//		$city4002->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4002->setName('Мугур-Аксы');
//		$manager->persist($city4002); 
//
//		$city4003= new City();
//		$city4003->setId(4003);
//		$city4003->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4003->setName('Новый Чаа-Холь');
//		$manager->persist($city4003); 
//
//		$city4004= new City();
//		$city4004->setId(4004);
//		$city4004->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4004->setName('Сарыг-Сеп');
//		$manager->persist($city4004); 
//
//		$city4005= new City();
//		$city4005->setId(4005);
//		$city4005->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4005->setName('Тоора-Хем');
//		$manager->persist($city4005); 
//
//		$city4006= new City();
//		$city4006->setId(4006);
//		$city4006->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4006->setName('Туран');
//		$manager->persist($city4006); 
//
//		$city4007= new City();
//		$city4007->setId(4007);
//		$city4007->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4007->setName('Тэли');
//		$manager->persist($city4007); 
//
//		$city4008= new City();
//		$city4008->setId(4008);
//		$city4008->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4008->setName('Хандагайты');
//		$manager->persist($city4008); 
//
//		$city4009= new City();
//		$city4009->setId(4009);
//		$city4009->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4009->setName('Хову-Аксы');
//		$manager->persist($city4009); 
//
//		$city4010= new City();
//		$city4010->setId(4010);
//		$city4010->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4010->setName('Чадан');
//		$manager->persist($city4010); 
//
//		$city4011= new City();
//		$city4011->setId(4011);
//		$city4011->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4011->setName('Шагонар');
//		$manager->persist($city4011); 
//
//		$city4012= new City();
//		$city4012->setId(4012);
//		$city4012->setRegion($this->em->getReference('NitraGeoBundle:Region', 81)); 
//		$city4012->setName('Эрзин');
//		$manager->persist($city4012); 
//
//		$city4013= new City();
//		$city4013->setId(4013);
//		$city4013->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4013->setName('Абаза');
//		$manager->persist($city4013); 
//
//		$city4014= new City();
//		$city4014->setId(4014);
//		$city4014->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4014->setName('Абакан');
//		$manager->persist($city4014); 
//
//		$city4015= new City();
//		$city4015->setId(4015);
//		$city4015->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4015->setName('Аскиз');
//		$manager->persist($city4015); 
//
//		$city4016= new City();
//		$city4016->setId(4016);
//		$city4016->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4016->setName('Бея');
//		$manager->persist($city4016); 
//
//		$city4017= new City();
//		$city4017->setId(4017);
//		$city4017->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4017->setName('Боград');
//		$manager->persist($city4017); 
//
//		$city4018= new City();
//		$city4018->setId(4018);
//		$city4018->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4018->setName('Вершина Тёи');
//		$manager->persist($city4018); 
//
//		$city4019= new City();
//		$city4019->setId(4019);
//		$city4019->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4019->setName('Гладенькая');
//		$manager->persist($city4019); 
//
//		$city4020= new City();
//		$city4020->setId(4020);
//		$city4020->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4020->setName('Копьево');
//		$manager->persist($city4020); 
//
//		$city4021= new City();
//		$city4021->setId(4021);
//		$city4021->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4021->setName('Саяногорск');
//		$manager->persist($city4021); 
//
//		$city4022= new City();
//		$city4022->setId(4022);
//		$city4022->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4022->setName('Сорск');
//		$manager->persist($city4022); 
//
//		$city4023= new City();
//		$city4023->setId(4023);
//		$city4023->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4023->setName('Таштып');
//		$manager->persist($city4023); 
//
//		$city4024= new City();
//		$city4024->setId(4024);
//		$city4024->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4024->setName('Усть-Абакан');
//		$manager->persist($city4024); 
//
//		$city4025= new City();
//		$city4025->setId(4025);
//		$city4025->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4025->setName('Черногорск');
//		$manager->persist($city4025); 
//
//		$city4026= new City();
//		$city4026->setId(4026);
//		$city4026->setRegion($this->em->getReference('NitraGeoBundle:Region', 82)); 
//		$city4026->setName('Шира');
//		$manager->persist($city4026); 
//
//		$city4027= new City();
//		$city4027->setId(4027);
//		$city4027->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4027->setName('Азов');
//		$manager->persist($city4027); 
//
//		$city4028= new City();
//		$city4028->setId(4028);
//		$city4028->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4028->setName('Аксай');
//		$manager->persist($city4028); 
//
//		$city4029= new City();
//		$city4029->setId(4029);
//		$city4029->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4029->setName('Аютинский');
//		$manager->persist($city4029); 
//
//		$city4030= new City();
//		$city4030->setId(4030);
//		$city4030->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4030->setName('Багаевская');
//		$manager->persist($city4030); 
//
//		$city4031= new City();
//		$city4031->setId(4031);
//		$city4031->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4031->setName('Батайск');
//		$manager->persist($city4031); 
//
//		$city4032= new City();
//		$city4032->setId(4032);
//		$city4032->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4032->setName('Белая Калитва');
//		$manager->persist($city4032); 
//
//		$city4033= new City();
//		$city4033->setId(4033);
//		$city4033->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4033->setName('Боковская');
//		$manager->persist($city4033); 
//
//		$city4034= new City();
//		$city4034->setId(4034);
//		$city4034->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4034->setName('Веселый');
//		$manager->persist($city4034); 
//
//		$city4035= new City();
//		$city4035->setId(4035);
//		$city4035->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4035->setName('Вешенская');
//		$manager->persist($city4035); 
//
//		$city4036= new City();
//		$city4036->setId(4036);
//		$city4036->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4036->setName('Волгодонск');
//		$manager->persist($city4036); 
//
//		$city4037= new City();
//		$city4037->setId(4037);
//		$city4037->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4037->setName('Гигант');
//		$manager->persist($city4037); 
//
//		$city4038= new City();
//		$city4038->setId(4038);
//		$city4038->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4038->setName('Гуково');
//		$manager->persist($city4038); 
//
//		$city4039= new City();
//		$city4039->setId(4039);
//		$city4039->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4039->setName('Донской');
//		$manager->persist($city4039); 
//
//		$city4040= new City();
//		$city4040->setId(4040);
//		$city4040->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4040->setName('Егорлыкская');
//		$manager->persist($city4040); 
//
//		$city4041= new City();
//		$city4041->setId(4041);
//		$city4041->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4041->setName('Заветное');
//		$manager->persist($city4041); 
//
//		$city4042= new City();
//		$city4042->setId(4042);
//		$city4042->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4042->setName('Зверево');
//		$manager->persist($city4042); 
//
//		$city4043= new City();
//		$city4043->setId(4043);
//		$city4043->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4043->setName('Зерноград');
//		$manager->persist($city4043); 
//
//		$city4044= new City();
//		$city4044->setId(4044);
//		$city4044->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4044->setName('Зимовники');
//		$manager->persist($city4044); 
//
//		$city4045= new City();
//		$city4045->setId(4045);
//		$city4045->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4045->setName('Каменоломни');
//		$manager->persist($city4045); 
//
//		$city4046= new City();
//		$city4046->setId(4046);
//		$city4046->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4046->setName('Каменск-Шахтинский');
//		$manager->persist($city4046); 
//
//		$city4047= new City();
//		$city4047->setId(4047);
//		$city4047->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4047->setName('Кашары');
//		$manager->persist($city4047); 
//
//		$city4048= new City();
//		$city4048->setId(4048);
//		$city4048->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4048->setName('Константиновск');
//		$manager->persist($city4048); 
//
//		$city4049= new City();
//		$city4049->setId(4049);
//		$city4049->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4049->setName('Красный Сулин');
//		$manager->persist($city4049); 
//
//		$city4050= new City();
//		$city4050->setId(4050);
//		$city4050->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4050->setName('Кривянская');
//		$manager->persist($city4050); 
//
//		$city4051= new City();
//		$city4051->setId(4051);
//		$city4051->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4051->setName('Кулешовка');
//		$manager->persist($city4051); 
//
//		$city4052= new City();
//		$city4052->setId(4052);
//		$city4052->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4052->setName('Лиховской');
//		$manager->persist($city4052); 
//
//		$city4053= new City();
//		$city4053->setId(4053);
//		$city4053->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4053->setName('Матвеев Курган');
//		$manager->persist($city4053); 
//
//		$city4054= new City();
//		$city4054->setId(4054);
//		$city4054->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4054->setName('Миллерово');
//		$manager->persist($city4054); 
//
//		$city4055= new City();
//		$city4055->setId(4055);
//		$city4055->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4055->setName('Морозовск');
//		$manager->persist($city4055); 
//
//		$city4056= new City();
//		$city4056->setId(4056);
//		$city4056->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4056->setName('Новочеркасск');
//		$manager->persist($city4056); 
//
//		$city4057= new City();
//		$city4057->setId(4057);
//		$city4057->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4057->setName('Новошахтинск');
//		$manager->persist($city4057); 
//
//		$city4058= new City();
//		$city4058->setId(4058);
//		$city4058->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4058->setName('Обливская');
//		$manager->persist($city4058); 
//
//		$city4059= new City();
//		$city4059->setId(4059);
//		$city4059->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4059->setName('Орловский');
//		$manager->persist($city4059); 
//
//		$city4060= new City();
//		$city4060->setId(4060);
//		$city4060->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4060->setName('Персиановский');
//		$manager->persist($city4060); 
//
//		$city4061= new City();
//		$city4061->setId(4061);
//		$city4061->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4061->setName('Песчанокопское');
//		$manager->persist($city4061); 
//
//		$city4062= new City();
//		$city4062->setId(4062);
//		$city4062->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4062->setName('Пролетарск');
//		$manager->persist($city4062); 
//
//		$city4063= new City();
//		$city4063->setId(4063);
//		$city4063->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4063->setName('Ремонтное');
//		$manager->persist($city4063); 
//
//		$city4064= new City();
//		$city4064->setId(4064);
//		$city4064->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4064->setName('Романовская');
//		$manager->persist($city4064); 
//
//		$city4065= new City();
//		$city4065->setId(4065);
//		$city4065->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4065->setName('Ростов-на-Дону');
//		$manager->persist($city4065); 
//
//		$city4066= new City();
//		$city4066->setId(4066);
//		$city4066->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4066->setName('Сальск');
//		$manager->persist($city4066); 
//
//		$city4067= new City();
//		$city4067->setId(4067);
//		$city4067->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4067->setName('Самарское');
//		$manager->persist($city4067); 
//
//		$city4068= new City();
//		$city4068->setId(4068);
//		$city4068->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4068->setName('Семикаракорск');
//		$manager->persist($city4068); 
//
//		$city4069= new City();
//		$city4069->setId(4069);
//		$city4069->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4069->setName('Таганрог');
//		$manager->persist($city4069); 
//
//		$city4070= new City();
//		$city4070->setId(4070);
//		$city4070->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4070->setName('Таганрог (Южный)');
//		$manager->persist($city4070); 
//
//		$city4071= new City();
//		$city4071->setId(4071);
//		$city4071->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4071->setName('Тацинская');
//		$manager->persist($city4071); 
//
//		$city4072= new City();
//		$city4072->setId(4072);
//		$city4072->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4072->setName('Усть-Донецкий');
//		$manager->persist($city4072); 
//
//		$city4073= new City();
//		$city4073->setId(4073);
//		$city4073->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4073->setName('Целина');
//		$manager->persist($city4073); 
//
//		$city4074= new City();
//		$city4074->setId(4074);
//		$city4074->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4074->setName('Цимлянск');
//		$manager->persist($city4074); 
//
//		$city4075= new City();
//		$city4075->setId(4075);
//		$city4075->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4075->setName('Чалтырь');
//		$manager->persist($city4075); 
//
//		$city4076= new City();
//		$city4076->setId(4076);
//		$city4076->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4076->setName('Чертково');
//		$manager->persist($city4076); 
//
//		$city4077= new City();
//		$city4077->setId(4077);
//		$city4077->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4077->setName('Шахты');
//		$manager->persist($city4077); 
//
//		$city4078= new City();
//		$city4078->setId(4078);
//		$city4078->setRegion($this->em->getReference('NitraGeoBundle:Region', 83)); 
//		$city4078->setName('Шолоховский');
//		$manager->persist($city4078); 
//
//		$city4079= new City();
//		$city4079->setId(4079);
//		$city4079->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4079->setName('Елатьма');
//		$manager->persist($city4079); 
//
//		$city4080= new City();
//		$city4080->setId(4080);
//		$city4080->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4080->setName('Кадом');
//		$manager->persist($city4080); 
//
//		$city4081= new City();
//		$city4081->setId(4081);
//		$city4081->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4081->setName('Касимов');
//		$manager->persist($city4081); 
//
//		$city4082= new City();
//		$city4082->setId(4082);
//		$city4082->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4082->setName('Кораблино');
//		$manager->persist($city4082); 
//
//		$city4083= new City();
//		$city4083->setId(4083);
//		$city4083->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4083->setName('Михайлов');
//		$manager->persist($city4083); 
//
//		$city4084= new City();
//		$city4084->setId(4084);
//		$city4084->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4084->setName('Новомичуринск');
//		$manager->persist($city4084); 
//
//		$city4085= new City();
//		$city4085->setId(4085);
//		$city4085->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4085->setName('Павелец');
//		$manager->persist($city4085); 
//
//		$city4086= new City();
//		$city4086->setId(4086);
//		$city4086->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4086->setName('Пителино');
//		$manager->persist($city4086); 
//
//		$city4087= new City();
//		$city4087->setId(4087);
//		$city4087->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4087->setName('Рыбное');
//		$manager->persist($city4087); 
//
//		$city4088= new City();
//		$city4088->setId(4088);
//		$city4088->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4088->setName('Ряжск');
//		$manager->persist($city4088); 
//
//		$city4089= new City();
//		$city4089->setId(4089);
//		$city4089->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4089->setName('Рязань');
//		$manager->persist($city4089); 
//
//		$city4090= new City();
//		$city4090->setId(4090);
//		$city4090->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4090->setName('Сапожок');
//		$manager->persist($city4090); 
//
//		$city4091= new City();
//		$city4091->setId(4091);
//		$city4091->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4091->setName('Сараи');
//		$manager->persist($city4091); 
//
//		$city4092= new City();
//		$city4092->setId(4092);
//		$city4092->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4092->setName('Скопин');
//		$manager->persist($city4092); 
//
//		$city4093= new City();
//		$city4093->setId(4093);
//		$city4093->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4093->setName('Спас-Клепики');
//		$manager->persist($city4093); 
//
//		$city4094= new City();
//		$city4094->setId(4094);
//		$city4094->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4094->setName('Спасск-Рязанский');
//		$manager->persist($city4094); 
//
//		$city4095= new City();
//		$city4095->setId(4095);
//		$city4095->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4095->setName('Старожилово');
//		$manager->persist($city4095); 
//
//		$city4096= new City();
//		$city4096->setId(4096);
//		$city4096->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4096->setName('Тума');
//		$manager->persist($city4096); 
//
//		$city4097= new City();
//		$city4097->setId(4097);
//		$city4097->setRegion($this->em->getReference('NitraGeoBundle:Region', 84)); 
//		$city4097->setName('Шилово');
//		$manager->persist($city4097); 
//
//		$city4098= new City();
//		$city4098->setId(4098);
//		$city4098->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4098->setName('Безенчук');
//		$manager->persist($city4098); 
//
//		$city4099= new City();
//		$city4099->setId(4099);
//		$city4099->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4099->setName('Большая Глушица');
//		$manager->persist($city4099); 
//
//		$city4100= new City();
//		$city4100->setId(4100);
//		$city4100->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4100->setName('Большая Черниговка');
//		$manager->persist($city4100); 
//
//		$city4101= new City();
//		$city4101->setId(4101);
//		$city4101->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4101->setName('Борское');
//		$manager->persist($city4101); 
//
//		$city4102= new City();
//		$city4102->setId(4102);
//		$city4102->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4102->setName('Елховка');
//		$manager->persist($city4102); 
//
//		$city4103= new City();
//		$city4103->setId(4103);
//		$city4103->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4103->setName('Жигулевск');
//		$manager->persist($city4103); 
//
//		$city4104= new City();
//		$city4104->setId(4104);
//		$city4104->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4104->setName('Исаклы');
//		$manager->persist($city4104); 
//
//		$city4105= new City();
//		$city4105->setId(4105);
//		$city4105->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4105->setName('Кинель');
//		$manager->persist($city4105); 
//
//		$city4106= new City();
//		$city4106->setId(4106);
//		$city4106->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4106->setName('Кинель-Черкассы');
//		$manager->persist($city4106); 
//
//		$city4107= new City();
//		$city4107->setId(4107);
//		$city4107->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4107->setName('Клявлино');
//		$manager->persist($city4107); 
//
//		$city4108= new City();
//		$city4108->setId(4108);
//		$city4108->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4108->setName('Кошки');
//		$manager->persist($city4108); 
//
//		$city4109= new City();
//		$city4109->setId(4109);
//		$city4109->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4109->setName('Нефтегорск');
//		$manager->persist($city4109); 
//
//		$city4110= new City();
//		$city4110->setId(4110);
//		$city4110->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4110->setName('Новокуйбышевск');
//		$manager->persist($city4110); 
//
//		$city4111= new City();
//		$city4111->setId(4111);
//		$city4111->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4111->setName('Октябрьск');
//		$manager->persist($city4111); 
//
//		$city4112= new City();
//		$city4112->setId(4112);
//		$city4112->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4112->setName('Отрадный');
//		$manager->persist($city4112); 
//
//		$city4113= new City();
//		$city4113->setId(4113);
//		$city4113->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4113->setName('Пестравка');
//		$manager->persist($city4113); 
//
//		$city4114= new City();
//		$city4114->setId(4114);
//		$city4114->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4114->setName('Похвистнево');
//		$manager->persist($city4114); 
//
//		$city4115= new City();
//		$city4115->setId(4115);
//		$city4115->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4115->setName('Прибрежный');
//		$manager->persist($city4115); 
//
//		$city4116= new City();
//		$city4116->setId(4116);
//		$city4116->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4116->setName('Рощинский');
//		$manager->persist($city4116); 
//
//		$city4117= new City();
//		$city4117->setId(4117);
//		$city4117->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4117->setName('Самара');
//		$manager->persist($city4117); 
//
//		$city4118= new City();
//		$city4118->setId(4118);
//		$city4118->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4118->setName('Самара (Курумоч)');
//		$manager->persist($city4118); 
//
//		$city4119= new City();
//		$city4119->setId(4119);
//		$city4119->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4119->setName('Самара (Смышляевка)');
//		$manager->persist($city4119); 
//
//		$city4120= new City();
//		$city4120->setId(4120);
//		$city4120->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4120->setName('Смышляевка');
//		$manager->persist($city4120); 
//
//		$city4121= new City();
//		$city4121->setId(4121);
//		$city4121->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4121->setName('Сургут');
//		$manager->persist($city4121); 
//
//		$city4122= new City();
//		$city4122->setId(4122);
//		$city4122->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4122->setName('Сызрань');
//		$manager->persist($city4122); 
//
//		$city4123= new City();
//		$city4123->setId(4123);
//		$city4123->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4123->setName('Тольятти');
//		$manager->persist($city4123); 
//
//		$city4124= new City();
//		$city4124->setId(4124);
//		$city4124->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4124->setName('Хворостянка');
//		$manager->persist($city4124); 
//
//		$city4125= new City();
//		$city4125->setId(4125);
//		$city4125->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4125->setName('Чапаевск');
//		$manager->persist($city4125); 
//
//		$city4126= new City();
//		$city4126->setId(4126);
//		$city4126->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4126->setName('Челно-Вершины');
//		$manager->persist($city4126); 
//
//		$city4127= new City();
//		$city4127->setId(4127);
//		$city4127->setRegion($this->em->getReference('NitraGeoBundle:Region', 85)); 
//		$city4127->setName('Шентала');
//		$manager->persist($city4127); 
//
//		$city4128= new City();
//		$city4128->setId(4128);
//		$city4128->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4128->setName('Александров-Гай');
//		$manager->persist($city4128); 
//
//		$city4129= new City();
//		$city4129->setId(4129);
//		$city4129->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4129->setName('Аркадак');
//		$manager->persist($city4129); 
//
//		$city4130= new City();
//		$city4130->setId(4130);
//		$city4130->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4130->setName('Аткарск');
//		$manager->persist($city4130); 
//
//		$city4131= new City();
//		$city4131->setId(4131);
//		$city4131->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4131->setName('Базарный Карабулак');
//		$manager->persist($city4131); 
//
//		$city4132= new City();
//		$city4132->setId(4132);
//		$city4132->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4132->setName('Балаково');
//		$manager->persist($city4132); 
//
//		$city4133= new City();
//		$city4133->setId(4133);
//		$city4133->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4133->setName('Балашов');
//		$manager->persist($city4133); 
//
//		$city4134= new City();
//		$city4134->setId(4134);
//		$city4134->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4134->setName('Балтай');
//		$manager->persist($city4134); 
//
//		$city4135= new City();
//		$city4135->setId(4135);
//		$city4135->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4135->setName('Вольск');
//		$manager->persist($city4135); 
//
//		$city4136= new City();
//		$city4136->setId(4136);
//		$city4136->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4136->setName('Ершов');
//		$manager->persist($city4136); 
//
//		$city4137= new City();
//		$city4137->setId(4137);
//		$city4137->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4137->setName('Калининск');
//		$manager->persist($city4137); 
//
//		$city4138= new City();
//		$city4138->setId(4138);
//		$city4138->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4138->setName('Лысые Горы');
//		$manager->persist($city4138); 
//
//		$city4139= new City();
//		$city4139->setId(4139);
//		$city4139->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4139->setName('Маркс');
//		$manager->persist($city4139); 
//
//		$city4140= new City();
//		$city4140->setId(4140);
//		$city4140->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4140->setName('Новоузенск');
//		$manager->persist($city4140); 
//
//		$city4141= new City();
//		$city4141->setId(4141);
//		$city4141->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4141->setName('Новые Бурасы');
//		$manager->persist($city4141); 
//
//		$city4142= new City();
//		$city4142->setId(4142);
//		$city4142->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4142->setName('Озинки');
//		$manager->persist($city4142); 
//
//		$city4143= new City();
//		$city4143->setId(4143);
//		$city4143->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4143->setName('Перелюб');
//		$manager->persist($city4143); 
//
//		$city4144= new City();
//		$city4144->setId(4144);
//		$city4144->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4144->setName('Петровск');
//		$manager->persist($city4144); 
//
//		$city4145= new City();
//		$city4145->setId(4145);
//		$city4145->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4145->setName('Питерка');
//		$manager->persist($city4145); 
//
//		$city4146= new City();
//		$city4146->setId(4146);
//		$city4146->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4146->setName('Приволжский');
//		$manager->persist($city4146); 
//
//		$city4147= new City();
//		$city4147->setId(4147);
//		$city4147->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4147->setName('Пугачев');
//		$manager->persist($city4147); 
//
//		$city4148= new City();
//		$city4148->setId(4148);
//		$city4148->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4148->setName('Ртищево');
//		$manager->persist($city4148); 
//
//		$city4149= new City();
//		$city4149->setId(4149);
//		$city4149->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4149->setName('Саратов');
//		$manager->persist($city4149); 
//
//		$city4150= new City();
//		$city4150->setId(4150);
//		$city4150->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4150->setName('Саратов (Центральный)');
//		$manager->persist($city4150); 
//
//		$city4151= new City();
//		$city4151->setId(4151);
//		$city4151->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4151->setName('Турки');
//		$manager->persist($city4151); 
//
//		$city4152= new City();
//		$city4152->setId(4152);
//		$city4152->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4152->setName('Хвалынск');
//		$manager->persist($city4152); 
//
//		$city4153= new City();
//		$city4153->setId(4153);
//		$city4153->setRegion($this->em->getReference('NitraGeoBundle:Region', 86)); 
//		$city4153->setName('Энгельс');
//		$manager->persist($city4153); 
//
//		$city4154= new City();
//		$city4154->setId(4154);
//		$city4154->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4154->setName('Александровск-Сахалинский');
//		$manager->persist($city4154); 
//
//		$city4155= new City();
//		$city4155->setId(4155);
//		$city4155->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4155->setName('Анива');
//		$manager->persist($city4155); 
//
//		$city4156= new City();
//		$city4156->setId(4156);
//		$city4156->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4156->setName('Долинск');
//		$manager->persist($city4156); 
//
//		$city4157= new City();
//		$city4157->setId(4157);
//		$city4157->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4157->setName('Зональное');
//		$manager->persist($city4157); 
//
//		$city4158= new City();
//		$city4158->setId(4158);
//		$city4158->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4158->setName('Корсаков');
//		$manager->persist($city4158); 
//
//		$city4159= new City();
//		$city4159->setId(4159);
//		$city4159->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4159->setName('Курильск');
//		$manager->persist($city4159); 
//
//		$city4160= new City();
//		$city4160->setId(4160);
//		$city4160->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4160->setName('Невельск');
//		$manager->persist($city4160); 
//
//		$city4161= new City();
//		$city4161->setId(4161);
//		$city4161->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4161->setName('Ноглики');
//		$manager->persist($city4161); 
//
//		$city4162= new City();
//		$city4162->setId(4162);
//		$city4162->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4162->setName('Оха');
//		$manager->persist($city4162); 
//
//		$city4163= new City();
//		$city4163->setId(4163);
//		$city4163->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4163->setName('Поронайск');
//		$manager->persist($city4163); 
//
//		$city4164= new City();
//		$city4164->setId(4164);
//		$city4164->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4164->setName('Северо-Курильск');
//		$manager->persist($city4164); 
//
//		$city4165= new City();
//		$city4165->setId(4165);
//		$city4165->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4165->setName('Смирных');
//		$manager->persist($city4165); 
//
//		$city4166= new City();
//		$city4166->setId(4166);
//		$city4166->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4166->setName('Томари');
//		$manager->persist($city4166); 
//
//		$city4167= new City();
//		$city4167->setId(4167);
//		$city4167->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4167->setName('Тымовское');
//		$manager->persist($city4167); 
//
//		$city4168= new City();
//		$city4168->setId(4168);
//		$city4168->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4168->setName('Холмск');
//		$manager->persist($city4168); 
//
//		$city4169= new City();
//		$city4169->setId(4169);
//		$city4169->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4169->setName('Южно-Курильск');
//		$manager->persist($city4169); 
//
//		$city4170= new City();
//		$city4170->setId(4170);
//		$city4170->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4170->setName('Южно-Сахалинск');
//		$manager->persist($city4170); 
//
//		$city4171= new City();
//		$city4171->setId(4171);
//		$city4171->setRegion($this->em->getReference('NitraGeoBundle:Region', 87)); 
//		$city4171->setName('Южно-Сахалинск (Хомутово)');
//		$manager->persist($city4171); 
//
//		$city4172= new City();
//		$city4172->setId(4172);
//		$city4172->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4172->setName('Алапаевск');
//		$manager->persist($city4172); 
//
//		$city4173= new City();
//		$city4173->setId(4173);
//		$city4173->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4173->setName('Арамиль');
//		$manager->persist($city4173); 
//
//		$city4174= new City();
//		$city4174->setId(4174);
//		$city4174->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4174->setName('Артемовский');
//		$manager->persist($city4174); 
//
//		$city4175= new City();
//		$city4175->setId(4175);
//		$city4175->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4175->setName('Арти');
//		$manager->persist($city4175); 
//
//		$city4176= new City();
//		$city4176->setId(4176);
//		$city4176->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4176->setName('Асбест');
//		$manager->persist($city4176); 
//
//		$city4177= new City();
//		$city4177->setId(4177);
//		$city4177->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4177->setName('Ачит');
//		$manager->persist($city4177); 
//
//		$city4178= new City();
//		$city4178->setId(4178);
//		$city4178->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4178->setName('Байкалово');
//		$manager->persist($city4178); 
//
//		$city4179= new City();
//		$city4179->setId(4179);
//		$city4179->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4179->setName('Баранчинский');
//		$manager->persist($city4179); 
//
//		$city4180= new City();
//		$city4180->setId(4180);
//		$city4180->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4180->setName('Белоярский');
//		$manager->persist($city4180); 
//
//		$city4181= new City();
//		$city4181->setId(4181);
//		$city4181->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4181->setName('Бисерть');
//		$manager->persist($city4181); 
//
//		$city4182= new City();
//		$city4182->setId(4182);
//		$city4182->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4182->setName('Богданович');
//		$manager->persist($city4182); 
//
//		$city4183= new City();
//		$city4183->setId(4183);
//		$city4183->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4183->setName('Буланаш');
//		$manager->persist($city4183); 
//
//		$city4184= new City();
//		$city4184->setId(4184);
//		$city4184->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4184->setName('Верхний Тагил');
//		$manager->persist($city4184); 
//
//		$city4185= new City();
//		$city4185->setId(4185);
//		$city4185->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4185->setName('Верхняя Пышма');
//		$manager->persist($city4185); 
//
//		$city4186= new City();
//		$city4186->setId(4186);
//		$city4186->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4186->setName('Верхняя Салда');
//		$manager->persist($city4186); 
//
//		$city4187= new City();
//		$city4187->setId(4187);
//		$city4187->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4187->setName('Верхняя Синячиха');
//		$manager->persist($city4187); 
//
//		$city4188= new City();
//		$city4188->setId(4188);
//		$city4188->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4188->setName('Верхняя Тура');
//		$manager->persist($city4188); 
//
//		$city4189= new City();
//		$city4189->setId(4189);
//		$city4189->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4189->setName('Верхотурье');
//		$manager->persist($city4189); 
//
//		$city4190= new City();
//		$city4190->setId(4190);
//		$city4190->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4190->setName('Гари');
//		$manager->persist($city4190); 
//
//		$city4191= new City();
//		$city4191->setId(4191);
//		$city4191->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4191->setName('Дегтярск');
//		$manager->persist($city4191); 
//
//		$city4192= new City();
//		$city4192->setId(4192);
//		$city4192->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4192->setName('Екатеринбург');
//		$manager->persist($city4192); 
//
//		$city4193= new City();
//		$city4193->setId(4193);
//		$city4193->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4193->setName('Екатеринбург (Кольцово)');
//		$manager->persist($city4193); 
//
//		$city4194= new City();
//		$city4194->setId(4194);
//		$city4194->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4194->setName('Екатеринбург (Уктус)');
//		$manager->persist($city4194); 
//
//		$city4195= new City();
//		$city4195->setId(4195);
//		$city4195->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4195->setName('Ивдель');
//		$manager->persist($city4195); 
//
//		$city4196= new City();
//		$city4196->setId(4196);
//		$city4196->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4196->setName('Ирбит');
//		$manager->persist($city4196); 
//
//		$city4197= new City();
//		$city4197->setId(4197);
//		$city4197->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4197->setName('Каменск-Уральский');
//		$manager->persist($city4197); 
//
//		$city4198= new City();
//		$city4198->setId(4198);
//		$city4198->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4198->setName('Камышлов');
//		$manager->persist($city4198); 
//
//		$city4199= new City();
//		$city4199->setId(4199);
//		$city4199->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4199->setName('Карпинск');
//		$manager->persist($city4199); 
//
//		$city4200= new City();
//		$city4200->setId(4200);
//		$city4200->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4200->setName('Качканар');
//		$manager->persist($city4200); 
//
//		$city4201= new City();
//		$city4201->setId(4201);
//		$city4201->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4201->setName('Кировград');
//		$manager->persist($city4201); 
//
//		$city4202= new City();
//		$city4202->setId(4202);
//		$city4202->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4202->setName('Краснотурьинск');
//		$manager->persist($city4202); 
//
//		$city4203= new City();
//		$city4203->setId(4203);
//		$city4203->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4203->setName('Красноуральск');
//		$manager->persist($city4203); 
//
//		$city4204= new City();
//		$city4204->setId(4204);
//		$city4204->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4204->setName('Красноуфимск');
//		$manager->persist($city4204); 
//
//		$city4205= new City();
//		$city4205->setId(4205);
//		$city4205->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4205->setName('Кушва');
//		$manager->persist($city4205); 
//
//		$city4206= new City();
//		$city4206->setId(4206);
//		$city4206->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4206->setName('Кытлым');
//		$manager->persist($city4206); 
//
//		$city4207= new City();
//		$city4207->setId(4207);
//		$city4207->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4207->setName('Лесной');
//		$manager->persist($city4207); 
//
//		$city4208= new City();
//		$city4208->setId(4208);
//		$city4208->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4208->setName('Малышева');
//		$manager->persist($city4208); 
//
//		$city4209= new City();
//		$city4209->setId(4209);
//		$city4209->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4209->setName('Михайловск');
//		$manager->persist($city4209); 
//
//		$city4210= new City();
//		$city4210->setId(4210);
//		$city4210->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4210->setName('Невьянск');
//		$manager->persist($city4210); 
//
//		$city4211= new City();
//		$city4211->setId(4211);
//		$city4211->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4211->setName('Нижние Серги');
//		$manager->persist($city4211); 
//
//		$city4212= new City();
//		$city4212->setId(4212);
//		$city4212->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4212->setName('Нижний Тагил');
//		$manager->persist($city4212); 
//
//		$city4213= new City();
//		$city4213->setId(4213);
//		$city4213->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4213->setName('Нижняя Салда');
//		$manager->persist($city4213); 
//
//		$city4214= new City();
//		$city4214->setId(4214);
//		$city4214->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4214->setName('Нижняя Тура');
//		$manager->persist($city4214); 
//
//		$city4215= new City();
//		$city4215->setId(4215);
//		$city4215->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4215->setName('Новая Ляля');
//		$manager->persist($city4215); 
//
//		$city4216= new City();
//		$city4216->setId(4216);
//		$city4216->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4216->setName('Новоуральск');
//		$manager->persist($city4216); 
//
//		$city4217= new City();
//		$city4217->setId(4217);
//		$city4217->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4217->setName('Первоуральск');
//		$manager->persist($city4217); 
//
//		$city4218= new City();
//		$city4218->setId(4218);
//		$city4218->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4218->setName('Полевской');
//		$manager->persist($city4218); 
//
//		$city4219= new City();
//		$city4219->setId(4219);
//		$city4219->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4219->setName('Пышма');
//		$manager->persist($city4219); 
//
//		$city4220= new City();
//		$city4220->setId(4220);
//		$city4220->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4220->setName('Ревда');
//		$manager->persist($city4220); 
//
//		$city4221= new City();
//		$city4221->setId(4221);
//		$city4221->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4221->setName('Реж');
//		$manager->persist($city4221); 
//
//		$city4222= new City();
//		$city4222->setId(4222);
//		$city4222->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4222->setName('Рефтинский');
//		$manager->persist($city4222); 
//
//		$city4223= new City();
//		$city4223->setId(4223);
//		$city4223->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4223->setName('Североуральск');
//		$manager->persist($city4223); 
//
//		$city4224= new City();
//		$city4224->setId(4224);
//		$city4224->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4224->setName('Серов');
//		$manager->persist($city4224); 
//
//		$city4225= new City();
//		$city4225->setId(4225);
//		$city4225->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4225->setName('Среднеуральск');
//		$manager->persist($city4225); 
//
//		$city4226= new City();
//		$city4226->setId(4226);
//		$city4226->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4226->setName('Сухой Лог');
//		$manager->persist($city4226); 
//
//		$city4227= new City();
//		$city4227->setId(4227);
//		$city4227->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4227->setName('Сысерть');
//		$manager->persist($city4227); 
//
//		$city4228= new City();
//		$city4228->setId(4228);
//		$city4228->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4228->setName('Таборы');
//		$manager->persist($city4228); 
//
//		$city4229= new City();
//		$city4229->setId(4229);
//		$city4229->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4229->setName('Тавда');
//		$manager->persist($city4229); 
//
//		$city4230= new City();
//		$city4230->setId(4230);
//		$city4230->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4230->setName('Талица');
//		$manager->persist($city4230); 
//
//		$city4231= new City();
//		$city4231->setId(4231);
//		$city4231->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4231->setName('Тугулым');
//		$manager->persist($city4231); 
//
//		$city4232= new City();
//		$city4232->setId(4232);
//		$city4232->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4232->setName('Туринск');
//		$manager->persist($city4232); 
//
//		$city4233= new City();
//		$city4233->setId(4233);
//		$city4233->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4233->setName('Туринская Слобода');
//		$manager->persist($city4233); 
//
//		$city4234= new City();
//		$city4234->setId(4234);
//		$city4234->setRegion($this->em->getReference('NitraGeoBundle:Region', 88)); 
//		$city4234->setName('Шамары');
//		$manager->persist($city4234); 
//
//		$city4235= new City();
//		$city4235->setId(4235);
//		$city4235->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4235->setName('Велиж');
//		$manager->persist($city4235); 
//
//		$city4236= new City();
//		$city4236->setId(4236);
//		$city4236->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4236->setName('Верхнеднепровский');
//		$manager->persist($city4236); 
//
//		$city4237= new City();
//		$city4237->setId(4237);
//		$city4237->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4237->setName('Вязьма');
//		$manager->persist($city4237); 
//
//		$city4238= new City();
//		$city4238->setId(4238);
//		$city4238->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4238->setName('Гагарин');
//		$manager->persist($city4238); 
//
//		$city4239= new City();
//		$city4239->setId(4239);
//		$city4239->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4239->setName('Десногорск');
//		$manager->persist($city4239); 
//
//		$city4240= new City();
//		$city4240->setId(4240);
//		$city4240->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4240->setName('Дорогобуж');
//		$manager->persist($city4240); 
//
//		$city4241= new City();
//		$city4241->setId(4241);
//		$city4241->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4241->setName('Духовщина');
//		$manager->persist($city4241); 
//
//		$city4242= new City();
//		$city4242->setId(4242);
//		$city4242->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4242->setName('Ельня');
//		$manager->persist($city4242); 
//
//		$city4243= new City();
//		$city4243->setId(4243);
//		$city4243->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4243->setName('Ершичи');
//		$manager->persist($city4243); 
//
//		$city4244= new City();
//		$city4244->setId(4244);
//		$city4244->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4244->setName('Красный');
//		$manager->persist($city4244); 
//
//		$city4245= new City();
//		$city4245->setId(4245);
//		$city4245->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4245->setName('Монастырщина');
//		$manager->persist($city4245); 
//
//		$city4246= new City();
//		$city4246->setId(4246);
//		$city4246->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4246->setName('Озёрный');
//		$manager->persist($city4246); 
//
//		$city4247= new City();
//		$city4247->setId(4247);
//		$city4247->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4247->setName('Починок');
//		$manager->persist($city4247); 
//
//		$city4248= new City();
//		$city4248->setId(4248);
//		$city4248->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4248->setName('Рославль');
//		$manager->persist($city4248); 
//
//		$city4249= new City();
//		$city4249->setId(4249);
//		$city4249->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4249->setName('Сафоново');
//		$manager->persist($city4249); 
//
//		$city4250= new City();
//		$city4250->setId(4250);
//		$city4250->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4250->setName('Смоленск');
//		$manager->persist($city4250); 
//
//		$city4251= new City();
//		$city4251->setId(4251);
//		$city4251->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4251->setName('Сычевка');
//		$manager->persist($city4251); 
//
//		$city4252= new City();
//		$city4252->setId(4252);
//		$city4252->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4252->setName('Темкино');
//		$manager->persist($city4252); 
//
//		$city4253= new City();
//		$city4253->setId(4253);
//		$city4253->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4253->setName('Хиславичи');
//		$manager->persist($city4253); 
//
//		$city4254= new City();
//		$city4254->setId(4254);
//		$city4254->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4254->setName('Холм-Жирковский');
//		$manager->persist($city4254); 
//
//		$city4255= new City();
//		$city4255->setId(4255);
//		$city4255->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4255->setName('Шумячи');
//		$manager->persist($city4255); 
//
//		$city4256= new City();
//		$city4256->setId(4256);
//		$city4256->setRegion($this->em->getReference('NitraGeoBundle:Region', 89)); 
//		$city4256->setName('Ярцево');
//		$manager->persist($city4256); 
//
//		$city4257= new City();
//		$city4257->setId(4257);
//		$city4257->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4257->setName('Александрийская');
//		$manager->persist($city4257); 
//
//		$city4258= new City();
//		$city4258->setId(4258);
//		$city4258->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4258->setName('Александровское');
//		$manager->persist($city4258); 
//
//		$city4259= new City();
//		$city4259->setId(4259);
//		$city4259->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4259->setName('Арзгир');
//		$manager->persist($city4259); 
//
//		$city4260= new City();
//		$city4260->setId(4260);
//		$city4260->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4260->setName('Благодарный');
//		$manager->persist($city4260); 
//
//		$city4261= new City();
//		$city4261->setId(4261);
//		$city4261->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4261->setName('Буденновск');
//		$manager->persist($city4261); 
//
//		$city4262= new City();
//		$city4262->setId(4262);
//		$city4262->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4262->setName('Георгиевск');
//		$manager->persist($city4262); 
//
//		$city4263= new City();
//		$city4263->setId(4263);
//		$city4263->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4263->setName('Горячеводский');
//		$manager->persist($city4263); 
//
//		$city4264= new City();
//		$city4264->setId(4264);
//		$city4264->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4264->setName('Дивное');
//		$manager->persist($city4264); 
//
//		$city4265= new City();
//		$city4265->setId(4265);
//		$city4265->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4265->setName('Ессентуки');
//		$manager->persist($city4265); 
//
//		$city4266= new City();
//		$city4266->setId(4266);
//		$city4266->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4266->setName('Ессентукская');
//		$manager->persist($city4266); 
//
//		$city4267= new City();
//		$city4267->setId(4267);
//		$city4267->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4267->setName('Железноводск');
//		$manager->persist($city4267); 
//
//		$city4268= new City();
//		$city4268->setId(4268);
//		$city4268->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4268->setName('Зеленокумск');
//		$manager->persist($city4268); 
//
//		$city4269= new City();
//		$city4269->setId(4269);
//		$city4269->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4269->setName('Изобильный');
//		$manager->persist($city4269); 
//
//		$city4270= new City();
//		$city4270->setId(4270);
//		$city4270->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4270->setName('Иноземцево');
//		$manager->persist($city4270); 
//
//		$city4271= new City();
//		$city4271->setId(4271);
//		$city4271->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4271->setName('Ипатово');
//		$manager->persist($city4271); 
//
//		$city4272= new City();
//		$city4272->setId(4272);
//		$city4272->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4272->setName('Кисловодск');
//		$manager->persist($city4272); 
//
//		$city4273= new City();
//		$city4273->setId(4273);
//		$city4273->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4273->setName('Кочубеевское');
//		$manager->persist($city4273); 
//
//		$city4274= new City();
//		$city4274->setId(4274);
//		$city4274->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4274->setName('Краснокумское');
//		$manager->persist($city4274); 
//
//		$city4275= new City();
//		$city4275->setId(4275);
//		$city4275->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4275->setName('Курсавка');
//		$manager->persist($city4275); 
//
//		$city4276= new City();
//		$city4276->setId(4276);
//		$city4276->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4276->setName('Курская');
//		$manager->persist($city4276); 
//
//		$city4277= new City();
//		$city4277->setId(4277);
//		$city4277->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4277->setName('Левокумское');
//		$manager->persist($city4277); 
//
//		$city4278= new City();
//		$city4278->setId(4278);
//		$city4278->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4278->setName('Лермонтов');
//		$manager->persist($city4278); 
//
//		$city4279= new City();
//		$city4279->setId(4279);
//		$city4279->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4279->setName('Летняя Ставка');
//		$manager->persist($city4279); 
//
//		$city4280= new City();
//		$city4280->setId(4280);
//		$city4280->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4280->setName('Лысогорская');
//		$manager->persist($city4280); 
//
//		$city4281= new City();
//		$city4281->setId(4281);
//		$city4281->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4281->setName('Минеральные Воды');
//		$manager->persist($city4281); 
//
//		$city4282= new City();
//		$city4282->setId(4282);
//		$city4282->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4282->setName('Невинномысск');
//		$manager->persist($city4282); 
//
//		$city4283= new City();
//		$city4283->setId(4283);
//		$city4283->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4283->setName('Незлобная');
//		$manager->persist($city4283); 
//
//		$city4284= new City();
//		$city4284->setId(4284);
//		$city4284->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4284->setName('Нефтекумск');
//		$manager->persist($city4284); 
//
//		$city4285= new City();
//		$city4285->setId(4285);
//		$city4285->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4285->setName('Новоалександровск');
//		$manager->persist($city4285); 
//
//		$city4286= new City();
//		$city4286->setId(4286);
//		$city4286->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4286->setName('Новопавловск');
//		$manager->persist($city4286); 
//
//		$city4287= new City();
//		$city4287->setId(4287);
//		$city4287->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4287->setName('Новоселицкое');
//		$manager->persist($city4287); 
//
//		$city4288= new City();
//		$city4288->setId(4288);
//		$city4288->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4288->setName('Прасковея');
//		$manager->persist($city4288); 
//
//		$city4289= new City();
//		$city4289->setId(4289);
//		$city4289->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4289->setName('Пятигорск');
//		$manager->persist($city4289); 
//
//		$city4290= new City();
//		$city4290->setId(4290);
//		$city4290->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4290->setName('Светлоград');
//		$manager->persist($city4290); 
//
//		$city4291= new City();
//		$city4291->setId(4291);
//		$city4291->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4291->setName('Свободы');
//		$manager->persist($city4291); 
//
//		$city4292= new City();
//		$city4292->setId(4292);
//		$city4292->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4292->setName('Солдато-Александровское');
//		$manager->persist($city4292); 
//
//		$city4293= new City();
//		$city4293->setId(4293);
//		$city4293->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4293->setName('Солнечнодольск');
//		$manager->persist($city4293); 
//
//		$city4294= new City();
//		$city4294->setId(4294);
//		$city4294->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4294->setName('Ставрополь');
//		$manager->persist($city4294); 
//
//		$city4295= new City();
//		$city4295->setId(4295);
//		$city4295->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4295->setName('Ставрополь (Шпаковское)');
//		$manager->persist($city4295); 
//
//		$city4296= new City();
//		$city4296->setId(4296);
//		$city4296->setRegion($this->em->getReference('NitraGeoBundle:Region', 90)); 
//		$city4296->setName('Суворовская');
//		$manager->persist($city4296); 
//
//		$city4297= new City();
//		$city4297->setId(4297);
//		$city4297->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4297->setName('Жердевка');
//		$manager->persist($city4297); 
//
//		$city4298= new City();
//		$city4298->setId(4298);
//		$city4298->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4298->setName('Инжавино');
//		$manager->persist($city4298); 
//
//		$city4299= new City();
//		$city4299->setId(4299);
//		$city4299->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4299->setName('Кирсанов');
//		$manager->persist($city4299); 
//
//		$city4300= new City();
//		$city4300->setId(4300);
//		$city4300->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4300->setName('Мичуринск');
//		$manager->persist($city4300); 
//
//		$city4301= new City();
//		$city4301->setId(4301);
//		$city4301->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4301->setName('Мордово');
//		$manager->persist($city4301); 
//
//		$city4302= new City();
//		$city4302->setId(4302);
//		$city4302->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4302->setName('Моршанск');
//		$manager->persist($city4302); 
//
//		$city4303= new City();
//		$city4303->setId(4303);
//		$city4303->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4303->setName('Рассказово');
//		$manager->persist($city4303); 
//
//		$city4304= new City();
//		$city4304->setId(4304);
//		$city4304->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4304->setName('Ржакса');
//		$manager->persist($city4304); 
//
//		$city4305= new City();
//		$city4305->setId(4305);
//		$city4305->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4305->setName('Староюрьево');
//		$manager->persist($city4305); 
//
//		$city4306= new City();
//		$city4306->setId(4306);
//		$city4306->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4306->setName('Тамбов');
//		$manager->persist($city4306); 
//
//		$city4307= new City();
//		$city4307->setId(4307);
//		$city4307->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4307->setName('Тамбов (Донское)');
//		$manager->persist($city4307); 
//
//		$city4308= new City();
//		$city4308->setId(4308);
//		$city4308->setRegion($this->em->getReference('NitraGeoBundle:Region', 91)); 
//		$city4308->setName('Уварово');
//		$manager->persist($city4308); 
//
//		$city4309= new City();
//		$city4309->setId(4309);
//		$city4309->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4309->setName('Бежецк');
//		$manager->persist($city4309); 
//
//		$city4310= new City();
//		$city4310->setId(4310);
//		$city4310->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4310->setName('Белый');
//		$manager->persist($city4310); 
//
//		$city4311= new City();
//		$city4311->setId(4311);
//		$city4311->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4311->setName('Бологое');
//		$manager->persist($city4311); 
//
//		$city4312= new City();
//		$city4312->setId(4312);
//		$city4312->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4312->setName('Большое Завидово (Нашествие)');
//		$manager->persist($city4312); 
//
//		$city4313= new City();
//		$city4313->setId(4313);
//		$city4313->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4313->setName('Велеса');
//		$manager->persist($city4313); 
//
//		$city4314= new City();
//		$city4314->setId(4314);
//		$city4314->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4314->setName('Весьегонск');
//		$manager->persist($city4314); 
//
//		$city4315= new City();
//		$city4315->setId(4315);
//		$city4315->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4315->setName('Вышний Волочек');
//		$manager->persist($city4315); 
//
//		$city4316= new City();
//		$city4316->setId(4316);
//		$city4316->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4316->setName('Западная Двина');
//		$manager->persist($city4316); 
//
//		$city4317= new City();
//		$city4317->setId(4317);
//		$city4317->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4317->setName('Зубцов');
//		$manager->persist($city4317); 
//
//		$city4318= new City();
//		$city4318->setId(4318);
//		$city4318->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4318->setName('Калязин');
//		$manager->persist($city4318); 
//
//		$city4319= new City();
//		$city4319->setId(4319);
//		$city4319->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4319->setName('Кашин');
//		$manager->persist($city4319); 
//
//		$city4320= new City();
//		$city4320->setId(4320);
//		$city4320->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4320->setName('Кесова Гора');
//		$manager->persist($city4320); 
//
//		$city4321= new City();
//		$city4321->setId(4321);
//		$city4321->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4321->setName('Кимры');
//		$manager->persist($city4321); 
//
//		$city4322= new City();
//		$city4322->setId(4322);
//		$city4322->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4322->setName('Конаково');
//		$manager->persist($city4322); 
//
//		$city4323= new City();
//		$city4323->setId(4323);
//		$city4323->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4323->setName('Красный Холм');
//		$manager->persist($city4323); 
//
//		$city4324= new City();
//		$city4324->setId(4324);
//		$city4324->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4324->setName('Кувшиново');
//		$manager->persist($city4324); 
//
//		$city4325= new City();
//		$city4325->setId(4325);
//		$city4325->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4325->setName('Лесное');
//		$manager->persist($city4325); 
//
//		$city4326= new City();
//		$city4326->setId(4326);
//		$city4326->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4326->setName('Лесной Заповедник');
//		$manager->persist($city4326); 
//
//		$city4327= new City();
//		$city4327->setId(4327);
//		$city4327->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4327->setName('Лихославль');
//		$manager->persist($city4327); 
//
//		$city4328= new City();
//		$city4328->setId(4328);
//		$city4328->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4328->setName('Максатиха');
//		$manager->persist($city4328); 
//
//		$city4329= new City();
//		$city4329->setId(4329);
//		$city4329->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4329->setName('Нелидово');
//		$manager->persist($city4329); 
//
//		$city4330= new City();
//		$city4330->setId(4330);
//		$city4330->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4330->setName('Оленино');
//		$manager->persist($city4330); 
//
//		$city4331= new City();
//		$city4331->setId(4331);
//		$city4331->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4331->setName('Осташков');
//		$manager->persist($city4331); 
//
//		$city4332= new City();
//		$city4332->setId(4332);
//		$city4332->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4332->setName('Редкино');
//		$manager->persist($city4332); 
//
//		$city4333= new City();
//		$city4333->setId(4333);
//		$city4333->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4333->setName('Ржев');
//		$manager->persist($city4333); 
//
//		$city4334= new City();
//		$city4334->setId(4334);
//		$city4334->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4334->setName('Старица');
//		$manager->persist($city4334); 
//
//		$city4335= new City();
//		$city4335->setId(4335);
//		$city4335->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4335->setName('Стрельчиха');
//		$manager->persist($city4335); 
//
//		$city4336= new City();
//		$city4336->setId(4336);
//		$city4336->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4336->setName('Тверь');
//		$manager->persist($city4336); 
//
//		$city4337= new City();
//		$city4337->setId(4337);
//		$city4337->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4337->setName('Тверь (Змеево)');
//		$manager->persist($city4337); 
//
//		$city4338= new City();
//		$city4338->setId(4338);
//		$city4338->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4338->setName('Торжок');
//		$manager->persist($city4338); 
//
//		$city4339= new City();
//		$city4339->setId(4339);
//		$city4339->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4339->setName('Торопец');
//		$manager->persist($city4339); 
//
//		$city4340= new City();
//		$city4340->setId(4340);
//		$city4340->setRegion($this->em->getReference('NitraGeoBundle:Region', 92)); 
//		$city4340->setName('Удомля');
//		$manager->persist($city4340); 
//
//		$city4341= new City();
//		$city4341->setId(4341);
//		$city4341->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4341->setName('Асино');
//		$manager->persist($city4341); 
//
//		$city4342= new City();
//		$city4342->setId(4342);
//		$city4342->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4342->setName('Бакчар');
//		$manager->persist($city4342); 
//
//		$city4343= new City();
//		$city4343->setId(4343);
//		$city4343->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4343->setName('Белый Яр');
//		$manager->persist($city4343); 
//
//		$city4344= new City();
//		$city4344->setId(4344);
//		$city4344->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4344->setName('Зырянское');
//		$manager->persist($city4344); 
//
//		$city4345= new City();
//		$city4345->setId(4345);
//		$city4345->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4345->setName('Каргасок');
//		$manager->persist($city4345); 
//
//		$city4346= new City();
//		$city4346->setId(4346);
//		$city4346->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4346->setName('Кедровый');
//		$manager->persist($city4346); 
//
//		$city4347= new City();
//		$city4347->setId(4347);
//		$city4347->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4347->setName('Кожевниково');
//		$manager->persist($city4347); 
//
//		$city4348= new City();
//		$city4348->setId(4348);
//		$city4348->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4348->setName('Колпашево');
//		$manager->persist($city4348); 
//
//		$city4349= new City();
//		$city4349->setId(4349);
//		$city4349->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4349->setName('Кривошеино');
//		$manager->persist($city4349); 
//
//		$city4350= new City();
//		$city4350->setId(4350);
//		$city4350->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4350->setName('Мельниково');
//		$manager->persist($city4350); 
//
//		$city4351= new City();
//		$city4351->setId(4351);
//		$city4351->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4351->setName('Молчаново');
//		$manager->persist($city4351); 
//
//		$city4352= new City();
//		$city4352->setId(4352);
//		$city4352->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4352->setName('Нарым');
//		$manager->persist($city4352); 
//
//		$city4353= new City();
//		$city4353->setId(4353);
//		$city4353->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4353->setName('Новый Игол');
//		$manager->persist($city4353); 
//
//		$city4354= new City();
//		$city4354->setId(4354);
//		$city4354->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4354->setName('Парабель');
//		$manager->persist($city4354); 
//
//		$city4355= new City();
//		$city4355->setId(4355);
//		$city4355->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4355->setName('Подгорное');
//		$manager->persist($city4355); 
//
//		$city4356= new City();
//		$city4356->setId(4356);
//		$city4356->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4356->setName('Стрежевой');
//		$manager->persist($city4356); 
//
//		$city4357= new City();
//		$city4357->setId(4357);
//		$city4357->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4357->setName('Тегульдет');
//		$manager->persist($city4357); 
//
//		$city4358= new City();
//		$city4358->setId(4358);
//		$city4358->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4358->setName('Томск');
//		$manager->persist($city4358); 
//
//		$city4359= new City();
//		$city4359->setId(4359);
//		$city4359->setRegion($this->em->getReference('NitraGeoBundle:Region', 93)); 
//		$city4359->setName('Томск (Богашево)');
//		$manager->persist($city4359); 
//
//		$city4360= new City();
//		$city4360->setId(4360);
//		$city4360->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4360->setName('Алексин');
//		$manager->persist($city4360); 
//
//		$city4361= new City();
//		$city4361->setId(4361);
//		$city4361->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4361->setName('Белев');
//		$manager->persist($city4361); 
//
//		$city4362= new City();
//		$city4362->setId(4362);
//		$city4362->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4362->setName('Богородицк');
//		$manager->persist($city4362); 
//
//		$city4363= new City();
//		$city4363->setId(4363);
//		$city4363->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4363->setName('Болохово');
//		$manager->persist($city4363); 
//
//		$city4364= new City();
//		$city4364->setId(4364);
//		$city4364->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4364->setName('Венев');
//		$manager->persist($city4364); 
//
//		$city4365= new City();
//		$city4365->setId(4365);
//		$city4365->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4365->setName('Дедилово');
//		$manager->persist($city4365); 
//
//		$city4366= new City();
//		$city4366->setId(4366);
//		$city4366->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4366->setName('Ефремов');
//		$manager->persist($city4366); 
//
//		$city4367= new City();
//		$city4367->setId(4367);
//		$city4367->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4367->setName('Кимовск');
//		$manager->persist($city4367); 
//
//		$city4368= new City();
//		$city4368->setId(4368);
//		$city4368->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4368->setName('Киреевск');
//		$manager->persist($city4368); 
//
//		$city4369= new City();
//		$city4369->setId(4369);
//		$city4369->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4369->setName('Плавск');
//		$manager->persist($city4369); 
//
//		$city4370= new City();
//		$city4370->setId(4370);
//		$city4370->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4370->setName('Славное');
//		$manager->persist($city4370); 
//
//		$city4371= new City();
//		$city4371->setId(4371);
//		$city4371->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4371->setName('Суворов');
//		$manager->persist($city4371); 
//
//		$city4372= new City();
//		$city4372->setId(4372);
//		$city4372->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4372->setName('Тула');
//		$manager->persist($city4372); 
//
//		$city4373= new City();
//		$city4373->setId(4373);
//		$city4373->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4373->setName('Узловая');
//		$manager->persist($city4373); 
//
//		$city4374= new City();
//		$city4374->setId(4374);
//		$city4374->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4374->setName('Чернь');
//		$manager->persist($city4374); 
//
//		$city4375= new City();
//		$city4375->setId(4375);
//		$city4375->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4375->setName('Щёкино');
//		$manager->persist($city4375); 
//
//		$city4376= new City();
//		$city4376->setId(4376);
//		$city4376->setRegion($this->em->getReference('NitraGeoBundle:Region', 94)); 
//		$city4376->setName('Ясногорск');
//		$manager->persist($city4376); 
//
//		$city4377= new City();
//		$city4377->setId(4377);
//		$city4377->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4377->setName('Абатское');
//		$manager->persist($city4377); 
//
//		$city4378= new City();
//		$city4378->setId(4378);
//		$city4378->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4378->setName('Аксарка');
//		$manager->persist($city4378); 
//
//		$city4379= new City();
//		$city4379->setId(4379);
//		$city4379->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4379->setName('Армизонское');
//		$manager->persist($city4379); 
//
//		$city4380= new City();
//		$city4380->setId(4380);
//		$city4380->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4380->setName('Аромашево');
//		$manager->persist($city4380); 
//
//		$city4381= new City();
//		$city4381->setId(4381);
//		$city4381->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4381->setName('Бердюжье');
//		$manager->persist($city4381); 
//
//		$city4382= new City();
//		$city4382->setId(4382);
//		$city4382->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4382->setName('Большое Сорокино');
//		$manager->persist($city4382); 
//
//		$city4383= new City();
//		$city4383->setId(4383);
//		$city4383->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4383->setName('Боровский');
//		$manager->persist($city4383); 
//
//		$city4384= new City();
//		$city4384->setId(4384);
//		$city4384->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4384->setName('Вагай');
//		$manager->persist($city4384); 
//
//		$city4385= new City();
//		$city4385->setId(4385);
//		$city4385->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4385->setName('Викулово');
//		$manager->persist($city4385); 
//
//		$city4386= new City();
//		$city4386->setId(4386);
//		$city4386->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4386->setName('Винзили');
//		$manager->persist($city4386); 
//
//		$city4387= new City();
//		$city4387->setId(4387);
//		$city4387->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4387->setName('Голышманово');
//		$manager->persist($city4387); 
//
//		$city4388= new City();
//		$city4388->setId(4388);
//		$city4388->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4388->setName('Губкинский');
//		$manager->persist($city4388); 
//
//		$city4389= new City();
//		$city4389->setId(4389);
//		$city4389->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4389->setName('Заводоуковск');
//		$manager->persist($city4389); 
//
//		$city4390= new City();
//		$city4390->setId(4390);
//		$city4390->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4390->setName('Игрим');
//		$manager->persist($city4390); 
//
//		$city4391= new City();
//		$city4391->setId(4391);
//		$city4391->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4391->setName('Исетское');
//		$manager->persist($city4391); 
//
//		$city4392= new City();
//		$city4392->setId(4392);
//		$city4392->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4392->setName('Ишим');
//		$manager->persist($city4392); 
//
//		$city4393= new City();
//		$city4393->setId(4393);
//		$city4393->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4393->setName('Казанское');
//		$manager->persist($city4393); 
//
//		$city4394= new City();
//		$city4394->setId(4394);
//		$city4394->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4394->setName('Когалым');
//		$manager->persist($city4394); 
//
//		$city4395= new City();
//		$city4395->setId(4395);
//		$city4395->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4395->setName('Кондинское');
//		$manager->persist($city4395); 
//
//		$city4396= new City();
//		$city4396->setId(4396);
//		$city4396->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4396->setName('Красноселькуп');
//		$manager->persist($city4396); 
//
//		$city4397= new City();
//		$city4397->setId(4397);
//		$city4397->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4397->setName('Лангепас');
//		$manager->persist($city4397); 
//
//		$city4398= new City();
//		$city4398->setId(4398);
//		$city4398->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4398->setName('Лонгъюган');
//		$manager->persist($city4398); 
//
//		$city4399= new City();
//		$city4399->setId(4399);
//		$city4399->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4399->setName('Мегион');
//		$manager->persist($city4399); 
//
//		$city4400= new City();
//		$city4400->setId(4400);
//		$city4400->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4400->setName('Междуреченский');
//		$manager->persist($city4400); 
//
//		$city4401= new City();
//		$city4401->setId(4401);
//		$city4401->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4401->setName('Мужи');
//		$manager->persist($city4401); 
//
//		$city4402= new City();
//		$city4402->setId(4402);
//		$city4402->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4402->setName('Муравленко');
//		$manager->persist($city4402); 
//
//		$city4403= new City();
//		$city4403->setId(4403);
//		$city4403->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4403->setName('Мыс Каменный');
//		$manager->persist($city4403); 
//
//		$city4404= new City();
//		$city4404->setId(4404);
//		$city4404->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4404->setName('Надым');
//		$manager->persist($city4404); 
//
//		$city4405= new City();
//		$city4405->setId(4405);
//		$city4405->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4405->setName('Нефедова');
//		$manager->persist($city4405); 
//
//		$city4406= new City();
//		$city4406->setId(4406);
//		$city4406->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4406->setName('Нефтеюганск');
//		$manager->persist($city4406); 
//
//		$city4407= new City();
//		$city4407->setId(4407);
//		$city4407->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4407->setName('Нижневартовск');
//		$manager->persist($city4407); 
//
//		$city4408= new City();
//		$city4408->setId(4408);
//		$city4408->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4408->setName('Нижтавда');
//		$manager->persist($city4408); 
//
//		$city4409= new City();
//		$city4409->setId(4409);
//		$city4409->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4409->setName('Новозаполярный');
//		$manager->persist($city4409); 
//
//		$city4410= new City();
//		$city4410->setId(4410);
//		$city4410->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4410->setName('Новый Уренгой');
//		$manager->persist($city4410); 
//
//		$city4411= new City();
//		$city4411->setId(4411);
//		$city4411->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4411->setName('Ноябрьск');
//		$manager->persist($city4411); 
//
//		$city4412= new City();
//		$city4412->setId(4412);
//		$city4412->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4412->setName('Нягань');
//		$manager->persist($city4412); 
//
//		$city4413= new City();
//		$city4413->setId(4413);
//		$city4413->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4413->setName('Перегребное');
//		$manager->persist($city4413); 
//
//		$city4414= new City();
//		$city4414->setId(4414);
//		$city4414->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4414->setName('Покачи');
//		$manager->persist($city4414); 
//
//		$city4415= new City();
//		$city4415->setId(4415);
//		$city4415->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4415->setName('Приполярный');
//		$manager->persist($city4415); 
//
//		$city4416= new City();
//		$city4416->setId(4416);
//		$city4416->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4416->setName('Пыть-Ях');
//		$manager->persist($city4416); 
//
//		$city4417= new City();
//		$city4417->setId(4417);
//		$city4417->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4417->setName('Салехард');
//		$manager->persist($city4417); 
//
//		$city4418= new City();
//		$city4418->setId(4418);
//		$city4418->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4418->setName('Сладково');
//		$manager->persist($city4418); 
//
//		$city4419= new City();
//		$city4419->setId(4419);
//		$city4419->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4419->setName('Сорум');
//		$manager->persist($city4419); 
//
//		$city4420= new City();
//		$city4420->setId(4420);
//		$city4420->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4420->setName('Сосьва');
//		$manager->persist($city4420); 
//
//		$city4421= new City();
//		$city4421->setId(4421);
//		$city4421->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4421->setName('Сывдарма');
//		$manager->persist($city4421); 
//
//		$city4422= new City();
//		$city4422->setId(4422);
//		$city4422->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4422->setName('Тазовский');
//		$manager->persist($city4422); 
//
//		$city4423= new City();
//		$city4423->setId(4423);
//		$city4423->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4423->setName('Тамбей');
//		$manager->persist($city4423); 
//
//		$city4424= new City();
//		$city4424->setId(4424);
//		$city4424->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4424->setName('Тарко-Сале');
//		$manager->persist($city4424); 
//
//		$city4425= new City();
//		$city4425->setId(4425);
//		$city4425->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4425->setName('Тобольск');
//		$manager->persist($city4425); 
//
//		$city4426= new City();
//		$city4426->setId(4426);
//		$city4426->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4426->setName('Толька');
//		$manager->persist($city4426); 
//
//		$city4427= new City();
//		$city4427->setId(4427);
//		$city4427->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4427->setName('Тюмень');
//		$manager->persist($city4427); 
//
//		$city4428= new City();
//		$city4428->setId(4428);
//		$city4428->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4428->setName('Тюмень (Рощино)');
//		$manager->persist($city4428); 
//
//		$city4429= new City();
//		$city4429->setId(4429);
//		$city4429->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4429->setName('Уват');
//		$manager->persist($city4429); 
//
//		$city4430= new City();
//		$city4430->setId(4430);
//		$city4430->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4430->setName('Узюм-Юганская');
//		$manager->persist($city4430); 
//
//		$city4431= new City();
//		$city4431->setId(4431);
//		$city4431->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4431->setName('Упорово');
//		$manager->persist($city4431); 
//
//		$city4432= new City();
//		$city4432->setId(4432);
//		$city4432->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4432->setName('Урай');
//		$manager->persist($city4432); 
//
//		$city4433= new City();
//		$city4433->setId(4433);
//		$city4433->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4433->setName('Уренгой');
//		$manager->persist($city4433); 
//
//		$city4434= new City();
//		$city4434->setId(4434);
//		$city4434->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4434->setName('Ханты-Мансийск');
//		$manager->persist($city4434); 
//
//		$city4435= new City();
//		$city4435->setId(4435);
//		$city4435->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4435->setName('Хулимсунт');
//		$manager->persist($city4435); 
//
//		$city4436= new City();
//		$city4436->setId(4436);
//		$city4436->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4436->setName('Югорск');
//		$manager->persist($city4436); 
//
//		$city4437= new City();
//		$city4437->setId(4437);
//		$city4437->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4437->setName('Юргинское');
//		$manager->persist($city4437); 
//
//		$city4438= new City();
//		$city4438->setId(4438);
//		$city4438->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4438->setName('Юровск');
//		$manager->persist($city4438); 
//
//		$city4439= new City();
//		$city4439->setId(4439);
//		$city4439->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4439->setName('Ялуторовск');
//		$manager->persist($city4439); 
//
//		$city4440= new City();
//		$city4440->setId(4440);
//		$city4440->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4440->setName('Ямбург');
//		$manager->persist($city4440); 
//
//		$city4441= new City();
//		$city4441->setId(4441);
//		$city4441->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4441->setName('Ярково');
//		$manager->persist($city4441); 
//
//		$city4442= new City();
//		$city4442->setId(4442);
//		$city4442->setRegion($this->em->getReference('NitraGeoBundle:Region', 95)); 
//		$city4442->setName('Яр-Сале');
//		$manager->persist($city4442); 
//
//		$city4443= new City();
//		$city4443->setId(4443);
//		$city4443->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4443->setName('Балезино');
//		$manager->persist($city4443); 
//
//		$city4444= new City();
//		$city4444->setId(4444);
//		$city4444->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4444->setName('Вавож');
//		$manager->persist($city4444); 
//
//		$city4445= new City();
//		$city4445->setId(4445);
//		$city4445->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4445->setName('Воткинск');
//		$manager->persist($city4445); 
//
//		$city4446= new City();
//		$city4446->setId(4446);
//		$city4446->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4446->setName('Глазов');
//		$manager->persist($city4446); 
//
//		$city4447= new City();
//		$city4447->setId(4447);
//		$city4447->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4447->setName('Грахово');
//		$manager->persist($city4447); 
//
//		$city4448= new City();
//		$city4448->setId(4448);
//		$city4448->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4448->setName('Дебесы');
//		$manager->persist($city4448); 
//
//		$city4449= new City();
//		$city4449->setId(4449);
//		$city4449->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4449->setName('Игра');
//		$manager->persist($city4449); 
//
//		$city4450= new City();
//		$city4450->setId(4450);
//		$city4450->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4450->setName('Ижевск');
//		$manager->persist($city4450); 
//
//		$city4451= new City();
//		$city4451->setId(4451);
//		$city4451->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4451->setName('Камбарка');
//		$manager->persist($city4451); 
//
//		$city4452= new City();
//		$city4452->setId(4452);
//		$city4452->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4452->setName('Каракулино');
//		$manager->persist($city4452); 
//
//		$city4453= new City();
//		$city4453->setId(4453);
//		$city4453->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4453->setName('Кез');
//		$manager->persist($city4453); 
//
//		$city4454= new City();
//		$city4454->setId(4454);
//		$city4454->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4454->setName('Кизнер');
//		$manager->persist($city4454); 
//
//		$city4455= new City();
//		$city4455->setId(4455);
//		$city4455->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4455->setName('Киясово');
//		$manager->persist($city4455); 
//
//		$city4456= new City();
//		$city4456->setId(4456);
//		$city4456->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4456->setName('Можга');
//		$manager->persist($city4456); 
//
//		$city4457= new City();
//		$city4457->setId(4457);
//		$city4457->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4457->setName('Сарапул');
//		$manager->persist($city4457); 
//
//		$city4458= new City();
//		$city4458->setId(4458);
//		$city4458->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4458->setName('Селты');
//		$manager->persist($city4458); 
//
//		$city4459= new City();
//		$city4459->setId(4459);
//		$city4459->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4459->setName('Сюмси');
//		$manager->persist($city4459); 
//
//		$city4460= new City();
//		$city4460->setId(4460);
//		$city4460->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4460->setName('Ува');
//		$manager->persist($city4460); 
//
//		$city4461= new City();
//		$city4461->setId(4461);
//		$city4461->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4461->setName('Шаркан');
//		$manager->persist($city4461); 
//
//		$city4462= new City();
//		$city4462->setId(4462);
//		$city4462->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4462->setName('Юкаменское');
//		$manager->persist($city4462); 
//
//		$city4463= new City();
//		$city4463->setId(4463);
//		$city4463->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4463->setName('Якшур-Бодья');
//		$manager->persist($city4463); 
//
//		$city4464= new City();
//		$city4464->setId(4464);
//		$city4464->setRegion($this->em->getReference('NitraGeoBundle:Region', 96)); 
//		$city4464->setName('Яр');
//		$manager->persist($city4464); 
//
//		$city4465= new City();
//		$city4465->setId(4465);
//		$city4465->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4465->setName('Барыш');
//		$manager->persist($city4465); 
//
//		$city4466= new City();
//		$city4466->setId(4466);
//		$city4466->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4466->setName('Большое Нагаткино');
//		$manager->persist($city4466); 
//
//		$city4467= new City();
//		$city4467->setId(4467);
//		$city4467->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4467->setName('Вешкайма');
//		$manager->persist($city4467); 
//
//		$city4468= new City();
//		$city4468->setId(4468);
//		$city4468->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4468->setName('Димитровград');
//		$manager->persist($city4468); 
//
//		$city4469= new City();
//		$city4469->setId(4469);
//		$city4469->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4469->setName('Инза');
//		$manager->persist($city4469); 
//
//		$city4470= new City();
//		$city4470->setId(4470);
//		$city4470->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4470->setName('Ишеевка');
//		$manager->persist($city4470); 
//
//		$city4471= new City();
//		$city4471->setId(4471);
//		$city4471->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4471->setName('Новоспасское');
//		$manager->persist($city4471); 
//
//		$city4472= new City();
//		$city4472->setId(4472);
//		$city4472->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4472->setName('Новоульяновск');
//		$manager->persist($city4472); 
//
//		$city4473= new City();
//		$city4473->setId(4473);
//		$city4473->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4473->setName('Радищево');
//		$manager->persist($city4473); 
//
//		$city4474= new City();
//		$city4474->setId(4474);
//		$city4474->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4474->setName('Сенгилей');
//		$manager->persist($city4474); 
//
//		$city4475= new City();
//		$city4475->setId(4475);
//		$city4475->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4475->setName('Сурское');
//		$manager->persist($city4475); 
//
//		$city4476= new City();
//		$city4476->setId(4476);
//		$city4476->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4476->setName('Ульяновск');
//		$manager->persist($city4476); 
//
//		$city4477= new City();
//		$city4477->setId(4477);
//		$city4477->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4477->setName('Ульяновск (Баратаевка)');
//		$manager->persist($city4477); 
//
//		$city4478= new City();
//		$city4478->setId(4478);
//		$city4478->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4478->setName('Ульяновск (Восточный)');
//		$manager->persist($city4478); 
//
//		$city4479= new City();
//		$city4479->setId(4479);
//		$city4479->setRegion($this->em->getReference('NitraGeoBundle:Region', 97)); 
//		$city4479->setName('Чердаклы');
//		$manager->persist($city4479); 
//
//		$city4480= new City();
//		$city4480->setId(4480);
//		$city4480->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4480->setName('Амурск');
//		$manager->persist($city4480); 
//
//		$city4481= new City();
//		$city4481->setId(4481);
//		$city4481->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4481->setName('Андрюшкино');
//		$manager->persist($city4481); 
//
//		$city4482= new City();
//		$city4482->setId(4482);
//		$city4482->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4482->setName('Аян');
//		$manager->persist($city4482); 
//
//		$city4483= new City();
//		$city4483->setId(4483);
//		$city4483->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4483->setName('Бикин');
//		$manager->persist($city4483); 
//
//		$city4484= new City();
//		$city4484->setId(4484);
//		$city4484->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4484->setName('Ванино');
//		$manager->persist($city4484); 
//
//		$city4485= new City();
//		$city4485->setId(4485);
//		$city4485->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4485->setName('Вяземский');
//		$manager->persist($city4485); 
//
//		$city4486= new City();
//		$city4486->setId(4486);
//		$city4486->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4486->setName('Комсомольск-на-Амуре');
//		$manager->persist($city4486); 
//
//		$city4487= new City();
//		$city4487->setId(4487);
//		$city4487->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4487->setName('Комсомольск-на-Амуре (Хурба)');
//		$manager->persist($city4487); 
//
//		$city4488= new City();
//		$city4488->setId(4488);
//		$city4488->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4488->setName('Монгохто');
//		$manager->persist($city4488); 
//
//		$city4489= new City();
//		$city4489->setId(4489);
//		$city4489->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4489->setName('Николаевск-на-Амуре');
//		$manager->persist($city4489); 
//
//		$city4490= new City();
//		$city4490->setId(4490);
//		$city4490->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4490->setName('Охотск');
//		$manager->persist($city4490); 
//
//		$city4491= new City();
//		$city4491->setId(4491);
//		$city4491->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4491->setName('Переяславка');
//		$manager->persist($city4491); 
//
//		$city4492= new City();
//		$city4492->setId(4492);
//		$city4492->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4492->setName('Советская Гавань');
//		$manager->persist($city4492); 
//
//		$city4493= new City();
//		$city4493->setId(4493);
//		$city4493->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4493->setName('Советская Гавань (Май-Гатка)');
//		$manager->persist($city4493); 
//
//		$city4494= new City();
//		$city4494->setId(4494);
//		$city4494->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4494->setName('Хабаровск');
//		$manager->persist($city4494); 
//
//		$city4495= new City();
//		$city4495->setId(4495);
//		$city4495->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4495->setName('Хабаровск (Новый)');
//		$manager->persist($city4495); 
//
//		$city4496= new City();
//		$city4496->setId(4496);
//		$city4496->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4496->setName('Хор');
//		$manager->persist($city4496); 
//
//		$city4497= new City();
//		$city4497->setId(4497);
//		$city4497->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4497->setName('Чегдомын');
//		$manager->persist($city4497); 
//
//		$city4498= new City();
//		$city4498->setId(4498);
//		$city4498->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4498->setName('Чумикан');
//		$manager->persist($city4498); 
//
//		$city4499= new City();
//		$city4499->setId(4499);
//		$city4499->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4499->setName('Эльбан');
//		$manager->persist($city4499); 
//
//		$city4500= new City();
//		$city4500->setId(4500);
//		$city4500->setRegion($this->em->getReference('NitraGeoBundle:Region', 98)); 
//		$city4500->setName('Этыркэн');
//		$manager->persist($city4500); 
//
//		$city4501= new City();
//		$city4501->setId(4501);
//		$city4501->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4501->setName('Аргаяш');
//		$manager->persist($city4501); 
//
//		$city4502= new City();
//		$city4502->setId(4502);
//		$city4502->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4502->setName('Аша');
//		$manager->persist($city4502); 
//
//		$city4503= new City();
//		$city4503->setId(4503);
//		$city4503->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4503->setName('Бакал');
//		$manager->persist($city4503); 
//
//		$city4504= new City();
//		$city4504->setId(4504);
//		$city4504->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4504->setName('Бреды');
//		$manager->persist($city4504); 
//
//		$city4505= new City();
//		$city4505->setId(4505);
//		$city4505->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4505->setName('Варна');
//		$manager->persist($city4505); 
//
//		$city4506= new City();
//		$city4506->setId(4506);
//		$city4506->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4506->setName('Верхнеуральск');
//		$manager->persist($city4506); 
//
//		$city4507= new City();
//		$city4507->setId(4507);
//		$city4507->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4507->setName('Верхний Уфалей');
//		$manager->persist($city4507); 
//
//		$city4508= new City();
//		$city4508->setId(4508);
//		$city4508->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4508->setName('Еманжелинск');
//		$manager->persist($city4508); 
//
//		$city4509= new City();
//		$city4509->setId(4509);
//		$city4509->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4509->setName('Еткуль');
//		$manager->persist($city4509); 
//
//		$city4510= new City();
//		$city4510->setId(4510);
//		$city4510->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4510->setName('Завьялиха');
//		$manager->persist($city4510); 
//
//		$city4511= new City();
//		$city4511->setId(4511);
//		$city4511->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4511->setName('Златоуст');
//		$manager->persist($city4511); 
//
//		$city4512= new City();
//		$city4512->setId(4512);
//		$city4512->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4512->setName('Карабаш');
//		$manager->persist($city4512); 
//
//		$city4513= new City();
//		$city4513->setId(4513);
//		$city4513->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4513->setName('Карталы');
//		$manager->persist($city4513); 
//
//		$city4514= new City();
//		$city4514->setId(4514);
//		$city4514->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4514->setName('Касли');
//		$manager->persist($city4514); 
//
//		$city4515= new City();
//		$city4515->setId(4515);
//		$city4515->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4515->setName('Катав-Ивановск');
//		$manager->persist($city4515); 
//
//		$city4516= new City();
//		$city4516->setId(4516);
//		$city4516->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4516->setName('Кизильское');
//		$manager->persist($city4516); 
//
//		$city4517= new City();
//		$city4517->setId(4517);
//		$city4517->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4517->setName('Копейск');
//		$manager->persist($city4517); 
//
//		$city4518= new City();
//		$city4518->setId(4518);
//		$city4518->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4518->setName('Коркино');
//		$manager->persist($city4518); 
//
//		$city4519= new City();
//		$city4519->setId(4519);
//		$city4519->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4519->setName('Красногорский');
//		$manager->persist($city4519); 
//
//		$city4520= new City();
//		$city4520->setId(4520);
//		$city4520->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4520->setName('Куса');
//		$manager->persist($city4520); 
//
//		$city4521= new City();
//		$city4521->setId(4521);
//		$city4521->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4521->setName('Кыштым');
//		$manager->persist($city4521); 
//
//		$city4522= new City();
//		$city4522->setId(4522);
//		$city4522->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4522->setName('Локомотивный');
//		$manager->persist($city4522); 
//
//		$city4523= new City();
//		$city4523->setId(4523);
//		$city4523->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4523->setName('Магнитогорск');
//		$manager->persist($city4523); 
//
//		$city4524= new City();
//		$city4524->setId(4524);
//		$city4524->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4524->setName('Миасс');
//		$manager->persist($city4524); 
//
//		$city4525= new City();
//		$city4525->setId(4525);
//		$city4525->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4525->setName('Миньяр');
//		$manager->persist($city4525); 
//
//		$city4526= new City();
//		$city4526->setId(4526);
//		$city4526->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4526->setName('Нязепетровск');
//		$manager->persist($city4526); 
//
//		$city4527= new City();
//		$city4527->setId(4527);
//		$city4527->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4527->setName('Пласт');
//		$manager->persist($city4527); 
//
//		$city4528= new City();
//		$city4528->setId(4528);
//		$city4528->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4528->setName('Сатка');
//		$manager->persist($city4528); 
//
//		$city4529= new City();
//		$city4529->setId(4529);
//		$city4529->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4529->setName('Сим');
//		$manager->persist($city4529); 
//
//		$city4530= new City();
//		$city4530->setId(4530);
//		$city4530->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4530->setName('Снежинск');
//		$manager->persist($city4530); 
//
//		$city4531= new City();
//		$city4531->setId(4531);
//		$city4531->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4531->setName('Трехгорный');
//		$manager->persist($city4531); 
//
//		$city4532= new City();
//		$city4532->setId(4532);
//		$city4532->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4532->setName('Увельский');
//		$manager->persist($city4532); 
//
//		$city4533= new City();
//		$city4533->setId(4533);
//		$city4533->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4533->setName('Уйское');
//		$manager->persist($city4533); 
//
//		$city4534= new City();
//		$city4534->setId(4534);
//		$city4534->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4534->setName('Усть-Катав');
//		$manager->persist($city4534); 
//
//		$city4535= new City();
//		$city4535->setId(4535);
//		$city4535->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4535->setName('Чебаркуль');
//		$manager->persist($city4535); 
//
//		$city4536= new City();
//		$city4536->setId(4536);
//		$city4536->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4536->setName('Челябинск');
//		$manager->persist($city4536); 
//
//		$city4537= new City();
//		$city4537->setId(4537);
//		$city4537->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4537->setName('Челябинск (Баландино)');
//		$manager->persist($city4537); 
//
//		$city4538= new City();
//		$city4538->setId(4538);
//		$city4538->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4538->setName('Чесма');
//		$manager->persist($city4538); 
//
//		$city4539= new City();
//		$city4539->setId(4539);
//		$city4539->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4539->setName('Южноуральск');
//		$manager->persist($city4539); 
//
//		$city4540= new City();
//		$city4540->setId(4540);
//		$city4540->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4540->setName('Южный Горняк');
//		$manager->persist($city4540); 
//
//		$city4541= new City();
//		$city4541->setId(4541);
//		$city4541->setRegion($this->em->getReference('NitraGeoBundle:Region', 99)); 
//		$city4541->setName('Юрюзань');
//		$manager->persist($city4541); 
//
//		$city4542= new City();
//		$city4542->setId(4542);
//		$city4542->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4542->setName('Автуры');
//		$manager->persist($city4542); 
//
//		$city4543= new City();
//		$city4543->setId(4543);
//		$city4543->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4543->setName('Аллерой');
//		$manager->persist($city4543); 
//
//		$city4544= new City();
//		$city4544->setId(4544);
//		$city4544->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4544->setName('Алхан-Кала');
//		$manager->persist($city4544); 
//
//		$city4545= new City();
//		$city4545->setId(4545);
//		$city4545->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4545->setName('Аргун');
//		$manager->persist($city4545); 
//
//		$city4546= new City();
//		$city4546->setId(4546);
//		$city4546->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4546->setName('Ассиновская');
//		$manager->persist($city4546); 
//
//		$city4547= new City();
//		$city4547->setId(4547);
//		$city4547->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4547->setName('Ачхой-Мартан');
//		$manager->persist($city4547); 
//
//		$city4548= new City();
//		$city4548->setId(4548);
//		$city4548->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4548->setName('Бачи-Юрт');
//		$manager->persist($city4548); 
//
//		$city4549= new City();
//		$city4549->setId(4549);
//		$city4549->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4549->setName('Ведено');
//		$manager->persist($city4549); 
//
//		$city4550= new City();
//		$city4550->setId(4550);
//		$city4550->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4550->setName('Гойты');
//		$manager->persist($city4550); 
//
//		$city4551= new City();
//		$city4551->setId(4551);
//		$city4551->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4551->setName('Грозный');
//		$manager->persist($city4551); 
//
//		$city4552= new City();
//		$city4552->setId(4552);
//		$city4552->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4552->setName('Грозный (Грозный)');
//		$manager->persist($city4552); 
//
//		$city4553= new City();
//		$city4553->setId(4553);
//		$city4553->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4553->setName('Гудермес');
//		$manager->persist($city4553); 
//
//		$city4554= new City();
//		$city4554->setId(4554);
//		$city4554->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4554->setName('Курчалой');
//		$manager->persist($city4554); 
//
//		$city4555= new City();
//		$city4555->setId(4555);
//		$city4555->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4555->setName('Майртуп');
//		$manager->persist($city4555); 
//
//		$city4556= new City();
//		$city4556->setId(4556);
//		$city4556->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4556->setName('Мескер-Юрт');
//		$manager->persist($city4556); 
//
//		$city4557= new City();
//		$city4557->setId(4557);
//		$city4557->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4557->setName('Наурская');
//		$manager->persist($city4557); 
//
//		$city4558= new City();
//		$city4558->setId(4558);
//		$city4558->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4558->setName('Ойсхара');
//		$manager->persist($city4558); 
//
//		$city4559= new City();
//		$city4559->setId(4559);
//		$city4559->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4559->setName('Самашки');
//		$manager->persist($city4559); 
//
//		$city4560= new City();
//		$city4560->setId(4560);
//		$city4560->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4560->setName('Старые Атаги');
//		$manager->persist($city4560); 
//
//		$city4561= new City();
//		$city4561->setId(4561);
//		$city4561->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4561->setName('Урус-Мартан');
//		$manager->persist($city4561); 
//
//		$city4562= new City();
//		$city4562->setId(4562);
//		$city4562->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4562->setName('Цоцин-Юрт');
//		$manager->persist($city4562); 
//
//		$city4563= new City();
//		$city4563->setId(4563);
//		$city4563->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4563->setName('Шали');
//		$manager->persist($city4563); 
//
//		$city4564= new City();
//		$city4564->setId(4564);
//		$city4564->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4564->setName('Шатой');
//		$manager->persist($city4564); 
//
//		$city4565= new City();
//		$city4565->setId(4565);
//		$city4565->setRegion($this->em->getReference('NitraGeoBundle:Region', 100)); 
//		$city4565->setName('Шелковская');
//		$manager->persist($city4565); 
//
//		$city4566= new City();
//		$city4566->setId(4566);
//		$city4566->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4566->setName('Алатырь');
//		$manager->persist($city4566); 
//
//		$city4567= new City();
//		$city4567->setId(4567);
//		$city4567->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4567->setName('Аликово');
//		$manager->persist($city4567); 
//
//		$city4568= new City();
//		$city4568->setId(4568);
//		$city4568->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4568->setName('Батырево');
//		$manager->persist($city4568); 
//
//		$city4569= new City();
//		$city4569->setId(4569);
//		$city4569->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4569->setName('Вурнары');
//		$manager->persist($city4569); 
//
//		$city4570= new City();
//		$city4570->setId(4570);
//		$city4570->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4570->setName('Ибреси');
//		$manager->persist($city4570); 
//
//		$city4571= new City();
//		$city4571->setId(4571);
//		$city4571->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4571->setName('Канаш');
//		$manager->persist($city4571); 
//
//		$city4572= new City();
//		$city4572->setId(4572);
//		$city4572->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4572->setName('Козловка');
//		$manager->persist($city4572); 
//
//		$city4573= new City();
//		$city4573->setId(4573);
//		$city4573->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4573->setName('Красные Четаи');
//		$manager->persist($city4573); 
//
//		$city4574= new City();
//		$city4574->setId(4574);
//		$city4574->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4574->setName('Кугеси');
//		$manager->persist($city4574); 
//
//		$city4575= new City();
//		$city4575->setId(4575);
//		$city4575->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4575->setName('Мариинский Посад');
//		$manager->persist($city4575); 
//
//		$city4576= new City();
//		$city4576->setId(4576);
//		$city4576->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4576->setName('Новочебоксарск');
//		$manager->persist($city4576); 
//
//		$city4577= new City();
//		$city4577->setId(4577);
//		$city4577->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4577->setName('Порецкое');
//		$manager->persist($city4577); 
//
//		$city4578= new City();
//		$city4578->setId(4578);
//		$city4578->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4578->setName('Цивильск');
//		$manager->persist($city4578); 
//
//		$city4579= new City();
//		$city4579->setId(4579);
//		$city4579->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4579->setName('Чебоксары');
//		$manager->persist($city4579); 
//
//		$city4580= new City();
//		$city4580->setId(4580);
//		$city4580->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4580->setName('Шумерля');
//		$manager->persist($city4580); 
//
//		$city4581= new City();
//		$city4581->setId(4581);
//		$city4581->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4581->setName('Ядрин');
//		$manager->persist($city4581); 
//
//		$city4582= new City();
//		$city4582->setId(4582);
//		$city4582->setRegion($this->em->getReference('NitraGeoBundle:Region', 101)); 
//		$city4582->setName('Яльчики');
//		$manager->persist($city4582); 
//
//		$city4583= new City();
//		$city4583->setId(4583);
//		$city4583->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4583->setName('Анадырь');
//		$manager->persist($city4583); 
//
//		$city4584= new City();
//		$city4584->setId(4584);
//		$city4584->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4584->setName('Анадырь (Угольный)');
//		$manager->persist($city4584); 
//
//		$city4585= new City();
//		$city4585->setId(4585);
//		$city4585->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4585->setName('Билибино');
//		$manager->persist($city4585); 
//
//		$city4586= new City();
//		$city4586->setId(4586);
//		$city4586->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4586->setName('Залив Креста');
//		$manager->persist($city4586); 
//
//		$city4587= new City();
//		$city4587->setId(4587);
//		$city4587->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4587->setName('Залив Лаврентия');
//		$manager->persist($city4587); 
//
//		$city4588= new City();
//		$city4588->setId(4588);
//		$city4588->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4588->setName('Лаврентия');
//		$manager->persist($city4588); 
//
//		$city4589= new City();
//		$city4589->setId(4589);
//		$city4589->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4589->setName('Омолон');
//		$manager->persist($city4589); 
//
//		$city4590= new City();
//		$city4590->setId(4590);
//		$city4590->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4590->setName('Певек');
//		$manager->persist($city4590); 
//
//		$city4591= new City();
//		$city4591->setId(4591);
//		$city4591->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4591->setName('Провидения бухта');
//		$manager->persist($city4591); 
//
//		$city4592= new City();
//		$city4592->setId(4592);
//		$city4592->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4592->setName('Уэлен');
//		$manager->persist($city4592); 
//
//		$city4593= new City();
//		$city4593->setId(4593);
//		$city4593->setRegion($this->em->getReference('NitraGeoBundle:Region', 102)); 
//		$city4593->setName('Эгвекинот');
//		$manager->persist($city4593); 
//
//		$city4594= new City();
//		$city4594->setId(4594);
//		$city4594->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4594->setName('Борок');
//		$manager->persist($city4594); 
//
//		$city4595= new City();
//		$city4595->setId(4595);
//		$city4595->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4595->setName('Брейтово');
//		$manager->persist($city4595); 
//
//		$city4596= new City();
//		$city4596->setId(4596);
//		$city4596->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4596->setName('Гаврилов-Ям');
//		$manager->persist($city4596); 
//
//		$city4597= new City();
//		$city4597->setId(4597);
//		$city4597->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4597->setName('Данилов');
//		$manager->persist($city4597); 
//
//		$city4598= new City();
//		$city4598->setId(4598);
//		$city4598->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4598->setName('Мышкин');
//		$manager->persist($city4598); 
//
//		$city4599= new City();
//		$city4599->setId(4599);
//		$city4599->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4599->setName('Некрасовское');
//		$manager->persist($city4599); 
//
//		$city4600= new City();
//		$city4600->setId(4600);
//		$city4600->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4600->setName('Новый Некоуз');
//		$manager->persist($city4600); 
//
//		$city4601= new City();
//		$city4601->setId(4601);
//		$city4601->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4601->setName('Переславль-Залесский');
//		$manager->persist($city4601); 
//
//		$city4602= new City();
//		$city4602->setId(4602);
//		$city4602->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4602->setName('Пошехонье');
//		$manager->persist($city4602); 
//
//		$city4603= new City();
//		$city4603->setId(4603);
//		$city4603->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4603->setName('Ростов');
//		$manager->persist($city4603); 
//
//		$city4604= new City();
//		$city4604->setId(4604);
//		$city4604->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4604->setName('Тутаев');
//		$manager->persist($city4604); 
//
//		$city4605= new City();
//		$city4605->setId(4605);
//		$city4605->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4605->setName('Углич');
//		$manager->persist($city4605); 
//
//		$city4606= new City();
//		$city4606->setId(4606);
//		$city4606->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4606->setName('Ярославль');
//		$manager->persist($city4606); 
//
//		$city4607= new City();
//		$city4607->setId(4607);
//		$city4607->setRegion($this->em->getReference('NitraGeoBundle:Region', 103)); 
//		$city4607->setName('Ярославль (Туношна)');
//		$manager->persist($city4607); 
//
//		$city4608= new City();
//		$city4608->setId(4608);
//		$city4608->setRegion($this->em->getReference('NitraGeoBundle:Region', 16)); 
//		$city4608->setName('Великие');
//		$manager->persist($city4608); 
//
//		$city4609= new City();
//		$city4609->setId(4609);
//		$city4609->setRegion($this->em->getReference('NitraGeoBundle:Region', 1)); 
//		$city4609->setName('Золотое поле');
//		$manager->persist($city4609); 
//
//		$city4610= new City();
//		$city4610->setId(4610);
//		$city4610->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city4610->setName('Красноармейск');
//		$manager->persist($city4610); 
//
//		$city4611= new City();
//		$city4611->setId(4611);
//		$city4611->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city4611->setName('Красноармейск (Житомир)');
//		$manager->persist($city4611); 
//
//		$city4612= new City();
//		$city4612->setId(4612);
//		$city4612->setRegion($this->em->getReference('NitraGeoBundle:Region', 25)); 
//		$city4612->setName('Заболотов');
//		$manager->persist($city4612); 
//
//		$city4613= new City();
//		$city4613->setId(4613);
//		$city4613->setRegion($this->em->getReference('NitraGeoBundle:Region', 4)); 
//		$city4613->setName('Щорск');
//		$manager->persist($city4613); 
//
//		$city4614= new City();
//		$city4614->setId(4614);
//		$city4614->setRegion($this->em->getReference('NitraGeoBundle:Region', 6)); 
//		$city4614->setName('Словечное');
//		$manager->persist($city4614); 
//
//		$city4615= new City();
//		$city4615->setId(4615);
//		$city4615->setRegion($this->em->getReference('NitraGeoBundle:Region', 9)); 
//		$city4615->setName('Тлумач');
//		$manager->persist($city4615); 
//
//		// сохранить 
//		$manager->flush();
//
//    }
//    
//}