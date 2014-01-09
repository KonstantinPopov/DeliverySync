<?php
namespace Nitra\GeoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Nitra\GeoBundle\Entity\Region;

/**
 * LoadRegionData
 */
class LoadRegionData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    
    /**
     * @var ContainerInterface
     */
    private $container;
    
    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    private $em;
        
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
    
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // уствноыить контейнер
        $this->container = $container;
        
        // установить EntityManager
        $this->em = $this->container->get('doctrine')->getManager();
    }
        
        
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
//        // предотвращение загрузки даных
//        // на этапе разворачивание на сервере данные фикстры не нужны
//        return false;
        
		$region1= new Region();
		$region1->setId(1);
		$region1->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region1->setName('АР Крым');
		$manager->persist($region1); 

		$region2= new Region();
		$region2->setId(2);
		$region2->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region2->setName('Винницкая область');
		$manager->persist($region2); 

		$region3= new Region();
		$region3->setId(3);
		$region3->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region3->setName('Волынская область');
		$manager->persist($region3); 

		$region4= new Region();
		$region4->setId(4);
		$region4->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region4->setName('Днепропетровская область');
		$manager->persist($region4); 

		$region5= new Region();
		$region5->setId(5);
		$region5->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region5->setName('Донецкая область');
		$manager->persist($region5); 

		$region6= new Region();
		$region6->setId(6);
		$region6->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region6->setName('Житомирская область');
		$manager->persist($region6); 

		$region7= new Region();
		$region7->setId(7);
		$region7->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region7->setName('Закарпатская область');
		$manager->persist($region7); 

		$region8= new Region();
		$region8->setId(8);
		$region8->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region8->setName('Запорожская область');
		$manager->persist($region8); 

		$region9= new Region();
		$region9->setId(9);
		$region9->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region9->setName('Ивано-Франковская область');
		$manager->persist($region9); 

		$region10= new Region();
		$region10->setId(10);
		$region10->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region10->setName('Киевская область');
		$manager->persist($region10); 

		$region11= new Region();
		$region11->setId(11);
		$region11->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region11->setName('Кировоградская область');
		$manager->persist($region11); 

		$region12= new Region();
		$region12->setId(12);
		$region12->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region12->setName('Луганская область');
		$manager->persist($region12); 

		$region13= new Region();
		$region13->setId(13);
		$region13->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region13->setName('Львовская область');
		$manager->persist($region13); 

		$region14= new Region();
		$region14->setId(14);
		$region14->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region14->setName('Николаевская область');
		$manager->persist($region14); 

		$region15= new Region();
		$region15->setId(15);
		$region15->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region15->setName('Одесская область');
		$manager->persist($region15); 

		$region16= new Region();
		$region16->setId(16);
		$region16->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region16->setName('Полтавская область');
		$manager->persist($region16); 

		$region17= new Region();
		$region17->setId(17);
		$region17->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region17->setName('Ровенская область');
		$manager->persist($region17); 

		$region18= new Region();
		$region18->setId(18);
		$region18->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region18->setName('Сумская область');
		$manager->persist($region18); 

		$region19= new Region();
		$region19->setId(19);
		$region19->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region19->setName('Тернопольская область');
		$manager->persist($region19); 

		$region20= new Region();
		$region20->setId(20);
		$region20->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region20->setName('Харьковская область');
		$manager->persist($region20); 

		$region21= new Region();
		$region21->setId(21);
		$region21->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region21->setName('Херсонская область');
		$manager->persist($region21); 

		$region22= new Region();
		$region22->setId(22);
		$region22->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region22->setName('Хмельницкая область');
		$manager->persist($region22); 

		$region23= new Region();
		$region23->setId(23);
		$region23->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region23->setName('Черкасская область');
		$manager->persist($region23); 

		$region24= new Region();
		$region24->setId(24);
		$region24->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region24->setName('Черниговская область');
		$manager->persist($region24); 

		$region25= new Region();
		$region25->setId(25);
		$region25->setCountry($this->em->getReference('NitraGeoBundle:Country', 1)); 
		$region25->setName('Черновицкая область');
		$manager->persist($region25); 

		$region26= new Region();
		$region26->setId(26);
		$region26->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region26->setName('Алтайский край');
		$manager->persist($region26); 

		$region27= new Region();
		$region27->setId(27);
		$region27->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region27->setName('Амурская область');
		$manager->persist($region27); 

		$region28= new Region();
		$region28->setId(28);
		$region28->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region28->setName('Архангельская область');
		$manager->persist($region28); 

		$region29= new Region();
		$region29->setId(29);
		$region29->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region29->setName('Астраханская область');
		$manager->persist($region29); 

		$region30= new Region();
		$region30->setId(30);
		$region30->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region30->setName('Белгородская область');
		$manager->persist($region30); 

		$region31= new Region();
		$region31->setId(31);
		$region31->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region31->setName('Брянская область');
		$manager->persist($region31); 

		$region32= new Region();
		$region32->setId(32);
		$region32->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region32->setName('Владимирская область');
		$manager->persist($region32); 

		$region33= new Region();
		$region33->setId(33);
		$region33->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region33->setName('Волгоградская область');
		$manager->persist($region33); 

		$region34= new Region();
		$region34->setId(34);
		$region34->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region34->setName('Вологодская область');
		$manager->persist($region34); 

		$region35= new Region();
		$region35->setId(35);
		$region35->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region35->setName('Воронежская область');
		$manager->persist($region35); 

		$region36= new Region();
		$region36->setId(36);
		$region36->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region36->setName('Еврейская автономная область');
		$manager->persist($region36); 

		$region37= new Region();
		$region37->setId(37);
		$region37->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region37->setName('Забайкальский край');
		$manager->persist($region37); 

		$region38= new Region();
		$region38->setId(38);
		$region38->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region38->setName('Ивановская область');
		$manager->persist($region38); 

		$region39= new Region();
		$region39->setId(39);
		$region39->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region39->setName('Иркутская область');
		$manager->persist($region39); 

		$region40= new Region();
		$region40->setId(40);
		$region40->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region40->setName('Кабардино-Балкарская республика');
		$manager->persist($region40); 

		$region41= new Region();
		$region41->setId(41);
		$region41->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region41->setName('Калининградская область');
		$manager->persist($region41); 

		$region42= new Region();
		$region42->setId(42);
		$region42->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region42->setName('Калужская область');
		$manager->persist($region42); 

		$region43= new Region();
		$region43->setId(43);
		$region43->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region43->setName('Камчатский край');
		$manager->persist($region43); 

		$region44= new Region();
		$region44->setId(44);
		$region44->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region44->setName('Карачаево-Черкесская республика');
		$manager->persist($region44); 

		$region45= new Region();
		$region45->setId(45);
		$region45->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region45->setName('Кемеровская область');
		$manager->persist($region45); 

		$region46= new Region();
		$region46->setId(46);
		$region46->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region46->setName('Кировская область');
		$manager->persist($region46); 

		$region47= new Region();
		$region47->setId(47);
		$region47->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region47->setName('Костромская область');
		$manager->persist($region47); 

		$region48= new Region();
		$region48->setId(48);
		$region48->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region48->setName('Краснодарский край');
		$manager->persist($region48); 

		$region49= new Region();
		$region49->setId(49);
		$region49->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region49->setName('Красноярский край');
		$manager->persist($region49); 

		$region50= new Region();
		$region50->setId(50);
		$region50->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region50->setName('Курганская область');
		$manager->persist($region50); 

		$region51= new Region();
		$region51->setId(51);
		$region51->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region51->setName('Курская область');
		$manager->persist($region51); 

		$region52= new Region();
		$region52->setId(52);
		$region52->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region52->setName('Ленинградская область');
		$manager->persist($region52); 

		$region53= new Region();
		$region53->setId(53);
		$region53->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region53->setName('Липецкая область');
		$manager->persist($region53); 

		$region54= new Region();
		$region54->setId(54);
		$region54->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region54->setName('Магаданская область');
		$manager->persist($region54); 

		$region55= new Region();
		$region55->setId(55);
		$region55->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region55->setName('Московская область');
		$manager->persist($region55); 

		$region56= new Region();
		$region56->setId(56);
		$region56->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region56->setName('Мурманская область');
		$manager->persist($region56); 

		$region57= new Region();
		$region57->setId(57);
		$region57->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region57->setName('Нижегородская область');
		$manager->persist($region57); 

		$region58= new Region();
		$region58->setId(58);
		$region58->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region58->setName('Новгородская область');
		$manager->persist($region58); 

		$region59= new Region();
		$region59->setId(59);
		$region59->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region59->setName('Новосибирская область');
		$manager->persist($region59); 

		$region60= new Region();
		$region60->setId(60);
		$region60->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region60->setName('Омская область');
		$manager->persist($region60); 

		$region61= new Region();
		$region61->setId(61);
		$region61->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region61->setName('Оренбургская область');
		$manager->persist($region61); 

		$region62= new Region();
		$region62->setId(62);
		$region62->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region62->setName('Орловская область');
		$manager->persist($region62); 

		$region63= new Region();
		$region63->setId(63);
		$region63->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region63->setName('Пензенская область');
		$manager->persist($region63); 

		$region64= new Region();
		$region64->setId(64);
		$region64->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region64->setName('Пермский край');
		$manager->persist($region64); 

		$region65= new Region();
		$region65->setId(65);
		$region65->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region65->setName('Приморский край');
		$manager->persist($region65); 

		$region66= new Region();
		$region66->setId(66);
		$region66->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region66->setName('Псковская область');
		$manager->persist($region66); 

		$region67= new Region();
		$region67->setId(67);
		$region67->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region67->setName('Республика Адыгея');
		$manager->persist($region67); 

		$region68= new Region();
		$region68->setId(68);
		$region68->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region68->setName('Республика Алтай');
		$manager->persist($region68); 

		$region69= new Region();
		$region69->setId(69);
		$region69->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region69->setName('Республика Башкортостан');
		$manager->persist($region69); 

		$region70= new Region();
		$region70->setId(70);
		$region70->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region70->setName('Республика Бурятия');
		$manager->persist($region70); 

		$region71= new Region();
		$region71->setId(71);
		$region71->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region71->setName('Республика Дагестан');
		$manager->persist($region71); 

		$region72= new Region();
		$region72->setId(72);
		$region72->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region72->setName('Республика Ингушетия');
		$manager->persist($region72); 

		$region73= new Region();
		$region73->setId(73);
		$region73->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region73->setName('Республика Калмыкия');
		$manager->persist($region73); 

		$region74= new Region();
		$region74->setId(74);
		$region74->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region74->setName('Республика Карелия');
		$manager->persist($region74); 

		$region75= new Region();
		$region75->setId(75);
		$region75->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region75->setName('Республика Коми');
		$manager->persist($region75); 

		$region76= new Region();
		$region76->setId(76);
		$region76->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region76->setName('Республика Марий Эл');
		$manager->persist($region76); 

		$region77= new Region();
		$region77->setId(77);
		$region77->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region77->setName('Республика Мордовия');
		$manager->persist($region77); 

		$region78= new Region();
		$region78->setId(78);
		$region78->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region78->setName('Республика Саха (Якутия)');
		$manager->persist($region78); 

		$region79= new Region();
		$region79->setId(79);
		$region79->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region79->setName('Республика Северная Осетия - Алания');
		$manager->persist($region79); 

		$region80= new Region();
		$region80->setId(80);
		$region80->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region80->setName('Республика Татарстан');
		$manager->persist($region80); 

		$region81= new Region();
		$region81->setId(81);
		$region81->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region81->setName('Республика Тыва');
		$manager->persist($region81); 

		$region82= new Region();
		$region82->setId(82);
		$region82->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region82->setName('Республика Хакасия');
		$manager->persist($region82); 

		$region83= new Region();
		$region83->setId(83);
		$region83->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region83->setName('Ростовская область');
		$manager->persist($region83); 

		$region84= new Region();
		$region84->setId(84);
		$region84->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region84->setName('Рязанская область');
		$manager->persist($region84); 

		$region85= new Region();
		$region85->setId(85);
		$region85->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region85->setName('Самарская область');
		$manager->persist($region85); 

		$region86= new Region();
		$region86->setId(86);
		$region86->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region86->setName('Саратовская область');
		$manager->persist($region86); 

		$region87= new Region();
		$region87->setId(87);
		$region87->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region87->setName('Сахалинская область');
		$manager->persist($region87); 

		$region88= new Region();
		$region88->setId(88);
		$region88->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region88->setName('Свердловская область');
		$manager->persist($region88); 

		$region89= new Region();
		$region89->setId(89);
		$region89->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region89->setName('Смоленская область');
		$manager->persist($region89); 

		$region90= new Region();
		$region90->setId(90);
		$region90->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region90->setName('Ставропольский край');
		$manager->persist($region90); 

		$region91= new Region();
		$region91->setId(91);
		$region91->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region91->setName('Тамбовская область');
		$manager->persist($region91); 

		$region92= new Region();
		$region92->setId(92);
		$region92->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region92->setName('Тверская область');
		$manager->persist($region92); 

		$region93= new Region();
		$region93->setId(93);
		$region93->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region93->setName('Томская область');
		$manager->persist($region93); 

		$region94= new Region();
		$region94->setId(94);
		$region94->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region94->setName('Тульская область');
		$manager->persist($region94); 

		$region95= new Region();
		$region95->setId(95);
		$region95->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region95->setName('Тюменская область');
		$manager->persist($region95); 

		$region96= new Region();
		$region96->setId(96);
		$region96->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region96->setName('Удмуртская республика');
		$manager->persist($region96); 

		$region97= new Region();
		$region97->setId(97);
		$region97->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region97->setName('Ульяновская область');
		$manager->persist($region97); 

		$region98= new Region();
		$region98->setId(98);
		$region98->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region98->setName('Хабаровский край');
		$manager->persist($region98); 

		$region99= new Region();
		$region99->setId(99);
		$region99->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region99->setName('Челябинская область');
		$manager->persist($region99); 

		$region100= new Region();
		$region100->setId(100);
		$region100->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region100->setName('Чеченская республика');
		$manager->persist($region100); 

		$region101= new Region();
		$region101->setId(101);
		$region101->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region101->setName('Чувашская республика');
		$manager->persist($region101); 

		$region102= new Region();
		$region102->setId(102);
		$region102->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region102->setName('Чукотский автономный округ');
		$manager->persist($region102); 

		$region103= new Region();
		$region103->setId(103);
		$region103->setCountry($this->em->getReference('NitraGeoBundle:Country', 2)); 
		$region103->setName('Ярославская область');
		$manager->persist($region103); 

		// сохранить 
		$manager->flush();

    }
    
}