<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function get($path, $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post($path, $action)
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch($uri,$requestMethod)
    {
        if (!isset($this->routes[$requestMethod][$uri])) {
            http_response_code(404);
            echo "404 - Route Not Found";
            exit;
        }
        $con=$this->routes[$requestMethod][$uri][0];
        $method = $this->routes[$requestMethod][$uri][1];
        $className = 'App\\Core\\'.$con;

        $controller = new $className();
        $controller->$method();
    }
}
