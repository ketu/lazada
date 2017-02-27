<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */

namespace Veda\Lazada\Request\Product;


use Veda\Lazada\RequestAbstract;

class SearchSPU extends RequestAbstract
{

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "SearchSPUs";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return "POST";
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
