<?php
namespace Nitra\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of SyncNovaposhta
 *
 * @author user
 */
abstract class SyncNovaposhta extends ContainerAwareCommand
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
     * получить елемента массива parameters
     */
    public function getParameter($parameterName)
    {
        // проверить параметр в массиве параметров
        if (isset($this->parameters[$parameterName])) {
            return $this->parameters[$parameterName];
        }
        
        // параметр не найден
        return null;
    }
    
    /**
     * выполнить подготовку перед выполенением
     * @thow /Exception если команда не полчает все необходимые данные для выполенения
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        // установить EntityManager
        $this->em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        
        // получить массив параметров
        $this->parameters = $this->getContainer()->getParameter('novaposhta');
        
        // проверить параметры
        if (!isset($this->parameters))  {
            throw new \Exception('Не указан token для авторизации в API ТК Новая Почта');
        }
        
        // проверить параметр delivery_id
        if (!isset($this->parameters['delivery_id']) || !$this->parameters['delivery_id'])  {
            throw new \Exception('Не указан ID ТК Новая Почта');
        }
        
        // проверить параметр api_url
        if (!isset($this->parameters['api_url']) || !$this->parameters['api_url'])  {
            throw new \Exception('Не указан обязательный параметр api_url');
        }
        
        // проверить параметр api_token
        if (!isset($this->parameters['api_token']) || !$this->parameters['api_token'])  {
            throw new \Exception('Не указан обязательный параметр api_token');
        }
        
        // Получить ТК 
        $this->delivery = $this->em->getRepository('NitraDeliveryBundle:Delivery')->find($this->parameters['delivery_id']);
        if (!$this->delivery) {
            throw new \Exception('Не найдена ТК по указанному delivery_id: '.$this->parameters['delivery_id']);
        }
    }
    
    /**
     * преобразует данные xml в массив объектов
     * @param string $xmlResponse ответ api новой почты
     * @param string $xpath - путь в ответе 
     * @return array массив ответа
     */
    protected function responseToArray($xmlResponse, $xpath)
    {
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
     * Отправить запрос на сервер
     * @param string $xmlRequest - отправлемый xml запрос
     * @param string $xpath - xml xpath в xml ответе
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function apiSendRequest($xmlRequest, $xpath)
    {
        // отправить запрос на сервер 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getParameter('api_url'));
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
