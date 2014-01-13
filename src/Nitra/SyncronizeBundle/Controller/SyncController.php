<?php
namespace Nitra\SyncronizeBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nitra\SyncronizeBundle\ApiCommand\ProcessSyncronizeGeo;
use Nitra\SyncronizeBundle\ApiCommand\ProcessSyncronizeWarehouses;
use Nitra\SyncronizeBundle\ApiCommand\ProcessEstimateDeliveryDate;

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
