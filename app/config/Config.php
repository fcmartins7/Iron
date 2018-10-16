<?php
/*
 * Copyright 2018, 
 * Francisco Martins    <francisco_jcm_7@hotmail.com>,
 * José Pereira         <fofurna@gmail.com>
 * Bruno Barbosa        <bmanecas@hotmail.com>  
 * All Rights Reserved.
 */

use Phalcon\Config;

$config = new Config(
    [
    'directories' =>
    [
        'property' => 1,
        'property2' => 'yeah',
    ],
    'namespaces' =>
    [
        'property' => 1,
        'property2' => 'yeah',
    ]
    ]
);
