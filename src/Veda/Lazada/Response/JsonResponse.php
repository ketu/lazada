<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Response;

use GuzzleHttp\Psr7\Response;
use Veda\Lazada\Response\ResponseAbstract;

class JsonResponse extends ResponseAbstract
{

    public function __construct(Response $response)
    {
        parent::__construct($response);
        $this->process();
    }

    public function process()
    {
        // TODO: Implement processResponse() method.
        $responseData = \json_decode($this->getResponse()->getBody()->__toString(), true);

        if (isset($responseData[parent::ERROR_ELEMENT_IN_RESPONSE])) {
            $this->setSuccess(false);
            $data = $responseData[parent::ERROR_ELEMENT_IN_RESPONSE];
        } else {
            $data = $responseData[parent::SUCCESS_ELEMENT_IN_RESPONSE];
        }
        if (isset($data[parent::HEAD_ELEMENT_IN_RESPONSE])) {
            $this->headData = $data[parent::HEAD_ELEMENT_IN_RESPONSE];
        }
        if (isset($data[parent::BODY_ELEMENT_IN_RESPONSE])) {
            $this->bodyData = $data[parent::BODY_ELEMENT_IN_RESPONSE];
        }
    }
}
