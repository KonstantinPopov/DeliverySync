<?php
namespace Nitra\DeliveryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * WarehouseRepository
 */
class WarehouseRepository extends EntityRepository
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
