<?php

use Phalcon\Mvc\Controller;

/**
 * Description of BaseController
 *
 * @author FCMartins    <francisco_jcm_7@hotmail.com>
 * @version 1.00.00     18-Oct-2018
 */
class BaseController extends Controller {

    /** @return \Iron\Services\TranslatorService */
    protected function _translator() {
        return $this->translator;
    }

    public function httpResponse($content, $status = 200, $description = 'OK', $contentType = 'application/json', $headers = array()) {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode($status, $description);
        $response->setContentType($contentType, 'UTF-8');
        $response->setContent($content);
        foreach ($headers as $key => $value) {
            $response->setHeader($key, $value);
        }
        return $response;
    }

}
