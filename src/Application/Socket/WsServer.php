<?php

namespace Application\Socket;

require './vendor/autoload.php';
require './Infrastructure/Persistence/Doctrine/Bootstrap.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;



$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat($entityManager)
        )
    ),
    4141
);

$server->run();
