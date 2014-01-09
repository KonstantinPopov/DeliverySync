<?php
namespace Nitra\GeoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CityRepository
 */
class CityRepository extends EntityRepository
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
