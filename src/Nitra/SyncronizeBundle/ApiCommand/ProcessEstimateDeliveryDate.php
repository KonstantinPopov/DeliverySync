<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

/**
 * processEstimateDeliveryDate
 * расчет времени доставки 
 */
class ProcessEstimateDeliveryDate extends ApiCommand
{
    
    /**
     * @var ID ТК Новая Почта
     */
    protected static $deliveryIdNovaposhta = 1;
    
    /**
     * @var ID ТК ИнТайм
     */
    protected static $deliveryIdIntime = 2;
    
    /**
     * транспортная компания
     * @var Nitra\DeliveryBundle\Entity\Delivery $delivery - ТК
     */
    private $delivery;
    
    /**
     * город получатель
     * @var Nitra\DeliveryBundle\Entity\City $city - Город
     */
    private $city;
    
    /**
     * склад получатель
     * @var Nitra\DeliveryBundle\Entity\Warehouse $warehouse - склад
     */
    private $warehouse;
    
    /**
     * массив городов отправителей
     * @var array $tkFromCities - массив городов NitraDeliveryBundle:City ТК отправителей
     */
    private $tkFromCities;
    
    /**
     * дата отправки
     * @var DateTime
     */
    private $sendDate;
    
    /**
     * {@inheritDoc}
     */
    public function validateApi()
    {
        
        // получить массив параметров
        $parameters = $this->getParameters();
        
        // проверить склад получатель
        if (!isset($parameters['toWarehouseId']) || !$parameters['toWarehouseId']) {
            return 'Не указан обязательный параметр: toWarehouseId - ID склада получателя.';
        }
        
        // получить склад получатель
        $this->warehouse = $this->getEntityManager()
            ->getRepository('NitraDeliveryBundle:Warehouse')
            ->find($parameters['toWarehouseId']);
        if (!$this->warehouse) {
            return "Не найден склад получатель toWarehouseId: ".$parameters['toWarehouseId'].".";
        }
        
        // получить ТК
        $this->delivery = $this->warehouse->getDelivery();
        if (!$this->delivery) {
            return "Не для склада ".(string)$this->warehouse." не указана ТК.";
        }
        
        // получить Город
        $this->city = $this->warehouse->getCity();
        if (!$this->city) {
            return "Не для склада ID: ".$this->warehouse->getId().' => '.(string)$this->warehouse." не подвязан город ТК.";
        }
        
        // дата отправки
        // преобразовать к DateTime, 
        // для каждой ТК формат даты отправки может быть свой
        if (isset($parameters['sendDate'])) {
            // получаем дату отправки в качестве параметра
            // формат должен быть YYYY.MM.DD пример 2014.01.13
            $this->sendDate = \DateTime::createFromFormat('Y.m.d', $parameters['sendDate']);
            
        } else {
            // дата отправки не определена
            // по умолчанию = сегодня
            $this->sendDate = new \DateTime();
        }
        
        // проверить город отправитель
        if (!isset($parameters['fromCityIds']) || !$parameters['fromCityIds']) {
            return 'Не указан обязательный параметр: fromCityIds - массив ID городов отправителей.';
        }
        
        // преобразовать город отправитель в массив
        if (!is_array($parameters['fromCityIds'])) {
            $parameters['fromCityIds'] = array($parameters['fromCityIds']);
        }
        
        // запрос получения списка городов отправителей
        $queryFromCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('geoCity.id, city.nameTk')
            ->from('NitraDeliveryBundle:City', 'city')
            ->innerJoin('city.geoCity', 'geoCity', 'WITH', 'geoCity.id IN(:geoCityIds)')->setParameter('geoCityIds', $parameters['fromCityIds'])
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->delivery)
            ;
        
        // получить города отправители 
        $this->tkFromCities = $queryFromCities
            ->getQuery()
            ->execute(array(), 'KeyPair');
            
