<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * расчет стоимости доставки 
 * ApiCommandEstimateDeliveryCost
 * 
 * Стоимость доставки груза
 * $cost = $product['priceOut'] * (%Процент от оценочной стоимости от $product['priceOut']) / 100
 *          + Стоимость оформления груза  
 *          + $quantity * стомость доставки расчет на уровне ТК 
 * ========================================
 * Стоимость обратной доставки, деньги 
 * $cost = $product['priceOut'] * (%Процент от оценочной стоимости от $product['priceOut'])  / 100
 *          + стоимость секюрити пак
 *          + стомость доставки груза до 1 кг
 * 
 */
class ApiCommandEstimateDeliveryCost extends ApiCommand
{
    
    /**
     * ТК клиента
     * @var Doctrine\ORM\PersistentCollection
     */
    private $deliveries;
    
    /**
     * @var ID ТК Новая Почта
     */
    protected static $deliveryIdNovaposhta = 1;
    protected static $novaposhtaOptions = array(
        'percentProductCost' => 0.1,    // Процент от оценочной стоимости, %
        'percentInsurance' => 0.1,      // Размер страховки, %
        'сostService' => 12.00,         // Стоимость оформления груза
    );
    
    /**
     * @var ID ТК ИнТайм
     */
    protected static $deliveryIdIntime = 2;
    protected static $intimeOptions = array(
        'percentProductCost' => 0.5,    // Процент от оценочной стоимости, %
        'percentInsurance' => 0.5,      // Размер страховки, %
        'сostService' => 10.00,         // Стоимость оформления груза
//        'сostSecurityPack' => 4.80,     // Стоимость сикерпака
//        'сostLessKg' => 0.00,           // Стоимость перевозки груза до 1 кг
    );
    
    /**
     * @var ID ТК АвтоЛюкс
     */
    protected static $deliveryIdAutolux = 3;
    protected static $autoluxOptions = array(
        'percentProductCost' => 0.5,      // инимальный процент для наложенного платежа pay on delivery
        'percentInsurance' => 0.5,        // Размер страховки, %
        'сostService' => 10,              // Стоимость оформления груза
        
    );

    /**
     * склад получатель
     * @var Nitra\DeliveryBundle\Entity\Warehouse $toWarehouse - склад
     */
    private $toWarehouse;
    
