<?php
namespace Nitra\DeliveryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DeliveryRepository
 */
class DeliveryRepository extends EntityRepository
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
