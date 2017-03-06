<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/2/24
 * Time: 17:40
 */

namespace Veda\Lazada\Response;


interface ResponseInterface
{
    public function getResponse();
    public function success();
    public function getMessage();
    public function process();
}