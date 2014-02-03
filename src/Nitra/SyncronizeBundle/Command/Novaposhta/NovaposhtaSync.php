<?php
namespace Nitra\SyncronizeBundle\Command\Novaposhta;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * NovaposhtaSync
 * Общий класс синхронизации 
 * ТК Новая Почта
 */
abstract class NovaposhtaSync extends ContainerAwareCommand
{
    
    /**
     * @var EntityManager 
     */
    private $em;
    
    /**
     * @var Nitra\DeliveryBundle\Entity\Delivery
     */
    private $delivery;
    
    /**
     * @var array массив параметров
     */
    private $parameters;
    
    /**
     * запрос получения списка городов 
     * @return string
     */
    abstract protected function getXmlRequest();

    /**
     * xpath xml ответа
     * @return string
     */
    abstract protected function getXmlXpath();
    
    /**
     * Выполнить синхронизацию
     * @param array $responseArray массив ответа 
     * @param OutputInterface $output 
     */
    abstract protected function processSync(array $responseArray, OutputInterface $output);
    
    /**
     * получить EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * получить Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
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
     * выполнить подготовку перед выполенением
     * @thow /Exception если команда не полчает все необходимые данные для выполенения
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        
        // установить EntityManager
        $this->em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        
        // получить параметры  из файла настроек
        $parameters = $this->getContainer()->getParameter('novaposhta');
        
        // установить параметр apiToken, авторизация в API ТК Новая Почта
        $this->setParameter('apiToken', $parameters['api_token']);
        
        // установить параметр apiUrl, ссылка синхронизации API ТК Новая Почта
        $this->setParameter('apiUrl', $parameters['api_url']);
        
        // ID страны Nitra\GeoBundle\Entity\Country
        $this->setParameter('countryId', $parameters['country_id']);
        
        // ID ТК Nitra\DeliveryBundle\Entity\Delivery
        $this->setParameter('deliveryId', $parameters['delivery_id']);
        
        // Получить ТК 
        $this->delivery = $this->em->getRepository('NitraDeliveryBundle:Delivery')->find($this->getParameter('deliveryId'));
        if (!$this->delivery) {
            throw new \Exception('Не найдена ТК по указанному параметру deliveryId: '.$this->getParameter('deliveryId'));
        }
    }
    
    /**
     * преобразует данные xml в массив объектов
     * @param string $xmlResponse ответ api новой почты
     * @param string $xpath - путь в ответе 
     * @return array массив ответа
     */
    protected function responseToArray($xmlResponse, $xpath=null)
    {
        // получить xml
        $xml = simplexml_load_string($xmlResponse);
        // проверить xml 
        if ($xml instanceof \SimpleXMLElement) {
            if ($xpath) {
                return $xml->xpath($xpath);
            } else {
                return $xml;
            }
        }
        
        // $xmlResponse не xml формат преобразование в массив не возможно
        return null;
    }    
    
    /**
     * Отправить запрос на сервер
     * @param string $xmlRequest - отправлемый xml запрос
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function apiSendRequest($xmlRequest)
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
        return $this->responseToArray($xmlResponse, $this->getXmlXpath());
    }
    
}
