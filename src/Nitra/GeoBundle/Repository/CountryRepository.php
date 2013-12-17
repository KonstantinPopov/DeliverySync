<?php
namespace Nitra\GeoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CountryRepository
 */
class CountryRepository extends EntityRepository
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
