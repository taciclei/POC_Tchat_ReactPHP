<?php

namespace Domain\Controller;

use Application\Mvc\Controller;
use Domain\Utilisateurs\Services\UtilisateursService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class UtilisateursController extends Controller {

    public function display() {

    }

    public function inscription()
    {
        if ($this->request->getMethod() == 'POST') {

            $utilisateurService = new UtilisateursService($this->entityManager);
            $utilisateurService->add($this->request);

            $response = new RedirectResponse('/utilisateurs/connection', '302');
            $this->view->display($response);
        }
        $this->view->display();
    }

    public function connection()
    {
        $utilisateurService = new UtilisateursService($this->entityManager);

        if ($this->request->getMethod() == 'POST') {
            $utilisateur = $utilisateurService->getUser($this->request);

            if($utilisateur->isEnabled()){
                $session = new Session();

                $session->set('user', $utilisateur);
                $response = new RedirectResponse('/', '302');
                $this->view->display($response);
            }
        }
        $this->view->display();
    }

}