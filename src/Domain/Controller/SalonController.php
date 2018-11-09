<?php

namespace Domain\Controller;

use Application\Mvc\Controller;
use Domain\Salon\Services\SalonService;
use Symfony\Component\HttpFoundation\Response;

class SalonController extends Controller
{

    public function display()
    {
        $this->view->display();
    }

    public function general()
    {
        $salonService = new SalonService($this->entityManager);

        if ($this->request->getMethod() == 'POST') {

            $salonService->add($this->request);
        }

        $messages = $salonService->obtenirMessages(20);
        $this->view->messages = $messages;
        $this->view->display();
    }

}
