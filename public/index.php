<?php

use Iron\Services\Core\Dependencys;
use Phalcon\Mvc\Application;

require '../app/Config/Config.php';

try {
    $application = new Application(new Dependencys());
    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
