<?php

namespace Application\Mvc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Controller {
    protected $route;
    protected $view;
    protected $request;
    protected $entityManager;

    public function __construct( $route, $entityManager) {
        $this->route = $route;
        $this->view = new View( $route );
        $this->request = Request::createFromGlobals();
        $this->entityManager = $entityManager;
    }

}
