<?php
namespace Nitra\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * FixturesController
 */
class FixturesController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * @var string 
     * щаблон файла фикстуры
     */
    private static $fixtureTemplate = <<<EOF
<?php
namespace Nitra\GeoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Nitra\GeoBundle\Entity\[EntityName];

/**
 * Load[EntityName]Data
 */
class Load[EntityName]Data extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    
    /**
     * @var ContainerInterface
     */
    private [$]container;
    
    /**
     * @var \Doctrine\ORM\EntityManager [$]em
     */
    private [$]em;
        
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return [FixtureOrder]; // the order in which fixtures will be loaded
    }
    
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface [$]container = null)
    {
        // уствноыить контейнер
        [$]this->container = [$]container;
        
        // установить EntityManager
        [$]this->em = [$]this->container->get('doctrine')->getManager();
    }
        
        
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager [$]manager)
    {
        [fixtureCode]
    }
    
}
EOF;

    
    /**
     * Скачать фикстуры
     * @param string $fixtureCode  - код фикструр для скачивания
     * @param string $fileName - имя файла для скачивания
     * @return Response
     */
    public function downloadFixtires($fixtureCode, $fileName)
    {
        // создаь  $response
        $response = new Response();
        $response->headers->set('Expires', date('D, d M Y H:i:s').' GMT');
        $response->headers->set('Cache-Control', 'no-cache, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Last-Modified', gmdate( "D, d M Y H:i:s" ).' GMT');
        $response->headers->set('Content-type', 'text/plain');
        $response->headers->set('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setContent($fixtureCode);
        
        // вернуть $response
        return $response;
    }
    
    /**
     * Получить шаблон файла фикстуры
     * @return string
     */
    public function getFixtiresFileTemplate()
    {
        // создаь  $response
        $response = new Response();
        $response->headers->set('Expires', date('D, d M Y H:i:s').' GMT');
        $response->headers->set('Cache-Control', 'no-cache, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Last-Modified', gmdate( "D, d M Y H:i:s" ).' GMT');
        $response->headers->set('Content-type', 'text/plain');
        $response->headers->set('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setContent($fixtureCode);
        
        // вернуть $response
        return $response;
    }
    
    /**
     * формироваие фикстур NitraGeoBundle:Country
     * @Route("/country", name="Nitra_GeoBundle_Fixtures_country")
     */
    public function countryAction()
    {
        
        // текст код для фикстуры
        $fixtureCode = "\n";
        
        // получить все сортируем по ID по возрастанию
        $entities = $this->em->getRepository('NitraGeoBundle:Country')->findBy(array(), array('id' => 'ASC'));
        
        // сформировать код фикстуры
        foreach($entities as $entity) {
            $entityId = $entity->getId();
            $fixtureCode .= "\t\t$"."country".$entityId. " = new Country();\n";
            $fixtureCode .= "\t\t$"."country".$entityId. "->setId(".$entity->getId().");\n";
            $fixtureCode .= "\t\t$"."country".$entityId. "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "\t\t$"."manager->persist("."$"."country".$entityId."); \n";
            $fixtureCode .= "\n";
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "\t\t// сохранить \n";
        $fixtureCode .= "\t\t$"."manager->flush();\n";
        
        $fixtureFileContent = self::$fixtureTemplate;
        $fixtureFileContent = str_replace('[$]', '$', $fixtureFileContent);
        $fixtureFileContent = str_replace('[FixtureOrder]', 1, $fixtureFileContent);
        $fixtureFileContent = str_replace('[EntityName]', 'Country', $fixtureFileContent);
        $fixtureFileContent = str_replace('[fixtureCode]', $fixtureCode, $fixtureFileContent);
        
        // скачать фикстуры
        return $this->downloadFixtires($fixtureFileContent, 'LoadCountryData.php');
    }
    
    /**
     * формироваие фикстур NitraGeoBundle:Region
     * @Route("/region", name="Nitra_GeoBundle_Fixtures_region")
     */
    public function regionAction()
    {
        
        // текст код для фикстуры
        $fixtureCode = "\n";
        
        // получить все сортируем по ID по возрастанию
        $entities = $this->em->getRepository('NitraGeoBundle:Region')->findBy(array(), array('id' => 'ASC'));
        
        // сформировать код фикстуры
        foreach($entities as $entity) {
            $entityId = $entity->getId();
            $fixtureCode .= "\t\t$"."region".$entityId . "= new Region();\n";
            $fixtureCode .= "\t\t$"."region".$entityId . "->setId(".$entity->getId().");\n";
            $fixtureCode .= "\t\t$"."region".$entityId . "->setCountry($"."this->em->getReference('NitraGeoBundle:Country', ".$entity->getCountry()->getId().")); \n";
            $fixtureCode .= "\t\t$"."region".$entityId. "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "\t\t$"."manager->persist("."$"."region".$entityId."); \n";
            $fixtureCode .= "\n";
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "\t\t// сохранить \n";
        $fixtureCode .= "\t\t$"."manager->flush();\n";
        
        
        $fixtureFileContent = self::$fixtureTemplate;
        $fixtureFileContent = str_replace('[$]', '$', $fixtureFileContent);
        $fixtureFileContent = str_replace('[FixtureOrder]', 2, $fixtureFileContent);
        $fixtureFileContent = str_replace('[EntityName]', 'Region', $fixtureFileContent);
        $fixtureFileContent = str_replace('[fixtureCode]', $fixtureCode, $fixtureFileContent);
        
        // скачать фикстуры
        return $this->downloadFixtires($fixtureFileContent, 'LoadRegionData.php');
    }
    
    /**
     * формироваие фикстур NitraGeoBundle:City
     * @Route("/city", name="Nitra_GeoBundle_Fixtures_city")
     */
    public function cityAction()
    {
        
        // текст код для фикстуры
        $fixtureCode = "\n";
        
        // получить все сортируем по ID по возрастанию
        $entities = $this->em->getRepository('NitraGeoBundle:City')->findBy(array(), array('id' => 'ASC'));
        
        // сформировать код фикстуры
        foreach($entities as $entity) {
            $entityId = $entity->getId();
            $fixtureCode .= "\t\t$"."city".$entityId . "= new City();\n";
            $fixtureCode .= "\t\t$"."city".$entityId . "->setId(".$entity->getId().");\n";
            $fixtureCode .= "\t\t$"."city".$entityId . "->setRegion($"."this->em->getReference('NitraGeoBundle:Region', ".$entity->getRegion()->getId().")); \n";
            $fixtureCode .= "\t\t$"."city".$entityId . "->setName('".addslashes($entity->getName())."');\n";
            $fixtureCode .= "\t\t$"."manager->persist("."$"."city".$entityId."); \n";
            $fixtureCode .= "\n";
        }
        
        // добавить в сохранение код фикстуры
        $fixtureCode .= "\t\t// сохранить \n";
        $fixtureCode .= "\t\t$"."manager->flush();\n";
        
        $fixtureFileContent = self::$fixtureTemplate;
        $fixtureFileContent = str_replace('[$]', '$', $fixtureFileContent);
        $fixtureFileContent = str_replace('[FixtureOrder]', 3, $fixtureFileContent);
        $fixtureFileContent = str_replace('[EntityName]', 'City', $fixtureFileContent);
        $fixtureFileContent = str_replace('[fixtureCode]', $fixtureCode, $fixtureFileContent);        
        
        // скачать фикстуры
        return $this->downloadFixtires($fixtureFileContent, 'LoadCityData.php');
    }
    
    
}