    /**
     * {@inheritDoc}
     */
    public function validateCommand()
    {
        
        // проверить склад получатель
        if (!$this->hasParameter('toWarehouseId') || !$this->getParameter('toWarehouseId')) {
            return 'Не указан обязательный параметр: toWarehouseId - ID склада получателя.';
        }
        
        // получить склад получатель
        $this->toWarehouse = $this->em
            ->getRepository('NitraDeliveryBundle:Warehouse')
            ->find($this->getParameter('toWarehouseId'));
        if (!$this->toWarehouse) {
            return "Не найден склад получатель toWarehouseId: ".$this->getParameter('toWarehouseId').".";
        }
        
        // получить ТК клиента
        $this->deliveries = $this->getClient()->getDeliveries();
        if ($this->deliveries->count() == 0) {
            return "Для клиента \"".(string)$this->getClient()."\" не установлена ни одна ТК.";
        }
        
        // получить Город получатель
        $this->toCity = $this->toWarehouse->getCity();
        if (!$this->toCity) {
            return "Не для склада ID: ".$this->toWarehouse->getId().' => '.(string)$this->toWarehouse." не подвязан город ТК.";
        }
        
        // дата отправки
        // преобразовать к DateTime, 
        // для каждой ТК формат даты отправки может быть свой
        if ($this->hasParameter('sendDate') && is_string($this->getParameter('sendDate')) ) {
            // получаем дату отправки в качестве параметра
            // формат должен быть YYYY.MM.DD пример 2014.01.13
            $sendDate = \DateTime::createFromFormat('Y.m.d', $this->getParameter('sendDate'));
            $this->setParameter('sendDate', $sendDate);
            
        } else {
            // дата отправки не определена
            // по умолчанию = сегодня
            $this->setParameter('sendDate', new \DateTime());
        }
        
        // проверить доставляемые продукты
        // должет быть хотябы один продукт
        if (!$this->hasParameter('products') || 
            !$this->getParameter('products') || 
            !is_array($this->getParameter('products'))
        ) {
            return 'Не указан обязательный параметр: products - массив доставляемых продуктов.';
        }
        
        
        // флаг достпости расчета стоимости доставки по продуктам
        // по умолчанию true - предполагаем что все продукты валидные для расчета стоимости доставки
        // если хотя бы один продукт не валидный то флаг меняется на false 
        $this->setParameter('isAvailableEstimateCost', true);

        // получить массив доставляемых продуктов
        // валидировать каждый продукт
        $products = $this->getParameter('products');
        foreach($products as $prKey => $product) {
            
            // проверить город отправитель 
            if (!isset($product['fromCityId']) || !$product['fromCityId']) {
                return 'Для продукта не указан обязаетльный параметр fromCityId.';
            }
            
            // флаг продукта 
            // провеверити валидность продукта для расчета стоимости доставки
            if (!isset($product['quantity']) || !$product['quantity'] ||
                !isset($product['width']) || !$product['width'] ||
                !isset($product['height']) || !$product['height'] ||
                !isset($product['length']) || !$product['length'] ||
                !isset($product['weight']) || !$product['weight'] ||
                !isset($product['priceOut']) || !$product['priceOut']
            ) {
                // если хотя бы один продукт не валидный 
                // то сброс флага доступности расчета стоимости доставки 
                $this->setParameter('isAvailableEstimateCost', false);
            }
        }
        
        // обновить массив параметров, обновить доставляемые продукты
        $this->setParameter('products', $products);
        
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
        
        // получить массив доставляемых продуктов
        $products = $this->getParameter('products');
        
        // обойти все ТК клинета
        // расчет стоимости по каждой ТК
        foreach($this->deliveries as $delivery) {
            
            // расчитать стоимость доставки
            // каждого продукта по каждой ТК 
            foreach($products as $key => $product) {
                
                // получить первый город по ТК в городе отправителе
                $fromCity = $this->em
                    ->getRepository('NitraDeliveryBundle:City')
                    ->findOneBy(array(
                        'geoCity' => $product['fromCityId'],
                        'delivery' => $delivery->getId(),
                    ));
                
                // город отправитель не найден
                if(!$fromCity) {
                    // перейти к след. продукту
                    continue;
                }
                
                // получить первый склад ТК в городе отправителе 
                $fromWarehouse = $this->em
                    ->getRepository('NitraDeliveryBundle:Warehouse')
                    ->findOneBy(array(
                        'city' => $fromCity->getId(),
                        'delivery' => $delivery->getId(),
                    ));
                
                // склад отправитель не найден
                if(!$fromWarehouse) {
                    // перейти к след. продукту
                    continue;
                }
                
                // Склад получатель принадледит складу ТК
                if ($this->toWarehouse->getDelivery()->getId() == $delivery->getId()){
                    // склад получатель равен конечному складу
                    $toWarehouse = $this->toWarehouse;
                    
                } else {
                    // склад получатель не принаджелит ТК 
                    // получить первый склад с городе ТК 
                    
                    // получить первый город по ТК в городе получателе
                    $toCity = $this->em
                        ->getRepository('NitraDeliveryBundle:City')
                        ->findOneBy(array(
                            'geoCity' => $this->toWarehouse->getCity()->getGeoCity()->getId(),
                            'delivery' => $delivery->getId(),
                        ));
                    
                    // город получатель не найден
                    if(!$toCity) {
                        // перейти к след. продукту
                        continue;
                    }
                    
                    // получить первый склад ТК в городе получателе
                    $toWarehouse = $this->em
                        ->getRepository('NitraDeliveryBundle:Warehouse')
                        ->findOneBy(array(
                            'city' => $toCity->getId(),
                            'delivery' => $delivery->getId(),
                        ));
                    
                    // склад получатель не найден
                    if(!$toWarehouse) {
                        // перейти к след. продукту
                        continue;
                    }
                }
                
                // в зависимости от ID ТК разные методы расчетеов
                switch($delivery->getId()) {

                    // ТК Новая Почта
                    case self::$deliveryIdNovaposhta:
                        $estimateCost = $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $product);
                        $products[$key]['estimateCost'][$delivery->getId()] = $estimateCost;
                        break;
                    
                    // ТК ИнТайм
                    case self::$deliveryIdIntime:
                        $estimateCost = $this->intimeEstimate($fromWarehouse, $toWarehouse, $product);
                        $products[$key]['estimateCost'][$delivery->getId()] = $estimateCost;
                        break;

                    // ТК Автолюкс
                    case self::$deliveryIdAutolux:
                        $estimateCost = $this->autoluxEstimate($fromWarehouse, $toWarehouse, $product);
                        $products[$key]['estimateCost'][$delivery->getId()] = $estimateCost;
                        break;

                    // по умолчанию не определен механизм расчета
                    default:
                        // ошибка
                        return null;
                        // throw new \Exception('Не определен механизм расчета стоимости доставки.');
                        break;
                }
                
            }
            
        }
        
