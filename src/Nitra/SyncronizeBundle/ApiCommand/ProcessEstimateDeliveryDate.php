<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

/**
 * processEstimateDeliveryDate
 * расчет времени доставки 
 */
class ProcessEstimateDeliveryDate extends ApiCommand
{
    
    /**
     * @var Nitra\DeliveryBundle\Entity\Delivery $delivery - ТК
     */
    private $delivery;
    
    /**
     * @var array $fromCities - массив городов отправителей
     */
    private $fromCities;
        
    /**
     * @var Nitra\GeoBundle\Entity\City $toCity - город получатель заказа
     */
    private $toCity;
    
    /**
     * {@inheritDoc}
     */
    public function validateApi()
    {
        
        // получить массив параметров
        $parameters = $this->getParameters();
        
        // проверить город отправитель
        if (!isset($parameters['fromCityIds']) || !$parameters['fromCityIds']) {
            return 'Не указан обязательный параметр: fromCityIds - массив ID городов отправителей.';
        }
        
        // преобразовать город отправитель в массив
        if (!is_array($parameters['fromCityIds'])) {
            $parameters['fromCityIds'] = array($parameters['fromCityIds']);
        }
        
        // получить города отправители 
        $this->fromCities = $this->getEntityManager()->getRepository('NitraGeoBundle:City')->findBy(array(
            'id' => $parameters['fromCityIds']
        ));
        
        // проверить города отправители 
        if (!$this->fromCities) {
            return "Не найдены города отпраители fromCityIds: ".implode(',', $parameters['fromCityIds']).".";
        }
        
        // проверить город получатель
        if (!isset($parameters['toCityId']) || !$parameters['toCityId']) {
            return 'Не указан обязательный параметр: toCityId - ID города получателя.';
        }
        
        // получить город получаель
        $this->toCity = $this->getEntityManager()->getRepository('NitraGeoBundle:City')->find($parameters['toCityId']);
        if (!$this->toCity) {
            return "Не найден город получатель toCityId: ".$parameters['toCityId'].".";
        }
        
        // проверить ТК
        if (!isset($parameters['deliveryId']) || !$parameters['deliveryId']) {
            return 'Не указан обязательный параметр: deliveryId - ТК.';
        }
        
        // получить ТК
        $this->delivery = $this->getEntityManager()->getRepository('NitraDeliveryBundle:Delivery')->find($parameters['deliveryId']);
        if (!$this->delivery) {
            return "Не найдена ТК deliveryID: ".$parameters['deliveryId'].".";
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
        
        
        
    }
    
}
