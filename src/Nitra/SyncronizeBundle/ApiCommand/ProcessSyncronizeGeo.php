<?php
namespace Nitra\SyncronizeBundle\ApiCommand;

/**
 * ProcessSyncronizeGeo
 * Синхронизация географии
 */
class ProcessSyncronizeGeo extends ApiCommand
{
    
    /**
     * {@inheritDoc}
     */
    public function validateApi()
    {
        // валидация пройдена
        return false;
    }
    
    /**
     * {@inheritDoc}
     */
    public function processApi()
    {
//        // валидировать команду
//        $errorMessage = $this->validateApi();
//        if ($errorMessage) {
//            // валидация не пройдена
//            throw new \Exception($errorMessage);
//        }
        
        // результируюший массив ответа
        $apiResult = array();
        
        // получить регионы 
        // по стране  Украина
        $geoRegions = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('region, country')
            ->from('NitraGeoBundle:Region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', self::$countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив регионов 
        $apiResult['regions'] = array();
        foreach($geoRegions as $region) {
            $apiResult['regions'][$region['id']] = array(
                'id' => $region['id'],
                'name' => $region['name'],
            );
        }
        
        // получить города
        $geoCities = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('city, region, country')
            ->from('NitraGeoBundle:City', 'city')
            ->innerJoin('city.region', 'region')
            ->innerJoin('region.country', 'country', 'WITH', 'country.id = :countryId')->setParameter('countryId', self::$countryIdUA)
            ->getQuery()
            ->getArrayResult();
        
        // наполнить результирующий массив городов
        $apiResult['cities'] = array();
        foreach($geoCities as $city) {
            $apiResult['cities'][$city['id']] = array(
                'id' => $city['id'],
                'regionId' => $city['region']['id'],
                'name' => $city['name'],
            );
        }
        
        // вернуть результат Geo синхронизации
        $apiResult['message'] = 'Данные синхронизации географии получены успешно.';
        return $apiResult;
    }
    
}
