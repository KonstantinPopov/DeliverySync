<?php
namespace Nitra\SyncronizeBundle\Command\Intime;

use Nitra\SyncronizeBundle\Command\Intime\IntimeSyncCitiesCommand;

/**
 * Alias команды IntimeSyncCitiesCommand
 */
class AliasIntimeSyncCitiesCommand extends IntimeSyncCitiesCommand
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:intime:sync-cities')
            ->setDescription('Alias: Синхронизация городов ТК "ИнТайм".')
        ;
    }
    
}