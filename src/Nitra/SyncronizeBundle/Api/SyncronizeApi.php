<?php
namespace Nitra\SyncronizeBundle\Api;

use Doctrine\Common\Inflector\Inflector;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
//use Nitra\SyncronizeBundle\ApiCommand\ProcessSyncronizeGeo;

/**
 * SyncronizeApi
 * обработчик Api комманд SyncronizeBundle
 */
class SyncronizeApi // implements ApiInterface
{
    
    /**
     * @var EntityManager 
     */
    protected $em;
    
    /**
     * @var Request
     */
    protected $request;
    
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @var mixed object command
     */
    protected $command;

    /**
     * Конструктор
     */
    public function __construct(EntityManager $em, Request $request)
    {
        // установить EntityManager
        $this->em = $em;
        
        // установить Request
        $this->request = $request;
        
        // выполнить валидацию 
        $this->validateApi();
    }
    
    
    /**
     * вернуть флаг валидации API
     */
    public function isValid()
    {
        $errorMessage = $this->validateApi();
        if ($errorMessage) {
            // ошибка валидации
            return false;
        }
        
        // валидация API пройдена успешно
        return true;
    }
    
    /**
     * валидировать API
     * @return string - текст сообщения об ошибке 
     * @return false  - валидация пройдена успешно
     */
    public function validateApi()
    {
        // проверить токен авторизации клиента
        if (!$this->request->get('token', false)) {
            // вернуть текст ошибки
            return "Не указан токен авторизации клиента.";
        }
        
        // получить клиента
        $this->client = $this->em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array('token' => $this->request->get('token')));
        if (!$this->client) {
            return "Клиент не найден.";
        }
        
        // проверить команду синхронизации
        if (!$this->request->get('command', false)) {
            return "Не указана команда.";
        }
        
        // название API команды
        $commandName = Inflector::classify(trim($this->request->get('command')));
        $commandClass = "\Nitra\SyncronizeBundle\Api\Commands\Command".$commandName;
        if (!class_exists($commandClass)) {
            return "Команда не найдена.";
        }
        
        // создать комманду
        $this->command = new $commandClass($this->client, $this->request);
        
        //        
//        var_dump($commandName);
//        die;
//        
        
        
        
        // валидация пройдена
        return null;
    }
    
    /**
     * выполнить API
     */
    public function processApi()
    {
        
    }

}
