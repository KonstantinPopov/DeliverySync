<?php
namespace Nitra\SyncronizeBundle\Command\Novaposhta;

use Nitra\SyncronizeBundle\Command\Novaposhta\NovaposhtaSyncWarehousesCommand;
use Nitra\DeliveryBundle\Entity\Warehouse;

/**
 * Alias NovaposhtaSyncWarehousesCommand
 */
class AliasNovaposhtaSyncWarehousesCommand extends NovaposhtaSyncWarehousesCommand
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:novaposhta:sync-warehouses')
            ->setDescription('Alias: Синхронизация складов ТК "Новая Почта".')
        ;
    }
    
}