<?php

namespace App\Core;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    /**
     * @return array
     */
    public function resolve(): array
    {
        $route = $_SERVER['REQUEST_URI'];
        if (($pos = strpos($route, '?')) !== false) {
            $route = substr($route, 0, $pos);
        }
        $route = explode('/', $route);
        array_shift($route);
        $controllerName = array_shift($route);
        $actionName = array_shift($route);
        $params = $route;
        return [$controllerName, $actionName, $params];
    }
}