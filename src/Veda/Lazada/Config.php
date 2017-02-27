<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/21
 */

namespace Veda\Lazada;

use Veda\Lazada\Utils\MutatorTrait;

class Config
{
    use MutatorTrait;

    public function __construct($configs = [])
    {
        $this->params = $configs;
    }


}