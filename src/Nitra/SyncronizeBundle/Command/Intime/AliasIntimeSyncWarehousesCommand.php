<?php
namespace Nitra\SyncronizeBundle\Command\Intime;

use Nitra\SyncronizeBundle\Command\Intime\IntimeSyncWarehousesCommand;

/**
 * Alias IntimeSyncWarehousesCommand
 */
class AliasIntimeSyncWarehousesCommand extends IntimeSyncWarehousesCommand
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:intime:sync-warehouses')
            ->setDescription('Alias: Синхронизация складов ТК "ИнТайм".')
        ;
    }
    
}