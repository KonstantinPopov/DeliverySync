<?php
namespace Nitra\DeliveryBundle\Controller\Client;

use Admingenerated\NitraDeliveryBundle\BaseClientController\ActionsController as BaseActionsController;
use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * ActionsController
 */
class ActionsController extends BaseActionsController
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * Сгенерировать новый токен для клиенат
     * @param integer $pk
     */
    public function attemptObjectNewToken($pk)
    {
        
        // получить клиента
        $client = $this->getObject($pk);
        
        // установить клиенту новый токен
        $client->setToken(sha1('clientToken::'.$client->getId().'::'.(string)$client.'::'.uniqid().'::'. microtime(true)));
        $this->em->flush();
        
        // перенаправить пользователя на список клиентов
        $this->get('session')->getFlashBag()->add('notice',  'Токен для клиента был успешно обновлен.' );
        return new RedirectResponse($this->generateUrl('Nitra_DeliveryBundle_Client_list'));
        
    }
    
    
    /**
     * ajax сгенерировать новый токен
     * @Route("/generate-new-token", name="Nitra_DeliveryBundle_GenerateNewToken", options={"expose"=true})
     * @return Response
     */
    public function generateNewTokenAction(Request $request)
    {
        // сгенерировать новый токен
        $token = sha1('clientToken'
            . (($request->get('name', false)) ? '::'.$request->get('name') : '')
            . '::'.  uniqid()
            . '::' . microtime(true)
            );
        
        // вернуть токен
        return new Response($token);
    }    
    
}
