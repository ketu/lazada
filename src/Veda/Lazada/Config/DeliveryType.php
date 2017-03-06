<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */
namespace Veda\Lazada\Config;

class DeliveryType extends ConfigAbstract
{
    const DELIVERY_TYPE_DROPSHIP = 'dropship';
    const DELIVERY_TYPE_PICKUP = 'pickup';
    const DELIVERY_TYPE_SEND_TO_WAREHOUSE = 'send_to_warehouse';
}