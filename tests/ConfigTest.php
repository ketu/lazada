<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */


namespace Veda\Lazada\Tests;

use PHPUnit\Framework\TestCase;
use Veda\Lazada\Config;

class ConfigTest extends TestCase
{
    public function testSetAndGetTrue()
    {
        $config = new Config();
        $config->setApiKey("apiKey");
        $this->assertEquals("apiKey", $config->getApiKey());

    }

    public function testSetAndGetFalse()
    {
        $config = new Config();
        $config->setApiKey("apiKey");
        $this->assertNotEquals("api0Key", $config->getApiKey());

    }
}