        // проверить города отправители 
        if (!$this->tkFromCities) {
            return "Не найдены города отпраители fromCityIds: ".implode(',', $parameters['fromCityIds']).".";
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
        
        // в зависимости от ID ТК разные методы расчетеов
        switch($this->delivery->getId()) {
            
            // ТК Новая Почта
            case self::$deliveryIdNovaposhta:
                $estimateDate = $this->novaposhtaEstimate();
                break;
            
            // ТК ИнТайм
            case self::$deliveryIdIntime:
                $estimateDate = $this->intimeEstimate();
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
     * @return null - нет данных по расчету времени доставки
     */
    protected function novaposhtaEstimate()
    {
        
        // получить параметры  из файла настроек
        $parameters = $this->getContainer()->getParameter('novaposhta');
        
        // установить параметр apiToken, авторизация в API ТК Новая Почта
        $this->setParameter('apiToken', $parameters['api_token']);
        
        // установить параметр apiUrl, ссылка синхронизации API ТК Новая Почта
        $this->setParameter('apiUrl', $parameters['api_url']);
        
        // определить тип доставки 
        // тип доставки: 
        // http://orders.novaposhta.ua/api.php?todo=api_form 
        // Визначення орієнтовної дати доставки вантажу<
        // 1 - Двері-Двері; 
        // 2 - Двері-Склад; 
        // 3 - Склад-Двері; 
        // 4 - Склад-Склад
        if ($this->hasParameter('isDirect') && $this->getParameter('isDirect')) {
            // параметр не определен 
            // проверить параметр адресной доставки
            // если адресная доставка
            // Склад-Двері доставка товара со склада ТК к покупателю на адрес
            $deliveryTypeId = 3;
            
        } else {
            // Склад-Склад доставка товара на склад ТК
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
                        <recipientCity>'.(string)$this->city->getNameTk().'</recipientCity>
                        <date>'.$this->sendDate->format('d.m.Y').'</date>
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
    
    
    /**
     * расчет времени доставки ТК ИнТайм
     * @return timestamp - дата ориентировчной доставки
     * @return null - нет данных по расчету времени доставки
     */
    protected function intimeEstimate()
    {
        
        // определить тип доставки
        // http://www.intime.ua/userfiles/API_intime.pdf
        // справочник - видперевозки 
        // тип доставки: 
        // 1 Дверь - Дверь
        // 4 Дверь - Склад
        // 3 Склад - Дверь
        // 2 Склад - Склад
        if ($this->hasParameter('isDirect') && $this->getParameter('isDirect')) {
            // параметр не определен 
            // проверить параметр адресной доставки
            // если адресная доставка
            // Склад-Двері доставка товара со склада ТК к покупателю на адрес
            $deliveryTypeId = 3;
            
        } else {
            // Склад-Склад доставка товара на склад ТК
            $deliveryTypeId = 2;
        }
        
        // получить города отправители 
        $tkFromCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('geoCity.id, city.businessKey')
            ->from('NitraDeliveryBundle:City', 'city')
            ->innerJoin('city.geoCity', 'geoCity', 'WITH', 'geoCity.id IN(:geoCityIds)')->setParameter('geoCityIds', array_keys($this->tkFromCities))
            ->where('city.delivery = :delivery')->setParameter('delivery', $this->delivery)
            ->getQuery()
            ->execute(array(), 'KeyPair');
            ;
        
        // получить параметры из файла настроек
        $parameters = $this->getContainer()->getParameter('intime');
        
        // установить данные SOAP клиента
        $this->setParameter('soapUrl', $parameters['soap_url']);
        
        // создать soap
        $soapClient = new \SoapClient($this->getParameter('soapUrl'));
        
        // рачет для каждого города отправителя
        // формируем массив дата доставки в каждый город
        $estimatedDates = array();
        foreach($tkFromCities as $geoCityId => $businessKey ) {
            
            // массив параметров расчета
            $options = array(
                'GorodOtpravitel' => $businessKey,
                'GorodPoluchatel' => $this->city->getBusinessKey(),
                'Data' => $this->sendDate->format('Ymd'),
                'VidPerevozki' => $deliveryTypeId,
            );
            
            // отправить запрос на сервер 
            $soapResponse = $soapClient->DenDostavki($options);
            
            // проверить ответ сервера
            if ($soapResponse instanceof \stdClass && isset($soapResponse->result)) {
                $result = explode(':', $soapResponse->result);
                if (isset($result[1]) && trim($result[1])) {
                    $date = \DateTime::createFromFormat('d.m.Y', trim($result[1]));
                    $estimatedDates[$geoCityId] = $date->getTimestamp();
                }
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
