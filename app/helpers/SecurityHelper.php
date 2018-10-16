<?php
/*
 * Copyright 2018, 
 * Francisco Martins    <francisco_jcm_7@hotmail.com>,
 * José Pereira         <fofurna@gmail.com>
 * Bruno Barbosa        <bmanecas@hotmail.com>  
 * All Rights Reserved.
 */
namespace app\helpers;

/**
 * Helper de encryptações
 *
 * @author      FCMartins
 * @version     1.00.00
 */
class SecurityHelper
{

    /**
     * Gera hash de ums password string.
     * 
     * @param   string  $password   Password
     * 
     * @return  Encrypted hash string
     */
    public function encryptPassword($password)
    {
        return password_hash(md5(base64_encode($password)), PASSWORD_DEFAULT);
    }

    /**
     * Valida se a password é igual á hash
     * 
     * @param   type    $password   Password
     * @param   type    $hash       Hash de encryptação
     * @return  boolean             Resultado  
     */
    public function passwordVerify($password, $hash)
    {
        return password_verify(md5(base64_encode($password)), $hash);
    }
}
