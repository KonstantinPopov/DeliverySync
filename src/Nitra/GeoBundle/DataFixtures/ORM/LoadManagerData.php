<?php

namespace Nitra\GeoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\GeoBundle\Entity\Region AS Region;
use Nitra\GeoBundle\Entity\City AS City;

class LoadManagerData implements FixtureInterface
{

    /**
     * Фикстуры для регионов и городов
     */
    public function load(ObjectManager $manager)
    {
        //Регионы
        $region_1 = new Region();
        $region_1->setName("АР Крым");
        $manager->persist($region_1);


        $region_2 = new Region();
        $region_2->setName("Винницкая область");
        $manager->persist($region_2);


        $region_3 = new Region();
        $region_3->setName("Волынская область");
        $manager->persist($region_3);


        $region_4 = new Region();
        $region_4->setName("Днепропетровская область");
        $manager->persist($region_4);


        $region_5 = new Region();
        $region_5->setName("Донецкая область");
        $manager->persist($region_5);


        $region_6 = new Region();
        $region_6->setName("Житомирская область");
        $manager->persist($region_6);


        $region_7 = new Region();
        $region_7->setName("Закарпатская область");
        $manager->persist($region_7);


        $region_8 = new Region();
        $region_8->setName("Запорожская область");
        $manager->persist($region_8);


        $region_9 = new Region();
        $region_9->setName("Ивано-Франковская область");
        $manager->persist($region_9);


        $region_10 = new Region();
        $region_10->setName("Киевская область");
        $manager->persist($region_10);


        $region_11 = new Region();
        $region_11->setName("Кировоградская область");
        $manager->persist($region_11);


        $region_12 = new Region();
        $region_12->setName("Луганская область");
        $manager->persist($region_12);


        $region_13 = new Region();
        $region_13->setName("Львовская область");
        $manager->persist($region_13);


        $region_14 = new Region();
        $region_14->setName("Николаевская область");
        $manager->persist($region_14);


        $region_15 = new Region();
        $region_15->setName("Одесская область");
        $manager->persist($region_15);


        $region_16 = new Region();
        $region_16->setName("Полтавская область");
        $manager->persist($region_16);


        $region_17 = new Region();
        $region_17->setName("Ровенская область");
        $manager->persist($region_17);


        $region_18 = new Region();
        $region_18->setName("Сумская область");
        $manager->persist($region_18);


        $region_19 = new Region();
        $region_19->setName("Тернопольская область");
        $manager->persist($region_19);


        $region_20 = new Region();
        $region_20->setName("Харьковская область");
        $manager->persist($region_20);


        $region_21 = new Region();
        $region_21->setName("Херсонская область");
        $manager->persist($region_21);


        $region_22 = new Region();
        $region_22->setName("Хмельницкая область");
        $manager->persist($region_22);


        $region_23 = new Region();
        $region_23->setName("Черкасская область");
        $manager->persist($region_23);


        $region_24 = new Region();
        $region_24->setName("Черниговская область");
        $manager->persist($region_24);


        $region_25 = new Region();
        $region_25->setName("Черновицкая область");
        $manager->persist($region_25);

        //Города
        $city_1 = new City();
        $city_1->setRegion($region_16);
        $city_1->setName("Абазовка");
        $manager->persist($city_1);


        $city_2 = new City();
        $city_2->setRegion($region_15);
        $city_2->setName("Авангард");
        $manager->persist($city_2);


        $city_3 = new City();
        $city_3->setRegion($region_5);
        $city_3->setName("Авдеевка");
        $manager->persist($city_3);


        $city_4 = new City();
        $city_4->setRegion($region_1);
        $city_4->setName("Аграрное");
        $manager->persist($city_4);


        $city_5 = new City();
        $city_5->setRegion($region_2);
        $city_5->setName("Агрономичное");
        $manager->persist($city_5);


        $city_6 = new City();
        $city_6->setRegion($region_14);
        $city_6->setName("Агрономия");
        $manager->persist($city_6);


        $city_7 = new City();
        $city_7->setRegion($region_22);
        $city_7->setName("Адамполь");
        $manager->persist($city_7);


        $city_8 = new City();
        $city_8->setRegion($region_11);
        $city_8->setName("Аджамка");
        $manager->persist($city_8);


        $city_9 = new City();
        $city_9->setRegion($region_1);
        $city_9->setName("Азовское");
        $manager->persist($city_9);


        $city_10 = new City();
        $city_10->setRegion($region_8);
        $city_10->setName("Акимовка");
        $manager->persist($city_10);


        $city_11 = new City();
        $city_11->setRegion($region_11);
        $city_11->setName("Александрия");
        $manager->persist($city_11);


        $city_12 = new City();
        $city_12->setRegion($region_11);
        $city_12->setName("Александровка");
        $manager->persist($city_12);


        $city_13 = new City();
        $city_13->setRegion($region_5);
        $city_13->setName("Александровка");
        $manager->persist($city_13);


        $city_14 = new City();
        $city_14->setRegion($region_12);
        $city_14->setName("Александровка");
        $manager->persist($city_14);


        $city_15 = new City();
        $city_15->setRegion($region_15);
        $city_15->setName("Александровка");
        $manager->persist($city_15);


        $city_16 = new City();
        $city_16->setRegion($region_15);
        $city_16->setName("Александровка");
        $manager->persist($city_16);


        $city_17 = new City();
        $city_17->setRegion($region_20);
        $city_17->setName("Александровка");
        $manager->persist($city_17);


        $city_18 = new City();
        $city_18->setRegion($region_10);
        $city_18->setName("Александровка");
        $manager->persist($city_18);


        $city_19 = new City();
        $city_19->setRegion($region_12);
        $city_19->setName("Александровск");
        $manager->persist($city_19);


        $city_20 = new City();
        $city_20->setRegion($region_4);
        $city_20->setName("Александрополь");
        $manager->persist($city_20);


        $city_21 = new City();
        $city_21->setRegion($region_4);
        $city_21->setName("Алексеевка");
        $manager->persist($city_21);


        $city_22 = new City();
        $city_22->setRegion($region_5);
        $city_22->setName("Алексеево-Дружковка");
        $manager->persist($city_22);


        $city_23 = new City();
        $city_23->setRegion($region_12);
        $city_23->setName("Алмазная");
        $manager->persist($city_23);


        $city_24 = new City();
        $city_24->setRegion($region_18);
        $city_24->setName("Алтыновка");
        $manager->persist($city_24);


        $city_25 = new City();
        $city_25->setRegion($region_1);
        $city_25->setName("Алупка");
        $manager->persist($city_25);


        $city_26 = new City();
        $city_26->setRegion($region_1);
        $city_26->setName("Алушта");
        $manager->persist($city_26);


        $city_27 = new City();
        $city_27->setRegion($region_12);
        $city_27->setName("Алчевск");
        $manager->persist($city_27);


        $city_28 = new City();
        $city_28->setRegion($region_5);
        $city_28->setName("Амвросиевка");
        $manager->persist($city_28);


        $city_29 = new City();
        $city_29->setRegion($region_15);
        $city_29->setName("Ананьев");
        $manager->persist($city_29);


        $city_30 = new City();
        $city_30->setRegion($region_7);
        $city_30->setName("Андреевка");
        $manager->persist($city_30);


        $city_31 = new City();
        $city_31->setRegion($region_6);
        $city_31->setName("Андреевка");
        $manager->persist($city_31);


        $city_32 = new City();
        $city_32->setRegion($region_8);
        $city_32->setName("Андреевка");
        $manager->persist($city_32);


        $city_33 = new City();
        $city_33->setRegion($region_4);
        $city_33->setName("Андреевка");
        $manager->persist($city_33);


        $city_34 = new City();
        $city_34->setRegion($region_4);
        $city_34->setName("Андреевка");
        $manager->persist($city_34);


        $city_35 = new City();
        $city_35->setRegion($region_18);
        $city_35->setName("Андрияшивка");
        $manager->persist($city_35);


        $city_36 = new City();
        $city_36->setRegion($region_6);
        $city_36->setName("Андрушевка");
        $manager->persist($city_36);


        $city_37 = new City();
        $city_37->setRegion($region_6);
        $city_37->setName("Андрушки");
        $manager->persist($city_37);


        $city_38 = new City();
        $city_38->setRegion($region_22);
        $city_38->setName("Аннополь");
        $manager->persist($city_38);


        $city_39 = new City();
        $city_39->setRegion($region_7);
        $city_39->setName("Анталовцы");
        $manager->persist($city_39);


        $city_40 = new City();
        $city_40->setRegion($region_21);
        $city_40->setName("Антоновка");
        $manager->persist($city_40);


        $city_41 = new City();
        $city_41->setRegion($region_17);
        $city_41->setName("Антоновка");
        $manager->persist($city_41);


        $city_42 = new City();
        $city_42->setRegion($region_17);
        $city_42->setName("Антополь");
        $manager->persist($city_42);


        $city_43 = new City();
        $city_43->setRegion($region_12);
        $city_43->setName("Антрацит");
        $manager->persist($city_43);


        $city_44 = new City();
        $city_44->setRegion($region_4);
        $city_44->setName("Апостолово");
        $manager->persist($city_44);


        $city_45 = new City();
        $city_45->setRegion($region_14);
        $city_45->setName("Арбузинка");
        $manager->persist($city_45);


        $city_46 = new City();
        $city_46->setRegion($region_1);
        $city_46->setName("Армянск");
        $manager->persist($city_46);


        $city_47 = new City();
        $city_47->setRegion($region_5);
        $city_47->setName("Артема");
        $manager->persist($city_47);


        $city_48 = new City();
        $city_48->setRegion($region_16);
        $city_48->setName("Артемовка");
        $manager->persist($city_48);


        $city_49 = new City();
        $city_49->setRegion($region_5);
        $city_49->setName("Артемово");
        $manager->persist($city_49);


        $city_50 = new City();
        $city_50->setRegion($region_12);
        $city_50->setName("Артемовск");
        $manager->persist($city_50);


        $city_51 = new City();
        $city_51->setRegion($region_5);
        $city_51->setName("Артемовск");
        $manager->persist($city_51);


        $city_52 = new City();
        $city_52->setRegion($region_5);
        $city_52->setName("Артемовское");
        $manager->persist($city_52);


        $city_53 = new City();
        $city_53->setRegion($region_15);
        $city_53->setName("Арциз");
        $manager->persist($city_53);


        $city_54 = new City();
        $city_54->setRegion($region_21);
        $city_54->setName("Аскания-Нова");
        $manager->persist($city_54);


        $city_55 = new City();
        $city_55->setRegion($region_4);
        $city_55->setName("Аулы");
        $manager->persist($city_55);


        $city_56 = new City();
        $city_56->setRegion($region_18);
        $city_56->setName("Ахтырка");
        $manager->persist($city_56);


        $city_57 = new City();
        $city_57->setRegion($region_1);
        $city_57->setName("Аэрофлотский");
        $manager->persist($city_57);


        $city_58 = new City();
        $city_58->setRegion($region_20);
        $city_58->setName("Бабаи");
        $manager->persist($city_58);


        $city_59 = new City();
        $city_59->setRegion($region_23);
        $city_59->setName("Бабанка");
        $manager->persist($city_59);


        $city_60 = new City();
        $city_60->setRegion($region_2);
        $city_60->setName("Бабин");
        $manager->persist($city_60);


        $city_61 = new City();
        $city_61->setRegion($region_17);
        $city_61->setName("Бабин");
        $manager->persist($city_61);


        $city_62 = new City();
        $city_62->setRegion($region_10);
        $city_62->setName("Бабинцы");
        $manager->persist($city_62);


        $city_63 = new City();
        $city_63->setRegion($region_1);
        $city_63->setName("Багерово");
        $manager->persist($city_63);


        $city_64 = new City();
        $city_64->setRegion($region_10);
        $city_64->setName("Багрин");
        $manager->persist($city_64);


        $city_65 = new City();
        $city_65->setRegion($region_17);
        $city_65->setName("Базальтовое");
        $manager->persist($city_65);


        $city_66 = new City();
        $city_66->setRegion($region_23);
        $city_66->setName("Байбузы");
        $manager->persist($city_66);


        $city_67 = new City();
        $city_67->setRegion($region_19);
        $city_67->setName("Байковцы");
        $manager->persist($city_67);


        $city_68 = new City();
        $city_68->setRegion($region_12);
        $city_68->setName("Байрачки");
        $manager->persist($city_68);


        $city_69 = new City();
        $city_69->setRegion($region_8);
        $city_69->setName("Балабино");
        $manager->persist($city_69);


        $city_70 = new City();
        $city_70->setRegion($region_20);
        $city_70->setName("Балаклея");
        $manager->persist($city_70);


        $city_71 = new City();
        $city_71->setRegion($region_2);
        $city_71->setName("Балки");
        $manager->persist($city_71);


        $city_72 = new City();
        $city_72->setRegion($region_4);
        $city_72->setName("Баловка");
        $manager->persist($city_72);


        $city_73 = new City();
        $city_73->setRegion($region_14);
        $city_73->setName("Баловное");
        $manager->persist($city_73);


        $city_74 = new City();
        $city_74->setRegion($region_15);
        $city_74->setName("Балта");
        $manager->persist($city_74);


        $city_75 = new City();
        $city_75->setRegion($region_14);
        $city_75->setName("Бандурка");
        $manager->persist($city_75);


        $city_76 = new City();
        $city_76->setRegion($region_18);
        $city_76->setName("Баничи");
        $manager->persist($city_76);


        $city_77 = new City();
        $city_77->setRegion($region_13);
        $city_77->setName("Баня лысовицкая");
        $manager->persist($city_77);


        $city_78 = new City();
        $city_78->setRegion($region_2);
        $city_78->setName("Бар");
        $manager->persist($city_78);


        $city_79 = new City();
        $city_79->setRegion($region_7);
        $city_79->setName("Баранинцы");
        $manager->persist($city_79);


        $city_80 = new City();
        $city_80->setRegion($region_6);
        $city_80->setName("Барановка");
        $manager->persist($city_80);


        $city_81 = new City();
        $city_81->setRegion($region_20);
        $city_81->setName("Барвенково");
        $manager->persist($city_81);


        $city_82 = new City();
        $city_82->setRegion($region_7);
        $city_82->setName("Барвинок");
        $manager->persist($city_82);


        $city_83 = new City();
        $city_83->setRegion($region_14);
        $city_83->setName("Бармашово");
        $manager->persist($city_83);


        $city_84 = new City();
        $city_84->setRegion($region_10);
        $city_84->setName("Барышевка");
        $manager->persist($city_84);


        $city_85 = new City();
        $city_85->setRegion($region_13);
        $city_85->setName("Басовка");
        $manager->persist($city_85);


        $city_86 = new City();
        $city_86->setRegion($region_24);
        $city_86->setName("Батурин");
        $manager->persist($city_86);


        $city_87 = new City();
        $city_87->setRegion($region_7);
        $city_87->setName("Батьево");
        $manager->persist($city_87);


        $city_88 = new City();
        $city_88->setRegion($region_22);
        $city_88->setName("Бахматовцы");
        $manager->persist($city_88);


        $city_89 = new City();
        $city_89->setRegion($region_24);
        $city_89->setName("Бахмач");
        $manager->persist($city_89);


        $city_90 = new City();
        $city_90->setRegion($region_5);
        $city_90->setName("Бахмутское");
        $manager->persist($city_90);


        $city_91 = new City();
        $city_91->setRegion($region_1);
        $city_91->setName("Бахчисарай");
        $manager->persist($city_91);


        $city_92 = new City();
        $city_92->setRegion($region_14);
        $city_92->setName("Баштанка");
        $manager->persist($city_92);


        $city_93 = new City();
        $city_93->setRegion($region_7);
        $city_93->setName("Бедевля");
        $manager->persist($city_93);


        $city_94 = new City();
        $city_94->setRegion($region_20);
        $city_94->setName("Безлюдовка");
        $manager->persist($city_94);


        $city_95 = new City();
        $city_95->setRegion($region_10);
        $city_95->setName("Безпятное");
        $manager->persist($city_95);


        $city_96 = new City();
        $city_96->setRegion($region_24);
        $city_96->setName("Безугловка");
        $manager->persist($city_96);


        $city_97 = new City();
        $city_97->setRegion($region_19);
        $city_97->setName("Белая");
        $manager->persist($city_97);


        $city_98 = new City();
        $city_98->setRegion($region_5);
        $city_98->setName("Белая гора");
        $manager->persist($city_98);


        $city_99 = new City();
        $city_99->setRegion($region_6);
        $city_99->setName("Белая Криница");
        $manager->persist($city_99);


        $city_100 = new City();
        $city_100->setRegion($region_17);
        $city_100->setName("Белая криница");
        $manager->persist($city_100);


        $city_101 = new City();
        $city_101->setRegion($region_10);
        $city_101->setName("Белая Церковь");
        $manager->persist($city_101);


        $city_102 = new City();
        $city_102->setRegion($region_15);
        $city_102->setName("Белгород-Днестровский");
        $manager->persist($city_102);


        $city_103 = new City();
        $city_103->setRegion($region_13);
        $city_103->setName("Белз");
        $manager->persist($city_103);


        $city_104 = new City();
        $city_104->setRegion($region_16);
        $city_104->setName("Белики");
        $manager->persist($city_104);


        $city_105 = new City();
        $city_105->setRegion($region_3);
        $city_105->setName("Белин");
        $manager->persist($city_105);


        $city_106 = new City();
        $city_106->setRegion($region_15);
        $city_106->setName("Белино");
        $manager->persist($city_106);


        $city_107 = new City();
        $city_107->setRegion($region_5);
        $city_107->setName("Белицкое");
        $manager->persist($city_107);


        $city_108 = new City();
        $city_108->setRegion($region_7);
        $city_108->setName("Белки");
        $manager->persist($city_108);


        $city_109 = new City();
        $city_109->setRegion($region_19);
        $city_109->setName("Белобожница");
        $manager->persist($city_109);


        $city_110 = new City();
        $city_110->setRegion($region_12);
        $city_110->setName("Беловодск");
        $manager->persist($city_110);


        $city_111 = new City();
        $city_111->setRegion($region_18);
        $city_111->setName("Беловоды");
        $manager->persist($city_111);


        $city_112 = new City();
        $city_112->setRegion($region_1);
        $city_112->setName("Белоглинка");
        $manager->persist($city_112);


        $city_113 = new City();
        $city_113->setRegion($region_10);
        $city_113->setName("Белогородка");
        $manager->persist($city_113);


        $city_114 = new City();
        $city_114->setRegion($region_1);
        $city_114->setName("Белогорск");
        $manager->persist($city_114);


        $city_115 = new City();
        $city_115->setRegion($region_22);
        $city_115->setName("Белогорье");
        $manager->persist($city_115);


        $city_116 = new City();
        $city_116->setRegion($region_12);
        $city_116->setName("Белое");
        $manager->persist($city_116);


        $city_117 = new City();
        $city_117->setRegion($region_21);
        $city_117->setName("Белозерка");
        $manager->persist($city_117);


        $city_118 = new City();
        $city_118->setRegion($region_5);
        $city_118->setName("Белозерское");
        $manager->persist($city_118);


        $city_119 = new City();
        $city_119->setRegion($region_23);
        $city_119->setName("Белозорье");
        $manager->persist($city_119);


        $city_120 = new City();
        $city_120->setRegion($region_19);
        $city_120->setName("Белокриница");
        $manager->persist($city_120);


        $city_121 = new City();
        $city_121->setRegion($region_5);
        $city_121->setName("Белокузьминовка");
        $manager->persist($city_121);


        $city_122 = new City();
        $city_122->setRegion($region_12);
        $city_122->setName("Белокуракино");
        $manager->persist($city_122);


        $city_123 = new City();
        $city_123->setRegion($region_18);
        $city_123->setName("Белополье");
        $manager->persist($city_123);


        $city_124 = new City();
        $city_124->setRegion($region_12);
        $city_124->setName("Белореченский");
        $manager->persist($city_124);


        $city_125 = new City();
        $city_125->setRegion($region_24);
        $city_125->setName("Белошицкая слобода");
        $manager->persist($city_125);


        $city_126 = new City();
        $city_126->setRegion($region_20);
        $city_126->setName("Белый колодезь");
        $manager->persist($city_126);


        $city_127 = new City();
        $city_127->setRegion($region_15);
        $city_127->setName("Беляевка");
        $manager->persist($city_127);


        $city_128 = new City();
        $city_128->setRegion($region_6);
        $city_128->setName("Бердичев");
        $manager->persist($city_128);


        $city_129 = new City();
        $city_129->setRegion($region_8);
        $city_129->setName("Бердянск");
        $manager->persist($city_129);


        $city_130 = new City();
        $city_130->setRegion($region_8);
        $city_130->setName("Бердянское");
        $manager->persist($city_130);


        $city_131 = new City();
        $city_131->setRegion($region_7);
        $city_131->setName("Берегово");
        $manager->persist($city_131);


        $city_132 = new City();
        $city_132->setRegion($region_25);
        $city_132->setName("Берегомет");
        $manager->persist($city_132);


        $city_133 = new City();
        $city_133->setRegion($region_19);
        $city_133->setName("Бережаны");
        $manager->persist($city_133);


        $city_134 = new City();
        $city_134->setRegion($region_11);
        $city_134->setName("Бережинка");
        $manager->persist($city_134);


        $city_135 = new City();
        $city_135->setRegion($region_18);
        $city_135->setName("Береза");
        $manager->persist($city_135);


        $city_136 = new City();
        $city_136->setRegion($region_14);
        $city_136->setName("Березанка");
        $manager->persist($city_136);


        $city_137 = new City();
        $city_137->setRegion($region_24);
        $city_137->setName("Березанка");
        $manager->persist($city_137);


        $city_138 = new City();
        $city_138->setRegion($region_10);
        $city_138->setName("Березань");
        $manager->persist($city_138);


        $city_139 = new City();
        $city_139->setRegion($region_13);
        $city_139->setName("Березина");
        $manager->persist($city_139);


        $city_140 = new City();
        $city_140->setRegion($region_15);
        $city_140->setName("Березино");
        $manager->persist($city_140);


        $city_141 = new City();
        $city_141->setRegion($region_24);
        $city_141->setName("Березна");
        $manager->persist($city_141);


        $city_142 = new City();
        $city_142->setRegion($region_14);
        $city_142->setName("Березнеговатое");
        $manager->persist($city_142);


        $city_143 = new City();
        $city_143->setRegion($region_17);
        $city_143->setName("Березно");
        $manager->persist($city_143);


        $city_144 = new City();
        $city_144->setRegion($region_20);
        $city_144->setName("Березовка");
        $manager->persist($city_144);


        $city_145 = new City();
        $city_145->setRegion($region_15);
        $city_145->setName("Березовка");
        $manager->persist($city_145);


        $city_146 = new City();
        $city_146->setRegion($region_7);
        $city_146->setName("Березово");
        $manager->persist($city_146);


        $city_147 = new City();
        $city_147->setRegion($region_20);
        $city_147->setName("Берека");
        $manager->persist($city_147);


        $city_148 = new City();
        $city_148->setRegion($region_3);
        $city_148->setName("Берестечко");
        $manager->persist($city_148);


        $city_149 = new City();
        $city_149->setRegion($region_17);
        $city_149->setName("Берестовец");
        $manager->persist($city_149);


        $city_150 = new City();
        $city_150->setRegion($region_21);
        $city_150->setName("Берислав");
        $manager->persist($city_150);


        $city_151 = new City();
        $city_151->setRegion($region_2);
        $city_151->setName("Бершадь");
        $manager->persist($city_151);


        $city_152 = new City();
        $city_152->setRegion($region_10);
        $city_152->setName("Беспечная");
        $manager->persist($city_152);


        $city_153 = new City();
        $city_153->setRegion($region_6);
        $city_153->setName("Бехи");
        $manager->persist($city_153);


        $city_154 = new City();
        $city_154->setRegion($region_16);
        $city_154->setName("Биологичное");
        $manager->persist($city_154);


        $city_155 = new City();
        $city_155->setRegion($region_20);
        $city_155->setName("Бирки");
        $manager->persist($city_155);


        $city_156 = new City();
        $city_156->setRegion($region_13);
        $city_156->setName("Бисковичи");
        $manager->persist($city_156);


        $city_157 = new City();
        $city_157->setRegion($region_1);
        $city_157->setName("Ближнее");
        $manager->persist($city_157);


        $city_158 = new City();
        $city_158->setRegion($region_20);
        $city_158->setName("Близнюки");
        $manager->persist($city_158);


        $city_159 = new City();
        $city_159->setRegion($region_10);
        $city_159->setName("Блиставица");
        $manager->persist($city_159);


        $city_160 = new City();
        $city_160->setRegion($region_24);
        $city_160->setName("Бобрик");
        $manager->persist($city_160);


        $city_161 = new City();
        $city_161->setRegion($region_12);
        $city_161->setName("Бобриково");
        $manager->persist($city_161);


        $city_162 = new City();
        $city_162->setRegion($region_11);
        $city_162->setName("Бобринец");
        $manager->persist($city_162);


        $city_163 = new City();
        $city_163->setRegion($region_13);
        $city_163->setName("Бобрка");
        $manager->persist($city_163);


        $city_164 = new City();
        $city_164->setRegion($region_24);
        $city_164->setName("Бобровица");
        $manager->persist($city_164);


        $city_165 = new City();
        $city_165->setRegion($region_12);
        $city_165->setName("Боброво");
        $manager->persist($city_165);


        $city_166 = new City();
        $city_166->setRegion($region_7);
        $city_166->setName("Богдан");
        $manager->persist($city_166);


        $city_167 = new City();
        $city_167->setRegion($region_11);
        $city_167->setName("Богдановка");
        $manager->persist($city_167);


        $city_168 = new City();
        $city_168->setRegion($region_18);
        $city_168->setName("Богдановка");
        $manager->persist($city_168);


        $city_169 = new City();
        $city_169->setRegion($region_10);
        $city_169->setName("Богдановка");
        $manager->persist($city_169);


        $city_170 = new City();
        $city_170->setRegion($region_10);
        $city_170->setName("Богдановка");
        $manager->persist($city_170);


        $city_171 = new City();
        $city_171->setRegion($region_22);
        $city_171->setName("Богдановцы");
        $manager->persist($city_171);


        $city_172 = new City();
        $city_172->setRegion($region_20);
        $city_172->setName("Богодухов");
        $manager->persist($city_172);


        $city_173 = new City();
        $city_173->setRegion($region_9);
        $city_173->setName("Богородчаны");
        $manager->persist($city_173);


        $city_174 = new City();
        $city_174->setRegion($region_5);
        $city_174->setName("Богоявленка");
        $manager->persist($city_174);


        $city_175 = new City();
        $city_175->setRegion($region_4);
        $city_175->setName("Богуслав");
        $manager->persist($city_175);


        $city_176 = new City();
        $city_176->setRegion($region_10);
        $city_176->setName("Богуслав");
        $manager->persist($city_176);


        $city_177 = new City();
        $city_177->setRegion($region_9);
        $city_177->setName("Боднаров");
        $manager->persist($city_177);


        $city_178 = new City();
        $city_178->setRegion($region_16);
        $city_178->setName("Божковское");
        $manager->persist($city_178);


        $city_179 = new City();
        $city_179->setRegion($region_19);
        $city_179->setName("Боков");
        $manager->persist($city_179);


        $city_180 = new City();
        $city_180->setRegion($region_15);
        $city_180->setName("Болград");
        $manager->persist($city_180);


        $city_181 = new City();
        $city_181->setRegion($region_9);
        $city_181->setName("Болехов");
        $manager->persist($city_181);


        $city_182 = new City();
        $city_182->setRegion($region_11);
        $city_182->setName("Большая Виска");
        $manager->persist($city_182);


        $city_183 = new City();
        $city_183->setRegion($region_17);
        $city_183->setName("Большой Олексин");
        $manager->persist($city_183);


        $city_184 = new City();
        $city_184->setRegion($region_1);
        $city_184->setName("Бондаренково");
        $manager->persist($city_184);


        $city_185 = new City();
        $city_185->setRegion($region_6);
        $city_185->setName("Бондари");
        $manager->persist($city_185);


        $city_186 = new City();
        $city_186->setRegion($region_6);
        $city_186->setName("Бондаривка");
        $manager->persist($city_186);


        $city_187 = new City();
        $city_187->setRegion($region_3);
        $city_187->setName("Боратин");
        $manager->persist($city_187);


        $city_188 = new City();
        $city_188->setRegion($region_24);
        $city_188->setName("Борзна");
        $manager->persist($city_188);


        $city_189 = new City();
        $city_189->setRegion($region_13);
        $city_189->setName("Борислав");
        $manager->persist($city_189);


        $city_190 = new City();
        $city_190->setRegion($region_10);
        $city_190->setName("Борисполь");
        $manager->persist($city_190);


        $city_191 = new City();
        $city_191->setRegion($region_16);
        $city_191->setName("Борки");
        $manager->persist($city_191);


        $city_192 = new City();
        $city_192->setRegion($region_13);
        $city_192->setName("Борки");
        $manager->persist($city_192);


        $city_193 = new City();
        $city_193->setRegion($region_20);
        $city_193->setName("Боровая");
        $manager->persist($city_193);


        $city_194 = new City();
        $city_194->setRegion($region_10);
        $city_194->setName("Боровая");
        $manager->persist($city_194);


        $city_195 = new City();
        $city_195->setRegion($region_12);
        $city_195->setName("Боровеньки");
        $manager->persist($city_195);


        $city_196 = new City();
        $city_196->setRegion($region_12);
        $city_196->setName("Боровское");
        $manager->persist($city_196);


        $city_197 = new City();
        $city_197->setRegion($region_25);
        $city_197->setName("Боровцы");
        $manager->persist($city_197);


        $city_198 = new City();
        $city_198->setRegion($region_10);
        $city_198->setName("Бородянка");
        $manager->persist($city_198);


        $city_199 = new City();
        $city_199->setRegion($region_21);
        $city_199->setName("Борозенское");
        $manager->persist($city_199);


        $city_200 = new City();
        $city_200->setRegion($region_18);
        $city_200->setName("Боромля");
        $manager->persist($city_200);


        $city_201 = new City();
        $city_201->setRegion($region_24);
        $city_201->setName("Боромыки");
        $manager->persist($city_201);


        $city_202 = new City();
        $city_202->setRegion($region_7);
        $city_202->setName("Боронява");
        $manager->persist($city_202);


        $city_203 = new City();
        $city_203->setRegion($region_10);
        $city_203->setName("Бортничи");
        $manager->persist($city_203);


        $city_204 = new City();
        $city_204->setRegion($region_19);
        $city_204->setName("Борщев");
        $manager->persist($city_204);


        $city_205 = new City();
        $city_205->setRegion($region_15);
        $city_205->setName("Борщи");
        $manager->persist($city_205);


        $city_206 = new City();
        $city_206->setRegion($region_2);
        $city_206->setName("Бохоники");
        $manager->persist($city_206);


        $city_207 = new City();
        $city_207->setRegion($region_25);
        $city_207->setName("Бояны");
        $manager->persist($city_207);


        $city_208 = new City();
        $city_208->setRegion($region_10);
        $city_208->setName("Боярка");
        $manager->persist($city_208);


        $city_209 = new City();
        $city_209->setRegion($region_4);
        $city_209->setName("Брагиновка");
        $manager->persist($city_209);


        $city_210 = new City();
        $city_210->setRegion($region_4);
        $city_210->setName("Брагиновка");
        $manager->persist($city_210);


        $city_211 = new City();
        $city_211->setRegion($region_2);
        $city_211->setName("Браилов");
        $manager->persist($city_211);


        $city_212 = new City();
        $city_212->setRegion($region_14);
        $city_212->setName("Братское");
        $manager->persist($city_212);


        $city_213 = new City();
        $city_213->setRegion($region_4);
        $city_213->setName("Братское");
        $manager->persist($city_213);


        $city_214 = new City();
        $city_214->setRegion($region_2);
        $city_214->setName("Брацлав");
        $manager->persist($city_214);


        $city_215 = new City();
        $city_215->setRegion($region_24);
        $city_215->setName("Бригинцы");
        $manager->persist($city_215);


        $city_216 = new City();
        $city_216->setRegion($region_21);
        $city_216->setName("Брилевка");
        $manager->persist($city_216);


        $city_217 = new City();
        $city_217->setRegion($region_15);
        $city_217->setName("Бритовка");
        $manager->persist($city_217);


        $city_218 = new City();
        $city_218->setRegion($region_10);
        $city_218->setName("Бровары");
        $manager->persist($city_218);


        $city_219 = new City();
        $city_219->setRegion($region_2);
        $city_219->setName("Бродецкое");
        $manager->persist($city_219);


        $city_220 = new City();
        $city_220->setRegion($region_13);
        $city_220->setName("Броды");
        $manager->persist($city_220);


        $city_221 = new City();
        $city_221->setRegion($region_6);
        $city_221->setName("Броницкая Гута");
        $manager->persist($city_221);


        $city_222 = new City();
        $city_222->setRegion($region_9);
        $city_222->setName("Брошнив");
        $manager->persist($city_222);


        $city_223 = new City();
        $city_223->setRegion($region_9);
        $city_223->setName("Брошнив-осада");
        $manager->persist($city_223);


        $city_224 = new City();
        $city_224->setRegion($region_6);
        $city_224->setName("Брусилов");
        $manager->persist($city_224);


        $city_225 = new City();
        $city_225->setRegion($region_13);
        $city_225->setName("Брюховичи");
        $manager->persist($city_225);


        $city_226 = new City();
        $city_226->setRegion($region_12);
        $city_226->setName("Брянка");
        $manager->persist($city_226);


        $city_227 = new City();
        $city_227->setRegion($region_17);
        $city_227->setName("Бугаевка");
        $manager->persist($city_227);


        $city_228 = new City();
        $city_228->setRegion($region_17);
        $city_228->setName("Бугрин");
        $manager->persist($city_228);


        $city_229 = new City();
        $city_229->setRegion($region_14);
        $city_229->setName("Бугское");
        $manager->persist($city_229);


        $city_230 = new City();
        $city_230->setRegion($region_19);
        $city_230->setName("Буданов");
        $manager->persist($city_230);


        $city_231 = new City();
        $city_231->setRegion($region_18);
        $city_231->setName("Будивельное");
        $manager->persist($city_231);


        $city_232 = new City();
        $city_232->setRegion($region_18);
        $city_232->setName("Будилка");
        $manager->persist($city_232);


        $city_233 = new City();
        $city_233->setRegion($region_23);
        $city_233->setName("Будище");
        $manager->persist($city_233);


        $city_234 = new City();
        $city_234->setRegion($region_23);
        $city_234->setName("Будки");
        $manager->persist($city_234);


        $city_235 = new City();
        $city_235->setRegion($region_20);
        $city_235->setName("Буды");
        $manager->persist($city_235);


        $city_236 = new City();
        $city_236->setRegion($region_23);
        $city_236->setName("Бужанка");
        $manager->persist($city_236);


        $city_237 = new City();
        $city_237->setRegion($region_10);
        $city_237->setName("Бузовая");
        $manager->persist($city_237);


        $city_238 = new City();
        $city_238->setRegion($region_23);
        $city_238->setName("Бузуков");
        $manager->persist($city_238);


        $city_239 = new City();
        $city_239->setRegion($region_18);
        $city_239->setName("Буймеровка");
        $manager->persist($city_239);


        $city_240 = new City();
        $city_240->setRegion($region_15);
        $city_240->setName("Бурлача балка");
        $manager->persist($city_240);


        $city_241 = new City();
        $city_241->setRegion($region_22);
        $city_241->setName("Буртын");
        $manager->persist($city_241);


        $city_242 = new City();
        $city_242->setRegion($region_9);
        $city_242->setName("Бурштын");
        $manager->persist($city_242);


        $city_243 = new City();
        $city_243->setRegion($region_18);
        $city_243->setName("Бурынь");
        $manager->persist($city_243);


        $city_244 = new City();
        $city_244->setRegion($region_13);
        $city_244->setName("Буск");
        $manager->persist($city_244);


        $city_245 = new City();
        $city_245->setRegion($region_16);
        $city_245->setName("Бутенки");
        $manager->persist($city_245);


        $city_246 = new City();
        $city_246->setRegion($region_3);
        $city_246->setName("Буцин");
        $manager->persist($city_246);


        $city_247 = new City();
        $city_247->setRegion($region_10);
        $city_247->setName("Буча");
        $manager->persist($city_247);


        $city_248 = new City();
        $city_248->setRegion($region_13);
        $city_248->setName("Бучалы");
        $manager->persist($city_248);


        $city_249 = new City();
        $city_249->setRegion($region_19);
        $city_249->setName("Бучач");
        $manager->persist($city_249);


        $city_250 = new City();
        $city_250->setRegion($region_7);
        $city_250->setName("Буштыно");
        $manager->persist($city_250);


        $city_251 = new City();
        $city_251->setRegion($region_6);
        $city_251->setName("Быковка");
        $manager->persist($city_251);


        $city_252 = new City();
        $city_252->setRegion($region_5);
        $city_252->setName("Былбасовка");
        $manager->persist($city_252);


        $city_253 = new City();
        $city_253->setRegion($region_6);
        $city_253->setName("Быстрик");
        $manager->persist($city_253);


        $city_254 = new City();
        $city_254->setRegion($region_17);
        $city_254->setName("Быстричи");
        $manager->persist($city_254);


        $city_255 = new City();
        $city_255->setRegion($region_2);
        $city_255->setName("В.Киреевка");
        $manager->persist($city_255);


        $city_256 = new City();
        $city_256->setRegion($region_20);
        $city_256->setName("Валки");
        $manager->persist($city_256);


        $city_257 = new City();
        $city_257->setRegion($region_4);
        $city_257->setName("Валовое");
        $manager->persist($city_257);


        $city_258 = new City();
        $city_258->setRegion($region_12);
        $city_258->setName("Валуйское");
        $manager->persist($city_258);


        $city_259 = new City();
        $city_259->setRegion($region_25);
        $city_259->setName("Валя кузьмина");
        $manager->persist($city_259);


        $city_260 = new City();
        $city_260->setRegion($region_23);
        $city_260->setName("Валява");
        $manager->persist($city_260);


        $city_261 = new City();
        $city_261->setRegion($region_13);
        $city_261->setName("Ваньковичи");
        $manager->persist($city_261);


        $city_262 = new City();
        $city_262->setRegion($region_2);
        $city_262->setName("Вапнярка");
        $manager->persist($city_262);


        $city_263 = new City();
        $city_263->setRegion($region_24);
        $city_263->setName("Варва");
        $manager->persist($city_263);


        $city_264 = new City();
        $city_264->setRegion($region_19);
        $city_264->setName("Варваринцы");
        $manager->persist($city_264);


        $city_265 = new City();
        $city_265->setRegion($region_17);
        $city_265->setName("Варковичи");
        $manager->persist($city_265);


        $city_266 = new City();
        $city_266->setRegion($region_7);
        $city_266->setName("Вары");
        $manager->persist($city_266);


        $city_267 = new City();
        $city_267->setRegion($region_8);
        $city_267->setName("Васильевка");
        $manager->persist($city_267);


        $city_268 = new City();
        $city_268->setRegion($region_23);
        $city_268->setName("Васильков");
        $manager->persist($city_268);


        $city_269 = new City();
        $city_269->setRegion($region_10);
        $city_269->setName("Васильков");
        $manager->persist($city_269);


        $city_270 = new City();
        $city_270->setRegion($region_4);
        $city_270->setName("Васильковка");
        $manager->persist($city_270);


        $city_271 = new City();
        $city_271->setRegion($region_20);
        $city_271->setName("Васищево");
        $manager->persist($city_271);


        $city_272 = new City();
        $city_272->setRegion($region_6);
        $city_272->setName("Васьковичи");
        $manager->persist($city_272);


        $city_273 = new City();
        $city_273->setRegion($region_23);
        $city_273->setName("Ватутино");
        $manager->persist($city_273);


        $city_274 = new City();
        $city_274->setRegion($region_20);
        $city_274->setName("Ватутино");
        $manager->persist($city_274);


        $city_275 = new City();
        $city_275->setRegion($region_12);
        $city_275->setName("Вахрушево");
        $manager->persist($city_275);


        $city_276 = new City();
        $city_276->setRegion($region_25);
        $city_276->setName("Вашковцы");
        $manager->persist($city_276);


        $city_277 = new City();
        $city_277->setRegion($region_20);
        $city_277->setName("Введенка");
        $manager->persist($city_277);


        $city_278 = new City();
        $city_278->setRegion($region_21);
        $city_278->setName("Великая Александровка");
        $manager->persist($city_278);


        $city_279 = new City();
        $city_279->setRegion($region_16);
        $city_279->setName("Великая Багачка");
        $manager->persist($city_279);


        $city_280 = new City();
        $city_280->setRegion($region_7);
        $city_280->setName("Великая бакта");
        $manager->persist($city_280);


        $city_281 = new City();
        $city_281->setRegion($region_8);
        $city_281->setName("Великая Белозерка");
        $manager->persist($city_281);


        $city_282 = new City();
        $city_282->setRegion($region_19);
        $city_282->setName("Великая Березовица");
        $manager->persist($city_282);


        $city_283 = new City();
        $city_283->setRegion($region_3);
        $city_283->setName("Великая глуша");
        $manager->persist($city_283);


        $city_284 = new City();
        $city_284->setRegion($region_13);
        $city_284->setName("Великая горожанка");
        $manager->persist($city_284);


        $city_285 = new City();
        $city_285->setRegion($region_7);
        $city_285->setName("Великая добронь");
        $manager->persist($city_285);


        $city_286 = new City();
        $city_286->setRegion($region_24);
        $city_286->setName("Великая дорога");
        $manager->persist($city_286);


        $city_287 = new City();
        $city_287->setRegion($region_24);
        $city_287->setName("Великая дочь");
        $manager->persist($city_287);


        $city_288 = new City();
        $city_288->setRegion($region_21);
        $city_288->setName("Великая кардашинка");
        $manager->persist($city_288);


        $city_289 = new City();
        $city_289->setRegion($region_16);
        $city_289->setName("Великая круча");
        $manager->persist($city_289);


        $city_290 = new City();
        $city_290->setRegion($region_21);
        $city_290->setName("Великая Лепетиха");
        $manager->persist($city_290);


        $city_291 = new City();
        $city_291->setRegion($region_15);
        $city_291->setName("Великая Михайловка");
        $manager->persist($city_291);


        $city_292 = new City();
        $city_292->setRegion($region_5);
        $city_292->setName("Великая Новоселка");
        $manager->persist($city_292);


        $city_293 = new City();
        $city_293->setRegion($region_17);
        $city_293->setName("Великая омеляна");
        $manager->persist($city_293);


        $city_294 = new City();
        $city_294->setRegion($region_18);
        $city_294->setName("Великая Писаревка");
        $manager->persist($city_294);


        $city_295 = new City();
        $city_295->setRegion($region_11);
        $city_295->setName("Великая северинка");
        $manager->persist($city_295);


        $city_296 = new City();
        $city_296->setRegion($region_18);
        $city_296->setName("Великая чернеччина");
        $manager->persist($city_296);


        $city_297 = new City();
        $city_297->setRegion($region_23);
        $city_297->setName("Великая яблоновка");
        $manager->persist($city_297);


        $city_298 = new City();
        $city_298->setRegion($region_19);
        $city_298->setName("Великие Борки");
        $manager->persist($city_298);


        $city_299 = new City();
        $city_299->setRegion($region_18);
        $city_299->setName("Великие вильмы");
        $manager->persist($city_299);


        $city_300 = new City();
        $city_300->setRegion($region_19);
        $city_300->setName("Великие гаи");
        $manager->persist($city_300);


        $city_301 = new City();
        $city_301->setRegion($region_13);
        $city_301->setName("Великие Глебовичи");
        $manager->persist($city_301);


        $city_302 = new City();
        $city_302->setRegion($region_10);
        $city_302->setName("Великие гуляки");
        $manager->persist($city_302);


        $city_303 = new City();
        $city_303->setRegion($region_19);
        $city_303->setName("Великие Дедеркалы");
        $manager->persist($city_303);


        $city_304 = new City();
        $city_304->setRegion($region_21);
        $city_304->setName("Великие копаны");
        $manager->persist($city_304);


        $city_305 = new City();
        $city_305->setRegion($region_6);
        $city_305->setName("Великие Коровинцы");
        $manager->persist($city_305);


        $city_306 = new City();
        $city_306->setRegion($region_16);
        $city_306->setName("Великие крынки");
        $manager->persist($city_306);


        $city_307 = new City();
        $city_307->setRegion($region_7);
        $city_307->setName("Великие лазы");
        $manager->persist($city_307);


        $city_308 = new City();
        $city_308->setRegion($region_7);
        $city_308->setName("Великие лучки");
        $manager->persist($city_308);


        $city_309 = new City();
        $city_309->setRegion($region_13);
        $city_309->setName("Великие Мосты");
        $manager->persist($city_309);


        $city_310 = new City();
        $city_310->setRegion($region_6);
        $city_310->setName("Великие низгорцы");
        $manager->persist($city_310);


        $city_311 = new City();
        $city_311->setRegion($region_20);
        $city_311->setName("Великие проходы");
        $manager->persist($city_311);


        $city_312 = new City();
        $city_312->setRegion($region_17);
        $city_312->setName("Великий алексин");
        $manager->persist($city_312);


        $city_313 = new City();
        $city_313->setRegion($region_7);
        $city_313->setName("Великий Березный");
        $manager->persist($city_313);


        $city_314 = new City();
        $city_314->setRegion($region_20);
        $city_314->setName("Великий Бурлук");
        $manager->persist($city_314);


        $city_315 = new City();
        $city_315->setRegion($region_7);
        $city_315->setName("Великий Бычков");
        $manager->persist($city_315);


        $city_316 = new City();
        $city_316->setRegion($region_19);
        $city_316->setName("Великий Глубочек");
        $manager->persist($city_316);


        $city_317 = new City();
        $city_317->setRegion($region_17);
        $city_317->setName("Великий житин");
        $manager->persist($city_317);


        $city_318 = new City();
        $city_318->setRegion($region_25);
        $city_318->setName("Великий кучуров");
        $manager->persist($city_318);


        $city_319 = new City();
        $city_319->setRegion($region_13);
        $city_319->setName("Великий Любень");
        $manager->persist($city_319);


        $city_320 = new City();
        $city_320->setRegion($region_2);
        $city_320->setName("Великий мытник");
        $manager->persist($city_320);


        $city_321 = new City();
        $city_321->setRegion($region_3);
        $city_321->setName("Великий омеляник");
        $manager->persist($city_321);


        $city_322 = new City();
        $city_322->setRegion($region_15);
        $city_322->setName("Великодолинское");
        $manager->persist($city_322);


        $city_323 = new City();
        $city_323->setRegion($region_13);
        $city_323->setName("Великое колодно");
        $manager->persist($city_323);


        $city_324 = new City();
        $city_324->setRegion($region_13);
        $city_324->setName("Великоселки");
        $manager->persist($city_324);


        $city_325 = new City();
        $city_325->setRegion($region_12);
        $city_325->setName("Великоцк");
        $manager->persist($city_325);


        $city_326 = new City();
        $city_326->setRegion($region_11);
        $city_326->setName("Вельшанка");
        $manager->persist($city_326);


        $city_327 = new City();
        $city_327->setRegion($region_2);
        $city_327->setName("Вендичаны");
        $manager->persist($city_327);


        $city_328 = new City();
        $city_328->setRegion($region_10);
        $city_328->setName("Веприк");
        $manager->persist($city_328);


        $city_329 = new City();
        $city_329->setRegion($region_22);
        $city_329->setName("Вербка");
        $manager->persist($city_329);


        $city_330 = new City();
        $city_330->setRegion($region_4);
        $city_330->setName("Вербки");
        $manager->persist($city_330);


        $city_331 = new City();
        $city_331->setRegion($region_11);
        $city_331->setName("Верблюжка");
        $manager->persist($city_331);


        $city_332 = new City();
        $city_332->setRegion($region_9);
        $city_332->setName("Вербовец");
        $manager->persist($city_332);


        $city_333 = new City();
        $city_333->setRegion($region_23);
        $city_333->setName("Вербовец");
        $manager->persist($city_333);


        $city_334 = new City();
        $city_334->setRegion($region_12);
        $city_334->setName("Вергулевка");
        $manager->persist($city_334);


        $city_335 = new City();
        $city_335->setRegion($region_23);
        $city_335->setName("Вергуны");
        $manager->persist($city_335);


        $city_336 = new City();
        $city_336->setRegion($region_17);
        $city_336->setName("Вересневое");
        $manager->persist($city_336);


        $city_337 = new City();
        $city_337->setRegion($region_6);
        $city_337->setName("Вересы");
        $manager->persist($city_337);


        $city_338 = new City();
        $city_338->setRegion($region_24);
        $city_338->setName("Вертиевка");
        $manager->persist($city_338);


        $city_339 = new City();
        $city_339->setRegion($region_4);
        $city_339->setName("Верхнеднепровск");
        $manager->persist($city_339);


        $city_340 = new City();
        $city_340->setRegion($region_7);
        $city_340->setName("Верхнее водяное");
        $manager->persist($city_340);


        $city_341 = new City();
        $city_341->setRegion($region_13);
        $city_341->setName("Верхнее синевидное");
        $manager->persist($city_341);


        $city_342 = new City();
        $city_342->setRegion($region_1);
        $city_342->setName("Верхнесадовое");
        $manager->persist($city_342);


        $city_343 = new City();
        $city_343->setRegion($region_21);
        $city_343->setName("Верхние серогозы");
        $manager->persist($city_343);


        $city_344 = new City();
        $city_344->setRegion($region_21);
        $city_344->setName("Верхний Рогачик");
        $manager->persist($city_344);


        $city_345 = new City();
        $city_345->setRegion($region_9);
        $city_345->setName("Верхний струтинь");
        $manager->persist($city_345);


        $city_346 = new City();
        $city_346->setRegion($region_8);
        $city_346->setName("Верхний токмак первый");
        $manager->persist($city_346);


        $city_347 = new City();
        $city_347->setRegion($region_23);
        $city_347->setName("Верхнячка");
        $manager->persist($city_347);


        $city_348 = new City();
        $city_348->setRegion($region_8);
        $city_348->setName("Верхняя криница");
        $manager->persist($city_348);


        $city_349 = new City();
        $city_349->setRegion($region_18);
        $city_349->setName("Верхняя сыроватка");
        $manager->persist($city_349);


        $city_350 = new City();
        $city_350->setRegion($region_17);
        $city_350->setName("Верхов");
        $manager->persist($city_350);


        $city_351 = new City();
        $city_351->setRegion($region_9);
        $city_351->setName("Верховина");
        $manager->persist($city_351);


        $city_352 = new City();
        $city_352->setRegion($region_4);
        $city_352->setName("Верховцево");
        $manager->persist($city_352);


        $city_353 = new City();
        $city_353->setRegion($region_14);
        $city_353->setName("Веселиново");
        $manager->persist($city_353);


        $city_354 = new City();
        $city_354->setRegion($region_8);
        $city_354->setName("Веселое");
        $manager->persist($city_354);


        $city_355 = new City();
        $city_355->setRegion($region_21);
        $city_355->setName("Веселое");
        $manager->persist($city_355);


        $city_356 = new City();
        $city_356->setRegion($region_4);
        $city_356->setName("Веселое");
        $manager->persist($city_356);


        $city_357 = new City();
        $city_357->setRegion($region_14);
        $city_357->setName("Весняное");
        $manager->persist($city_357);


        $city_358 = new City();
        $city_358->setRegion($region_25);
        $city_358->setName("Виженка");
        $manager->persist($city_358);


        $city_359 = new City();
        $city_359->setRegion($region_25);
        $city_359->setName("Вижница");
        $manager->persist($city_359);


        $city_360 = new City();
        $city_360->setRegion($region_15);
        $city_360->setName("Визирка");
        $manager->persist($city_360);


        $city_361 = new City();
        $city_361->setRegion($region_1);
        $city_361->setName("Вилино");
        $manager->persist($city_361);


        $city_362 = new City();
        $city_362->setRegion($region_15);
        $city_362->setName("Вилково");
        $manager->persist($city_362);


        $city_363 = new City();
        $city_363->setRegion($region_2);
        $city_363->setName("Вилы");
        $manager->persist($city_363);


        $city_364 = new City();
        $city_364->setRegion($region_23);
        $city_364->setName("Вильховец");
        $manager->persist($city_364);


        $city_365 = new City();
        $city_365->setRegion($region_13);
        $city_365->setName("Винники");
        $manager->persist($city_365);


        $city_366 = new City();
        $city_366->setRegion($region_13);
        $city_366->setName("Винники");
        $manager->persist($city_366);


        $city_367 = new City();
        $city_367->setRegion($region_2);
        $city_367->setName("Винница");
        $manager->persist($city_367);


        $city_368 = new City();
        $city_368->setRegion($region_10);
        $city_368->setName("Винницкие ставы");
        $manager->persist($city_368);


        $city_369 = new City();
        $city_369->setRegion($region_2);
        $city_369->setName("Винницкие хутора");
        $manager->persist($city_369);


        $city_370 = new City();
        $city_370->setRegion($region_1);
        $city_370->setName("Виноградное");
        $manager->persist($city_370);


        $city_371 = new City();
        $city_371->setRegion($region_7);
        $city_371->setName("Виноградов");
        $manager->persist($city_371);


        $city_372 = new City();
        $city_372->setRegion($region_22);
        $city_372->setName("Виньковцы");
        $manager->persist($city_372);


        $city_373 = new City();
        $city_373->setRegion($region_10);
        $city_373->setName("Вита-почтовая");
        $manager->persist($city_373);


        $city_374 = new City();
        $city_374->setRegion($region_1);
        $city_374->setName("Витино");
        $manager->persist($city_374);


        $city_375 = new City();
        $city_375->setRegion($region_11);
        $city_375->setName("Витязевка");
        $manager->persist($city_375);


        $city_376 = new City();
        $city_376->setRegion($region_19);
        $city_376->setName("Вишневец");
        $manager->persist($city_376);


        $city_377 = new City();
        $city_377->setRegion($region_4);
        $city_377->setName("Вишневое");
        $manager->persist($city_377);


        $city_378 = new City();
        $city_378->setRegion($region_10);
        $city_378->setName("Вишневое");
        $manager->persist($city_378);


        $city_379 = new City();
        $city_379->setRegion($region_12);
        $city_379->setName("Вишневое");
        $manager->persist($city_379);


        $city_380 = new City();
        $city_380->setRegion($region_22);
        $city_380->setName("Вишневчик");
        $manager->persist($city_380);


        $city_381 = new City();
        $city_381->setRegion($region_3);
        $city_381->setName("Владимир-Волынский");
        $manager->persist($city_381);


        $city_382 = new City();
        $city_382->setRegion($region_17);
        $city_382->setName("Владимирец");
        $manager->persist($city_382);


        $city_383 = new City();
        $city_383->setRegion($region_17);
        $city_383->setName("Владимирец");
        $manager->persist($city_383);


        $city_384 = new City();
        $city_384->setRegion($region_20);
        $city_384->setName("Владимировка");
        $manager->persist($city_384);


        $city_385 = new City();
        $city_385->setRegion($region_5);
        $city_385->setName("Владимировка");
        $manager->persist($city_385);


        $city_386 = new City();
        $city_386->setRegion($region_11);
        $city_386->setName("Владимировка");
        $manager->persist($city_386);


        $city_387 = new City();
        $city_387->setRegion($region_11);
        $city_387->setName("Владимировка");
        $manager->persist($city_387);


        $city_388 = new City();
        $city_388->setRegion($region_8);
        $city_388->setName("Владимировское");
        $manager->persist($city_388);


        $city_389 = new City();
        $city_389->setRegion($region_11);
        $city_389->setName("Власовка");
        $manager->persist($city_389);


        $city_390 = new City();
        $city_390->setRegion($region_7);
        $city_390->setName("Водица");
        $manager->persist($city_390);


        $city_391 = new City();
        $city_391->setRegion($region_14);
        $city_391->setName("Вознесенск");
        $manager->persist($city_391);


        $city_392 = new City();
        $city_392->setRegion($region_23);
        $city_392->setName("Вознесенское");
        $manager->persist($city_392);


        $city_393 = new City();
        $city_393->setRegion($region_1);
        $city_393->setName("Войково");
        $manager->persist($city_393);


        $city_394 = new City();
        $city_394->setRegion($region_11);
        $city_394->setName("Войновка");
        $manager->persist($city_394);


        $city_395 = new City();
        $city_395->setRegion($region_11);
        $city_395->setName("Войновка");
        $manager->persist($city_395);


        $city_396 = new City();
        $city_396->setRegion($region_2);
        $city_396->setName("Войтовка");
        $manager->persist($city_396);


        $city_397 = new City();
        $city_397->setRegion($region_12);
        $city_397->setName("Войтово");
        $manager->persist($city_397);


        $city_398 = new City();
        $city_398->setRegion($region_22);
        $city_398->setName("Войтовцы");
        $manager->persist($city_398);


        $city_399 = new City();
        $city_399->setRegion($region_22);
        $city_399->setName("Волковинцы");
        $manager->persist($city_399);


        $city_400 = new City();
        $city_400->setRegion($region_5);
        $city_400->setName("Волноваха");
        $manager->persist($city_400);


        $city_401 = new City();
        $city_401->setRegion($region_7);
        $city_401->setName("Воловец");
        $manager->persist($city_401);


        $city_402 = new City();
        $city_402->setRegion($region_10);
        $city_402->setName("Володарка");
        $manager->persist($city_402);


        $city_403 = new City();
        $city_403->setRegion($region_12);
        $city_403->setName("Володарск");
        $manager->persist($city_403);


        $city_404 = new City();
        $city_404->setRegion($region_6);
        $city_404->setName("Володарск-Волынский");
        $manager->persist($city_404);


        $city_405 = new City();
        $city_405->setRegion($region_5);
        $city_405->setName("Володарское");
        $manager->persist($city_405);


        $city_406 = new City();
        $city_406->setRegion($region_4);
        $city_406->setName("Волосское");
        $manager->persist($city_406);


        $city_407 = new City();
        $city_407->setRegion($region_22);
        $city_407->setName("Волочиск");
        $manager->persist($city_407);


        $city_408 = new City();
        $city_408->setRegion($region_20);
        $city_408->setName("Волчанск");
        $manager->persist($city_408);


        $city_409 = new City();
        $city_409->setRegion($region_9);
        $city_409->setName("Волчинец");
        $manager->persist($city_409);


        $city_410 = new City();
        $city_410->setRegion($region_9);
        $city_410->setName("Волчковцы");
        $manager->persist($city_410);


        $city_411 = new City();
        $city_411->setRegion($region_4);
        $city_411->setName("Вольногорск");
        $manager->persist($city_411);


        $city_412 = new City();
        $city_412->setRegion($region_4);
        $city_412->setName("Вольное");
        $manager->persist($city_412);


        $city_413 = new City();
        $city_413->setRegion($region_8);
        $city_413->setName("Вольнянск");
        $manager->persist($city_413);


        $city_414 = new City();
        $city_414->setRegion($region_13);
        $city_414->setName("Воля-бартатовская");
        $manager->persist($city_414);


        $city_415 = new City();
        $city_415->setRegion($region_13);
        $city_415->setName("Воля-высоцкая");
        $manager->persist($city_415);


        $city_416 = new City();
        $city_416->setRegion($region_3);
        $city_416->setName("Воля-ковельская");
        $manager->persist($city_416);


        $city_417 = new City();
        $city_417->setRegion($region_10);
        $city_417->setName("Ворзель");
        $manager->persist($city_417);


        $city_418 = new City();
        $city_418->setRegion($region_18);
        $city_418->setName("Ворожба");
        $manager->persist($city_418);


        $city_419 = new City();
        $city_419->setRegion($region_18);
        $city_419->setName("Воронеж");
        $manager->persist($city_419);


        $city_420 = new City();
        $city_420->setRegion($region_9);
        $city_420->setName("Воронов");
        $manager->persist($city_420);


        $city_421 = new City();
        $city_421->setRegion($region_25);
        $city_421->setName("Вороновица");
        $manager->persist($city_421);


        $city_422 = new City();
        $city_422->setRegion($region_2);
        $city_422->setName("Вороновица");
        $manager->persist($city_422);


        $city_423 = new City();
        $city_423->setRegion($region_13);
        $city_423->setName("Вороняки");
        $manager->persist($city_423);


        $city_424 = new City();
        $city_424->setRegion($region_9);
        $city_424->setName("Ворохта");
        $manager->persist($city_424);


        $city_425 = new City();
        $city_425->setRegion($region_14);
        $city_425->setName("Воскресенск");
        $manager->persist($city_425);


        $city_426 = new City();
        $city_426->setRegion($region_1);
        $city_426->setName("Восход");
        $manager->persist($city_426);


        $city_427 = new City();
        $city_427->setRegion($region_14);
        $city_427->setName("Врадиевка");
        $manager->persist($city_427);


        $city_428 = new City();
        $city_428->setRegion($region_3);
        $city_428->setName("Всеволодовка");
        $manager->persist($city_428);


        $city_429 = new City();
        $city_429->setRegion($region_13);
        $city_429->setName("Вузлове");
        $manager->persist($city_429);


        $city_430 = new City();
        $city_430->setRegion($region_13);
        $city_430->setName("Выбрановка");
        $manager->persist($city_430);


        $city_431 = new City();
        $city_431->setRegion($region_9);
        $city_431->setName("Выгода");
        $manager->persist($city_431);


        $city_432 = new City();
        $city_432->setRegion($region_15);
        $city_432->setName("Выгода");
        $manager->persist($city_432);


        $city_433 = new City();
        $city_433->setRegion($region_4);
        $city_433->setName("Выдвиженец");
        $manager->persist($city_433);


        $city_434 = new City();
        $city_434->setRegion($region_7);
        $city_434->setName("Вылок");
        $manager->persist($city_434);


        $city_435 = new City();
        $city_435->setRegion($region_20);
        $city_435->setName("Высокий");
        $manager->persist($city_435);


        $city_436 = new City();
        $city_436->setRegion($region_8);
        $city_436->setName("Высокогорное");
        $manager->persist($city_436);


        $city_437 = new City();
        $city_437->setRegion($region_21);
        $city_437->setName("Высокополье");
        $manager->persist($city_437);


        $city_438 = new City();
        $city_438->setRegion($region_17);
        $city_438->setName("Высоцк");
        $manager->persist($city_438);


        $city_439 = new City();
        $city_439->setRegion($region_4);
        $city_439->setName("Высшетарасовка");
        $manager->persist($city_439);


        $city_440 = new City();
        $city_440->setRegion($region_10);
        $city_440->setName("Вышгород");
        $manager->persist($city_440);


        $city_441 = new City();
        $city_441->setRegion($region_6);
        $city_441->setName("Вышевичи");
        $manager->persist($city_441);


        $city_442 = new City();
        $city_442->setRegion($region_2);
        $city_442->setName("Вышеольчедаев");
        $manager->persist($city_442);


        $city_443 = new City();
        $city_443->setRegion($region_7);
        $city_443->setName("Вышково");
        $manager->persist($city_443);


        $city_444 = new City();
        $city_444->setRegion($region_18);
        $city_444->setName("Вязовое");
        $manager->persist($city_444);


        $city_445 = new City();
        $city_445->setRegion($region_21);
        $city_445->setName("Гавриловка");
        $manager->persist($city_445);


        $city_446 = new City();
        $city_446->setRegion($region_9);
        $city_446->setName("Гавриловка");
        $manager->persist($city_446);


        $city_447 = new City();
        $city_447->setRegion($region_2);
        $city_447->setName("Гавришовка");
        $manager->persist($city_447);


        $city_448 = new City();
        $city_448->setRegion($region_16);
        $city_448->setName("Гадяч");
        $manager->persist($city_448);


        $city_449 = new City();
        $city_449->setRegion($region_21);
        $city_449->setName("Гаевое");
        $manager->persist($city_449);


        $city_450 = new City();
        $city_450->setRegion($region_11);
        $city_450->setName("Гайворон");
        $manager->persist($city_450);


        $city_451 = new City();
        $city_451->setRegion($region_2);
        $city_451->setName("Гайсин");
        $manager->persist($city_451);


        $city_452 = new City();
        $city_452->setRegion($region_9);
        $city_452->setName("Галич");
        $manager->persist($city_452);


        $city_453 = new City();
        $city_453->setRegion($region_16);
        $city_453->setName("Галяво");
        $manager->persist($city_453);


        $city_454 = new City();
        $city_454->setRegion($region_7);
        $city_454->setName("Ганичи");
        $manager->persist($city_454);


        $city_455 = new City();
        $city_455->setRegion($region_6);
        $city_455->setName("Ганнополь");
        $manager->persist($city_455);


        $city_456 = new City();
        $city_456->setRegion($region_23);
        $city_456->setName("Гарбузин");
        $manager->persist($city_456);


        $city_457 = new City();
        $city_457->setRegion($region_1);
        $city_457->setName("Гаспра");
        $manager->persist($city_457);


        $city_458 = new City();
        $city_458->setRegion($region_10);
        $city_458->setName("Гатное");
        $manager->persist($city_458);


        $city_459 = new City();
        $city_459->setRegion($region_4);
        $city_459->setName("Гвардейское");
        $manager->persist($city_459);


        $city_460 = new City();
        $city_460->setRegion($region_1);
        $city_460->setName("Гвардейское");
        $manager->persist($city_460);


        $city_461 = new City();
        $city_461->setRegion($region_22);
        $city_461->setName("Гвардейское");
        $manager->persist($city_461);


        $city_462 = new City();
        $city_462->setRegion($region_9);
        $city_462->setName("Гвоздец");
        $manager->persist($city_462);


        $city_463 = new City();
        $city_463->setRegion($region_23);
        $city_463->setName("Гельмязов");
        $manager->persist($city_463);


        $city_464 = new City();
        $city_464->setRegion($region_21);
        $city_464->setName("Гениченская горка");
        $manager->persist($city_464);


        $city_465 = new City();
        $city_465->setRegion($region_21);
        $city_465->setName("Геническ");
        $manager->persist($city_465);


        $city_466 = new City();
        $city_466->setRegion($region_5);
        $city_466->setName("Георгиевка");
        $manager->persist($city_466);


        $city_467 = new City();
        $city_467->setRegion($region_18);
        $city_467->setName("Герасимовка");
        $manager->persist($city_467);


        $city_468 = new City();
        $city_468->setRegion($region_1);
        $city_468->setName("Геройское");
        $manager->persist($city_468);


        $city_469 = new City();
        $city_469->setRegion($region_23);
        $city_469->setName("Геронимовка");
        $manager->persist($city_469);


        $city_470 = new City();
        $city_470->setRegion($region_25);
        $city_470->setName("Герца");
        $manager->persist($city_470);


        $city_471 = new City();
        $city_471->setRegion($region_9);
        $city_471->setName("Герыня");
        $manager->persist($city_471);


        $city_472 = new City();
        $city_472->setRegion($region_10);
        $city_472->setName("Глеваха");
        $manager->persist($city_472);


        $city_473 = new City();
        $city_473->setRegion($region_25);
        $city_473->setName("Глинница");
        $manager->persist($city_473);


        $city_474 = new City();
        $city_474->setRegion($region_13);
        $city_474->setName("Глиняны");
        $manager->persist($city_474);


        $city_475 = new City();
        $city_475->setRegion($region_16);
        $city_475->setName("Глобино");
        $manager->persist($city_475);


        $city_476 = new City();
        $city_476->setRegion($region_12);
        $city_476->setName("Глубокий");
        $manager->persist($city_476);


        $city_477 = new City();
        $city_477->setRegion($region_7);
        $city_477->setName("Глубокий поток");
        $manager->persist($city_477);


        $city_478 = new City();
        $city_478->setRegion($region_6);
        $city_478->setName("Глубочица");
        $manager->persist($city_478);


        $city_479 = new City();
        $city_479->setRegion($region_18);
        $city_479->setName("Глухов");
        $manager->persist($city_479);


        $city_480 = new City();
        $city_480->setRegion($region_2);
        $city_480->setName("Глуховцы");
        $manager->persist($city_480);


        $city_481 = new City();
        $city_481->setRegion($region_25);
        $city_481->setName("Глыбокая");
        $manager->persist($city_481);


        $city_482 = new City();
        $city_482->setRegion($region_24);
        $city_482->setName("Гнединцы");
        $manager->persist($city_482);


        $city_483 = new City();
        $city_483->setRegion($region_2);
        $city_483->setName("Гнивань");
        $manager->persist($city_483);


        $city_484 = new City();
        $city_484->setRegion($region_10);
        $city_484->setName("Гнидын");
        $manager->persist($city_484);


        $city_485 = new City();
        $city_485->setRegion($region_19);
        $city_485->setName("Гнилички");
        $manager->persist($city_485);


        $city_486 = new City();
        $city_486->setRegion($region_10);
        $city_486->setName("Гоголев");
        $manager->persist($city_486);


        $city_487 = new City();
        $city_487->setRegion($region_16);
        $city_487->setName("Гоголево");
        $manager->persist($city_487);


        $city_488 = new City();
        $city_488->setRegion($region_16);
        $city_488->setName("Гожулы");
        $manager->persist($city_488);


        $city_489 = new City();
        $city_489->setRegion($region_21);
        $city_489->setName("Голая Пристань");
        $manager->persist($city_489);


        $city_490 = new City();
        $city_490->setRegion($region_3);
        $city_490->setName("Голобы");
        $manager->persist($city_490);


        $city_491 = new City();
        $city_491->setRegion($region_11);
        $city_491->setName("Голованевск");
        $manager->persist($city_491);


        $city_492 = new City();
        $city_492->setRegion($region_6);
        $city_492->setName("Головино");
        $manager->persist($city_492);


        $city_493 = new City();
        $city_493->setRegion($region_11);
        $city_493->setName("Головковка");
        $manager->persist($city_493);


        $city_494 = new City();
        $city_494->setRegion($region_22);
        $city_494->setName("Головчинцы");
        $manager->persist($city_494);


        $city_495 = new City();
        $city_495->setRegion($region_4);
        $city_495->setName("Голубовка");
        $manager->persist($city_495);


        $city_496 = new City();
        $city_496->setRegion($region_1);
        $city_496->setName("Голубой Залив");
        $manager->persist($city_496);


        $city_497 = new City();
        $city_497->setRegion($region_2);
        $city_497->setName("Гоноривка");
        $manager->persist($city_497);


        $city_498 = new City();
        $city_498->setRegion($region_20);
        $city_498->setName("Гонтов яр");
        $manager->persist($city_498);


        $city_499 = new City();
        $city_499->setRegion($region_16);
        $city_499->setName("Горбаневка");
        $manager->persist($city_499);


        $city_500 = new City();
        $city_500->setRegion($region_10);
        $city_500->setName("Горенка");
        $manager->persist($city_500);


        $city_501 = new City();
        $city_501->setRegion($region_13);
        $city_501->setName("Горишний");
        $manager->persist($city_501);


        $city_502 = new City();
        $city_502->setRegion($region_5);
        $city_502->setName("Горловка");
        $manager->persist($city_502);


        $city_503 = new City();
        $city_503->setRegion($region_13);
        $city_503->setName("Горное");
        $manager->persist($city_503);


        $city_504 = new City();
        $city_504->setRegion($region_5);
        $city_504->setName("Горное");
        $manager->persist($city_504);


        $city_505 = new City();
        $city_505->setRegion($region_21);
        $city_505->setName("Горностаевка");
        $manager->persist($city_505);


        $city_506 = new City();
        $city_506->setRegion($region_11);
        $city_506->setName("Горный");
        $manager->persist($city_506);


        $city_507 = new City();
        $city_507->setRegion($region_13);
        $city_507->setName("Горняк");
        $manager->persist($city_507);


        $city_508 = new City();
        $city_508->setRegion($region_5);
        $city_508->setName("Горняк");
        $manager->persist($city_508);


        $city_509 = new City();
        $city_509->setRegion($region_5);
        $city_509->setName("Горняцкое");
        $manager->persist($city_509);


        $city_510 = new City();
        $city_510->setRegion($region_9);
        $city_510->setName("Городенка");
        $manager->persist($city_510);


        $city_511 = new City();
        $city_511->setRegion($region_23);
        $city_511->setName("Городище");
        $manager->persist($city_511);


        $city_512 = new City();
        $city_512->setRegion($region_10);
        $city_512->setName("Городище-Пустоваровка");
        $manager->persist($city_512);


        $city_513 = new City();
        $city_513->setRegion($region_2);
        $city_513->setName("Городковка");
        $manager->persist($city_513);


        $city_514 = new City();
        $city_514->setRegion($region_6);
        $city_514->setName("Городница");
        $manager->persist($city_514);


        $city_515 = new City();
        $city_515->setRegion($region_24);
        $city_515->setName("Городня");
        $manager->persist($city_515);


        $city_516 = new City();
        $city_516->setRegion($region_3);
        $city_516->setName("Городок");
        $manager->persist($city_516);


        $city_517 = new City();
        $city_517->setRegion($region_17);
        $city_517->setName("Городок");
        $manager->persist($city_517);


        $city_518 = new City();
        $city_518->setRegion($region_22);
        $city_518->setName("Городок");
        $manager->persist($city_518);


        $city_519 = new City();
        $city_519->setRegion($region_13);
        $city_519->setName("Городок");
        $manager->persist($city_519);


        $city_520 = new City();
        $city_520->setRegion($region_7);
        $city_520->setName("Горонглаб");
        $manager->persist($city_520);


        $city_521 = new City();
        $city_521->setRegion($region_3);
        $city_521->setName("Горохов");
        $manager->persist($city_521);


        $city_522 = new City();
        $city_522->setRegion($region_14);
        $city_522->setName("Гороховка");
        $manager->persist($city_522);


        $city_523 = new City();
        $city_523->setRegion($region_12);
        $city_523->setName("Горское");
        $manager->persist($city_523);


        $city_524 = new City();
        $city_524->setRegion($region_6);
        $city_524->setName("Горщик");
        $manager->persist($city_524);


        $city_525 = new City();
        $city_525->setRegion($region_3);
        $city_525->setName("Горькая полонка");
        $manager->persist($city_525);


        $city_526 = new City();
        $city_526->setRegion($region_4);
        $city_526->setName("Горького");
        $manager->persist($city_526);


        $city_527 = new City();
        $city_527->setRegion($region_11);
        $city_527->setName("Гостинное");
        $manager->persist($city_527);


        $city_528 = new City();
        $city_528->setRegion($region_13);
        $city_528->setName("Гостинцово");
        $manager->persist($city_528);


        $city_529 = new City();
        $city_529->setRegion($region_10);
        $city_529->setName("Гостомель");
        $manager->persist($city_529);


        $city_530 = new City();
        $city_530->setRegion($region_17);
        $city_530->setName("Гоща");
        $manager->persist($city_530);


        $city_531 = new City();
        $city_531->setRegion($region_13);
        $city_531->setName("Грабовец");
        $manager->persist($city_531);


        $city_532 = new City();
        $city_532->setRegion($region_16);
        $city_532->setName("Градижск");
        $manager->persist($city_532);


        $city_533 = new City();
        $city_533->setRegion($region_5);
        $city_533->setName("Гранитное");
        $manager->persist($city_533);


        $city_534 = new City();
        $city_534->setRegion($region_17);
        $city_534->setName("Гранитное");
        $manager->persist($city_534);


        $city_535 = new City();
        $city_535->setRegion($region_4);
        $city_535->setName("Гранитное");
        $manager->persist($city_535);


        $city_536 = new City();
        $city_536->setRegion($region_16);
        $city_536->setName("Гребенка");
        $manager->persist($city_536);


        $city_537 = new City();
        $city_537->setRegion($region_10);
        $city_537->setName("Гребенки");
        $manager->persist($city_537);


        $city_538 = new City();
        $city_538->setRegion($region_13);
        $city_538->setName("Гребенов");
        $manager->persist($city_538);


        $city_539 = new City();
        $city_539->setRegion($region_7);
        $city_539->setName("Гребля");
        $manager->persist($city_539);


        $city_540 = new City();
        $city_540->setRegion($region_15);
        $city_540->setName("Григоровка");
        $manager->persist($city_540);


        $city_541 = new City();
        $city_541->setRegion($region_10);
        $city_541->setName("Григорьевка");
        $manager->persist($city_541);


        $city_542 = new City();
        $city_542->setRegion($region_19);
        $city_542->setName("Гримайлов");
        $manager->persist($city_542);


        $city_543 = new City();
        $city_543->setRegion($region_22);
        $city_543->setName("Грицев");
        $manager->persist($city_543);


        $city_544 = new City();
        $city_544->setRegion($region_5);
        $city_544->setName("Гришино");
        $manager->persist($city_544);


        $city_545 = new City();
        $city_545->setRegion($region_6);
        $city_545->setName("Гришковцы");
        $manager->persist($city_545);


        $city_546 = new City();
        $city_546->setRegion($region_6);
        $city_546->setName("Грозино");
        $manager->persist($city_546);


        $city_547 = new City();
        $city_547->setRegion($region_22);
        $city_547->setName("Грузевица");
        $manager->persist($city_547);


        $city_548 = new City();
        $city_548->setRegion($region_4);
        $city_548->setName("Грузское");
        $manager->persist($city_548);


        $city_549 = new City();
        $city_549->setRegion($region_7);
        $city_549->setName("Грушево");
        $manager->persist($city_549);


        $city_550 = new City();
        $city_550->setRegion($region_11);
        $city_550->setName("Грушка");
        $manager->persist($city_550);


        $city_551 = new City();
        $city_551->setRegion($region_22);
        $city_551->setName("Грушка");
        $manager->persist($city_551);


        $city_552 = new City();
        $city_552->setRegion($region_1);
        $city_552->setName("Грэсовский");
        $manager->persist($city_552);


        $city_553 = new City();
        $city_553->setRegion($region_13);
        $city_553->setName("Гряда");
        $manager->persist($city_553);


        $city_554 = new City();
        $city_554->setRegion($region_18);
        $city_554->setName("Грязное");
        $manager->persist($city_554);


        $city_555 = new City();
        $city_555->setRegion($region_4);
        $city_555->setName("Губиниха");
        $manager->persist($city_555);


        $city_556 = new City();
        $city_556->setRegion($region_6);
        $city_556->setName("Гуйва");
        $manager->persist($city_556);


        $city_557 = new City();
        $city_557->setRegion($region_6);
        $city_557->setName("Гульск");
        $manager->persist($city_557);


        $city_558 = new City();
        $city_558->setRegion($region_8);
        $city_558->setName("Гуляйполе");
        $manager->persist($city_558);


        $city_559 = new City();
        $city_559->setRegion($region_22);
        $city_559->setName("Гуменцы");
        $manager->persist($city_559);


        $city_560 = new City();
        $city_560->setRegion($region_4);
        $city_560->setName("Гупаловка");
        $manager->persist($city_560);


        $city_561 = new City();
        $city_561->setRegion($region_1);
        $city_561->setName("Гурзуф");
        $manager->persist($city_561);


        $city_562 = new City();
        $city_562->setRegion($region_10);
        $city_562->setName("Гуровщина");
        $manager->persist($city_562);


        $city_563 = new City();
        $city_563->setRegion($region_19);
        $city_563->setName("Гусятин");
        $manager->persist($city_563);


        $city_564 = new City();
        $city_564->setRegion($region_20);
        $city_564->setName("Гуты");
        $manager->persist($city_564);


        $city_565 = new City();
        $city_565->setRegion($region_22);
        $city_565->setName("Давыдковцы");
        $manager->persist($city_565);


        $city_566 = new City();
        $city_566->setRegion($region_13);
        $city_566->setName("Давыдов");
        $manager->persist($city_566);


        $city_567 = new City();
        $city_567->setRegion($region_1);
        $city_567->setName("Далекое");
        $manager->persist($city_567);


        $city_568 = new City();
        $city_568->setRegion($region_24);
        $city_568->setName("Даниловка");
        $manager->persist($city_568);


        $city_569 = new City();
        $city_569->setRegion($region_21);
        $city_569->setName("Дарьевка");
        $manager->persist($city_569);


        $city_570 = new City();
        $city_570->setRegion($region_20);
        $city_570->setName("Дачное");
        $manager->persist($city_570);


        $city_571 = new City();
        $city_571->setRegion($region_13);
        $city_571->setName("Дашава");
        $manager->persist($city_571);


        $city_572 = new City();
        $city_572->setRegion($region_2);
        $city_572->setName("Дашев");
        $manager->persist($city_572);


        $city_573 = new City();
        $city_573->setRegion($region_2);
        $city_573->setName("Дашев");
        $manager->persist($city_573);


        $city_574 = new City();
        $city_574->setRegion($region_16);
        $city_574->setName("Дашковка");
        $manager->persist($city_574);


        $city_575 = new City();
        $city_575->setRegion($region_23);
        $city_575->setName("Дашуковка");
        $manager->persist($city_575);


        $city_576 = new City();
        $city_576->setRegion($region_20);
        $city_576->setName("Двуречная");
        $manager->persist($city_576);


        $city_577 = new City();
        $city_577->setRegion($region_5);
        $city_577->setName("Дебальцево");
        $manager->persist($city_577);


        $city_578 = new City();
        $city_578->setRegion($region_11);
        $city_578->setName("Девичье поле");
        $manager->persist($city_578);


        $city_579 = new City();
        $city_579->setRegion($region_4);
        $city_579->setName("Девладово");
        $manager->persist($city_579);


        $city_580 = new City();
        $city_580->setRegion($region_3);
        $city_580->setName("Дедычи");
        $manager->persist($city_580);


        $city_581 = new City();
        $city_581->setRegion($region_7);
        $city_581->setName("Деловое");
        $manager->persist($city_581);


        $city_582 = new City();
        $city_582->setRegion($region_9);
        $city_582->setName("Делятин");
        $manager->persist($city_582);


        $city_583 = new City();
        $city_583->setRegion($region_10);
        $city_583->setName("Демидов");
        $manager->persist($city_583);


        $city_584 = new City();
        $city_584->setRegion($region_17);
        $city_584->setName("Демидовка");
        $manager->persist($city_584);


        $city_585 = new City();
        $city_585->setRegion($region_9);
        $city_585->setName("Демьянов");
        $manager->persist($city_585);


        $city_586 = new City();
        $city_586->setRegion($region_10);
        $city_586->setName("Дениховка");
        $manager->persist($city_586);


        $city_587 = new City();
        $city_587->setRegion($region_23);
        $city_587->setName("Деньги");
        $manager->persist($city_587);


        $city_588 = new City();
        $city_588->setRegion($region_17);
        $city_588->setName("Деражное");
        $manager->persist($city_588);


        $city_589 = new City();
        $city_589->setRegion($region_22);
        $city_589->setName("Деражня");
        $manager->persist($city_589);


        $city_590 = new City();
        $city_590->setRegion($region_20);
        $city_590->setName("Дергачи");
        $manager->persist($city_590);


        $city_591 = new City();
        $city_591->setRegion($region_2);
        $city_591->setName("Деребчин");
        $manager->persist($city_591);


        $city_592 = new City();
        $city_592->setRegion($region_11);
        $city_592->setName("Дериевка");
        $manager->persist($city_592);


        $city_593 = new City();
        $city_593->setRegion($region_3);
        $city_593->setName("Дерно");
        $manager->persist($city_593);


        $city_594 = new City();
        $city_594->setRegion($region_1);
        $city_594->setName("Джанкой");
        $manager->persist($city_594);


        $city_595 = new City();
        $city_595->setRegion($region_2);
        $city_595->setName("Джурин");
        $manager->persist($city_595);


        $city_596 = new City();
        $city_596->setRegion($region_9);
        $city_596->setName("Джуров");
        $manager->persist($city_596);


        $city_597 = new City();
        $city_597->setRegion($region_9);
        $city_597->setName("Дзвиняч");
        $manager->persist($city_597);


        $city_598 = new City();
        $city_598->setRegion($region_23);
        $city_598->setName("Дзензеловка");
        $manager->persist($city_598);


        $city_599 = new City();
        $city_599->setRegion($region_6);
        $city_599->setName("Дзержинск");
        $manager->persist($city_599);


        $city_600 = new City();
        $city_600->setRegion($region_5);
        $city_600->setName("Дзержинск");
        $manager->persist($city_600);


        $city_601 = new City();
        $city_601->setRegion($region_12);
        $city_601->setName("Дзержинский");
        $manager->persist($city_601);


        $city_602 = new City();
        $city_602->setRegion($region_12);
        $city_602->setName("Дзержинское");
        $manager->persist($city_602);


        $city_603 = new City();
        $city_603->setRegion($region_15);
        $city_603->setName("Дзинилор");
        $manager->persist($city_603);


        $city_604 = new City();
        $city_604->setRegion($region_2);
        $city_604->setName("Дзыговка");
        $manager->persist($city_604);


        $city_605 = new City();
        $city_605->setRegion($region_7);
        $city_605->setName("Диброва");
        $manager->persist($city_605);


        $city_606 = new City();
        $city_606->setRegion($region_10);
        $city_606->setName("Диброва");
        $manager->persist($city_606);


        $city_607 = new City();
        $city_607->setRegion($region_16);
        $city_607->setName("Диканька");
        $manager->persist($city_607);


        $city_608 = new City();
        $city_608->setRegion($region_5);
        $city_608->setName("Димитров");
        $manager->persist($city_608);


        $city_609 = new City();
        $city_609->setRegion($region_11);
        $city_609->setName("Димитрово");
        $manager->persist($city_609);


        $city_610 = new City();
        $city_610->setRegion($region_10);
        $city_610->setName("Дмитровка");
        $manager->persist($city_610);


        $city_611 = new City();
        $city_611->setRegion($region_24);
        $city_611->setName("Дмитровка");
        $manager->persist($city_611);


        $city_612 = new City();
        $city_612->setRegion($region_4);
        $city_612->setName("Дмитровка");
        $manager->persist($city_612);


        $city_613 = new City();
        $city_613->setRegion($region_1);
        $city_613->setName("Днепровка");
        $manager->persist($city_613);


        $city_614 = new City();
        $city_614->setRegion($region_4);
        $city_614->setName("Днепровское");
        $manager->persist($city_614);


        $city_615 = new City();
        $city_615->setRegion($region_4);
        $city_615->setName("Днепродзержинск");
        $manager->persist($city_615);


        $city_616 = new City();
        $city_616->setRegion($region_4);
        $city_616->setName("Днепропетровск");
        $manager->persist($city_616);


        $city_617 = new City();
        $city_617->setRegion($region_8);
        $city_617->setName("Днепрорудное");
        $manager->persist($city_617);


        $city_618 = new City();
        $city_618->setRegion($region_21);
        $city_618->setName("Днепряны");
        $manager->persist($city_618);


        $city_619 = new City();
        $city_619->setRegion($region_11);
        $city_619->setName("Добровеличковка");
        $manager->persist($city_619);


        $city_620 = new City();
        $city_620->setRegion($region_9);
        $city_620->setName("Добровляны");
        $manager->persist($city_620);


        $city_621 = new City();
        $city_621->setRegion($region_1);
        $city_621->setName("Доброе");
        $manager->persist($city_621);


        $city_622 = new City();
        $city_622->setRegion($region_13);
        $city_622->setName("Добромиль");
        $manager->persist($city_622);


        $city_623 = new City();
        $city_623->setRegion($region_5);
        $city_623->setName("Доброполье");
        $manager->persist($city_623);


        $city_624 = new City();
        $city_624->setRegion($region_13);
        $city_624->setName("Добротвор");
        $manager->persist($city_624);


        $city_625 = new City();
        $city_625->setRegion($region_24);
        $city_625->setName("Добрянка");
        $manager->persist($city_625);


        $city_626 = new City();
        $city_626->setRegion($region_7);
        $city_626->setName("Добрянское");
        $manager->persist($city_626);


        $city_627 = new City();
        $city_627->setRegion($region_13);
        $city_627->setName("Добряны");
        $manager->persist($city_627);


        $city_628 = new City();
        $city_628->setRegion($region_6);
        $city_628->setName("Довбыш");
        $manager->persist($city_628);


        $city_629 = new City();
        $city_629->setRegion($region_10);
        $city_629->setName("Довгалевское");
        $manager->persist($city_629);


        $city_630 = new City();
        $city_630->setRegion($region_22);
        $city_630->setName("Довжок");
        $manager->persist($city_630);


        $city_631 = new City();
        $city_631->setRegion($region_5);
        $city_631->setName("Докучаевск");
        $manager->persist($city_631);


        $city_632 = new City();
        $city_632->setRegion($region_7);
        $city_632->setName("Долгое");
        $manager->persist($city_632);


        $city_633 = new City();
        $city_633->setRegion($region_19);
        $city_633->setName("Должанка");
        $manager->persist($city_633);


        $city_634 = new City();
        $city_634->setRegion($region_6);
        $city_634->setName("Должик");
        $manager->persist($city_634);


        $city_635 = new City();
        $city_635->setRegion($region_5);
        $city_635->setName("Долина");
        $manager->persist($city_635);


        $city_636 = new City();
        $city_636->setRegion($region_9);
        $city_636->setName("Долина");
        $manager->persist($city_636);


        $city_637 = new City();
        $city_637->setRegion($region_5);
        $city_637->setName("Долиновка");
        $manager->persist($city_637);


        $city_638 = new City();
        $city_638->setRegion($region_11);
        $city_638->setName("Долинская");
        $manager->persist($city_638);


        $city_639 = new City();
        $city_639->setRegion($region_8);
        $city_639->setName("Долинское");
        $manager->persist($city_639);


        $city_640 = new City();
        $city_640->setRegion($region_9);
        $city_640->setName("Долишнее залучье");
        $manager->persist($city_640);


        $city_641 = new City();
        $city_641->setRegion($region_14);
        $city_641->setName("Доманевка");
        $manager->persist($city_641);


        $city_642 = new City();
        $city_642->setRegion($region_5);
        $city_642->setName("Донецк");
        $manager->persist($city_642);


        $city_643 = new City();
        $city_643->setRegion($region_5);
        $city_643->setName("Донецкое");
        $manager->persist($city_643);


        $city_644 = new City();
        $city_644->setRegion($region_5);
        $city_644->setName("Донское");
        $manager->persist($city_644);


        $city_645 = new City();
        $city_645->setRegion($region_1);
        $city_645->setName("Донское");
        $manager->persist($city_645);


        $city_646 = new City();
        $city_646->setRegion($region_5);
        $city_646->setName("Дорожное");
        $manager->persist($city_646);


        $city_647 = new City();
        $city_647->setRegion($region_10);
        $city_647->setName("Дослидницкое");
        $manager->persist($city_647);


        $city_648 = new City();
        $city_648->setRegion($region_4);
        $city_648->setName("Дослидное");
        $manager->persist($city_648);


        $city_649 = new City();
        $city_649->setRegion($region_23);
        $city_649->setName("Драбов");
        $manager->persist($city_649);


        $city_650 = new City();
        $city_650->setRegion($region_23);
        $city_650->setName("Драбово-барятинское");
        $manager->persist($city_650);


        $city_651 = new City();
        $city_651->setRegion($region_7);
        $city_651->setName("Драгово");
        $manager->persist($city_651);


        $city_652 = new City();
        $city_652->setRegion($region_9);
        $city_652->setName("Драгомирчаны");
        $manager->persist($city_652);


        $city_653 = new City();
        $city_653->setRegion($region_5);
        $city_653->setName("Дробышево");
        $manager->persist($city_653);


        $city_654 = new City();
        $city_654->setRegion($region_13);
        $city_654->setName("Дрогобыч");
        $manager->persist($city_654);


        $city_655 = new City();
        $city_655->setRegion($region_19);
        $city_655->setName("Дружба");
        $manager->persist($city_655);


        $city_656 = new City();
        $city_656->setRegion($region_18);
        $city_656->setName("Дружба");
        $manager->persist($city_656);


        $city_657 = new City();
        $city_657->setRegion($region_6);
        $city_657->setName("Дружба");
        $manager->persist($city_657);


        $city_658 = new City();
        $city_658->setRegion($region_8);
        $city_658->setName("Дружелюбовка");
        $manager->persist($city_658);


        $city_659 = new City();
        $city_659->setRegion($region_5);
        $city_659->setName("Дружковка");
        $manager->persist($city_659);


        $city_660 = new City();
        $city_660->setRegion($region_9);
        $city_660->setName("Дуба");
        $manager->persist($city_660);


        $city_661 = new City();
        $city_661->setRegion($region_3);
        $city_661->setName("Дубечно");
        $manager->persist($city_661);


        $city_662 = new City();
        $city_662->setRegion($region_23);
        $city_662->setName("Дубиевка");
        $manager->persist($city_662);


        $city_663 = new City();
        $city_663->setRegion($region_13);
        $city_663->setName("Дубина");
        $manager->persist($city_663);


        $city_664 = new City();
        $city_664->setRegion($region_13);
        $city_664->setName("Дубляны");
        $manager->persist($city_664);


        $city_665 = new City();
        $city_665->setRegion($region_13);
        $city_665->setName("Дубляны");
        $manager->persist($city_665);


        $city_666 = new City();
        $city_666->setRegion($region_17);
        $city_666->setName("Дубно");
        $manager->persist($city_666);


        $city_667 = new City();
        $city_667->setRegion($region_7);
        $city_667->setName("Дубовое");
        $manager->persist($city_667);


        $city_668 = new City();
        $city_668->setRegion($region_3);
        $city_668->setName("Дубовое");
        $manager->persist($city_668);


        $city_669 = new City();
        $city_669->setRegion($region_12);
        $city_669->setName("Дубовский");
        $manager->persist($city_669);


        $city_670 = new City();
        $city_670->setRegion($region_9);
        $city_670->setName("Дубовцы");
        $manager->persist($city_670);


        $city_671 = new City();
        $city_671->setRegion($region_18);
        $city_671->setName("Дубовязовка");
        $manager->persist($city_671);


        $city_672 = new City();
        $city_672->setRegion($region_7);
        $city_672->setName("Дубриничи");
        $manager->persist($city_672);


        $city_673 = new City();
        $city_673->setRegion($region_17);
        $city_673->setName("Дубровица");
        $manager->persist($city_673);


        $city_674 = new City();
        $city_674->setRegion($region_17);
        $city_674->setName("Дубы");
        $manager->persist($city_674);


        $city_675 = new City();
        $city_675->setRegion($region_13);
        $city_675->setName("Дулибы");
        $manager->persist($city_675);


        $city_676 = new City();
        $city_676->setRegion($region_7);
        $city_676->setName("Дулово");
        $manager->persist($city_676);


        $city_677 = new City();
        $city_677->setRegion($region_22);
        $city_677->setName("Дунаевцы");
        $manager->persist($city_677);


        $city_678 = new City();
        $city_678->setRegion($region_22);
        $city_678->setName("Дунаевцы");
        $manager->persist($city_678);


        $city_679 = new City();
        $city_679->setRegion($region_7);
        $city_679->setName("Дыйда");
        $manager->persist($city_679);


        $city_680 = new City();
        $city_680->setRegion($region_10);
        $city_680->setName("Дымер");
        $manager->persist($city_680);


        $city_681 = new City();
        $city_681->setRegion($region_1);
        $city_681->setName("Евпатория");
        $manager->persist($city_681);


        $city_682 = new City();
        $city_682->setRegion($region_9);
        $city_682->setName("Езуполь");
        $manager->persist($city_682);


        $city_683 = new City();
        $city_683->setRegion($region_14);
        $city_683->setName("Еланец");
        $manager->persist($city_683);


        $city_684 = new City();
        $city_684->setRegion($region_11);
        $city_684->setName("Елизаветградка");
        $manager->persist($city_684);


        $city_685 = new City();
        $city_685->setRegion($region_4);
        $city_685->setName("Елизарово");
        $manager->persist($city_685);


        $city_686 = new City();
        $city_686->setRegion($region_6);
        $city_686->setName("Емильчино");
        $manager->persist($city_686);


        $city_687 = new City();
        $city_687->setRegion($region_5);
        $city_687->setName("Енакиево");
        $manager->persist($city_687);


        $city_688 = new City();
        $city_688->setRegion($region_23);
        $city_688->setName("Ерки");
        $manager->persist($city_688);


        $city_689 = new City();
        $city_689->setRegion($region_12);
        $city_689->setName("Есауловка");
        $manager->persist($city_689);


        $city_690 = new City();
        $city_690->setRegion($region_2);
        $city_690->setName("Жабелевка");
        $manager->persist($city_690);


        $city_691 = new City();
        $city_691->setRegion($region_3);
        $city_691->setName("Жабка");
        $manager->persist($city_691);


        $city_692 = new City();
        $city_692->setRegion($region_23);
        $city_692->setName("Жашков");
        $manager->persist($city_692);


        $city_693 = new City();
        $city_693->setRegion($region_22);
        $city_693->setName("Жванец");
        $manager->persist($city_693);


        $city_694 = new City();
        $city_694->setRegion($region_13);
        $city_694->setName("Жвирка");
        $manager->persist($city_694);


        $city_695 = new City();
        $city_695->setRegion($region_5);
        $city_695->setName("Ждановка");
        $manager->persist($city_695);


        $city_696 = new City();
        $city_696->setRegion($region_2);
        $city_696->setName("Ждановка");
        $manager->persist($city_696);


        $city_697 = new City();
        $city_697->setRegion($region_4);
        $city_697->setName("Жданово");
        $manager->persist($city_697);


        $city_698 = new City();
        $city_698->setRegion($region_7);
        $city_698->setName("Ждениево");
        $manager->persist($city_698);


        $city_699 = new City();
        $city_699->setRegion($region_4);
        $city_699->setName("Желтые Воды");
        $manager->persist($city_699);


        $city_700 = new City();
        $city_700->setRegion($region_1);
        $city_700->setName("Желябовка");
        $manager->persist($city_700);


        $city_701 = new City();
        $city_701->setRegion($region_15);
        $city_701->setName("Жеребково");
        $manager->persist($city_701);


        $city_702 = new City();
        $city_702->setRegion($region_13);
        $city_702->setName("Жидачев");
        $manager->persist($city_702);


        $city_703 = new City();
        $city_703->setRegion($region_6);
        $city_703->setName("Житомир");
        $manager->persist($city_703);


        $city_704 = new City();
        $city_704->setRegion($region_2);
        $city_704->setName("Жмеринка");
        $manager->persist($city_704);


        $city_705 = new City();
        $city_705->setRegion($region_18);
        $city_705->setName("Жовтневое");
        $manager->persist($city_705);


        $city_706 = new City();
        $city_706->setRegion($region_16);
        $city_706->setName("Жовтневое");
        $manager->persist($city_706);


        $city_707 = new City();
        $city_707->setRegion($region_10);
        $city_707->setName("Жовтневое");
        $manager->persist($city_707);


        $city_708 = new City();
        $city_708->setRegion($region_18);
        $city_708->setName("Жовтневое");
        $manager->persist($city_708);


        $city_709 = new City();
        $city_709->setRegion($region_21);
        $city_709->setName("Жовтневое");
        $manager->persist($city_709);


        $city_710 = new City();
        $city_710->setRegion($region_3);
        $city_710->setName("Жовтневое");
        $manager->persist($city_710);


        $city_711 = new City();
        $city_711->setRegion($region_17);
        $city_711->setName("Жовтневое");
        $manager->persist($city_711);


        $city_712 = new City();
        $city_712->setRegion($region_13);
        $city_712->setName("Жолква");
        $manager->persist($city_712);


        $city_713 = new City();
        $city_713->setRegion($region_13);
        $city_713->setName("Жолква");
        $manager->persist($city_713);


        $city_714 = new City();
        $city_714->setRegion($region_13);
        $city_714->setName("Жулин");
        $manager->persist($city_714);


        $city_715 = new City();
        $city_715->setRegion($region_3);
        $city_715->setName("Журавичи");
        $manager->persist($city_715);


        $city_716 = new City();
        $city_716->setRegion($region_1);
        $city_716->setName("Журавки");
        $manager->persist($city_716);


        $city_717 = new City();
        $city_717->setRegion($region_2);
        $city_717->setName("Журавлевка");
        $manager->persist($city_717);


        $city_718 = new City();
        $city_718->setRegion($region_9);
        $city_718->setName("Заболотов");
        $manager->persist($city_718);


        $city_719 = new City();
        $city_719->setRegion($region_3);
        $city_719->setName("Забороль");
        $manager->persist($city_719);


        $city_720 = new City();
        $city_720->setRegion($region_11);
        $city_720->setName("Завалье");
        $manager->persist($city_720);


        $city_721 = new City();
        $city_721->setRegion($region_9);
        $city_721->setName("Завалье");
        $manager->persist($city_721);


        $city_722 = new City();
        $city_722->setRegion($region_7);
        $city_722->setName("Завидово");
        $manager->persist($city_722);


        $city_723 = new City();
        $city_723->setRegion($region_19);
        $city_723->setName("Заводское");
        $manager->persist($city_723);


        $city_724 = new City();
        $city_724->setRegion($region_9);
        $city_724->setName("Завой");
        $manager->persist($city_724);


        $city_725 = new City();
        $city_725->setRegion($region_9);
        $city_725->setName("Загвоздье");
        $manager->persist($city_725);


        $city_726 = new City();
        $city_726->setRegion($region_15);
        $city_726->setName("Загнитков");
        $manager->persist($city_726);


        $city_727 = new City();
        $city_727->setRegion($region_13);
        $city_727->setName("Загорное");
        $manager->persist($city_727);


        $city_728 = new City();
        $city_728->setRegion($region_7);
        $city_728->setName("Задельское");
        $manager->persist($city_728);


        $city_729 = new City();
        $city_729->setRegion($region_9);
        $city_729->setName("Заднестрянск");
        $manager->persist($city_729);


        $city_730 = new City();
        $city_730->setRegion($region_10);
        $city_730->setName("Зазимье");
        $manager->persist($city_730);


        $city_731 = new City();
        $city_731->setRegion($region_22);
        $city_731->setName("Закупное");
        $manager->persist($city_731);


        $city_732 = new City();
        $city_732->setRegion($region_3);
        $city_732->setName("Залесочье");
        $manager->persist($city_732);


        $city_733 = new City();
        $city_733->setRegion($region_19);
        $city_733->setName("Залещики");
        $manager->persist($city_733);


        $city_734 = new City();
        $city_734->setRegion($region_16);
        $city_734->setName("Зализничное");
        $manager->persist($city_734);


        $city_735 = new City();
        $city_735->setRegion($region_8);
        $city_735->setName("Зализничное");
        $manager->persist($city_735);


        $city_736 = new City();
        $city_736->setRegion($region_21);
        $city_736->setName("Зализный порт");
        $manager->persist($city_736);


        $city_737 = new City();
        $city_737->setRegion($region_19);
        $city_737->setName("Зализцы");
        $manager->persist($city_737);


        $city_738 = new City();
        $city_738->setRegion($region_24);
        $city_738->setName("Замглай");
        $manager->persist($city_738);


        $city_739 = new City();
        $city_739->setRegion($region_3);
        $city_739->setName("Замличи");
        $manager->persist($city_739);


        $city_740 = new City();
        $city_740->setRegion($region_5);
        $city_740->setName("Заможное");
        $manager->persist($city_740);


        $city_741 = new City();
        $city_741->setRegion($region_1);
        $city_741->setName("Заозерное");
        $manager->persist($city_741);


        $city_742 = new City();
        $city_742->setRegion($region_8);
        $city_742->setName("Запорожье");
        $manager->persist($city_742);


        $city_743 = new City();
        $city_743->setRegion($region_13);
        $city_743->setName("Запытов");
        $manager->persist($city_743);


        $city_744 = new City();
        $city_744->setRegion($region_2);
        $city_744->setName("Зарванцы");
        $manager->persist($city_744);


        $city_745 = new City();
        $city_745->setRegion($region_6);
        $city_745->setName("Заречаны");
        $manager->persist($city_745);


        $city_746 = new City();
        $city_746->setRegion($region_17);
        $city_746->setName("Заречное");
        $manager->persist($city_746);


        $city_747 = new City();
        $city_747->setRegion($region_3);
        $city_747->setName("Заречье");
        $manager->persist($city_747);


        $city_748 = new City();
        $city_748->setRegion($region_3);
        $city_748->setName("Заречье");
        $manager->persist($city_748);


        $city_749 = new City();
        $city_749->setRegion($region_25);
        $city_749->setName("Зарожаны");
        $manager->persist($city_749);


        $city_750 = new City();
        $city_750->setRegion($region_17);
        $city_750->setName("Заря");
        $manager->persist($city_750);


        $city_751 = new City();
        $city_751->setRegion($region_5);
        $city_751->setName("Заря");
        $manager->persist($city_751);


        $city_752 = new City();
        $city_752->setRegion($region_25);
        $city_752->setName("Заставна");
        $manager->persist($city_752);


        $city_753 = new City();
        $city_753->setRegion($region_19);
        $city_753->setName("Застеночное");
        $manager->persist($city_753);


        $city_754 = new City();
        $city_754->setRegion($region_16);
        $city_754->setName("Засулье");
        $manager->persist($city_754);


        $city_755 = new City();
        $city_755->setRegion($region_15);
        $city_755->setName("Затишье");
        $manager->persist($city_755);


        $city_756 = new City();
        $city_756->setRegion($region_15);
        $city_756->setName("Затока");
        $manager->persist($city_756);


        $city_757 = new City();
        $city_757->setRegion($region_20);
        $city_757->setName("Зачепиловка");
        $manager->persist($city_757);


        $city_758 = new City();
        $city_758->setRegion($region_19);
        $city_758->setName("Збараж");
        $manager->persist($city_758);


        $city_759 = new City();
        $city_759->setRegion($region_19);
        $city_759->setName("Зборов");
        $manager->persist($city_759);


        $city_760 = new City();
        $city_760->setRegion($region_23);
        $city_760->setName("Звенигородка");
        $manager->persist($city_760);


        $city_761 = new City();
        $city_761->setRegion($region_10);
        $city_761->setName("Згуровка");
        $manager->persist($city_761);


        $city_762 = new City();
        $city_762->setRegion($region_17);
        $city_762->setName("Здолбунов");
        $manager->persist($city_762);


        $city_763 = new City();
        $city_763->setRegion($region_3);
        $city_763->setName("Зеленая");
        $manager->persist($city_763);


        $city_764 = new City();
        $city_764->setRegion($region_4);
        $city_764->setName("Зеленодольск");
        $manager->persist($city_764);


        $city_765 = new City();
        $city_765->setRegion($region_18);
        $city_765->setName("Зеленый гай");
        $manager->persist($city_765);


        $city_766 = new City();
        $city_766->setRegion($region_13);
        $city_766->setName("Зелив");
        $manager->persist($city_766);


        $city_767 = new City();
        $city_767->setRegion($region_16);
        $city_767->setName("Зеньков");
        $manager->persist($city_767);


        $city_768 = new City();
        $city_768->setRegion($region_16);
        $city_768->setName("Зеньков");
        $manager->persist($city_768);


        $city_769 = new City();
        $city_769->setRegion($region_20);
        $city_769->setName("Зидьки");
        $manager->persist($city_769);


        $city_770 = new City();
        $city_770->setRegion($region_13);
        $city_770->setName("Зимняя Вода");
        $manager->persist($city_770);


        $city_771 = new City();
        $city_771->setRegion($region_12);
        $city_771->setName("Зимогорье");
        $manager->persist($city_771);


        $city_772 = new City();
        $city_772->setRegion($region_22);
        $city_772->setName("Зиньков");
        $manager->persist($city_772);


        $city_773 = new City();
        $city_773->setRegion($region_17);
        $city_773->setName("Зирне");
        $manager->persist($city_773);


        $city_774 = new City();
        $city_774->setRegion($region_4);
        $city_774->setName("Златоустовка");
        $manager->persist($city_774);


        $city_775 = new City();
        $city_775->setRegion($region_20);
        $city_775->setName("Змиев");
        $manager->persist($city_775);


        $city_776 = new City();
        $city_776->setRegion($region_3);
        $city_776->setName("Змиенец");
        $manager->persist($city_776);


        $city_777 = new City();
        $city_777->setRegion($region_11);
        $city_777->setName("Знаменка");
        $manager->persist($city_777);


        $city_778 = new City();
        $city_778->setRegion($region_7);
        $city_778->setName("Зняцево");
        $manager->persist($city_778);


        $city_779 = new City();
        $city_779->setRegion($region_11);
        $city_779->setName("Золотаревка");
        $manager->persist($city_779);


        $city_780 = new City();
        $city_780->setRegion($region_19);
        $city_780->setName("Золотники");
        $manager->persist($city_780);


        $city_781 = new City();
        $city_781->setRegion($region_12);
        $city_781->setName("Золотое");
        $manager->persist($city_781);


        $city_782 = new City();
        $city_782->setRegion($region_19);
        $city_782->setName("Золотой Поток");
        $manager->persist($city_782);


        $city_783 = new City();
        $city_783->setRegion($region_23);
        $city_783->setName("Золотоноша");
        $manager->persist($city_783);


        $city_784 = new City();
        $city_784->setRegion($region_20);
        $city_784->setName("Золочев");
        $manager->persist($city_784);


        $city_785 = new City();
        $city_785->setRegion($region_13);
        $city_785->setName("Золочев");
        $manager->persist($city_785);


        $city_786 = new City();
        $city_786->setRegion($region_12);
        $city_786->setName("Зоринск");
        $manager->persist($city_786);


        $city_787 = new City();
        $city_787->setRegion($region_13);
        $city_787->setName("Зоротовичи");
        $manager->persist($city_787);


        $city_788 = new City();
        $city_788->setRegion($region_13);
        $city_788->setName("Зубра");
        $manager->persist($city_788);


        $city_789 = new City();
        $city_789->setRegion($region_5);
        $city_789->setName("Зугрэс");
        $manager->persist($city_789);


        $city_790 = new City();
        $city_790->setRegion($region_1);
        $city_790->setName("Зуя");
        $manager->persist($city_790);


        $city_791 = new City();
        $city_791->setRegion($region_19);
        $city_791->setName("пване-пусте");
        $manager->persist($city_791);


        $city_792 = new City();
        $city_792->setRegion($region_3);
        $city_792->setName("пваничи");
        $manager->persist($city_792);


        $city_793 = new City();
        $city_793->setRegion($region_10);
        $city_793->setName("пванков");
        $manager->persist($city_793);


        $city_794 = new City();
        $city_794->setRegion($region_10);
        $city_794->setName("пванков");
        $manager->persist($city_794);


        $city_795 = new City();
        $city_795->setRegion($region_25);
        $city_795->setName("пванковцы");
        $manager->persist($city_795);


        $city_796 = new City();
        $city_796->setRegion($region_11);
        $city_796->setName("пвано-Благодатное");
        $manager->persist($city_796);


        $city_797 = new City();
        $city_797->setRegion($region_13);
        $city_797->setName("пвано-франково");
        $manager->persist($city_797);


        $city_798 = new City();
        $city_798->setRegion($region_9);
        $city_798->setName("пвано-Франковск");
        $manager->persist($city_798);


        $city_799 = new City();
        $city_799->setRegion($region_4);
        $city_799->setName("пвано-яризовка");
        $manager->persist($city_799);


        $city_800 = new City();
        $city_800->setRegion($region_2);
        $city_800->setName("пванов");
        $manager->persist($city_800);


        $city_801 = new City();
        $city_801->setRegion($region_6);
        $city_801->setName("пвановка");
        $manager->persist($city_801);


        $city_802 = new City();
        $city_802->setRegion($region_21);
        $city_802->setName("пвановка");
        $manager->persist($city_802);


        $city_803 = new City();
        $city_803->setRegion($region_12);
        $city_803->setName("пвановка");
        $manager->persist($city_803);


        $city_804 = new City();
        $city_804->setRegion($region_21);
        $city_804->setName("пвановка");
        $manager->persist($city_804);


        $city_805 = new City();
        $city_805->setRegion($region_15);
        $city_805->setName("пвановка");
        $manager->persist($city_805);


        $city_806 = new City();
        $city_806->setRegion($region_9);
        $city_806->setName("пвановка");
        $manager->persist($city_806);


        $city_807 = new City();
        $city_807->setRegion($region_25);
        $city_807->setName("пвановцы");
        $manager->persist($city_807);


        $city_808 = new City();
        $city_808->setRegion($region_6);
        $city_808->setName("пванополь");
        $manager->persist($city_808);


        $city_809 = new City();
        $city_809->setRegion($region_5);
        $city_809->setName("пванополье");
        $manager->persist($city_809);


        $city_810 = new City();
        $city_810->setRegion($region_17);
        $city_810->setName("пванчи");
        $manager->persist($city_810);


        $city_811 = new City();
        $city_811->setRegion($region_3);
        $city_811->setName("пванычи");
        $manager->persist($city_811);


        $city_812 = new City();
        $city_812->setRegion($region_23);
        $city_812->setName("пваньки");
        $manager->persist($city_812);


        $city_813 = new City();
        $city_813->setRegion($region_6);
        $city_813->setName("пвашковка");
        $manager->persist($city_813);


        $city_814 = new City();
        $city_814->setRegion($region_7);
        $city_814->setName("пза");
        $manager->persist($city_814);


        $city_815 = new City();
        $city_815->setRegion($region_15);
        $city_815->setName("пзмаил");
        $manager->persist($city_815);


        $city_816 = new City();
        $city_816->setRegion($region_20);
        $city_816->setName("пзюм");
        $manager->persist($city_816);


        $city_817 = new City();
        $city_817->setRegion($region_22);
        $city_817->setName("пзяслав");
        $manager->persist($city_817);


        $city_818 = new City();
        $city_818->setRegion($region_4);
        $city_818->setName("плларионово");
        $manager->persist($city_818);


        $city_819 = new City();
        $city_819->setRegion($region_2);
        $city_819->setName("пллинцы");
        $manager->persist($city_819);


        $city_820 = new City();
        $city_820->setRegion($region_5);
        $city_820->setName("пловайск");
        $manager->persist($city_820);


        $city_821 = new City();
        $city_821->setRegion($region_2);
        $city_821->setName("пльинцы");
        $manager->persist($city_821);


        $city_822 = new City();
        $city_822->setRegion($region_5);
        $city_822->setName("пльича");
        $manager->persist($city_822);


        $city_823 = new City();
        $city_823->setRegion($region_15);
        $city_823->setName("пльичевка");
        $manager->persist($city_823);


        $city_824 = new City();
        $city_824->setRegion($region_15);
        $city_824->setName("пльичевск");
        $manager->persist($city_824);


        $city_825 = new City();
        $city_825->setRegion($region_5);
        $city_825->setName("пльичовское");
        $manager->persist($city_825);


        $city_826 = new City();
        $city_826->setRegion($region_7);
        $city_826->setName("пльница");
        $manager->persist($city_826);


        $city_827 = new City();
        $city_827->setRegion($region_4);
        $city_827->setName("пнгулец");
        $manager->persist($city_827);


        $city_828 = new City();
        $city_828->setRegion($region_4);
        $city_828->setName("пнгулец");
        $manager->persist($city_828);


        $city_829 = new City();
        $city_829->setRegion($region_1);
        $city_829->setName("пнкерман");
        $manager->persist($city_829);


        $city_830 = new City();
        $city_830->setRegion($region_2);
        $city_830->setName("посиповка");
        $manager->persist($city_830);


        $city_831 = new City();
        $city_831->setRegion($region_23);
        $city_831->setName("прклиев");
        $manager->persist($city_831);


        $city_832 = new City();
        $city_832->setRegion($region_10);
        $city_832->setName("прпень");
        $manager->persist($city_832);


        $city_833 = new City();
        $city_833->setRegion($region_7);
        $city_833->setName("пршава");
        $manager->persist($city_833);


        $city_834 = new City();
        $city_834->setRegion($region_6);
        $city_834->setName("пршанск");
        $manager->persist($city_834);


        $city_835 = new City();
        $city_835->setRegion($region_15);
        $city_835->setName("псаево");
        $manager->persist($city_835);


        $city_836 = new City();
        $city_836->setRegion($region_25);
        $city_836->setName("пспас");
        $manager->persist($city_836);


        $city_837 = new City();
        $city_837->setRegion($region_24);
        $city_837->setName("пчня");
        $manager->persist($city_837);


        $city_838 = new City();
        $city_838->setRegion($region_6);
        $city_838->setName("Йосиповка");
        $manager->persist($city_838);


        $city_839 = new City();
        $city_839->setRegion($region_10);
        $city_839->setName("Йосиповка");
        $manager->persist($city_839);


        $city_840 = new City();
        $city_840->setRegion($region_14);
        $city_840->setName("Кавуны");
        $manager->persist($city_840);


        $city_841 = new City();
        $city_841->setRegion($region_10);
        $city_841->setName("Кагарлык");
        $manager->persist($city_841);


        $city_842 = new City();
        $city_842->setRegion($region_14);
        $city_842->setName("Казанка");
        $manager->persist($city_842);


        $city_843 = new City();
        $city_843->setRegion($region_2);
        $city_843->setName("Казатин");
        $manager->persist($city_843);


        $city_844 = new City();
        $city_844->setRegion($region_21);
        $city_844->setName("Казацкое");
        $manager->persist($city_844);


        $city_845 = new City();
        $city_845->setRegion($region_21);
        $city_845->setName("Казачьи лагеря");
        $manager->persist($city_845);


        $city_846 = new City();
        $city_846->setRegion($region_20);
        $city_846->setName("Казачья Лопань");
        $manager->persist($city_846);


        $city_847 = new City();
        $city_847->setRegion($region_16);
        $city_847->setName("Калайдинцы");
        $manager->persist($city_847);


        $city_848 = new City();
        $city_848->setRegion($region_11);
        $city_848->setName("Калантаев");
        $manager->persist($city_848);


        $city_849 = new City();
        $city_849->setRegion($region_21);
        $city_849->setName("Каланчак");
        $manager->persist($city_849);


        $city_850 = new City();
        $city_850->setRegion($region_21);
        $city_850->setName("Калининское");
        $manager->persist($city_850);


        $city_851 = new City();
        $city_851->setRegion($region_13);
        $city_851->setName("Калинов");
        $manager->persist($city_851);


        $city_852 = new City();
        $city_852->setRegion($region_1);
        $city_852->setName("Калиновка");
        $manager->persist($city_852);


        $city_853 = new City();
        $city_853->setRegion($region_10);
        $city_853->setName("Калиновка");
        $manager->persist($city_853);


        $city_854 = new City();
        $city_854->setRegion($region_10);
        $city_854->setName("Калиновка");
        $manager->persist($city_854);


        $city_855 = new City();
        $city_855->setRegion($region_2);
        $city_855->setName("Калиновка");
        $manager->persist($city_855);


        $city_856 = new City();
        $city_856->setRegion($region_10);
        $city_856->setName("Калиновка");
        $manager->persist($city_856);


        $city_857 = new City();
        $city_857->setRegion($region_8);
        $city_857->setName("Калиновка");
        $manager->persist($city_857);


        $city_858 = new City();
        $city_858->setRegion($region_2);
        $city_858->setName("Калиновка вторая");
        $manager->persist($city_858);


        $city_859 = new City();
        $city_859->setRegion($region_7);
        $city_859->setName("Калины");
        $manager->persist($city_859);


        $city_860 = new City();
        $city_860->setRegion($region_10);
        $city_860->setName("Калита");
        $manager->persist($city_860);


        $city_861 = new City();
        $city_861->setRegion($region_11);
        $city_861->setName("Калмазово");
        $manager->persist($city_861);


        $city_862 = new City();
        $city_862->setRegion($region_9);
        $city_862->setName("Калуш");
        $manager->persist($city_862);


        $city_863 = new City();
        $city_863->setRegion($region_11);
        $city_863->setName("Камбурлиевка");
        $manager->persist($city_863);


        $city_864 = new City();
        $city_864->setRegion($region_22);
        $city_864->setName("Каменец-Подольский");
        $manager->persist($city_864);


        $city_865 = new City();
        $city_865->setRegion($region_7);
        $city_865->setName("Каменица");
        $manager->persist($city_865);


        $city_866 = new City();
        $city_866->setRegion($region_4);
        $city_866->setName("Каменка");
        $manager->persist($city_866);


        $city_867 = new City();
        $city_867->setRegion($region_22);
        $city_867->setName("Каменка");
        $manager->persist($city_867);


        $city_868 = new City();
        $city_868->setRegion($region_23);
        $city_868->setName("Каменка");
        $manager->persist($city_868);


        $city_869 = new City();
        $city_869->setRegion($region_13);
        $city_869->setName("Каменка-Бугская");
        $manager->persist($city_869);


        $city_870 = new City();
        $city_870->setRegion($region_8);
        $city_870->setName("Каменка-Днепровская");
        $manager->persist($city_870);


        $city_871 = new City();
        $city_871->setRegion($region_2);
        $city_871->setName("Каменногорка");
        $manager->persist($city_871);


        $city_872 = new City();
        $city_872->setRegion($region_6);
        $city_872->setName("Каменный брод");
        $manager->persist($city_872);


        $city_873 = new City();
        $city_873->setRegion($region_6);
        $city_873->setName("Каменный Брод");
        $manager->persist($city_873);


        $city_874 = new City();
        $city_874->setRegion($region_11);
        $city_874->setName("Каменный мост");
        $manager->persist($city_874);


        $city_875 = new City();
        $city_875->setRegion($region_14);
        $city_875->setName("Каменный Мост");
        $manager->persist($city_875);


        $city_876 = new City();
        $city_876->setRegion($region_1);
        $city_876->setName("Каменоломня");
        $manager->persist($city_876);


        $city_877 = new City();
        $city_877->setRegion($region_4);
        $city_877->setName("Каменское");
        $manager->persist($city_877);


        $city_878 = new City();
        $city_878->setRegion($region_3);
        $city_878->setName("Камень-Каширский");
        $manager->persist($city_878);


        $city_879 = new City();
        $city_879->setRegion($region_8);
        $city_879->setName("Камыш-Заря");
        $manager->persist($city_879);


        $city_880 = new City();
        $city_880->setRegion($region_21);
        $city_880->setName("Камышаны");
        $manager->persist($city_880);


        $city_881 = new City();
        $city_881->setRegion($region_8);
        $city_881->setName("Камышеваха");
        $manager->persist($city_881);


        $city_882 = new City();
        $city_882->setRegion($region_16);
        $city_882->setName("Камышня");
        $manager->persist($city_882);


        $city_883 = new City();
        $city_883->setRegion($region_7);
        $city_883->setName("Камянское");
        $manager->persist($city_883);


        $city_884 = new City();
        $city_884->setRegion($region_23);
        $city_884->setName("Канев");
        $manager->persist($city_884);


        $city_885 = new City();
        $city_885->setRegion($region_8);
        $city_885->setName("Каневское");
        $manager->persist($city_885);


        $city_886 = new City();
        $city_886->setRegion($region_11);
        $city_886->setName("Капитановка");
        $manager->persist($city_886);


        $city_887 = new City();
        $city_887->setRegion($region_20);
        $city_887->setName("Капитоловка");
        $manager->persist($city_887);


        $city_888 = new City();
        $city_888->setRegion($region_2);
        $city_888->setName("Капустин");
        $manager->persist($city_888);


        $city_889 = new City();
        $city_889->setRegion($region_16);
        $city_889->setName("Карловка");
        $manager->persist($city_889);


        $city_890 = new City();
        $city_890->setRegion($region_15);
        $city_890->setName("Каролино-бугаз");
        $manager->persist($city_890);


        $city_891 = new City();
        $city_891->setRegion($region_12);
        $city_891->setName("Карпаты");
        $manager->persist($city_891);


        $city_892 = new City();
        $city_892->setRegion($region_21);
        $city_892->setName("Карьерное");
        $manager->persist($city_892);


        $city_893 = new City();
        $city_893->setRegion($region_1);
        $city_893->setName("Карьерное");
        $manager->persist($city_893);


        $city_894 = new City();
        $city_894->setRegion($region_11);
        $city_894->setName("Катериновка");
        $manager->persist($city_894);


        $city_895 = new City();
        $city_895->setRegion($region_5);
        $city_895->setName("Катериновка");
        $manager->persist($city_895);


        $city_896 = new City();
        $city_896->setRegion($region_23);
        $city_896->setName("Катеринополь");
        $manager->persist($city_896);


        $city_897 = new City();
        $city_897->setRegion($region_21);
        $city_897->setName("Каховка");
        $manager->persist($city_897);


        $city_898 = new City();
        $city_898->setRegion($region_1);
        $city_898->setName("Кацивели");
        $manager->persist($city_898);


        $city_899 = new City();
        $city_899->setRegion($region_1);
        $city_899->setName("Кача");
        $manager->persist($city_899);


        $city_900 = new City();
        $city_900->setRegion($region_10);
        $city_900->setName("Кашперовка");
        $manager->persist($city_900);


        $city_901 = new City();
        $city_901->setRegion($region_17);
        $city_901->setName("Квасилов");
        $manager->persist($city_901);


        $city_902 = new City();
        $city_902->setRegion($region_7);
        $city_902->setName("Квасы");
        $manager->persist($city_902);


        $city_903 = new City();
        $city_903->setRegion($region_20);
        $city_903->setName("Кегичевка");
        $manager->persist($city_903);


        $city_904 = new City();
        $city_904->setRegion($region_25);
        $city_904->setName("Кельменцы");
        $manager->persist($city_904);


        $city_905 = new City();
        $city_905->setRegion($region_7);
        $city_905->setName("Кендерешов");
        $manager->persist($city_905);


        $city_906 = new City();
        $city_906->setRegion($region_1);
        $city_906->setName("Керчь");
        $manager->persist($city_906);


        $city_907 = new City();
        $city_907->setRegion($region_3);
        $city_907->setName("Киверцы");
        $manager->persist($city_907);


        $city_908 = new City();
        $city_908->setRegion($region_10);
        $city_908->setName("Киев");
        $manager->persist($city_908);


        $city_909 = new City();
        $city_909->setRegion($region_24);
        $city_909->setName("Киенка");
        $manager->persist($city_909);


        $city_910 = new City();
        $city_910->setRegion($region_15);
        $city_910->setName("Килия");
        $manager->persist($city_910);


        $city_911 = new City();
        $city_911->setRegion($region_4);
        $city_911->setName("Кильчень");
        $manager->persist($city_911);


        $city_912 = new City();
        $city_912->setRegion($region_6);
        $city_912->setName("Кирданы");
        $manager->persist($city_912);


        $city_913 = new City();
        $city_913->setRegion($region_18);
        $city_913->setName("Кириковка");
        $manager->persist($city_913);


        $city_914 = new City();
        $city_914->setRegion($region_8);
        $city_914->setName("Кирилловка");
        $manager->persist($city_914);


        $city_915 = new City();
        $city_915->setRegion($region_2);
        $city_915->setName("Кирнасивка");
        $manager->persist($city_915);


        $city_916 = new City();
        $city_916->setRegion($region_4);
        $city_916->setName("Кировка");
        $manager->persist($city_916);


        $city_917 = new City();
        $city_917->setRegion($region_11);
        $city_917->setName("Кировоград");
        $manager->persist($city_917);


        $city_918 = new City();
        $city_918->setRegion($region_12);
        $city_918->setName("Кировск");
        $manager->persist($city_918);


        $city_919 = new City();
        $city_919->setRegion($region_4);
        $city_919->setName("Кировское");
        $manager->persist($city_919);


        $city_920 = new City();
        $city_920->setRegion($region_1);
        $city_920->setName("Кировское");
        $manager->persist($city_920);


        $city_921 = new City();
        $city_921->setRegion($region_5);
        $city_921->setName("Кировское");
        $manager->persist($city_921);


        $city_922 = new City();
        $city_922->setRegion($region_25);
        $city_922->setName("Киселев");
        $manager->persist($city_922);


        $city_923 = new City();
        $city_923->setRegion($region_23);
        $city_923->setName("Киселевка");
        $manager->persist($city_923);


        $city_924 = new City();
        $city_924->setRegion($region_20);
        $city_924->setName("Кисели");
        $manager->persist($city_924);


        $city_925 = new City();
        $city_925->setRegion($region_25);
        $city_925->setName("Кицмань");
        $manager->persist($city_925);


        $city_926 = new City();
        $city_926->setRegion($region_6);
        $city_926->setName("Кишин");
        $manager->persist($city_926);


        $city_927 = new City();
        $city_927->setRegion($region_3);
        $city_927->setName("Кияж");
        $manager->persist($city_927);


        $city_928 = new City();
        $city_928->setRegion($region_18);
        $city_928->setName("Кияница");
        $manager->persist($city_928);


        $city_929 = new City();
        $city_929->setRegion($region_18);
        $city_929->setName("Кияница");
        $manager->persist($city_929);


        $city_930 = new City();
        $city_930->setRegion($region_10);
        $city_930->setName("Клавдиево-Тарасово");
        $manager->persist($city_930);


        $city_931 = new City();
        $city_931->setRegion($region_17);
        $city_931->setName("Клевань");
        $manager->persist($city_931);


        $city_932 = new City();
        $city_932->setRegion($region_2);
        $city_932->setName("Клембовка");
        $manager->persist($city_932);


        $city_933 = new City();
        $city_933->setRegion($region_22);
        $city_933->setName("Клембовка");
        $manager->persist($city_933);


        $city_934 = new City();
        $city_934->setRegion($region_6);
        $city_934->setName("Кленовая");
        $manager->persist($city_934);


        $city_935 = new City();
        $city_935->setRegion($region_7);
        $city_935->setName("Кленовец");
        $manager->persist($city_935);


        $city_936 = new City();
        $city_936->setRegion($region_5);
        $city_936->setName("Кленовка");
        $manager->persist($city_936);


        $city_937 = new City();
        $city_937->setRegion($region_12);
        $city_937->setName("Кленовый");
        $manager->persist($city_937);


        $city_938 = new City();
        $city_938->setRegion($region_17);
        $city_938->setName("Клесов");
        $manager->persist($city_938);


        $city_939 = new City();
        $city_939->setRegion($region_6);
        $city_939->setName("Клетчин");
        $manager->persist($city_939);


        $city_940 = new City();
        $city_940->setRegion($region_22);
        $city_940->setName("Климашовка");
        $manager->persist($city_940);


        $city_941 = new City();
        $city_941->setRegion($region_11);
        $city_941->setName("Клинцы");
        $manager->persist($city_941);


        $city_942 = new City();
        $city_942->setRegion($region_25);
        $city_942->setName("Клишковцы");
        $manager->persist($city_942);


        $city_943 = new City();
        $city_943->setRegion($region_7);
        $city_943->setName("Ключарки");
        $manager->persist($city_943);


        $city_944 = new City();
        $city_944->setRegion($region_9);
        $city_944->setName("Княжелука");
        $manager->persist($city_944);


        $city_945 = new City();
        $city_945->setRegion($region_10);
        $city_945->setName("Княжичи");
        $manager->persist($city_945);


        $city_946 = new City();
        $city_946->setRegion($region_22);
        $city_946->setName("Княжполь");
        $manager->persist($city_946);


        $city_947 = new City();
        $city_947->setRegion($region_16);
        $city_947->setName("Кобеляки");
        $manager->persist($city_947);


        $city_948 = new City();
        $city_948->setRegion($region_14);
        $city_948->setName("Коблево");
        $manager->persist($city_948);


        $city_949 = new City();
        $city_949->setRegion($region_7);
        $city_949->setName("Кобылецкая поляна");
        $manager->persist($city_949);


        $city_950 = new City();
        $city_950->setRegion($region_16);
        $city_950->setName("Ковалевка");
        $manager->persist($city_950);


        $city_951 = new City();
        $city_951->setRegion($region_9);
        $city_951->setName("Ковалевка");
        $manager->persist($city_951);


        $city_952 = new City();
        $city_952->setRegion($region_2);
        $city_952->setName("Ковалевка");
        $manager->persist($city_952);


        $city_953 = new City();
        $city_953->setRegion($region_3);
        $city_953->setName("Ковель");
        $manager->persist($city_953);


        $city_954 = new City();
        $city_954->setRegion($region_24);
        $city_954->setName("Ковпыта");
        $manager->persist($city_954);


        $city_955 = new City();
        $city_955->setRegion($region_20);
        $city_955->setName("Ковшаровка");
        $manager->persist($city_955);


        $city_956 = new City();
        $city_956->setRegion($region_20);
        $city_956->setName("Ковяги");
        $manager->persist($city_956);


        $city_957 = new City();
        $city_957->setRegion($region_10);
        $city_957->setName("Кодра");
        $manager->persist($city_957);


        $city_958 = new City();
        $city_958->setRegion($region_15);
        $city_958->setName("Кодыма");
        $manager->persist($city_958);


        $city_959 = new City();
        $city_959->setRegion($region_10);
        $city_959->setName("Кожанка");
        $manager->persist($city_959);


        $city_960 = new City();
        $city_960->setRegion($region_8);
        $city_960->setName("Коза");
        $manager->persist($city_960);


        $city_961 = new City();
        $city_961->setRegion($region_24);
        $city_961->setName("Козелец");
        $manager->persist($city_961);


        $city_962 = new City();
        $city_962->setRegion($region_16);
        $city_962->setName("Козельщина");
        $manager->persist($city_962);


        $city_963 = new City();
        $city_963->setRegion($region_17);
        $city_963->setName("Козин");
        $manager->persist($city_963);


        $city_964 = new City();
        $city_964->setRegion($region_10);
        $city_964->setName("Козин");
        $manager->persist($city_964);


        $city_965 = new City();
        $city_965->setRegion($region_19);
        $city_965->setName("Козлов");
        $manager->persist($city_965);


        $city_966 = new City();
        $city_966->setRegion($region_19);
        $city_966->setName("Козова");
        $manager->persist($city_966);


        $city_967 = new City();
        $city_967->setRegion($region_2);
        $city_967->setName("Козятин");
        $manager->persist($city_967);


        $city_968 = new City();
        $city_968->setRegion($region_1);
        $city_968->setName("Коктебель");
        $manager->persist($city_968);


        $city_969 = new City();
        $city_969->setRegion($region_14);
        $city_969->setName("Коларовка");
        $manager->persist($city_969);


        $city_970 = new City();
        $city_970->setRegion($region_3);
        $city_970->setName("Колки");
        $manager->persist($city_970);


        $city_971 = new City();
        $city_971->setRegion($region_17);
        $city_971->setName("Колоденка");
        $manager->persist($city_971);


        $city_972 = new City();
        $city_972->setRegion($region_23);
        $city_972->setName("Колодистое");
        $manager->persist($city_972);


        $city_973 = new City();
        $city_973->setRegion($region_20);
        $city_973->setName("Коломак");
        $manager->persist($city_973);


        $city_974 = new City();
        $city_974->setRegion($region_9);
        $city_974->setName("Коломыя");
        $manager->persist($city_974);


        $city_975 = new City();
        $city_975->setRegion($region_7);
        $city_975->setName("Колочава");
        $manager->persist($city_975);


        $city_976 = new City();
        $city_976->setRegion($region_24);
        $city_976->setName("Колычовка");
        $manager->persist($city_976);


        $city_977 = new City();
        $city_977->setRegion($region_7);
        $city_977->setName("Кольчино");
        $manager->persist($city_977);


        $city_978 = new City();
        $city_978->setRegion($region_1);
        $city_978->setName("Кольчугино");
        $manager->persist($city_978);


        $city_979 = new City();
        $city_979->setRegion($region_13);
        $city_979->setName("Комарно");
        $manager->persist($city_979);


        $city_980 = new City();
        $city_980->setRegion($region_25);
        $city_980->setName("Комаровцы");
        $manager->persist($city_980);


        $city_981 = new City();
        $city_981->setRegion($region_23);
        $city_981->setName("Коминтерн");
        $manager->persist($city_981);


        $city_982 = new City();
        $city_982->setRegion($region_15);
        $city_982->setName("Коминтерновское");
        $manager->persist($city_982);


        $city_983 = new City();
        $city_983->setRegion($region_12);
        $city_983->setName("Комиссаровка");
        $manager->persist($city_983);


        $city_984 = new City();
        $city_984->setRegion($region_21);
        $city_984->setName("Коммуна");
        $manager->persist($city_984);


        $city_985 = new City();
        $city_985->setRegion($region_20);
        $city_985->setName("Коммунар");
        $manager->persist($city_985);


        $city_986 = new City();
        $city_986->setRegion($region_20);
        $city_986->setName("Коммунар");
        $manager->persist($city_986);


        $city_987 = new City();
        $city_987->setRegion($region_11);
        $city_987->setName("Компанеевка");
        $manager->persist($city_987);


        $city_988 = new City();
        $city_988->setRegion($region_16);
        $city_988->setName("Комсомольск");
        $manager->persist($city_988);


        $city_989 = new City();
        $city_989->setRegion($region_20);
        $city_989->setName("Комсомольский");
        $manager->persist($city_989);


        $city_990 = new City();
        $city_990->setRegion($region_20);
        $city_990->setName("Комсомольское");
        $manager->persist($city_990);


        $city_991 = new City();
        $city_991->setRegion($region_5);
        $city_991->setName("Комсомольское");
        $manager->persist($city_991);


        $city_992 = new City();
        $city_992->setRegion($region_1);
        $city_992->setName("Комсомольское");
        $manager->persist($city_992);


        $city_993 = new City();
        $city_993->setRegion($region_5);
        $city_993->setName("Кондратовка");
        $manager->persist($city_993);


        $city_994 = new City();
        $city_994->setRegion($region_23);
        $city_994->setName("Кононовка");
        $manager->persist($city_994);


        $city_995 = new City();
        $city_995->setRegion($region_13);
        $city_995->setName("Конопница");
        $manager->persist($city_995);


        $city_996 = new City();
        $city_996->setRegion($region_18);
        $city_996->setName("Конотоп");
        $manager->persist($city_996);


        $city_997 = new City();
        $city_997->setRegion($region_8);
        $city_997->setName("Константиновка");
        $manager->persist($city_997);


        $city_998 = new City();
        $city_998->setRegion($region_14);
        $city_998->setName("Константиновка");
        $manager->persist($city_998);


        $city_999 = new City();
        $city_999->setRegion($region_17);
        $city_999->setName("Константиновка");
        $manager->persist($city_999);


        $city_1000 = new City();
        $city_1000->setRegion($region_5);
        $city_1000->setName("Константиновка");
        $manager->persist($city_1000);


        $city_1001 = new City();
        $city_1001->setRegion($region_11);
        $city_1001->setName("Константиновка");
        $manager->persist($city_1001);


        $city_1002 = new City();
        $city_1002->setRegion($region_20);
        $city_1002->setName("Константиновка");
        $manager->persist($city_1002);


        $city_1003 = new City();
        $city_1003->setRegion($region_2);
        $city_1003->setName("Копайгород");
        $manager->persist($city_1003);


        $city_1004 = new City();
        $city_1004->setRegion($region_16);
        $city_1004->setName("Копылы");
        $manager->persist($city_1004);


        $city_1005 = new City();
        $city_1005->setRegion($region_22);
        $city_1005->setName("Копыстин");
        $manager->persist($city_1005);


        $city_1006 = new City();
        $city_1006->setRegion($region_19);
        $city_1006->setName("Копычинцы");
        $manager->persist($city_1006);


        $city_1007 = new City();
        $city_1007->setRegion($region_19);
        $city_1007->setName("Копычинцы");
        $manager->persist($city_1007);


        $city_1008 = new City();
        $city_1008->setRegion($region_2);
        $city_1008->setName("Корделевка");
        $manager->persist($city_1008);


        $city_1009 = new City();
        $city_1009->setRegion($region_1);
        $city_1009->setName("Кореиз");
        $manager->persist($city_1009);


        $city_1010 = new City();
        $city_1010->setRegion($region_17);
        $city_1010->setName("Корец");
        $manager->persist($city_1010);


        $city_1011 = new City();
        $city_1011->setRegion($region_19);
        $city_1011->setName("Коржова");
        $manager->persist($city_1011);


        $city_1012 = new City();
        $city_1012->setRegion($region_6);
        $city_1012->setName("Корнин");
        $manager->persist($city_1012);


        $city_1013 = new City();
        $city_1013->setRegion($region_17);
        $city_1013->setName("Корнин");
        $manager->persist($city_1013);


        $city_1014 = new City();
        $city_1014->setRegion($region_9);
        $city_1014->setName("Корнич");
        $manager->persist($city_1014);


        $city_1015 = new City();
        $city_1015->setRegion($region_13);
        $city_1015->setName("Корничи");
        $manager->persist($city_1015);


        $city_1016 = new City();
        $city_1016->setRegion($region_21);
        $city_1016->setName("Коробки");
        $manager->persist($city_1016);


        $city_1017 = new City();
        $city_1017->setRegion($region_20);
        $city_1017->setName("Коробочкино");
        $manager->persist($city_1017);


        $city_1018 = new City();
        $city_1018->setRegion($region_25);
        $city_1018->setName("Коровия");
        $manager->persist($city_1018);


        $city_1019 = new City();
        $city_1019->setRegion($region_9);
        $city_1019->setName("Королевка");
        $manager->persist($city_1019);


        $city_1020 = new City();
        $city_1020->setRegion($region_10);
        $city_1020->setName("Королевка");
        $manager->persist($city_1020);


        $city_1021 = new City();
        $city_1021->setRegion($region_7);
        $city_1021->setName("Королево");
        $manager->persist($city_1021);


        $city_1022 = new City();
        $city_1022->setRegion($region_24);
        $city_1022->setName("Короп");
        $manager->persist($city_1022);


        $city_1023 = new City();
        $city_1023->setRegion($region_19);
        $city_1023->setName("Коропец");
        $manager->persist($city_1023);


        $city_1024 = new City();
        $city_1024->setRegion($region_13);
        $city_1024->setName("Коропуж");
        $manager->persist($city_1024);


        $city_1025 = new City();
        $city_1025->setRegion($region_6);
        $city_1025->setName("Коростень");
        $manager->persist($city_1025);


        $city_1026 = new City();
        $city_1026->setRegion($region_13);
        $city_1026->setName("Коростов");
        $manager->persist($city_1026);


        $city_1027 = new City();
        $city_1027->setRegion($region_6);
        $city_1027->setName("Коростышев");
        $manager->persist($city_1027);


        $city_1028 = new City();
        $city_1028->setRegion($region_20);
        $city_1028->setName("Коротыч");
        $manager->persist($city_1028);


        $city_1029 = new City();
        $city_1029->setRegion($region_21);
        $city_1029->setName("Корсунка");
        $manager->persist($city_1029);


        $city_1030 = new City();
        $city_1030->setRegion($region_23);
        $city_1030->setName("Корсунь-Шевченковский");
        $manager->persist($city_1030);


        $city_1031 = new City();
        $city_1031->setRegion($region_13);
        $city_1031->setName("Корчев");
        $manager->persist($city_1031);


        $city_1032 = new City();
        $city_1032->setRegion($region_22);
        $city_1032->setName("Корчевка");
        $manager->persist($city_1032);


        $city_1033 = new City();
        $city_1033->setRegion($region_17);
        $city_1033->setName("Корысть");
        $manager->persist($city_1033);


        $city_1034 = new City();
        $city_1034->setRegion($region_25);
        $city_1034->setName("Корытное");
        $manager->persist($city_1034);


        $city_1035 = new City();
        $city_1035->setRegion($region_24);
        $city_1035->setName("Корюковка");
        $manager->persist($city_1035);


        $city_1036 = new City();
        $city_1036->setRegion($region_19);
        $city_1036->setName("Косов");
        $manager->persist($city_1036);


        $city_1037 = new City();
        $city_1037->setRegion($region_9);
        $city_1037->setName("Косов");
        $manager->persist($city_1037);


        $city_1038 = new City();
        $city_1038->setRegion($region_11);
        $city_1038->setName("Косовка");
        $manager->persist($city_1038);


        $city_1039 = new City();
        $city_1039->setRegion($region_7);
        $city_1039->setName("Косовская поляна");
        $manager->persist($city_1039);


        $city_1040 = new City();
        $city_1040->setRegion($region_7);
        $city_1040->setName("Косонь");
        $manager->persist($city_1040);


        $city_1041 = new City();
        $city_1041->setRegion($region_25);
        $city_1041->setName("Костинцы");
        $manager->persist($city_1041);


        $city_1042 = new City();
        $city_1042->setRegion($region_17);
        $city_1042->setName("Костополь");
        $manager->persist($city_1042);


        $city_1043 = new City();
        $city_1043->setRegion($region_25);
        $city_1043->setName("Кострижевка");
        $manager->persist($city_1043);


        $city_1044 = new City();
        $city_1044->setRegion($region_16);
        $city_1044->setName("Котельва");
        $manager->persist($city_1044);


        $city_1045 = new City();
        $city_1045->setRegion($region_17);
        $city_1045->setName("Котов");
        $manager->persist($city_1045);


        $city_1046 = new City();
        $city_1046->setRegion($region_15);
        $city_1046->setName("Котовка");
        $manager->persist($city_1046);


        $city_1047 = new City();
        $city_1047->setRegion($region_6);
        $city_1047->setName("Котовка");
        $manager->persist($city_1047);


        $city_1048 = new City();
        $city_1048->setRegion($region_15);
        $city_1048->setName("Котовск");
        $manager->persist($city_1048);


        $city_1049 = new City();
        $city_1049->setRegion($region_10);
        $city_1049->setName("Коцюбинское");
        $manager->persist($city_1049);


        $city_1050 = new City();
        $city_1050->setRegion($region_3);
        $city_1050->setName("Коцюры");
        $manager->persist($city_1050);


        $city_1051 = new City();
        $city_1051->setRegion($region_6);
        $city_1051->setName("Кочеров");
        $manager->persist($city_1051);


        $city_1052 = new City();
        $city_1052->setRegion($region_20);
        $city_1052->setName("Кочеток");
        $manager->persist($city_1052);


        $city_1053 = new City();
        $city_1053->setRegion($region_6);
        $city_1053->setName("Кошелевка");
        $manager->persist($city_1053);


        $city_1054 = new City();
        $city_1054->setRegion($region_13);
        $city_1054->setName("Краковец");
        $manager->persist($city_1054);


        $city_1055 = new City();
        $city_1055->setRegion($region_5);
        $city_1055->setName("Краматорск");
        $manager->persist($city_1055);


        $city_1056 = new City();
        $city_1056->setRegion($region_24);
        $city_1056->setName("Крапивное");
        $manager->persist($city_1056);


        $city_1057 = new City();
        $city_1057->setRegion($region_6);
        $city_1057->setName("Крапивня");
        $manager->persist($city_1057);


        $city_1058 = new City();
        $city_1058->setRegion($region_6);
        $city_1058->setName("Крапивня");
        $manager->persist($city_1058);


        $city_1059 = new City();
        $city_1059->setRegion($region_22);
        $city_1059->setName("Красилов");
        $manager->persist($city_1059);


        $city_1060 = new City();
        $city_1060->setRegion($region_10);
        $city_1060->setName("Красиловка");
        $manager->persist($city_1060);


        $city_1061 = new City();
        $city_1061->setRegion($region_5);
        $city_1061->setName("Красная поляна");
        $manager->persist($city_1061);


        $city_1062 = new City();
        $city_1062->setRegion($region_5);
        $city_1062->setName("Красноармейск");
        $manager->persist($city_1062);


        $city_1063 = new City();
        $city_1063->setRegion($region_4);
        $city_1063->setName("Красногвардейский");
        $manager->persist($city_1063);


        $city_1064 = new City();
        $city_1064->setRegion($region_1);
        $city_1064->setName("Красногвардейское");
        $manager->persist($city_1064);


        $city_1065 = new City();
        $city_1065->setRegion($region_1);
        $city_1065->setName("Красногвардейское");
        $manager->persist($city_1065);


        $city_1066 = new City();
        $city_1066->setRegion($region_6);
        $city_1066->setName("Красногорка");
        $manager->persist($city_1066);


        $city_1067 = new City();
        $city_1067->setRegion($region_5);
        $city_1067->setName("Красногоровка");
        $manager->persist($city_1067);


        $city_1068 = new City();
        $city_1068->setRegion($region_5);
        $city_1068->setName("Красногоровка");
        $manager->persist($city_1068);


        $city_1069 = new City();
        $city_1069->setRegion($region_20);
        $city_1069->setName("Красноград");
        $manager->persist($city_1069);


        $city_1070 = new City();
        $city_1070->setRegion($region_12);
        $city_1070->setName("Краснодон");
        $manager->persist($city_1070);


        $city_1071 = new City();
        $city_1071->setRegion($region_24);
        $city_1071->setName("Красное");
        $manager->persist($city_1071);


        $city_1072 = new City();
        $city_1072->setRegion($region_14);
        $city_1072->setName("Красное");
        $manager->persist($city_1072);


        $city_1073 = new City();
        $city_1073->setRegion($region_10);
        $city_1073->setName("Красное");
        $manager->persist($city_1073);


        $city_1074 = new City();
        $city_1074->setRegion($region_13);
        $city_1074->setName("Красное");
        $manager->persist($city_1074);


        $city_1075 = new City();
        $city_1075->setRegion($region_5);
        $city_1075->setName("Красное");
        $manager->persist($city_1075);


        $city_1076 = new City();
        $city_1076->setRegion($region_2);
        $city_1076->setName("Красное");
        $manager->persist($city_1076);


        $city_1077 = new City();
        $city_1077->setRegion($region_25);
        $city_1077->setName("Красноильск");
        $manager->persist($city_1077);


        $city_1078 = new City();
        $city_1078->setRegion($region_1);
        $city_1078->setName("Краснокаменка");
        $manager->persist($city_1078);


        $city_1079 = new City();
        $city_1079->setRegion($region_20);
        $city_1079->setName("Краснокутск");
        $manager->persist($city_1079);


        $city_1080 = new City();
        $city_1080->setRegion($region_12);
        $city_1080->setName("Краснолучский");
        $manager->persist($city_1080);


        $city_1081 = new City();
        $city_1081->setRegion($region_20);
        $city_1081->setName("Краснопавловка");
        $manager->persist($city_1081);


        $city_1082 = new City();
        $city_1082->setRegion($region_1);
        $city_1082->setName("Красноперекопск");
        $manager->persist($city_1082);


        $city_1083 = new City();
        $city_1083->setRegion($region_6);
        $city_1083->setName("Краснополь");
        $manager->persist($city_1083);


        $city_1084 = new City();
        $city_1084->setRegion($region_18);
        $city_1084->setName("Краснополье");
        $manager->persist($city_1084);


        $city_1085 = new City();
        $city_1085->setRegion($region_12);
        $city_1085->setName("Краснореченское");
        $manager->persist($city_1085);


        $city_1086 = new City();
        $city_1086->setRegion($region_22);
        $city_1086->setName("Красноселка");
        $manager->persist($city_1086);


        $city_1087 = new City();
        $city_1087->setRegion($region_15);
        $city_1087->setName("Красноселка");
        $manager->persist($city_1087);


        $city_1088 = new City();
        $city_1088->setRegion($region_2);
        $city_1088->setName("Красноселка");
        $manager->persist($city_1088);


        $city_1089 = new City();
        $city_1089->setRegion($region_15);
        $city_1089->setName("Красные Окны");
        $manager->persist($city_1089);


        $city_1090 = new City();
        $city_1090->setRegion($region_23);
        $city_1090->setName("Красный Кут");
        $manager->persist($city_1090);


        $city_1091 = new City();
        $city_1091->setRegion($region_5);
        $city_1091->setName("Красный Лиман");
        $manager->persist($city_1091);


        $city_1092 = new City();
        $city_1092->setRegion($region_12);
        $city_1092->setName("Красный Луч");
        $manager->persist($city_1092);


        $city_1093 = new City();
        $city_1093->setRegion($region_5);
        $city_1093->setName("Красный партизан");
        $manager->persist($city_1093);


        $city_1094 = new City();
        $city_1094->setRegion($region_19);
        $city_1094->setName("Кременец");
        $manager->persist($city_1094);


        $city_1095 = new City();
        $city_1095->setRegion($region_19);
        $city_1095->setName("Кременец");
        $manager->persist($city_1095);


        $city_1096 = new City();
        $city_1096->setRegion($region_12);
        $city_1096->setName("Кременная");
        $manager->persist($city_1096);


        $city_1097 = new City();
        $city_1097->setRegion($region_16);
        $city_1097->setName("Кременчуг");
        $manager->persist($city_1097);


        $city_1098 = new City();
        $city_1098->setRegion($region_23);
        $city_1098->setName("Кременчуки");
        $manager->persist($city_1098);


        $city_1099 = new City();
        $city_1099->setRegion($region_15);
        $city_1099->setName("Кремидовка");
        $manager->persist($city_1099);


        $city_1100 = new City();
        $city_1100->setRegion($region_12);
        $city_1100->setName("Крепенский");
        $manager->persist($city_1100);


        $city_1101 = new City();
        $city_1101->setRegion($region_5);
        $city_1101->setName("Крестище");
        $manager->persist($city_1101);


        $city_1102 = new City();
        $city_1102->setRegion($region_4);
        $city_1102->setName("Кривбасс");
        $manager->persist($city_1102);


        $city_1103 = new City();
        $city_1103->setRegion($region_14);
        $city_1103->setName("Кривое Озеро");
        $manager->persist($city_1103);


        $city_1104 = new City();
        $city_1104->setRegion($region_4);
        $city_1104->setName("Кривой Рог");
        $manager->persist($city_1104);


        $city_1105 = new City();
        $city_1105->setRegion($region_1);
        $city_1105->setName("Кримское");
        $manager->persist($city_1105);


        $city_1106 = new City();
        $city_1106->setRegion($region_4);
        $city_1106->setName("Кринички");
        $manager->persist($city_1106);


        $city_1107 = new City();
        $city_1107->setRegion($region_15);
        $city_1107->setName("Криничное");
        $manager->persist($city_1107);


        $city_1108 = new City();
        $city_1108->setRegion($region_9);
        $city_1108->setName("Криховцы");
        $manager->persist($city_1108);


        $city_1109 = new City();
        $city_1109->setRegion($region_18);
        $city_1109->setName("Кролевец");
        $manager->persist($city_1109);


        $city_1110 = new City();
        $city_1110->setRegion($region_16);
        $city_1110->setName("Кротенки");
        $manager->persist($city_1110);


        $city_1111 = new City();
        $city_1111->setRegion($region_3);
        $city_1111->setName("Крупа");
        $manager->persist($city_1111);


        $city_1112 = new City();
        $city_1112->setRegion($region_15);
        $city_1112->setName("Крыжановка");
        $manager->persist($city_1112);


        $city_1113 = new City();
        $city_1113->setRegion($region_2);
        $city_1113->setName("Крыжополь");
        $manager->persist($city_1113);


        $city_1114 = new City();
        $city_1114->setRegion($region_6);
        $city_1114->setName("Крымок");
        $manager->persist($city_1114);


        $city_1115 = new City();
        $city_1115->setRegion($region_10);
        $city_1115->setName("Крюковщина");
        $manager->persist($city_1115);


        $city_1116 = new City();
        $city_1116->setRegion($region_6);
        $city_1116->setName("Ксаверов");
        $manager->persist($city_1116);


        $city_1117 = new City();
        $city_1117->setRegion($region_10);
        $city_1117->setName("Ксаверовка");
        $manager->persist($city_1117);


        $city_1118 = new City();
        $city_1118->setRegion($region_17);
        $city_1118->setName("Кузнецовск");
        $manager->persist($city_1118);


        $city_1119 = new City();
        $city_1119->setRegion($region_1);
        $city_1119->setName("Куйбышево");
        $manager->persist($city_1119);


        $city_1120 = new City();
        $city_1120->setRegion($region_8);
        $city_1120->setName("Куйбышево");
        $manager->persist($city_1120);


        $city_1121 = new City();
        $city_1121->setRegion($region_13);
        $city_1121->setName("Куликов");
        $manager->persist($city_1121);


        $city_1122 = new City();
        $city_1122->setRegion($region_24);
        $city_1122->setName("Куликовка");
        $manager->persist($city_1122);


        $city_1123 = new City();
        $city_1123->setRegion($region_20);
        $city_1123->setName("Кулиничи");
        $manager->persist($city_1123);


        $city_1124 = new City();
        $city_1124->setRegion($region_3);
        $city_1124->setName("Кульчин");
        $manager->persist($city_1124);


        $city_1125 = new City();
        $city_1125->setRegion($region_14);
        $city_1125->setName("Кумари");
        $manager->persist($city_1125);


        $city_1126 = new City();
        $city_1126->setRegion($region_22);
        $city_1126->setName("Купин");
        $manager->persist($city_1126);


        $city_1127 = new City();
        $city_1127->setRegion($region_20);
        $city_1127->setName("Купянск");
        $manager->persist($city_1127);


        $city_1128 = new City();
        $city_1128->setRegion($region_5);
        $city_1128->setName("Кураховка");
        $manager->persist($city_1128);


        $city_1129 = new City();
        $city_1129->setRegion($region_5);
        $city_1129->setName("Курахово");
        $manager->persist($city_1129);


        $city_1130 = new City();
        $city_1130->setRegion($region_5);
        $city_1130->setName("Курдюмовка");
        $manager->persist($city_1130);


        $city_1131 = new City();
        $city_1131->setRegion($region_4);
        $city_1131->setName("Куриловка");
        $manager->persist($city_1131);


        $city_1132 = new City();
        $city_1132->setRegion($region_20);
        $city_1132->setName("Куриловка");
        $manager->persist($city_1132);


        $city_1133 = new City();
        $city_1133->setRegion($region_13);
        $city_1133->setName("Куровичи");
        $manager->persist($city_1133);


        $city_1134 = new City();
        $city_1134->setRegion($region_1);
        $city_1134->setName("Курпаты");
        $manager->persist($city_1134);


        $city_1135 = new City();
        $city_1135->setRegion($region_3);
        $city_1135->setName("Куснища");
        $manager->persist($city_1135);


        $city_1136 = new City();
        $city_1136->setRegion($region_17);
        $city_1136->setName("Кустин");
        $manager->persist($city_1136);


        $city_1137 = new City();
        $city_1137->setRegion($region_9);
        $city_1137->setName("Куты");
        $manager->persist($city_1137);


        $city_1138 = new City();
        $city_1138->setRegion($region_24);
        $city_1138->setName("Куты вторые");
        $manager->persist($city_1138);


        $city_1139 = new City();
        $city_1139->setRegion($region_7);
        $city_1139->setName("Куштановица");
        $manager->persist($city_1139);


        $city_1140 = new City();
        $city_1140->setRegion($region_8);
        $city_1140->setName("Кушугум");
        $manager->persist($city_1140);


        $city_1141 = new City();
        $city_1141->setRegion($region_18);
        $city_1141->setName("Куяновка");
        $manager->persist($city_1141);


        $city_1142 = new City();
        $city_1142->setRegion($region_24);
        $city_1142->setName("Ладан");
        $manager->persist($city_1142);


        $city_1143 = new City();
        $city_1143->setRegion($region_24);
        $city_1143->setName("Ладинка");
        $manager->persist($city_1143);


        $city_1144 = new City();
        $city_1144->setRegion($region_2);
        $city_1144->setName("Ладыжин");
        $manager->persist($city_1144);


        $city_1145 = new City();
        $city_1145->setRegion($region_23);
        $city_1145->setName("Ладыжинка");
        $manager->persist($city_1145);


        $city_1146 = new City();
        $city_1146->setRegion($region_16);
        $city_1146->setName("Лазорки");
        $manager->persist($city_1146);


        $city_1147 = new City();
        $city_1147->setRegion($region_21);
        $city_1147->setName("Лазурное");
        $manager->persist($city_1147);


        $city_1148 = new City();
        $city_1148->setRegion($region_7);
        $city_1148->setName("Лазы");
        $manager->persist($city_1148);


        $city_1149 = new City();
        $city_1149->setRegion($region_15);
        $city_1149->setName("Ланна");
        $manager->persist($city_1149);


        $city_1150 = new City();
        $city_1150->setRegion($region_16);
        $city_1150->setName("Ланна.");
        $manager->persist($city_1150);


        $city_1151 = new City();
        $city_1151->setRegion($region_19);
        $city_1151->setName("Лановцы");
        $manager->persist($city_1151);


        $city_1152 = new City();
        $city_1152->setRegion($region_9);
        $city_1152->setName("Ланчин");
        $manager->persist($city_1152);


        $city_1153 = new City();
        $city_1153->setRegion($region_13);
        $city_1153->setName("Лапаевка");
        $manager->persist($city_1153);


        $city_1154 = new City();
        $city_1154->setRegion($region_15);
        $city_1154->setName("Ларжанка");
        $manager->persist($city_1154);


        $city_1155 = new City();
        $city_1155->setRegion($region_23);
        $city_1155->setName("Лебедевка");
        $manager->persist($city_1155);


        $city_1156 = new City();
        $city_1156->setRegion($region_18);
        $city_1156->setName("Лебедин");
        $manager->persist($city_1156);


        $city_1157 = new City();
        $city_1157->setRegion($region_20);
        $city_1157->setName("Лебяжье");
        $manager->persist($city_1157);


        $city_1158 = new City();
        $city_1158->setRegion($region_25);
        $city_1158->setName("Левинцы");
        $manager->persist($city_1158);


        $city_1159 = new City();
        $city_1159->setRegion($region_11);
        $city_1159->setName("Лекаревка");
        $manager->persist($city_1159);


        $city_1160 = new City();
        $city_1160->setRegion($region_16);
        $city_1160->setName("Лелюховка");
        $manager->persist($city_1160);


        $city_1161 = new City();
        $city_1161->setRegion($region_1);
        $city_1161->setName("Ленино");
        $manager->persist($city_1161);


        $city_1162 = new City();
        $city_1162->setRegion($region_22);
        $city_1162->setName("Ленковцы");
        $manager->persist($city_1162);


        $city_1163 = new City();
        $city_1163->setRegion($region_12);
        $city_1163->setName("Лесная дача");
        $manager->persist($city_1163);


        $city_1164 = new City();
        $city_1164->setRegion($region_22);
        $city_1164->setName("Лесовые гриневцы");
        $manager->persist($city_1164);


        $city_1165 = new City();
        $city_1165->setRegion($region_23);
        $city_1165->setName("Леськи");
        $manager->persist($city_1165);


        $city_1166 = new City();
        $city_1166->setRegion($region_22);
        $city_1166->setName("Летичев");
        $manager->persist($city_1166);


        $city_1167 = new City();
        $city_1167->setRegion($region_10);
        $city_1167->setName("Летки");
        $manager->persist($city_1167);


        $city_1168 = new City();
        $city_1168->setRegion($region_13);
        $city_1168->setName("Лешня");
        $manager->persist($city_1168);


        $city_1169 = new City();
        $city_1169->setRegion($region_1);
        $city_1169->setName("Ливадия");
        $manager->persist($city_1169);


        $city_1170 = new City();
        $city_1170->setRegion($region_20);
        $city_1170->setName("Лиман");
        $manager->persist($city_1170);


        $city_1171 = new City();
        $city_1171->setRegion($region_15);
        $city_1171->setName("Лиманское");
        $manager->persist($city_1171);


        $city_1172 = new City();
        $city_1172->setRegion($region_14);
        $city_1172->setName("Лиманы");
        $manager->persist($city_1172);


        $city_1173 = new City();
        $city_1173->setRegion($region_24);
        $city_1173->setName("Линовица");
        $manager->persist($city_1173);


        $city_1174 = new City();
        $city_1174->setRegion($region_7);
        $city_1174->setName("Линцы");
        $manager->persist($city_1174);


        $city_1175 = new City();
        $city_1175->setRegion($region_3);
        $city_1175->setName("Липины");
        $manager->persist($city_1175);


        $city_1176 = new City();
        $city_1176->setRegion($region_6);
        $city_1176->setName("Липники");
        $manager->persist($city_1176);


        $city_1177 = new City();
        $city_1177->setRegion($region_11);
        $city_1177->setName("Липняжка");
        $manager->persist($city_1177);


        $city_1178 = new City();
        $city_1178->setRegion($region_18);
        $city_1178->setName("Липовая Долина");
        $manager->persist($city_1178);


        $city_1179 = new City();
        $city_1179->setRegion($region_2);
        $city_1179->setName("Липовец");
        $manager->persist($city_1179);


        $city_1180 = new City();
        $city_1180->setRegion($region_2);
        $city_1180->setName("Липовец");
        $manager->persist($city_1180);


        $city_1181 = new City();
        $city_1181->setRegion($region_10);
        $city_1181->setName("Липовка");
        $manager->persist($city_1181);


        $city_1182 = new City();
        $city_1182->setRegion($region_20);
        $city_1182->setName("Липцы");
        $manager->persist($city_1182);


        $city_1183 = new City();
        $city_1183->setRegion($region_9);
        $city_1183->setName("Лисец");
        $manager->persist($city_1183);


        $city_1184 = new City();
        $city_1184->setRegion($region_13);
        $city_1184->setName("Лисиничи");
        $manager->persist($city_1184);


        $city_1185 = new City();
        $city_1185->setRegion($region_12);
        $city_1185->setName("Лисичанск");
        $manager->persist($city_1185);


        $city_1186 = new City();
        $city_1186->setRegion($region_7);
        $city_1186->setName("Лисичево");
        $manager->persist($city_1186);


        $city_1187 = new City();
        $city_1187->setRegion($region_2);
        $city_1187->setName("Литин");
        $manager->persist($city_1187);


        $city_1188 = new City();
        $city_1188->setRegion($region_7);
        $city_1188->setName("Лоза");
        $manager->persist($city_1188);


        $city_1189 = new City();
        $city_1189->setRegion($region_4);
        $city_1189->setName("Лозоватка");
        $manager->persist($city_1189);


        $city_1190 = new City();
        $city_1190->setRegion($region_20);
        $city_1190->setName("Лозовая");
        $manager->persist($city_1190);


        $city_1191 = new City();
        $city_1191->setRegion($region_22);
        $city_1191->setName("Лозовое");
        $manager->persist($city_1191);


        $city_1192 = new City();
        $city_1192->setRegion($region_12);
        $city_1192->setName("Лозовский");
        $manager->persist($city_1192);


        $city_1193 = new City();
        $city_1193->setRegion($region_3);
        $city_1193->setName("Локачи");
        $manager->persist($city_1193);


        $city_1194 = new City();
        $city_1194->setRegion($region_9);
        $city_1194->setName("Лолин");
        $manager->persist($city_1194);


        $city_1195 = new City();
        $city_1195->setRegion($region_13);
        $city_1195->setName("Лопатин");
        $manager->persist($city_1195);


        $city_1196 = new City();
        $city_1196->setRegion($region_9);
        $city_1196->setName("Лопушня");
        $manager->persist($city_1196);


        $city_1197 = new City();
        $city_1197->setRegion($region_24);
        $city_1197->setName("Лосиновка");
        $manager->persist($city_1197);


        $city_1198 = new City();
        $city_1198->setRegion($region_16);
        $city_1198->setName("Лохвица");
        $manager->persist($city_1198);


        $city_1199 = new City();
        $city_1199->setRegion($region_16);
        $city_1199->setName("Лубны");
        $manager->persist($city_1199);


        $city_1200 = new City();
        $city_1200->setRegion($region_12);
        $city_1200->setName("Луганск");
        $manager->persist($city_1200);


        $city_1201 = new City();
        $city_1201->setRegion($region_6);
        $city_1201->setName("Лугины");
        $manager->persist($city_1201);


        $city_1202 = new City();
        $city_1202->setRegion($region_25);
        $city_1202->setName("Лужаны");
        $manager->persist($city_1202);


        $city_1203 = new City();
        $city_1203->setRegion($region_6);
        $city_1203->setName("Лужин");
        $manager->persist($city_1203);


        $city_1204 = new City();
        $city_1204->setRegion($region_10);
        $city_1204->setName("Лука");
        $manager->persist($city_1204);


        $city_1205 = new City();
        $city_1205->setRegion($region_2);
        $city_1205->setName("Лука- мелешковская");
        $manager->persist($city_1205);


        $city_1206 = new City();
        $city_1206->setRegion($region_8);
        $city_1206->setName("Лукашево");
        $manager->persist($city_1206);


        $city_1207 = new City();
        $city_1207->setRegion($region_13);
        $city_1207->setName("Луки");
        $manager->persist($city_1207);


        $city_1208 = new City();
        $city_1208->setRegion($region_3);
        $city_1208->setName("Луков");
        $manager->persist($city_1208);


        $city_1209 = new City();
        $city_1209->setRegion($region_10);
        $city_1209->setName("Лукьяновка");
        $manager->persist($city_1209);


        $city_1210 = new City();
        $city_1210->setRegion($region_8);
        $city_1210->setName("Луначарское");
        $manager->persist($city_1210);


        $city_1211 = new City();
        $city_1211->setRegion($region_16);
        $city_1211->setName("Лутовиновка");
        $manager->persist($city_1211);


        $city_1212 = new City();
        $city_1212->setRegion($region_12);
        $city_1212->setName("Лутугино");
        $manager->persist($city_1212);


        $city_1213 = new City();
        $city_1213->setRegion($region_3);
        $city_1213->setName("Луцк");
        $manager->persist($city_1213);


        $city_1214 = new City();
        $city_1214->setRegion($region_14);
        $city_1214->setName("Луч");
        $manager->persist($city_1214);


        $city_1215 = new City();
        $city_1215->setRegion($region_23);
        $city_1215->setName("Лысянка");
        $manager->persist($city_1215);


        $city_1216 = new City();
        $city_1216->setRegion($region_3);
        $city_1216->setName("Лыще");
        $manager->persist($city_1216);


        $city_1217 = new City();
        $city_1217->setRegion($region_13);
        $city_1217->setName("Львов");
        $manager->persist($city_1217);


        $city_1218 = new City();
        $city_1218->setRegion($region_6);
        $city_1218->setName("Любар");
        $manager->persist($city_1218);


        $city_1219 = new City();
        $city_1219->setRegion($region_15);
        $city_1219->setName("Любашевка");
        $manager->persist($city_1219);


        $city_1220 = new City();
        $city_1220->setRegion($region_24);
        $city_1220->setName("Любеч");
        $manager->persist($city_1220);


        $city_1221 = new City();
        $city_1221->setRegion($region_3);
        $city_1221->setName("Любешов");
        $manager->persist($city_1221);


        $city_1222 = new City();
        $city_1222->setRegion($region_21);
        $city_1222->setName("Любимовка");
        $manager->persist($city_1222);


        $city_1223 = new City();
        $city_1223->setRegion($region_13);
        $city_1223->setName("Любинцы");
        $manager->persist($city_1223);


        $city_1224 = new City();
        $city_1224->setRegion($region_3);
        $city_1224->setName("Любитов");
        $manager->persist($city_1224);


        $city_1225 = new City();
        $city_1225->setRegion($region_3);
        $city_1225->setName("Люблинец");
        $manager->persist($city_1225);


        $city_1226 = new City();
        $city_1226->setRegion($region_3);
        $city_1226->setName("Любомль");
        $manager->persist($city_1226);


        $city_1227 = new City();
        $city_1227->setRegion($region_20);
        $city_1227->setName("Люботин");
        $manager->persist($city_1227);


        $city_1228 = new City();
        $city_1228->setRegion($region_13);
        $city_1228->setName("Любша");
        $manager->persist($city_1228);


        $city_1229 = new City();
        $city_1229->setRegion($region_8);
        $city_1229->setName("Люцерна");
        $manager->persist($city_1229);


        $city_1230 = new City();
        $city_1230->setRegion($region_13);
        $city_1230->setName("Мавковичи");
        $manager->persist($city_1230);


        $city_1231 = new City();
        $city_1231->setRegion($region_4);
        $city_1231->setName("Магдалиновка");
        $manager->persist($city_1231);


        $city_1232 = new City();
        $city_1232->setRegion($region_1);
        $city_1232->setName("Мазанка");
        $manager->persist($city_1232);


        $city_1233 = new City();
        $city_1233->setRegion($region_9);
        $city_1233->setName("Майдан");
        $manager->persist($city_1233);


        $city_1234 = new City();
        $city_1234->setRegion($region_7);
        $city_1234->setName("Майдан");
        $manager->persist($city_1234);


        $city_1235 = new City();
        $city_1235->setRegion($region_23);
        $city_1235->setName("Майданец");
        $manager->persist($city_1235);


        $city_1236 = new City();
        $city_1236->setRegion($region_4);
        $city_1236->setName("Майское");
        $manager->persist($city_1236);


        $city_1237 = new City();
        $city_1237->setRegion($region_10);
        $city_1237->setName("Макаров");
        $manager->persist($city_1237);


        $city_1238 = new City();
        $city_1238->setRegion($region_5);
        $city_1238->setName("Макеевка");
        $manager->persist($city_1238);


        $city_1239 = new City();
        $city_1239->setRegion($region_22);
        $city_1239->setName("Маков");
        $manager->persist($city_1239);


        $city_1240 = new City();
        $city_1240->setRegion($region_24);
        $city_1240->setName("Макошино");
        $manager->persist($city_1240);


        $city_1241 = new City();
        $city_1241->setRegion($region_11);
        $city_1241->setName("Малая Виска");
        $manager->persist($city_1241);


        $city_1242 = new City();
        $city_1242->setRegion($region_20);
        $city_1242->setName("Малая Даниловка");
        $manager->persist($city_1242);


        $city_1243 = new City();
        $city_1243->setRegion($region_7);
        $city_1243->setName("Малая копаня");
        $manager->persist($city_1243);


        $city_1244 = new City();
        $city_1244->setRegion($region_18);
        $city_1244->setName("Малая павловка");
        $manager->persist($city_1244);


        $city_1245 = new City();
        $city_1245->setRegion($region_20);
        $city_1245->setName("Малая рогозянка");
        $manager->persist($city_1245);


        $city_1246 = new City();
        $city_1246->setRegion($region_10);
        $city_1246->setName("Малая Снитынка");
        $manager->persist($city_1246);


        $city_1247 = new City();
        $city_1247->setRegion($region_10);
        $city_1247->setName("Малая Супоевка");
        $manager->persist($city_1247);


        $city_1248 = new City();
        $city_1248->setRegion($region_6);
        $city_1248->setName("Малая Токаровка");
        $manager->persist($city_1248);


        $city_1249 = new City();
        $city_1249->setRegion($region_8);
        $city_1249->setName("Малая токмачка");
        $manager->persist($city_1249);


        $city_1250 = new City();
        $city_1250->setRegion($region_9);
        $city_1250->setName("Малая турья");
        $manager->persist($city_1250);


        $city_1251 = new City();
        $city_1251->setRegion($region_13);
        $city_1251->setName("Малехов");
        $manager->persist($city_1251);


        $city_1252 = new City();
        $city_1252->setRegion($region_6);
        $city_1252->setName("Малин");
        $manager->persist($city_1252);


        $city_1253 = new City();
        $city_1253->setRegion($region_22);
        $city_1253->setName("Малиничи");
        $manager->persist($city_1253);


        $city_1254 = new City();
        $city_1254->setRegion($region_5);
        $city_1254->setName("Малиновка");
        $manager->persist($city_1254);


        $city_1255 = new City();
        $city_1255->setRegion($region_20);
        $city_1255->setName("Малиновка");
        $manager->persist($city_1255);


        $city_1256 = new City();
        $city_1256->setRegion($region_15);
        $city_1256->setName("Малодолинское");
        $manager->persist($city_1256);


        $city_1257 = new City();
        $city_1257->setRegion($region_8);
        $city_1257->setName("Малокатериновка");
        $manager->persist($city_1257);


        $city_1258 = new City();
        $city_1258->setRegion($region_21);
        $city_1258->setName("Малокаховка");
        $manager->persist($city_1258);


        $city_1259 = new City();
        $city_1259->setRegion($region_1);
        $city_1259->setName("Малореченское");
        $manager->persist($city_1259);


        $city_1260 = new City();
        $city_1260->setRegion($region_19);
        $city_1260->setName("Малые Бережцы");
        $manager->persist($city_1260);


        $city_1261 = new City();
        $city_1261->setRegion($region_13);
        $city_1261->setName("Малые Подлески");
        $manager->persist($city_1261);


        $city_1262 = new City();
        $city_1262->setRegion($region_7);
        $city_1262->setName("Малый березный");
        $manager->persist($city_1262);


        $city_1263 = new City();
        $city_1263->setRegion($region_23);
        $city_1263->setName("Малый бузуков");
        $manager->persist($city_1263);


        $city_1264 = new City();
        $city_1264->setRegion($region_1);
        $city_1264->setName("Малый маяк");
        $manager->persist($city_1264);


        $city_1265 = new City();
        $city_1265->setRegion($region_2);
        $city_1265->setName("Малый мытник");
        $manager->persist($city_1265);


        $city_1266 = new City();
        $city_1266->setRegion($region_17);
        $city_1266->setName("Малый шпаков");
        $manager->persist($city_1266);


        $city_1267 = new City();
        $city_1267->setRegion($region_13);
        $city_1267->setName("Мальчицы");
        $manager->persist($city_1267);


        $city_1268 = new City();
        $city_1268->setRegion($region_25);
        $city_1268->setName("Мамаевцы");
        $manager->persist($city_1268);


        $city_1269 = new City();
        $city_1269->setRegion($region_25);
        $city_1269->setName("Мамалыга");
        $manager->persist($city_1269);


        $city_1270 = new City();
        $city_1270->setRegion($region_6);
        $city_1270->setName("Мамрин");
        $manager->persist($city_1270);


        $city_1271 = new City();
        $city_1271->setRegion($region_5);
        $city_1271->setName("Мангуш");
        $manager->persist($city_1271);


        $city_1272 = new City();
        $city_1272->setRegion($region_3);
        $city_1272->setName("Маневичи");
        $manager->persist($city_1272);


        $city_1273 = new City();
        $city_1273->setRegion($region_20);
        $city_1273->setName("Манченки");
        $manager->persist($city_1273);


        $city_1274 = new City();
        $city_1274->setRegion($region_23);
        $city_1274->setName("Маньковка");
        $manager->persist($city_1274);


        $city_1275 = new City();
        $city_1275->setRegion($region_4);
        $city_1275->setName("Марганец");
        $manager->persist($city_1275);


        $city_1276 = new City();
        $city_1276->setRegion($region_25);
        $city_1276->setName("Мариничи");
        $manager->persist($city_1276);


        $city_1277 = new City();
        $city_1277->setRegion($region_5);
        $city_1277->setName("Мариуполь");
        $manager->persist($city_1277);


        $city_1278 = new City();
        $city_1278->setRegion($region_12);
        $city_1278->setName("Марковка");
        $manager->persist($city_1278);


        $city_1279 = new City();
        $city_1279->setRegion($region_5);
        $city_1279->setName("Марково");
        $manager->persist($city_1279);


        $city_1280 = new City();
        $city_1280->setRegion($region_20);
        $city_1280->setName("Мартово");
        $manager->persist($city_1280);


        $city_1281 = new City();
        $city_1281->setRegion($region_23);
        $city_1281->setName("Мартыновка");
        $manager->persist($city_1281);


        $city_1282 = new City();
        $city_1282->setRegion($region_1);
        $city_1282->setName("Марфовка");
        $manager->persist($city_1282);


        $city_1283 = new City();
        $city_1283->setRegion($region_10);
        $city_1283->setName("Мархаловка");
        $manager->persist($city_1283);


        $city_1284 = new City();
        $city_1284->setRegion($region_8);
        $city_1284->setName("Марьевка");
        $manager->persist($city_1284);


        $city_1285 = new City();
        $city_1285->setRegion($region_5);
        $city_1285->setName("Марьинка");
        $manager->persist($city_1285);


        $city_1286 = new City();
        $city_1286->setRegion($region_4);
        $city_1286->setName("Марьяновка");
        $manager->persist($city_1286);


        $city_1287 = new City();
        $city_1287->setRegion($region_16);
        $city_1287->setName("Марьяновка");
        $manager->persist($city_1287);


        $city_1288 = new City();
        $city_1288->setRegion($region_6);
        $city_1288->setName("Марьяновка");
        $manager->persist($city_1288);


        $city_1289 = new City();
        $city_1289->setRegion($region_3);
        $city_1289->setName("Марьяновка");
        $manager->persist($city_1289);


        $city_1290 = new City();
        $city_1290->setRegion($region_22);
        $city_1290->setName("Масевцы");
        $manager->persist($city_1290);


        $city_1291 = new City();
        $city_1291->setRegion($region_1);
        $city_1291->setName("Массандра");
        $manager->persist($city_1291);


        $city_1292 = new City();
        $city_1292->setRegion($region_14);
        $city_1292->setName("Матиясово");
        $manager->persist($city_1292);


        $city_1293 = new City();
        $city_1293->setRegion($region_23);
        $city_1293->setName("Матусив");
        $manager->persist($city_1293);


        $city_1294 = new City();
        $city_1294->setRegion($region_2);
        $city_1294->setName("Махаринцы");
        $manager->persist($city_1294);


        $city_1295 = new City();
        $city_1295->setRegion($region_22);
        $city_1295->setName("Мацьковцы");
        $manager->persist($city_1295);


        $city_1296 = new City();
        $city_1296->setRegion($region_16);
        $city_1296->setName("Машевка");
        $manager->persist($city_1296);


        $city_1297 = new City();
        $city_1297->setRegion($region_3);
        $city_1297->setName("Маяки");
        $manager->persist($city_1297);


        $city_1298 = new City();
        $city_1298->setRegion($region_15);
        $city_1298->setName("Маяки");
        $manager->persist($city_1298);


        $city_1299 = new City();
        $city_1299->setRegion($region_1);
        $city_1299->setName("Межводное");
        $manager->persist($city_1299);


        $city_1300 = new City();
        $city_1300->setRegion($region_7);
        $city_1300->setName("Межгорье");
        $manager->persist($city_1300);


        $city_1301 = new City();
        $city_1301->setRegion($region_4);
        $city_1301->setName("Межевая");
        $manager->persist($city_1301);


        $city_1302 = new City();
        $city_1302->setRegion($region_4);
        $city_1302->setName("Межирич");
        $manager->persist($city_1302);


        $city_1303 = new City();
        $city_1303->setRegion($region_18);
        $city_1303->setName("Межирич");
        $manager->persist($city_1303);


        $city_1304 = new City();
        $city_1304->setRegion($region_23);
        $city_1304->setName("Межирич");
        $manager->persist($city_1304);


        $city_1305 = new City();
        $city_1305->setRegion($region_11);
        $city_1305->setName("Межиричка");
        $manager->persist($city_1305);


        $city_1306 = new City();
        $city_1306->setRegion($region_18);
        $city_1306->setName("Мезеновка");
        $manager->persist($city_1306);


        $city_1307 = new City();
        $city_1307->setRegion($region_4);
        $city_1307->setName("Мелиоративное");
        $manager->persist($city_1307);


        $city_1308 = new City();
        $city_1308->setRegion($region_8);
        $city_1308->setName("Мелитополь");
        $manager->persist($city_1308);


        $city_1309 = new City();
        $city_1309->setRegion($region_12);
        $city_1309->setName("Меловое");
        $manager->persist($city_1309);


        $city_1310 = new City();
        $city_1310->setRegion($region_19);
        $city_1310->setName("Мельница-Подольская");
        $manager->persist($city_1310);


        $city_1311 = new City();
        $city_1311->setRegion($region_24);
        $city_1311->setName("Мена");
        $manager->persist($city_1311);


        $city_1312 = new City();
        $city_1312->setRegion($region_4);
        $city_1312->setName("Менжинское");
        $manager->persist($city_1312);


        $city_1313 = new City();
        $city_1313->setRegion($region_13);
        $city_1313->setName("Мервичи");
        $manager->persist($city_1313);


        $city_1314 = new City();
        $city_1314->setRegion($region_20);
        $city_1314->setName("Мерефа");
        $manager->persist($city_1314);


        $city_1315 = new City();
        $city_1315->setRegion($region_14);
        $city_1315->setName("Мешково-погорелово");
        $manager->persist($city_1315);


        $city_1316 = new City();
        $city_1316->setRegion($region_15);
        $city_1316->setName("Мизикевича");
        $manager->persist($city_1316);


        $city_1317 = new City();
        $city_1317->setRegion($region_17);
        $city_1317->setName("Мизоч");
        $manager->persist($city_1317);


        $city_1318 = new City();
        $city_1318->setRegion($region_13);
        $city_1318->setName("Миклашев");
        $manager->persist($city_1318);


        $city_1319 = new City();
        $city_1319->setRegion($region_19);
        $city_1319->setName("Микулинцы");
        $manager->persist($city_1319);


        $city_1320 = new City();
        $city_1320->setRegion($region_9);
        $city_1320->setName("Микуличин");
        $manager->persist($city_1320);


        $city_1321 = new City();
        $city_1321->setRegion($region_7);
        $city_1321->setName("Минай");
        $manager->persist($city_1321);


        $city_1322 = new City();
        $city_1322->setRegion($region_16);
        $city_1322->setName("Миргород");
        $manager->persist($city_1322);


        $city_1323 = new City();
        $city_1323->setRegion($region_6);
        $city_1323->setName("Мирное");
        $manager->persist($city_1323);


        $city_1324 = new City();
        $city_1324->setRegion($region_5);
        $city_1324->setName("Мирное");
        $manager->persist($city_1324);


        $city_1325 = new City();
        $city_1325->setRegion($region_1);
        $city_1325->setName("Мирное");
        $manager->persist($city_1325);


        $city_1326 = new City();
        $city_1326->setRegion($region_5);
        $city_1326->setName("Мирное");
        $manager->persist($city_1326);


        $city_1327 = new City();
        $city_1327->setRegion($region_8);
        $city_1327->setName("Мирное");
        $manager->persist($city_1327);


        $city_1328 = new City();
        $city_1328->setRegion($region_6);
        $city_1328->setName("Мирный");
        $manager->persist($city_1328);


        $city_1329 = new City();
        $city_1329->setRegion($region_4);
        $city_1329->setName("Мировое");
        $manager->persist($city_1329);


        $city_1330 = new City();
        $city_1330->setRegion($region_6);
        $city_1330->setName("Миролюбовка");
        $manager->persist($city_1330);


        $city_1331 = new City();
        $city_1331->setRegion($region_5);
        $city_1331->setName("Мироновка");
        $manager->persist($city_1331);


        $city_1332 = new City();
        $city_1332->setRegion($region_10);
        $city_1332->setName("Мироновка");
        $manager->persist($city_1332);


        $city_1333 = new City();
        $city_1333->setRegion($region_6);
        $city_1333->setName("Мирополь");
        $manager->persist($city_1333);


        $city_1334 = new City();
        $city_1334->setRegion($region_12);
        $city_1334->setName("Миусинск");
        $manager->persist($city_1334);


        $city_1335 = new City();
        $city_1335->setRegion($region_14);
        $city_1335->setName("Михайловка");
        $manager->persist($city_1335);


        $city_1336 = new City();
        $city_1336->setRegion($region_11);
        $city_1336->setName("Михайловка");
        $manager->persist($city_1336);


        $city_1337 = new City();
        $city_1337->setRegion($region_8);
        $city_1337->setName("Михайловка");
        $manager->persist($city_1337);


        $city_1338 = new City();
        $city_1338->setRegion($region_20);
        $city_1338->setName("Михайловка");
        $manager->persist($city_1338);


        $city_1339 = new City();
        $city_1339->setRegion($region_2);
        $city_1339->setName("Михайловка");
        $manager->persist($city_1339);


        $city_1340 = new City();
        $city_1340->setRegion($region_5);
        $city_1340->setName("Михайловка");
        $manager->persist($city_1340);


        $city_1341 = new City();
        $city_1341->setRegion($region_23);
        $city_1341->setName("Михайловка");
        $manager->persist($city_1341);


        $city_1342 = new City();
        $city_1342->setRegion($region_18);
        $city_1342->setName("Михайловское");
        $manager->persist($city_1342);


        $city_1343 = new City();
        $city_1343->setRegion($region_22);
        $city_1343->setName("Михайлючка");
        $manager->persist($city_1343);


        $city_1344 = new City();
        $city_1344->setRegion($region_25);
        $city_1344->setName("Михальча");
        $manager->persist($city_1344);


        $city_1345 = new City();
        $city_1345->setRegion($region_23);
        $city_1345->setName("Млиев");
        $manager->persist($city_1345);


        $city_1346 = new City();
        $city_1346->setRegion($region_17);
        $city_1346->setName("Млинов");
        $manager->persist($city_1346);


        $city_1347 = new City();
        $city_1347->setRegion($region_19);
        $city_1347->setName("Млиновцы");
        $manager->persist($city_1347);


        $city_1348 = new City();
        $city_1348->setRegion($region_16);
        $city_1348->setName("Млыны");
        $manager->persist($city_1348);


        $city_1349 = new City();
        $city_1349->setRegion($region_2);
        $city_1349->setName("Могилев-Подольский");
        $manager->persist($city_1349);


        $city_1350 = new City();
        $city_1350->setRegion($region_2);
        $city_1350->setName("Могилевка");
        $manager->persist($city_1350);


        $city_1351 = new City();
        $city_1351->setRegion($region_17);
        $city_1351->setName("Могиляны");
        $manager->persist($city_1351);


        $city_1352 = new City();
        $city_1352->setRegion($region_2);
        $city_1352->setName("Моевка");
        $manager->persist($city_1352);


        $city_1353 = new City();
        $city_1353->setRegion($region_17);
        $city_1353->setName("Моквин");
        $manager->persist($city_1353);


        $city_1354 = new City();
        $city_1354->setRegion($region_25);
        $city_1354->setName("Молница");
        $manager->persist($city_1354);


        $city_1355 = new City();
        $city_1355->setRegion($region_15);
        $city_1355->setName("Молодежное");
        $manager->persist($city_1355);


        $city_1356 = new City();
        $city_1356->setRegion($region_1);
        $city_1356->setName("Молодежное");
        $manager->persist($city_1356);


        $city_1357 = new City();
        $city_1357->setRegion($region_11);
        $city_1357->setName("Молодежное");
        $manager->persist($city_1357);


        $city_1358 = new City();
        $city_1358->setRegion($region_5);
        $city_1358->setName("Молодежное");
        $manager->persist($city_1358);


        $city_1359 = new City();
        $city_1359->setRegion($region_5);
        $city_1359->setName("Молодецкое");
        $manager->persist($city_1359);


        $city_1360 = new City();
        $city_1360->setRegion($region_12);
        $city_1360->setName("Молодогвардейск");
        $manager->persist($city_1360);


        $city_1361 = new City();
        $city_1361->setRegion($region_8);
        $city_1361->setName("Молочанск");
        $manager->persist($city_1361);


        $city_1362 = new City();
        $city_1362->setRegion($region_19);
        $city_1362->setName("Монастыриска");
        $manager->persist($city_1362);


        $city_1363 = new City();
        $city_1363->setRegion($region_23);
        $city_1363->setName("Монастырище");
        $manager->persist($city_1363);


        $city_1364 = new City();
        $city_1364->setRegion($region_13);
        $city_1364->setName("Моршин");
        $manager->persist($city_1364);


        $city_1365 = new City();
        $city_1365->setRegion($region_5);
        $city_1365->setName("Моспино");
        $manager->persist($city_1365);


        $city_1366 = new City();
        $city_1366->setRegion($region_13);
        $city_1366->setName("Мостиска");
        $manager->persist($city_1366);


        $city_1367 = new City();
        $city_1367->setRegion($region_14);
        $city_1367->setName("Мостовое");
        $manager->persist($city_1367);


        $city_1368 = new City();
        $city_1368->setRegion($region_10);
        $city_1368->setName("Мотыжин");
        $manager->persist($city_1368);


        $city_1369 = new City();
        $city_1369->setRegion($region_1);
        $city_1369->setName("Мраморное");
        $manager->persist($city_1369);


        $city_1370 = new City();
        $city_1370->setRegion($region_7);
        $city_1370->setName("Мужиево");
        $manager->persist($city_1370);


        $city_1371 = new City();
        $city_1371->setRegion($region_10);
        $city_1371->setName("Музычи");
        $manager->persist($city_1371);


        $city_1372 = new City();
        $city_1372->setRegion($region_7);
        $city_1372->setName("Мукачево");
        $manager->persist($city_1372);


        $city_1373 = new City();
        $city_1373->setRegion($region_12);
        $city_1373->setName("Муратово");
        $manager->persist($city_1373);


        $city_1374 = new City();
        $city_1374->setRegion($region_20);
        $city_1374->setName("Мурафа");
        $manager->persist($city_1374);


        $city_1375 = new City();
        $city_1375->setRegion($region_13);
        $city_1375->setName("Мурованое");
        $manager->persist($city_1375);


        $city_1376 = new City();
        $city_1376->setRegion($region_2);
        $city_1376->setName("Мурованые Куриловцы");
        $manager->persist($city_1376);


        $city_1377 = new City();
        $city_1377->setRegion($region_4);
        $city_1377->setName("Мусиевка");
        $manager->persist($city_1377);


        $city_1378 = new City();
        $city_1378->setRegion($region_17);
        $city_1378->setName("Мутвица");
        $manager->persist($city_1378);


        $city_1379 = new City();
        $city_1379->setRegion($region_10);
        $city_1379->setName("Мыла");
        $manager->persist($city_1379);


        $city_1380 = new City();
        $city_1380->setRegion($region_23);
        $city_1380->setName("Набутов");
        $manager->persist($city_1380);


        $city_1381 = new City();
        $city_1381->setRegion($region_13);
        $city_1381->setName("Навария");
        $manager->persist($city_1381);


        $city_1382 = new City();
        $city_1382->setRegion($region_13);
        $city_1382->setName("Нагорное");
        $manager->persist($city_1382);


        $city_1383 = new City();
        $city_1383->setRegion($region_19);
        $city_1383->setName("Нагорянка");
        $manager->persist($city_1383);


        $city_1384 = new City();
        $city_1384->setRegion($region_9);
        $city_1384->setName("Надвирна");
        $manager->persist($city_1384);


        $city_1385 = new City();
        $city_1385->setRegion($region_9);
        $city_1385->setName("Надворная");
        $manager->persist($city_1385);


        $city_1386 = new City();
        $city_1386->setRegion($region_4);
        $city_1386->setName("Надеждовка");
        $manager->persist($city_1386);


        $city_1387 = new City();
        $city_1387->setRegion($region_9);
        $city_1387->setName("Надиев");
        $manager->persist($city_1387);


        $city_1388 = new City();
        $city_1388->setRegion($region_19);
        $city_1388->setName("Надречное");
        $manager->persist($city_1388);


        $city_1389 = new City();
        $city_1389->setRegion($region_13);
        $city_1389->setName("Надыбы");
        $manager->persist($city_1389);


        $city_1390 = new City();
        $city_1390->setRegion($region_13);
        $city_1390->setName("Надычи");
        $manager->persist($city_1390);


        $city_1391 = new City();
        $city_1391->setRegion($region_22);
        $city_1391->setName("Наркевичи");
        $manager->persist($city_1391);


        $city_1392 = new City();
        $city_1392->setRegion($region_6);
        $city_1392->setName("Народичи");
        $manager->persist($city_1392);


        $city_1393 = new City();
        $city_1393->setRegion($region_20);
        $city_1393->setName("Наталино");
        $manager->persist($city_1393);


        $city_1394 = new City();
        $city_1394->setRegion($region_10);
        $city_1394->setName("Небелица");
        $manager->persist($city_1394);


        $city_1395 = new City();
        $city_1395->setRegion($region_7);
        $city_1395->setName("Невицкое");
        $manager->persist($city_1395);


        $city_1396 = new City();
        $city_1396->setRegion($region_4);
        $city_1396->setName("Недайвода");
        $manager->persist($city_1396);


        $city_1397 = new City();
        $city_1397->setRegion($region_18);
        $city_1397->setName("Недригайлов");
        $manager->persist($city_1397);


        $city_1398 = new City();
        $city_1398->setRegion($region_24);
        $city_1398->setName("Нежин");
        $manager->persist($city_1398);


        $city_1399 = new City();
        $city_1399->setRegion($region_2);
        $city_1399->setName("Некрасово");
        $manager->persist($city_1399);


        $city_1400 = new City();
        $city_1400->setRegion($region_25);
        $city_1400->setName("Нелиповцы");
        $manager->persist($city_1400);


        $city_1401 = new City();
        $city_1401->setRegion($region_10);
        $city_1401->setName("Немешаево");
        $manager->persist($city_1401);


        $city_1402 = new City();
        $city_1402->setRegion($region_13);
        $city_1402->setName("Немиров");
        $manager->persist($city_1402);


        $city_1403 = new City();
        $city_1403->setRegion($region_2);
        $city_1403->setName("Немиров");
        $manager->persist($city_1403);


        $city_1404 = new City();
        $city_1404->setRegion($region_11);
        $city_1404->setName("Неопалимовка");
        $manager->persist($city_1404);


        $city_1405 = new City();
        $city_1405->setRegion($region_25);
        $city_1405->setName("Неполоковцы");
        $manager->persist($city_1405);


        $city_1406 = new City();
        $city_1406->setRegion($region_7);
        $city_1406->setName("Нересница");
        $manager->persist($city_1406);


        $city_1407 = new City();
        $city_1407->setRegion($region_15);
        $city_1407->setName("Нерубайское");
        $manager->persist($city_1407);


        $city_1408 = new City();
        $city_1408->setRegion($region_3);
        $city_1408->setName("Несвич");
        $manager->persist($city_1408);


        $city_1409 = new City();
        $city_1409->setRegion($region_2);
        $city_1409->setName("Нестерварка");
        $manager->persist($city_1409);


        $city_1410 = new City();
        $city_1410->setRegion($region_22);
        $city_1410->setName("Нестеривци");
        $manager->persist($city_1410);


        $city_1411 = new City();
        $city_1411->setRegion($region_22);
        $city_1411->setName("Нетишин");
        $manager->persist($city_1411);


        $city_1412 = new City();
        $city_1412->setRegion($region_16);
        $city_1412->setName("Нехвороща");
        $manager->persist($city_1412);


        $city_1413 = new City();
        $city_1413->setRegion($region_12);
        $city_1413->setName("Нещеретово");
        $manager->persist($city_1413);


        $city_1414 = new City();
        $city_1414->setRegion($region_4);
        $city_1414->setName("Нива трудовая");
        $manager->persist($city_1414);


        $city_1415 = new City();
        $city_1415->setRegion($region_1);
        $city_1415->setName("Нижнегорский");
        $manager->persist($city_1415);


        $city_1416 = new City();
        $city_1416->setRegion($region_7);
        $city_1416->setName("Нижнее селище");
        $manager->persist($city_1416);


        $city_1417 = new City();
        $city_1417->setRegion($region_7);
        $city_1417->setName("Нижние ворота");
        $manager->persist($city_1417);


        $city_1418 = new City();
        $city_1418->setRegion($region_21);
        $city_1418->setName("Нижние Серогозы");
        $manager->persist($city_1418);


        $city_1419 = new City();
        $city_1419->setRegion($region_9);
        $city_1419->setName("Нижний вербиж");
        $manager->persist($city_1419);


        $city_1420 = new City();
        $city_1420->setRegion($region_12);
        $city_1420->setName("Нижний нагольчик");
        $manager->persist($city_1420);


        $city_1421 = new City();
        $city_1421->setRegion($region_13);
        $city_1421->setName("Нижняя яблонька");
        $manager->persist($city_1421);


        $city_1422 = new City();
        $city_1422->setRegion($region_10);
        $city_1422->setName("Низшая дубечня");
        $manager->persist($city_1422);


        $city_1423 = new City();
        $city_1423->setRegion($region_18);
        $city_1423->setName("Низы");
        $manager->persist($city_1423);


        $city_1424 = new City();
        $city_1424->setRegion($region_1);
        $city_1424->setName("Никита");
        $manager->persist($city_1424);


        $city_1425 = new City();
        $city_1425->setRegion($region_9);
        $city_1425->setName("Никитинцы");
        $manager->persist($city_1425);


        $city_1426 = new City();
        $city_1426->setRegion($region_13);
        $city_1426->setName("Николаев");
        $manager->persist($city_1426);


        $city_1427 = new City();
        $city_1427->setRegion($region_14);
        $city_1427->setName("Николаев");
        $manager->persist($city_1427);


        $city_1428 = new City();
        $city_1428->setRegion($region_22);
        $city_1428->setName("Николаев");
        $manager->persist($city_1428);


        $city_1429 = new City();
        $city_1429->setRegion($region_1);
        $city_1429->setName("Николаевка");
        $manager->persist($city_1429);


        $city_1430 = new City();
        $city_1430->setRegion($region_15);
        $city_1430->setName("Николаевка");
        $manager->persist($city_1430);


        $city_1431 = new City();
        $city_1431->setRegion($region_5);
        $city_1431->setName("Николаевка");
        $manager->persist($city_1431);


        $city_1432 = new City();
        $city_1432->setRegion($region_4);
        $city_1432->setName("Николаевка");
        $manager->persist($city_1432);


        $city_1433 = new City();
        $city_1433->setRegion($region_4);
        $city_1433->setName("Николаевка");
        $manager->persist($city_1433);


        $city_1434 = new City();
        $city_1434->setRegion($region_15);
        $city_1434->setName("Николаевка");
        $manager->persist($city_1434);


        $city_1435 = new City();
        $city_1435->setRegion($region_4);
        $city_1435->setName("Николаевка");
        $manager->persist($city_1435);


        $city_1436 = new City();
        $city_1436->setRegion($region_14);
        $city_1436->setName("Николаевка");
        $manager->persist($city_1436);


        $city_1437 = new City();
        $city_1437->setRegion($region_14);
        $city_1437->setName("Николаевское");
        $manager->persist($city_1437);


        $city_1438 = new City();
        $city_1438->setRegion($region_5);
        $city_1438->setName("Николайполье");
        $manager->persist($city_1438);


        $city_1439 = new City();
        $city_1439->setRegion($region_4);
        $city_1439->setName("Никополь");
        $manager->persist($city_1439);


        $city_1440 = new City();
        $city_1440->setRegion($region_6);
        $city_1440->setName("Новая Боровая");
        $manager->persist($city_1440);


        $city_1441 = new City();
        $city_1441->setRegion($region_20);
        $city_1441->setName("Новая Водолага");
        $manager->persist($city_1441);


        $city_1442 = new City();
        $city_1442->setRegion($region_16);
        $city_1442->setName("Новая Галещина");
        $manager->persist($city_1442);


        $city_1443 = new City();
        $city_1443->setRegion($region_23);
        $city_1443->setName("Новая дмитровка");
        $manager->persist($city_1443);


        $city_1444 = new City();
        $city_1444->setRegion($region_15);
        $city_1444->setName("Новая долина");
        $manager->persist($city_1444);


        $city_1445 = new City();
        $city_1445->setRegion($region_15);
        $city_1445->setName("Новая дофиновка");
        $manager->persist($city_1445);


        $city_1446 = new City();
        $city_1446->setRegion($region_21);
        $city_1446->setName("Новая збурьевка");
        $manager->persist($city_1446);


        $city_1447 = new City();
        $city_1447->setRegion($region_21);
        $city_1447->setName("Новая Каховка");
        $manager->persist($city_1447);


        $city_1448 = new City();
        $city_1448->setRegion($region_3);
        $city_1448->setName("Новая лешня");
        $manager->persist($city_1448);


        $city_1449 = new City();
        $city_1449->setRegion($region_17);
        $city_1449->setName("Новая Любомирка");
        $manager->persist($city_1449);


        $city_1450 = new City();
        $city_1450->setRegion($region_21);
        $city_1450->setName("Новая маячка");
        $manager->persist($city_1450);


        $city_1451 = new City();
        $city_1451->setRegion($region_15);
        $city_1451->setName("Новая некрасовка");
        $manager->persist($city_1451);


        $city_1452 = new City();
        $city_1452->setRegion($region_14);
        $city_1452->setName("Новая Одесса");
        $manager->persist($city_1452);


        $city_1453 = new City();
        $city_1453->setRegion($region_11);
        $city_1453->setName("Новая прага");
        $manager->persist($city_1453);


        $city_1454 = new City();
        $city_1454->setRegion($region_4);
        $city_1454->setName("Новая русь");
        $manager->persist($city_1454);


        $city_1455 = new City();
        $city_1455->setRegion($region_22);
        $city_1455->setName("Новая Ушица");
        $manager->persist($city_1455);


        $city_1456 = new City();
        $city_1456->setRegion($region_24);
        $city_1456->setName("Новгород-Северский");
        $manager->persist($city_1456);


        $city_1457 = new City();
        $city_1457->setRegion($region_11);
        $city_1457->setName("Новгородка");
        $manager->persist($city_1457);


        $city_1458 = new City();
        $city_1458->setRegion($region_5);
        $city_1458->setName("Новгородское");
        $manager->persist($city_1458);


        $city_1459 = new City();
        $city_1459->setRegion($region_9);
        $city_1459->setName("Новица");
        $manager->persist($city_1459);


        $city_1460 = new City();
        $city_1460->setRegion($region_16);
        $city_1460->setName("Новоаврамовка");
        $manager->persist($city_1460);


        $city_1461 = new City();
        $city_1461->setRegion($region_5);
        $city_1461->setName("Новоазовск");
        $manager->persist($city_1461);


        $city_1462 = new City();
        $city_1462->setRegion($region_12);
        $city_1462->setName("Новоайдар");
        $manager->persist($city_1462);


        $city_1463 = new City();
        $city_1463->setRegion($region_11);
        $city_1463->setName("Новоалександровка");
        $manager->persist($city_1463);


        $city_1464 = new City();
        $city_1464->setRegion($region_4);
        $city_1464->setName("Новоалександровка");
        $manager->persist($city_1464);


        $city_1465 = new City();
        $city_1465->setRegion($region_21);
        $city_1465->setName("Новоалексеевка");
        $manager->persist($city_1465);


        $city_1466 = new City();
        $city_1466->setRegion($region_5);
        $city_1466->setName("Новоамвросиевское");
        $manager->persist($city_1466);


        $city_1467 = new City();
        $city_1467->setRegion($region_11);
        $city_1467->setName("Новоархангельск");
        $manager->persist($city_1467);


        $city_1468 = new City();
        $city_1468->setRegion($region_8);
        $city_1468->setName("Новобогдановка");
        $manager->persist($city_1468);


        $city_1469 = new City();
        $city_1469->setRegion($region_15);
        $city_1469->setName("Новоборисовка");
        $manager->persist($city_1469);


        $city_1470 = new City();
        $city_1470->setRegion($region_3);
        $city_1470->setName("Нововолынск");
        $manager->persist($city_1470);


        $city_1471 = new City();
        $city_1471->setRegion($region_21);
        $city_1471->setName("Нововоронцовка");
        $manager->persist($city_1471);


        $city_1472 = new City();
        $city_1472->setRegion($region_6);
        $city_1472->setName("Новоград-Волынский");
        $manager->persist($city_1472);


        $city_1473 = new City();
        $city_1473->setRegion($region_21);
        $city_1473->setName("Новогригоровка");
        $manager->persist($city_1473);


        $city_1474 = new City();
        $city_1474->setRegion($region_5);
        $city_1474->setName("Новогродовка");
        $manager->persist($city_1474);


        $city_1475 = new City();
        $city_1475->setRegion($region_6);
        $city_1475->setName("Новогуйвинское");
        $manager->persist($city_1475);


        $city_1476 = new City();
        $city_1476->setRegion($region_12);
        $city_1476->setName("Новодарьевка");
        $manager->persist($city_1476);


        $city_1477 = new City();
        $city_1477->setRegion($region_25);
        $city_1477->setName("Новоднестровск");
        $manager->persist($city_1477);


        $city_1478 = new City();
        $city_1478->setRegion($region_5);
        $city_1478->setName("Новодонецкое");
        $manager->persist($city_1478);


        $city_1479 = new City();
        $city_1479->setRegion($region_12);
        $city_1479->setName("Новодружеск");
        $manager->persist($city_1479);


        $city_1480 = new City();
        $city_1480->setRegion($region_24);
        $city_1480->setName("Новое");
        $manager->persist($city_1480);


        $city_1481 = new City();
        $city_1481->setRegion($region_11);
        $city_1481->setName("Новое");
        $manager->persist($city_1481);


        $city_1482 = new City();
        $city_1482->setRegion($region_7);
        $city_1482->setName("Новое давыдково");
        $manager->persist($city_1482);


        $city_1483 = new City();
        $city_1483->setRegion($region_8);
        $city_1483->setName("Новое запорожье");
        $manager->persist($city_1483);


        $city_1484 = new City();
        $city_1484->setRegion($region_19);
        $city_1484->setName("Новое Село");
        $manager->persist($city_1484);


        $city_1485 = new City();
        $city_1485->setRegion($region_5);
        $city_1485->setName("Новозарьевка");
        $manager->persist($city_1485);


        $city_1486 = new City();
        $city_1486->setRegion($region_4);
        $city_1486->setName("Новоивановка");
        $manager->persist($city_1486);


        $city_1487 = new City();
        $city_1487->setRegion($region_4);
        $city_1487->setName("Новолозоватка");
        $manager->persist($city_1487);


        $city_1488 = new City();
        $city_1488->setRegion($region_8);
        $city_1488->setName("Новолюбимовка");
        $manager->persist($city_1488);


        $city_1489 = new City();
        $city_1489->setRegion($region_17);
        $city_1489->setName("Новомалин");
        $manager->persist($city_1489);


        $city_1490 = new City();
        $city_1490->setRegion($region_11);
        $city_1490->setName("Новомиргород");
        $manager->persist($city_1490);


        $city_1491 = new City();
        $city_1491->setRegion($region_4);
        $city_1491->setName("Новомосковск");
        $manager->persist($city_1491);


        $city_1492 = new City();
        $city_1492->setRegion($region_8);
        $city_1492->setName("Новониколаевка");
        $manager->persist($city_1492);


        $city_1493 = new City();
        $city_1493->setRegion($region_4);
        $city_1493->setName("Новониколаевка");
        $manager->persist($city_1493);


        $city_1494 = new City();
        $city_1494->setRegion($region_4);
        $city_1494->setName("Новониколаевка");
        $manager->persist($city_1494);


        $city_1495 = new City();
        $city_1495->setRegion($region_8);
        $city_1495->setName("Новониколаевка");
        $manager->persist($city_1495);


        $city_1496 = new City();
        $city_1496->setRegion($region_1);
        $city_1496->setName("Новоозерное");
        $manager->persist($city_1496);


        $city_1497 = new City();
        $city_1497->setRegion($region_6);
        $city_1497->setName("Новоозерянка");
        $manager->persist($city_1497);


        $city_1498 = new City();
        $city_1498->setRegion($region_11);
        $city_1498->setName("Новоолександровка");
        $manager->persist($city_1498);


        $city_1499 = new City();
        $city_1499->setRegion($region_16);
        $city_1499->setName("Новоореховка");
        $manager->persist($city_1499);


        $city_1500 = new City();
        $city_1500->setRegion($region_16);
        $city_1500->setName("Новооржицкое");
        $manager->persist($city_1500);


        $city_1501 = new City();
        $city_1501->setRegion($region_20);
        $city_1501->setName("Новоосиново");
        $manager->persist($city_1501);


        $city_1502 = new City();
        $city_1502->setRegion($region_20);
        $city_1502->setName("Новопавловка");
        $manager->persist($city_1502);


        $city_1503 = new City();
        $city_1503->setRegion($region_8);
        $city_1503->setName("Новопетровка");
        $manager->persist($city_1503);


        $city_1504 = new City();
        $city_1504->setRegion($region_14);
        $city_1504->setName("Новопетровское");
        $manager->persist($city_1504);


        $city_1505 = new City();
        $city_1505->setRegion($region_20);
        $city_1505->setName("Новопокровка");
        $manager->persist($city_1505);


        $city_1506 = new City();
        $city_1506->setRegion($region_4);
        $city_1506->setName("Новополье");
        $manager->persist($city_1506);


        $city_1507 = new City();
        $city_1507->setRegion($region_12);
        $city_1507->setName("Новопсков");
        $manager->persist($city_1507);


        $city_1508 = new City();
        $city_1508->setRegion($region_9);
        $city_1508->setName("Новоселица");
        $manager->persist($city_1508);


        $city_1509 = new City();
        $city_1509->setRegion($region_25);
        $city_1509->setName("Новоселица");
        $manager->persist($city_1509);


        $city_1510 = new City();
        $city_1510->setRegion($region_19);
        $city_1510->setName("Новоселка");
        $manager->persist($city_1510);


        $city_1511 = new City();
        $city_1511->setRegion($region_10);
        $city_1511->setName("Новоселки");
        $manager->persist($city_1511);


        $city_1512 = new City();
        $city_1512->setRegion($region_24);
        $city_1512->setName("Новоселовка");
        $manager->persist($city_1512);


        $city_1513 = new City();
        $city_1513->setRegion($region_20);
        $city_1513->setName("Новоселовка");
        $manager->persist($city_1513);


        $city_1514 = new City();
        $city_1514->setRegion($region_1);
        $city_1514->setName("Новоселовское");
        $manager->persist($city_1514);


        $city_1515 = new City();
        $city_1515->setRegion($region_1);
        $city_1515->setName("Новосельское");
        $manager->persist($city_1515);


        $city_1516 = new City();
        $city_1516->setRegion($region_21);
        $city_1516->setName("Новотроицкое");
        $manager->persist($city_1516);


        $city_1517 = new City();
        $city_1517->setRegion($region_5);
        $city_1517->setName("Новотроицкое");
        $manager->persist($city_1517);


        $city_1518 = new City();
        $city_1518->setRegion($region_11);
        $city_1518->setName("Новоукраинка");
        $manager->persist($city_1518);


        $city_1519 = new City();
        $city_1519->setRegion($region_14);
        $city_1519->setName("Новоукраинка");
        $manager->persist($city_1519);


        $city_1520 = new City();
        $city_1520->setRegion($region_5);
        $city_1520->setName("Новоэкономическое");
        $manager->persist($city_1520);


        $city_1521 = new City();
        $city_1521->setRegion($region_13);
        $city_1521->setName("Новояворовск");
        $manager->persist($city_1521);


        $city_1522 = new City();
        $city_1522->setRegion($region_10);
        $city_1522->setName("Новые безрадичи");
        $manager->persist($city_1522);


        $city_1523 = new City();
        $city_1523->setRegion($region_6);
        $city_1523->setName("Новые Белокоровичи");
        $manager->persist($city_1523);


        $city_1524 = new City();
        $city_1524->setRegion($region_15);
        $city_1524->setName("Новые беляры");
        $manager->persist($city_1524);


        $city_1525 = new City();
        $city_1525->setRegion($region_24);
        $city_1525->setName("Новые Млыны");
        $manager->persist($city_1525);


        $city_1526 = new City();
        $city_1526->setRegion($region_10);
        $city_1526->setName("Новые петровцы");
        $manager->persist($city_1526);


        $city_1527 = new City();
        $city_1527->setRegion($region_16);
        $city_1527->setName("Новые Санжары");
        $manager->persist($city_1527);


        $city_1528 = new City();
        $city_1528->setRegion($region_24);
        $city_1528->setName("Новый белоус");
        $manager->persist($city_1528);


        $city_1529 = new City();
        $city_1529->setRegion($region_14);
        $city_1529->setName("Новый Буг");
        $manager->persist($city_1529);


        $city_1530 = new City();
        $city_1530->setRegion($region_24);
        $city_1530->setName("Новый Быков");
        $manager->persist($city_1530);


        $city_1531 = new City();
        $city_1531->setRegion($region_17);
        $city_1531->setName("Новый корец");
        $manager->persist($city_1531);


        $city_1532 = new City();
        $city_1532->setRegion($region_22);
        $city_1532->setName("Новый кривин");
        $manager->persist($city_1532);


        $city_1533 = new City();
        $city_1533->setRegion($region_9);
        $city_1533->setName("Новый мизунь");
        $manager->persist($city_1533);


        $city_1534 = new City();
        $city_1534->setRegion($region_13);
        $city_1534->setName("Новый Роздол");
        $manager->persist($city_1534);


        $city_1535 = new City();
        $city_1535->setRegion($region_1);
        $city_1535->setName("Новый Свет");
        $manager->persist($city_1535);


        $city_1536 = new City();
        $city_1536->setRegion($region_5);
        $city_1536->setName("Новый Свет");
        $manager->persist($city_1536);


        $city_1537 = new City();
        $city_1537->setRegion($region_13);
        $city_1537->setName("Новый ярычев");
        $manager->persist($city_1537);


        $city_1538 = new City();
        $city_1538->setRegion($region_6);
        $city_1538->setName("Норинск");
        $manager->persist($city_1538);


        $city_1539 = new City();
        $city_1539->setRegion($region_24);
        $city_1539->setName("Носовка");
        $manager->persist($city_1539);


        $city_1540 = new City();
        $city_1540->setRegion($region_17);
        $city_1540->setName("Обаров");
        $manager->persist($city_1540);


        $city_1541 = new City();
        $city_1541->setRegion($region_9);
        $city_1541->setName("Обертин");
        $manager->persist($city_1541);


        $city_1542 = new City();
        $city_1542->setRegion($region_2);
        $city_1542->setName("Ободовка");
        $manager->persist($city_1542);


        $city_1543 = new City();
        $city_1543->setRegion($region_11);
        $city_1543->setName("Обозновка");
        $manager->persist($city_1543);


        $city_1544 = new City();
        $city_1544->setRegion($region_9);
        $city_1544->setName("Оболонье");
        $manager->persist($city_1544);


        $city_1545 = new City();
        $city_1545->setRegion($region_13);
        $city_1545->setName("Оброшино");
        $manager->persist($city_1545);


        $city_1546 = new City();
        $city_1546->setRegion($region_10);
        $city_1546->setName("Обухов");
        $manager->persist($city_1546);


        $city_1547 = new City();
        $city_1547->setRegion($region_3);
        $city_1547->setName("Овадное");
        $manager->persist($city_1547);


        $city_1548 = new City();
        $city_1548->setRegion($region_15);
        $city_1548->setName("Овидиополь");
        $manager->persist($city_1548);


        $city_1549 = new City();
        $city_1549->setRegion($region_6);
        $city_1549->setName("Овруч");
        $manager->persist($city_1549);


        $city_1550 = new City();
        $city_1550->setRegion($region_11);
        $city_1550->setName("Одая");
        $manager->persist($city_1550);


        $city_1551 = new City();
        $city_1551->setRegion($region_15);
        $city_1551->setName("Одесса");
        $manager->persist($city_1551);


        $city_1552 = new City();
        $city_1552->setRegion($region_17);
        $city_1552->setName("Оженин");
        $manager->persist($city_1552);


        $city_1553 = new City();
        $city_1553->setRegion($region_16);
        $city_1553->setName("Озера");
        $manager->persist($city_1553);


        $city_1554 = new City();
        $city_1554->setRegion($region_6);
        $city_1554->setName("Озерное");
        $manager->persist($city_1554);


        $city_1555 = new City();
        $city_1555->setRegion($region_3);
        $city_1555->setName("Озерцо");
        $manager->persist($city_1555);


        $city_1556 = new City();
        $city_1556->setRegion($region_19);
        $city_1556->setName("Озеряны");
        $manager->persist($city_1556);


        $city_1557 = new City();
        $city_1557->setRegion($region_10);
        $city_1557->setName("Озирне");
        $manager->persist($city_1557);


        $city_1558 = new City();
        $city_1558->setRegion($region_9);
        $city_1558->setName("Окно");
        $manager->persist($city_1558);


        $city_1559 = new City();
        $city_1559->setRegion($region_25);
        $city_1559->setName("Окно");
        $manager->persist($city_1559);


        $city_1560 = new City();
        $city_1560->setRegion($region_1);
        $city_1560->setName("Октябрьское");
        $manager->persist($city_1560);


        $city_1561 = new City();
        $city_1561->setRegion($region_1);
        $city_1561->setName("Октябрьское");
        $manager->persist($city_1561);


        $city_1562 = new City();
        $city_1562->setRegion($region_6);
        $city_1562->setName("Олевск");
        $manager->persist($city_1562);


        $city_1563 = new City();
        $city_1563->setRegion($region_6);
        $city_1563->setName("Олекс");
        $manager->persist($city_1563);


        $city_1564 = new City();
        $city_1564->setRegion($region_22);
        $city_1564->setName("Олешин");
        $manager->persist($city_1564);


        $city_1565 = new City();
        $city_1565->setRegion($region_7);
        $city_1565->setName("Олешник");
        $manager->persist($city_1565);


        $city_1566 = new City();
        $city_1566->setRegion($region_9);
        $city_1566->setName("Олешов");
        $manager->persist($city_1566);


        $city_1567 = new City();
        $city_1567->setRegion($region_1);
        $city_1567->setName("Олива");
        $manager->persist($city_1567);


        $city_1568 = new City();
        $city_1568->setRegion($region_6);
        $city_1568->setName("Олиевка");
        $manager->persist($city_1568);


        $city_1569 = new City();
        $city_1569->setRegion($region_24);
        $city_1569->setName("Олишевка");
        $manager->persist($city_1569);


        $city_1570 = new City();
        $city_1570->setRegion($region_3);
        $city_1570->setName("Олыка");
        $manager->persist($city_1570);


        $city_1571 = new City();
        $city_1571->setRegion($region_5);
        $city_1571->setName("Ольгинка");
        $manager->persist($city_1571);


        $city_1572 = new City();
        $city_1572->setRegion($region_12);
        $city_1572->setName("Ольховое");
        $manager->persist($city_1572);


        $city_1573 = new City();
        $city_1573->setRegion($region_7);
        $city_1573->setName("Ольховцы");
        $manager->persist($city_1573);


        $city_1574 = new City();
        $city_1574->setRegion($region_7);
        $city_1574->setName("Ольховцы-лазы");
        $manager->persist($city_1574);


        $city_1575 = new City();
        $city_1575->setRegion($region_23);
        $city_1575->setName("Ольшана");
        $manager->persist($city_1575);


        $city_1576 = new City();
        $city_1576->setRegion($region_18);
        $city_1576->setName("Ольшана");
        $manager->persist($city_1576);


        $city_1577 = new City();
        $city_1577->setRegion($region_6);
        $city_1577->setName("Ольшанка");
        $manager->persist($city_1577);


        $city_1578 = new City();
        $city_1578->setRegion($region_11);
        $city_1578->setName("Ольшанка");
        $manager->persist($city_1578);


        $city_1579 = new City();
        $city_1579->setRegion($region_14);
        $city_1579->setName("Ольшанское");
        $manager->persist($city_1579);


        $city_1580 = new City();
        $city_1580->setRegion($region_20);
        $city_1580->setName("Ольшаны");
        $manager->persist($city_1580);


        $city_1581 = new City();
        $city_1581->setRegion($region_11);
        $city_1581->setName("Оникеево");
        $manager->persist($city_1581);


        $city_1582 = new City();
        $city_1582->setRegion($region_15);
        $city_1582->setName("Ониськово");
        $manager->persist($city_1582);


        $city_1583 = new City();
        $city_1583->setRegion($region_16);
        $city_1583->setName("Онишки");
        $manager->persist($city_1583);


        $city_1584 = new City();
        $city_1584->setRegion($region_11);
        $city_1584->setName("Онуфриевка");
        $manager->persist($city_1584);


        $city_1585 = new City();
        $city_1585->setRegion($region_13);
        $city_1585->setName("Опоры");
        $manager->persist($city_1585);


        $city_1586 = new City();
        $city_1586->setRegion($region_16);
        $city_1586->setName("Опошня");
        $manager->persist($city_1586);


        $city_1587 = new City();
        $city_1587->setRegion($region_5);
        $city_1587->setName("Опытное");
        $manager->persist($city_1587);


        $city_1588 = new City();
        $city_1588->setRegion($region_2);
        $city_1588->setName("Оратов");
        $manager->persist($city_1588);


        $city_1589 = new City();
        $city_1589->setRegion($region_2);
        $city_1589->setName("Оратов");
        $manager->persist($city_1589);


        $city_1590 = new City();
        $city_1590->setRegion($region_17);
        $city_1590->setName("Орвяница");
        $manager->persist($city_1590);


        $city_1591 = new City();
        $city_1591->setRegion($region_12);
        $city_1591->setName("Орджоникидзе");
        $manager->persist($city_1591);


        $city_1592 = new City();
        $city_1592->setRegion($region_1);
        $city_1592->setName("Орджоникидзе");
        $manager->persist($city_1592);


        $city_1593 = new City();
        $city_1593->setRegion($region_4);
        $city_1593->setName("Орджоникидзе");
        $manager->persist($city_1593);


        $city_1594 = new City();
        $city_1594->setRegion($region_1);
        $city_1594->setName("Ореанда");
        $manager->persist($city_1594);


        $city_1595 = new City();
        $city_1595->setRegion($region_8);
        $city_1595->setName("Орехов");
        $manager->persist($city_1595);


        $city_1596 = new City();
        $city_1596->setRegion($region_16);
        $city_1596->setName("Ореховка");
        $manager->persist($city_1596);


        $city_1597 = new City();
        $city_1597->setRegion($region_12);
        $city_1597->setName("Ореховка");
        $manager->persist($city_1597);


        $city_1598 = new City();
        $city_1598->setRegion($region_1);
        $city_1598->setName("Орехово");
        $manager->persist($city_1598);


        $city_1599 = new City();
        $city_1599->setRegion($region_17);
        $city_1599->setName("Оржев");
        $manager->persist($city_1599);


        $city_1600 = new City();
        $city_1600->setRegion($region_16);
        $city_1600->setName("Оржица");
        $manager->persist($city_1600);


        $city_1601 = new City();
        $city_1601->setRegion($region_20);
        $city_1601->setName("Орилька-1");
        $manager->persist($city_1601);


        $city_1602 = new City();
        $city_1602->setRegion($region_4);
        $city_1602->setName("Орловщина");
        $manager->persist($city_1602);


        $city_1603 = new City();
        $city_1603->setRegion($region_8);
        $city_1603->setName("Осипенко");
        $manager->persist($city_1603);


        $city_1604 = new City();
        $city_1604->setRegion($region_1);
        $city_1604->setName("Останино");
        $manager->persist($city_1604);


        $city_1605 = new City();
        $city_1605->setRegion($region_24);
        $city_1605->setName("Остер");
        $manager->persist($city_1605);


        $city_1606 = new City();
        $city_1606->setRegion($region_17);
        $city_1606->setName("Остки");
        $manager->persist($city_1606);


        $city_1607 = new City();
        $city_1607->setRegion($region_19);
        $city_1607->setName("Остров");
        $manager->persist($city_1607);


        $city_1608 = new City();
        $city_1608->setRegion($region_13);
        $city_1608->setName("Остров");
        $manager->persist($city_1608);


        $city_1609 = new City();
        $city_1609->setRegion($region_17);
        $city_1609->setName("Острог");
        $manager->persist($city_1609);


        $city_1610 = new City();
        $city_1610->setRegion($region_17);
        $city_1610->setName("Острожец");
        $manager->persist($city_1610);


        $city_1611 = new City();
        $city_1611->setRegion($region_6);
        $city_1611->setName("Осыково");
        $manager->persist($city_1611);


        $city_1612 = new City();
        $city_1612->setRegion($region_1);
        $city_1612->setName("Отрадное");
        $manager->persist($city_1612);


        $city_1613 = new City();
        $city_1613->setRegion($region_1);
        $city_1613->setName("Отрадное");
        $manager->persist($city_1613);


        $city_1614 = new City();
        $city_1614->setRegion($region_9);
        $city_1614->setName("Отыния");
        $manager->persist($city_1614);


        $city_1615 = new City();
        $city_1615->setRegion($region_14);
        $city_1615->setName("Очаков");
        $manager->persist($city_1615);


        $city_1616 = new City();
        $city_1616->setRegion($region_5);
        $city_1616->setName("Очеретино");
        $manager->persist($city_1616);


        $city_1617 = new City();
        $city_1617->setRegion($region_13);
        $city_1617->setName("Павлов");
        $manager->persist($city_1617);


        $city_1618 = new City();
        $city_1618->setRegion($region_11);
        $city_1618->setName("Павловка");
        $manager->persist($city_1618);


        $city_1619 = new City();
        $city_1619->setRegion($region_9);
        $city_1619->setName("Павловка");
        $manager->persist($city_1619);


        $city_1620 = new City();
        $city_1620->setRegion($region_24);
        $city_1620->setName("Павловка");
        $manager->persist($city_1620);


        $city_1621 = new City();
        $city_1621->setRegion($region_4);
        $city_1621->setName("Павлоград");
        $manager->persist($city_1621);


        $city_1622 = new City();
        $city_1622->setRegion($region_11);
        $city_1622->setName("Павлыш");
        $manager->persist($city_1622);


        $city_1623 = new City();
        $city_1623->setRegion($region_7);
        $city_1623->setName("Павшино");
        $manager->persist($city_1623);


        $city_1624 = new City();
        $city_1624->setRegion($region_10);
        $city_1624->setName("Паляничинцы");
        $manager->persist($city_1624);


        $city_1625 = new City();
        $city_1625->setRegion($region_5);
        $city_1625->setName("Пантелеймоновка");
        $manager->persist($city_1625);


        $city_1626 = new City();
        $city_1626->setRegion($region_20);
        $city_1626->setName("Панютино");
        $manager->persist($city_1626);


        $city_1627 = new City();
        $city_1627->setRegion($region_24);
        $city_1627->setName("Парафиевка");
        $manager->persist($city_1627);


        $city_1628 = new City();
        $city_1628->setRegion($region_6);
        $city_1628->setName("Парипсы");
        $manager->persist($city_1628);


        $city_1629 = new City();
        $city_1629->setRegion($region_1);
        $city_1629->setName("Парковое");
        $manager->persist($city_1629);


        $city_1630 = new City();
        $city_1630->setRegion($region_1);
        $city_1630->setName("Партенит");
        $manager->persist($city_1630);


        $city_1631 = new City();
        $city_1631->setRegion($region_4);
        $city_1631->setName("Партизанское");
        $manager->persist($city_1631);


        $city_1632 = new City();
        $city_1632->setRegion($region_21);
        $city_1632->setName("Партизаны");
        $manager->persist($city_1632);


        $city_1633 = new City();
        $city_1633->setRegion($region_20);
        $city_1633->setName("Пархомовка");
        $manager->persist($city_1633);


        $city_1634 = new City();
        $city_1634->setRegion($region_7);
        $city_1634->setName("Пацканево");
        $manager->persist($city_1634);


        $city_1635 = new City();
        $city_1635->setRegion($region_11);
        $city_1635->setName("Первозвановка");
        $manager->persist($city_1635);


        $city_1636 = new City();
        $city_1636->setRegion($region_14);
        $city_1636->setName("Первомайск");
        $manager->persist($city_1636);


        $city_1637 = new City();
        $city_1637->setRegion($region_12);
        $city_1637->setName("Первомайск");
        $manager->persist($city_1637);


        $city_1638 = new City();
        $city_1638->setRegion($region_4);
        $city_1638->setName("Первомайск");
        $manager->persist($city_1638);


        $city_1639 = new City();
        $city_1639->setRegion($region_20);
        $city_1639->setName("Первомайский");
        $manager->persist($city_1639);


        $city_1640 = new City();
        $city_1640->setRegion($region_1);
        $city_1640->setName("Первомайское");
        $manager->persist($city_1640);


        $city_1641 = new City();
        $city_1641->setRegion($region_1);
        $city_1641->setName("Первомайское");
        $manager->persist($city_1641);


        $city_1642 = new City();
        $city_1642->setRegion($region_1);
        $city_1642->setName("Перевальное");
        $manager->persist($city_1642);


        $city_1643 = new City();
        $city_1643->setRegion($region_12);
        $city_1643->setName("Перевальск");
        $manager->persist($city_1643);


        $city_1644 = new City();
        $city_1644->setRegion($region_11);
        $city_1644->setName("Перегоновка");
        $manager->persist($city_1644);


        $city_1645 = new City();
        $city_1645->setRegion($region_18);
        $city_1645->setName("Перекрестовка");
        $manager->persist($city_1645);


        $city_1646 = new City();
        $city_1646->setRegion($region_4);
        $city_1646->setName("Перемога");
        $manager->persist($city_1646);


        $city_1647 = new City();
        $city_1647->setRegion($region_13);
        $city_1647->setName("Перемышляны");
        $manager->persist($city_1647);


        $city_1648 = new City();
        $city_1648->setRegion($region_9);
        $city_1648->setName("Перерыв");
        $manager->persist($city_1648);


        $city_1649 = new City();
        $city_1649->setRegion($region_14);
        $city_1649->setName("Пересадовка");
        $manager->persist($city_1649);


        $city_1650 = new City();
        $city_1650->setRegion($region_20);
        $city_1650->setName("Пересечная");
        $manager->persist($city_1650);


        $city_1651 = new City();
        $city_1651->setRegion($region_7);
        $city_1651->setName("Перечин");
        $manager->persist($city_1651);


        $city_1652 = new City();
        $city_1652->setRegion($region_4);
        $city_1652->setName("Перещепино");
        $manager->persist($city_1652);


        $city_1653 = new City();
        $city_1653->setRegion($region_10);
        $city_1653->setName("Переяслав-Хмельницкий");
        $manager->persist($city_1653);


        $city_1654 = new City();
        $city_1654->setRegion($region_6);
        $city_1654->setName("Перлявка");
        $manager->persist($city_1654);


        $city_1655 = new City();
        $city_1655->setRegion($region_1);
        $city_1655->setName("Перово");
        $manager->persist($city_1655);


        $city_1656 = new City();
        $city_1656->setRegion($region_5);
        $city_1656->setName("Перше травня");
        $manager->persist($city_1656);


        $city_1657 = new City();
        $city_1657->setRegion($region_6);
        $city_1657->setName("Першотравенск");
        $manager->persist($city_1657);


        $city_1658 = new City();
        $city_1658->setRegion($region_4);
        $city_1658->setName("Першотравенск");
        $manager->persist($city_1658);


        $city_1659 = new City();
        $city_1659->setRegion($region_6);
        $city_1659->setName("Першотравневое");
        $manager->persist($city_1659);


        $city_1660 = new City();
        $city_1660->setRegion($region_14);
        $city_1660->setName("Першотравневое");
        $manager->persist($city_1660);


        $city_1661 = new City();
        $city_1661->setRegion($region_5);
        $city_1661->setName("Пески");
        $manager->persist($city_1661);


        $city_1662 = new City();
        $city_1662->setRegion($region_16);
        $city_1662->setName("Пески");
        $manager->persist($city_1662);


        $city_1663 = new City();
        $city_1663->setRegion($region_10);
        $city_1663->setName("Песковка");
        $manager->persist($city_1663);


        $city_1664 = new City();
        $city_1664->setRegion($region_20);
        $city_1664->setName("Песочин");
        $manager->persist($city_1664);


        $city_1665 = new City();
        $city_1665->setRegion($region_7);
        $city_1665->setName("Пестрялово");
        $manager->persist($city_1665);


        $city_1666 = new City();
        $city_1666->setRegion($region_2);
        $city_1666->setName("Песчанка");
        $manager->persist($city_1666);


        $city_1667 = new City();
        $city_1667->setRegion($region_4);
        $city_1667->setName("Песчанка");
        $manager->persist($city_1667);


        $city_1668 = new City();
        $city_1668->setRegion($region_1);
        $city_1668->setName("Песчаное");
        $manager->persist($city_1668);


        $city_1669 = new City();
        $city_1669->setRegion($region_16);
        $city_1669->setName("Песчаное");
        $manager->persist($city_1669);


        $city_1670 = new City();
        $city_1670->setRegion($region_5);
        $city_1670->setName("Песчаное");
        $manager->persist($city_1670);


        $city_1671 = new City();
        $city_1671->setRegion($region_19);
        $city_1671->setName("Петриков");
        $manager->persist($city_1671);


        $city_1672 = new City();
        $city_1672->setRegion($region_4);
        $city_1672->setName("Петриковка");
        $manager->persist($city_1672);


        $city_1673 = new City();
        $city_1673->setRegion($region_1);
        $city_1673->setName("Петровка");
        $manager->persist($city_1673);


        $city_1674 = new City();
        $city_1674->setRegion($region_15);
        $city_1674->setName("Петровка");
        $manager->persist($city_1674);


        $city_1675 = new City();
        $city_1675->setRegion($region_14);
        $city_1675->setName("Петровка");
        $manager->persist($city_1675);


        $city_1676 = new City();
        $city_1676->setRegion($region_12);
        $city_1676->setName("Петровка");
        $manager->persist($city_1676);


        $city_1677 = new City();
        $city_1677->setRegion($region_16);
        $city_1677->setName("Петровка-роменская");
        $manager->persist($city_1677);


        $city_1678 = new City();
        $city_1678->setRegion($region_11);
        $city_1678->setName("Петрово");
        $manager->persist($city_1678);


        $city_1679 = new City();
        $city_1679->setRegion($region_12);
        $city_1679->setName("Петровское");
        $manager->persist($city_1679);


        $city_1680 = new City();
        $city_1680->setRegion($region_22);
        $city_1680->setName("Петровское");
        $manager->persist($city_1680);


        $city_1681 = new City();
        $city_1681->setRegion($region_10);
        $city_1681->setName("Петровское");
        $manager->persist($city_1681);


        $city_1682 = new City();
        $city_1682->setRegion($region_10);
        $city_1682->setName("Петровское");
        $manager->persist($city_1682);


        $city_1683 = new City();
        $city_1683->setRegion($region_15);
        $city_1683->setName("Петродолинское");
        $manager->persist($city_1683);


        $city_1684 = new City();
        $city_1684->setRegion($region_4);
        $city_1684->setName("Петропавловка");
        $manager->persist($city_1684);


        $city_1685 = new City();
        $city_1685->setRegion($region_10);
        $city_1685->setName("Петропавловская Борщаговка");
        $manager->persist($city_1685);


        $city_1686 = new City();
        $city_1686->setRegion($region_10);
        $city_1686->setName("Петрушки");
        $manager->persist($city_1686);


        $city_1687 = new City();
        $city_1687->setRegion($region_20);
        $city_1687->setName("Печенеги");
        $manager->persist($city_1687);


        $city_1688 = new City();
        $city_1688->setRegion($region_9);
        $city_1688->setName("Печенежин");
        $manager->persist($city_1688);


        $city_1689 = new City();
        $city_1689->setRegion($region_2);
        $city_1689->setName("Пещанка");
        $manager->persist($city_1689);


        $city_1690 = new City();
        $city_1690->setRegion($region_4);
        $city_1690->setName("Пивденное");
        $manager->persist($city_1690);


        $city_1691 = new City();
        $city_1691->setRegion($region_20);
        $city_1691->setName("Пивденное");
        $manager->persist($city_1691);


        $city_1692 = new City();
        $city_1692->setRegion($region_13);
        $city_1692->setName("Пидбирцы");
        $manager->persist($city_1692);


        $city_1693 = new City();
        $city_1693->setRegion($region_6);
        $city_1693->setName("Пилиповичи");
        $manager->persist($city_1693);


        $city_1694 = new City();
        $city_1694->setRegion($region_10);
        $city_1694->setName("Пилиповка");
        $manager->persist($city_1694);


        $city_1695 = new City();
        $city_1695->setRegion($region_10);
        $city_1695->setName("Пилипча");
        $manager->persist($city_1695);


        $city_1696 = new City();
        $city_1696->setRegion($region_1);
        $city_1696->setName("Пионерское");
        $manager->persist($city_1696);


        $city_1697 = new City();
        $city_1697->setRegion($region_18);
        $city_1697->setName("Пироговка");
        $manager->persist($city_1697);


        $city_1698 = new City();
        $city_1698->setRegion($region_16);
        $city_1698->setName("Пирятин");
        $manager->persist($city_1698);


        $city_1699 = new City();
        $city_1699->setRegion($region_2);
        $city_1699->setName("Писаревка");
        $manager->persist($city_1699);


        $city_1700 = new City();
        $city_1700->setRegion($region_5);
        $city_1700->setName("Пискуновка");
        $manager->persist($city_1700);


        $city_1701 = new City();
        $city_1701->setRegion($region_18);
        $city_1701->setName("Плавинище");
        $manager->persist($city_1701);


        $city_1702 = new City();
        $city_1702->setRegion($region_15);
        $city_1702->setName("Платоново");
        $manager->persist($city_1702);


        $city_1703 = new City();
        $city_1703->setRegion($region_10);
        $city_1703->setName("Плесецкое");
        $manager->persist($city_1703);


        $city_1704 = new City();
        $city_1704->setRegion($region_11);
        $city_1704->setName("Плетеный ташлык");
        $manager->persist($city_1704);


        $city_1705 = new City();
        $city_1705->setRegion($region_7);
        $city_1705->setName("Плоске");
        $manager->persist($city_1705);


        $city_1706 = new City();
        $city_1706->setRegion($region_19);
        $city_1706->setName("Плотыча");
        $manager->persist($city_1706);


        $city_1707 = new City();
        $city_1707->setRegion($region_9);
        $city_1707->setName("Пнев");
        $manager->persist($city_1707);


        $city_1708 = new City();
        $city_1708->setRegion($region_9);
        $city_1708->setName("Побережье");
        $manager->persist($city_1708);


        $city_1709 = new City();
        $city_1709->setRegion($region_11);
        $city_1709->setName("Побугское");
        $manager->persist($city_1709);


        $city_1710 = new City();
        $city_1710->setRegion($region_13);
        $city_1710->setName("Повитное");
        $manager->persist($city_1710);


        $city_1711 = new City();
        $city_1711->setRegion($region_3);
        $city_1711->setName("Поворск");
        $manager->persist($city_1711);


        $city_1712 = new City();
        $city_1712->setRegion($region_22);
        $city_1712->setName("Погорельцы");
        $manager->persist($city_1712);


        $city_1713 = new City();
        $city_1713->setRegion($region_2);
        $city_1713->setName("Погребище");
        $manager->persist($city_1713);


        $city_1714 = new City();
        $city_1714->setRegion($region_2);
        $city_1714->setName("Погребище первое");
        $manager->persist($city_1714);


        $city_1715 = new City();
        $city_1715->setRegion($region_10);
        $city_1715->setName("Погребы");
        $manager->persist($city_1715);


        $city_1716 = new City();
        $city_1716->setRegion($region_13);
        $city_1716->setName("Подберезцы");
        $manager->persist($city_1716);


        $city_1717 = new City();
        $city_1717->setRegion($region_13);
        $city_1717->setName("Подбуж");
        $manager->persist($city_1717);


        $city_1718 = new City();
        $city_1718->setRegion($region_19);
        $city_1718->setName("Подволочиск");
        $manager->persist($city_1718);


        $city_1719 = new City();
        $city_1719->setRegion($region_20);
        $city_1719->setName("Подворки");
        $manager->persist($city_1719);


        $city_1720 = new City();
        $city_1720->setRegion($region_19);
        $city_1720->setName("Подвысокое");
        $manager->persist($city_1720);


        $city_1721 = new City();
        $city_1721->setRegion($region_3);
        $city_1721->setName("Подгайцы");
        $manager->persist($city_1721);


        $city_1722 = new City();
        $city_1722->setRegion($region_11);
        $city_1722->setName("Подгайцы");
        $manager->persist($city_1722);


        $city_1723 = new City();
        $city_1723->setRegion($region_19);
        $city_1723->setName("Подгайцы");
        $manager->persist($city_1723);


        $city_1724 = new City();
        $city_1724->setRegion($region_14);
        $city_1724->setName("Подгородная");
        $manager->persist($city_1724);


        $city_1725 = new City();
        $city_1725->setRegion($region_6);
        $city_1725->setName("Подгородное");
        $manager->persist($city_1725);


        $city_1726 = new City();
        $city_1726->setRegion($region_4);
        $city_1726->setName("Подгородное");
        $manager->persist($city_1726);


        $city_1727 = new City();
        $city_1727->setRegion($region_19);
        $city_1727->setName("Подгородное");
        $manager->persist($city_1727);


        $city_1728 = new City();
        $city_1728->setRegion($region_13);
        $city_1728->setName("Подгородное");
        $manager->persist($city_1728);


        $city_1729 = new City();
        $city_1729->setRegion($region_10);
        $city_1729->setName("Подгорцы");
        $manager->persist($city_1729);


        $city_1730 = new City();
        $city_1730->setRegion($region_9);
        $city_1730->setName("Подгорье");
        $manager->persist($city_1730);


        $city_1731 = new City();
        $city_1731->setRegion($region_13);
        $city_1731->setName("Подкамень");
        $manager->persist($city_1731);


        $city_1732 = new City();
        $city_1732->setRegion($region_9);
        $city_1732->setName("Подмихайля");
        $manager->persist($city_1732);


        $city_1733 = new City();
        $city_1733->setRegion($region_7);
        $city_1733->setName("Подобовец");
        $manager->persist($city_1733);


        $city_1734 = new City();
        $city_1734->setRegion($region_13);
        $city_1734->setName("Подорожное");
        $manager->persist($city_1734);


        $city_1735 = new City();
        $city_1735->setRegion($region_9);
        $city_1735->setName("Подпечеры");
        $manager->persist($city_1735);


        $city_1736 = new City();
        $city_1736->setRegion($region_1);
        $city_1736->setName("Пожарское");
        $manager->persist($city_1736);


        $city_1737 = new City();
        $city_1737->setRegion($region_20);
        $city_1737->setName("Покотиловка");
        $manager->persist($city_1737);


        $city_1738 = new City();
        $city_1738->setRegion($region_16);
        $city_1738->setName("Покровская богачка");
        $manager->persist($city_1738);


        $city_1739 = new City();
        $city_1739->setRegion($region_4);
        $city_1739->setName("Покровское");
        $manager->persist($city_1739);


        $city_1740 = new City();
        $city_1740->setRegion($region_4);
        $city_1740->setName("Покровское");
        $manager->persist($city_1740);


        $city_1741 = new City();
        $city_1741->setRegion($region_12);
        $city_1741->setName("Покровское");
        $manager->persist($city_1741);


        $city_1742 = new City();
        $city_1742->setRegion($region_20);
        $city_1742->setName("Полевая");
        $manager->persist($city_1742);


        $city_1743 = new City();
        $city_1743->setRegion($region_10);
        $city_1743->setName("Полесское");
        $manager->persist($city_1743);


        $city_1744 = new City();
        $city_1744->setRegion($region_24);
        $city_1744->setName("Политрудня");
        $manager->persist($city_1744);


        $city_1745 = new City();
        $city_1745->setRegion($region_12);
        $city_1745->setName("Половинкино");
        $manager->persist($city_1745);


        $city_1746 = new City();
        $city_1746->setRegion($region_23);
        $city_1746->setName("Половинчик");
        $manager->persist($city_1746);


        $city_1747 = new City();
        $city_1747->setRegion($region_8);
        $city_1747->setName("Пологи");
        $manager->persist($city_1747);


        $city_1748 = new City();
        $city_1748->setRegion($region_18);
        $city_1748->setName("Пологи");
        $manager->persist($city_1748);


        $city_1749 = new City();
        $city_1749->setRegion($region_10);
        $city_1749->setName("Пологи-вергуны");
        $manager->persist($city_1749);


        $city_1750 = new City();
        $city_1750->setRegion($region_3);
        $city_1750->setName("Полонка");
        $manager->persist($city_1750);


        $city_1751 = new City();
        $city_1751->setRegion($region_22);
        $city_1751->setName("Полонное");
        $manager->persist($city_1751);


        $city_1752 = new City();
        $city_1752->setRegion($region_16);
        $city_1752->setName("Полтава");
        $manager->persist($city_1752);


        $city_1753 = new City();
        $city_1753->setRegion($region_1);
        $city_1753->setName("Полтавка");
        $manager->persist($city_1753);


        $city_1754 = new City();
        $city_1754->setRegion($region_7);
        $city_1754->setName("Поляна");
        $manager->persist($city_1754);


        $city_1755 = new City();
        $city_1755->setRegion($region_9);
        $city_1755->setName("Поляница");
        $manager->persist($city_1755);


        $city_1756 = new City();
        $city_1756->setRegion($region_6);
        $city_1756->setName("Полянка");
        $manager->persist($city_1756);


        $city_1757 = new City();
        $city_1757->setRegion($region_22);
        $city_1757->setName("Полянь");
        $manager->persist($city_1757);


        $city_1758 = new City();
        $city_1758->setRegion($region_11);
        $city_1758->setName("Помошная");
        $manager->persist($city_1758);


        $city_1759 = new City();
        $city_1759->setRegion($region_1);
        $city_1759->setName("Понизовка");
        $manager->persist($city_1759);


        $city_1760 = new City();
        $city_1760->setRegion($region_22);
        $city_1760->setName("Понинка");
        $manager->persist($city_1760);


        $city_1761 = new City();
        $city_1761->setRegion($region_12);
        $city_1761->setName("Попасная");
        $manager->persist($city_1761);


        $city_1762 = new City();
        $city_1762->setRegion($region_4);
        $city_1762->setName("Попасное");
        $manager->persist($city_1762);


        $city_1763 = new City();
        $city_1763->setRegion($region_6);
        $city_1763->setName("Попельня");
        $manager->persist($city_1763);


        $city_1764 = new City();
        $city_1764->setRegion($region_6);
        $city_1764->setName("Попельня");
        $manager->persist($city_1764);


        $city_1765 = new City();
        $city_1765->setRegion($region_18);
        $city_1765->setName("Поповка");
        $manager->persist($city_1765);


        $city_1766 = new City();
        $city_1766->setRegion($region_16);
        $city_1766->setName("Поповка");
        $manager->persist($city_1766);


        $city_1767 = new City();
        $city_1767->setRegion($region_7);
        $city_1767->setName("Попово");
        $manager->persist($city_1767);


        $city_1768 = new City();
        $city_1768->setRegion($region_6);
        $city_1768->setName("Поромовка");
        $manager->persist($city_1768);


        $city_1769 = new City();
        $city_1769->setRegion($region_23);
        $city_1769->setName("Поташ");
        $manager->persist($city_1769);


        $city_1770 = new City();
        $city_1770->setRegion($region_16);
        $city_1770->setName("Потоки");
        $manager->persist($city_1770);


        $city_1771 = new City();
        $city_1771->setRegion($region_19);
        $city_1771->setName("Почаев");
        $manager->persist($city_1771);


        $city_1772 = new City();
        $city_1772->setRegion($region_19);
        $city_1772->setName("Почапинцы");
        $manager->persist($city_1772);


        $city_1773 = new City();
        $city_1773->setRegion($region_23);
        $city_1773->setName("Почапинцы");
        $manager->persist($city_1773);


        $city_1774 = new City();
        $city_1774->setRegion($region_1);
        $city_1774->setName("Почтовое");
        $manager->persist($city_1774);


        $city_1775 = new City();
        $city_1775->setRegion($region_5);
        $city_1775->setName("Предтечино");
        $manager->persist($city_1775);


        $city_1776 = new City();
        $city_1776->setRegion($region_8);
        $city_1776->setName("Преображенка");
        $manager->persist($city_1776);


        $city_1777 = new City();
        $city_1777->setRegion($region_8);
        $city_1777->setName("Приазовское");
        $manager->persist($city_1777);


        $city_1778 = new City();
        $city_1778->setRegion($region_1);
        $city_1778->setName("Прибрежное");
        $manager->persist($city_1778);


        $city_1779 = new City();
        $city_1779->setRegion($region_14);
        $city_1779->setName("Прибугское");
        $manager->persist($city_1779);


        $city_1780 = new City();
        $city_1780->setRegion($region_13);
        $city_1780->setName("Прибужаны");
        $manager->persist($city_1780);


        $city_1781 = new City();
        $city_1781->setRegion($region_14);
        $city_1781->setName("Прибужье");
        $manager->persist($city_1781);


        $city_1782 = new City();
        $city_1782->setRegion($region_1);
        $city_1782->setName("Приветное");
        $manager->persist($city_1782);


        $city_1783 = new City();
        $city_1783->setRegion($region_5);
        $city_1783->setName("Приволье");
        $manager->persist($city_1783);


        $city_1784 = new City();
        $city_1784->setRegion($region_12);
        $city_1784->setName("Приволье");
        $manager->persist($city_1784);


        $city_1785 = new City();
        $city_1785->setRegion($region_4);
        $city_1785->setName("Приднепрянское");
        $manager->persist($city_1785);


        $city_1786 = new City();
        $city_1786->setRegion($region_20);
        $city_1786->setName("Приколотное");
        $manager->persist($city_1786);


        $city_1787 = new City();
        $city_1787->setRegion($region_15);
        $city_1787->setName("Прилиманское");
        $manager->persist($city_1787);


        $city_1788 = new City();
        $city_1788->setRegion($region_24);
        $city_1788->setName("Прилуки");
        $manager->persist($city_1788);


        $city_1789 = new City();
        $city_1789->setRegion($region_8);
        $city_1789->setName("Приморск");
        $manager->persist($city_1789);


        $city_1790 = new City();
        $city_1790->setRegion($region_1);
        $city_1790->setName("Приморский");
        $manager->persist($city_1790);


        $city_1791 = new City();
        $city_1791->setRegion($region_21);
        $city_1791->setName("Приозерное");
        $manager->persist($city_1791);


        $city_1792 = new City();
        $city_1792->setRegion($region_1);
        $city_1792->setName("Приозерное");
        $manager->persist($city_1792);


        $city_1793 = new City();
        $city_1793->setRegion($region_6);
        $city_1793->setName("Пристанционное");
        $manager->persist($city_1793);


        $city_1794 = new City();
        $city_1794->setRegion($region_16);
        $city_1794->setName("Пришиб");
        $manager->persist($city_1794);


        $city_1795 = new City();
        $city_1795->setRegion($region_8);
        $city_1795->setName("Пришиб");
        $manager->persist($city_1795);


        $city_1796 = new City();
        $city_1796->setRegion($region_11);
        $city_1796->setName("Приютовка");
        $manager->persist($city_1796);


        $city_1797 = new City();
        $city_1797->setRegion($region_19);
        $city_1797->setName("Пробежная");
        $manager->persist($city_1797);


        $city_1798 = new City();
        $city_1798->setRegion($region_12);
        $city_1798->setName("Пролетарский");
        $manager->persist($city_1798);


        $city_1799 = new City();
        $city_1799->setRegion($region_10);
        $city_1799->setName("Пролиски");
        $manager->persist($city_1799);


        $city_1800 = new City();
        $city_1800->setRegion($region_4);
        $city_1800->setName("Просяная");
        $manager->persist($city_1800);


        $city_1801 = new City();
        $city_1801->setRegion($region_11);
        $city_1801->setName("Протопоповка");
        $manager->persist($city_1801);


        $city_1802 = new City();
        $city_1802->setRegion($region_3);
        $city_1802->setName("Проходы");
        $manager->persist($city_1802);


        $city_1803 = new City();
        $city_1803->setRegion($region_23);
        $city_1803->setName("Прохоровка");
        $manager->persist($city_1803);


        $city_1804 = new City();
        $city_1804->setRegion($region_10);
        $city_1804->setName("Процев");
        $manager->persist($city_1804);


        $city_1805 = new City();
        $city_1805->setRegion($region_20);
        $city_1805->setName("Прудянка");
        $manager->persist($city_1805);


        $city_1806 = new City();
        $city_1806->setRegion($region_6);
        $city_1806->setName("Пряжов");
        $manager->persist($city_1806);


        $city_1807 = new City();
        $city_1807->setRegion($region_13);
        $city_1807->setName("Пукеничи");
        $manager->persist($city_1807);


        $city_1808 = new City();
        $city_1808->setRegion($region_13);
        $city_1808->setName("Пустомыты");
        $manager->persist($city_1808);


        $city_1809 = new City();
        $city_1809->setRegion($region_18);
        $city_1809->setName("Путивль");
        $manager->persist($city_1809);


        $city_1810 = new City();
        $city_1810->setRegion($region_25);
        $city_1810->setName("Путила");
        $manager->persist($city_1810);


        $city_1811 = new City();
        $city_1811->setRegion($region_10);
        $city_1811->setName("Пуховка");
        $manager->persist($city_1811);


        $city_1812 = new City();
        $city_1812->setRegion($region_4);
        $city_1812->setName("Пушкаревка");
        $manager->persist($city_1812);


        $city_1813 = new City();
        $city_1813->setRegion($region_19);
        $city_1813->setName("Пышковцы");
        $manager->persist($city_1813);


        $city_1814 = new City();
        $city_1814->setRegion($region_4);
        $city_1814->setName("Пятихатки");
        $manager->persist($city_1814);


        $city_1815 = new City();
        $city_1815->setRegion($region_13);
        $city_1815->setName("Рава-Русская");
        $manager->persist($city_1815);


        $city_1816 = new City();
        $city_1816->setRegion($region_24);
        $city_1816->setName("Равнополье");
        $manager->persist($city_1816);


        $city_1817 = new City();
        $city_1817->setRegion($region_21);
        $city_1817->setName("Раденск");
        $manager->persist($city_1817);


        $city_1818 = new City();
        $city_1818->setRegion($region_13);
        $city_1818->setName("Радехов");
        $manager->persist($city_1818);


        $city_1819 = new City();
        $city_1819->setRegion($region_6);
        $city_1819->setName("Радомышль");
        $manager->persist($city_1819);


        $city_1820 = new City();
        $city_1820->setRegion($region_3);
        $city_1820->setName("Радомышль");
        $manager->persist($city_1820);


        $city_1821 = new City();
        $city_1821->setRegion($region_15);
        $city_1821->setName("Радостное");
        $manager->persist($city_1821);


        $city_1822 = new City();
        $city_1822->setRegion($region_4);
        $city_1822->setName("Радушное");
        $manager->persist($city_1822);


        $city_1823 = new City();
        $city_1823->setRegion($region_9);
        $city_1823->setName("Радча");
        $manager->persist($city_1823);


        $city_1824 = new City();
        $city_1824->setRegion($region_17);
        $city_1824->setName("Радывылив");
        $manager->persist($city_1824);


        $city_1825 = new City();
        $city_1825->setRegion($region_17);
        $city_1825->setName("Радыжево");
        $manager->persist($city_1825);


        $city_1826 = new City();
        $city_1826->setRegion($region_16);
        $city_1826->setName("Радянское");
        $manager->persist($city_1826);


        $city_1827 = new City();
        $city_1827->setRegion($region_15);
        $city_1827->setName("Раздельная");
        $manager->persist($city_1827);


        $city_1828 = new City();
        $city_1828->setRegion($region_1);
        $city_1828->setName("Раздольное");
        $manager->persist($city_1828);


        $city_1829 = new City();
        $city_1829->setRegion($region_5);
        $city_1829->setName("Райгородок");
        $manager->persist($city_1829);


        $city_1830 = new City();
        $city_1830->setRegion($region_3);
        $city_1830->setName("Ракита");
        $manager->persist($city_1830);


        $city_1831 = new City();
        $city_1831->setRegion($region_16);
        $city_1831->setName("Ракитное");
        $manager->persist($city_1831);


        $city_1832 = new City();
        $city_1832->setRegion($region_10);
        $city_1832->setName("Ракитное");
        $manager->persist($city_1832);


        $city_1833 = new City();
        $city_1833->setRegion($region_7);
        $city_1833->setName("Раково");
        $manager->persist($city_1833);


        $city_1834 = new City();
        $city_1834->setRegion($region_9);
        $city_1834->setName("Раковчик");
        $manager->persist($city_1834);


        $city_1835 = new City();
        $city_1835->setRegion($region_7);
        $city_1835->setName("Ракошино");
        $manager->persist($city_1835);


        $city_1836 = new City();
        $city_1836->setRegion($region_16);
        $city_1836->setName("Рассошенцы");
        $manager->persist($city_1836);


        $city_1837 = new City();
        $city_1837->setRegion($region_3);
        $city_1837->setName("Ратно");
        $manager->persist($city_1837);


        $city_1838 = new City();
        $city_1838->setRegion($region_3);
        $city_1838->setName("Ратнов");
        $manager->persist($city_1838);


        $city_1839 = new City();
        $city_1839->setRegion($region_7);
        $city_1839->setName("Ратовцы");
        $manager->persist($city_1839);


        $city_1840 = new City();
        $city_1840->setRegion($region_12);
        $city_1840->setName("Рафайловка");
        $manager->persist($city_1840);


        $city_1841 = new City();
        $city_1841->setRegion($region_17);
        $city_1841->setName("Рафаловка");
        $manager->persist($city_1841);


        $city_1842 = new City();
        $city_1842->setRegion($region_7);
        $city_1842->setName("Рахов");
        $manager->persist($city_1842);


        $city_1843 = new City();
        $city_1843->setRegion($region_23);
        $city_1843->setName("Рацево");
        $manager->persist($city_1843);


        $city_1844 = new City();
        $city_1844->setRegion($region_17);
        $city_1844->setName("Рачин");
        $manager->persist($city_1844);


        $city_1845 = new City();
        $city_1845->setRegion($region_3);
        $city_1845->setName("Рачин");
        $manager->persist($city_1845);


        $city_1846 = new City();
        $city_1846->setRegion($region_15);
        $city_1846->setName("Рени");
        $manager->persist($city_1846);


        $city_1847 = new City();
        $city_1847->setRegion($region_24);
        $city_1847->setName("Репки");
        $manager->persist($city_1847);


        $city_1848 = new City();
        $city_1848->setRegion($region_16);
        $city_1848->setName("Решетиловка");
        $manager->persist($city_1848);


        $city_1849 = new City();
        $city_1849->setRegion($region_10);
        $city_1849->setName("Ржищев");
        $manager->persist($city_1849);


        $city_1850 = new City();
        $city_1850->setRegion($region_12);
        $city_1850->setName("Ровеньки");
        $manager->persist($city_1850);


        $city_1851 = new City();
        $city_1851->setRegion($region_17);
        $city_1851->setName("Ровно");
        $manager->persist($city_1851);


        $city_1852 = new City();
        $city_1852->setRegion($region_3);
        $city_1852->setName("Ровное");
        $manager->persist($city_1852);


        $city_1853 = new City();
        $city_1853->setRegion($region_5);
        $city_1853->setName("Ровное");
        $manager->persist($city_1853);


        $city_1854 = new City();
        $city_1854->setRegion($region_11);
        $city_1854->setName("Ровное");
        $manager->persist($city_1854);


        $city_1855 = new City();
        $city_1855->setRegion($region_14);
        $city_1855->setName("Ровное");
        $manager->persist($city_1855);


        $city_1856 = new City();
        $city_1856->setRegion($region_20);
        $city_1856->setName("Рогань");
        $manager->persist($city_1856);


        $city_1857 = new City();
        $city_1857->setRegion($region_9);
        $city_1857->setName("Рогатин");
        $manager->persist($city_1857);


        $city_1858 = new City();
        $city_1858->setRegion($region_19);
        $city_1858->setName("Рогачин");
        $manager->persist($city_1858);


        $city_1859 = new City();
        $city_1859->setRegion($region_10);
        $city_1859->setName("Рогозов");
        $manager->persist($city_1859);


        $city_1860 = new City();
        $city_1860->setRegion($region_12);
        $city_1860->setName("Родаково");
        $manager->persist($city_1860);


        $city_1861 = new City();
        $city_1861->setRegion($region_5);
        $city_1861->setName("Родинское");
        $manager->persist($city_1861);


        $city_1862 = new City();
        $city_1862->setRegion($region_1);
        $city_1862->setName("Родниковое");
        $manager->persist($city_1862);


        $city_1863 = new City();
        $city_1863->setRegion($region_3);
        $city_1863->setName("Рожище");
        $manager->persist($city_1863);


        $city_1864 = new City();
        $city_1864->setRegion($region_10);
        $city_1864->setName("Рожны");
        $manager->persist($city_1864);


        $city_1865 = new City();
        $city_1865->setRegion($region_9);
        $city_1865->setName("Рожнятов");
        $manager->persist($city_1865);


        $city_1866 = new City();
        $city_1866->setRegion($region_13);
        $city_1866->setName("Розвадов");
        $manager->persist($city_1866);


        $city_1867 = new City();
        $city_1867->setRegion($region_13);
        $city_1867->setName("Розгирче");
        $manager->persist($city_1867);


        $city_1868 = new City();
        $city_1868->setRegion($region_13);
        $city_1868->setName("Роздол");
        $manager->persist($city_1868);


        $city_1869 = new City();
        $city_1869->setRegion($region_1);
        $city_1869->setName("Роздольное");
        $manager->persist($city_1869);


        $city_1870 = new City();
        $city_1870->setRegion($region_7);
        $city_1870->setName("Розовка");
        $manager->persist($city_1870);


        $city_1871 = new City();
        $city_1871->setRegion($region_8);
        $city_1871->setName("Розовка");
        $manager->persist($city_1871);


        $city_1872 = new City();
        $city_1872->setRegion($region_7);
        $city_1872->setName("Розтоки");
        $manager->persist($city_1872);


        $city_1873 = new City();
        $city_1873->setRegion($region_3);
        $city_1873->setName("Рокини");
        $manager->persist($city_1873);


        $city_1874 = new City();
        $city_1874->setRegion($region_17);
        $city_1874->setName("Рокитное");
        $manager->persist($city_1874);


        $city_1875 = new City();
        $city_1875->setRegion($region_17);
        $city_1875->setName("Рокитное");
        $manager->persist($city_1875);


        $city_1876 = new City();
        $city_1876->setRegion($region_7);
        $city_1876->setName("Рокосово");
        $manager->persist($city_1876);


        $city_1877 = new City();
        $city_1877->setRegion($region_22);
        $city_1877->setName("Романины");
        $manager->persist($city_1877);


        $city_1878 = new City();
        $city_1878->setRegion($region_3);
        $city_1878->setName("Романов");
        $manager->persist($city_1878);


        $city_1879 = new City();
        $city_1879->setRegion($region_6);
        $city_1879->setName("Романов");
        $manager->persist($city_1879);


        $city_1880 = new City();
        $city_1880->setRegion($region_18);
        $city_1880->setName("Ромны");
        $manager->persist($city_1880);


        $city_1881 = new City();
        $city_1881->setRegion($region_10);
        $city_1881->setName("Росава");
        $manager->persist($city_1881);


        $city_1882 = new City();
        $city_1882->setRegion($region_10);
        $city_1882->setName("Роскошная");
        $manager->persist($city_1882);


        $city_1883 = new City();
        $city_1883->setRegion($region_11);
        $city_1883->setName("Роскошное");
        $manager->persist($city_1883);


        $city_1884 = new City();
        $city_1884->setRegion($region_10);
        $city_1884->setName("Рославичи");
        $manager->persist($city_1884);


        $city_1885 = new City();
        $city_1885->setRegion($region_13);
        $city_1885->setName("Росохач");
        $manager->persist($city_1885);


        $city_1886 = new City();
        $city_1886->setRegion($region_2);
        $city_1886->setName("Росоша");
        $manager->persist($city_1886);


        $city_1887 = new City();
        $city_1887->setRegion($region_22);
        $city_1887->setName("Россоша");
        $manager->persist($city_1887);


        $city_1888 = new City();
        $city_1888->setRegion($region_25);
        $city_1888->setName("Ростоки");
        $manager->persist($city_1888);


        $city_1889 = new City();
        $city_1889->setRegion($region_23);
        $city_1889->setName("Ротмистровка");
        $manager->persist($city_1889);


        $city_1890 = new City();
        $city_1890->setRegion($region_12);
        $city_1890->setName("Рубежное");
        $manager->persist($city_1890);


        $city_1891 = new City();
        $city_1891->setRegion($region_13);
        $city_1891->setName("Рудки");
        $manager->persist($city_1891);


        $city_1892 = new City();
        $city_1892->setRegion($region_18);
        $city_1892->setName("Руднево");
        $manager->persist($city_1892);


        $city_1893 = new City();
        $city_1893->setRegion($region_2);
        $city_1893->setName("Рудница");
        $manager->persist($city_1893);


        $city_1894 = new City();
        $city_1894->setRegion($region_13);
        $city_1894->setName("Рудно");
        $manager->persist($city_1894);


        $city_1895 = new City();
        $city_1895->setRegion($region_22);
        $city_1895->setName("Рудня-новенькая");
        $manager->persist($city_1895);


        $city_1896 = new City();
        $city_1896->setRegion($region_6);
        $city_1896->setName("Ружин");
        $manager->persist($city_1896);


        $city_1897 = new City();
        $city_1897->setRegion($region_22);
        $city_1897->setName("Русановцы");
        $manager->persist($city_1897);


        $city_1898 = new City();
        $city_1898->setRegion($region_23);
        $city_1898->setName("Русская поляна");
        $manager->persist($city_1898);


        $city_1899 = new City();
        $city_1899->setRegion($region_14);
        $city_1899->setName("Рыбаковка");
        $manager->persist($city_1899);


        $city_1900 = new City();
        $city_1900->setRegion($region_24);
        $city_1900->setName("Рыбинск");
        $manager->persist($city_1900);


        $city_1901 = new City();
        $city_1901->setRegion($region_13);
        $city_1901->setName("Рыхтичи");
        $manager->persist($city_1901);


        $city_1902 = new City();
        $city_1902->setRegion($region_14);
        $city_1902->setName("с. Воссиятское");
        $manager->persist($city_1902);


        $city_1903 = new City();
        $city_1903->setRegion($region_23);
        $city_1903->setName("с. Литвинец");
        $manager->persist($city_1903);


        $city_1904 = new City();
        $city_1904->setRegion($region_4);
        $city_1904->setName("с. Лозуватка");
        $manager->persist($city_1904);


        $city_1905 = new City();
        $city_1905->setRegion($region_6);
        $city_1905->setName("с. Михайловка");
        $manager->persist($city_1905);


        $city_1906 = new City();
        $city_1906->setRegion($region_2);
        $city_1906->setName("с. Поповцы");
        $manager->persist($city_1906);


        $city_1907 = new City();
        $city_1907->setRegion($region_20);
        $city_1907->setName("Савинцы");
        $manager->persist($city_1907);


        $city_1908 = new City();
        $city_1908->setRegion($region_15);
        $city_1908->setName("Саврань");
        $manager->persist($city_1908);


        $city_1909 = new City();
        $city_1909->setRegion($region_23);
        $city_1909->setName("Сагуновка");
        $manager->persist($city_1909);


        $city_1910 = new City();
        $city_1910->setRegion($region_18);
        $city_1910->setName("Сад");
        $manager->persist($city_1910);


        $city_1911 = new City();
        $city_1911->setRegion($region_9);
        $city_1911->setName("Саджава");
        $manager->persist($city_1911);


        $city_1912 = new City();
        $city_1912->setRegion($region_9);
        $city_1912->setName("Саджавка");
        $manager->persist($city_1912);


        $city_1913 = new City();
        $city_1913->setRegion($region_1);
        $city_1913->setName("Садовое");
        $manager->persist($city_1913);


        $city_1914 = new City();
        $city_1914->setRegion($region_1);
        $city_1914->setName("Саки");
        $manager->persist($city_1914);


        $city_1915 = new City();
        $city_1915->setRegion($region_15);
        $city_1915->setName("Салганы");
        $manager->persist($city_1915);


        $city_1916 = new City();
        $city_1916->setRegion($region_10);
        $city_1916->setName("Саливонки");
        $manager->persist($city_1916);


        $city_1917 = new City();
        $city_1917->setRegion($region_11);
        $city_1917->setName("Сальково");
        $manager->persist($city_1917);


        $city_1918 = new City();
        $city_1918->setRegion($region_13);
        $city_1918->setName("Самбор");
        $manager->persist($city_1918);


        $city_1919 = new City();
        $city_1919->setRegion($region_10);
        $city_1919->setName("Самгородок");
        $manager->persist($city_1919);


        $city_1920 = new City();
        $city_1920->setRegion($region_18);
        $city_1920->setName("Самотоевка");
        $manager->persist($city_1920);


        $city_1921 = new City();
        $city_1921->setRegion($region_12);
        $city_1921->setName("Самсоновка");
        $manager->persist($city_1921);


        $city_1922 = new City();
        $city_1922->setRegion($region_1);
        $city_1922->setName("Санаторное");
        $manager->persist($city_1922);


        $city_1923 = new City();
        $city_1923->setRegion($region_19);
        $city_1923->setName("Саранчуки");
        $manager->persist($city_1923);


        $city_1924 = new City();
        $city_1924->setRegion($region_15);
        $city_1924->setName("Сарата");
        $manager->persist($city_1924);


        $city_1925 = new City();
        $city_1925->setRegion($region_17);
        $city_1925->setName("Сарны");
        $manager->persist($city_1925);


        $city_1926 = new City();
        $city_1926->setRegion($region_5);
        $city_1926->setName("Сартана");
        $manager->persist($city_1926);


        $city_1927 = new City();
        $city_1927->setRegion($region_7);
        $city_1927->setName("Сасово");
        $manager->persist($city_1927);


        $city_1928 = new City();
        $city_1928->setRegion($region_22);
        $city_1928->setName("Сатанив");
        $manager->persist($city_1928);


        $city_1929 = new City();
        $city_1929->setRegion($region_15);
        $city_1929->setName("Сафьяны");
        $manager->persist($city_1929);


        $city_1930 = new City();
        $city_1930->setRegion($region_22);
        $city_1930->setName("Сахкамень");
        $manager->persist($city_1930);


        $city_1931 = new City();
        $city_1931->setRegion($region_20);
        $city_1931->setName("Сахновщина");
        $manager->persist($city_1931);


        $city_1932 = new City();
        $city_1932->setRegion($region_7);
        $city_1932->setName("Свалява");
        $manager->persist($city_1932);


        $city_1933 = new City();
        $city_1933->setRegion($region_12);
        $city_1933->setName("Сватово");
        $manager->persist($city_1933);


        $city_1934 = new City();
        $city_1934->setRegion($region_12);
        $city_1934->setName("Свердловск");
        $manager->persist($city_1934);


        $city_1935 = new City();
        $city_1935->setRegion($region_18);
        $city_1935->setName("Свесса");
        $manager->persist($city_1935);


        $city_1936 = new City();
        $city_1936->setRegion($region_11);
        $city_1936->setName("Светловодск");
        $manager->persist($city_1936);


        $city_1937 = new City();
        $city_1937->setRegion($region_16);
        $city_1937->setName("Светлогорское");
        $manager->persist($city_1937);


        $city_1938 = new City();
        $city_1938->setRegion($region_5);
        $city_1938->setName("Светлодарск");
        $manager->persist($city_1938);


        $city_1939 = new City();
        $city_1939->setRegion($region_23);
        $city_1939->setName("Свидовок");
        $manager->persist($city_1939);


        $city_1940 = new City();
        $city_1940->setRegion($region_10);
        $city_1940->setName("Свитанок");
        $manager->persist($city_1940);


        $city_1941 = new City();
        $city_1941->setRegion($region_16);
        $city_1941->setName("Святиловка");
        $manager->persist($city_1941);


        $city_1942 = new City();
        $city_1942->setRegion($region_5);
        $city_1942->setName("Святогорск");
        $manager->persist($city_1942);


        $city_1943 = new City();
        $city_1943->setRegion($region_1);
        $city_1943->setName("Севастополь");
        $manager->persist($city_1943);


        $city_1944 = new City();
        $city_1944->setRegion($region_2);
        $city_1944->setName("Севериновка");
        $manager->persist($city_1944);



        $city_1945 = new City();
        $city_1945->setRegion($region_12);
        $city_1945->setName("Северодонецк");
        $manager->persist($city_1945);


        $city_1946 = new City();
        $city_1946->setRegion($region_5);
        $city_1946->setName("Северск");
        $manager->persist($city_1946);


        $city_1947 = new City();
        $city_1947->setRegion($region_24);
        $city_1947->setName("Седнев");
        $manager->persist($city_1947);


        $city_1948 = new City();
        $city_1948->setRegion($region_5);
        $city_1948->setName("Селезневка");
        $manager->persist($city_1948);


        $city_1949 = new City();
        $city_1949->setRegion($region_16);
        $city_1949->setName("Селещина");
        $manager->persist($city_1949);


        $city_1950 = new City();
        $city_1950->setRegion($region_5);
        $city_1950->setName("Селидово");
        $manager->persist($city_1950);


        $city_1951 = new City();
        $city_1951->setRegion($region_17);
        $city_1951->setName("Селище");
        $manager->persist($city_1951);


        $city_1952 = new City();
        $city_1952->setRegion($region_2);
        $city_1952->setName("Селище");
        $manager->persist($city_1952);


        $city_1953 = new City();
        $city_1953->setRegion($region_23);
        $city_1953->setName("Селище");
        $manager->persist($city_1953);


        $city_1954 = new City();
        $city_1954->setRegion($region_25);
        $city_1954->setName("Селятин");
        $manager->persist($city_1954);


        $city_1955 = new City();
        $city_1955->setRegion($region_8);
        $city_1955->setName("Семеновка");
        $manager->persist($city_1955);


        $city_1956 = new City();
        $city_1956->setRegion($region_16);
        $city_1956->setName("Семеновка");
        $manager->persist($city_1956);


        $city_1957 = new City();
        $city_1957->setRegion($region_24);
        $city_1957->setName("Семеновка");
        $manager->persist($city_1957);


        $city_1958 = new City();
        $city_1958->setRegion($region_13);
        $city_1958->setName("Семеновка");
        $manager->persist($city_1958);


        $city_1959 = new City();
        $city_1959->setRegion($region_10);
        $city_1959->setName("Семиполки");
        $manager->persist($city_1959);


        $city_1960 = new City();
        $city_1960->setRegion($region_21);
        $city_1960->setName("Семихатка");
        $manager->persist($city_1960);


        $city_1961 = new City();
        $city_1961->setRegion($region_1);
        $city_1961->setName("Сенокосное");
        $manager->persist($city_1961);


        $city_1962 = new City();
        $city_1962->setRegion($region_24);
        $city_1962->setName("Сеньковка");
        $manager->persist($city_1962);


        $city_1963 = new City();
        $city_1963->setRegion($region_10);
        $city_1963->setName("Сеньковка");
        $manager->persist($city_1963);


        $city_1964 = new City();
        $city_1964->setRegion($region_15);
        $city_1964->setName("Сергеевка");
        $manager->persist($city_1964);


        $city_1965 = new City();
        $city_1965->setRegion($region_24);
        $city_1965->setName("Серебряное");
        $manager->persist($city_1965);


        $city_1966 = new City();
        $city_1966->setRegion($region_18);
        $city_1966->setName("Середина-Буда");
        $manager->persist($city_1966);


        $city_1967 = new City();
        $city_1967->setRegion($region_24);
        $city_1967->setName("Серединка");
        $manager->persist($city_1967);


        $city_1968 = new City();
        $city_1968->setRegion($region_1);
        $city_1968->setName("Симеиз");
        $manager->persist($city_1968);


        $city_1969 = new City();
        $city_1969->setRegion($region_7);
        $city_1969->setName("Симерки");
        $manager->persist($city_1969);


        $city_1970 = new City();
        $city_1970->setRegion($region_1);
        $city_1970->setName("Симферополь");
        $manager->persist($city_1970);


        $city_1971 = new City();
        $city_1971->setRegion($region_6);
        $city_1971->setName("Сингуры");
        $manager->persist($city_1971);


        $city_1972 = new City();
        $city_1972->setRegion($region_4);
        $city_1972->setName("Синельниково");
        $manager->persist($city_1972);


        $city_1973 = new City();
        $city_1973->setRegion($region_10);
        $city_1973->setName("Синяк");
        $manager->persist($city_1973);


        $city_1974 = new City();
        $city_1974->setRegion($region_2);
        $city_1974->setName("Ситковцы");
        $manager->persist($city_1974);


        $city_1975 = new City();
        $city_1975->setRegion($region_10);
        $city_1975->setName("Ситняки");
        $manager->persist($city_1975);


        $city_1976 = new City();
        $city_1976->setRegion($region_21);
        $city_1976->setName("Скадовск");
        $manager->persist($city_1976);


        $city_1977 = new City();
        $city_1977->setRegion($region_19);
        $city_1977->setName("Скала-Подольская");
        $manager->persist($city_1977);


        $city_1978 = new City();
        $city_1978->setRegion($region_19);
        $city_1978->setName("Скалат");
        $manager->persist($city_1978);


        $city_1979 = new City();
        $city_1979->setRegion($region_1);
        $city_1979->setName("Скалистое");
        $manager->persist($city_1979);


        $city_1980 = new City();
        $city_1980->setRegion($region_10);
        $city_1980->setName("Сквира");
        $manager->persist($city_1980);


        $city_1981 = new City();
        $city_1981->setRegion($region_1);
        $city_1981->setName("Скворцово");
        $manager->persist($city_1981);


        $city_1982 = new City();
        $city_1982->setRegion($region_13);
        $city_1982->setName("Сколе");
        $manager->persist($city_1982);


        $city_1983 = new City();
        $city_1983->setRegion($region_2);
        $city_1983->setName("Скоморошки");
        $manager->persist($city_1983);


        $city_1984 = new City();
        $city_1984->setRegion($region_24);
        $city_1984->setName("Слабин");
        $manager->persist($city_1984);


        $city_1985 = new City();
        $city_1985->setRegion($region_4);
        $city_1985->setName("Славгород");
        $manager->persist($city_1985);


        $city_1986 = new City();
        $city_1986->setRegion($region_13);
        $city_1986->setName("Славское");
        $manager->persist($city_1986);


        $city_1987 = new City();
        $city_1987->setRegion($region_22);
        $city_1987->setName("Славута");
        $manager->persist($city_1987);


        $city_1988 = new City();
        $city_1988->setRegion($region_10);
        $city_1988->setName("Славутич");
        $manager->persist($city_1988);


        $city_1989 = new City();
        $city_1989->setRegion($region_12);
        $city_1989->setName("Славяносербск");
        $manager->persist($city_1989);


        $city_1990 = new City();
        $city_1990->setRegion($region_5);
        $city_1990->setName("Славянск");
        $manager->persist($city_1990);


        $city_1991 = new City();
        $city_1991->setRegion($region_20);
        $city_1991->setName("Слатино");
        $manager->persist($city_1991);


        $city_1992 = new City();
        $city_1992->setRegion($region_14);
        $city_1992->setName("Сливино");
        $manager->persist($city_1992);


        $city_1993 = new City();
        $city_1993->setRegion($region_18);
        $city_1993->setName("Слобода");
        $manager->persist($city_1993);


        $city_1994 = new City();
        $city_1994->setRegion($region_18);
        $city_1994->setName("Слобода");
        $manager->persist($city_1994);


        $city_1995 = new City();
        $city_1995->setRegion($region_6);
        $city_1995->setName("Слободище");
        $manager->persist($city_1995);


        $city_1996 = new City();
        $city_1996->setRegion($region_19);
        $city_1996->setName("Слободка");
        $manager->persist($city_1996);


        $city_1997 = new City();
        $city_1997->setRegion($region_13);
        $city_1997->setName("Слободка");
        $manager->persist($city_1997);


        $city_1998 = new City();
        $city_1998->setRegion($region_22);
        $city_1998->setName("Слободка-гуменецкая");
        $manager->persist($city_1998);


        $city_1999 = new City();
        $city_1999->setRegion($region_22);
        $city_1999->setName("Слободка-рыхтивская");
        $manager->persist($city_1999);


        $city_2000 = new City();
        $city_2000->setRegion($region_15);
        $city_2000->setName("Словяносербка");
        $manager->persist($city_2000);


        $city_2001 = new City();
        $city_2001->setRegion($region_23);
        $city_2001->setName("Смела");
        $manager->persist($city_2001);


        $city_2002 = new City();
        $city_2002->setRegion($region_18);
        $city_2002->setName("Смелое");
        $manager->persist($city_2002);


        $city_2003 = new City();
        $city_2003->setRegion($region_9);
        $city_2003->setName("Смодна");
        $manager->persist($city_2003);


        $city_2004 = new City();
        $city_2004->setRegion($region_11);
        $city_2004->setName("Смолино");
        $manager->persist($city_2004);


        $city_2005 = new City();
        $city_2005->setRegion($region_22);
        $city_2005->setName("Смотрич");
        $manager->persist($city_2005);


        $city_2006 = new City();
        $city_2006->setRegion($region_17);
        $city_2006->setName("Смыга");
        $manager->persist($city_2006);


        $city_2007 = new City();
        $city_2007->setRegion($region_19);
        $city_2007->setName("Смыковцы");
        $manager->persist($city_2007);


        $city_2008 = new City();
        $city_2008->setRegion($region_5);
        $city_2008->setName("Снежное");
        $manager->persist($city_2008);


        $city_2009 = new City();
        $city_2009->setRegion($region_14);
        $city_2009->setName("Снигиревка");
        $manager->persist($city_2009);


        $city_2010 = new City();
        $city_2010->setRegion($region_9);
        $city_2010->setName("Снятин");
        $manager->persist($city_2010);


        $city_2011 = new City();
        $city_2011->setRegion($region_9);
        $city_2011->setName("Снятын");
        $manager->persist($city_2011);


        $city_2012 = new City();
        $city_2012->setRegion($region_18);
        $city_2012->setName("Собич");
        $manager->persist($city_2012);


        $city_2013 = new City();
        $city_2013->setRegion($region_2);
        $city_2013->setName("Соболевка");
        $manager->persist($city_2013);


        $city_2014 = new City();
        $city_2014->setRegion($region_1);
        $city_2014->setName("Советский");
        $manager->persist($city_2014);


        $city_2015 = new City();
        $city_2015->setRegion($region_1);
        $city_2015->setName("Советское");
        $manager->persist($city_2015);


        $city_2016 = new City();
        $city_2016->setRegion($region_11);
        $city_2016->setName("Созоновка");
        $manager->persist($city_2016);


        $city_2017 = new City();
        $city_2017->setRegion($region_13);
        $city_2017->setName("Сокаль");
        $manager->persist($city_2017);


        $city_2018 = new City();
        $city_2018->setRegion($region_2);
        $city_2018->setName("Сокиринцы");
        $manager->persist($city_2018);


        $city_2019 = new City();
        $city_2019->setRegion($region_3);
        $city_2019->setName("Сокиричи");
        $manager->persist($city_2019);


        $city_2020 = new City();
        $city_2020->setRegion($region_7);
        $city_2020->setName("Сокирница");
        $manager->persist($city_2020);


        $city_2021 = new City();
        $city_2021->setRegion($region_25);
        $city_2021->setName("Сокиряны");
        $manager->persist($city_2021);


        $city_2022 = new City();
        $city_2022->setRegion($region_2);
        $city_2022->setName("Соколец");
        $manager->persist($city_2022);


        $city_2023 = new City();
        $city_2023->setRegion($region_2);
        $city_2023->setName("Соколовка");
        $manager->persist($city_2023);


        $city_2024 = new City();
        $city_2024->setRegion($region_11);
        $city_2024->setName("Соколовское");
        $manager->persist($city_2024);


        $city_2025 = new City();
        $city_2025->setRegion($region_13);
        $city_2025->setName("Сокольники");
        $manager->persist($city_2025);


        $city_2026 = new City();
        $city_2026->setRegion($region_5);
        $city_2026->setName("Соледар");
        $manager->persist($city_2026);


        $city_2027 = new City();
        $city_2027->setRegion($region_4);
        $city_2027->setName("Соленое");
        $manager->persist($city_2027);


        $city_2028 = new City();
        $city_2028->setRegion($region_8);
        $city_2028->setName("Солнечное");
        $manager->persist($city_2028);


        $city_2029 = new City();
        $city_2029->setRegion($region_18);
        $city_2029->setName("Солнечное");
        $manager->persist($city_2029);


        $city_2030 = new City();
        $city_2030->setRegion($region_7);
        $city_2030->setName("Соломоново");
        $manager->persist($city_2030);


        $city_2031 = new City();
        $city_2031->setRegion($region_17);
        $city_2031->setName("Солонив");
        $manager->persist($city_2031);


        $city_2032 = new City();
        $city_2032->setRegion($region_20);
        $city_2032->setName("Солоницевка");
        $manager->persist($city_2032);


        $city_2033 = new City();
        $city_2033->setRegion($region_13);
        $city_2033->setName("Солонка");
        $manager->persist($city_2033);


        $city_2034 = new City();
        $city_2034->setRegion($region_9);
        $city_2034->setName("Солотвин");
        $manager->persist($city_2034);


        $city_2035 = new City();
        $city_2035->setRegion($region_7);
        $city_2035->setName("Солотвино");
        $manager->persist($city_2035);


        $city_2036 = new City();
        $city_2036->setRegion($region_1);
        $city_2036->setName("Соляное");
        $manager->persist($city_2036);


        $city_2037 = new City();
        $city_2037->setRegion($region_9);
        $city_2037->setName("Сопов");
        $manager->persist($city_2037);


        $city_2038 = new City();
        $city_2038->setRegion($region_24);
        $city_2038->setName("Сосница");
        $manager->persist($city_2038);


        $city_2039 = new City();
        $city_2039->setRegion($region_13);
        $city_2039->setName("Сосновка");
        $manager->persist($city_2039);


        $city_2040 = new City();
        $city_2040->setRegion($region_2);
        $city_2040->setName("Сосновка");
        $manager->persist($city_2040);


        $city_2041 = new City();
        $city_2041->setRegion($region_17);
        $city_2041->setName("Сосновое");
        $manager->persist($city_2041);


        $city_2042 = new City();
        $city_2042->setRegion($region_20);
        $city_2042->setName("Сосоновка");
        $manager->persist($city_2042);


        $city_2043 = new City();
        $city_2043->setRegion($region_4);
        $city_2043->setName("Софиевка");
        $manager->persist($city_2043);


        $city_2044 = new City();
        $city_2044->setRegion($region_10);
        $city_2044->setName("Софиевская Борщаговка");
        $manager->persist($city_2044);


        $city_2045 = new City();
        $city_2045->setRegion($region_12);
        $city_2045->setName("Софиевский");
        $manager->persist($city_2045);


        $city_2046 = new City();
        $city_2046->setRegion($region_5);
        $city_2046->setName("Спартак");
        $manager->persist($city_2046);


        $city_2047 = new City();
        $city_2047->setRegion($region_7);
        $city_2047->setName("Среднее");
        $manager->persist($city_2047);


        $city_2048 = new City();
        $city_2048->setRegion($region_7);
        $city_2048->setName("Среднее водяное");
        $manager->persist($city_2048);


        $city_2049 = new City();
        $city_2049->setRegion($region_9);
        $city_2049->setName("Средний бабин");
        $manager->persist($city_2049);


        $city_2050 = new City();
        $city_2050->setRegion($region_10);
        $city_2050->setName("Ставище");
        $manager->persist($city_2050);


        $city_2051 = new City();
        $city_2051->setRegion($region_10);
        $city_2051->setName("Стайки");
        $manager->persist($city_2051);


        $city_2052 = new City();
        $city_2052->setRegion($region_12);
        $city_2052->setName("Станично-Луганское");
        $manager->persist($city_2052);


        $city_2053 = new City();
        $city_2053->setRegion($region_6);
        $city_2053->setName("Станишовка");
        $manager->persist($city_2053);


        $city_2054 = new City();
        $city_2054->setRegion($region_3);
        $city_2054->setName("Старая Выжевка");
        $manager->persist($city_2054);


        $city_2055 = new City();
        $city_2055->setRegion($region_21);
        $city_2055->setName("Старая збурьевка");
        $manager->persist($city_2055);


        $city_2056 = new City();
        $city_2056->setRegion($region_18);
        $city_2056->setName("Старая ивановка");
        $manager->persist($city_2056);


        $city_2057 = new City();
        $city_2057->setRegion($region_15);
        $city_2057->setName("Старая некрасовка");
        $manager->persist($city_2057);


        $city_2058 = new City();
        $city_2058->setRegion($region_22);
        $city_2058->setName("Старая Синява");
        $manager->persist($city_2058);


        $city_2059 = new City();
        $city_2059->setRegion($region_12);
        $city_2059->setName("Старобельск");
        $manager->persist($city_2059);


        $city_2060 = new City();
        $city_2060->setRegion($region_5);
        $city_2060->setName("Старобешево");
        $manager->persist($city_2060);


        $city_2061 = new City();
        $city_2061->setRegion($region_20);
        $city_2061->setName("Староверовка");
        $manager->persist($city_2061);


        $city_2062 = new City();
        $city_2062->setRegion($region_3);
        $city_2062->setName("Старовойтовое");
        $manager->persist($city_2062);


        $city_2063 = new City();
        $city_2063->setRegion($region_10);
        $city_2063->setName("Старое");
        $manager->persist($city_2063);


        $city_2064 = new City();
        $city_2064->setRegion($region_13);
        $city_2064->setName("Старое село");
        $manager->persist($city_2064);


        $city_2065 = new City();
        $city_2065->setRegion($region_22);
        $city_2065->setName("Староконстантинов");
        $manager->persist($city_2065);


        $city_2066 = new City();
        $city_2066->setRegion($region_5);
        $city_2066->setName("Старомихайловка");
        $manager->persist($city_2066);


        $city_2067 = new City();
        $city_2067->setRegion($region_3);
        $city_2067->setName("Староселье");
        $manager->persist($city_2067);


        $city_2068 = new City();
        $city_2068->setRegion($region_23);
        $city_2068->setName("Старые бабаны");
        $manager->persist($city_2068);


        $city_2069 = new City();
        $city_2069->setRegion($region_4);
        $city_2069->setName("Старые кодаки");
        $manager->persist($city_2069);


        $city_2070 = new City();
        $city_2070->setRegion($region_10);
        $city_2070->setName("Старые петровцы");
        $manager->persist($city_2070);


        $city_2071 = new City();
        $city_2071->setRegion($region_24);
        $city_2071->setName("Старый белоус");
        $manager->persist($city_2071);


        $city_2072 = new City();
        $city_2072->setRegion($region_9);
        $city_2072->setName("Старый косов");
        $manager->persist($city_2072);


        $city_2073 = new City();
        $city_2073->setRegion($region_22);
        $city_2073->setName("Старый кривин");
        $manager->persist($city_2073);


        $city_2074 = new City();
        $city_2074->setRegion($region_5);
        $city_2074->setName("Старый крым");
        $manager->persist($city_2074);


        $city_2075 = new City();
        $city_2075->setRegion($region_1);
        $city_2075->setName("Старый Крым");
        $manager->persist($city_2075);


        $city_2076 = new City();
        $city_2076->setRegion($region_20);
        $city_2076->setName("Старый Мерчик");
        $manager->persist($city_2076);


        $city_2077 = new City();
        $city_2077->setRegion($region_20);
        $city_2077->setName("Старый Салтов");
        $manager->persist($city_2077);


        $city_2078 = new City();
        $city_2078->setRegion($region_13);
        $city_2078->setName("Старый Самбор");
        $manager->persist($city_2078);


        $city_2079 = new City();
        $city_2079->setRegion($region_6);
        $city_2079->setName("Старый солотвин");
        $manager->persist($city_2079);


        $city_2080 = new City();
        $city_2080->setRegion($region_13);
        $city_2080->setName("Старый ярычев");
        $manager->persist($city_2080);


        $city_2081 = new City();
        $city_2081->setRegion($region_12);
        $city_2081->setName("Стаханов");
        $manager->persist($city_2081);


        $city_2082 = new City();
        $city_2082->setRegion($region_23);
        $city_2082->setName("Стеблев");
        $manager->persist($city_2082);


        $city_2083 = new City();
        $city_2083->setRegion($region_7);
        $city_2083->setName("Стеблевка");
        $manager->persist($city_2083);


        $city_2084 = new City();
        $city_2084->setRegion($region_13);
        $city_2084->setName("Стебник");
        $manager->persist($city_2084);


        $city_2085 = new City();
        $city_2085->setRegion($region_18);
        $city_2085->setName("Степановка");
        $manager->persist($city_2085);


        $city_2086 = new City();
        $city_2086->setRegion($region_21);
        $city_2086->setName("Степановка");
        $manager->persist($city_2086);


        $city_2087 = new City();
        $city_2087->setRegion($region_17);
        $city_2087->setName("Степань");
        $manager->persist($city_2087);


        $city_2088 = new City();
        $city_2088->setRegion($region_18);
        $city_2088->setName("Стецковка");
        $manager->persist($city_2088);


        $city_2089 = new City();
        $city_2089->setRegion($region_5);
        $city_2089->setName("Стожково");
        $manager->persist($city_2089);


        $city_2090 = new City();
        $city_2090->setRegion($region_9);
        $city_2090->setName("Стопчатов");
        $manager->persist($city_2090);


        $city_2091 = new City();
        $city_2091->setRegion($region_25);
        $city_2091->setName("Сторожинец");
        $manager->persist($city_2091);


        $city_2092 = new City();
        $city_2092->setRegion($region_13);
        $city_2092->setName("Сторонибабы");
        $manager->persist($city_2092);


        $city_2093 = new City();
        $city_2093->setRegion($region_10);
        $city_2093->setName("Стоянка");
        $manager->persist($city_2093);


        $city_2094 = new City();
        $city_2094->setRegion($region_7);
        $city_2094->setName("Страбычово");
        $manager->persist($city_2094);


        $city_2095 = new City();
        $city_2095->setRegion($region_13);
        $city_2095->setName("Страдч");
        $manager->persist($city_2095);


        $city_2096 = new City();
        $city_2096->setRegion($region_13);
        $city_2096->setName("Страшевичи");
        $manager->persist($city_2096);


        $city_2097 = new City();
        $city_2097->setRegion($region_22);
        $city_2097->setName("Стриганы");
        $manager->persist($city_2097);


        $city_2098 = new City();
        $city_2098->setRegion($region_2);
        $city_2098->setName("Стрижавка");
        $manager->persist($city_2098);


        $city_2099 = new City();
        $city_2099->setRegion($region_6);
        $city_2099->setName("Стрижевка");
        $manager->persist($city_2099);


        $city_2100 = new City();
        $city_2100->setRegion($region_25);
        $city_2100->setName("Строинцы");
        $manager->persist($city_2100);


        $city_2101 = new City();
        $city_2101->setRegion($region_22);
        $city_2101->setName("Струга");
        $manager->persist($city_2101);


        $city_2102 = new City();
        $city_2102->setRegion($region_3);
        $city_2102->setName("Струмовка");
        $manager->persist($city_2102);


        $city_2103 = new City();
        $city_2103->setRegion($region_19);
        $city_2103->setName("Струсов");
        $manager->persist($city_2103);


        $city_2104 = new City();
        $city_2104->setRegion($region_13);
        $city_2104->setName("Стрый");
        $manager->persist($city_2104);


        $city_2105 = new City();
        $city_2105->setRegion($region_2);
        $city_2105->setName("Студеная");
        $manager->persist($city_2105);


        $city_2106 = new City();
        $city_2106->setRegion($region_19);
        $city_2106->setName("Ступки");
        $manager->persist($city_2106);


        $city_2107 = new City();
        $city_2107->setRegion($region_22);
        $city_2107->setName("Стуфчинцы");
        $manager->persist($city_2107);


        $city_2108 = new City();
        $city_2108->setRegion($region_11);
        $city_2108->setName("Субботцы");
        $manager->persist($city_2108);


        $city_2109 = new City();
        $city_2109->setRegion($region_15);
        $city_2109->setName("Суворово");
        $manager->persist($city_2109);


        $city_2110 = new City();
        $city_2110->setRegion($region_1);
        $city_2110->setName("Судак");
        $manager->persist($city_2110);


        $city_2111 = new City();
        $city_2111->setRegion($region_22);
        $city_2111->setName("Судилков");
        $manager->persist($city_2111);


        $city_2112 = new City();
        $city_2112->setRegion($region_13);
        $city_2112->setName("Судовая вишня");
        $manager->persist($city_2112);


        $city_2113 = new City();
        $city_2113->setRegion($region_18);
        $city_2113->setName("Сумы");
        $manager->persist($city_2113);


        $city_2114 = new City();
        $city_2114->setRegion($region_4);
        $city_2114->setName("Сурско-литовское");
        $manager->persist($city_2114);


        $city_2115 = new City();
        $city_2115->setRegion($region_3);
        $city_2115->setName("Суск");
        $manager->persist($city_2115);


        $city_2116 = new City();
        $city_2116->setRegion($region_6);
        $city_2116->setName("Суслы");
        $manager->persist($city_2116);


        $city_2117 = new City();
        $city_2117->setRegion($region_2);
        $city_2117->setName("Сутиски");
        $manager->persist($city_2117);


        $city_2118 = new City();
        $city_2118->setRegion($region_12);
        $city_2118->setName("Суходольск");
        $manager->persist($city_2118);


        $city_2119 = new City();
        $city_2119->setRegion($region_23);
        $city_2119->setName("Сушковка");
        $manager->persist($city_2119);


        $city_2120 = new City();
        $city_2120->setRegion($region_13);
        $city_2120->setName("Сходница");
        $manager->persist($city_2120);


        $city_2121 = new City();
        $city_2121->setRegion($region_11);
        $city_2121->setName("Счастливое");
        $manager->persist($city_2121);


        $city_2122 = new City();
        $city_2122->setRegion($region_21);
        $city_2122->setName("Счастливцево");
        $manager->persist($city_2122);


        $city_2123 = new City();
        $city_2123->setRegion($region_12);
        $city_2123->setName("Счастье");
        $manager->persist($city_2123);


        $city_2124 = new City();
        $city_2124->setRegion($region_15);
        $city_2124->setName("Сычавка");
        $manager->persist($city_2124);


        $city_2125 = new City();
        $city_2125->setRegion($region_7);
        $city_2125->setName("Сюртэ");
        $manager->persist($city_2125);


        $city_2126 = new City();
        $city_2126->setRegion($region_24);
        $city_2126->setName("Сядрине");
        $manager->persist($city_2126);


        $city_2127 = new City();
        $city_2127->setRegion($region_15);
        $city_2127->setName("Табаки");
        $manager->persist($city_2127);


        $city_2128 = new City();
        $city_2128->setRegion($region_21);
        $city_2128->setName("Таврийск");
        $manager->persist($city_2128);


        $city_2129 = new City();
        $city_2129->setRegion($region_21);
        $city_2129->setName("Таврия");
        $manager->persist($city_2129);


        $city_2130 = new City();
        $city_2130->setRegion($region_15);
        $city_2130->setName("Таирово");
        $manager->persist($city_2130);


        $city_2131 = new City();
        $city_2131->setRegion($region_24);
        $city_2131->setName("Талалаевка");
        $manager->persist($city_2131);


        $city_2132 = new City();
        $city_2132->setRegion($region_23);
        $city_2132->setName("Тальное");
        $manager->persist($city_2132);


        $city_2133 = new City();
        $city_2133->setRegion($region_1);
        $city_2133->setName("Тамбовка");
        $manager->persist($city_2133);


        $city_2134 = new City();
        $city_2134->setRegion($region_17);
        $city_2134->setName("Тараканов");
        $manager->persist($city_2134);


        $city_2135 = new City();
        $city_2135->setRegion($region_20);
        $city_2135->setName("Тарановка");
        $manager->persist($city_2135);


        $city_2136 = new City();
        $city_2136->setRegion($region_10);
        $city_2136->setName("Тарасовка");
        $manager->persist($city_2136);


        $city_2137 = new City();
        $city_2137->setRegion($region_3);
        $city_2137->setName("Тарасово");
        $manager->persist($city_2137);


        $city_2138 = new City();
        $city_2138->setRegion($region_10);
        $city_2138->setName("Тараща");
        $manager->persist($city_2138);


        $city_2139 = new City();
        $city_2139->setRegion($region_4);
        $city_2139->setName("Таромское");
        $manager->persist($city_2139);


        $city_2140 = new City();
        $city_2140->setRegion($region_15);
        $city_2140->setName("Тарутино");
        $manager->persist($city_2140);


        $city_2141 = new City();
        $city_2141->setRegion($region_15);
        $city_2141->setName("Татарбунары");
        $manager->persist($city_2141);


        $city_2142 = new City();
        $city_2142->setRegion($region_9);
        $city_2142->setName("Татаров");
        $manager->persist($city_2142);


        $city_2143 = new City();
        $city_2143->setRegion($region_5);
        $city_2143->setName("Тельманово");
        $manager->persist($city_2143);


        $city_2144 = new City();
        $city_2144->setRegion($region_22);
        $city_2144->setName("Теофиполь");
        $manager->persist($city_2144);


        $city_2145 = new City();
        $city_2145->setRegion($region_2);
        $city_2145->setName("Теплик");
        $manager->persist($city_2145);


        $city_2146 = new City();
        $city_2146->setRegion($region_8);
        $city_2146->setName("Тепличное");
        $manager->persist($city_2146);


        $city_2147 = new City();
        $city_2147->setRegion($region_4);
        $city_2147->setName("Тепловка");
        $manager->persist($city_2147);


        $city_2148 = new City();
        $city_2148->setRegion($region_12);
        $city_2148->setName("Теплогорск");
        $manager->persist($city_2148);


        $city_2149 = new City();
        $city_2149->setRegion($region_15);
        $city_2149->setName("Теплодар");
        $manager->persist($city_2149);


        $city_2150 = new City();
        $city_2150->setRegion($region_19);
        $city_2150->setName("Теребовля");
        $manager->persist($city_2150);


        $city_2151 = new City();
        $city_2151->setRegion($region_10);
        $city_2151->setName("Терезино");
        $manager->persist($city_2151);


        $city_2152 = new City();
        $city_2152->setRegion($region_7);
        $city_2152->setName("Тересва");
        $manager->persist($city_2152);


        $city_2153 = new City();
        $city_2153->setRegion($region_16);
        $city_2153->setName("Терешки");
        $manager->persist($city_2153);


        $city_2154 = new City();
        $city_2154->setRegion($region_8);
        $city_2154->setName("Терноватое");
        $manager->persist($city_2154);


        $city_2155 = new City();
        $city_2155->setRegion($region_4);
        $city_2155->setName("Терновка");
        $manager->persist($city_2155);


        $city_2156 = new City();
        $city_2156->setRegion($region_7);
        $city_2156->setName("Терново");
        $manager->persist($city_2156);


        $city_2157 = new City();
        $city_2157->setRegion($region_19);
        $city_2157->setName("Тернополь");
        $manager->persist($city_2157);


        $city_2158 = new City();
        $city_2158->setRegion($region_18);
        $city_2158->setName("Терны");
        $manager->persist($city_2158);


        $city_2159 = new City();
        $city_2159->setRegion($region_6);
        $city_2159->setName("Тетеревка");
        $manager->persist($city_2159);


        $city_2160 = new City();
        $city_2160->setRegion($region_10);
        $city_2160->setName("Тетиев");
        $manager->persist($city_2160);


        $city_2161 = new City();
        $city_2161->setRegion($region_2);
        $city_2161->setName("Тиврев");
        $manager->persist($city_2161);


        $city_2162 = new City();
        $city_2162->setRegion($region_1);
        $city_2162->setName("Тиловое");
        $manager->persist($city_2162);


        $city_2163 = new City();
        $city_2163->setRegion($region_9);
        $city_2163->setName("Тисменница");
        $manager->persist($city_2163);


        $city_2164 = new City();
        $city_2164->setRegion($region_2);
        $city_2164->setName("Титусовка");
        $manager->persist($city_2164);


        $city_2165 = new City();
        $city_2165->setRegion($region_3);
        $city_2165->setName("Тишковичи");
        $manager->persist($city_2165);


        $city_2166 = new City();
        $city_2166->setRegion($region_9);
        $city_2166->setName("Тлумач");
        $manager->persist($city_2166);


        $city_2167 = new City();
        $city_2167->setRegion($region_8);
        $city_2167->setName("Токмак");
        $manager->persist($city_2167);


        $city_2168 = new City();
        $city_2168->setRegion($region_4);
        $city_2168->setName("Токмаковка");
        $manager->persist($city_2168);


        $city_2169 = new City();
        $city_2169->setRegion($region_4);
        $city_2169->setName("Токовское");
        $manager->persist($city_2169);


        $city_2170 = new City();
        $city_2170->setRegion($region_19);
        $city_2170->setName("Толстое");
        $manager->persist($city_2170);


        $city_2171 = new City();
        $city_2171->setRegion($region_19);
        $city_2171->setName("Толстолуг");
        $manager->persist($city_2171);


        $city_2172 = new City();
        $city_2172->setRegion($region_4);
        $city_2172->setName("Томаковка");
        $manager->persist($city_2172);


        $city_2173 = new City();
        $city_2173->setRegion($region_17);
        $city_2173->setName("Томашгород");
        $manager->persist($city_2173);


        $city_2174 = new City();
        $city_2174->setRegion($region_18);
        $city_2174->setName("Томашовка");
        $manager->persist($city_2174);


        $city_2175 = new City();
        $city_2175->setRegion($region_2);
        $city_2175->setName("Томашполь");
        $manager->persist($city_2175);


        $city_2176 = new City();
        $city_2176->setRegion($region_6);
        $city_2176->setName("Топильня");
        $manager->persist($city_2176);


        $city_2177 = new City();
        $city_2177->setRegion($region_1);
        $city_2177->setName("Топольное");
        $manager->persist($city_2177);


        $city_2178 = new City();
        $city_2178->setRegion($region_25);
        $city_2178->setName("Топоровцы");
        $manager->persist($city_2178);


        $city_2179 = new City();
        $city_2179->setRegion($region_9);
        $city_2179->setName("Торговица");
        $manager->persist($city_2179);


        $city_2180 = new City();
        $city_2180->setRegion($region_9);
        $city_2180->setName("Торговица");
        $manager->persist($city_2180);


        $city_2181 = new City();
        $city_2181->setRegion($region_5);
        $city_2181->setName("Торез");
        $manager->persist($city_2181);


        $city_2182 = new City();
        $city_2182->setRegion($region_19);
        $city_2182->setName("Торское");
        $manager->persist($city_2182);


        $city_2183 = new City();
        $city_2183->setRegion($region_3);
        $city_2183->setName("Торчин");
        $manager->persist($city_2183);


        $city_2184 = new City();
        $city_2184->setRegion($region_12);
        $city_2184->setName("Тошковка");
        $manager->persist($city_2184);


        $city_2185 = new City();
        $city_2185->setRegion($region_10);
        $city_2185->setName("Требухов");
        $manager->persist($city_2185);


        $city_2186 = new City();
        $city_2186->setRegion($region_11);
        $city_2186->setName("Треповка");
        $manager->persist($city_2186);


        $city_2187 = new City();
        $city_2187->setRegion($region_12);
        $city_2187->setName("Троицкое");
        $manager->persist($city_2187);


        $city_2188 = new City();
        $city_2188->setRegion($region_18);
        $city_2188->setName("Тростянец");
        $manager->persist($city_2188);


        $city_2189 = new City();
        $city_2189->setRegion($region_2);
        $city_2189->setName("Тростянец");
        $manager->persist($city_2189);


        $city_2190 = new City();
        $city_2190->setRegion($region_13);
        $city_2190->setName("Тростянец");
        $manager->persist($city_2190);


        $city_2191 = new City();
        $city_2191->setRegion($region_13);
        $city_2191->setName("Трускавец");
        $manager->persist($city_2191);


        $city_2192 = new City();
        $city_2192->setRegion($region_9);
        $city_2192->setName("Тужилов");
        $manager->persist($city_2192);


        $city_2193 = new City();
        $city_2193->setRegion($region_2);
        $city_2193->setName("Тульчин");
        $manager->persist($city_2193);


        $city_2194 = new City();
        $city_2194->setRegion($region_2);
        $city_2194->setName("Турбов");
        $manager->persist($city_2194);


        $city_2195 = new City();
        $city_2195->setRegion($region_3);
        $city_2195->setName("Турийск");
        $manager->persist($city_2195);


        $city_2196 = new City();
        $city_2196->setRegion($region_7);
        $city_2196->setName("Турички");
        $manager->persist($city_2196);


        $city_2197 = new City();
        $city_2197->setRegion($region_13);
        $city_2197->setName("Турка");
        $manager->persist($city_2197);


        $city_2198 = new City();
        $city_2198->setRegion($region_9);
        $city_2198->setName("Турка");
        $manager->persist($city_2198);


        $city_2199 = new City();
        $city_2199->setRegion($region_7);
        $city_2199->setName("Турьи реметы");
        $manager->persist($city_2199);


        $city_2200 = new City();
        $city_2200->setRegion($region_2);
        $city_2200->setName("Тывров");
        $manager->persist($city_2200);


        $city_2201 = new City();
        $city_2201->setRegion($region_9);
        $city_2201->setName("Тысменица");
        $manager->persist($city_2201);


        $city_2202 = new City();
        $city_2202->setRegion($region_2);
        $city_2202->setName("Тютьки");
        $manager->persist($city_2202);


        $city_2203 = new City();
        $city_2203->setRegion($region_7);
        $city_2203->setName("Тячев");
        $manager->persist($city_2203);


        $city_2204 = new City();
        $city_2204->setRegion($region_5);
        $city_2204->setName("Углегорск");
        $manager->persist($city_2204);


        $city_2205 = new City();
        $city_2205->setRegion($region_5);
        $city_2205->setName("Угледар");
        $manager->persist($city_2205);


        $city_2206 = new City();
        $city_2206->setRegion($region_7);
        $city_2206->setName("Угля");
        $manager->persist($city_2206);


        $city_2207 = new City();
        $city_2207->setRegion($region_13);
        $city_2207->setName("Угнев");
        $manager->persist($city_2207);


        $city_2208 = new City();
        $city_2208->setRegion($region_9);
        $city_2208->setName("Угорники");
        $manager->persist($city_2208);


        $city_2209 = new City();
        $city_2209->setRegion($region_9);
        $city_2209->setName("Угринов");
        $manager->persist($city_2209);


        $city_2210 = new City();
        $city_2210->setRegion($region_18);
        $city_2210->setName("Угроеды");
        $manager->persist($city_2210);


        $city_2211 = new City();
        $city_2211->setRegion($region_5);
        $city_2211->setName("Удачное");
        $manager->persist($city_2211);


        $city_2212 = new City();
        $city_2212->setRegion($region_2);
        $city_2212->setName("Удич");
        $manager->persist($city_2212);


        $city_2213 = new City();
        $city_2213->setRegion($region_17);
        $city_2213->setName("Удрицк");
        $manager->persist($city_2213);


        $city_2214 = new City();
        $city_2214->setRegion($region_7);
        $city_2214->setName("Ужгород");
        $manager->persist($city_2214);


        $city_2215 = new City();
        $city_2215->setRegion($region_10);
        $city_2215->setName("Узин");
        $manager->persist($city_2215);


        $city_2216 = new City();
        $city_2216->setRegion($region_10);
        $city_2216->setName("Украинка");
        $manager->persist($city_2216);


        $city_2217 = new City();
        $city_2217->setRegion($region_5);
        $city_2217->setName("Украинск");
        $manager->persist($city_2217);


        $city_2218 = new City();
        $city_2218->setRegion($region_1);
        $city_2218->setName("Укромное");
        $manager->persist($city_2218);


        $city_2219 = new City();
        $city_2219->setRegion($region_2);
        $city_2219->setName("Уладовка");
        $manager->persist($city_2219);


        $city_2220 = new City();
        $city_2220->setRegion($region_2);
        $city_2220->setName("Уланов");
        $manager->persist($city_2220);


        $city_2221 = new City();
        $city_2221->setRegion($region_22);
        $city_2221->setName("Улашановка");
        $manager->persist($city_2221);


        $city_2222 = new City();
        $city_2222->setRegion($region_11);
        $city_2222->setName("Ульяновка");
        $manager->persist($city_2222);


        $city_2223 = new City();
        $city_2223->setRegion($region_23);
        $city_2223->setName("Умань");
        $manager->persist($city_2223);


        $city_2224 = new City();
        $city_2224->setRegion($region_15);
        $city_2224->setName("Усатово");
        $manager->persist($city_2224);


        $city_2225 = new City();
        $city_2225->setRegion($region_12);
        $city_2225->setName("Успенка");
        $manager->persist($city_2225);


        $city_2226 = new City();
        $city_2226->setRegion($region_9);
        $city_2226->setName("Устерики");
        $manager->persist($city_2226);


        $city_2227 = new City();
        $city_2227->setRegion($region_16);
        $city_2227->setName("Устивица");
        $manager->persist($city_2227);


        $city_2228 = new City();
        $city_2228->setRegion($region_3);
        $city_2228->setName("Устилуг");
        $manager->persist($city_2228);


        $city_2229 = new City();
        $city_2229->setRegion($region_10);
        $city_2229->setName("Устимовка");
        $manager->persist($city_2229);


        $city_2230 = new City();
        $city_2230->setRegion($region_11);
        $city_2230->setName("Устиновка");
        $manager->persist($city_2230);


        $city_2231 = new City();
        $city_2231->setRegion($region_7);
        $city_2231->setName("Усть-Черна");
        $manager->persist($city_2231);


        $city_2232 = new City();
        $city_2232->setRegion($region_20);
        $city_2232->setName("Утковка");
        $manager->persist($city_2232);


        $city_2233 = new City();
        $city_2233->setRegion($region_6);
        $city_2233->setName("Ушомир");
        $manager->persist($city_2233);


        $city_2234 = new City();
        $city_2234->setRegion($region_7);
        $city_2234->setName("Фанчиково");
        $manager->persist($city_2234);


        $city_2235 = new City();
        $city_2235->setRegion($region_10);
        $city_2235->setName("Фастов");
        $manager->persist($city_2235);


        $city_2236 = new City();
        $city_2236->setRegion($region_12);
        $city_2236->setName("Фащевка");
        $manager->persist($city_2236);


        $city_2237 = new City();
        $city_2237->setRegion($region_3);
        $city_2237->setName("Федоровка");
        $manager->persist($city_2237);


        $city_2238 = new City();
        $city_2238->setRegion($region_1);
        $city_2238->setName("Феодосия");
        $manager->persist($city_2238);


        $city_2239 = new City();
        $city_2239->setRegion($region_15);
        $city_2239->setName("Фонтанка");
        $manager->persist($city_2239);


        $city_2240 = new City();
        $city_2240->setRegion($region_1);
        $city_2240->setName("Фонтаны");
        $manager->persist($city_2240);


        $city_2241 = new City();
        $city_2241->setRegion($region_1);
        $city_2241->setName("Форос");
        $manager->persist($city_2241);


        $city_2242 = new City();
        $city_2242->setRegion($region_21);
        $city_2242->setName("Фрунзе");
        $manager->persist($city_2242);


        $city_2243 = new City();
        $city_2243->setRegion($region_12);
        $city_2243->setName("Фрунзе");
        $manager->persist($city_2243);


        $city_2244 = new City();
        $city_2244->setRegion($region_15);
        $city_2244->setName("Фрунзовка");
        $manager->persist($city_2244);


        $city_2245 = new City();
        $city_2245->setRegion($region_10);
        $city_2245->setName("Фурсы");
        $manager->persist($city_2245);


        $city_2246 = new City();
        $city_2246->setRegion($region_16);
        $city_2246->setName("Халтурино");
        $manager->persist($city_2246);


        $city_2247 = new City();
        $city_2247->setRegion($region_16);
        $city_2247->setName("Халтурино");
        $manager->persist($city_2247);


        $city_2248 = new City();
        $city_2248->setRegion($region_5);
        $city_2248->setName("Харцызск");
        $manager->persist($city_2248);


        $city_2249 = new City();
        $city_2249->setRegion($region_20);
        $city_2249->setName("Харьков");
        $manager->persist($city_2249);


        $city_2250 = new City();
        $city_2250->setRegion($region_11);
        $city_2250->setName("Хащеватое");
        $manager->persist($city_2250);


        $city_2251 = new City();
        $city_2251->setRegion($region_4);
        $city_2251->setName("Хащевое");
        $manager->persist($city_2251);


        $city_2252 = new City();
        $city_2252->setRegion($region_21);
        $city_2252->setName("Херсон");
        $manager->persist($city_2252);


        $city_2253 = new City();
        $city_2253->setRegion($region_2);
        $city_2253->setName("Хижинцы");
        $manager->persist($city_2253);


        $city_2254 = new City();
        $city_2254->setRegion($region_17);
        $city_2254->setName("Хиночи");
        $manager->persist($city_2254);


        $city_2255 = new City();
        $city_2255->setRegion($region_13);
        $city_2255->setName("Хирев");
        $manager->persist($city_2255);


        $city_2256 = new City();
        $city_2256->setRegion($region_13);
        $city_2256->setName("Хишевичи");
        $manager->persist($city_2256);


        $city_2257 = new City();
        $city_2257->setRegion($region_15);
        $city_2257->setName("Хлебодарское");
        $manager->persist($city_2257);


        $city_2258 = new City();
        $city_2258->setRegion($region_23);
        $city_2258->setName("Хлыстуновка");
        $manager->persist($city_2258);


        $city_2259 = new City();
        $city_2259->setRegion($region_2);
        $city_2259->setName("Хмельник");
        $manager->persist($city_2259);


        $city_2260 = new City();
        $city_2260->setRegion($region_22);
        $city_2260->setName("Хмельницкий");
        $manager->persist($city_2260);


        $city_2261 = new City();
        $city_2261->setRegion($region_6);
        $city_2261->setName("Ходаки");
        $manager->persist($city_2261);


        $city_2262 = new City();
        $city_2262->setRegion($region_13);
        $city_2262->setName("Ходовичи");
        $manager->persist($city_2262);


        $city_2263 = new City();
        $city_2263->setRegion($region_13);
        $city_2263->setName("Ходоров");
        $manager->persist($city_2263);


        $city_2264 = new City();
        $city_2264->setRegion($region_11);
        $city_2264->setName("Ходоров");
        $manager->persist($city_2264);


        $city_2265 = new City();
        $city_2265->setRegion($region_10);
        $city_2265->setName("Ходосовка");
        $manager->persist($city_2265);


        $city_2266 = new City();
        $city_2266->setRegion($region_15);
        $city_2266->setName("Холодная балка");
        $manager->persist($city_2266);


        $city_2267 = new City();
        $city_2267->setRegion($region_13);
        $city_2267->setName("Холодноводка");
        $manager->persist($city_2267);


        $city_2268 = new City();
        $city_2268->setRegion($region_23);
        $city_2268->setName("Холоднянское");
        $manager->persist($city_2268);


        $city_2269 = new City();
        $city_2269->setRegion($region_16);
        $city_2269->setName("Хорол");
        $manager->persist($city_2269);


        $city_2270 = new City();
        $city_2270->setRegion($region_19);
        $city_2270->setName("Хоростков");
        $manager->persist($city_2270);


        $city_2271 = new City();
        $city_2271->setRegion($region_20);
        $city_2271->setName("Хорошево");
        $manager->persist($city_2271);


        $city_2272 = new City();
        $city_2272->setRegion($region_18);
        $city_2272->setName("Хотень");
        $manager->persist($city_2272);


        $city_2273 = new City();
        $city_2273->setRegion($region_25);
        $city_2273->setName("Хотин");
        $manager->persist($city_2273);


        $city_2274 = new City();
        $city_2274->setRegion($region_10);
        $city_2274->setName("Хотов");
        $manager->persist($city_2274);


        $city_2275 = new City();
        $city_2275->setRegion($region_23);
        $city_2275->setName("Хрещатик");
        $manager->persist($city_2275);


        $city_2276 = new City();
        $city_2276->setRegion($region_9);
        $city_2276->setName("Хриплин");
        $manager->persist($city_2276);


        $city_2277 = new City();
        $city_2277->setRegion($region_23);
        $city_2277->setName("Христиновка");
        $manager->persist($city_2277);


        $city_2278 = new City();
        $city_2278->setRegion($region_4);
        $city_2278->setName("Христофоровка");
        $manager->persist($city_2278);


        $city_2279 = new City();
        $city_2279->setRegion($region_12);
        $city_2279->setName("Хрящеватое");
        $manager->persist($city_2279);


        $city_2280 = new City();
        $city_2280->setRegion($region_7);
        $city_2280->setName("Хуст");
        $manager->persist($city_2280);


        $city_2281 = new City();
        $city_2281->setRegion($region_9);
        $city_2281->setName("Хутор-Будилов");
        $manager->persist($city_2281);


        $city_2282 = new City();
        $city_2282->setRegion($region_20);
        $city_2282->setName("Царедаровка");
        $manager->persist($city_2282);


        $city_2283 = new City();
        $city_2283->setRegion($region_4);
        $city_2283->setName("Царичанка");
        $manager->persist($city_2283);


        $city_2284 = new City();
        $city_2284->setRegion($region_23);
        $city_2284->setName("Цибулев");
        $manager->persist($city_2284);


        $city_2285 = new City();
        $city_2285->setRegion($region_11);
        $city_2285->setName("Цибулево");
        $manager->persist($city_2285);


        $city_2286 = new City();
        $city_2286->setRegion($region_9);
        $city_2286->setName("Цинева");
        $manager->persist($city_2286);


        $city_2287 = new City();
        $city_2287->setRegion($region_20);
        $city_2287->setName("Циркуны");
        $manager->persist($city_2287);


        $city_2288 = new City();
        $city_2288->setRegion($region_5);
        $city_2288->setName("Цукурино");
        $manager->persist($city_2288);


        $city_2289 = new City();
        $city_2289->setRegion($region_3);
        $city_2289->setName("Цумань");
        $manager->persist($city_2289);


        $city_2290 = new City();
        $city_2290->setRegion($region_21);
        $city_2290->setName("Цюрупинск");
        $manager->persist($city_2290);


        $city_2291 = new City();
        $city_2291->setRegion($region_10);
        $city_2291->setName("Чабаны");
        $manager->persist($city_2291);


        $city_2292 = new City();
        $city_2292->setRegion($region_25);
        $city_2292->setName("Чагор");
        $manager->persist($city_2292);


        $city_2293 = new City();
        $city_2293->setRegion($region_1);
        $city_2293->setName("Чайкино");
        $manager->persist($city_2293);


        $city_2294 = new City();
        $city_2294->setRegion($region_23);
        $city_2294->setName("Чапаевка");
        $manager->persist($city_2294);


        $city_2295 = new City();
        $city_2295->setRegion($region_20);
        $city_2295->setName("Чапаево");
        $manager->persist($city_2295);


        $city_2296 = new City();
        $city_2296->setRegion($region_21);
        $city_2296->setName("Чаплинка");
        $manager->persist($city_2296);


        $city_2297 = new City();
        $city_2297->setRegion($region_4);
        $city_2297->setName("Чаплино");
        $manager->persist($city_2297);


        $city_2298 = new City();
        $city_2298->setRegion($region_3);
        $city_2298->setName("Чаруков");
        $manager->persist($city_2298);


        $city_2299 = new City();
        $city_2299->setRegion($region_24);
        $city_2299->setName("Часниковка");
        $manager->persist($city_2299);


        $city_2300 = new City();
        $city_2300->setRegion($region_5);
        $city_2300->setName("Часов Яр");
        $manager->persist($city_2300);


        $city_2301 = new City();
        $city_2301->setRegion($region_3);
        $city_2301->setName("Чемерин");
        $manager->persist($city_2301);


        $city_2302 = new City();
        $city_2302->setRegion($region_2);
        $city_2302->setName("Чемерисы-барские");
        $manager->persist($city_2302);


        $city_2303 = new City();
        $city_2303->setRegion($region_22);
        $city_2303->setName("Чемеровцы");
        $manager->persist($city_2303);


        $city_2304 = new City();
        $city_2304->setRegion($region_22);
        $city_2304->setName("Червоная Зирка");
        $manager->persist($city_2304);


        $city_2305 = new City();
        $city_2305->setRegion($region_11);
        $city_2305->setName("Червоная каменка");
        $manager->persist($city_2305);


        $city_2306 = new City();
        $city_2306->setRegion($region_10);
        $city_2306->setName("Червоная слобода");
        $manager->persist($city_2306);


        $city_2307 = new City();
        $city_2307->setRegion($region_23);
        $city_2307->setName("Червоная слобода");
        $manager->persist($city_2307);


        $city_2308 = new City();
        $city_2308->setRegion($region_5);
        $city_2308->setName("Червоная украина");
        $manager->persist($city_2308);


        $city_2309 = new City();
        $city_2309->setRegion($region_6);
        $city_2309->setName("Червоноармейск");
        $manager->persist($city_2309);


        $city_2310 = new City();
        $city_2310->setRegion($region_15);
        $city_2310->setName("Червоноармейское");
        $manager->persist($city_2310);


        $city_2311 = new City();
        $city_2311->setRegion($region_13);
        $city_2311->setName("Червоноград");
        $manager->persist($city_2311);


        $city_2312 = new City();
        $city_2312->setRegion($region_6);
        $city_2312->setName("Червоногранитное");
        $manager->persist($city_2312);


        $city_2313 = new City();
        $city_2313->setRegion($region_4);
        $city_2313->setName("Червоногригоровка");
        $manager->persist($city_2313);


        $city_2314 = new City();
        $city_2314->setRegion($region_8);
        $city_2314->setName("Червоноднепровка");
        $manager->persist($city_2314);


        $city_2315 = new City();
        $city_2315->setRegion($region_18);
        $city_2315->setName("Червоное");
        $manager->persist($city_2315);


        $city_2316 = new City();
        $city_2316->setRegion($region_6);
        $city_2316->setName("Червоное");
        $manager->persist($city_2316);


        $city_2317 = new City();
        $city_2317->setRegion($region_16);
        $city_2317->setName("Червонозаводское");
        $manager->persist($city_2317);


        $city_2318 = new City();
        $city_2318->setRegion($region_12);
        $city_2318->setName("Червонопартизанск");
        $manager->persist($city_2318);


        $city_2319 = new City();
        $city_2319->setRegion($region_4);
        $city_2319->setName("Червоные поды");
        $manager->persist($city_2319);


        $city_2320 = new City();
        $city_2320->setRegion($region_20);
        $city_2320->setName("Червоный Донец");
        $manager->persist($city_2320);


        $city_2321 = new City();
        $city_2321->setRegion($region_11);
        $city_2321->setName("Червоный кут");
        $manager->persist($city_2321);


        $city_2322 = new City();
        $city_2322->setRegion($region_20);
        $city_2322->setName("Черкасская Лозовая");
        $manager->persist($city_2322);


        $city_2323 = new City();
        $city_2323->setRegion($region_5);
        $city_2323->setName("Черкасское");
        $manager->persist($city_2323);


        $city_2324 = new City();
        $city_2324->setRegion($region_23);
        $city_2324->setName("Черкассы");
        $manager->persist($city_2324);


        $city_2325 = new City();
        $city_2325->setRegion($region_13);
        $city_2325->setName("Черляны");
        $manager->persist($city_2325);


        $city_2326 = new City();
        $city_2326->setRegion($region_2);
        $city_2326->setName("Черневцы");
        $manager->persist($city_2326);


        $city_2327 = new City();
        $city_2327->setRegion($region_24);
        $city_2327->setName("Чернигов");
        $manager->persist($city_2327);


        $city_2328 = new City();
        $city_2328->setRegion($region_8);
        $city_2328->setName("Черниговка");
        $manager->persist($city_2328);


        $city_2329 = new City();
        $city_2329->setRegion($region_23);
        $city_2329->setName("Чернобай");
        $manager->persist($city_2329);


        $city_2330 = new City();
        $city_2330->setRegion($region_10);
        $city_2330->setName("Чернобыль");
        $manager->persist($city_2330);


        $city_2331 = new City();
        $city_2331->setRegion($region_25);
        $city_2331->setName("Черновцы");
        $manager->persist($city_2331);


        $city_2332 = new City();
        $city_2332->setRegion($region_10);
        $city_2332->setName("Черногородка");
        $manager->persist($city_2332);


        $city_2333 = new City();
        $city_2333->setRegion($region_2);
        $city_2333->setName("Черномин");
        $manager->persist($city_2333);


        $city_2334 = new City();
        $city_2334->setRegion($region_1);
        $city_2334->setName("Черноморское");
        $manager->persist($city_2334);


        $city_2335 = new City();
        $city_2335->setRegion($region_15);
        $city_2335->setName("Черноморское");
        $manager->persist($city_2335);


        $city_2336 = new City();
        $city_2336->setRegion($region_21);
        $city_2336->setName("Черноморьевка");
        $manager->persist($city_2336);


        $city_2337 = new City();
        $city_2337->setRegion($region_7);
        $city_2337->setName("Чернотисов");
        $manager->persist($city_2337);


        $city_2338 = new City();
        $city_2338->setRegion($region_16);
        $city_2338->setName("Чернухи");
        $manager->persist($city_2338);


        $city_2339 = new City();
        $city_2339->setRegion($region_22);
        $city_2339->setName("Черный остров");
        $manager->persist($city_2339);


        $city_2340 = new City();
        $city_2340->setRegion($region_21);
        $city_2340->setName("Чернянка");
        $manager->persist($city_2340);


        $city_2341 = new City();
        $city_2341->setRegion($region_9);
        $city_2341->setName("Чернятин");
        $manager->persist($city_2341);


        $city_2342 = new City();
        $city_2342->setRegion($region_6);
        $city_2342->setName("Черняхов");
        $manager->persist($city_2342);


        $city_2343 = new City();
        $city_2343->setRegion($region_11);
        $city_2343->setName("Черняховка");
        $manager->persist($city_2343);


        $city_2344 = new City();
        $city_2344->setRegion($region_25);
        $city_2344->setName("Чертория");
        $manager->persist($city_2344);


        $city_2345 = new City();
        $city_2345->setRegion($region_16);
        $city_2345->setName("Чечелево");
        $manager->persist($city_2345);


        $city_2346 = new City();
        $city_2346->setRegion($region_2);
        $city_2346->setName("Чечельник");
        $manager->persist($city_2346);


        $city_2347 = new City();
        $city_2347->setRegion($region_23);
        $city_2347->setName("Чигирин");
        $manager->persist($city_2347);


        $city_2348 = new City();
        $city_2348->setRegion($region_6);
        $city_2348->setName("Чижовка");
        $manager->persist($city_2348);


        $city_2349 = new City();
        $city_2349->setRegion($region_7);
        $city_2349->setName("Чинадиево");
        $manager->persist($city_2349);


        $city_2350 = new City();
        $city_2350->setRegion($region_1);
        $city_2350->setName("Чистенькое");
        $manager->persist($city_2350);


        $city_2351 = new City();
        $city_2351->setRegion($region_1);
        $city_2351->setName("Чистополье");
        $manager->persist($city_2351);


        $city_2352 = new City();
        $city_2352->setRegion($region_4);
        $city_2352->setName("Чкаловка");
        $manager->persist($city_2352);


        $city_2353 = new City();
        $city_2353->setRegion($region_1);
        $city_2353->setName("Чкалово");
        $manager->persist($city_2353);


        $city_2354 = new City();
        $city_2354->setRegion($region_4);
        $city_2354->setName("Чкалово");
        $manager->persist($city_2354);


        $city_2355 = new City();
        $city_2355->setRegion($region_21);
        $city_2355->setName("Чкалово");
        $manager->persist($city_2355);


        $city_2356 = new City();
        $city_2356->setRegion($region_20);
        $city_2356->setName("Чкаловское");
        $manager->persist($city_2356);


        $city_2357 = new City();
        $city_2357->setRegion($region_12);
        $city_2357->setName("Чмыровка");
        $manager->persist($city_2357);


        $city_2358 = new City();
        $city_2358->setRegion($region_7);
        $city_2358->setName("Чома");
        $manager->persist($city_2358);


        $city_2359 = new City();
        $city_2359->setRegion($region_7);
        $city_2359->setName("Чоп");
        $manager->persist($city_2359);


        $city_2360 = new City();
        $city_2360->setRegion($region_6);
        $city_2360->setName("Чоповичи");
        $manager->persist($city_2360);


        $city_2361 = new City();
        $city_2361->setRegion($region_19);
        $city_2361->setName("Чортков");
        $manager->persist($city_2361);


        $city_2362 = new City();
        $city_2362->setRegion($region_10);
        $city_2362->setName("Чубинское");
        $manager->persist($city_2362);


        $city_2363 = new City();
        $city_2363->setRegion($region_20);
        $city_2363->setName("Чугуев");
        $manager->persist($city_2363);


        $city_2364 = new City();
        $city_2364->setRegion($region_6);
        $city_2364->setName("Чуднов");
        $manager->persist($city_2364);


        $city_2365 = new City();
        $city_2365->setRegion($region_13);
        $city_2365->setName("Чуква");
        $manager->persist($city_2365);


        $city_2366 = new City();
        $city_2366->setRegion($region_4);
        $city_2366->setName("Чумаки");
        $manager->persist($city_2366);


        $city_2367 = new City();
        $city_2367->setRegion($region_18);
        $city_2367->setName("Чупаховка");
        $manager->persist($city_2367);


        $city_2368 = new City();
        $city_2368->setRegion($region_16);
        $city_2368->setName("Чутово");
        $manager->persist($city_2368);


        $city_2369 = new City();
        $city_2369->setRegion($region_13);
        $city_2369->setName("Шабельня");
        $manager->persist($city_2369);


        $city_2370 = new City();
        $city_2370->setRegion($region_15);
        $city_2370->setName("Шабо");
        $manager->persist($city_2370);


        $city_2371 = new City();
        $city_2371->setRegion($region_7);
        $city_2371->setName("Шаланки");
        $manager->persist($city_2371);


        $city_2372 = new City();
        $city_2372->setRegion($region_18);
        $city_2372->setName("Шалыгино");
        $manager->persist($city_2372);


        $city_2373 = new City();
        $city_2373->setRegion($region_10);
        $city_2373->setName("Шамраевка");
        $manager->persist($city_2373);


        $city_2374 = new City();
        $city_2374->setRegion($region_2);
        $city_2374->setName("Шаргород");
        $manager->persist($city_2374);


        $city_2375 = new City();
        $city_2375->setRegion($region_22);
        $city_2375->setName("Шаровечка");
        $manager->persist($city_2375);


        $city_2376 = new City();
        $city_2376->setRegion($region_18);
        $city_2376->setName("Шатрище");
        $manager->persist($city_2376);


        $city_2377 = new City();
        $city_2377->setRegion($region_6);
        $city_2377->setName("Шахворостовка");
        $manager->persist($city_2377);


        $city_2378 = new City();
        $city_2378->setRegion($region_5);
        $city_2378->setName("Шахтерск");
        $manager->persist($city_2378);


        $city_2379 = new City();
        $city_2379->setRegion($region_12);
        $city_2379->setName("Шахтерское");
        $manager->persist($city_2379);


        $city_2380 = new City();
        $city_2380->setRegion($region_5);
        $city_2380->setName("Шахтное");
        $manager->persist($city_2380);


        $city_2381 = new City();
        $city_2381->setRegion($region_3);
        $city_2381->setName("Шацк");
        $manager->persist($city_2381);


        $city_2382 = new City();
        $city_2382->setRegion($region_6);
        $city_2382->setName("Швайковка");
        $manager->persist($city_2382);


        $city_2383 = new City();
        $city_2383->setRegion($region_20);
        $city_2383->setName("Шевченково");
        $manager->persist($city_2383);


        $city_2384 = new City();
        $city_2384->setRegion($region_20);
        $city_2384->setName("Шевченково");
        $manager->persist($city_2384);


        $city_2385 = new City();
        $city_2385->setRegion($region_8);
        $city_2385->setName("Шевченково");
        $manager->persist($city_2385);


        $city_2386 = new City();
        $city_2386->setRegion($region_15);
        $city_2386->setName("Шевченково");
        $manager->persist($city_2386);


        $city_2387 = new City();
        $city_2387->setRegion($region_20);
        $city_2387->setName("Шелестово");
        $manager->persist($city_2387);


        $city_2388 = new City();
        $city_2388->setRegion($region_20);
        $city_2388->setName("Шелудьковка");
        $manager->persist($city_2388);


        $city_2389 = new City();
        $city_2389->setRegion($region_7);
        $city_2389->setName("Шенборн");
        $manager->persist($city_2389);


        $city_2390 = new City();
        $city_2390->setRegion($region_3);
        $city_2390->setName("Шепель");
        $manager->persist($city_2390);


        $city_2391 = new City();
        $city_2391->setRegion($region_22);
        $city_2391->setName("Шепетовка");
        $manager->persist($city_2391);


        $city_2392 = new City();
        $city_2392->setRegion($region_11);
        $city_2392->setName("Шестаковка");
        $manager->persist($city_2392);


        $city_2393 = new City();
        $city_2393->setRegion($region_24);
        $city_2393->setName("Шестовица");
        $manager->persist($city_2393);


        $city_2394 = new City();
        $city_2394->setRegion($region_9);
        $city_2394->setName("Шешоры");
        $manager->persist($city_2394);


        $city_2395 = new City();
        $city_2395->setRegion($region_10);
        $city_2395->setName("Шибене");
        $manager->persist($city_2395);


        $city_2396 = new City();
        $city_2396->setRegion($region_2);
        $city_2396->setName("Широкая гребля");
        $manager->persist($city_2396);


        $city_2397 = new City();
        $city_2397->setRegion($region_8);
        $city_2397->setName("Широкое");
        $manager->persist($city_2397);


        $city_2398 = new City();
        $city_2398->setRegion($region_4);
        $city_2398->setName("Широкое");
        $manager->persist($city_2398);


        $city_2399 = new City();
        $city_2399->setRegion($region_21);
        $city_2399->setName("Широкое");
        $manager->persist($city_2399);


        $city_2400 = new City();
        $city_2400->setRegion($region_8);
        $city_2400->setName("Широкое");
        $manager->persist($city_2400);


        $city_2401 = new City();
        $city_2401->setRegion($region_15);
        $city_2401->setName("Ширяево");
        $manager->persist($city_2401);


        $city_2402 = new City();
        $city_2402->setRegion($region_16);
        $city_2402->setName("Шишаки");
        $manager->persist($city_2402);


        $city_2403 = new City();
        $city_2403->setRegion($region_10);
        $city_2403->setName("Шкаровка");
        $manager->persist($city_2403);


        $city_2404 = new City();
        $city_2404->setRegion($region_13);
        $city_2404->setName("Шкло");
        $manager->persist($city_2404);


        $city_2405 = new City();
        $city_2405->setRegion($region_16);
        $city_2405->setName("Шкурупиевка");
        $manager->persist($city_2405);


        $city_2406 = new City();
        $city_2406->setRegion($region_19);
        $city_2406->setName("Шляхтинцы");
        $manager->persist($city_2406);


        $city_2407 = new City();
        $city_2407->setRegion($region_4);
        $city_2407->setName("Шолохово");
        $manager->persist($city_2407);


        $city_2408 = new City();
        $city_2408->setRegion($region_18);
        $city_2408->setName("Шостка");
        $manager->persist($city_2408);


        $city_2409 = new City();
        $city_2409->setRegion($region_17);
        $city_2409->setName("Шпанов");
        $manager->persist($city_2409);


        $city_2410 = new City();
        $city_2410->setRegion($region_25);
        $city_2410->setName("Шпетки");
        $manager->persist($city_2410);


        $city_2411 = new City();
        $city_2411->setRegion($region_2);
        $city_2411->setName("Шпиков");
        $manager->persist($city_2411);


        $city_2412 = new City();
        $city_2412->setRegion($region_23);
        $city_2412->setName("Шпола");
        $manager->persist($city_2412);


        $city_2413 = new City();
        $city_2413->setRegion($region_23);
        $city_2413->setName("Шрамковка");
        $manager->persist($city_2413);


        $city_2414 = new City();
        $city_2414->setRegion($region_17);
        $city_2414->setName("Шубков");
        $manager->persist($city_2414);


        $city_2415 = new City();
        $city_2415->setRegion($region_19);
        $city_2415->setName("Шумск");
        $manager->persist($city_2415);


        $city_2416 = new City();
        $city_2416->setRegion($region_1);
        $city_2416->setName("Щебетовка");
        $manager->persist($city_2416);


        $city_2417 = new City();
        $city_2417->setRegion($region_1);
        $city_2417->setName("Щелкино");
        $manager->persist($city_2417);


        $city_2418 = new City();
        $city_2418->setRegion($region_16);
        $city_2418->setName("Щербани");
        $manager->persist($city_2418);


        $city_2419 = new City();
        $city_2419->setRegion($region_13);
        $city_2419->setName("Щирец");
        $manager->persist($city_2419);


        $city_2420 = new City();
        $city_2420->setRegion($region_24);
        $city_2420->setName("Щорс");
        $manager->persist($city_2420);


        $city_2421 = new City();
        $city_2421->setRegion($region_6);
        $city_2421->setName("Щорсовка");
        $manager->persist($city_2421);


        $city_2422 = new City();
        $city_2422->setRegion($region_21);
        $city_2422->setName("Щорсовка");
        $manager->persist($city_2422);


        $city_2423 = new City();
        $city_2423->setRegion($region_8);
        $city_2423->setName("Энергодар");
        $manager->persist($city_2423);


        $city_2424 = new City();
        $city_2424->setRegion($region_20);
        $city_2424->setName("Эсхар");
        $manager->persist($city_2424);


        $city_2425 = new City();
        $city_2425->setRegion($region_4);
        $city_2425->setName("Юбилейное");
        $manager->persist($city_2425);


        $city_2426 = new City();
        $city_2426->setRegion($region_12);
        $city_2426->setName("Юбилейное");
        $manager->persist($city_2426);


        $city_2427 = new City();
        $city_2427->setRegion($region_12);
        $city_2427->setName("Южная ломоватка");
        $manager->persist($city_2427);


        $city_2428 = new City();
        $city_2428->setRegion($region_14);
        $city_2428->setName("Южноукраинск");
        $manager->persist($city_2428);


        $city_2429 = new City();
        $city_2429->setRegion($region_15);
        $city_2429->setName("Южный");
        $manager->persist($city_2429);


        $city_2430 = new City();
        $city_2430->setRegion($region_2);
        $city_2430->setName("Юзефо-Николаевка");
        $manager->persist($city_2430);


        $city_2431 = new City();
        $city_2431->setRegion($region_5);
        $city_2431->setName("Юнокоммунаровск");
        $manager->persist($city_2431);


        $city_2432 = new City();
        $city_2432->setRegion($region_22);
        $city_2432->setName("Юркивцы с.");
        $manager->persist($city_2432);


        $city_2433 = new City();
        $city_2433->setRegion($region_10);
        $city_2433->setName("Юрковка");
        $manager->persist($city_2433);


        $city_2434 = new City();
        $city_2434->setRegion($region_10);
        $city_2434->setName("Юровка с.");
        $manager->persist($city_2434);


        $city_2435 = new City();
        $city_2435->setRegion($region_5);
        $city_2435->setName("Юрьевка");
        $manager->persist($city_2435);


        $city_2436 = new City();
        $city_2436->setRegion($region_12);
        $city_2436->setName("Юрьевка");
        $manager->persist($city_2436);


        $city_2437 = new City();
        $city_2437->setRegion($region_4);
        $city_2437->setName("Юрьевка");
        $manager->persist($city_2437);


        $city_2438 = new City();
        $city_2438->setRegion($region_6);
        $city_2438->setName("Яблонец");
        $manager->persist($city_2438);


        $city_2439 = new City();
        $city_2439->setRegion($region_9);
        $city_2439->setName("Яблоница");
        $manager->persist($city_2439);


        $city_2440 = new City();
        $city_2440->setRegion($region_9);
        $city_2440->setName("Яблонов");
        $manager->persist($city_2440);


        $city_2441 = new City();
        $city_2441->setRegion($region_13);
        $city_2441->setName("Яворов");
        $manager->persist($city_2441);


        $city_2442 = new City();
        $city_2442->setRegion($region_10);
        $city_2442->setName("Яготин");
        $manager->persist($city_2442);


        $city_2443 = new City();
        $city_2443->setRegion($region_5);
        $city_2443->setName("Яковлевка");
        $manager->persist($city_2443);


        $city_2444 = new City();
        $city_2444->setRegion($region_2);
        $city_2444->setName("Якушинцы");
        $manager->persist($city_2444);


        $city_2445 = new City();
        $city_2445->setRegion($region_1);
        $city_2445->setName("Ялта");
        $manager->persist($city_2445);


        $city_2446 = new City();
        $city_2446->setRegion($region_5);
        $city_2446->setName("Ялта");
        $manager->persist($city_2446);


        $city_2447 = new City();
        $city_2447->setRegion($region_2);
        $city_2447->setName("Ялтушков");
        $manager->persist($city_2447);


        $city_2448 = new City();
        $city_2448->setRegion($region_9);
        $city_2448->setName("Ямница");
        $manager->persist($city_2448);


        $city_2449 = new City();
        $city_2449->setRegion($region_22);
        $city_2449->setName("Ямполь");
        $manager->persist($city_2449);


        $city_2450 = new City();
        $city_2450->setRegion($region_18);
        $city_2450->setName("Ямполь");
        $manager->persist($city_2450);


        $city_2451 = new City();
        $city_2451->setRegion($region_2);
        $city_2451->setName("Ямполь");
        $manager->persist($city_2451);


        $city_2452 = new City();
        $city_2452->setRegion($region_13);
        $city_2452->setName("Ямполь");
        $manager->persist($city_2452);


        $city_2453 = new City();
        $city_2453->setRegion($region_1);
        $city_2453->setName("Янтарное");
        $manager->persist($city_2453);


        $city_2454 = new City();
        $city_2454->setRegion($region_9);
        $city_2454->setName("Яремча");
        $manager->persist($city_2454);


        $city_2455 = new City();
        $city_2455->setRegion($region_16);
        $city_2455->setName("Яреськи");
        $manager->persist($city_2455);


        $city_2456 = new City();
        $city_2456->setRegion($region_22);
        $city_2456->setName("Ярмолинцы");
        $manager->persist($city_2456);


        $city_2457 = new City();
        $city_2457->setRegion($region_23);
        $city_2457->setName("Ярославка");
        $manager->persist($city_2457);


        $city_2458 = new City();
        $city_2458->setRegion($region_23);
        $city_2458->setName("Ярошевка");
        $manager->persist($city_2458);


        $city_2459 = new City();
        $city_2459->setRegion($region_6);
        $city_2459->setName("Ярунь");
        $manager->persist($city_2459);


        $city_2460 = new City();
        $city_2460->setRegion($region_12);
        $city_2460->setName("Ясеновский");
        $manager->persist($city_2460);


        $city_2461 = new City();
        $city_2461->setRegion($region_13);
        $city_2461->setName("Ясеновцы");
        $manager->persist($city_2461);


        $city_2462 = new City();
        $city_2462->setRegion($region_5);
        $city_2462->setName("Ясиноватая");
        $manager->persist($city_2462);


        $city_2463 = new City();
        $city_2463->setRegion($region_7);
        $city_2463->setName("Ясиня");
        $manager->persist($city_2463);


        $city_2464 = new City();
        $city_2464->setRegion($region_17);
        $city_2464->setName("Ясногорка");
        $manager->persist($city_2464);


        $city_2465 = new City();
        $city_2465->setRegion($region_10);
        $city_2465->setName("Ясногородка");
        $manager->persist($city_2465);


        $city_2466 = new City();
        $city_2466->setRegion($region_1);
        $city_2466->setName("Ясное");
        $manager->persist($city_2466);

        $manager->flush();
    }

}