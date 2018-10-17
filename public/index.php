<?php

use app\helpers\SecurityHelper;
use app\services\session\SessionService;
use app\services\TranslatorService;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di;
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

$loader = new Loader();
$loader->registerDirs(
    [
        "../apps/controllers/",
        "../apps/models/",
        "../apps/helpers/",
    ]
)->registerNamespaces(
    [
        "app\helper" => "../apps/helpers/",
        "app\services\session" => "../apps/services",
        "app\services" => "../apps/services",
    ]
)->register();

$di = new Di();
$di->set("router", Router::class);
$di->set("url", Url::class);
$di->set("dispatcher", MvcDispatcher::class);
$di->set("response", Response::class);
$di->set("request", Request::class);
$di->set(
    "voltService", function ($view, $di) {
        $volt = new Volt($view, $di);

        $volt->setOptions(
            [
                "compiledPath" => "../apps/cache/",
                "compiledExtension" => ".compiled",
                "compiledSeparator" => "_",
                'compileAlways' => true,
            ]
        );

        return $volt;
    });
$di->set(
    "view", function () {
        $view = new View();

        $view->setViewsDir("../apps/views/");
        $view->registerEngines(
            [
                ".volt" => "voltService",
            ]
        );
        return $view;
    }
);
$di->set(
    "session", function () {
        return new SessionService($this, [
            "host" => "eu-cdbr-west-02.cleardb.net",
            "username" => "baecf296ef14dd",
            "password" => "065fb7b9",
            "dbname" => "heroku_97aca66527a4246",
        ]
        );
    }, true
);
$di->set(
    "db", function () {
        return new Mysql(
            [
                "host" => "eu-cdbr-west-02.cleardb.net",
                "username" => "baecf296ef14dd",
                "password" => "065fb7b9",
                "dbname" => "heroku_97aca66527a4246",
            ]
        );
    }
);
$di->set(
    "tradutor", function () {
        return new TranslatorService();
    }, true);
$di->set("modelsMetadata", ModelMetadata::class);
$di->set("modelsManager", ModelManager::class);
$di->set("crypt", function () {return new SecurityHelper();});

try {
    $application = new Application($di);
    $response = $application->handle();
    echo $response->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
