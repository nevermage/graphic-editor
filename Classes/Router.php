<?php

namespace Classes;

require '../vendor/autoload.php';

class Router
{
    public $route;
    public function __construct()
    {
        $this->route = $_SERVER['REQUEST_URI'];
    }

    public function getDestination()
    {
        $routes = require '../Framework/Router/routes.php';
        foreach ($routes as $pattern => $controllerAndAction) {
            preg_match($pattern, $this->route, $matches);
            if (!empty($matches)) {
                $RouteFound = true;
                break;
            }
        }
        if (!isset($RouteFound)) {
            http_response_code(404);
            echo '<h1>404</h1>';
            return;
        }
        $controllerName = $controllerAndAction[0];
        $actionName = $controllerAndAction[1];
        unset($matches[0]);
        $controller = new $controllerName();
        $controller->$actionName(...$matches);
    }
}
