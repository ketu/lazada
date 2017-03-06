<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Config\Status;

use Veda\Lazada\Config\ConfigAbstract;

class Order extends ConfigAbstract
{
    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_CANCELED = 'canceled';
    const ORDER_STATUS_READY_TO_SHIP = 'ready_to_ship';
    const ORDER_STATUS_DELIVERED = 'delivered';
    const ORDER_STATUS_RETURNED = 'returned';
    const ORDER_STATUS_SHIPPED = 'shipped';
    const ORDER_STATUS_FAILED = 'failed';

}