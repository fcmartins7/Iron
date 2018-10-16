<?php

/*
 * Copyright 2018, 
 * Francisco Martins    <francisco_jcm_7@hotmail.com>,
 * José Pereira         <fofurna@gmail.com>
 * Bruno Barbosa        <bmanecas@hotmail.com>  
 * All Rights Reserved.
 */

namespace Iron\Services\App;

use Phalcon\Di,
    Phalcon\Http\Request,
    Phalcon\Http\Response,
    Phalcon\Mvc\Router,
    Phalcon\Mvc\View,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\View\Engine\Volt,
    Iron\Services\Translation\TranslatorService,
    Iron\Services\Session\SessionService;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins <francisco_jcm_7@hotmail.com>
 * @version     000.000.001 (10/09/2018)
 */
class Dependency extends Di {

    function __construct() {
        parent::__construct();

        $this->set('view', function () {
            $view = new View();
            $view->setViewsDir(APP_PATH . 'app/views');
            $view->registerEngines(array(
                ".volt" => Volt::class
            ));
            return $view;
        });

        $this->set('request', new Request());

        $this->set('router', new Router());

        $this->set('dispatcher', new Dispatcher());

        $this->set('response', new Response());

        $this->set('translator', new TranslatorService($this));
    }

}
