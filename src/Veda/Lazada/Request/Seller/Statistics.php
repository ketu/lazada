<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Request\Seller;

use Veda\Lazada\Request\RequestAbstract;

/**
 * Class Statistics
 * @package Veda\Lazada\Request\Seller
 * @desc Returns sales and orders metrics for a specified period.
 */
class Statistics extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetStatistics";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
}