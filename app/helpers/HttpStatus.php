<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Iron\Helpers;

use Phalcon\Http\Request;

/**
 * Application dependency injector.
 *
 * @author      Francisco Martins   <francisco_jcm_7@hotmail.com>
 * @version     000.000.001         @10/09/2018
 */
class HttpStatus {

    //<editor-fold defaultstate="collapsed" desc="Http Codes => Status">
    const SC_DESC = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing', // WebDAV; RFC 2518
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information', // since HTTP/1.1
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status', // WebDAV; RFC 4918
        208 => 'Already Reported', // WebDAV; RFC 5842
        226 => 'IM Used', // RFC 3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other', // since HTTP/1.1
        304 => 'Not Modified',
        305 => 'Use Proxy', // since HTTP/1.1
        306 => 'Switch Proxy',
        307 => 'Temporary Redirect', // since HTTP/1.1
        308 => 'Permanent Redirect', // approved as experimental RFC
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot', // RFC 2324
        419 => 'Authentication Timeout', // not in RFC 2616
        420 => 'Method Failure', // Spring Framework
        422 => 'Unprocessable Entity', // WebDAV; RFC 4918
        423 => 'Locked', // WebDAV; RFC 4918
        424 => 'Method Failure', // WebDAV)
        425 => 'Unordered Collection', // Internet draft
        426 => 'Upgrade Required', // RFC 2817
        428 => 'Precondition Required', // RFC 6585
        429 => 'Too Many Requests', // RFC 6585
        431 => 'Request Header Fields Too Large', // RFC 6585
        444 => 'No Response', // Nginx
        449 => 'Retry With', // Microsoft
        450 => 'Blocked by Windows Parental Controls', // Microsoft
        451 => 'Redirect', // Microsoft
        451 => 'Unavailable For Legal Reasons', // Internet draft
        494 => 'Request Header Too Large', // Nginx
        495 => 'Cert Error', // Nginx
        496 => 'No Cert', // Nginx
        497 => 'HTTP to HTTPS', // Nginx
        499 => 'Client Closed Request', // Nginx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates', // RFC 2295
        507 => 'Insufficient Storage', // WebDAV; RFC 4918
        508 => 'Loop Detected', // WebDAV; RFC 5842
        509 => 'Bandwidth Limit Exceeded', // Apache bw/limited extension
        510 => 'Not Extended', // RFC 2774
        511 => 'Network Authentication Required', // RFC 6585
        598 => 'Network read timeout error', // Unknown
        599 => 'Network connect timeout error', // Unknown
    );
    const SC_100 = 100;
    const SC_101 = 101;
    const SC_102 = 102;
    const SC_200 = 200;
    const SC_201 = 201;
    const SC_202 = 202;
    const SC_203 = 203;
    const SC_204 = 204;
    const SC_205 = 205;
    const SC_206 = 206;
    const SC_207 = 207;
    const SC_208 = 208;
    const SC_215 = 215;
    const SC_226 = 226;
    const SC_250 = 250;
    const SC_300 = 300;
    const SC_301 = 301;
    const SC_302 = 302;
    const SC_303 = 303;
    const SC_304 = 304;
    const SC_305 = 305;
    const SC_306 = 306;
    const SC_307 = 307;
    const SC_308 = 308;
    const SC_400 = 400;
    const SC_401 = 401;
    const SC_402 = 402;
    const SC_403 = 403;
    const SC_404 = 404;
    const SC_405 = 405;
    const SC_406 = 406;
    const SC_407 = 407;
    const SC_408 = 408;
    const SC_409 = 409;
    const SC_410 = 410;
    const SC_411 = 411;
    const SC_412 = 412;
    const SC_413 = 413;
    const SC_414 = 414;
    const SC_415 = 415;
    const SC_416 = 416;
    const SC_417 = 417;
    const SC_418 = 418;
    const SC_419 = 419;
    const SC_420 = 420;
    const SC_422 = 422;
    const SC_423 = 423;
    const SC_424 = 424;
    const SC_425 = 425;
    const SC_426 = 426;
    const SC_428 = 428;
    const SC_429 = 429;
    const SC_431 = 431;
    const SC_444 = 444;
    const SC_449 = 449;
    const SC_450 = 450;
    const SC_451 = 451;
    const SC_494 = 494;
    const SC_495 = 495;
    const SC_496 = 496;
    const SC_497 = 497;
    const SC_499 = 499;
    const SC_500 = 500;
    const SC_501 = 501;
    const SC_502 = 502;
    const SC_503 = 503;
    const SC_504 = 504;
    const SC_505 = 505;
    const SC_506 = 506;
    const SC_507 = 507;
    const SC_508 = 508;
    const SC_509 = 509;
    const SC_510 = 510;
    const SC_511 = 511;
    const SC_598 = 598;
    const SC_599 = 599;
    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Http Codes => Content Types">
    const CT_TEXT_CSS = 'text/css';
    const CT_TEXT_SCV = 'text/csv';
    const CT_TEXT_HTML = 'text/html';
    const CT_TEXT_JS = 'text/javascript';
    const CT_TEXT_PLAIN = 'text/plain';
    const CT_TEXT_XML = 'text/xml';
    const CT_MP_MIXED = 'multipart/mixed';
    const CT_MP_ALT = 'multipart/alternative';
    const CT_MP_REALTED = 'multipart/related';
    const CT_APP_EDI_X12 = 'application/EDI-X12';
    const CT_APP_EDIFACT = 'application/EDIFACT';
    const CT_APP_JS = 'application/javascript';
    const CT_APP_OCTET_STREAM = 'application/octet-stream';
    const CT_APP_OGG = 'application/ogg';
    const CT_APP_PDF = 'application/pdf';
    const CT_APP_XHTML = 'application/xhtml+xml';
    const CT_APP_X_SHOCKWAVE = 'application/x-shockwave-flash';
    const CT_APP_JSON = 'application/json';
    const CT_APP_LD_JSON = 'application/ld+json';
    const CT_APP_XML = 'application/xml';
    const CT_APP_ZIP = 'application/zip';

    //</editor-fold>

    public static function ExceptionHttpResponse($msg) {
        $resp = new Request();
        if ($resp->isPost() || $resp->isAjax()) {
            /* Nova instância Phalcon Responce */
            $response = new \Phalcon\Http\Response();
            $response->setStatusCode(HttpStatus::SC_500, HttpStatus::SC_DESC[HttpStatus::SC_500]);
            $response->setContentType(HttpStatus::CT_TEXT_PLAIN, 'UTF-8');
            $response->setContent($msg);
            return $response;
        }
    }

}
