<?php

namespace Application\Mvc;

/**
 * Class Mvc
 */
class Mvc
{
    /**
     *
     */
    public static function run($entityManager)
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $query = isset($_GET["query"]) ? $_GET["query"] : "";
        $route = Router::analyze($requestUri,$query);

        $class = '\\Domain\\Controller\\'.$route["controller"]."Controller";

        if (class_exists($class)) {
            $controller = (new $class ($route,$entityManager));

            $method = [$controller, $route["action"]];
            if (is_callable($method)) {
                call_user_func($method);
            }
        } else {
            die('Erreur la classe '.$class.' Existe pas ');
        }
    }

}
