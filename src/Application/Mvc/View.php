<?php

namespace Application\Mvc;

use Symfony\Component\HttpFoundation\Response;

class View {
    protected $_route;
    protected $data = [];

    public function __construct( $route ) {
        $this->_route = $route;
    }

    public function display(Response $response=null) {

        if($response === null) {
            $viewFile = ROOT . "/../Domain/View/" . $this->_route["controller"] . "/" . $this->_route["action"] . ".phtml";
            if (file_exists($viewFile)) {
                include($viewFile);
            } else {
                throw new \DomainException("Vue introuvable - " . $viewFile);
            }
        } else {
            echo $response->getContent();
        }
    }

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }


}

