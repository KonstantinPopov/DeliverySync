<?php
namespace Nitra\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * FixturesController
 */
class FixturesController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * формироваие фикстур NitraGeoBundle:Country
     * @Route("/country", name="NitraGeoBundleFixtures_country")
     * @Template("NitraGeoBundle:Fixtures:index.html.twig")
     */
    public function countryAction()
    {
        // текст код для фикстуры
        $fixtureCode = '';
        
        // получить все
        $entities = $this->em->getRepository('NitraGeoBundle:Country')->findAll();
        
        // сформировать код фикстуры
        $i = 0;
        foreach($entities as $entity) {
            $fixtureCode .= "$"."country".$i . "= new \Nitra\GeoBundle\Entity\Country();\n";
            $fixtureCode .= "$"."country".$i . "->setId(".$entity->getId().");\n";
            $fixtureCode .= "$"."country".$i . "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "$"."manager->persist("."$"."country".$i."); \n";
            $fixtureCode .= "\n";
            $i++;
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "$"."manager->flush();\n";
        
        // вернуть массив данных передаваемых в шаблон 
        return array(
            'fixtureHeadline' => "Fixtures:Страны",
            'fixtureCode' => $fixtureCode,
        );
    }
    
    /**
     * формироваие фикстур NitraGeoBundle:Region
     * @Route("/region", name="NitraGeoBundleFixtures_region")
     * @Template("NitraGeoBundle:Fixtures:index.html.twig")
     */
    public function regionAction()
    {
        // текст код для фикстуры
        $fixtureCode = '';
        
        // получить все
        $entities = $this->em->getRepository('NitraGeoBundle:Region')->findAll();
        
        // сформировать код фикстуры
        $i = 0;
        foreach($entities as $entity) {
            $fixtureCode .= "$"."region".$i . "= new \Nitra\GeoBundle\Entity\Region();\n";
            $fixtureCode .= "$"."region".$i . "->setId(".$entity->getId().");\n";
            $fixtureCode .= "$"."region".$i . "->setCountry($"."manager->getRepository('NitraGeoBundle:Country')->find(".$entity->getCountry()->getId().")); \n";
            $fixtureCode .= "$"."region".$i . "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "$"."manager->persist("."$"."region".$i."); \n";
            $fixtureCode .= "\n";
            $i++;
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "$"."manager->flush();\n";
        
        // вернуть массив данных передаваемых в шаблон 
        return array(
            'fixtureHeadline' => "Fixtures:Регионы",
            'fixtureCode' => $fixtureCode,
        );
    }
    
    /**
     * формироваие фикстур NitraGeoBundle:City
     * @Route("/city", name="NitraGeoBundleFixtures_city")
     * @Template("NitraGeoBundle:Fixtures:index.html.twig")
     */
    public function cityAction()
    {
        // текст код для фикстуры
        $fixtureCode = '';
        
        // получить все
        $entities = $this->em->getRepository('NitraGeoBundle:City')->findAll();
        
        // сформировать код фикстуры
        $i = 0;
        foreach($entities as $entity) {
            $fixtureCode .= "$"."region".$i . "= new \Nitra\GeoBundle\Entity\City();\n";
            $fixtureCode .= "$"."region".$i . "->setId(".$entity->getId().");\n";
            $fixtureCode .= "$"."region".$i . "->setRegion($"."manager->getRepository('NitraGeoBundle:Region')->find(".$entity->getRegion()->getId().")); \n";
            $fixtureCode .= "$"."region".$i . "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "$"."manager->persist("."$"."region".$i."); \n";
            $fixtureCode .= "\n";
            $i++;
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "$"."manager->flush();\n";
        
        // вернуть массив данных передаваемых в шаблон 
        return array(
            'fixtureHeadline' => "Fixtures:Города",
            'fixtureCode' => $fixtureCode,
        );
    }
    
    
}
