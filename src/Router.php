<?php

namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {
        // Replace named parameters in route with regular expressions
        $route = preg_replace('/\/{(.*?)}/', '/(?<$1>[^\/]+)', $route);

        // Add route to the routes array
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function put($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "PUT");
    }

    public function patch($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "PATCH");
    }

    public function delete($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "DELETE");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


        // Iterate through routes to find a match
        foreach ($this->routes[$method] as $route => $handler) {
            if (preg_match('#^' . $route . '$#', $uri, $matches)) {
                // Extract controller and action from handler
                $controller = $handler['controller'];
                $action = $handler['action'];

                // Create instance of controller and call action
                $controllerInstance = new $controller();
                $controllerInstance->$action($matches[1] ?? '');
                return;
            }
        }

        echo ('<h1> 404 Page not found </h1>');
    }
}
