<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/22
 */

namespace Veda\Lazada\Response;

use Veda\Lazada\Response\ResponseAbstract;
use Sabre\Xml\Service;
use GuzzleHttp\Psr7\Response;

class XmlResponse extends ResponseAbstract
{
    private $defaultXmlNamespace = '{}';

    public function __construct(Response $response)
    {
        parent::__construct($response);
        $this->process();
    }
    public function process()
    {
        // TODO: Implement processResponse() method.
        $rootElementName = null;

        $service = new Service();

        $xmlNodes = $service->parse($this->getBody()->__toString(), null, $rootElementName);

        if ($rootElementName == $this->defaultXmlNamespace.parent::ERROR_ELEMENT_IN_RESPONSE) {
            $this->setSuccess(false);
        }

        foreach($xmlNodes as $key=> $value) {
            if ($value['name'] == $this->defaultXmlNamespace.parent::HEAD_ELEMENT_IN_RESPONSE) {
                $this->headData = $this->extract($value['value']);
            }
            if ($value['name'] == $this->defaultXmlNamespace.parent::BODY_ELEMENT_IN_RESPONSE) {
                $this->bodyData = $this->extract($value['value']);
            }
        }
        return $this;
    }

    private function extract($data)
    {
        $result = [];
        foreach($data as $key=> $value) {

            $value['name'] = str_replace($this->defaultXmlNamespace, '', $value['name']);

            if (is_array($value['value'])){
               $result[$value['name']] = $this->extract($value['value']);
            } else {
                $value['value'] = str_replace($this->defaultXmlNamespace, '', $value['value']);
                $result[$value['name']] = $value['value'];
            }
        }
        return $result;
    }

}