<?php
namespace Nitra\SyncronizeBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Nitra\SyncronizeBundle\Api\Api;
use Nitra\SyncronizeBundle\Api\SyncronizeApi;
//use Nitra\SyncronizeBundle\Api\SyncronizeApi;
//use Nitra\SyncronizeBundle\ApiCommand\ProcessSyncronizeGeo;
//use Nitra\SyncronizeBundle\ApiCommand\ProcessSyncronizeWarehouses;
//use Nitra\SyncronizeBundle\ApiCommand\ProcessEstimateDeliveryDate;

/**
 * SyncController
 * Контроллер синхронизации
 */
class SyncController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    // ID страны Украина
    private static $countryIdUA = 1;
    
//    /** @DI\Inject("nitra.syncronize.api") */
//    private $syncApi;

    /**
     * синхронизировать географию 
     * @Route("/sync/{token}", name="Nitra_SyncronizeBundle_Syncronize")
     * @return JsonResponse
     */
    // @ParamConverter("client", class="NitraDeliveryBundle:Client", options={"token" = "token"})
    // не используем @ParamConverter для того что бы корректно вернуть в таск error клиент не найден
    public function syncAction(Request $request)
    {
        
        $syncApi = new SyncronizeApi($this->em, $this->getRequest());
        if ($syncApi->isValid() !== true) {
            // валидация не пройдена
            return new JsonResponse(array('type'=> 'error', 'message'=> $syncApi->validateApi()));
        }        
        
        // попытка выполнить команду
        try {
            // выполнить команду
            $syncResult = $syncApi->processApi();
            
        } catch (\Exception $e) {
            // вернуть ошибку выполенения команды
            
            echo $e->getMessage();
            die;
            
            return new JsonResponse(array('type'=> 'error', 'message'=> $e->getMessage()));
        }        
        
        
        
        
//        $syncApi->processApi();
        
        
//        if ($syncApi->isValid() !== true) {
//            
//            
//            $syncApi
//        }
        
        var_dump($syncApi->isValid());
        die;
        
        
        echo get_class($syncApi);
        die;
        
//        
//        $syncApi->isValid();
//        
//        $syncApi->validateCommand();
//        $syncApi->processCommand();
        
        
        // проверить команду
        $errorMessage = $syncApi->validateCommand();
        if ($errorMessage) {
            // валидация не пройдена
//            return new JsonResponse(array('type'=> 'error', 'message'=> "Ошибка команды API: ".$apiCommandName.". ".$errorMessage));
            return new JsonResponse(array('type'=> 'error', 'message'=> $errorMessage));
        }
        
        
        $syncApi->processCommand($this->getRequest());
        
        
        // проверить токен авторизации клиента
        if (!$request->get('token', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указан токен авторизации клиента."));
        }
        
        // получить клиента
        $client = $this->em->getRepository('NitraDeliveryBundle:Client')->findOneBy(array('token' => $request->get('token')));
        if (!$client) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Клиент не найден."));
        }
        
        
        
        
//        // получить сервис синхронизации
//        $syncApi = $this->get('nitra.syncronize.api');
        
        
        
//        $syncApi->protected

        
        
        
        print "<pre>"; print_r(get_class($this->container)); print "</pre>";
        print "<pre>"; print_r(get_class_methods($this->container)); print "</pre>";
        print "<pre>"; print_r($this->container->getServiceIds()); print "</pre>";
        print "<br> ====================================================== <br>";
        
        die('<br>die!');
        
        // проверить команду синхронизации
        if (!$request->get('command', false)) {
            return new JsonResponse(array('type'=> 'error', 'message'=> "Не указана команда."));
        }
        
        // название API команды
        $apiCommandName = trim($request->get('command'));
        
        // создать команду
        switch($apiCommandName) {
            
            // синхронизация географии
            case 'syncronizeGeo':
                $apiCommand = new ProcessSyncronizeGeo($client, $request->get('options', null));
                break;
            
            // синхронизация склдов
            case 'syncronizeWarehouses':
                $apiCommand = new ProcessSyncronizeWarehouses($client, $request->get('options', null));
                break;
            
            // расчет времени доставки
            case 'estimateDeliveryDate':
                $apiCommand = new ProcessEstimateDeliveryDate($client, $request->get('options', null));
                break;
            
            // действия по команде не определены
            default:
                return new JsonResponse(array('type'=> 'error', 'message'=> "Команда не найдена."));
                break;
        }
        
        // установить праметры команды
        $apiCommand->setContainer($this->container);
        $apiCommand->setEntityManager($this->em);
        
        // проверить команду
        $errorMessage = $apiCommand->validateApi();
        if ($errorMessage) {
            // валидация не пройдена
            return new JsonResponse(array('type'=> 'error', 'message'=> "Ошибка команды API: ".$apiCommandName.". ".$errorMessage));
        }
        
        // попытка выполнить команду
        try {
            // выполнить команду
            $syncResult = $apiCommand->processApi();
            
        } catch (\Exception $e) {
            // вернуть ошибку выполенения команды
            return new JsonResponse(array('type'=> 'error', 'message'=> $e->getMessage()));
        }
        
        // команда выполнена успешно
        $syncResult['type'] = 'success';
        return new JsonResponse($syncResult);
    }
    
}
