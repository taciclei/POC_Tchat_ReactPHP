<?php

namespace Application\Mvc;

class Router {
    public static function analyze( $requestUri, $query ) {

        $result = [
            "controller" => "Error",
            "action" => "error404",
            "params" => []
        ];

        if( $requestUri === "" || $requestUri === "/" ) {
            $result["controller"] = "Index";
            $result["action"] = "display";
        } else {

            $parts = explode("/", $requestUri);

                $result["controller"] = $parts[1];
                $result["action"] = $parts[2];
                $result["params"]= $query;

        }
        return $result;

    }

}