<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Response;

use GuzzleHttp\Psr7\Response;

abstract class ResponseAbstract implements ResponseInterface
{
    const ERROR_ELEMENT_IN_RESPONSE = 'ErrorResponse';
    const SUCCESS_ELEMENT_IN_RESPONSE = 'SuccessResponse';
    const HEAD_ELEMENT_IN_RESPONSE = 'Head';
    const BODY_ELEMENT_IN_RESPONSE = 'Body';
    const ERROR_MESSAGE_ELEMENT_IN_RESPONSE = 'ErrorMessage';

    /**
     * @var bool
     * @desc if is successful response
     */
    protected $success = true;

    /**
     * @var Response
     * @desc guzzle response object
     */
    protected $response;
    /**
     * @var
     */
    protected $headData;

    /**
     * @var
     */
    protected $bodyData;


    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return bool
     */
    public function success()
    {
        return $this->success;
    }

    /**
     * @param $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    public function getHeadData($key = null)
    {
        if ($key && isset($this->headData[$key])) {
            return $this->headData[$key];
        }
        return $this->headData;
    }

    public function getBodyData()
    {
        return $this->bodyData;
    }

    /**
     * @return null
     * @desc return error message
     */
    public function getMessage()
    {
        // TODO: Implement getErrorMessage() method.
        if (!$this->success()) {
            return $this->getHeadData(self::ERROR_MESSAGE_ELEMENT_IN_RESPONSE);
        }
        return null;
    }

}