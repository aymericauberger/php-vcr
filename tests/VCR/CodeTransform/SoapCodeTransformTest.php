<?php

namespace VCR\CodeTransform;

use lapistano\ProxyObject\ProxyBuilder;

class SoapCodeTransformTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider codeSnippetProvider
     */
    public function testTransformCode($expected, $code)
    {
        $proxy = new ProxyBuilder('\VCR\CodeTransform\SoapCodeTransform');
        $filter = $proxy
            ->setMethods(['transformCode'])
            ->getProxy();

        $this->assertEquals($expected, $filter->transformCode($code));
    }

    public function codeSnippetProvider()
    {
        return [
            ['new \VCR\Util\SoapClient(', 'new \SoapClient('],
            ['new \VCR\Util\SoapClient(', 'new SoapClient('],
            ['extends \VCR\Util\SoapClient', 'extends \SoapClient'],
            ["extends \\VCR\\Util\\SoapClient\n", "extends \\SoapClient\n"],
            ['new SoapClientExtended(', 'new SoapClientExtended('],
            ['new \SoapClientExtended(', 'new \SoapClientExtended('],
        ];
    }
}
