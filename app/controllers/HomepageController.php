<?php

class HomepageController extends BaseController {

    public function showAction() {
        $this->view->test = 'Olá';
    }

}
