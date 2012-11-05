<?php

namespace Nitra\DeliveryBundle\Controller\DeliveryCity;

use Admingenerated\NitraDeliveryBundle\BaseDeliveryCityController\ListController as BaseListController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation as DI;

class ListController extends BaseListController
{

    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;

    /**
     * @Route("/get-region-for-country", name="Nitra_GeoBundle_GetRegionForCountry")
     */
    public function getRegionsForCountriAction()
    {
        $country = $this->em->getRepository('NitraGeoBundle:Country')->find($this->getRequest()->get('country_id'));

        if (!$country) {
            throw new \Exception('Страна не найдена.');
        }

        $regions ='<option value="0">Выбирите регион</option>';

        foreach ($country->getRegions() AS $region) {
            $regions .= '<option value="' . $region->getId() . '">' . $region->getName() . '</option>';
        }

        return new Response($regions);
    }

    /**
     * @Route("/get-city-for-region", name="Nitra_GeoBundle_GetCityForRegion")
     */
    public function getCityForRegionAction()
    {
        $region = $this->em->getRepository('NitraGeoBundle:Region')->find($this->getRequest()->get('region_id'));

        if (!$region) {
            throw new \Exception('Регион не найдена.');
        }

        $cityes ='<option value="0">Выбирите город</option>';

        foreach ($region->getCities() AS $city) {
            $cityes .= '<option value="' . $city->getId() . '">' . $city->getName() . '</option>';
        }

        return new Response($cityes);
    }

}
