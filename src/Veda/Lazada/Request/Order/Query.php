<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order;

use Veda\Lazada\Request\PagingTrait;
use Veda\Lazada\Request\DateFilterTrait;

class Query extends RequestAbstract
{
    use PagingTrait, DateFilterTrait;

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetOrders";
    }


    public function setStatusFilter($filter)
    {
        $this->setQueryParam('Status', $filter);
    }

    /**
     * @param $orderBy
     * @desc Allows to choose the sorting column. Possible values (created_at, updated_at). In version 2.0 it is fixed to updated_at and cant be changed
     */
    public function setOrderBy($orderBy, $direction = null)
    {
        $this->setQueryParam('SortBy', $orderBy);
        if (!$direction) {
            $this->setQueryParam('SortDirection', $direction);
        }
    }
}
