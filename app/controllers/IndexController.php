<?php
/*
 * Copyright 2018, 
 * Francisco Martins    <francisco_jcm_7@hotmail.com>,
 * José Pereira         <fofurna@gmail.com>
 * Bruno Barbosa        <bmanecas@hotmail.com>  
 * All Rights Reserved.
 */

class IndexController extends BaseController
{

    public function initialize()
    {
        
    }

    public function indexAction()
    {
        $this->view->text = "ola";
    }
}
