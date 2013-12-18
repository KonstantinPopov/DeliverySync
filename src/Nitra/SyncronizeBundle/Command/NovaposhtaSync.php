<?php
namespace Nitra\SyncronizeBundle\Command;

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
     * выполнить подготовку перед выполенением
     * @thow /Exception если команда не полчает все необходимые данные для выполенения
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        
        // установить EntityManager
        $this->em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        
        // проверить параметр api_token
        if (!$this->getContainer()->hasParameter('novaposhta_api_token') ||
            !$this->getContainer()->getParameter('novaposhta_api_token')
        ) {
            throw new \Exception('Не указан обязательный параметр novaposhta_api_token в файле config/parameters.yml');
        }
        
        // проверить параметр api_url
        if (!$this->getContainer()->hasParameter('novaposhta_api_url') ||
            !$this->getContainer()->getParameter('novaposhta_api_url')
        ) {
            throw new \Exception('Не указан обязательный параметр novaposhta_api_url в файле config/parameters.yml');
        }
        
        // установить массив параметров таска 
        $this->parameters = array(
            
            // ID страны Nitra\GeoBundle\Entity\Country
            'countryId' => 1,
            
            // ID ТК Nitra\DeliveryBundle\Entity\Delivery
            'deliveryId' => 1,
            
            // установить параметр apiToken, авторизация в API ТК Новая Почта
            'apiToken' => $this->getContainer()->getParameter('novaposhta_api_token'),
            
            // установить параметр apiUrl, ссылка синхронизации API ТК Новая Почта
            'apiUrl' => $this->getContainer()->getParameter('novaposhta_api_url')
        );
        
        // Получить ТК 
        $this->delivery = $this->em->getRepository('NitraDeliveryBundle:Delivery')->find($this->parameters['deliveryId']);
        if (!$this->delivery) {
            throw new \Exception('Не найдена ТК по указанному параметру deliveryId: '.$this->parameters['deliveryId']);
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
