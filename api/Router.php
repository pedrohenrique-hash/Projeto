<?php

namespace App\Api;

class Router {

    private $routes = [];

    public function addRoute($method, $route, $handler) {

        $this->routes[] = ['method' => $method, 'route' => $route, 'handler' => $handler];
    
    }

    public function handleRequest() {

        $method = $_SERVER['REQUEST_METHOD'];

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {

            if ($route['method'] == $method && preg_match($route['route'], $path, $matches)) {

                array_shift($matches);

                return call_user_func_array($route['handler'], $matches);
            }

        }

        http_response_code(404);

        echo json_encode(['message' => 'Route not found']);
    
    }

}
