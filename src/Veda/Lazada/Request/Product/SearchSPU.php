<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Request\PagingTrait;
use Veda\Lazada\Request\RequestAbstract;

class SearchSPU extends RequestAbstract
{
    use PagingTrait;

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "SearchSPUs";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function setCategoryId($categoryId)
    {
        $this->setQueryParam('CategoryId', $categoryId);
    }
    public function setSearch($keyword)
    {
        $this->setQueryParam('Search', $keyword);
    }
}
