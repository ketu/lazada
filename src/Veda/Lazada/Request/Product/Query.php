<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Config;
use Veda\Lazada\Request\RequestAbstract;
use Veda\Lazada\Request\DateFilterTrait;
use Veda\Lazada\Request\PagingTrait;
use Veda\Lazada\Response\JsonResponse;

class Query extends RequestAbstract
{
    use PagingTrait, DateFilterTrait;

    public function __construct(Config $config, $defaultHandlerCls = \Veda\Lazada\Response\Product\Query::class)
    {
        parent::__construct($config, $defaultHandlerCls);
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetProducts";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }


    public function setSearch($keyword)
    {
        $this->setQueryParam('Search', $keyword);
    }

    public function setStatusFilter($filter)
    {
        $this->setQueryParam('Filter', $filter);
    }

    public function setSkuFilter(array $sku)
    {
        $this->setQueryParam('SkuSellerList', \json_encode($sku));
    }

    public function setOptions($option)
    {
        $this->setQueryParam('Options', $option);
    }
}