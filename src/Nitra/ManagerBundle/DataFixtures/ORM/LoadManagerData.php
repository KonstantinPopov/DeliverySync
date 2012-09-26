<?php

namespace Nitra\ManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nitra\ManagerBundle\Entity\Manager AS Manager;
use Nitra\ManagerBundle\Entity\Role AS Role;
use Nitra\ManagerBundle\Entity\Group AS Group;
use Nitra\DeliveryBundle\Entity\Client AS Client;

class LoadManagerData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager_1 = new Manager();
        $manager_1->setUsername('admin');
        $manager_1->setPlainPassword('admin');
        $manager_1->setSuperAdmin(true);
        $manager_1->setEnabled(true);
        $manager_1->setEmail('ad@ad.ad');

        $manager->persist($manager_1);
        
        
        $role_1 = new Role();
        $role_1->setName('ROLE_SUPER_ADMIN');
        $role_1->setDescription('Роль администратора');
        $manager->persist($role_1);
        
        $role_2 = new Role();
        $role_2->setName('ROLE_MANAGER');
        $role_2->setDescription('Роль менеджера');
        $manager->persist($role_2);
        
        $role_3 = new Role();
        $role_3->setName('ROLE_CLIENT');
        $role_3->setDescription('Роль клиента');
        $manager->persist($role_3);
        
        $group_1 = new Group();
        $group_1->setName('Администраторы');
        $group_1->addRole($role_1->getName());
        $manager->persist($group_1);
        
        $group_2 = new Group();
        $group_2->setName('Менеджеры');
        $group_2->addRole($role_2->getName());
        $manager->persist($group_2);
        
        $group_3 = new Group();
        $group_3->setName('Клиенты');
        $group_3->addRole($role_3->getName());
        $manager->persist($group_3);
         
        $manager_2 = new Manager();
        $manager_2->setUsername('rezina');
        $manager_2->setPlainPassword('rezina');
        $manager_2->setEnabled(true);
        $manager_2->setEmail('rez@rez.rez');
        $manager_2->addGroup($group_3);

        $manager->persist($manager_2);
        
        $client = new Client();
        $client->setName('Rezina.cc');
        $client->setUser($manager_2);
        $manager->persist($client);
        
        $manager->flush();
    }
}
