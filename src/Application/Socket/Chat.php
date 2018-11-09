<?php
namespace Application\Socket;

use Domain\Salon\Services\SalonService;
use Domain\Utilisateurs\Services\UtilisateursService;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use \SplObjectStorage;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        $this->clients = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection)
    {
        $this->clients->attach($connection);
    }

    public function onMessage(ConnectionInterface $from, $message)
    {

        $salonService = new SalonService($this->entityManager);
        $salonService->add($message);

        foreach ($this->clients as $client) {
            $client->send($message);
        }
    }

    public function onClose(ConnectionInterface $connection)
    {
        $this->clients->detach($connection);

        echo "someone disconnected\n";
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        echo "An error has occurred: " . $e->getMessage() . "\n";

        $connection->close();
    }
}
