<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/3/6
 */

namespace Veda\Lazada\Tests\Utils;

use PHPUnit\Framework\TestCase;
use Veda\Utils\Converter\ArrayToXml;

class ArrayToXmlTest extends TestCase
{
    public function testConvert()
    {
        $data = [
            'user'=> 'xx',
            'password'=> 'xxx',
            'attributes'=> [
                'gender'=> 'kl',
                'age'=> '12',
                'school'=> [
                    'name'=> 'name',
                    'value'=> 'XXX School',
                    'attributes'=> [
                        'address'=> 'CA',
                        'area'=> 100
                    ]
                ],
                'contacts'=>
                [
                    'father'=> '1234',
                    'monther'=> '45678'
                ]
            ]
        ];

        $xml = ArrayToXml::convert($data);

        $xmlHardCode = "<?xml version=\"1.0\"?>\n<root><user>xx</user><password>xxx</password><attributes><gender>kl</gender><age>12</age><school><name address=\"CA\" area=\"100\">XXX School</name></school><contacts><father>1234</father><monther>45678</monther></contacts></attributes></root>\n";

        $this->assertEquals($xmlHardCode, $xml);

    }
}