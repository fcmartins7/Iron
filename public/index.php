<?php

use app\helpers\SecurityHelper;
use app\services\session\SessionService;
use app\services\TranslatorService;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Model\Manager as ModelManager;
use Phalcon\Mvc\Model\Metadata\Memory as ModelMetadata;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use Iron\Services\Core\Dependencys;

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
