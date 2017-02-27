<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/21
 */

namespace Veda\Lazada;

class Config
{
    protected $configs;

    public function __construct($configs = [])
    {
        $this->configs = $configs;
    }
    public function __call($name, $args)
    {
        $key = lcfirst(substr($name, 3));
        if ('get' === substr($name, 0, 3)) {
            return isset($this->configs[$key])
                ? $this->configs[$key]
                : null;
        } elseif ('set' === substr($name, 0, 3)) {
            $value = 1 == count($args) ? $args[0] : null;
            $this->configs[$key] = $value;
        }
    }
}
