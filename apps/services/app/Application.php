<?php

namespace Iron\Services\App;

use Iron\Services\Translation\TranslatorService;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class Dependency extends Phalcon\Di {

    function __construct() {
        parent::__construct();
        $this->set('translator', new TranslatorService());
    }

}
