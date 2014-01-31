<?php
namespace Nitra\SyncronizeBundle\Api\Commands;

use Nitra\DeliveryBundle\Entity\Client;

/**
 * Description of Command
 *
 * @author user
 */
abstract class Command
{
    //put your code here
    
    /**
     * @var Client $client
     */
    protected $client;

    /**
     * утановить клиента 
     * @param Client $client - клиент по которому выполняется Api команда
     */
    abstract public function setClient(Client $client);
    
    /**
     * получить Client
     */
    public function getClient()
    {
        return $this->client;
    }
    
}
