<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Request\Product;

use Veda\Lazada\RequestAbstract;
use Sabre\Xml\Service;

class Create extends RequestAbstract
{
    protected $responseHandler = \Veda\Lazada\Response\Product\Create::class;

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


    private function buildProductData()
    {
        if (!$this->getProductData()) {
            throw new \InvalidArgumentException("Product data not set");
        }
        $data = [];

        foreach ($this->getProductData() as $key => $product) {
            $images = [];
            if (isset($product['images'])) {
                foreach ($product['images'] as $image) {
                    $images[]['Image'] = $image;
                }
            }


            $data[] = [
                'Sku' => [
                    /*
                     *   <SellerSku>api-create-test-1</SellerSku>
                <color_family>Green</color_family>
                <size>40</size>
                <quantity>1</quantity>
                <price>388.50</price>
                <package_length>11</package_length>
                <package_height>22</package_height>
                <package_weight>33</package_weight>
                <package_width>44</package_width>
                <package_content>this is what's in the box</package_content>
                <Images>
                    <Image>http://sg.s.alibaba.lzd.co/original/59046bec4d53e74f8ad38d19399205e6.jpg</Image>
                    <Image>http://sg.s.alibaba.lzd.co/original/179715d3de39a1918b19eec3279dd482.jpg</Image>
                </Images>
                     */
                    'SellerSku' => isset($product['sku']) ? $product['sku'] : null,
                    'price' => isset($product['price']) ? $product['price'] : null,
                    'quantity' => isset($product['quantity']) ? $product['quantity'] : null,
                    'special_price' => isset($product['specialPrice']) ? $product['specialPrice'] : null,
                    'package_height' => isset($product['packageHeight']) ? $product['packageHeight'] : null,
                    'package_length' => isset($product['packageLength']) ? $product['packageLength'] : null,
                    'package_width' => isset($product['packageWidth']) ? $product['packageWidth'] : null,
                    'package_weight' => isset($product['packageWeight']) ? $product['packageWeight'] : null,
                    'package_content' => isset($product['packageContent']) ? $product['packageContent'] : null,
                    'Images' => $images,
                ]
            ];
        }
        return $data;
    }

    private function buildAttributes()
    {
        $commonAttributes = [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'short_description' => $this->getShortDescription(),
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'warranty' => $this->getWarranty(),
            'warranty_type' => $this->getWarrantyType(),

        ];
        if ($this->getCategoryAttributes()) {
            $commonAttributes = array_merge($commonAttributes, $this->getCategoryAttributes());
        }
        return $commonAttributes;
    }

    public function getRequestBody()
    {
        $service = new Service();
        if (!$this->getCatalog()) {
            throw new \InvalidArgumentException("Primary category not set");
        }


        $xml = $service->write('Request', [
            'Product' => [
                'PrimaryCategory' => $this->getCatalog(),
                'SPUId' => $this->getSpu(),
                'AssociatedSku' => $this->getAssociatedSku(),
                'Attributes' => $this->buildAttributes(),
                'Skus' => $this->buildProductData()
                // SKUS
            ] //product
        ]);
        echo $xml;
        return $xml;
    }
}