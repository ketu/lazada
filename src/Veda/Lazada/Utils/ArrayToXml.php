<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/2/28
 * Time: 13:41
 */

namespace Veda\Lazada\Utils;

use DOMElement;
use DOMDocument;
use DOMException;

final class ArrayToXml
{
    public function __construct(array $arrayData, $rootElementName = null)
    {
        $this->document = new DOMDocument();
        $this->document->appendChild($this->document->createElement($rootElementName == null ? 'root' : $rootElementName));
    }

    private function getRootElement()
    {
        return $this->document->documentElement;
    }

    public static function convert($arrayData, $rootElementName = null)
    {
        $writer = new static($arrayData, $rootElementName);
        $writer->convertElement($writer->getRootElement(), $arrayData);
        return $writer->toXml();
    }

    private function toXml()
    {
        return $this->document->saveXML();
    }

    private function convertElement(DOMElement $element, $value)
    {
        if (is_scalar($value)) {
            $element->nodeValue = htmlspecialchars($value);

        } elseif (is_array($value) && array_key_exists('name', $value) && array_key_exists('value', $value)) {

            $childElement = $this->createElement($value['name'], $value['value']);
            $element->appendChild($childElement);
            $attributes = isset($value['attributes']) ? $value['attributes'] : [];
            foreach ($attributes as $k => $v) {
                $childElement->setAttribute($k, $v);
            }

        } elseif (is_array($value)) {
            foreach ($value as $name => $item) {
                if (is_int($name)) {
                    $this->convertElement($element, $item);
                } elseif (is_string(($name))) {
                    $childElement = $this->createElement($name);
                    $element->appendChild($childElement);
                    $this->convertElement($childElement, $item);
                } else {
                    throw new \InvalidArgumentException('The writer does not know how to serialize arrays with keys of type: ' . gettype($name));
                }
            }
        }
    }


    private function createElement($name, $value = null)
    {
        return $this->document->createElement($name, $value);
    }
}