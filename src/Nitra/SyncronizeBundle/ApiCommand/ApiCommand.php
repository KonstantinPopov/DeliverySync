<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Nitra\DeliveryBundle\Entity\Client;

/**
 * ApiCommand
 * Общий класс API DeliverySync
 */
abstract class ApiCommand // implements ContainerAwareInterface
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
    
    
}
