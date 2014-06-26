<?php
namespace Nitra\SyncronizeBundle\Command\Meestexpress;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Meestexpress
 * Общий класс синхронизации 
 * ТК Meest Express
 */
abstract class MeestexpressSync extends ContainerAwareCommand
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
        
        // установить параметры команды
        $this->setParameters($this->getContainer()->getParameter('meestexpress'));
        
        // Получить ТК 
        $this->delivery = $this->em->getRepository('NitraDeliveryBundle:Delivery')->find($this->getParameter('delivery_id'));
        if (!$this->delivery) {
            throw new \Exception('Не найдена ТК по указанному параметру deliveryId: '.$this->getParameter('delivery_id'));
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
     * @param string $scriptPath - название скрипта на который отправляется xml запрос
     * @param string $xmlRequest - отправлемый xml запрос
     * @param string $xpath - путь в ответе 
     * @return array $responseArray - массив элемоенов SimpleXMLElement - ответ сервера
     */
    protected function apiSendRequest($scriptPath, $xmlRequest, $xpath=null)
    {
        
        // Сформировать URL для работы с API ТК 
        $apiUrl = $this->getParameter('api_url') . $scriptPath;
        
        // отправить запрос на сервер 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlRequest);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $xmlResponse = curl_exec($ch);
        curl_close($ch);
        
        // преобразовать получить массив из xml ответа 
        return $this->responseToArray($xmlResponse, $xpath);
    }
    
    /**
     * Получить xml 
     * @param string $function  - название функции выполянемой на сервере ТК
     * @param string $where     - условие поиска
     * @param string $order     - сортировка
     * @return string           - xml
     */
    protected function getXmlQuery($function, $where='', $order='')
    {
        // подпись запроса = md5 ( login + password + function + where + order)
        $sign = md5($this->getParameter('user') . $this->getParameter('password') 
            . $function . $where . $order
        );
        
        // вернуть xml запрос
        return 
        '<?xml version="1.0" encoding="UTF-8"?>
            <param>
                <login>'    . $this->getParameter('user') . '</login>
                <function>' . $function . '</function>
                <where>'    . $where . '</where>
                <order>'    . $order . '</order>
                <sign>'     . $sign . '</sign>
            </param>';
    }
    
    
}
