<?php
namespace Nitra\DeliveryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClientRepository
 */
class ClientRepository extends EntityRepository
{
    
    /**
     * {@inheritDoc}
     */
    public function findAll()
    {
        // по умолчанию сортируем по названию
        return $this->findBy(array(), array('name' => 'ASC'));
    }
    
}
