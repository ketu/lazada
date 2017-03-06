<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Request\Category;

use Veda\Lazada\Request\RequestAbstract;

class Attributes extends RequestAbstract
{
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetCategoryAttributes";
    }

    public function setCategoryId($categoryId)
    {
        $this->setQueryParam('CategoryId', $categoryId);
    }
}