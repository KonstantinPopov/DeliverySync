<?php

namespace Nitra\DeliveryBundle\Controller\Client;

use Admingenerated\NitraDeliveryBundle\BaseClientController\ListController as BaseListController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ListController extends BaseListController
{

    /**
     * Метод для генерации нового токена
     * @Route("/client-new-token/{pk}", name="Nitra_DeliveryBundle_Client_newToken")
     * 
     */
    public function newTokenAction($pk)
    {
        $t = time();
        $t = sha1(sha1($t+87));
        $repository = $this->getDoctrine()->getRepository('NitraDeliveryBundle:Client');
        $client = $repository->find($pk);
        $email = $client->getUser()->getEmail();
        $client->setToken($t);
        $message = \Swift_Message::newInstance()
        ->setSubject('Новыйключ')
        ->setFrom('valera@nitralabs.com')
        ->setTo($email)
        ->setBody('
            Ваш новый ключ доступа:' . $t . '.    ' .
            'Ссылка для синхронизации: ds.nitralabs.com/sync/' . $t
            );
        $this->get('mailer')->send($message);   
        $this->getDoctrine()->getEntityManager()->flush();
        return $this->redirect($this->generateUrl('Nitra_DeliveryBundle_Client_list'));
    }

}
