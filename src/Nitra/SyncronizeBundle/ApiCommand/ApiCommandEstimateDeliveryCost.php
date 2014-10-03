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
     * Получить сумарный максимальный вес по массиву продуктов
     * @param string $column    - имя столбца по которому производим суммирование
     * @param array  $products  - массив продуктов
     * @return float
     */
    private function getSumForProducts($column, array $products)
    {
        // начальное значение суммы
        $sum = 0;
        
        // обойти все продукты
        foreach($products as $product) {
            
            // проверить назичие столбца
            if (!isset($product[$column])) {
                // суммируемы столбец не найден перейти к след итерации
                continue;
            }
            
            // сумировать значение
            $sum += $product[$column];
        }
        
        // вернуть сумму 
        return $sum;
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
            // только для клиента kontrabas
            if ($deliveryId == self::$deliveryIdNovaposhta &&
                $this->client->getName() == 'kontrabas'
            ) {
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
        $products = array();
        foreach($this->getParameter('products') as $prKey => $product) {
            
            // проверить город отправитель 
            if (!isset($product['fromCityId']) || !$product['fromCityId']) {
                return 'Для продукта не указан обязаетльный параметр fromCityId.';
            }
            
            // вес продукта по умолчанию 
            if (!isset($product['weight']) || !$product['weight']) {
                $product['weight'] = 0;
            }
            
            // флаг доступности расчета стоимости доставки по продукту
            // по умолчанию true - предполагаем что продукт валидный для расчета стоимости доставки
            $product['isAvailableEstimateCost'] = true;
            
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
                $product['isAvailableEstimateCost'] = false;
            }
            
            // обнулить (инициализация)  объемный вес продукта
            $product['VWeight'] = 0;
            // обнулить (инициализация)  максимальный вес продукта
            $product['maxWeight'] = 0;
            
            // если продукт доступен для расчета стоимости доставки
            // расчитать объемный вес продукта 
            // расчитать максимальный вес продукта
            if ($product['isAvailableEstimateCost']) {
                // продукт валидный 
                // расчитать объемный вес продукта 
                $product['VWeight'] = $product['quantity'] * self::getVWeight($product['width'], $product['height'], $product['length']);
                // расчитать максимальный вес продукта
                $product['maxWeight'] = $product['quantity'] * self::getMaxWeight($product['weight'], $product['width'], $product['height'], $product['length']);
                // стоимость продукта с учетом кол-ва
                $product['priceTotal'] = ($product['quantity'] * $product['priceOut']);
            }
            
            
            // инициализация харнилища отправляемых продуктов с одного города
            // группируем продукты по ID города отправителя
            if (!isset($products[$product['fromCityId']])) {
                $products[$product['fromCityId']] = array(
                    // реузультирующий массив расчетов доставки
                    'estimateCost' => array(),
                    // массив доставляемых продуктов
                    'products' => array(),
                );
            }
            
            // запомнить продукт 
            // ID города => массив продуктов отправляемых с этого города
            $products[$product['fromCityId']]['products'][] = $product;
        }
        
        // обновить массив параметров, обновить доставляемые продукты
        $this->setParameter('estimateProducts', $products);
        
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
        // лимит времени - 30 сек.
        // микросекунды (1 сек = 1000000)
        $timeoutLimit = 30000000;
        
        // получить массив доставляемых продуктов
        $estimateProducts = $this->getParameter('estimateProducts');
        
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
            
            // расчитать стоимость доставки продуктов 
            // из каждого города по каждой ТК 
            foreach($estimateProducts as $fromCityId => $estimateData) {
                
                // получить первый склад ТК в городе отправителе
                $fromWarehouse = $this->em
                    ->getRepository('NitraDeliveryBundle:Warehouse')
                    ->getFirstDeliveryWarehouseInGeoCity($deliveryId, $fromCityId);
                
                // склад отправитель не найден
                if(!$fromWarehouse) {
                    // перейти к след. продукту
                    continue;
                }
                
                // в зависимости от ID ТК 
                // используем ее собсвенные методы расчета
                switch($deliveryKey) {
                    
                    // для каждой ТК вызов метода расчет обрамлен в try ... catch 
                    // если возникает ошибка по какой-то одной ТК 
                    // то не будет результата расчета по всем ТК 
                    // другими словами 
                    // если нет try ... catch  для каждой ТК 
                    // и в расчете ТК Интайм возникала ошибка то не будет результатов и по другим ТК 
                    
                    // ТК Новая Почта
                    case self::$deliveryIdNovaposhta:
                        // попытка выполнить расчет 
                        try {
                            // выполнить расчет с ограничением по времени
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $estimateData){
                                return $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $estimateData['products']);
                            }, $timeoutLimit);
                            // запомнить результат
                            $estimateProducts[$fromCityId]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;
                    
                    // ТК Новая Почта ИМ
                    case self::$deliveryIdNovaposhtaIM:
                        try {
                            // выполнить расчет с ограничением по времени
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $estimateData){
                                return $this->novaposhtaIMEstimate($fromWarehouse, $toWarehouse, $estimateData['products']);
                            }, $timeoutLimit);
                            // запомнить результат
                            $estimateProducts[$fromCityId]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;
                    
                    // ТК ИнТайм
                    case self::$deliveryIdIntime:
                        try {
                            // выполнить расчет с ограничением по времени
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $estimateData){
                                return $this->intimeEstimate($fromWarehouse, $toWarehouse, $estimateData['products']);
                            }, $timeoutLimit);
                            // запомнить результат
                            $estimateProducts[$fromCityId]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;

                    // ТК Автолюкс
                    case self::$deliveryIdAutolux:
                        try {
                            // выполнить расчет с ограничением по времени
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $estimateData){
                                return $this->autoluxEstimate($fromWarehouse, $toWarehouse, $estimateData['products']);
                            }, $timeoutLimit);
                            // запомнить результат
                            $estimateProducts[$fromCityId]['estimateCost'][$deliveryKey] = $estimateCost;
                        } catch (\Exception $ex) {}
                        break;

                    // ТК Мист Експерсс
                    case self::$deliveryIdMeestexpress:
                        try {
                            // выполнить расчет с ограничением по времени
                            $estimateCost = $timeout->process(function() use ($fromWarehouse, $toWarehouse, $estimateData){
                                return $this->meestexpressEstimate($fromWarehouse, $toWarehouse, $estimateData['products']);
                            }, $timeoutLimit);
                            // запомнить результат
                            $estimateProducts[$fromCityId]['estimateCost'][$deliveryKey] = $estimateCost;
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
        
        // результирующий массив доставляемых продуктов
        $products = array();
        
        // вес продуктов
        $totalWeight = 0;
        
        // объемный вес продуктов
        $totalVWeight = 0;
        
        // обойти массив продуктов, 
        // расчитать флаги и счетчики в результирующм массиве ТК
        // наполнить сортировочные массивы дат доставки
        foreach($estimateProducts as $fromCityId => $estimateData) {
            
            // обойти результаты расчета по ТК
            foreach($estimateData['estimateCost'] as $deliveryKey => $estimateCost) {
                
                // проверить массв расчетов по ТК 
                if (!$estimateCost) {
                    // нет данных перейти к след итерации цикла
                    continue;
                }
                
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
            
            
            // обойти все продукты
            foreach($estimateData['products'] as $prKey => $product) {
                
                // обновить вес продуктов
                $totalWeight += $product['weight'];

                // обновить объемный вес продуктов
                $totalVWeight += $product['VWeight'];
                
                // массив ТК доступных для доставки продукта
                $estimateData['products'][$prKey]['deliveries'] = array();
                foreach($this->deliveries as $deliveryKey => $delivery) {
                    $estimateData['products'][$prKey]['deliveries'][$deliveryKey] = array(
                        // название ТК 
                        'name' => $delivery['name'],
                        // флаг ТК пожет доставить продукт
                        'isAvailable' => $this->deliveries[$deliveryKey]['isAvailable'],
                    );
                }
                
            }
            
            // запомнить массив пролуктов результирующем
            // массив продуктов
            $products = array_merge($products, $estimateData['products']);
        }
        
        
        // обойти результирующий массив ТК
        // для обновления даты доставки
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
            'totalWeight' => ceil($totalWeight),
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
     * @param array $products - массив доставляемых продуктов
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function autoluxEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $products)
    {
        // АвтоЛюкс нет интерфейса расчета даты доставки
        // предоставлен только расчет стоимости
        
        // сумарная стоимость продуктов
        // стоимость всех продуктов
        $sumPriceTotal = $this->getSumForProducts('priceTotal', $products);
        
        // сумарный максимальный вес по всем продуктам
        // вес всех продуктов
        $sumWeight = $this->getSumForProducts('maxWeight', $products);
        
        // проверить валидность расчета 
        if (!$sumWeight || !$sumPriceTotal) {
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
        $bigestValue = 0;
        foreach($products as $product) {
            // продукт валидный
            if ($product['isAvailableEstimateCost']) {
                // расчитать объем
                $bigestValue += $product['quantity'] 
                                * ($product['width'] * 0.01 * $product['height'] * 0.01 * $product['length'] * 0.01) 
                                * $apiResponse->volume;
            }
        }
        // проверка большего знаяения 
        if($sumWeight * $apiResponse->weight > $bigestValue) {
            $bigestValue = $sumWeight * $apiResponse->weight;
        }
        
        // стоимость доставки
        $costTk = $bigestValue 
                + self::$autoluxOptions['сostServiceDelivery']
                + self::$autoluxOptions['percentInsurance'] * $sumPriceTotal / 100;
        
        // kontrabas 
        // добавить скидку для клиента
        if ($costTk > 0 && $this->client->getName() == 'kontrabas') {
            // Скидка 10% процентов
            $discount = ($costTk*0.1); 
            $costTk = $costTk - $discount;
        }
        
        // стоимоть обратной доставки 
        $costBack = self::$autoluxOptions['percentPOD'] 
                    * $sumPriceTotal / 100 
                    + self::$autoluxOptions['сostServiceBack'];
        
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
     * @param array $products - массив доставляемых продуктов
     * @info    array options
     *          VidPerevozki - тип доставки: 
     *              1 - Дверь-Дверь;
     *              4 - Дверь-Склад; 
     *              3 - Склад-Дверь; 
     *              2 - Склад-Склад;
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function intimeEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $products)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('intime');
        
        // сумарная стоимость продуктов
        // стоимость всех продуктов
        $sumPriceTotal = $this->getSumForProducts('priceTotal', $products);
        
        // сумарный максимальный вес по всем продуктам
        // вес всех продуктов
        $sumWeight = $this->getSumForProducts('maxWeight', $products);
        
        // суммарное кол-во всех продуктов
        $sumQuantity = $this->getSumForProducts('quantity', $products);
        
        // получить объем
        $sumObyom = 0;
        foreach($products as $product) {
            // продукт валидный
            if ($product['isAvailableEstimateCost']) {
                // расчитать объем
                $sumObyom += $product['quantity'] * ($product['width'] * 0.01 * $product['height'] * 0.01 * $product['length'] * 0.01);
            }
        }
        
        // создать soap
        $soapClient = new \SoapClient($containerParameters['soap_url']);
        
        // проверить валидность для расчета стоимости доставки
        // проверить вес доставдяемых продуктов 
        if ($sumWeight) {
            
            // общий массив параметров расчета
            $optionsCommon = array(
                'Oplachivaet' => (($this->hasParameter('Oplachivaet')) ? $this->hasParameter('Oplachivaet') : 'POL'),
                'DataOtpravki' => $this->getParameter('sendDate')->format('Ymd'),
                'GorodOtpravitel' => $fromWarehouse->getCity()->getBusinessKey(),
                'GorodPoluchatel' => $toWarehouse->getCity()->getBusinessKey(),
                'KontragentPoluchatel' => (($this->hasParameter('KontragentPoluchatel')) ? $this->hasParameter('KontragentPoluchatel') : 'Покупатель'),
                'OpisanieGruza' => (($this->hasParameter('OpisanieGruza')) ? $this->hasParameter('OpisanieGruza') : '114'),
                'Ves' => $sumWeight,
                'Obyom' => $sumObyom,
                'Cennost' => ($sumPriceTotal < self::$intimeOptions['minSumInsurance']) ? self::$intimeOptions['minSumInsurance'] : $sumPriceTotal, 
                'SposobOplaty' => (($this->hasParameter('SposobOplaty')) ? $this->hasParameter('SposobOplaty') : 'Nal'),
                'KvoMest' => $sumQuantity,
//                'KvoMest' => (($this->hasParameter('KvoMest')) ? $this->hasParameter('KvoMest') : '1'),
                'PostService' => (($this->hasParameter('PostService')) ? $this->hasParameter('PostService') : '1'),
                'Upakovka' => (($this->hasParameter('Upakovka')) ? $this->hasParameter('Upakovka') : 'ЦОФ-00067'),
                'KolichestvoUpakovok' => $sumQuantity,
//                'KolichestvoUpakovok' => (($this->hasParameter('KolichestvoUpakovok')) ? $this->hasParameter('KolichestvoUpakovok') : '1'),
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
            
            // стоимость доставки
            // в ответе ИнТайм $xmlCostWarehouse[0] уже учтено percentProductCost и сostServiceDelivery
            $costTk = str_replace(',', '.', (string)$xmlCostWarehouse[0]);
            
            // стоимоть обратной доставки 
            $costBack = self::$intimeOptions['сostServiceDelivery'] 
                        + self::$intimeOptions['сostServiceBack'] 
                        + $sumPriceTotal * self::$intimeOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse
                        + self::intimeDeliveryToDoorByWeight($sumWeight);
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
     * @param array $products - массив доставляемых продуктов
     */
    protected function novaposhtaIMEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $products)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('novaposhta');
        
        // сумарная стоимость продуктов
        // стоимость всех продуктов
        $sumPriceTotal = $this->getSumForProducts('priceTotal', $products);
        
        // сумарный максимальный вес по всем продуктам
        // вес всех продуктов
        $sumWeight = $this->getSumForProducts('maxWeight', $products);
        
        // если вес в пределах тарифа Интернет Магазина
        // производим расчет по тариыу Интерент Магазина
        if ($sumWeight && $sumWeight < self::$novaposhtaOptions['maxWeight']) {
            
            // страховка
            $insurance = ($sumPriceTotal > self::$novaposhtaOptions['minSumInsurance'])
                ? $sumPriceTotal * self::$novaposhtaOptions['percentInsurance']
                : self::$novaposhtaOptions['minSumInsurance'] * self::$novaposhtaOptions['percentInsurance'];
            
            // стоимость доставки
            $costTk = $sumWeight * self::$novaposhtaOptions['tarifKg'] 
                    + self::$novaposhtaOptions['сostServiceDelivery']
                    + $insurance;
            
            // стоимоть обратной доставки 
            $costBack = self::$novaposhtaOptions['сostServiceBack'] 
                        + $sumPriceTotal * self::$novaposhtaOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
            
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse 
                        + self::novaposhtaDeliveryToDoorByWeight($sumWeight);
            
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
        return $result = $this->novaposhtaEstimate($fromWarehouse, $toWarehouse, $products);
    }
    
    /**
     * расчет стоимости доставки ТК Новая Почта
     * @link http://orders.novaposhta.ua/api.php?todo=api_form
     * @param Warehouse $fromWarehouse - склда отправитель
     * @param Warehouse $toWarehouse - склда получатель
     * @param array $products - массив доставляемых продуктов
     * @info xml deliveryType_id - тип доставки
     *              1 - Двері-Двері; 
     *              2 - Двері-Склад; 
     *              3 - Склад-Двері; 
     *              4 - Склад-Склад;
     * @return array - стоимость доставки
     * @return null - нет данных по расчету стоимости доставки
     */
    protected function novaposhtaEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $products)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('novaposhta');
        
        // сумарная стоимость продуктов
        // стоимость всех продуктов
        $sumPriceTotal = $this->getSumForProducts('priceTotal', $products);
        
        // сумарный максимальный вес по всем продуктам
        // вес всех продуктов
        $sumWeight = $this->getSumForProducts('maxWeight', $products);
        if ($sumWeight > 0) {
            
            // xml запрос стоимость доставки до склада
            $xmlRequestToWarehouse = '<?xml version="1.0" encoding="UTF-8"?>
                <file>
                    <auth>'.$containerParameters['api_token'].'</auth>
                        <countPrice>
                            <senderCity>'.(string)$fromWarehouse->getCity()->getNameTk().'</senderCity>
                            <recipientCity>'.(string)$toWarehouse->getCity()->getNameTk().'</recipientCity>
                            <mass>'         . $sumWeight    . '</mass>
                            <publicPrice>'  . $sumPriceTotal  . '</publicPrice>
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
            // в ответе НП $xmlCostWarehouse->cost уже учтено percentProductCost и сostServiceDelivery
            $costTk = str_replace(',', '.', (string)$xmlCostWarehouse->cost);
            
            // стоимоть обратной доставки 
            $costBack = self::$novaposhtaOptions['сostServiceBack'] 
                        + $sumPriceTotal * self::$novaposhtaOptions['percentPOD'];
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
                
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costToWarehouse 
                        + self::novaposhtaDeliveryToDoorByWeight($sumWeight);
            
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
        
        // для доставляемых продуктов не указан вес 
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
     * @param array $products - массив доставляемых продуктов
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
    protected function meestexpressEstimate(Warehouse $fromWarehouse, Warehouse $toWarehouse, array $products)
    {
        // kontrabas 
        // индивидульные настройки
        if ($this->client->getName() == 'kontrabas') {
            // % услуги по формлению наложенного платежа
            self::$meestexpressOptions['percentPOD'] = 0.012;
        }
        
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('meestexpress');
        
        // сумарная стоимость продуктов
        // стоимость всех продуктов
        $sumPriceTotal = $this->getSumForProducts('priceTotal', $products);
        
        // сумарный максимальный вес по всем продуктам
        // вес всех продуктов
        $sumWeight = $this->getSumForProducts('maxWeight', $products);
        if ($sumWeight > 0) {
            
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
                    <COD>'.$sumPriceTotal.'</COD>
                    <Conditions_items>
                        <ContitionsName></ContitionsName>
                    </Conditions_items>
                    ';
            
            // xml запрос стоимость доставки до двери 
            $xmlRequestToDoor = '
                <CalculateShipment>
                    <ClientUID>'    . $containerParameters['clientUID'] . '</ClientUID>
                    <SenderService>0</SenderService>
                    <SenderBranch_UID>' . $fromWarehouse->getBusinessKey() . '</SenderBranch_UID>
                    <SenderCity_UID></SenderCity_UID>
                    <ReceiverService>1</ReceiverService>
                    <ReceiverBranch_UID>' . $toWarehouse->getBusinessKey() . '</ReceiverBranch_UID>
                    <ReceiverCity_UID></ReceiverCity_UID>
                    <COD>'.$sumPriceTotal.'</COD>
                    <Conditions_items>
                        <ContitionsName></ContitionsName>
                    </Conditions_items>
                    ';
            
            // обойти все продукты
            foreach($products as $product) {
                
                // получить формат отправки для продукта
                $sendingFormat = $this->meestexpressGetSendingFormatForProduct($product);
                
                // добавить данные продукта в запрос до склада
                $xmlRequestToWarehouse .= '
                    <Places_items>
                    <SendingFormat>'.(($sendingFormat) ? $sendingFormat['Code'] : '').'</SendingFormat>
                    <Quantity>' . $product['quantity']  . '</Quantity>
                    <Weight>'   . $product['maxWeight'] . '</Weight>
                    <Length>'   . $product['length']    . '</Length>
                    <Width>'    . $product['width']     . '</Width>
                    <Height>'   . $product['height']    . '</Height>
                    <Packaging />
                    <Insurance>'. $product['priceOut'] /*(($sendingFormat) ? $sendingFormat['MinInsurance'] : '')*/ .'</Insurance>
                    </Places_items>
                    ';
                
                // добавить данные продукта в запрос до двери
                $xmlRequestToDoor .= '
                    <Places_items>
                    <SendingFormat>'.(($sendingFormat) ? $sendingFormat['Code'] : '').'</SendingFormat>
                    <Quantity>' . $product['quantity']  . '</Quantity>
                    <Weight>'   . $product['maxWeight'] . '</Weight>
                    <Length>'   . $product['length']    . '</Length>
                    <Width>'    . $product['width']     . '</Width>
                    <Height>'   . $product['height']    . '</Height>
                    <Packaging />
                    <Insurance>'. $product['priceOut'] /*(($sendingFormat) ? $sendingFormat['MinInsurance'] : '')*/ .'</Insurance>
                    </Places_items>
                    ';
                
                
            }
            
            // завершение запроста до склада
            $xmlRequestToWarehouse .= '
                </CalculateShipment>';
            
            // завершение запроста до двери
            $xmlRequestToDoor.= '
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
            // в ответе $xmlCostWarehouse уже учтено percentProductCost и сostServiceDelivery
            $costTk = str_replace(',', '.', (string)$xmlCostWarehouse[0]->PriceOfDelivery);
            
//            // kontrabas временно комментируем: в параметрах подключения к Мист Експресс используем данные контрабаса, которые учитывают скидку.
//            // добавить скидку для клиента
//            if ($costTk > 0 && $this->client->getName() == 'kontrabas') {
//                // Скидка 1% процент
//                $discount = ($costTk*0.01); 
//                $costTk = $costTk - $discount;
//            }
            
            
            // стоимоть обратной доставки 
            $costBack = $sumPriceTotal * self::$meestexpressOptions['percentPOD'];
            // стоимость меньше минимальной
            if ($costBack < self::$meestexpressOptions['podMin']) {
                // установить минимальную стоимость
                $costBack = self::$meestexpressOptions['podMin'];
            }
            
            // итоговая стоимость доставки Склад-Склад
            $costToWarehouse = ($costTk + $costBack);
                
            // итоговая стоимость доставки Склад-Двери
            $costToDoor = $costBack
                        + str_replace(',', '.', (string)$xmlCostDoor[0]->PriceOfDelivery);
            
            // дата доставки Склад-Склад
            $dateToWarehouse = null; // \DateTime::createFromFormat('d.m.Y', (string)$xmlCostWarehouse->date);
            
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
    }
    
    
}
