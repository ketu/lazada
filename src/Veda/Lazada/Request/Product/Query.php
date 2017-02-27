<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\RequestAbstract;
use Veda\Lazada\Request\RequestTrait;

class Query extends RequestAbstract
{
    use RequestTrait;
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetProducts";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return "GET";
    }

}