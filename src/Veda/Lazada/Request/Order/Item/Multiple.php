<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order\Item;

use Veda\Lazada\Request\RequestAbstract;

class Multiple extends RequestAbstract
{
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetOrderItems";
    }

    public function setOrderList(array $orderIdList)
    {
        $this->setQueryParam('OrderIdList', implode(',', $orderIdList));
    }
}