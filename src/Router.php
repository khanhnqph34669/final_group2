<?php

namespace Ductong\BaseMvc;

class Router {
    protected $routes = [];
    protected $fallback = null;

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function setFallback($controller, $action) {
        $this->fallback = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri) {
        $tmp = explode('?', $uri);
        $uri = $tmp[0];

        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } elseif ($this->fallback) {
            $controller = $this->fallback['controller'];
            $action = $this->fallback['action'];
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}

    