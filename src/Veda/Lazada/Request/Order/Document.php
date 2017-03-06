<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order;

use Veda\Lazada\Request\RequestAbstract;

class Document extends RequestAbstract
{
    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "GetDocument";
    }

    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function setOrderItem(array $itemId)
    {
        $this->setQueryParam('OrderItemIds', $itemId);
    }

    public function setDocumentType($type)
    {
        $this->setQueryParam('DocumentType', $type);
    }
}