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


class DeliveryPeriodCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
                ->setName('ds:delivery-period-np')
                ->setDescription('Load delivery periods for (New Post) all delivery services.')
                ->addOption('force', null, InputOption::VALUE_NONE, 'Update all delivery periods')
                ->addArgument('iteration', InputArgument::REQUIRED, 'Iteration number');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $startDate = date ("d.m.Y", strtotime("next Monday")); 
        // загрузка сроков доставки по новой почте
        $np = $em
                ->getRepository('NitraDeliveryBundle:DeliveryService')
                ->findOneByName('Новая почта');
        
        $newPostLoader = new NewPostLoadDeliveryPeriod($this->getContainer()->get('kernel')->getRootDir(), $input->getOption('force'));
         $newPostLoader->setIteration($input->getArgument('iteration'));
        $newPostLoader->setEntityManager($em);
        $newPostLoader->setDeliveryService($np);
        $newPostLoader->setStartDate($startDate);
        $newPostLoader->loadDeliveryPeriod();
        
        $output->writeln('Загрузка сроков доставки по новой почте успешно завершена.');
    }

}