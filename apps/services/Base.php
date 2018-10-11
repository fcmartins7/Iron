<?php

namespace Iron\Services;

/**
 * Base class for services;
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class Base {

    private $_di;

    function __construct($di) {
        $this->_di = $di;
    }

    /**
     * @return Phalcon\Http\Request Encapsulates request information for easy 
     *                              and secure access from application 
     *                              controllers; 
     */
    protected function _request() {
        return $this->_di->get("request");
    }

}
