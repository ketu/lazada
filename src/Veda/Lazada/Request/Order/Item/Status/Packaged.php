<?php

/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order\Item\Status;

use Veda\Lazada\Request\RequestAbstract;

class Packaged extends RequestAbstract
{
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "SetStatusToPackedByMarketplace";
    }

    public function setOrderItem(array $itemId)
    {
        $this->setQueryParam('OrderItemIds', implode(',', $itemId));
    }

    public function setDeliveryType($type)
    {
        $this->setQueryParam('DeliveryType', $type);
    }

    public function setShippingProvider($shippingProvider)
    {
        $this->setQueryParam('ShippingProvider', $shippingProvider);
    }
}