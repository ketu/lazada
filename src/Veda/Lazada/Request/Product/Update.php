<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/6
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Request\RequestAbstract;

class Update extends RequestAbstract
{
    public function getAction()
    {
        return 'UpdateProduct';
        // TODO: Implement getAction() method.
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }
}