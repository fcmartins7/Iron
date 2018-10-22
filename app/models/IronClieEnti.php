<?php

namespace Iron\Models;

use Phalcon\Mvc\Model;
use Iron\Helpers\SecurityHelper;

/**
 * Application's user's entity's.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class IronClieEnti extends Model {

    /**
     * Entity id;
     * 
     * @var int 
     */
    private $ID;

    /**
     * Entity username;
     * 
     * @var string Login username
     */
    private $USR;

    /**
     * Entity password;
     * 
     * @var string Password Hash 
     */
    private $PAS;

    public function __construct($user, $password) {
        $this->USR = $user;
        $this->PAS = SecurityHelper::encryptPassword($password);
        return $this;
    }

    function getID() {
        return $this->ID;
    }

    function getUSR() {
        return $this->USR;
    }

    function getPAS() {
        return $this->PAS;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setUSR($USR) {
        $this->USR = $USR;
    }

    function setPAS($PAS) {
        $this->PAS = $PAS;
    }

}
