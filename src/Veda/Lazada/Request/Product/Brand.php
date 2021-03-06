<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */
namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Request\RequestAbstract;
use Veda\Lazada\Request\PagingTrait;

class Brand extends RequestAbstract
{
    use PagingTrait;

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetBrands";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }
 }