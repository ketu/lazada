<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Config\Status;

use Veda\Lazada\Config\ConfigAbstract;

class Product extends ConfigAbstract
{
    const PRODUCT_STATUS_ALL = 'all';
    const PRODUCT_STATUS_LIVE = 'live';
    const PRODUCT_STATUS_INACTIVE = 'inactive';
    const PRODUCT_STATUS_DELETED = 'deleted';
    const PRODUCT_STATUS_IMAGE_MISSING = 'image-missing';
    const PRODUCT_STATUS_PENDING = 'pending';
    const PRODUCT_STATUS_REJECTED = 'rejected';
    const PRODUCT_STATUS_SOlD_OUT = 'sold-out';

}