<?php

namespace Iron\Services\Core;

use Phalcon\Di;

class Dependencys extends Di
{

    public function __constructor()
    {
        parent::__constructor();
        $this->set("router", Router::class);
        $this->set("url", Url::class);
        $this->set("dispatcher", MvcDispatcher::class);
        $this->set("response", Response::class);
        $this->set("request", Request::class);
        $this->set(
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
        $this->set(
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
        $this->set(
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
        $this->set(
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
        $this->set(
            "tradutor", function () {
                return new TranslatorService();
            }, true);
        $this->set("modelsMetadata", ModelMetadata::class);
        $this->set("modelsManager", ModelManager::class);
        $this->set("crypt", function () {return new SecurityHelper();});
    }
}
