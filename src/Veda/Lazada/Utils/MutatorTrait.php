<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/2/23
 * Time: 16:54
 */

namespace Veda\Lazada\Utils;


trait MutatorTrait
{
    protected $params = [];

    public function __call($name, $args)
    {
        $key = lcfirst(substr($name, 3));
        if ('get' === substr($name, 0, 3)) {
            return isset($this->params[$key])
                ? $this->params[$key]
                : null;
        } elseif ('set' === substr($name, 0, 3)) {
            $value = 1 == count($args) ? $args[0] : null;
            $this->params[$key] = $value;
        }
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }
}