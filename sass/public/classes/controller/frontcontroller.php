<?php

class FrontController extends Controlador
{
    const DEFAULT_ACTION = "show";
    const DEFAULT_CONTROLLER = "HomeController";

    public function dispatch()
    {
        $params = null;
        if ($_SERVER["REQUEST_METHOD"] == "GET" && count($_GET) == 0) {
            $controller_name = self::DEFAULT_CONTROLLER;
            $action = self::DEFAULT_ACTION;
        } else {
            $url = array_keys($_GET)[0];
            //$_SERVER["QUERY_STRING"]
            $url = $this->sanitize($url, 0);
            $url = trim($url, "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            if (isset($url[0])) {
                $controller_name = ucwords($url[0]) . "Controller";
                if (isset($url[1])) {
                    $action = $url[1];
                }
                if (count($url) > 2) {
                    for ($i = 2; $i < count($url); $i++) {
                        $params[] = strtolower($url[$i]);
                    }
                }
            }
        }

        if (file_exists("classes/controller/" . strtolower($controller_name) . ".php")) {
            $controller = new $controller_name();
            if (method_exists($controller, $action)) {
                $controller->$action($params);
            } else {
                throw new Exception("No existeix l'acció definida $action de $controller_name");
            }
        } else {
            throw new Exception("No existeix el controlador demanat $controller_name");
        }


    }

}
