<?php

namespace Iron\Services\Core;

use app\helpers\SecurityHelper;
use app\services\session\SessionService;
use Iron\Services\TranslatorService;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Model\Manager as ModelManager;
use Phalcon\Mvc\Model\Metadata\Memory as ModelMetadata;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;

class Dependencys extends Di {

    public function __construct() {
        parent::__construct();
        $this->set("router", function() {
            $router = new Router();
            $router->add('/', [
                'controller' => 'Homepage',
                'action' => 'show'
            ]);
            $router->add('/session/register', [
                'controller' => 'Session',
                'action' => 'register'
            ]);
            $router->handle();
            return $router;
        });
        $this->set("url", Url::class);
        $this->set("dispatcher", MvcDispatcher::class);
        $this->set("response", Response::class);
        $this->set("request", function() {
            return new Request();
        });
        $this->set(
                "voltService", function ($view, $di) {
            $volt = new Volt($view, $di);

            $volt->setOptions(
                    [
                        "compiledPath" => "../app/cache/",
                        "compiledExtension" => ".compiled",
                        "compiledSeparator" => "_",
                        'compileAlways' => true,
                    ]
            );

            return $volt;
        });
        $this->set(
                "view", function () {
            $view = new View();

            $view->setViewsDir("../app/views/");
            $view->registerEngines(
                    [
                        ".volt" => "voltService",
                    ]
            );
            return $view;
        }
        );
        $this->set(
                "db", function () {
            return new Mysql(
                    [
                "host" => "eu-cdbr-west-02.cleardb.net",
                "username" => "bbb8e5cd884b58",
                "password" => "7434f814",
                "dbname" => "heroku_e754c9222cc4114",
                    ]
            );
        }
        );
        $this->set(
                "translator", function () {
            return new TranslatorService();
        }, true);
        $this->set("modelsMetadata", ModelMetadata::class);
        $this->set("modelsManager", ModelManager::class);
        $this->set("crypt", function () {
            return new SecurityHelper();
        });
    }

}
