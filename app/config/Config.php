<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use \Phalcon\Config;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
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
