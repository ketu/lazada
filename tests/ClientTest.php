<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Tests;

use PHPUnit\Framework\TestCase;
use Veda\Lazada\Client;

class ClientTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testNoRequest()
    {
        $client = new Client();
        $client->send();
       // $this->expectException(\InvalidArgumentException::class);
    }

    /**
     * @expectedException TypeError
     */
    public function testTypeErrorRequest()
    {
        $client = new Client();
        $client->send('XXXX');
    }
}