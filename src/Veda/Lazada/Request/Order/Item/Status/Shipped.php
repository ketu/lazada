<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/3/6
 * Time: 12:14
 */

namespace Veda\Lazada\Request\Order\Item\Status;


use Veda\Lazada\Request\RequestAbstract;

class Shipped extends RequestAbstract
{

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "SetStatusToReadyToShip";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }
    public function setOrderItem(array $itemId)
    {
        $this->setQueryParam('OrderItemIds', implode(',', $itemId));
    }

    public function setDeliveryType($type)
    {
        $this->setQueryParam('DeliveryType', $type);
    }

    public function setTrackingNumber($trackingNumber)
    {
        $this->setQueryParam('TrackingNumber', $trackingNumber);
    }
    public function setShippingProvider($shippingProvider)
    {
        $this->setQueryParam('ShippingProvider', $shippingProvider);
    }

    public function setSerialNumber(array $serialNumber)
    {
        $this->setQueryParam('SerialNumber', \json_encode($serialNumber));
    }

}