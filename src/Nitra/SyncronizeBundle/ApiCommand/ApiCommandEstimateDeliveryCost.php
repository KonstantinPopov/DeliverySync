<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Nitra\DeliveryBundle\Entity\Client;
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
     * массив ТК клиента
     * @var array
     */
    private $deliveries;
    
    /**
     * @var ID ТК Новая Почта
     */
    protected static $deliveryIdNovaposhta;
    protected static $deliveryIdNovaposhtaIM ; // ID от обычной со знаком минус
    protected static $novaposhtaOptions = array(
        
        // тариф Интернет магазина доставка 1 кг.
        'tarifKg' => 1.85,
        // максимальный вес до которого действует тариф Интернет магазина
        'maxWeight' => 300,
        
        // стоимость услуг оформления доставки
        'сostServiceDelivery' => 17,
        // стоимость услуг оформления обратного конверта
        'сostServiceBack' => 17,
        
        // минимаьная сумма страховки
        'minSumInsurance' => 400,
        // Размер страховки, %
        'percentInsurance' => 0.005,
        // Процент от оценочной стоимости, %
        'percentProductCost' => 0.1,
        // % услуги по формлению наложенного платежа
        'percentPOD' => 0.02,
        
        // стоимость доставки до двери 
        'deliveryToDoorWeight_1' => 20,
        'deliveryToDoorWeight_1_10' => 25,
        'deliveryToDoorWeight_11_300' => 40,
        'deliveryToDoorWeight_301_500' => 75,
        'deliveryToDoorWeight_default' => null,
    );
    
    /**
     * @var ID ТК ИнТайм
     */
    protected static $deliveryIdIntime;
    protected static $intimeOptions = array(
        
        // минимаьная сумма страховки
        'minSumInsurance' => 200, 
        
        // стоимость услуг оформления доставки
        'сostServiceDelivery' => 14,
        
        // стоимость услуг оформления обратного конверта // Стоимость сикерпака
        'сostServiceBack' => 6,
        
        // Процент от оценочной стоимости, %
        'percentProductCost' => 0.01,
        
        // % услуги по формлению наложенного платежа
        'percentPOD' => 0.01,
        
        // стоимость доставки до двери 
        'deliveryToDoorWeight_10' => 35,
        'deliveryToDoorWeight_100' => 50,
        'deliveryToDoorWeight_500' => 60,
        'deliveryToDoorWeight_1000' => 80,
        'deliveryToDoorWeight_1000_plus' => 120,
        'deliveryToDoorWeight_default' => 0,
    );
    
    /**
     * @var ID ТК АвтоЛюкс
     */
    protected static $deliveryIdAutolux;
    protected static $autoluxOptions = array(
        'percentPOD' => 2,                // инимальный процент для наложенного платежа pay on delivery
        'percentInsurance' => 0.5,        // Размер страховки, %
        'сostServiceDelivery' => 15,      // Стоимость оформления груза
        'сostServiceBack' => 15,          // Стоимость оформления обратной доставки
    );
    
    
    
    /**
     * @var ID ТК Мест Експресс
     */
    protected static $deliveryIdMeestexpress;
    protected static $meestexpressOptions = array(
        
        // % услуги по формлению наложенного платежа
        // 2% от суммы, но не меньше 10,00 грн.
        'percentPOD' => 0.02,
        'podMin' => 10,
    );
    
    
    /**
     * Город получатель
     * @var Nitra\GeoBundle\Entity\City $toCity - город получатель
     */
    private $toCity;
    
    /**
     * склад получатель
     * @var Nitra\DeliveryBundle\Entity\Warehouse $toWarehouse - склад
     */
    private $toWarehouse;
    
    /**
     * Массив складов получателей для ТК
     * @var array 
     * array ( deliveryId => Nitra\DeliveryBundle\Entity\Warehouse )
     */
    private $toWarehouseByDelivery;
    
    /**
     * Конструктор
     */
    public function __construct(ContainerInterface $container, Client $client, array $parameters = null)
    {
        // вызвать конструктор родителя
        parent::__construct($container, $client, $parameters);
        
        // получить настройки ТК Новая Почта
        $novaposhtaParameters = $this->getContainer()->getParameter('novaposhta');
        self::$deliveryIdNovaposhta     = $novaposhtaParameters['delivery_id'];
        self::$deliveryIdNovaposhtaIM   = ($novaposhtaParameters['delivery_id'] * -1);
        
        // получить настройки ТК ИнТайм
        $intimeParameters = $this->getContainer()->getParameter('intime');
        self::$deliveryIdIntime     =  $intimeParameters['delivery_id'];
        
        // получить настройки ТК АвтоЛюкс
        $autoluxParameters = $this->getContainer()->getParameter('autolux');
        self::$deliveryIdAutolux    = $autoluxParameters['delivery_id'];
        
        // получить настройки ТК Мист Експресс
        $meestexpressParameters = $this->getContainer()->getParameter('meestexpress');
        self::$deliveryIdMeestexpress = $meestexpressParameters['delivery_id'];
    }
    
    
    /**
     * Получить объемный вес
     * @param float $width  - ширина
     * @param float $height - высота
     * @param float $length - длина
     * @return float - расчетный объемный вес
     */
    public static function getVWeight($width, $height, $length)
    {
        return ($width * $height * $length / 4000);
    }
    
    /**
     * Получить максимальный вес
     * @param float $weight - обычный вес
     * @param float $width  - ширина
     * @param float $height - высота
     * @param float $length - длина
     * @return float - максимальный вес
     */
    public static function getMaxWeight($weight, $width, $height, $length)
    {
        // получить объемный вес
        $vWeight = self::getVWeight($width, $height, $length);
        
        // если обычный вес больше объемного веса
        if ($weight > $vWeight) {
            // вернуть больщий вес
            return $weight;
        }
        
        // вернуть расчетный (больший) вес
        return $vWeight;
    }
    
    /**
     * выполнить округление
     * @param  float $val значение для округления
     * @return float результат округления
     * @example CurrencyRepository::round(343.259999999) ... return 343.25
     */
    public static function round($val)
    {
        return (intval($val*100)/100);
    }
    
    /**
     * {@inheritDoc}
     */
    public function validateCommand()
    {
        
        // проверить склад получатель
        if (!$this->hasParameter('toCityId') || !$this->getParameter('toCityId')) {
            return 'Не указан обязательный параметр: toCityId - ID города получателя.';
        }
        
        // получить склад получатель
        $this->toCity = $this->em
            ->getRepository('NitraGeoBundle:City')
            ->find($this->getParameter('toCityId'));
        if (!$this->toCity) {
            return "Не найден город получатель toCityId: ".$this->getParameter('toCityId').".";
        }
        
        // если указан конкретный ID склада получателя
        // получчить склад получатель
        if ($this->hasParameter('toWarehouseId') && $this->getParameter('toWarehouseId')) {
            // получить склад
            $this->toWarehouse = $this->em
                ->getRepository('NitraDeliveryBundle:Warehouse')
                ->find($this->getParameter('toWarehouseId'));
            if (!$this->toWarehouse) {
                return "Не найден склад получатель toWarehouseId: ".$this->getParameter('toWarehouseId').".";
            }
        }
        
        // проверить ТК клиента
        $deliveries = $this->getClient()->getDeliveries();
        if ($deliveries->count() == 0) {
            return "Для клиента \"".(string)$this->getClient()."\" не установлена ни одна ТК.";
        }
        
        // сохранить ТК клиента
        $this->deliveries = array();
        $this->toWarehouseByDelivery = array();
        foreach($deliveries as $delivery) {
            
            // ID ТК
            $deliveryId = $delivery->getId();
            
            // склад получатель ТК в городе получателе 
            $toWarehouse = false;
            
            // если указан конкретный склад получатель
            if ($this->toWarehouse && 
                // Склад получатель принадледит складу ТК
                $this->toWarehouse->getDelivery()->getId() == $deliveryId
            ) {
                // склад получатель равен конечному конкретному складу
                $toWarehouse = $this->toWarehouse;
                
            } else {
                // склад получатель не принаджелит ТК 
                // получить первый склад ТК в городе получателе
                $toWarehouse = $this->em
                    ->getRepository('NitraDeliveryBundle:Warehouse')
                    ->getFirstDeliveryWarehouseInGeoCity($deliveryId, $this->toCity->getId());
            }
            
            // запомнить склад получатель для ТК
            $this->toWarehouseByDelivery[$deliveryId] = $toWarehouse;
            
            // запомнить ТК 
            $this->deliveries[$deliveryId] = array(
                'id' => $deliveryId,
                'name' => (string)$delivery,
                
                // флаг ТК доступна для доставки
                // в городе получателе есть склад ТК 
                'isAvailable' => ($toWarehouse) ? true : false,
                
                // ID склада получателя 
                'toWarehouseId' => ($toWarehouse) ? $toWarehouse->getId() : false,
                
                // Массив расчетов стоимостей доставки
                'estimateCost' => array(
                    // стоимость даставки
                    'costTk' => 0,
                    // стоимость обратной доставки
                    'costBack' => 0,
                    // Склад-Склад
                    'costToWarehouse' => 0,
                    // Склад-Двері
                    'costToDoor' => 0,
                ),
                
                // максимальная дата доставки
                // расчитывается из deliveryDates
                'estimateDate' => null,
                
                // массив дат доставки продуктов
                // из данного массива получаем самую максимальную дату
                'deliveryDates' => array(),
            );
            
            // ТК тариф Интернет магазин
            if ($deliveryId == self::$deliveryIdNovaposhta) {
                // запомнить ТК тариф ИМ
                $this->deliveries[self::$deliveryIdNovaposhtaIM] = $this->deliveries[self::$deliveryIdNovaposhta];
                $this->deliveries[self::$deliveryIdNovaposhtaIM]['name'] .= ' (тариф ИМ)';
            }
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
        
        // получить массив доставляемых продуктов
        // валидировать каждый продукт
        $products = $this->getParameter('products');
        foreach($products as $prKey => $product) {
            
            // обнулить (инициализация) 
            // результирующий массив расчетов по продукту
            $products[$prKey]['estimateCost'] = array();
            
            // проверить город отправитель 
            if (!isset($product['fromCityId']) || !$product['fromCityId']) {
                return 'Для продукта не указан обязаетльный параметр fromCityId.';
            }
            
            // вес продукта по умолчанию 
            if (!isset($product['weight']) || !$product['weight']) {
                $product['weight'] = 0;
                $products[$prKey]['weight'] = $product['weight'];
            }
            
            // флаг доступности расчета стоимости доставки по продукту
            // по умолчанию true - предполагаем что продукт валидный для расчета стоимости доставки
            $products[$prKey]['isAvailableEstimateCost'] = true;
            
            // провеверити валидность продукта для расчета стоимости доставки
            // weight - не участвует в валидации продукта, 
            // потому что, если weight не указан то можено вычислись объемный вес
            // используя метод $this->getVWeight()
            if (!isset($product['quantity']) || !$product['quantity'] ||
                !isset($product['width']) || !$product['width'] ||
                !isset($product['height']) || !$product['height'] ||
                !isset($product['length']) || !$product['length'] ||
                !isset($product['priceOut']) || !$product['priceOut']
            ) {
                // сброс флага доступности расчета 
                // стоимости доставки для продукта 
                $products[$prKey]['isAvailableEstimateCost'] = false;
            }
            
            // обнулить (инициализация)  объемный вес продукта
            $products[$prKey]['VWeight'] = 0;
            // обнулить (инициализация)  максимальный вес продукта
            $products[$prKey]['maxWeight'] = 0;
            
            // если продукт доступен для расчета стоимости доставки
            // расчитать объемный вес продукта 
            // расчитать максимальный вес продукта
            if ($products[$prKey]['isAvailableEstimateCost']) {
                // продукт валидный 
                // расчитать объемный вес продукта 
                $products[$prKey]['VWeight'] = $product['quantity'] * self::getVWeight($product['width'], $product['height'], $product['length']);
                // расчитать максимальный вес продукта
                $products[$prKey]['maxWeight'] = $product['quantity'] * self::getMaxWeight($product['weight'], $product['width'], $product['height'], $product['length']);
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
        
        // получить $timeout
        $timeout = $this->container->get('nitra.timeout');
        // лимит времени - микросекунды (1 сек = 1000000)
        $timeoutLimit = 30000000;
        
        // получить массив доставляемых продуктов
        $products = $this->getParameter('products');
        
        // обойти все ТК клинета
        // расчет стоимости по каждой ТК
        foreach($this->deliveries as $deliveryKey => $delivery) {
            
            // ID ТК, ключ не используем т.к. Новая Почта ИМ ключь -1
            $deliveryId = $delivery['id'];
            
            // проверить склад полуатель 
            // если склад получатель для ТК не был получен ранее
            // перейти к следующей ТК
            if (!isset($this->toWarehouseByDelivery[$deliveryId]) ||
                !$this->toWarehouseByDelivery[$deliveryId]
            ) {
                // склад получатель не найден
                // перейти к след ТК 
                continue;
            }
            
            // склад получатель для ТК 
            $toWarehouse = $this->toWarehouseByDelivery[$deliveryId];
            
            
            // расчитать стоимость доставки
            // каждого продукта по каждой ТК 
            foreach($products as $prKey => $product) {
                
                // получить первый склад ТК в городе отправителе
                $fromWarehouse = $this->em
                    ->getRepository('NitraDeliveryBundle:Warehouse')
                    ->getFirstDeliveryWarehouseInGeoCity($deliveryId, $product['fromCityId']);
                
                // склад отправитель не найден
                if(!$fromWarehouse) {
                    // перейти к след. продукту
                    continue;
                }
                
                // в зависимости от ID ТК разные методы расчетеов
                switch($deliveryKey) {
                    
                    // для каждой ТК  вызов метода расчет обрамлен в try ... catch 
                    // потому что 
                    // если возникает ошибка по какой-то одной ТК 
                    // то результат расчета будет содержать результаты по другим другим ТК 
                    // в противном случае не будет результат расчет по всем ТК 
                    // другими словами 
                    // если нет try ... catch  для каждой ТК 
                    // и в расчете ТК Интайм возникала ошибка то не будет результатов и по другим ТК 
                    
                    // ТК Новая Почта
                    case self::$deliveryIdNovaposhta:
                        // попытка выполнить расчет 
                        try {
                            // выполнить расчет с ограничением по времени
                            // лимит времени - микросекунды (1 сек = 1000000)
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $product){
                                return $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $product);
                            }, $timeoutLimit);
                            // запомнить результат
                            $products[$prKey]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;
                    
                    // ТК Новая Почта ИМ
                    case self::$deliveryIdNovaposhtaIM:
                        try {
                            // выполнить расчет с ограничением по времени
                            // лимит времени - микросекунды (1 сек = 1000000)
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $product){
                                return $this->novaposhtaIMEstimate($fromWarehouse, $toWarehouse, $product);
                            }, $timeoutLimit);
                            // запомнить результат
                            $products[$prKey]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;                    
                    
                    // ТК ИнТайм
                    case self::$deliveryIdIntime:
                        try {
                            // выполнить расчет с ограничением по времени
                            // лимит времени - микросекунды (1 сек = 1000000)
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $product){
                                return $this->intimeEstimate($fromWarehouse, $toWarehouse, $product);
                            }, $timeoutLimit);
                            // запомнить результат
                            $products[$prKey]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;

                    // ТК Автолюкс
                    case self::$deliveryIdAutolux:
                        try {
                            // выполнить расчет с ограничением по времени
                            // лимит времени - микросекунды (1 сек = 1000000)
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $product){
                                return $this->autoluxEstimate($fromWarehouse, $toWarehouse, $product);
                            }, $timeoutLimit);
                            // запомнить результат
                            $products[$prKey]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;

                    // ТК Мист Експерсс
                    case self::$deliveryIdMeestexpress:
                        try {
                            // выполнить расчет с ограничением по времени
                            // лимит времени - микросекунды (1 сек = 1000000)
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $product){
                                return $this->meestexpressEstimate($fromWarehouse, $toWarehouse, $product);
                            }, $timeoutLimit);
                            // запомнить результат
                            $products[$prKey]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;
                    
                    // по умолчанию не определен механизм расчета
                    // default:
                        // не чего не делаем 
                        // throw new \Exception('Не определен механизм расчета стоимости доставки.');
                        // если прервать выполенение (return null или throw то тетрадки не получат результат расчетов по всем ТК)
                        // break;
                }
                
            }
            
        }
        
        // итого вес продуктов
        $totalWeight = 0;
        
        // итого объемный вес продуктов
        $totalVWeight = 0;
        
        // обойти массив продуктов, 
        // расчитать флаги и счетчики в результируюем массиве ТК
        // наполнить сортировочные массивы дат доставки
        foreach($products as $prKey => $product) {
            
            // обновить вес продуктов
            $totalWeight += $product['weight'];
            
            // обновить объемный вес продуктов
            $totalVWeight += $product['VWeight'];
            
            // обойти расчетный массив доставки продукта
            foreach($product['estimateCost'] as $deliveryKey => $estimateCost) {
                
                // проверить стоимость доставки, обновить итого  
                if (isset($estimateCost['costTk']) && $estimateCost['costTk']) {
                    $this->deliveries[$deliveryKey]['estimateCost']['costTk'] += $estimateCost['costTk'];
                }
                
                // проверить стоимость обратной доставки, обновить итого
                if (isset($estimateCost['costBack']) && $estimateCost['costBack']) {
                    $this->deliveries[$deliveryKey]['estimateCost']['costBack'] += $estimateCost['costBack'];
                }
                
                // проверить стоимость доставки Склад-Склад, обновить итого
                if (isset($estimateCost['costToWarehouse']) && $estimateCost['costToWarehouse']) {
                    $this->deliveries[$deliveryKey]['estimateCost']['costToWarehouse'] += $estimateCost['costToWarehouse'];
                }
                
                // проверить стоимость доставки Склад-Двери, обновить итого
                if (isset($estimateCost['costToDoor']) && $estimateCost['costToDoor']) {
                    $this->deliveries[$deliveryKey]['estimateCost']['costToDoor'] += $estimateCost['costToDoor'];
                }
                
                // запомнить дату доставки
                if (isset($estimateCost['date'])) {
                    $this->deliveries[$deliveryKey]['deliveryDates'][] = ($estimateCost['date']) 
                        ? $estimateCost['date']
                        : 0;
                }
                
            }
            
            // массив ТК доступных для доставки продукта
            $products[$prKey]['deliveries'] = array();
            foreach($this->deliveries as $deliveryKey => $delivery) {
                $products[$prKey]['deliveries'][$deliveryKey] = array(
                    // название ТК 
                    'name' => $delivery['name'],
                    // флаг ТК пожет доставить продукт
                    'isAvailable' => $this->deliveries[$deliveryKey]['isAvailable'],
                );
            }
            
        }
        
        // обойти результирующий массив ТК
        // для обновления флагов доставки ТК на Склад-Склад и Склад-Двери
        foreach($this->deliveries as $deliveryKey => $delivery) {
            
            // сортировочный массив дат доставки Склад-Склад
            $sortByDeliveryDates= array();
            foreach($delivery['deliveryDates'] as $timestamp) {
                $sortByDeliveryDates[] = $timestamp;
            }
            
            // отсортировать массив 
            // самая поздняя дата будет первой
            if ($sortByDeliveryDates) {
                arsort($sortByDeliveryDates);
                $arrayValues = array_values($sortByDeliveryDates);
                $this->deliveries[$deliveryKey]['estimateDate'] = $arrayValues[0];
            }
            
        }
        
        // результирующий массив
        $result = array(
            'deliveries' => $this->deliveries,
            'totalWeight' => $totalWeight,
            'totalVWeight' => ceil($totalVWeight),
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
        if (!$product['isAvailableEstimateCost']) {
            // продукт не валиден для расчета стоимости
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
        
        // стоимость доставки
        $costTk = $product['quantity'] * $bigestValue 
                    + self::$autoluxOptions['сostServiceDelivery'] 
                    + self::$autoluxOptions['percentInsurance'] * $product['quantity']  * $product['priceOut'] / 100;
        
        // kontrabas 
        // добавить скидку для клиента
        if ($costTk > 0 && $this->client->getName() == 'kontrabas') {
            // Скидка 10% процентов
            $discount = ($costTk*0.1); 
            $costTk = $costTk - $discount;
        }
        
        // стоимоть обратной доставки 
        $costBack = (self::$autoluxOptions['percentPOD'] * $product['quantity'] * $product['priceOut']/ 100 + self::$autoluxOptions['сostServiceBack']);
        
        // итоговая стоимость доставки Склад-Склад
        $costToWarehouse = ($costTk + $costBack);
        
        // итоговая стоимость доставки Склад-Двери
        $costToDoor = null; // доставка Склад-Двери не расчитывается для данной ТК
        
        // дата доставки Склад-Склад
        $dateToWarehouse = null; // дату доставки не расчитывам для данной ТК
        
        // результирующий массив 
        $result = array(
            // стоимость даставки
            'costTk' => self::round($costTk),
            // стоимость обратной доставки
            'costBack' => self::round($costBack),
            // Склад-Склад
            'costToWarehouse' => self::round($costToWarehouse),
            // Склад-Двері
            'costToDoor' => null,
            // дата доставки 
            'date' => null,
            
        );
        
        // вернуть результирующий массив
        return $result;
    }
    
    
    /**
     * ТК Интайм 
     * Получить стоимость доставки Склад-Двери по весу продукта
     * @param float $maxWeight - максимальный вес доставляемого продукта 
     * @return float стоимость доставки до дверей
     */
    public static function intimeDeliveryToDoorByWeight($maxWeight)
    {
        
        if ($maxWeight > 0 && $maxWeight <= 10) {
            return self::$intimeOptions['deliveryToDoorWeight_10'];
            
        } elseif ($maxWeight > 10 && $maxWeight <= 100) {
            return self::$intimeOptions['deliveryToDoorWeight_100'];
            
        } elseif($maxWeight > 100 && $maxWeight < 500) {
            return self::$intimeOptions['deliveryToDoorWeight_500'];
            
        } elseif($maxWeight >= 500 && $maxWeight < 1000 ) {
            return self::$intimeOptions['deliveryToDoorWeight_1000'];
            
        } elseif($maxWeight > 1000) {
            return self::$intimeOptions['deliveryToDoorWeight_1000_plus'];
        }
        
        // стоимость доставки по умолчанию
        return self::$intimeOptions['deliveryToDoorWeight_default'];
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
        if ($product['isAvailableEstimateCost']) {
            
            // получить максимальный вес продукта
            $maxWeight = $product['maxWeight'];
            
            // общий массив параметров расчета
            $optionsCommon = array(
                'Oplachivaet' => (($this->hasParameter('Oplachivaet')) ? $this->hasParameter('Oplachivaet') : 'POL'),
                'DataOtpravki' => $this->getParameter('sendDate')->format('Ymd'),
                'GorodOtpravitel' => $fromWarehouse->getCity()->getBusinessKey(),
                'GorodPoluchatel' => $toWarehouse->getCity()->getBusinessKey(),
                'KontragentPoluchatel' => (($this->hasParameter('KontragentPoluchatel')) ? $this->hasParameter('KontragentPoluchatel') : 'Покупатель'),
                'OpisanieGruza' => (($this->hasParameter('OpisanieGruza')) ? $this->hasParameter('OpisanieGruza') : '114'),
                'Ves' => $maxWeight,
                'Obyom' => ($product['width'] * 0.01 * $product['height'] * 0.01 * $product['length'] * 0.01),
                'Cennost' => ($product['priceOut'] < self::$intimeOptions['minSumInsurance']) ? self::$intimeOptions['minSumInsurance'] : $product['priceOut'], 
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
            $optionsToWarehouse['VidPerevozki'] = 2; // Склад-Склад

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
            
//            // обратная доставка Склад-Склад 
//            $optionsToBack = $optionsCommon;
//            $optionsToBack['VidPerevozki'] = 2; // Склад-Склад
//            $optionsToBack['Upakovka'] = 'ЦОФ-00019'; // Секьюрпак
//            $optionsToBack['GorodOtpravitel'] = $toWarehouse->getCity()->getBusinessKey();
//            $optionsToBack['GorodPoluchatel'] = $fromWarehouse->getCity()->getBusinessKey();
//            $optionsToBack['KontragentPoluchatel'] = 'Продавец';
//            $optionsToBack['Ves'] = '';
//            $optionsToBack['Obyom'] = '';
//            $optionsToBack['SposobOplaty'] = '';
//            
//            // стоимость обратной доставки Склад-Склад
//            $soapResponseCostBack = $soapClient->CalculateTTN($optionsToBack);
//            if (!$soapResponseCostBack instanceof \stdClass || !isset($soapResponseCostBack->result)) {
//                // получен не правильны ответ от сервера
//                return null;
//            }
//            
//            // преобразовать получить массив из xml ответа 
//            // получить xml Склад-Склад
//            $xmlCostBack = simplexml_load_string($soapResponseCostBack->result);
//            if (!$xmlCostBack instanceof \SimpleXMLElement || !isset($xmlCostBack[0])) {
//                // получен не правильны ответ от сервера
//                return null;
//            }
            
//            // Склад-Двери массив параметров расчета
//            $optionsToDoor = $optionsCommon;
//            $optionsToDoor['VidPerevozki'] = 3; // Склад-Двери
//
//            // стоимость доставки Склад-Двери
//            $soapResponseCostDoor = $soapClient->CalculateTTN($optionsToDoor);
//            if (!$soapResponseCostDoor instanceof \stdClass || !isset($soapResponseCostDoor->result)) {
//                // получен не правильны ответ от сервера
//                return null;
//            }
//
//            // преобразовать получить массив из xml ответа 
//            // получить xml Склад-Двери
//            $xmlCostDoor = simplexml_load_string($soapResponseCostDoor->result);
//            if (!$xmlCostDoor instanceof \SimpleXMLElement || !isset($xmlCostDoor[0])) {
//                // получен не правильны ответ от сервера
//                return null;
//            }
            
            
            // стоимость доставки
            $costTk = //$product['quantity'] * $product['priceOut'] * self::$intimeOptions['percentProductCost']
                                // + self::$intimeOptions['сostServiceDelivery'] 
                                // + ($product['quantity'] * str_replace(',', '.', (string)$xmlCostWarehouse[0]));
                                // в ответе ИнТайм $xmlCostWarehouse[0] уже учтено percentProductCost и сostServiceDelivery
                                ($product['quantity'] * str_replace(',', '.', (string)$xmlCostWarehouse[0]));
            
//            // стоимоть обратной доставки 
//            $costBack = str_replace(',', '.', (string)$xmlCostBack[0]) 
//                        + self::$intimeOptions['сostServiceBack'] 
//                        + $product['quantity'] * $product['priceOut'] * self::$intimeOptions['percentPOD'];
            
            // стоимоть обратной доставки 
            $costBack = self::$intimeOptions['сostServiceDelivery'] 
                        + self::$intimeOptions['сostServiceBack'] 
                        + $product['quantity'] * $product['priceOut'] * self::$intimeOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse
                        + self::intimeDeliveryToDoorByWeight($product['quantity'] * $maxWeight);
                
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
        $optionsToWarehouse['VidPerevozki'] = 2; // Склад-Склад
        
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
                $dateToWarehouse = \DateTime::createFromFormat('d.m.Y', trim($result[1]));
            }
        }
        
        // результирующий массив 
        $result = array(
            // стоимость даставки
            'costTk' => (isset($costTk)) ? self::round($costTk) : null,
            // стоимость обратной доставки
            'costBack' => (isset($costBack)) ? self::round($costBack) : null,
            // Склад-Склад
            'costToWarehouse' => (isset($costToWarehouse)) ? self::round($costToWarehouse) : null,
            // Склад-Двері
            'costToDoor' => (isset($costToDoor)) ? self::round($costToDoor) : null,
            // дата доставки 
            'date' => ($dateToWarehouse) ? $dateToWarehouse->getTimestamp() : null,
            
        );
        
        // вернуть результирующий массив
        return $result;
    }
    
    /**
     * ТК Новая Почта
     * Получить стоимость доставки Склад-Двери по весу продукта
     * @param float $maxWeight - максимальный вес доставляемого продукта 
     * @return float стоимость доставки до дверей
     */
    public static function novaposhtaDeliveryToDoorByWeight($maxWeight)
    {
        
        if ($maxWeight > 0 && $maxWeight <= 1 ) {
            return self::$novaposhtaOptions['deliveryToDoorWeight_1'];
            
        } elseif ($maxWeight > 1 && $maxWeight <= 10 ) {
            return self::$novaposhtaOptions['deliveryToDoorWeight_1_10'];
            
        } elseif ($maxWeight >= 11 && $maxWeight <= 300 ) {
            return self::$novaposhtaOptions['deliveryToDoorWeight_11_300'];
            
        } elseif ($maxWeight >= 301 && $maxWeight <= 500 ) {
            return self::$novaposhtaOptions['deliveryToDoorWeight_301_500'];
        }
        
        // стоимость доставки по умолчанию
        return self::$novaposhtaOptions['deliveryToDoorWeight_default'];
    }
    
    /**
     * расчет стоимости доставки ТК Новая Почта
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $product - массив данных перевозимого продукта
     */
    protected function novaposhtaIMEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $product)
    {
        
        // проверить валидность для расчета стоимости доставки
        // проудкт не валидный - расчитываем по обычной схеме
        if (!$product['isAvailableEstimateCost']) {
            // вернуть обычный расчет стоимости 
            return $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $product);
        }
        
        // продукт валидный
        // получить максимальный вес продукта
        $maxWeight = $product['maxWeight'];
        
        // если максимальный вес в пределах тарифа Интернет Магазина
        // производим расчет по тариыу Интерент Магазина
        if ($product['quantity'] * $maxWeight < self::$novaposhtaOptions['maxWeight']) {
            
            // получить параметры  из файла настроек
            $containerParameters = $this->getContainer()->getParameter('novaposhta');
            
            // страховка
            $insurance = ($product['quantity'] * $product['priceOut'] > self::$novaposhtaOptions['minSumInsurance'])
                ? $product['quantity'] * $product['priceOut'] * self::$novaposhtaOptions['percentInsurance']
                : self::$novaposhtaOptions['minSumInsurance'] * self::$novaposhtaOptions['percentInsurance'];
            
            // стоимость доставки
            $costTk = $product['quantity'] * $maxWeight * self::$novaposhtaOptions['tarifKg'] 
                    + self::$novaposhtaOptions['сostServiceDelivery']
                    + $insurance;
            
            // стоимоть обратной доставки 
            $costBack = self::$novaposhtaOptions['сostServiceBack'] 
                        + $product['quantity'] * $product['priceOut'] * self::$novaposhtaOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse 
                        + self::novaposhtaDeliveryToDoorByWeight($product['quantity'] * $maxWeight);
            
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
            
            // получить время доставки Склад-Склад
            $xmlDateWarehouse = $this->novaposhtaApiSendRequest($xmlRequestToWarehouse);
            if ($xmlDateWarehouse instanceof \SimpleXMLElement && isset($xmlDateWarehouse->estimatedDeliveryDate)) {
                // дата доставки Склад-Склад
                $dateToWarehouse = \DateTime::createFromFormat('d.m.Y', (string)$xmlDateWarehouse->estimatedDeliveryDate);
            }
            
            // результирующий массив 
            $result = array(
                // стоимость даставки
                'costTk' => self::round($costTk),
                // стоимость обратной доставки
                'costBack' => self::round($costBack),
                // Склад-Склад
                'costToWarehouse' => self::round($costToWarehouse),
                // Склад-Двері
                'costToDoor' => self::round($costToDoor),
                // дата доставки 
                'date' => (isset($dateToWarehouse)) ? $dateToWarehouse->getTimestamp() : null,
            );
            
            // вернуть результирующий массив
            return $result;
        }
        
        // максимальный вес за пределами тарифа Интернет Магазина
        // производим расчет по обычному тарифу
        // вернуть обычный расчет стоимости 
        return $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $product);
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
        if ($product['isAvailableEstimateCost']) {
            
            // получить максимальный вес продукта
            $maxWeight = $product['maxWeight'];
            
            // xml запрос стоимость доставки до склада
            $xmlRequestToWarehouse = '<?xml version="1.0" encoding="UTF-8"?>
                <file>
                    <auth>'.$containerParameters['api_token'].'</auth>
                        <countPrice>
                            <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                            <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                            <mass>'         . $maxWeight            . '</mass>
                            <height>'       . $product['height']    . '</height>
                            <width>'        . $product['width']     . '</width>
                            <depth>'        . $product['length']    . '</depth>
                            <publicPrice>'  . $product['priceOut']  . '</publicPrice>
                            <deliveryType_id>4</deliveryType_id>
                            <date>'.$this->getParameter('sendDate')->format('d.m.Y').'</date>
                        </countPrice>
                    </file>';
            
            // получить стоимость склад-склад
            $xmlCostWarehouse = $this->novaposhtaApiSendRequest($xmlRequestToWarehouse);
            if (!$xmlCostWarehouse instanceof \SimpleXMLElement || !isset($xmlCostWarehouse->date) || !isset($xmlCostWarehouse->cost)) {
                // получен не правильны ответ от сервера
                return null;
            }
            
            // стоимость доставки
            $costTk = // $product['quantity'] * $product['priceOut'] * self::$novaposhtaOptions['percentProductCost']
                                // + self::$novaposhtaOptions['сostServiceDelivery']  + 
                                // в ответе НП $xmlCostWarehouse->cost уже учтено percentProductCost и сostServiceDelivery
                                ($product['quantity'] * str_replace(',', '.', (string)$xmlCostWarehouse->cost));
            
            // стоимоть обратной доставки 
            $costBack = self::$novaposhtaOptions['сostServiceBack'] 
                        + $product['quantity'] * $product['priceOut'] * self::$novaposhtaOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
                
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse 
                        + self::novaposhtaDeliveryToDoorByWeight($product['quantity'] * $maxWeight);
            
            // дата доставки Склад-Склад
            $dateToWarehouse = \DateTime::createFromFormat('d.m.Y', (string)$xmlCostWarehouse->date);
            
            // результирующий массив 
            $result = array(
                // стоимость даставки
                'costTk' => self::round($costTk),
                // стоимость обратной доставки
                'costBack' => self::round($costBack),
                // Склад-Склад
                'costToWarehouse' => self::round($costToWarehouse),
                // Склад-Двері
                'costToDoor' => self::round($costToDoor),
                // дата доставки 
                'date' => $dateToWarehouse->getTimestamp(),
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
        
        // получить время доставки Склад-Склад
        $xmlDateWarehouse = $this->novaposhtaApiSendRequest($xmlRequestToWarehouse);
        if ($xmlDateWarehouse instanceof \SimpleXMLElement && isset($xmlDateWarehouse->estimatedDeliveryDate)) {
            // дата доставки Склад-Склад
            $dateToWarehouse = \DateTime::createFromFormat('d.m.Y', (string)$xmlDateWarehouse->estimatedDeliveryDate);
        }
        
        // результирующий массив 
        $result = array(
            // стоимость даставки
            'costTk' => null,
            // стоимость обратной доставки
            'costBack' => null,
            // Склад-Склад
            'costToWarehouse' => null,
            // Склад-Двері
            'costToDoor' => null,
            // дата доставки 
            'date' => (isset($dateToWarehouse)) ? $dateToWarehouse->getTimestamp() : null,
        );
        
        // вернуть результирующий массив
        // расчет врмени доставки
        return $result;
    }
    
    
    
    /**
     * расчет стоимости доставки ТК Мист Експресс
     * @link https://redmine.nitra.ua/issues/37027 - в титекете ссылка на googledocs
     * @link https://docs.google.com/a/nitralabs.com/file/d/0B1wTeH74WNScMEgzbzkzUFR5WUpwbV81NGY2OE5aWUhwMWZN/edit
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $product - массив данных перевозимого продукта
     * @info xml
     *      SenderService   - вид сервиса отправитель
     *      ReceiverService - вид сервиса получатель
     *                          Вид сервісу (Обов’язковий),
     *                          якщо: 
     *                          "0" - склад
     *                          "1" - двері
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function meestexpressEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $product)
    {
        // kontrabas 
        // индивидульные настройки
        if ($this->client->getName() == 'kontrabas') {
            // % услуги по формлению наложенного платежа
            self::$meestexpressOptions['percentPOD'] = 0.012;
        }
        
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('meestexpress');
        
        // проверить валидность для расчета стоимости доставки
        if ($product['isAvailableEstimateCost']) {
            
            // получить максимальный вес продукта
            $maxWeight = $product['maxWeight'];
            
            // получить формат отправки для продукта
            $sendingFormat = $this->meestexpressGetSendingFormatForProduct($product);
            
            // xml запрос стоимость доставки до склада
            $xmlRequestToWarehouse = '
                <CalculateShipment>
                    <ClientUID>'    . $containerParameters['clientUID'] . '</ClientUID>
                    <SenderService>0</SenderService>
                    <SenderBranch_UID>' . $fromWarehouse->getBusinessKey() . '</SenderBranch_UID>
                    <SenderCity_UID></SenderCity_UID>
                    <ReceiverService>0</ReceiverService>
                    <ReceiverBranch_UID>' . $toWarehouse->getBusinessKey() . '</ReceiverBranch_UID>
                    <ReceiverCity_UID></ReceiverCity_UID>
                    <COD>'.$product['priceOut'].'</COD>
                    <Conditions_items>
                        <ContitionsName></ContitionsName>
                    </Conditions_items>
                    <Places_items>
                        <SendingFormat>'.(($sendingFormat) ? $sendingFormat['Code'] : '').'</SendingFormat>
                        <Quantity>' . $product['quantity'] . '</Quantity>
                        <Weight>'   . $maxWeight . '</Weight>
                        <Length>'   . $product['length'] . '</Length>
                        <Width>'    . $product['width'] . '</Width>
                        <Height>'   . $product['height'] . '</Height>
                        <Packaging />
                        <Insurance>'. $product['priceOut'] /*(($sendingFormat) ? $sendingFormat['MinInsurance'] : '')*/ .'</Insurance>
                    </Places_items>
                </CalculateShipment>';
            
            // xml запрос стоимость доставки до двери
            $xmlRequestToDoor = '
                <CalculateShipment>
                    <ClientUID>'    . $containerParameters['clientUID'] . '</ClientUID>
                    <SenderService>0</SenderService>
                    <SenderBranch_UID>' . $fromWarehouse->getBusinessKey() . '</SenderBranch_UID>
                    <SenderCity_UID></SenderCity_UID>
                    <ReceiverService>1</ReceiverService>
                    <ReceiverBranch_UID>' . $toWarehouse->getBusinessKey() . '</ReceiverBranch_UID>
                    <ReceiverCity_UID>'.$toWarehouse->getCity()->getBusinessKey().'</ReceiverCity_UID>
                    <COD>'.$product['priceOut'].'</COD>
                    <Conditions_items>
                        <ContitionsName></ContitionsName>
                    </Conditions_items>
                    <Places_items>
                        <SendingFormat>'.(($sendingFormat) ? $sendingFormat['Code'] : '').'</SendingFormat>
                        <Quantity>' . $product['quantity'] . '</Quantity>
                        <Weight>'   . $maxWeight . '</Weight>
                        <Length>'   . $product['length'] . '</Length>
                        <Width>'    . $product['width'] . '</Width>
                        <Height>'   . $product['height'] . '</Height>
                        <Packaging />
                        <Insurance>'. $product['priceOut'] /*(($sendingFormat) ? $sendingFormat['MinInsurance'] : '')*/ .'</Insurance>
                    </Places_items>
                </CalculateShipment>';      
            
            // получить стоимость склад-склад
            $xml = $this->meestexpressGetXmlDocument('CalculateShipments', $xmlRequestToWarehouse, '', 1);
            $xmlCostWarehouse = $this->meestexpressApiSendRequest('1C_Document.php', $xml, 'result_table/items');
            if (!$xmlCostWarehouse || !isset($xmlCostWarehouse[0]) || !isset($xmlCostWarehouse[0]->PriceOfDelivery)) {
                // получен не правильны ответ от сервера
                return null;
            }
            
            // получить стоимость склад-двери
            $xml = $this->meestexpressGetXmlDocument('CalculateShipments', $xmlRequestToDoor, '', 1);
            $xmlCostDoor = $this->meestexpressApiSendRequest('1C_Document.php', $xml, 'result_table/items');
            if (!$xmlCostDoor || !isset($xmlCostDoor[0]) || !isset($xmlCostDoor[0]->PriceOfDelivery)) {
                // получен не правильны ответ от сервера
                return null;
            }
            
            
            // стоимость доставки
            $costTk = // в ответе $xmlCostWarehouse уже учтено percentProductCost и сostServiceDelivery
                    ($product['quantity'] * str_replace(',', '.', (string)$xmlCostWarehouse[0]->PriceOfDelivery));
            
//            // kontrabas временно комментируем: в параметрах подключения к Мист Експресс используем данные контрабаса, которые учитывают скидку.
//            // добавить скидку для клиента
//            if ($costTk > 0 && $this->client->getName() == 'kontrabas') {
//                // Скидка 1% процент
//                $discount = ($costTk*0.01); 
//                $costTk = $costTk - $discount;
//            }
            
            
            // стоимоть обратной доставки 
            $costBack = $product['quantity'] * $product['priceOut'] * self::$meestexpressOptions['percentPOD'];
            // стоимость меньше минимальной
            if ($costBack < self::$meestexpressOptions['podMin']) {
                // установить минимальную стоимость
                $costBack = self::$meestexpressOptions['podMin'];
            }
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
                
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = // $costToWarehouse 
                          // + self::novaposhtaDeliveryToDoorByWeight($product['quantity'] * $maxWeight);
                    $costBack
                    + ($product['quantity'] * str_replace(',', '.', (string)$xmlCostDoor[0]->PriceOfDelivery));
            
            // дата доставки Склад-Склад
            $dateToWarehouse = ''; // \DateTime::createFromFormat('d.m.Y', (string)$xmlCostWarehouse->date);
            
            // результирующий массив 
            $result = array(
                // стоимость даставки
                'costTk' => self::round($costTk),
                // стоимость обратной доставки
                'costBack' => self::round($costBack),
                // Склад-Склад
                'costToWarehouse' => self::round($costToWarehouse),
                // Склад-Двері
                'costToDoor' => self::round($costToDoor),
                // дата доставки 
                'date' => $dateToWarehouse,
            );
            
            // вернуть результирующий массив
            // расчет стоимости доставки
            return $result;
        }
        
        // Продукты не валидные для расчета стоимости
        return null;
        
        // результирующий массив 
        $result = array(
            // стоимость даставки
            'costTk' => null,
            // стоимость обратной доставки
            'costBack' => null,
            // Склад-Склад
            'costToWarehouse' => null,
            // Склад-Двері
            'costToDoor' => null,
            // дата доставки 
            'date' => null,
        );
        
        // вернуть результирующий массив
        return $result;        
    }
    
    
}
