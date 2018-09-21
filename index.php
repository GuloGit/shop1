<?php

use \Libs\Config\{Config,FileSource};

require_once "./vendor/autoload.php";
$url = $_SERVER["REQUEST_URI"];

$config = Config::getInstance();

try {
    $config->add(new FileSource("./config", "routes"));
    $config->add(new FileSource("./config", "database"));
    $config->add(new FileSource("./config", "system"));

    $routes = $config->get("routes");

    $router = new \Libs\Router($routes, "Errors/show404");
    $router->execute($url);
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}
