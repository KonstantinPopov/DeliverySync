<?php
namespace Nitra\SyncronizeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\Common\Inflector\Inflector;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nitra\DeliveryBundle\Entity\Client;

/**
 * SyncController
 * Контроллер синхронизации
 */
class SyncController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    // ID страны Украина
    private static $countryIdUA = 1;
    
    /**
     * синхронизировать географию 
     * @Route("/sync/{token}", name="Nitra_SyncronizeBundle_Syncronize")
     * @return JsonResponse
     */
    // @ParamConverter("client", class="NitraDeliveryBundle:Client", options={"token" = "token"})
    // не используем @ParamConverter для того что бы корректно вернуть в таск error клиент не найден
    public function syncAction(Request $request)
    {
        
        // проверить токен авторизации клиента
        if (!$request->get('token', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указан токен авторизации клиента."));
        }
        
        // получить клиента
        $client = $this->em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array('token' => $request->get('token')));
        if (!$client) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Клиент не найден."));
        }
        
        
        // проверить команду синхронизации
        if (!$request->get('command', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указана команда."));
        }
        
        // название метода обработчика API команды
        $methodProcessApi = Inflector::camelize('processApi_' .$request->get('command'));
        if (!method_exists($this, $methodProcessApi)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не найдена команда API: ".$methodProcessApi."."));
        }
        
        // параметры выполненения синхронизации
        $options = $request->get('options', null);
        
        // попытка выполнить команду
        try {
            // выполнить команду
            $syncResult = $this->$methodProcessApi($client, $options);
            
        } catch (\Exception $e) {
            // вернуть ошибку выполенения команды
            return new JsonResponse(array('type'=> 'error', 'message'=> $e->getMessage()));
        }
        
        // команда выполнена успешно
        $syncResult['type'] = 'success';
        return new JsonResponse($syncResult);
    }
    
    /**
     * выполнить синхронизацию географии
     * @param Client $client - клиент по которому проходит синхронизация 
     * @param array $options массив параметров синхронизации
     * @throw Exception - ошибка синхронизации
     * @return mixed $syncResult - результат синхронизации
     */
    protected function processApiSyncronizeGeo(Client $client, array $options=null)
    {
        
//        // отключаем фильтр удаленных сушностей
//        $this->em->getFilters()->disable('softdeleteable');
        
        // результируюший массив ответа
        $syncResult = array();
        
        // получить регионы 
        // по стране  Украина
        $geoRegions = $this->em
            ->createQueryBuilder()
            ->select('region, country')
            ->from('NitraGeoBundle:Region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', self::$countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив регионов 
        $syncResult['regions'] = array();
        foreach($geoRegions as $region) {
            $syncResult['regions'][$region['id']] = array(
                'id' => $region['id'],
                'name' => $region['name'],
//                'isActive' => ($region['deletedAt']) ? false : true,
            );
        }
        
        // получить города
        $geoCities = $this->em
            ->createQueryBuilder()
            ->select('city, region, country')
            ->from('NitraGeoBundle:City', 'city')
            ->innerJoin('city.region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', self::$countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив городов
        $syncResult['cities'] = array();
        foreach($geoCities as $city) {
            $syncResult['cities'][$city['id']] = array(
                'id' => $city['id'],
                'regionId' => $city['region']['id'],
                'name' => $city['name'],
//                'isActive' => ($city['deletedAt']) ? false : true,
            );
        }
        
        // вернуть результат Geo синхронизации
        $syncResult['message'] = 'Данные синхронизации географии получены успешно.';
        return $syncResult;
    }
    
    /**
     * выполнить синхронизацию складов
     * @param Client $client - клиент по которому проходит синхронизация 
     * @param array $options массив параметров синхронизации
     * @throw Exception - ошибка синхронизации
     * @return mixed $syncResult - результат синхронизации
     */
    protected function processApiSyncronizeWarehouses(Client $client, array $options=null)
    {
        
        // массив ID ТК клиента
        $deliveryIds = array();
        foreach($client->getDeliveries() as $delivery) {
            $deliveryIds[] = $delivery->getId();
        }
        
        // проверить выбранные ТК для клиента
        if (!$deliveryIds) {
            throw new \Exception("Для клиента \"".(string)$client."\" не установлена ни одна транспортная компания.");
        }
        
//        // отключаем фильтр удаленных сушностей
//        $this->em->getFilters()->disable('softdeleteable');
        
        // запрос получения складов
        $queryWarehouses = $this->em
            ->createQueryBuilder()
            ->select('w.id, w.number, w.name, w.address, w.phone, w.latitude, w.longitude')
            ->addSelect('d.id AS deliveryId, d.name AS deliveryName')
            ->addSelect('geoCountry.id AS countryId, geoCountry.name AS countryName')
            ->addSelect('geoRegion.id AS regionId, geoRegion.name AS regionName')
            ->addSelect('geoCity.id AS cityId, geoCity.name AS cityName')
            ->from('NitraDeliveryBundle:Warehouse', 'w', 'w.id')
            ->innerJoin('w.delivery', 'd')
            ->innerJoin('w.city', 'city')
            ->innerJoin('city.geoCity', 'geoCity')
            ->innerJoin('geoCity.region', 'geoRegion')
            ->innerJoin('geoRegion.country', 'geoCountry')
            ->where('d.id IN(:deliveryIds)')->setParameter('deliveryIds', $deliveryIds)
            ;
        
        // докдеить в запрос ID ТК 
        if ($options && isset($options['deliveryId']) && $options['deliveryId']) {
            $queryWarehouses
                ->andWhere('d.id = :deliveryId')->setParameter('deliveryId', $options['deliveryId']);
        }
        
        // получить массив сущностей складов
        $warehouses = $queryWarehouses
            ->getQuery()
            ->getArrayResult();
        
        // вернуть результат синхронизации складов
        return array(
            'warehouses' => $warehouses,
            'message' => 'Данные синхронизации складов получены успешно.',
        );
    }
    
}
