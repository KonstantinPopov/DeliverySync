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

class TestCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:delivery-period-it')
                ->setDescription('Load delivery periods for (InTime) all delivery services.')
                ->addOption('force', null, InputOption::VALUE_NONE, 'Update all delivery periods');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $startDate = date("d.m.Y", strtotime("next Monday"));
        // загрузка сроков доставки по новой почте
//        $np = $em
//                ->getRepository('NitraDeliveryBundle:DeliveryService')
//                ->findOneByName('Новая почта');
//        
//        $newPostLoader = new NewPostLoadDeliveryPeriod();
//        $newPostLoader->setEntityManager($em);
//        $newPostLoader->setDeliveryService($np);
//        $newPostLoader->setStartDate($startDate);
//        $newPostLoader->loadDeliveryPeriod();
        // загрузка сроков доставки по Интайм
        $it = $em
                ->getRepository('NitraDeliveryBundle:DeliveryService')
                ->findOneByName('Интайм');
        $itLoader = new InTimeLoadDeliveryPeriod($this->getContainer()->get('kernel')->getRootDir(), $input->getOption('force'));
        $itLoader->setDeliveryService($it);
        $itLoader->setEntityManager($em);
        $itLoader->setStartDate($startDate);
        $itLoader->loadDeliveryPeriod();

        $output->writeln('Загрузка сроков доставки по Интайм успешно завершена.');
    }

}