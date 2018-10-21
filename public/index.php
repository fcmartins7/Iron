<?php

error_log(E_ALL);

use Iron\Services\Core\Dependencys;
use Phalcon\Mvc\Application;
use Phalcon\Loader;

use \Phalcon\Config;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
$configuration = new Config([
    'namespaces' => [
        "app\helper" => "../app/helpers/",
        "app\services\session" => "../app/services",
        "app\services" => "../app/services",
        "Iron\Services\Core" => '../app/services/core'],
    'folders' => [
        "../app/controllers/",
        "../app/models/",
        "../app/helpers/",
    ]]
);

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
