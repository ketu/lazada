<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/2/27
 * Time: 17:49
 */

namespace Veda\Lazada\Request\Product;


use Veda\Lazada\RequestAbstract;
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
        return "GET";
    }
 }