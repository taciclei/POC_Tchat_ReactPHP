<?php

namespace Domain\Controller;

use Application\Mvc\Controller;
use Domain\Salon\Services\SalonService;
use React\EventLoop\Factory;
use React\Socket\ConnectionInterface;
use React\Socket\Server;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{

    public function display()
    {
        $session = new Session();
        $user = $session->get('user');
        if(is_null($user)) {
            $response = new RedirectResponse('/utilisateurs/connection', '302');
            $this->view->display($response);
        }
        $this->view->user = $user;

        $salonService = new SalonService($this->entityManager);

        $messages = $salonService->obtenirMessages(20);

        $messagesDysplay = [];

        foreach ($messages as $message){
            $messagesDysplay[] = [
                'user' => $message->getUser()->getUserName(),
                'message' => $message->getMessage(),
                'time' => $message->getCreated()->format('h:m a'),
            ];
        }

        $this->view->messages = $messagesDysplay;

        $this->view->display();
    }

}
