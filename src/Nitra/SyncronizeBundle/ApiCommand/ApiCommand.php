<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\ORM\EntityManager;
use Nitra\DeliveryBundle\Entity\Client;


/**
 * ApiCommand
 * Общий класс API DeliverySync
 */
abstract class ApiCommand implements ContainerAwareInterface
{
 
    /**
     * @var ID страны Украина
     */
    protected static $countryIdUA = 1;
    
    /**
     * @var ID страны Украина
     */
    protected static $deliveryIdNovaposhta = 1;
    
    /**
     * @var ContainerInterface|null
     */
    protected $container;
    
    /**
     * @var Doctrine\ORM\EntityManager $em
     */
    private $em;
    
    /**
     * @var Nitra\DeliveryBundle\Entity\Client $client
     */
    private $client;
    
    /**
     * @var array $options - массив параметров команды
     */
    private $parameters;
    
    /**
     * валидировать API команду
     * @return string - текст сообщения об ошибке 
     * @return false  - валидация пройдена успешно
     */
    abstract public function validateApi();

    /**
     * выполнить API команду
     * @param Client $client - клиент по которому проходит синхронизация 
     * @param array $options массив параметров синхронизации
     * @throw Exception - ошибка
     * @return mixed $result - результат выполнения команды
     */
    abstract public function processApi();
    
    /**
     * constructor
     * @param Client $client
     * @param array $options массив параметров команды
     */
    public function __construct(Client $client, array $parameters=null)
    {        
        $this->client = $client;
        $this->setParameters($parameters);
    }
    
    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * получить EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }
    
    /**
     * установить EntityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->em = $entityManager;
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
    public function setParameters(array $parameters=array())
    {
        // установить массив параметров 
        $this->parameters = $parameters;
        
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
    
}
