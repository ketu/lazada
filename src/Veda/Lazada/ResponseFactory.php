<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/23
 */

namespace Veda\Lazada;

use GuzzleHttp\Psr7\Response;
use Veda\Lazada\Exception\InvalidArgumentException;
use Veda\Lazada\Response\ResponseAbstract;

class ResponseFactory
{
    private function __construct()
    {
    }

    public static function create($handler, Response $response)
    {
        if (!class_exists($handler)) {
            throw new InvalidArgumentException("Response handler (%s) not exists", $handler);
        }
        $cls = new $handler($response);
        if (!$cls instanceof ResponseAbstract) {
            throw new InvalidArgumentException("%s is not instanceof ResponseAbstract", $handler);
        }
        return $cls;
    }

}