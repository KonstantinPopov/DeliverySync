<?php
namespace Nitra\SyncronizeBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Inflector\Inflector;

/**
 * SyncController
 * Контроллер синхронизации
 */
class SyncController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * синхронизировать географию 
     * @Route("/sync/{token}", name="Nitra_SyncronizeBundle_Syncronize")
     * @return JsonResponse
     */
    // @ParamConverter("client", class="NitraDeliveryBundle:Client", options={"token" = "token"})
    // не используем @ParamConverter для того что бы корректно вернуть в таск error клиент не найден
    public function syncAction(Request $request)
    {
        
        // проверить токен авторизации клиента
        if (!$request->get('token', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указан токен авторизации клиента."));
        }
        
        // получить клиента
        $client = $this->em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array('token' => $request->get('token')));
        if (!$client) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Клиент не найден."));
        }
        
        // проверить команду синхронизации
        if (!$request->get('command', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указана команда."));
        }
        
        // скласс команды 
        $commandClass = "\Nitra\SyncronizeBundle\ApiCommand\ApiCommand" . Inflector::classify($request->get('command'));
        // проверить существование вызываемого классаs
        if (!class_exists($commandClass)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Обработчик команды \"".$request->get('command')."\" не найден."));
        }
        
        // создать комманду
        $apiCommand = new $commandClass($this->container, $client, $request->get('options', null));
        
        // валидировать команду
        $errorMessage = $apiCommand->validateCommand();
        if ($errorMessage) {
            // валидация не пройдена
            return new JsonResponse(array('type'=> 'error', 'message'=> "Ошибка команды API: ".$request->get('command').". ".$errorMessage));
        }
        
        // попытка выполнить команду
        try {
            
            // выполнить команду
            $syncResult = $apiCommand->processCommand();
            
        } catch (\Exception $e) {
            // вернуть ошибку выполенения команды
            return new JsonResponse(array('type'=> 'error', 'message'=> $e->getMessage()));
        }
        
        // команда выполнена успешно
        $syncResult['type'] = 'success';
        return new JsonResponse($syncResult);
    }
    
}
