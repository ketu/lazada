<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order;


use Veda\Lazada\Request\RequestAbstract;

class Invoice extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetDocument";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function setOrderItem($itemId)
    {
        $this->setQueryParam('OrderItemId', $itemId);
    }
}