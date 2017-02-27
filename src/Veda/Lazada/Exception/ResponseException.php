<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Exception;

use Psr\Http\Message\ResponseInterface;
use Veda\Lazada\RequestAbstract;

class ResponseException extends \Exception
{
    private $response;
    private $request;

    public function __construct($errorMessage = null, ResponseInterface $response = null, RequestAbstract $request, \Exception $previous = null)
    {
        $code = 0;

        if (null !== $response) {
            $code = $response->getStatusCode();
            $body = \json_decode($response->getBody(), true);
            if (!$errorMessage) {
                $errorMessage = isset($body['ErrorResponse']['Head']['ErrorMessage'])?isset($body['ErrorResponse']['Head']['ErrorMessage']):null;
            }
        }
        parent::__construct($errorMessage, $code, $previous);
        $this->response = $response;
        $this->request = $request;
    }

    /**
     * Get the associated response
     *
     * @return ResponseInterface|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponseBody()
    {
        return $this->getResponse()->getBody();
    }


}