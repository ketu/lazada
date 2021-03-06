<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Request\ProductTrait;
use Veda\Lazada\Request\RequestAbstract;

class Create extends RequestAbstract
{
    use ProductTrait;

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return 'CreateProduct';
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

}