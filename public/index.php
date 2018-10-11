<?php

use Phalcon\Mvc\Application,
    Iron\Services\App\Loader as Loader,
    Iron\Services\App\Dependency as Di;

try {
    new Loader();
    $application = new Application(new Di());
    $response = $application->handle();

    echo $response->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
}
