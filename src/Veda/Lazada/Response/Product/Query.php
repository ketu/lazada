<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Response\Product;

use GuzzleHttp\Psr7\Response;
use Veda\Lazada\Response\JsonResponse;

class Query extends JsonResponse
{
    public function process()
    {
        parent::process();
        if (isset($this->bodyData['Products'])) {
            $this->bodyData = $this->bodyData['Products'];
        }

    }
}