<?php
namespace App\Core;

/**
 * Class Kernel
 * @package App\Core
 */
class Kernel
{
    public $defaultControllerName = 'AppController';
    public $defaultActionName = "index";

    public function launch()
    {
        list($controllerName, $actionName, $params) = App::$router->resolve();
        $controllerName = preg_replace('/[-\<\>\=\,\)\(]/', '', ucwords($controllerName, '-'));
        $actionName = lcfirst(preg_replace('/[-\<\>\=\,\)\(]/', '', ucwords($actionName, '-')));
        echo $this->launchAction($controllerName, $actionName, $params);
    }

    public function launchAction($controllerName, $actionName, $params)
    {
        $controllerClass = empty($controllerName) ? $this->defaultControllerName : $controllerName.'Controller';
        $controllerClass = "App\Controller\\{$controllerClass}";
        if (!class_exists($controllerClass)) {
            throw new \Exception('Route error', 404);
        }
        $controller = new $controllerClass;
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;
        if (!method_exists($controller, $actionName)) {
            throw new \Exception('Route error', 404);
        }
        return $controller->$actionName($params);
    }
}