        // массив ТК клиента возвращаемый в результирующем массиве
        $deliveries = array();
        foreach($this->deliveries as $delivery) {
            $deliveries[$delivery->getId()] = array(
                'id' => $delivery->getId(),
                'name' => (string)$delivery,
                
                // счетчик продуктов которые может доставить ТК Склад-Склад
                'productsCounterToWarehouse' => 0,
                
                // счетчик продуктов которые может доставить ТК Склад-Двери
                'productsCounterToDoor' => 0,
                
                // флаг ТК может доставить товары Склад-Склад
                'isAvailableToWarehouse' => false,
                
                // флаг ТК может доставить товары Склад-Двери
                'isAvailableToDoor' => false,
                
                // Массив расчетов стоимостей доставки
                'estimateCost' => array(
                    // стоимость доставки Склад-Склад
                    'toWarehouse' => 0,
                    // стоимость доставки Склад-Двери
                    'toDoor' => 0,
                ),
                
                // массив дат доставки продуктов
                'deliveryDatesToWarehouse' => array(),
                'deliveryDatesToDoor' => array(),
                
                // Массив расчетов максимальных дат доставки
                'estimateDate' => array(
                    // максимальная дата доставки Склад-Склад
                    'toWarehouse' => 0,
                    // максимальная дата доставки Склад-Двери
                    'toDoor' => 0,
                ),
                
            );
        }
        
        // обойти массив продуктов, 
        // расчитать флаги и счетчики в результируюем массиве ТК
        // наполнить сортировочные массивы дат доставки
        foreach($products as $prKey => $product) {
            
            // обойти расчетный массив доставки продукта
            foreach($product['estimateCost'] as $deliveryId => $estimateCost) {
                
                // проверить стоимость ТК $deliveryId может доставить продукт Склад-Склад
                if (isset($estimateCost['toWarehouse']['cost']) && $estimateCost['toWarehouse']['cost']) {
                    // увеличиваем соответсвующий счетчик
                    $deliveries[$deliveryId]['productsCounterToWarehouse'] += 1;
                    // обновляем итоговую стоимость доставки для ТК 
                    $deliveries[$deliveryId]['estimateCost']['toWarehouse'] += $estimateCost['toWarehouse']['cost'];
                }
                
                // проверить дату ТК $deliveryId может доставить продукт Склад-Склад
                if (isset($estimateCost['toWarehouse']['date'])) {
                    // запомнить дату доставки
                    $deliveries[$deliveryId]['deliveryDatesToWarehouse'][] = ($estimateCost['toWarehouse']['date']) ? $estimateCost['toWarehouse']['date'] : 0;
                }
                
                // проверить ТК $deliveryId может доставить продукт Склад-Двери
                if (isset($estimateCost['toDoor']['cost']) && $estimateCost['toDoor']['cost']) {
                    // увеличиваем соответсвующий счетчик
                    $deliveries[$deliveryId]['productsCounterToDoor'] += 1;
                    // обновляем итоговую стоимость доставки для ТК 
                    $deliveries[$deliveryId]['estimateCost']['toDoor'] += $estimateCost['toDoor']['cost'];
                }
                
                // проверить дату ТК $deliveryId может доставить продукт Склад-Двери
                if (isset($estimateCost['toDoor']['date'])) {
                    // запомнить дату доставки
                    $deliveries[$deliveryId]['deliveryDatesToDoor'][] = ($estimateCost['toDoor']['date']) ? $estimateCost['toDoor']['date'] : 0;
                }
                
            }
            
            // массив ТК доступных для доставки продукта
            $products[$prKey]['deliveries'] = array();
            foreach($deliveries as $deliveryId => $delivery) {
                $products[$prKey]['deliveries'][$deliveryId] = array(
                    // название ТК 
                    'name' => $delivery['name'],
                    // флаг ТК пожет доставить продукт
                    'isAvailable' => (($deliveries[$deliveryId]['estimateCost']['toWarehouse'])
                        ? true 
                        : false),
                );
            }
        }
        
