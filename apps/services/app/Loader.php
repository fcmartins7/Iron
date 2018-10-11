<?php

namespace Iron\Services\App;

use Phalcon\Loader;

/**
 * Application properties loader
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class Loader extends Loader {

    /**
     * Loads the application properties
     * 
     * @param   Array   $directories    Application directories.
     * @param   Array   $namespaces     Application Name spaces.
     */
    function __construct($directories, $namespaces) {
        parent::__construct();
        $this->registerDirs($directories);
        $this->registerNamespaces($namespaces);
        $this->register();
    }

}
