<?php

error_log(E_ALL);
define('APP_PATH', realpath('..') . '/');

use Iron\Services\Core\Dependencys;
use Phalcon\Mvc\Application;
use Phalcon\Loader;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
require_once APP_PATH . 'app/config/Config.php';

try {
    $loader = new Loader();
    $loader->registerDirs(
            (array) $configuration->folders
    )->registerNamespaces(
            (array) $configuration->namespaces
    )->register();
    
    $app = new Application(new Dependencys());
    
    echo $app->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
