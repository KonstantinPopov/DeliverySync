<?php
namespace Nitra\SyncronizeBundle\Command\Autolux;

use Nitra\SyncronizeBundle\Command\Autolux\AutoluxSyncWarehousesCommand;

/**
 * Alias AutoluxSyncWarehousesCommand
 */
class AliasAutoluxSyncWarehousesCommand extends AutoluxSyncWarehousesCommand
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:autolux:sync-warehouses')
            ->setDescription('Alias: Синхронизация городов и складов ТК "АвтоЛюкс".')
        ;
    }
    
}