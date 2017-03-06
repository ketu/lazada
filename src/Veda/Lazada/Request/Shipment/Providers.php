<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Shipment;

use Veda\Lazada\Request\RequestAbstract;

class Providers extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetShipmentProviders";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
}