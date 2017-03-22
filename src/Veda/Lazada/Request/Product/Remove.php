<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/6
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\Exception\InvalidArgumentException;
use Veda\Lazada\Request\RequestAbstract;
use Veda\Utils\Converter\ArrayToXml;

class Remove extends RequestAbstract
{
    protected $skuArray = [];

    public function getAction()
    {
        return 'RemoveProduct';
        // TODO: Implement getAction() method.
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function addSku($sku)
    {
        if (is_scalar($sku)) {
            $this->skuArray[] = $sku;
        } elseif (is_array($sku)) {
            $this->skuArray = array_merge($this->skuArray, $sku);
        } else {
            throw new InvalidArgumentException("Can not add sku to request in the request %s", __CLASS__);
        }
    }

    protected function getRequestBody()
    {
        if (!$this->skuArray) {
            throw new InvalidArgumentException("Remove product action contain no sku in the request %s", __CLASS__);
        }
        $skuData = [];
        foreach($this->skuArray as $sku) {
            $skuData[]['Sku'] = [
                'name'=> 'SellerSku',
                'value'=> $sku,
            ];
        }
        $data = [
            'Product'=> [
                'Skus'=> $skuData
            ]
        ];
        $this->requestBody = ArrayToXml::convert($data, 'Request');

        return parent::getRequestBody(); // TODO: Change the autogenerated stub
    }

}