<?php
namespace Nitra\SyncronizeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * SyncronizeWarehouseController
 * Синхронизация складов
 */
class SyncronizeWarehouseController extends Controller
{
    
    /** @DI\Inject("doctrine.orm.entity_manager") */
    private $em;
    
    /**
     * синхронизировать географию 
     * @Route("/syncronize-warehouse", name="Nitra_SyncronizeBundle_Syncronize_Warehouse")
     */
    public function syncronizeWarehouseAction()
    {
        
    }
        
}
