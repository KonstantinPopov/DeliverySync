<?php
//
//namespace Nitra\DeliveryBundle\Controller\Client;
//
//use Admingenerated\NitraDeliveryBundle\BaseClientController\ListController as BaseListController;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\HttpFoundation\Response;
//
//class ListController extends BaseListController
//{
//
//    /**
//     * Метод для генерации нового токена
//     * @Route("/client-new-token/{pk}", name="Nitra_DeliveryBundle_Client_newToken")
//     * 
//     */
//    public function newTokenAction($pk)
//    {
//        $t = sha1(sha1(time()));
//        $repository = $this->getDoctrine()->getRepository('NitraDeliveryBundle:Client');
//        $client = $repository->find($pk);
//        $email = $client->getUser()->getEmail();
//        $client->setToken($t);
//        $message = \Swift_Message::newInstance()
//                ->setSubject('Новый ключ')
//                ->setFrom('valera@nitralabs.com')
//                ->setTo($email)
//                ->setBody('
//            Ваш новый ключ доступа:' . $t . '.    ' .
//                'Ссылка для синхронизации: ds.nitralabs.com/sync/' . $t
//        );
//        $this->get('mailer')->send($message);
//        $this->getDoctrine()->getEntityManager()->flush();
//        return $this->redirect($this->generateUrl('Nitra_DeliveryBundle_Client_list'));
//    }
//   
//    /*
//     * Запрос на получение списка клиентов
//     */
//
//    protected function getQuery()
//    {
//        $query = $this->getDoctrine()
//                ->getEntityManager()
//                ->createQueryBuilder()
//                ->select('q')
//                ->from('Nitra\DeliveryBundle\Entity\Client', 'q');
//        if ($this->getUser()->hasRole('ROLE_CLIENT') && (!$this->getUser()->hasRole('ROLE_SUPER_ADMIN'))) {
//            $query->where('q.id = :id')
//                    ->setParameter('id', $this->getUser()->getClientId());
//        }
//
//
//        $this->processSort($query);
//        $this->processFilters($query);
//
//        return $query->getQuery();
//    }
//  
//}
