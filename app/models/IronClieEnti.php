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
class IronClieEnti extends Model implements \JsonSerializable {

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

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'iron_clie_enti';
    }

    function __construct($USR, $PAS) {
        $this->USR = $USR;
        $this->PAS = SecurityHelper::encryptPassword($PAS);
    }

    /**
     * Validates if the user is been registered on the Data Base.
     * 
     * @return boolean If TRUE the users is already set on the Data Base. If 
     *                 FALSE the system couldn't found the user on Data Base.
     */
    public function isRegisted() {
        
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

    /**
     * Especifica os dados a serem serializador no json_encode
     * @link http://php.net/manual/en/function.get-object-vars.php
     * @return Array(object)
     */
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

}
