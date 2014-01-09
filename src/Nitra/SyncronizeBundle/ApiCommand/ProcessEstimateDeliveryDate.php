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
     * @var array $tkFromCities - массив городов NitraDeliveryBundle:City ТК отправителей
     */
    private $tkFromCities;
        
    /**
     * @var NitraDeliveryBundle:City $tkToCity - город ТК получатель заказа
     */
    private $tkToCity;
    
    /**
     * {@inheritDoc}
     */
    public function validateApi()
    {
        
        // получить массив параметров
        $parameters = $this->getParameters();
        
        // проверить ТК
        if (!isset($parameters['deliveryId']) || !$parameters['deliveryId']) {
            return 'Не указан обязательный параметр: deliveryId - ТК.';
        }
        
        // получить ТК
        $this->delivery = $this->getEntityManager()->getRepository('NitraDeliveryBundle:Delivery')->find($parameters['deliveryId']);
        if (!$this->delivery) {
            return "Не найдена ТК deliveryID: ".$parameters['deliveryId'].".";
        }
        
        // проверить город получатель
        if (!isset($parameters['toCityId']) || !$parameters['toCityId']) {
            return 'Не указан обязательный параметр: toCityId - ID города получателя.';
        }
        
        // получить город ТК получаель
        $this->tkToCity = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:City')
            ->findOneBy(array(
                'geoCity' => $this->getEntityManager()->getReference('NitraGeoBundle:City', $parameters['toCityId']),
                'delivery' => $this->delivery,
            ));
        if (!$this->tkToCity) {
            return "Не найден город получатель toCityId: ".$parameters['toCityId'].".";
        }
        
        // проверить город отправитель
        if (!isset($parameters['fromCityIds']) || !$parameters['fromCityIds']) {
            return 'Не указан обязательный параметр: fromCityIds - массив ID городов отправителей.';
        }
        
        // преобразовать город отправитель в массив
        if (!is_array($parameters['fromCityIds'])) {
            $parameters['fromCityIds'] = array($parameters['fromCityIds']);
        }
        
        // получить города отправители 
        $this->tkFromCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('geoCity.id, city.nameTk')
            ->from('NitraDeliveryBundle:City', 'city')
            ->innerJoin('city.geoCity', 'geoCity', 'WITH', 'geoCity.id IN(:geoCityIds)')->setParameter('geoCityIds', $parameters['fromCityIds'])
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->delivery)
            ->getQuery()
            ->execute(array(), 'KeyPair');
        
        // проверить города отправители 
        if (!$this->tkFromCities) {
            return "Не найдены города отпраители fromCityIds: ".implode(',', $parameters['fromCityIds']).".";
        }
        
        // получить параметры  из файла настроек
        $parameters = $this->getContainer()->getParameter('novaposhta');
        
        // установить параметр apiToken, авторизация в API ТК Новая Почта
        $this->setParameter('apiToken', $parameters['api_token']);
        
        // установить параметр apiUrl, ссылка синхронизации API ТК Новая Почта
        $this->setParameter('apiUrl', $parameters['api_url']);
        
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
        
        // в зависимости от ID ТК разные методы расчетеов
        switch($this->delivery->getId()) {
            
            // ТК Новая Почта
            case 1:
                $estimateDate = $this->novaposhtaEstimate();
                break;
            
            // по умолчанию не определен механизм расчета
            default:
                // ошибка
                throw new \Exception('Не определен механизм расчета времени доставки.');
                break;
        }
        
        // проверить дату расчета
        if ($estimateDate) {
            // вернуть результат рачета
            return array(
                'estimateDate' => $estimateDate,
                'message' => 'Дата расчета времени ьыла успешно получена.',
            );
        }
        
        // ошибка
        throw new \Exception('Дата расчета времени доставки не была получена.');
    }
    
    /**
     * Отправить запрос на сервер
     * @param string $xmlRequest - отправлемый xml запрос
     * @param string $xpath - xml xpath в xml ответе
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function novaposhtaApiSendRequest($xmlRequest, $xpath)
    {
        // отправить запрос на сервер 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getParameter('apiUrl'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $xmlResponse = curl_exec($ch);
        curl_close($ch);
        
        // преобразовать получить массив из xml ответа 
        // получить xml
        $xml = simplexml_load_string($xmlResponse);
        // проверить xml 
        if ($xml instanceof \SimpleXMLElement) {
            return $xml->xpath($xpath);
        }
        
        // $xmlResponse не xml формат преобразование в массив не возможно
        return null;
    }
    
    
    /**
     * расчет времени доставки ТК Новая Почта
     * @return timestamp - дата ориентировчной доставки
     */
    protected function novaposhtaEstimate()
    {
        
        // определить тип доставки 
        // тип доставки: 1 - Двері-Двері; 2 - Двері-Склад; 3 - Склад-Двері; 4 - Склад-Склад
        if ($this->hasParameter('deliveryTypeId')) {
            // установить параметр корорый пришел в запросе на расчет
            $deliveryTypeId = $this->hasParameter('deliveryTypeId');
            
        } elseif ($this->hasParameter('isDirect') && $this->getParameter('isDirect')) {
            // параметр не определен 
            // проверить параметр адресной доставки
            // если адресная доставка
            // доставка товара со склада ТК к покупателю на адрес
            $deliveryTypeId = 3;
            
        } else {
            // доставка товара на склад ТК
            $deliveryTypeId = 4;
        }
        
        // рачет для каждого города отправителя
        // формируем массив дата доставки в каждый город
        $estimatedDates = array();
        foreach($this->tkFromCities as $geoCityId => $nameTk ) {
            // xml запрос получения даты доставки
            $xmlRequest = '<?xml version="1.0" encoding="UTF-8"?>
                <file>
                    <auth>'.$this->getParameter('apiToken').'</auth>
                    <getEstimatedDeliveryDate>
                        <senderCity>'.(string)$nameTk.'</senderCity>
                        <recipientCity>'.(string)$this->tkToCity->getNameTk().'</recipientCity>
                        <date>'.(($this->hasParameter('deliveryDate')) ? $this->getParameter('deliveryDate') : date('d.m.Y')).'</date>
                        <deliveryTypeId>'.$deliveryTypeId.'</deliveryTypeId>
                        <satDelivery>'.(($this->hasParameter('deliveryAtSaturday') && $this->getParameter('deliveryAtSaturday')) ? "1" : "0").'</satDelivery>
                    </getEstimatedDeliveryDate>
                </file>';
            
            // отправить запрос на сервер ТК
            $estimateDate = $this->novaposhtaApiSendRequest($xmlRequest, '/file/estimatedDeliveryDate');
            
            // проверить ответ сервера
            if ($estimateDate && isset($estimateDate[0]) && $estimateDate[0]) {
                $date = \DateTime::createFromFormat('d.m.Y', (string)$estimateDate[0]);
                $estimatedDates[$geoCityId] = $date->getTimestamp();
            }
        }
        
        // отсортировать массив 
        // самая поздняя доставка будет первой
        if ($estimatedDates) {
            arsort($estimatedDates);
        }
        
        // вернуть timestamp доставки 
        if ($estimatedDates) {
            $array_values = array_values($estimatedDates);
            return $array_values[0];
        }
        
        // нет данных по расчету времени доставки
        return null;
    }
    
}
