<?php
/*
 * Copyright 2018, 
 * Francisco Martins    <francisco_jcm_7@hotmail.com>,
 * José Pereira         <fofurna@gmail.com>
 * Bruno Barbosa        <bmanecas@hotmail.com>  
 * All Rights Reserved.
 */
namespace Iron\Services\Translation;

use Phalcon\Translate\Adapter\NativeArray,
    Iron\Services\Base;

/**
 * Application translation module.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class TranslatorService extends Base
{

    const BASE_FILE_DIR = '../app/lang/';
    const FILE_EXT = '.php';

    private $_textos;

    public function __construct($di = null)
    {
        parent::__construct($di);
        $this->start();
    }

    /**
     * TODO: Must implement caching
     */
    private function start()
    {

        $userLang = $this->_request()->getBestLanguage();

        $translationFile = self::BASE_FILE_DIR . $userLang . self::FILE_EXT;

        if (file_exists($translationFile)) {
            require $translationFile;
        } else {
            require self::BASE_FILE_DIR . "en.php";
        }
        $this->_textos = new NativeArray(
            ["content" => $lang]
        );
    }

    /**
     * Returns a string for the requested key
     *  
     * @param   string      $key    Label key
     * @return  string              Label text
     */
    public function get($key)
    {
        return $this->_textos->_($key) != NULL ? $this->_textos->_($key) : '';
    }
}
