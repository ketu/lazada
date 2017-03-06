<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Request\RequestAbstract;
use Veda\Lazada\Request\PagingTrait;

class Query extends RequestAbstract
{
    use PagingTrait;

    const PRODUCT_STATUS_ALL = 'all';
    const PRODUCT_STATUS_LIVE = 'live';
    const PRODUCT_STATUS_INACTIVE = 'inactive';
    const PRODUCT_STATUS_DELETED = 'deleted';
    const PRODUCT_STATUS_IMAGE_MISSING = 'image-missing';
    const PRODUCT_STATUS_PENDING = 'pending';
    const PRODUCT_STATUS_REJECTED = 'rejected';
    const PRODUCT_STATUS_SOlD_OUT = 'sold-out';


    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetProducts";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_GET;
    }

    public function setCreatedTimeLimit(\DateTime $startTime = null, \DateTime $endTime = null)
    {
        if (null !== $startTime) {
            $this->setQueryParam('CreatedAfter', $startTime->format(\DateTime::ISO8601));
        }
        if (null !== $endTime) {
            $this->setQueryParam('CreatedBefore', $startTime->format(\DateTime::ISO8601));
        }
    }

    public function setUpdatedTimeLimit(\DateTime $startTime = null, \DateTime $endTime = null)
    {
        if (null !== $startTime) {
            $this->setQueryParam('UpdatedAfter', $startTime->format(\DateTime::ISO8601));
        }
        if (null !== $endTime) {
            $this->setQueryParam('UpdatedBefore', $startTime->format(\DateTime::ISO8601));
        }
    }

    public function setSearch($keyword)
    {
        $this->setQueryParam('Search', $keyword);
    }

    public function setStatusFilter($filter)
    {
        $this->setQueryParam('Filter', $filter);
    }

    public function setSkuFilter(array $sku)
    {
        $this->setQueryParam('SkuSellerList', \json_encode($sku));
    }

    public function setOptions($option)
    {
        $this->setQueryParam('Options', $option);
    }
}