        // обойти результирующий массив ТК
        // для обновления флагов доставки ТК на Склад-Склад и Склад-Двери
        foreach($deliveries as $deliveryId => $delivery) {
            
            // проверить ТК может довезти все продукты на Склад-Склад
            // если кол-во продуктов(кот. может довезти ТК) равно общему кол-ву продуктов
            if ($delivery['productsCounterToWarehouse'] == count($products)) {
                // обновить флаг 
                $deliveries[$deliveryId]['isAvailableToWarehouse'] = true;
            }
            
            // проверить ТК может довезти все продукты на Склад-Двери
            // если кол-во продуктов(кот. может довезти ТК) равно общему кол-ву продуктов
            if ($delivery['productsCounterToDoor'] == count($products)) {
                // обновить флаг 
                $deliveries[$deliveryId]['isAvailableToDoor'] = true;
            }
            
            
            // сортировочный массив дат доставки Склад-Склад
            $sortByDateToWarehouse = array();
            foreach($delivery['deliveryDatesToWarehouse'] as $date) {
                $sortByDateToWarehouse[] = $date;
            }
            // отсортировать массив 
            // самая поздняя дата будет первой
            if ($sortByDateToWarehouse) {
                arsort($sortByDateToWarehouse);
                $array_values = array_values($sortByDateToWarehouse);
                $deliveries[$deliveryId]['estimateDate']['toWarehouse'] = $array_values[0];
            }
        
            
            // сортировочный массив дат доставки Склад-Двери
            $sortByDateToDoor = array();
            foreach($delivery['deliveryDatesToDoor'] as $date) {
                $sortByDateToDoor[] = $date;
            }
            // отсортировать массив 
            // самая поздняя дата будет первой
            if ($sortByDateToDoor) {
                arsort($sortByDateToDoor);
                $array_values = array_values($sortByDateToDoor);
                $deliveries[$deliveryId]['estimateDate']['toDoor'] = $array_values[0];
            }
            
        }
        
        // результирующий массив
        $result = array(
            'isAvailableEstimateCost' => $this->getParameter('isAvailableEstimateCost'),
            'deliveries' => $deliveries,
            'products' => $products,
        );
        
