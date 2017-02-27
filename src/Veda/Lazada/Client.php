<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/21
 */

namespace Veda\Lazada;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Veda\Lazada\Exception\ResponseException;
use Veda\Lazada\Response\XmlResponse;
use Veda\Lazada\Response\JsonResponse;

class Client
{

    protected $request;


    public function __construct(RequestAbstract $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest(RequestAbstract $request)
    {
        $this->request = $request;
    }

    /**
     * @param RequestAbstract $request
     */
    public function send(RequestAbstract $request = null)
    {
        if (null !== $request) {
            $this->setRequest($request);
        }

        if (!$this->getRequest()) {
            throw new \InvalidArgumentException("Request not set");
        }

        try {
            // signature and build request
            $request = $this->getRequest()->signature()->build();

            $httpClient = new HttpClient();
            $response = $httpClient->request($request->getMethod(), $request->getUrl(), $request->getRequestOptions());
            $responseObject = ResponseFactory::create($request->getResponseHandle(), $response);
            return $responseObject;

        } catch (ConnectException $e) {
            throw new ResponseException($e->getMessage(), $e->getResponse(), $this->getRequest());
        }catch (RequestException $e) {
            throw new ResponseException($e->getMessage(), $e->getResponse(), $this->getRequest());
        }
    }
}
