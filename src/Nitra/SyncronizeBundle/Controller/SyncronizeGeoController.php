<?php
namespace Nitra\SyncronizeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Request;


use Nitra\DeliveryBundle\Entity\Client;

/**
 * SyncronizeGeoController
 * Синхронизация географии 
 */
class SyncronizeGeoController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * синхронизировать географию 
     * @Route("/syncronize-geo/{token}", name="Nitra_SyncronizeBundle_Syncronize_Geo")
     * @ParamConverter("client", class="NitraDeliveryBundle:Client", options={"token" = "token"})
     */
    public function syncronizeGeoAction(Client $client)
    {
        
        // ID страны Украина
        $countryIdUA = 1;
        
        // результируюший массив ответа
        $result = array();
        
        // отключаем фильтр удаленных сушностей
        $this->em->getFilters()->disable('softdeleteable');
        
        // получить регионы 
        // по стране  Украина ($countryIdUA)
        $geoRegions = $this->em
            ->createQueryBuilder()
            ->select('region, country')
            ->from('NitraGeoBundle:Region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', $countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив регионов 
        $result['regions'] = array();
        foreach($geoRegions as $region) {
            $result['regions'][$region['id']] = array(
                'id' => $region['id'],
                'name' => $region['name'],
                'isActive' => ($region['deletedAt']) ? false : true,
            );
        }
        
        // получить города
        $geoCities = $this->em
            ->createQueryBuilder()
            ->select('city, region, country')
            ->from('NitraGeoBundle:City', 'city')
            ->innerJoin('city.region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', $countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив городов
        $result['cities'] = array();
        foreach($geoCities as $city) {
            $result['cities'][$city['id']] = array(
                'id' => $city['id'],
                'regionId' => $city['region']['id'],
                'name' => $city['name'],
                'isActive' => ($city['deletedAt']) ? false : true,
            );
        }
        
        // вернуть результат Geo синхронизации
        return new JsonResponse($result);
    }
    
}
