<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/6
 */

namespace Veda\Lazada\Exception;


use Exception;

class InvalidArgumentException extends \InvalidArgumentException
{
    public function __construct($message = "", $requestCls, $code = 0, Exception $previous = null)
    {
        $message = sprintf($message, $requestCls);
        parent::__construct($message, $code, $previous);
    }
}