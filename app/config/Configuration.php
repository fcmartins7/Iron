<?php

namespace Iron\Config;

use Phalcon\Config;

/**
 * Description of ConfigurationLoader
 *
 * @author FCMartins
 * @version 1.00.00
 */
class Configuration {

    private static function readConfig() {
        return new Config([
            'application' => [
                'controllersDir' => 'app/controllers',
                'pluginsDir' => 'app/plugins',
                'modelsDir' => 'app/models',
                'servicesDir' => 'app/services',
                'helpersDir' => 'app/helpers',
                'cacheDir' => 'app/cache',
                'viewsDir' => 'app/views',
            ]
        ]);
    }

    public static function start() {
        $config = self::readConfig();
        $loader = new \Phalcon\Loader();
        $loader->registerDirs([
            APP_PATH . $config->application->controllersDir,
            APP_PATH . $config->application->pluginsDir,
            APP_PATH . $config->application->modelsDir,
            APP_PATH . $config->application->servicesDir,
            APP_PATH . $config->application->helpersDir,
            APP_PATH . $config->application->cacheDir,
            APP_PATH . $config->application->viewsDir
        ]);
        $loader->registerNamespaces([
            'Iron\Services\Translation' => APP_PATH.'app/services/translation',
            'Iron\Services\App' =>  APP_PATH.'app/services/app',
            'Iron\Services' =>  APP_PATH.'app/services',
            'Iron\Service\Session' =>  APP_PATH.'app/services/session',
            'Iron\Config' => APP_PATH.'app/config',
        ]);
        $loader->register();
    }

}
