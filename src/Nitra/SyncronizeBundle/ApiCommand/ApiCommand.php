<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Nitra\DeliveryBundle\Entity\Client;

/**
 * ApiCommand
 * Общий класс API DeliverySync
 */
class ApiCommand
{
    
    /**
     * @var ContainerInterface 
     */
    protected $container;
    
    /**
     * @var EntityManager
     */
    protected $em;
    
    /**
     * @var Nitra\DeliveryBundle\Entity\Client $client
     */
    protected $client;
    
    /**
     * @var array $parameters - массив параметров команды
     */
    protected $parameters;    
    
    
    /**
     * @var cache
     * Nitra\SyncronizeBundle\Services\NitraSyncronizeApc
     */
    protected $apc;

    /**
     * constructor
     * @param Client $client     - клиент 
     * @param array  $parameters - массив параметров команды
     */
    public function __construct(ContainerInterface $container, Client $client, array $parameters=null)
    {
        // установить container
        $this->container = $container;
        
        // установить EntityManager
        $this->em = $container->get('doctrine.orm.entity_manager');
        
        // установить клиента
        $this->client = $client;
        
        // установить параметры выполнения команды
        $this->setParameters($parameters);
    }
    
    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }
    
    /**
     * получить сервис кеширования
     * @return Nitra\SyncronizeBundle\Services\NitraSyncronizeApc
     */
    public function getApc()
    {
        // кеш сервис ранее не получали 
        if ($this->apc === null) {
            // получить кеш сервис
            $this->apc = $this->getContainer()->get('nitra.syncronize.apc');
        }
        
        // вернуть кеш сервис
        return $this->apc;
    }

    /**
     * получить Client
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * получить массив parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }
    
    /**
     * установить массив parameters
     * @param array $parameters - массив устанавливаемых параметров
     * @return $this->parameters
     */
    public function setParameters(array $parameters=null)
    {
        // установить массив параметров 
        if ($parameters) {
            $this->parameters = $parameters;
        } else {
            $this->parameters = array();
        }
        
        // вернуть установленный массив параметров
        return $this->parameters;
    }
    
    /**
     * получить елемента массива parameters
     * @return mixed параметр елемента массива parameters
     * @throw Exception указанный параметр не найден
     */
    public function getParameter($parameterName)
    {
        // проверить параметр в массиве параметров
        if (!isset($this->parameters[$parameterName])) {
            throw new \Exception('Указанный параметр: '.$parameterName.' не найден в массиве параметров.');
        }
        
        // вернуть значение параметра
        return $this->parameters[$parameterName];
    }
    
    /**
     * проверить существование параметра
     * @return boolean - флаг существования параметра в массиве параметров
     * @return true    - параметр найден 
     * @return false   - параметр не найден 
     */
    public function hasParameter($parameterName)
    {
        // проверить параметр в массиве параметров
        if (isset($this->parameters[$parameterName])) {
            // параметр найден
            return true;
        }
        
        // параметр не найден
        return false;
    }
    
    /**
     * установить елемент массива parameters
     * @param string $parameterName - имя добавляемого параметра
     * @param mixed  $parameterValue - знаяение добавляемого параметра
     * @return $this->parameters[$parameterName] - массив всех параметров
     */
    public function setParameter($parameterName, $parameterValue=null)
    {
        // инищиализировать массив параметров
        if (!$this->parameters) {
            $this->parameters = array();
        }
        
        // установить новое знаение параметра
        $this->parameters[$parameterName] = $parameterValue;
        
        // вернуть значение добавленного параметра
        return $this->parameters[$parameterName];
    }
    
    
    /**
     * валидация команды 
     * @return boolean 
     *          true - валидация пройдена успешно
     *          false - валидация команды не пройдена
     */
    public function isValid()
    {
        // валидировать команду
        $errorMessage = $this->validateCommand();
        if ($errorMessage) {
            // валидация не пройдена
            return false;
        }
        
        // валидация пройдена успешно
        return true;
    }    
    
    /**
     * валидировать API команду
     * @return string - текст сообщения об ошибке 
     * @return false  - валидация пройдена успешно
     */
    public function validateCommand()
    {
        // валидация пройдена успешно
        return false;
    }
    
    /**
     * выполнить API команду
     * @param Client $client - клиент по которому проходит синхронизация 
     * @param array $options массив параметров синхронизации
     * @throw Exception - ошибка
     * @return mixed $result - результат выполнения команды
     */
    public function processCommand()
    {
        // валидировать команду
        $errorMessage = $this->validateCommand();
        if ($errorMessage) {
            throw new \Exception($errorMessage);
        }
        
        // @throw Необходимо добавить метод processCommand() в класс API команды
        throw new \LogicException('Необходимо добавить метод processCommand() в класс API команды.');
    }
    
    /**
     * Отправить запрос на сервер ТК Новая Почта
     * @param string $xmlRequest - отправлемый xml запрос
     * @param string $xpath - xml xpath в xml ответе
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function novaposhtaApiSendRequest($xmlRequest, $xpath=false)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('novaposhta');
        
        // отправить запрос на сервер 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $containerParameters['api_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        $xmlResponse = curl_exec($ch);
        curl_close($ch);
        
        // преобразовать получить массив из xml ответа 
        // получить xml
        $xml = simplexml_load_string($xmlResponse);
        // проверить xml 
        if ($xml instanceof \SimpleXMLElement) {
            
            // вернуть элемент в ответе
            if ($xpath) {
                return $xml->xpath($xpath);
            }
            
            // вернуть xml 
            return $xml;
        }
        
        // $xmlResponse не xml формат преобразование в массив не возможно
        return null;
    }
    
    
    /**
     * Получить xml Query ТК Мист Експресс
     * @param string $function  - название функции выполянемой на сервере ТК
     * @param string $where     - условие поиска
     * @param string $order     - сортировка
     * @return string           - xml
     */
    protected function meestexpressGetXmlQuery($function, $where='', $order='')
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('meestexpress');
        
        // подпись запроса = md5 ( login + password + function + where + order)
        $sign = md5($containerParameters['user'] . $containerParameters['password']
            . $function . $where . $order
        );
        
        // вернуть xml запрос
        return 
        '<?xml version="1.0" encoding="UTF-8"?>
            <param>
                <login>'    . $containerParameters['user'] . '</login>
                <function>' . $function . '</function>
                <where>'    . $where . '</where>
                <order>'    . $order . '</order>
                <sign>'     . $sign . '</sign>
            </param>';
    }
    
    /**
     * Получить xml Document ТК Мист Експресс
     * @param string    $function   - название функции выполянемой на сервере ТК
     * @param string    $request    - xml запрос 
     * @param string    $request_id - ID запроса используется для получения результатов по запросу
     * @param boolean   $wait       - флаг ожидание результата, держит соединение доя возвращения результата
     * @return string               - xml
     */
    protected function meestexpressGetXmlDocument($function, $request='', $request_id='', $wait='')
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('meestexpress');
        
        // подпись запроса = md5 ( login + password + function + where + order)
        $sign = md5($containerParameters['user'] . $containerParameters['password'] 
            . $function . $request . $request_id . $wait
        );
        
        // вернуть xml запрос
        return 
        '<?xml version="1.0" encoding="UTF-8"?>
            <param>
                <login>'        . $containerParameters['user'] . '</login>
                <function>'     . $function . '</function>
                <request>'      . $request . '</request>
                <request_id>'   . $request_id . '</request_id>
                <wait>'         . $wait . '</wait>
                <sign>'         . $sign . '</sign>
            </param>';
    }
    
    
    
    /**
     * Отправить запрос на сервер ТК Мист Експресс
     * @param string $scriptPath - название скрипта на который отправляется xml запрос
     * @param string $xmlRequest - отправлемый xml запрос
     * @param string $xpath - xml xpath в xml ответе
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function meestexpressApiSendRequest($scriptPath, $xmlRequest, $xpath=false)
    {
        // получить параметры  из файла настроек
        $containerParameters = $this->getContainer()->getParameter('meestexpress');
        
        // отправить запрос на сервер 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $containerParameters['api_url'].$scriptPath);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        $xmlResponse = curl_exec($ch);
        curl_close($ch);
        
        // преобразовать получить массив из xml ответа 
        // получить xml
        $xml = simplexml_load_string($xmlResponse);
        // проверить xml 
        if ($xml instanceof \SimpleXMLElement) {
            
            // вернуть элемент в ответе
            if ($xpath) {
                return $xml->xpath($xpath);
            }
            
            // вернуть xml 
            return $xml;
        }
        
        // $xmlResponse не xml формат преобразование в массив не возможно
        return null;
    }
    
    /**
     * Получить формат отправики ТК Мист Експресс для продукта
     * @param arrat $product массив данных продукта
     * @return array массив данных отправки
     */
    public function meestexpressGetSendingFormatForProduct(array $product)
    {
        
        // получить кеш 
        $apc = $this->getApc();
        
        // ключь кеша
        $cacheId = 'meestexpressShipmentFormats';
        
        // получить форматы 
        $apiShipmentFormats = $apc->apcFetch($cacheId, $has, function() use($apc, $cacheId) {
            // xml получения списка 
            $xml = $this->meestexpressGetXmlQuery('ShipmentFormats');
            // получить форматы доставки из ТК 
            $apiResponse = $this->meestexpressApiSendRequest('1C_Query.php', $xml , 'result_table/items');
            $apiArray = json_decode(json_encode($apiResponse), true);
            // сохранить данные в кеше 
            $apc->apcStore($cacheId, $apiArray, 24*60*60);
            // вернуть кешированные данные
            return $apiArray;
        });
        
        // доступные форматы 
        $allowForamts = array('PAX', 'PL5', 'PL7', 'PL1');
        $shipmentFormats = array();
        if ($apiShipmentFormats) {
            foreach($apiShipmentFormats as $shipmentFormat) {
                if (in_array($shipmentFormat['Code'], $allowForamts)) {
                    $shipmentFormats[$shipmentFormat['Code']] = $shipmentFormat;
                }
            }
        }
        
        // обойти все доступные форматы врнуть самый досутпный
        foreach($shipmentFormats as $shipmentFormat) {
            if ($product['maxWeight'] <= $shipmentFormat['MaxWeight']) {
                return $shipmentFormat;
            }
        }
        
        // доступный формат не найден
        return null;
    }
    
}
