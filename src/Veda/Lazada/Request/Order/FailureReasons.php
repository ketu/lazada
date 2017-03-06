<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Request\Order;


use Veda\Lazada\Request\RequestAbstract;

/**
 * Class FailureReasons
 * @package Veda\Lazada\Request\Order
 * @desc Returns additional error context for SetToCancelled and SetToFailedDelivery.
 */
class FailureReasons extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetFailureReasons";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
}