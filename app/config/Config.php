<?php

use \Phalcon\Config;

$configuration = new Config([
    'namespaces' => [
        "Iron\Helpers" => "../app/helpers/",
        "Iron\Services\Core" => '../app/services/core',
        "Iron\Models" => '../app/models'],
    'folders' => [
        "../app/controllers/",
        "../app/models/",
        "../app/helpers/",
    ]]
);

