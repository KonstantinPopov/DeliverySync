<?php
namespace Nitra\SyncronizeBundle\ApiCommandOld;

/**
 * ProcessSyncronizeWarehouses
 * Синхронизация складов
 */
class ProcessSyncronizeWarehouses extends ApiCommand
{
    
    /**
     * @var array массив ID ТК клиента
     */
    private $deliveryIds;

    /**
     * {@inheritDoc}
     */
    public function validateApi()
    {
        
        // массив ID ТК клиента
        $this->deliveryIds = array();
        foreach($this->getClient()->getDeliveries() as $delivery) {
            $this->deliveryIds[] = $delivery->getId();
        }
        
        // проверить выбранные ТК для клиента
        if (!$this->deliveryIds) {
            return "Для клиента \"".(string)$this->getClient()."\" не установлена ни одна транспортная компания.";
        }
        
        // валидация пройдена
        return false;
    }
    
    /**
     * {@inheritDoc}
     */
    public function processApi()
    {
        
        // валидировать команду
        $errorMessage = $this->validateApi();
        if ($errorMessage) {
            // валидация не пройдена
            throw new \Exception($errorMessage);
        }
        
        // запрос получения складов
        $queryWarehouses = $this->getEntityManager()
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
            ->where('d.id IN(:deliveryIds)')->setParameter('deliveryIds', $this->deliveryIds)
            ;
        
        // получить массив параметров
        $parameters = $this->getParameters();
        
        // доклеить в запрос ID ТК 
        if (isset($parameters['deliveryId']) && $parameters['deliveryId']) {
            $queryWarehouses
                ->andWhere('d.id = :deliveryId')->setParameter('deliveryId', $parameters['deliveryId']);
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
