<?php
namespace Nitra\SyncronizeBundle\Command\Novaposhta;

use Nitra\SyncronizeBundle\Command\Novaposhta\NovaposhtaSyncCitiesCommand;


/**
 * Alias NovaposhtaSyncCitiesCommand
 */
class AliasNovaposhtaSyncCitiesCommand extends NovaposhtaSyncCitiesCommand
{
    
    /**
     * Настройка команды
     */
    protected function configure()
    {
        // настройка команды
        $this
            ->setName('nitra:novaposhta:sync-cities')
            ->setDescription('Alias: Синхронизация городов ТК "Новая Почта".')
        ;
    }
    
}