<?php

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load($routes_path)
    {
        $router = new Router();
        require $routes_path;
        return $router;
    }

    public function get($uri, $paths)
    {
        $this->routes['GET'][$uri] = $paths;
    }

    public function post($uri, $paths)
    {
        $this->routes['POST'][$uri] = $paths;
    }

    public function redirect($uri, $method)
    {
        if (!array_key_exists($uri, $this->routes[$method])) {
            die("404 Page Not Found On This Server!");
        }

        $route_data = $this->routes[$method][$uri];
        $this->activateControllers($route_data[0], $route_data[1]);
    }
    public function activateControllers($controller, $method)
    {
        $instant_obj = new $controller;
        $instant_obj->$method();
    }
    public function showRoutes()
    {
        dd($this->routes);
    }
}
