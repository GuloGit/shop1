<?php
namespace Libs;
class Router
{
    protected $routes;
    protected $controller404;

    public function __construct($routes, $controller404)
    {
        if (is_array($routes)) {
            $this->routes = $routes;
            $this->controller404 = $controller404;
        } else {
            throw new Exception("Настройки машрутизатора должны быть массивом");
        }
    }

    public function execute($path)
    {
        foreach ($this->routes as $route => $pathToController) {
            $matches = [];

            if (preg_match("#^{$route}$#", $path, $matches)) {
                $arg = null;
                if (isset($matches[1])) {
                    $arg = $matches[1];
                }

                return $this->runController($pathToController, $arg);
            }
        }

        // если в цикле не было return, то значит, совпадений нет
        $this->runController($this->controller404);
    }

    protected function runController($pathToController, $arg = null)
    {
        $parts = explode("/", $pathToController);

        $controllerName = "\\Controllers\\{$parts[0]}";
        $controller = new $controllerName;

        $methodName = $parts[1];
        return $controller->{$methodName}($arg);
    }

}