        // вернуть результирующий массив
        return $result;
    }
    
    
    /**
     * расчет стоимости доставки ТК АвтоЛюкс
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $product - массив данных перевозимого продукта
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function autoluxEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $product)
    {
        
        // АвтоЛюкс нет интерфейса расчета даты доставки
        // предоставлен только расчет стоимости
        // проверить валидность для расчета стоимости доставки
        if (!$this->getParameter('isAvailableEstimateCost')) {
            // продукты не валидны для расчет стоимости
            return;
        }
        
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('autolux');
        // ссылка API получения данных расчета
        $apiUrl = $containerParameters['api_url'].'?departure='.$fromWarehouse->getBusinessKey().'&arrival=' . $toWarehouse->getBusinessKey();
        
        // получить расчет стоимости доставки
        $apiResponse = json_decode(file_get_contents($apiUrl));
        if (!$apiResponse instanceof \stdClass) {
            // получен не правильны ответ отсервера
            return null;
        }
        
        // проверить объект ответа
        if (!isset($apiResponse->distance) || 
            !isset($apiResponse->volume) ||
            !isset($apiResponse->weight)
        ) {
            // ответ не содержит данных
            return null;
        }
        
        // проверить перевозимое расстояние
        if ($apiResponse->distance == 0)  {
            // продукт не перемещается
            return null;
        }
        
        // расчет большего значения
        $bigestValue = ($product['length'] * 0.01) * ($product['width'] * 0.01) * ($product['height'] * 0.01) * $apiResponse->volume;
        if($product['weight'] * $apiResponse->weight > $bigestValue) {
            $bigestValue = $product['weight'] * $apiResponse->weight;
        }
        
        // расчет стоимости доставки на склад получатель
        $costToWh = $bigestValue + self::$autoluxOptions['сostService'] + self::$autoluxOptions['percentInsurance'] * $product['priceOut'] / 100;
        
        // расчет обратной доставки 
        $beckSum = $product['priceOut'];
        $costBack = ceil((self::$autoluxOptions['percentProductCost'] * $beckSum / 100) + 14);
        
        // результирующий массив 
        $result = array(
            // Склад-Склад
            'toWarehouse' => array(
                'date' => null,
                'cost' => ceil($costToWh + $costBack),
            ),
            // Склад-Двері
            'toDoor' => array(
            ),
        );
        
        // вернуть результирующий массив
        return $result;
    }    
    
    /**
     * расчет стоимости доставки ТК ИнТайм
     * @link http://www.intime.ua/userfiles/API_intime.pdf
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $product - массив данных перевозимого продукта
     * @info    array options
     *          VidPerevozki - тип доставки: 
     *              1 - Дверь-Дверь;
     *              4 - Дверь-Склад; 
     *              3 - Склад-Дверь; 
     *              2 - Склад-Склад;
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function intimeEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $product)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('intime');
        
        // создать soap
        $soapClient = new \SoapClient($containerParameters['soap_url']);
        
        // проверить валидность для расчета стоимости доставки
        if ($this->getParameter('isAvailableEstimateCost')) {
            
            // общий массив параметров расчета
            $optionsCommon = array(
                'Oplachivaet' => (($this->hasParameter('Oplachivaet')) ? $this->hasParameter('Oplachivaet') : 'POL'),
                'DataOtpravki' => $this->getParameter('sendDate')->format('Ymd'),
                'GorodOtpravitel' => $fromWarehouse->getCity()->getBusinessKey(),
                'GorodPoluchatel' => $toWarehouse->getCity()->getBusinessKey(),
                'KontragentPoluchatel' => (($this->hasParameter('KontragentPoluchatel')) ? $this->hasParameter('KontragentPoluchatel') : 'Покупатель'),
                'OpisanieGruza' => (($this->hasParameter('OpisanieGruza')) ? $this->hasParameter('OpisanieGruza') : '114'),
                'Ves' => $product['weight'],
                'Obyom' => ($product['width'] * 0.01 * $product['height'] * 0.01 * $product['length'] * 0.01),
                'Cennost' => $product['priceOut'],
                'SposobOplaty' => (($this->hasParameter('SposobOplaty')) ? $this->hasParameter('SposobOplaty') : 'Nal'),
                'KvoMest' => (($this->hasParameter('KvoMest')) ? $this->hasParameter('KvoMest') : '1'),
                'PostService' => (($this->hasParameter('PostService')) ? $this->hasParameter('PostService') : '1'),
                'Upakovka' => (($this->hasParameter('Upakovka')) ? $this->hasParameter('Upakovka') : 'ЦОФ-00067'),
                'KolichestvoUpakovok' => (($this->hasParameter('KolichestvoUpakovok')) ? $this->hasParameter('KolichestvoUpakovok') : '1'),
                'KolesoStroka' => (($this->hasParameter('KolesoStroka')) ? $this->hasParameter('KolesoStroka') : ''),
                'AdresOtpravitelya' => (($this->hasParameter('AdresOtpravitelya')) ? $this->hasParameter('AdresOtpravitelya') : ''),
                'AdresPoluchatelya' => (($this->hasParameter('AdresPoluchatelya')) ? $this->hasParameter('AdresPoluchatelya') : ''),
                'ID' => $containerParameters['soap_id'],
                'KEY' => $containerParameters['soap_key'],
            );

            // Склад-Склад массив параметров расчета
            $optionsToWarehouse = $optionsCommon;
            $optionsToWarehouse['VidPerevozki'] = 2;

            // стоимость доставки Склад-Склад
            $soapResponseCostWarehouse = $soapClient->CalculateTTN($optionsToWarehouse);
            if (!$soapResponseCostWarehouse instanceof \stdClass || !isset($soapResponseCostWarehouse->result)) {
                // получен не правильны ответ от сервера
                return null;
            }

            // преобразовать получить массив из xml ответа 
            // получить xml Склад-Склад
            $xmlCostWarehouse = simplexml_load_string($soapResponseCostWarehouse->result);
            if (!$xmlCostWarehouse instanceof \SimpleXMLElement || !isset($xmlCostWarehouse[0])) {
                // получен не правильны ответ от сервера
                return null;
            }

            // Склад-Двери массив параметров расчета
            $optionsToDoor = $optionsCommon;
            $optionsToDoor['VidPerevozki'] = 3;

            // стоимость доставки Склад-Двери
            $soapResponseCostDoor = $soapClient->CalculateTTN($optionsToDoor);
            if (!$soapResponseCostDoor instanceof \stdClass || !isset($soapResponseCostDoor->result)) {
                // получен не правильны ответ от сервера
                return null;
            }

            // преобразовать получить массив из xml ответа 
            // получить xml Склад-Двери
            $xmlCostDoor = simplexml_load_string($soapResponseCostDoor->result);
            if (!$xmlCostDoor instanceof \SimpleXMLElement || !isset($xmlCostDoor[0])) {
                // получен не правильны ответ от сервера
                return null;
            }
            
            // стоимоть доставки Склад-Склад полученная от ТК
            $tkCostToWarehouse = (string)str_replace(',', '.', $xmlCostWarehouse[0]);
            
            // итоговая стоимость доставки Склад-Склад 
            $costToWarehouse = $product['priceOut'] * self::$intimeOptions['percentProductCost'] / 100
                                + self::$intimeOptions['сostService'] 
                                + ($product['quantity'] * $tkCostToWarehouse);
            
            
            // стоимоть доставки Склад-Двері полученная от ТК
            $tkCostToDoor = (string)str_replace(',', '.', $xmlCostDoor[0]);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $product['priceOut'] * self::$intimeOptions['percentProductCost'] / 100
                                + self::$intimeOptions['сostService'] 
                                + ($product['quantity'] * $tkCostToDoor);
        }
        
        // Продукты не валидные для расчета стоимости
        // Получить данные по времени доставки
        
        // общий массив параметров расчета дата доставки
        $optionsCommon = array(
            'GorodOtpravitel' => $fromWarehouse->getCity()->getBusinessKey(),
            'GorodPoluchatel' => $toWarehouse->getCity()->getBusinessKey(),
            'Data' => $this->getParameter('sendDate')->format('Ymd'),
        );
        
        // Склад-Склад массив параметров расчета
        $optionsToWarehouse = $optionsCommon;
        $optionsToWarehouse['VidPerevozki'] = 2;
        
        // дата доставки Склад-Склад
        $soapResponseDateWarehouse = $soapClient->DenDostavki($optionsToWarehouse);
        if (!$soapResponseDateWarehouse instanceof \stdClass || !isset($soapResponseDateWarehouse->result)) {
            // получен не правильны ответ от сервера
            return null;
        }
        
        // дата доставки Склад-Склад
        $dateToWarehouse = null;
        if ($soapResponseDateWarehouse instanceof \stdClass && isset($soapResponseDateWarehouse->result)) {
            $result = explode(':', $soapResponseDateWarehouse->result);
            if (isset($result[1]) && trim($result[1])) {
                $date = \DateTime::createFromFormat('d.m.Y', trim($result[1]));
                $dateToWarehouse = $date->getTimestamp();
            }
        }
        
        // Склад-Двери массив параметров расчета
        $optionsToDoor = $optionsCommon;
        $optionsToDoor['VidPerevozki'] = 3;
        
        // дата доставки Склад-Двери
        $soapResponseDateDoor = $soapClient->DenDostavki($optionsToDoor);
        if (!$soapResponseDateDoor instanceof \stdClass || !isset($soapResponseDateDoor->result)) {
            // получен не правильны ответ от сервера
            return null;
        }
        
        // дата доставки Склад-Склад
        $dateToDoor = null;
        if ($soapResponseDateDoor instanceof \stdClass && isset($soapResponseDateDoor->result)) {
            $result = explode(':', $soapResponseDateDoor->result);
            if (isset($result[1]) && trim($result[1])) {
                $date = \DateTime::createFromFormat('d.m.Y', trim($result[1]));
                $dateToDoor = $date->getTimestamp();
            }
        }
        
        // результирующий массив 
        $result = array(
            // Склад-Склад
            'toWarehouse' => array(
                'date' => $dateToWarehouse,
                'cost' => (isset($costToWarehouse)) ?$costToWarehouse : null),
            // Склад-Двері
            'toDoor' => array(
                'date' => $dateToDoor,
                'cost' => (isset($costToDoor)) ?$costToDoor : null),
        );
        
        // вернуть результирующий массив
        return $result;
    }
    
    /**
     * расчет стоимости доставки ТК Новая Почта
     * @link http://orders.novaposhta.ua/api.php?todo=api_form
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $product - массив данных перевозимого продукта
     * @info xml deliveryType_id - тип доставки
     *              1 - Двері-Двері; 
     *              2 - Двері-Склад; 
     *              3 - Склад-Двері; 
     *              4 - Склад-Склад;
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function novaposhtaEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $product)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('novaposhta');
        
        // проверить валидность для расчета стоимости доставки
        if ($this->getParameter('isAvailableEstimateCost')) {
            
            // xml запрос стоимость доставки до склада
            $xmlRequestToWarehouse = '<?xml version="1.0" encoding="UTF-8"?>
                <file>
                    <auth>'.$containerParameters['api_token'].'</auth>
                        <countPrice>
                            <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                            <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                            <mass>'         . $product['weight']    . '</mass>
                            <height>'       . $product['height']    . '</height>
                            <width>'        . $product['width']     . '</width>
                            <depth>'        . $product['length']    . '</depth>
                            <publicPrice>'  . $product['priceOut']  . '</publicPrice>
                            <deliveryType_id>4</deliveryType_id>
                            <loadType_id>'.(($this->hasParameter('loadType_id')) ? $this->hasParameter('loadType_id') : '1').'</loadType_id>
                            <floor_count>'.(($this->hasParameter('floor_count')) ? $this->hasParameter('floor_count') : '0').'</floor_count>
                            <postpay_sum>'.$product['priceOut'].'</postpay_sum>
                            <date>'.$this->getParameter('sendDate')->format('d.m.Y').'</date>
                        </countPrice>
                    </file>';

            // xml запрос стоимость доставки до двери, адресная доставка
            $xmlRequestToDoor = '<?xml version="1.0" encoding="UTF-8"?>
                <file>
                    <auth>'.$containerParameters['api_token'].'</auth>
                        <countPrice>
                            <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                            <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                            <mass>'         . $product['weight']    . '</mass>
                            <height>'       . $product['height']    . '</height>
                            <width>'        . $product['width']     . '</width>
                            <depth>'        . $product['length']    . '</depth>
                            <publicPrice>'  . $product['priceOut']  . '</publicPrice>
                            <deliveryType_id>3</deliveryType_id>
                            <loadType_id>'.(($this->hasParameter('loadType_id')) ? $this->hasParameter('loadType_id') : '1').'</loadType_id>
                            <floor_count>'.(($this->hasParameter('floor_count')) ? $this->hasParameter('floor_count') : '0').'</floor_count>
                            <postpay_sum>'.$product['priceOut'].'</postpay_sum>
                            <date>'.$this->getParameter('sendDate')->format('d.m.Y').'</date>
                        </countPrice>
                    </file>';


            // инициализировать curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $containerParameters['api_url']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            // получить стоимость склад-склад
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequestToWarehouse);
            $xmlResponseCostWarehouse = curl_exec($ch);
            // получить стоимость склад-двери
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequestToDoor);
            $xmlResponseCostDoor = curl_exec($ch);
            curl_close($ch);

            // преобразовать в xml 
            $xmlCostWarehouse = simplexml_load_string($xmlResponseCostWarehouse);
            if (!$xmlCostWarehouse instanceof \SimpleXMLElement || !isset($xmlCostWarehouse->date) || !isset($xmlCostWarehouse->cost)) {
                // получен не правильны ответ от сервера
                return null;
            }

            // преобразовать в xml 
            $xmlCostDoor = simplexml_load_string($xmlResponseCostDoor);
            if (!$xmlCostDoor instanceof \SimpleXMLElement || !isset($xmlCostDoor->date) || !isset($xmlCostDoor->cost)) {
                // получен не правильны ответ от сервера
                return null;
            }

            // дата доставки Склад-Склад
            $date = \DateTime::createFromFormat('d.m.Y', (string)$xmlCostWarehouse->date);
            $dateToWarehouse = $date->getTimestamp();

            // дата доставки Склад-Двери
            $date = \DateTime::createFromFormat('d.m.Y', (string)$xmlCostDoor->date);
            $dateToDoor = $date->getTimestamp();

            // стоимоть доставки Склад-Склад полученная от ТК
            $tkCostToWarehouse = (string)str_replace(',', '.', $xmlCostWarehouse->cost);
            
            // итоговая стоимость доставки Склад-Склад 
            $costToWarehouse = $product['priceOut'] * self::$novaposhtaOptions['percentProductCost'] / 100
                                + self::$novaposhtaOptions['сostService'] 
                                + ($product['quantity'] * $tkCostToWarehouse);

            // стоимоть доставки Склад-Двери полученная от ТК
            $tkCostToDoor = (string)str_replace(',', '.', $xmlCostDoor->cost);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $product['priceOut'] * self::$novaposhtaOptions['percentProductCost'] / 100
                                + self::$novaposhtaOptions['сostService'] 
                                + ($product['quantity'] * $tkCostToDoor);
            
            // результирующий массив 
            $result = array(
                // Склад-Склад
                'toWarehouse' => array(
                    'date' => $dateToWarehouse,
                    'cost' => $costToWarehouse),
                // Склад-Двері
                'toDoor' => array(
                    'date' => $dateToDoor,
                    'cost' => $costToDoor),
            );

            // вернуть результирующий массив
            // расчет стоимости доставки
            return $result;
        }
        
        // Продукты не валидные для расчета стоимости
        // Получить данные по времени доставки
        
        // xml запрос время доставки Склад-Склад
        $xmlRequestToWarehouse = '<?xml version="1.0" encoding="UTF-8"?>
            <file>
                <auth>'.$containerParameters['api_token'].'</auth>
                <getEstimatedDeliveryDate>
                    <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                    <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                    <date>'.$this->getParameter('sendDate')->format('d.m.Y').'</date>
                    <deliveryTypeId>4</deliveryTypeId>
                    <satDelivery>'.(($this->hasParameter('deliveryAtSaturday') && $this->getParameter('deliveryAtSaturday')) ? "1" : "0").'</satDelivery>
                </getEstimatedDeliveryDate>
            </file>';
        
        // xml запрос время доставки Склад-Двери
        $xmlRequestToDoor = '<?xml version="1.0" encoding="UTF-8"?>
            <file>
                <auth>'.$containerParameters['api_token'].'</auth>
                <getEstimatedDeliveryDate>
                    <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                    <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                    <date>'.$this->getParameter('sendDate')->format('d.m.Y').'</date>
                    <deliveryTypeId>3</deliveryTypeId>
                    <satDelivery>'.(($this->hasParameter('deliveryAtSaturday') && $this->getParameter('deliveryAtSaturday')) ? "1" : "0").'</satDelivery>
                </getEstimatedDeliveryDate>
            </file>';
        
        // инициализировать curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $containerParameters['api_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // получить стоимость склад-склад
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequestToWarehouse);
        $xmlResponseDateWarehouse = curl_exec($ch);
        // получить стоимость склад-двери
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequestToDoor);
        $xmlResponseDateDoor = curl_exec($ch);
        curl_close($ch);
        
        // преобразовать в xml 
        $xmlDateWarehouse = simplexml_load_string($xmlResponseDateWarehouse);
        if (!$xmlDateWarehouse instanceof \SimpleXMLElement || !isset($xmlDateWarehouse->estimatedDeliveryDate)) {
            // получен не правильны ответ от сервера
            return null;
        }
        
        // преобразовать в xml 
        $xmlDateDoor = simplexml_load_string($xmlResponseDateDoor);
        if (!$xmlDateDoor instanceof \SimpleXMLElement || !isset($xmlDateDoor->estimatedDeliveryDate)) {
            // получен не правильны ответ от сервера
            return null;
        }
        
        // дата доставки Склад-Склад
        $date = \DateTime::createFromFormat('d.m.Y', (string)$xmlDateWarehouse->estimatedDeliveryDate);
        $dateToWarehouse = $date->getTimestamp();
        
        // дата доставки Склад-Двери
        $date = \DateTime::createFromFormat('d.m.Y', (string)$xmlDateDoor->estimatedDeliveryDate);
        $dateToDoor = $date->getTimestamp();
        
        // результирующий массив 
        $result = array(
            // Склад-Склад
            'toWarehouse' => array(
                'date' => $dateToWarehouse,
                'cost' => null,
                ),
            // Склад-Двері
            'toDoor' => array(
                'date' => $dateToDoor,
                'cost' => null,
                ),
        );
        
        // вернуть результирующий массив
        // расчет врмени доставки
        return $result;
    }
    
}
