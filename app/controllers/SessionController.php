<?php

use Iron\Models\IronClieEnti as User;
use Iron\Helpers\HttpStatus;

/**
 * Application session's controller.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.002         @30/10/2018
 */
class SessionController extends BaseController {

    /**
     * Creates a new user [IRON_CLIE_ENTI].
     * 
     * @return \Phalcon\Http\Response HTTP response object, that contains a JSON
     *                                that represents the user object.
     */
    function registerAction() {
        if ($this->request->isPost() && $this->request->isAjax()) {
            try {
                $userObj = new User(
                        $this->request->getQuery('username')
                        , $this->request->getQuery('password')
                );
                $userObj->save();

                return parent::httpResponse(json_encode($userObj));
            } catch (Exception $e) {
                return parent::httpResponse($e->getMessage());
            }
        }
    }

    /**
     * Validates the authorization on the application.
     * 
     * @return \Phalcon\Http\Response HTTP response object, that contains a JSON
     *                                that represents the user login 
     *                                authorization.
     */
    function doLoginAction() {
        if ($this->request->isPost() && $this->request->isAjax()) {
            try {
                $user = new User(
                        $this->request->getPost('username')
                        , $this->request->getPost('password')
                );

                if ($user->isRegisted()) {
                    $reponse = $this->_translator()->get(
                            __CLASS__ . __METHOD__
                            . HttpStatus::SC_DESC[HttpStatus::SC_200]
                    );

                    return parent::httpResponse(
                                    $reponse
                                    , HttpStatus::SC_200
                                    , HttpStatus::SC_DESC[HttpStatus::SC_200]
                                    , HttpStatus::CT_TEXT_PLAIN
                    );
                } else {
                    $reponse = $this->_translator()->get(
                            __CLASS__ . __METHOD__
                            . HttpStatus::SC_DESC[HttpStatus::SC_401]
                    );

                    return parent::httpResponse(
                                    $reponse
                                    , HttpStatus::SC_401
                                    , HttpStatus::SC_DESC[HttpStatus::SC_401]
                                    , HttpStatus::CT_TEXT_PLAIN
                    );
                }
            } catch (Exception $e) {
                return parent::httpResponse($e->getMessage());
            }
        }
    }

}
