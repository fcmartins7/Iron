<?php

error_log(E_ALL);

use Iron\Services\Core\Dependencys;
use Phalcon\Mvc\Application;
use Phalcon\Loader;

require '../app/Config/Config.php';

try {
    $appLoader = new Loader();

    $appLoader->registerDirs(
            $configuration->folders
    )->registerNamespaces(
            $configuration->namespaces
    )->register();
    $application = new Application(new Dependencys());
    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
