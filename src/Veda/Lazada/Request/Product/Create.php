<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\RequestAbstract;
use Sabre\Xml\Service;
use Veda\Lazada\Utils\ArrayToXml;

class Create extends RequestAbstract
{
    //protected $responseHandler = \Veda\Lazada\Response\Product\Create::class;

    protected $attributes;
    protected $variation;
    protected $spuId;
    protected $categoryId;
    protected $associatedSku;


    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return 'POST';
    }

    public function getAction()
    {
        // TODO: Implement getAction() method.
        return 'CreateProduct';
    }

    public function setCategory($primaryCategory)
    {
        $this->categoryId = $primaryCategory;
    }

    public function setSpu($spuId)
    {
        $this->spuId = $spuId;
    }

    public function setAttributes($attribute)
    {
        $this->attributes = $attribute;
    }

    public function setName($productName)
    {
        $this->addAttribute('name', $productName);
    }

    public function addAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function setDescription($description)
    {
        $this->addAttribute('description', $description);
    }

    public function setBrand($brand)
    {
        $this->addAttribute('brand', $brand);
    }

    public function setShortDescription($shortDescription)
    {
        $this->addAttribute('short_description', $shortDescription);
    }

    public function setAssociatedSku(array $associatedSku)
    {
        $this->associatedSku = $associatedSku;
    }


    public function setVariation(array $variation)
    {
        $formatVariation = [];
        foreach($variation as $key=> $value) {
            $formatVariation[]['Sku'] = $value;
        }
        $this->variation = $formatVariation;
    }

    protected function getRequestBody()
    {
        $data = [
            'Product' => [
                'PrimaryCategory' => $this->categoryId,
                'SPUId' => $this->spuId,
                'AssociatedSku' => $this->associatedSku,
                'Attributes' => $this->attributes,
                'Skus' => $this->variation,
            ]
        ];
        $xml = ArrayToXml::convert($data, 'Request');
        $this->requestBody = $xml;

        return $this->requestBody;
    }
}