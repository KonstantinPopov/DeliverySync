<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\ORM\EntityManager;
use Nitra\DeliveryBundle\Entity\Client;


/**
 * ApiCommand
 * Общий класс API DeliverySync
 */
abstract class ApiCommand // implements ContainerAwareInterface
{
    
    // ID страны Украина
    protected static $countryIdUA = 1;
    
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
     * @param Doctrine\ORM\EntityManager $em
     * @param array $options Description
     */
    public function __construct(EntityManager $em, Client $client, array $parameters=null)
    {
        $this->em = $em;
        $this->client = $client;
        $this->setParameters($parameters);
    }
    
    /**
     * получить EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
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
