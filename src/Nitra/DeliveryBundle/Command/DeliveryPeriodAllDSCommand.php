<?php

namespace Nitra\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Nitra\DeliveryBundle\Entity\DeliveryCity;
use Nitra\DeliveryBundle\Entity\Department;
use Nitra\DeliveryBundle\LoaderDeliveryPeriod\NewPostLoadDeliveryPeriod as NewPostLoadDeliveryPeriod;
use Nitra\DeliveryBundle\LoaderDeliveryPeriod\InTimeLoadDeliveryPeriod as InTimeLoadDeliveryPeriod;

class DeliveryPeriodAllDSCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:delivery-period')
                ->setDescription('Load delivery periods for  all delivery services.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $date = new \DateTime();
        $date->format('Y-m-d 00:00:00');
        $newDepartments = $em->getRepository('NitraDeliveryBundle:Department')->createQueryBuilder('d')
                ->where('d.createdAt > :today')
                ->setParameter('today', $date->format('Y-m-d 00:00:00'))
                ->getQuery()
                ->execute();
        if (count($newDepartments) > 0) {
            $startDate = '04.02.2013';
            // загрузка сроков доставки по новой почте
            $np = $em
                    ->getRepository('NitraDeliveryBundle:DeliveryService')
                    ->findOneByName('Новая почта');

            $newPostLoader = new NewPostLoadDeliveryPeriod($this->getContainer()->get('kernel')->getRootDir());
            $newPostLoader->setEntityManager($em);
            $newPostLoader->setDeliveryService($np);
            $newPostLoader->setStartDate($startDate);
            $newPostLoader->loadDeliveryPeriod();

            // загрузка сроков доставки по Интайм
            $it = $em
                    ->getRepository('NitraDeliveryBundle:DeliveryService')
                    ->findOneByName('Интайм');
            $itLoader = new InTimeLoadDeliveryPeriod();
            $itLoader->setDeliveryService($it);
            $itLoader->setEntityManager($em);
            $itLoader->setStartDate($startDate);
            $itLoader->loadDeliveryPeriod();
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
    }

}