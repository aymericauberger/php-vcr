<?php

namespace VCR\Util;

/**
 * Tests TextUtil methods.
 */
class TextUtilTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider curlMethodsProvider
     */
    public function testUnderscoreToLowerCamelcase($expected, $method)
    {
        $this->assertEquals($expected, TextUtil::underscoreToLowerCamelcase($method));
    }

    public function curlMethodsProvider()
    {
        return [
            'curl_multi_add_handler' => ['curlMultiAddHandler', 'curl_multi_add_handler'],
            'curl_add_handler' => ['curlAddHandler', 'curl_add_handler'],
            'not a curl function' => ['curlExec', 'curl_exec'],
        ];
    }
}
