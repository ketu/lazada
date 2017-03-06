<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order;

use Veda\Lazada\Request\RequestAbstract;

class Info extends RequestAbstract
{
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetOrder";
    }

    public function setOrderId($orderId)
    {
        $this->setQueryParam('OrderId', $orderId);
    }

}