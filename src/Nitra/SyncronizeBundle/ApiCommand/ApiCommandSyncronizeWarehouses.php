<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

/**
 * Синхронизация складов
 * ApiCommandSyncronizeWarehouses
 */
class ApiCommandSyncronizeWarehouses extends ApiCommand
{
    
    /**
     * @var array массив ID ТК клиента
     */
    private $deliveryIds;
    
    /**
     * @var array ТК синхронизации
     */
    private $delivery;
    
    /**
     * {@inheritDoc}
     */
    public function validateCommand()
    {
        
        // массив ID ТК клиента
        $this->deliveryIds = array();
        foreach($this->getClient()->getDeliveries() as $delivery) {
            $this->deliveryIds[] = $delivery->getId();
        }
        
        // проверить выбранные ТК для клиента
        if (!$this->deliveryIds) {
            return "Для клиента \"".(string)$this->getClient()."\" не установлена ни одна ТК.";
        }
        
        // проверить синхронизация склдаов по отдельной ТК
        if ($this->hasParameter('deliveryId') && $this->getParameter('deliveryId')) {
            
            // получить ТК по которой синхронизируются склады
            $this->delivery = $this->em
                ->getRepository('NitraDeliveryBundle:Delivery')
                ->find($this->getParameter('deliveryId'));
            
            // проверить ТК 
            if (!$this->delivery) {
                return "ТК по указанному ID: ".$this->getParameter('deliveryId')." не найдена.";
            }
            
            // проверить установлена ли ТК для клиента
            if (!in_array($this->getParameter('deliveryId'), $this->deliveryIds)) {
                return 'Для клиента "'.(string)$this->getClient().'" не установлена ТК "'.(string)$this->delivery.'".';
            }
        }
        
        // валидация пройдена
        return false;
    }
    
    /**
     * {@inheritDoc}
     */
    public function processCommand()
    {
        
        // валидировать команду
        $errorMessage = $this->validateCommand();
        if ($errorMessage) {
            // валидация не пройдена
            throw new \Exception($errorMessage);
        }
        
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
            ->where('d.id IN(:deliveryIds)')->setParameter('deliveryIds', $this->deliveryIds)
            ->andWhere('w.address != :emptyAddress')->setParameter('emptyAddress', '')
            ;
        
        // получить массив параметров
        $parameters = $this->getParameters();
        
        // доклеить в запрос ID ТК 
        if ($this->delivery) {
            $queryWarehouses
                ->andWhere('d.id = :deliveryId')->setParameter('deliveryId', $this->delivery->getId());
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
