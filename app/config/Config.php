<?php

use \Phalcon\Config;

$configuration = new Config([
    'namespaces' => [
        "app\helper" => "../app/helpers/",
        "app\services\session" => "../app/services",
        "app\services" => "../app/services",
        "Iron\Services\Core" => '../app/services/core'],
    'folders' => [
        "../app/controllers/",
        "../app/models/",
        "../app/helpers/",
    ]]
);

