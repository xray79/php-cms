<?php

namespace App\Core;

use App\Controllers\PagesController;
use Exception;

class Router
{
    public array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load(string $file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get(string $uri, string $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct(string $uri, string $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }

        $pages_controller = new PagesController;
        $pages_controller->page_404();
    }

    public function callAction(string $controller, string $action)
    {
        // instantiate controller from different namespace
        $controller = "App\Controllers\\{$controller}";
        $controller = new $controller;

        // check if action method exists on controller
        if (!method_exists($controller, $action)) {
            throw new Exception('no method found');
        }

        // return the result of the method call after instantiating the controller
        return $controller->$action();
    }

    public static function redirect(string $location)
    {
        // helper function to redirect to the desired uri

        header("Location: {$location}");
    }
}
