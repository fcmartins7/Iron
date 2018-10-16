<?php
define('APP_PATH', realpath('..') . '/');

use Phalcon\Mvc\Application,
    Iron\Services\App\Dependency as Di,
    Iron\Config\Configuration;

require_once APP_PATH . 'app/libraries/autoload.php';

try {
    Configuration::start();
    $application = new Application(new Di());

    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
