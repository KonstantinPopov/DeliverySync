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
    
    /**
     * Получить первый попавшийся склад ТК в городе
     * @param integer $deliveryId - ID ТК 
     * @param integer $geoCityId  - ID эталона города 
     * @return Nitra\DeliveryBundle\Entity\Warehouse - склад ТК
     * @return null - склад ТК не найден
     */
    public function getFirstDeliveryWarehouseInGeoCity($deliveryId, $geoCityId)
    {
        // получить склады
        $warehouses = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('w')
            ->from('NitraDeliveryBundle:Warehouse', 'w')
            ->innerJoin('w.city', 'city')
            ->innerJoin('city.geoCity', 'geoCity')
            ->where('w.delivery =:delivery_id')->setParameter('delivery_id', $deliveryId)
            ->andWhere('city.geoCity =:geo_city_id')->setParameter('geo_city_id', $geoCityId)
            ->setMaxResults(1)
            ->getQuery()
            ->execute();
            ;
        
        // если склад найден 
        if ($warehouses) {
            // вернуть склад 
            return $warehouses[0];
        }
        
        // склад не найден
        return null;
    }
    
}



