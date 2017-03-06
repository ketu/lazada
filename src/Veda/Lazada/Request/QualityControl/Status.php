<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\QualityControl;


use Veda\Lazada\Request\PagingTrait;
use Veda\Lazada\Request\RequestAbstract;

class Status extends RequestAbstract
{
    use PagingTrait;

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetQcStatus";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }

    public function setSkuList(array $skuList)
    {
        $this->setQueryParam('SkuSellerList', \json_encode($skuList));
    }
}