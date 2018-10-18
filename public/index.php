<?php

use Phalcon\Loader;
use Iron\Services\Core\Dependencys;
use Phalcon\Mvc\Application;

error_log(E_ALL);

$loader = new Loader();
$loader->registerDirs(
    [
        "../app/controllers/",
        "../app/models/",
        "../app/helpers/",
    ]   
)->registerNamespaces(
    [
        "app\helper" => "../app/helpers/",
        "app\services\session" => "../app/services",
        "app\services" => "../app/services",
        "Iron\Services\Core" => '../app/services/core'
    ]
)->register();

try {
    $application = new Application(new Dependencys());
    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
