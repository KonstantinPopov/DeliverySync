<?php

namespace Nitra\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Entity\DeliveryCity;
use \Nitra\DeliveryBundle\Entity\Department;

class DeliveryPerioLoopITCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:delivery-period-loop-it')
                ->setDescription('Synchronizes delivery period for all Delivery services in loop')
                ->addOption('force', null, InputOption::VALUE_NONE, 'Update all delivery periods');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');


        $date = new \DateTime();
        $newDepartments = $em->getRepository('NitraDeliveryBundle:Department')->createQueryBuilder('d')
                ->where('d.createdAt > :today')
                ->setParameter('today', $date->format('Y-m-d 00:00:00'))
                ->getQuery()
                ->execute();
        if (count($newDepartments) > 0 || $input->getOption('force')) {
            $startDate = date("d.m.Y", strtotime("next Monday"));
            // загрузка сроков доставки по новой почте
//            $np = $em
//                    ->getRepository('NitraDeliveryBundle:DeliveryService')
//                    ->findOneByName('Новая почта');
//            $deliveryCities = $em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
//                    ->leftjoin('dc.departments', 'd');
//            if (!$input->getOption('force')) {
//                $deliveryCities = $deliveryCities->andWhere('d.createdAt > :today')
//                        ->setParameter('today', $date->format('Y-m-d 00:00:00'));
//            }
//
//            $deliveryCities = $deliveryCities->andWhere('d.deliveryService = :ds')
//                    ->setParameter('ds', $np)
//                    ->getQuery()
//                    ->execute();
//            for ($j = 0; $j<count($deliveryCities); $j++) {
//                shell_exec('/home/Valeriia/www/ds32/app/console ds:delivery-period-np --force ' . $j);
////                shell_exec('/var/www/delivery_sync/app/console ds:delivery-period-np --force ' . $j);
//            }
            // загрузка сроков доставки по Интайм
            $it = $em
                    ->getRepository('NitraDeliveryBundle:DeliveryService')
                    ->findOneByName('Интайм');
            $deliveryCities = $em->getRepository('NitraDeliveryBundle:DeliveryCity')->createQueryBuilder('dc')
                    ->distinct('dc.id')
                    ->leftjoin('dc.departments', 'd');
            if (!$input->getOption('force')) {
                $deliveryCities = $deliveryCities->andWhere('d.createdAt > :today')
                        ->setParameter('today', $date->format('Y-m-d 00:00:00'));
            }

            $deliveryCities = $deliveryCities->andWhere('d.deliveryService = :ds')
                    ->setParameter('ds', $it)
                    ->getQuery()
                    ->execute();
            for ($j = 0; $j<count($deliveryCities); $j++) {
                shell_exec('/home/Valeriia/www/ds32/app/console ds:delivery-period-it --force ' . $j);
//                shell_exec('/var/www/delivery_sync/app/console ds:delivery-period-it --force ' . $j);
            }
        }
        //подвязка городов в таблице delivery period
        $deliveryPeriods = $em->getRepository('NitraDeliveryBundle:DeliveryPeriod')->createQueryBuilder('dp')
                ->where('dp.cityFrom IS NULL OR dp.cityTo IS NULL')
                ->getQuery()
                ->execute();
        $output->writeln(count($deliveryPeriods));
        foreach ($deliveryPeriods as $dp) {
            $output->writeln($dp->getDeliveryCityFrom()->getName() . '   ' . $dp->getDeliveryCityTo()->getName() . '   ' . $dp->getDeliveryService()->getName());
            if ($dp->getDeliveryCityFrom()->getCity()) {
                $dp->setCityFrom($dp->getDeliveryCityFrom()->getCity());
            }
            if ($dp->getDeliveryCityTo()->getCity()) {
                $dp->setCityTo($dp->getDeliveryCityTo()->getCity());
            }
        }
        $em->flush();
        $output->writeln('Загрузка сроков доставки по всем ТК успешно завершена.');
        $output->writeln('Синхронизация завершена успешно.');
    }

}