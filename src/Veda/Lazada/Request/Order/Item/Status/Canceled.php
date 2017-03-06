<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Request\Order\Item\Status;

use Veda\Lazada\Request\RequestAbstract;

class Canceled extends RequestAbstract
{


    public function getAction()
    {
        // TODO: Implement getAction() method.
        return "SetStatusToCanceled";
    }
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
        return self::HTTP_METHOD_POST;
    }

    public function setOrderItem($itemId)
    {
        $this->setQueryParam('OrderItemId', $itemId);
    }

    public function setReason($reason, $reasonDetail = null)
    {
        $this->setQueryParam('Reason', $reason);
        if (null != $reasonDetail) {
            $this->setQueryParam('ReasonDetail', $reasonDetail);
        }
    }

}