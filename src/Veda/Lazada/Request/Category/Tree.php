<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */
namespace Veda\Lazada\Request\Category;

use Veda\Lazada\Request\RequestAbstract;

class Tree extends RequestAbstract
{
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetCategoryTree";
    }
}
