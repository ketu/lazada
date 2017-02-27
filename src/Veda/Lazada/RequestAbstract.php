<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/21
 */

namespace Veda\Lazada;

use Veda\Lazada\Utils\MutatorTrait;

use Veda\Lazada\Response\JsonResponse;

abstract class RequestAbstract
{
    use MutatorTrait;

    protected $config;

    protected $fullApiUrl;

    protected $requestBody = [];

    protected $defaultRequestOptions = [];

    protected $responseHandler = JsonResponse::class;

    private $parameters = [
        'UserID' => null,
        'Version' => '1.0',
        'Action' => null,
        'Format' => 'JSON',
        'Timestamp' => null,
        //'Signature' => null,
    ];

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    abstract public function getMethod();

    abstract public function getAction();


    public function getUrl()
    {
        return $this->fullApiUrl;
    }

    public function getRequestBody()
    {
        return $this->requestBody;
    }


    public function getRequestOptions()
    {
        $requestOptions = $this->defaultRequestOptions;

        $requestBody = $this->getRequestBody();

        if ($requestBody) {
            $requestOptions = array_merge($requestOptions, ['body'=> $requestBody]);
        }
        return $requestOptions;
    }

    private function getBuildParams()
    {
        if ($this->getMethod() == 'GET' && $this->params) {
            return array_merge($this->params, $this->parameters);
        }
        return $this->parameters;
    }
    public function signature()
    {
        $datetime = new \DateTime();
        $this->parameters['Timestamp'] = $datetime->format(\DateTime::ISO8601);
        $this->parameters['UserID'] = $this->getConfig()->getUserId();

        $actionMethod = $this->getAction();

        if (!$actionMethod) {
            throw new \InvalidArgumentException('action not set');
        }

        $this->parameters['Action'] = $actionMethod;

        $finalParameters = $this->getBuildParams();

        ksort($finalParameters);

        $encodedParameters = array();

        foreach ($finalParameters as $key => $value) {
            $encodedParameters[] = rawurlencode($key) . '=' . rawurlencode($value);
        }

        $encodedString = implode('&', $encodedParameters);

        $this->parameters['Signature'] = rawurlencode(hash_hmac('sha256', $encodedString, $this->getConfig()->getApiKey(), false));

        return $this;
    }
    public function build()
    {
        $apiUrl = $this->getConfig()->getApiUrl();
        $query = http_build_query($this->getBuildParams(), '', '&', PHP_QUERY_RFC3986);
        $this->fullApiUrl = $apiUrl . '?' . $query;

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return mixed response handler instance of ResponseAbstract
     */
    public function getResponseHandle()
    {
        return $this->responseHandler;
    }

    /**
     * @param $cls
     */
    public function withResponseHandle($cls)
    {
        $this->responseHandler = $cls;
        return $this;
    }

    public function withFormat($format) {
        $this->parameters['Format'] = $format;
        return $this;
    }

}