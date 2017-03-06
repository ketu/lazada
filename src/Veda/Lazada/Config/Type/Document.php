<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Config\Type;

use Veda\Lazada\Config\ConfigAbstract;

class Document extends ConfigAbstract
{
    const ORDER_DOCUMENT_TYPE_INVOICE = 'invoice';
    const ORDER_DOCUMENT_TYPE_SHIPPING_LABEL = 'shippingLabel';
    const ORDER_DOCUMENT_TYPE_SHIPPING_PARCEL = 'shippingParcel';
    const ORDER_DOCUMENT_TYPE_CARRIER_MANIFEST = 'carrierManifest';
    const ORDER_DOCUMENT_TYPE_SERIAL_NUMBER = 'serialNumber';
}