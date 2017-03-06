<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/21
 */

namespace Veda\Lazada;

use GuzzleHttp\Client as HttpClient;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Veda\Lazada\Exception\ResponseException;
use Veda\Lazada\Request\RequestAbstract;


class Client
{
    protected $request;

    public function __construct(RequestAbstract $request = null)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        if (null === $this->request) {
            throw new \InvalidArgumentException("Request not set");
        }
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
        try {
            // signature and build request
            $request = $this->getRequest()->validate()->signature()->build();
            $httpClient = new HttpClient();
            $response = $httpClient->request($request->getMethod(), $request->getUrl(), $request->getRequestOptions());
            $responseObject = ResponseFactory::create($request->getResponseHandle(), $response);
            $responseObject->process();
            return $responseObject;
        } catch (ConnectException $e) {
            throw new ResponseException($e->getMessage(), $e->getResponse(), $this->getRequest());
        }catch (RequestException $e) {
            throw new ResponseException($e->getMessage(), $e->getResponse(), $this->getRequest());
        }
    }
}
