<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Request\Seller;

use Veda\Lazada\Request\RequestAbstract;

/**
 * Class Metrics
 * @package Veda\Lazada\Request\Seller
 * @desc Returns sales and order metric for a specified period.
 */
class Metrics extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetMetrics";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
}