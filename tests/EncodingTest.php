<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class EncodingTest extends BaseStringSuite
{

    public function encodingProvider()
    {
        return [
            ['UTF-8'],
            [mb_internal_encoding()],
        ];
    }

    /**
     * Check that the strings encoding is set correctly
     *
     * @param string $encoding
     * @dataProvider encodingProvider
     * @covers ::encoding
     */
    public function testStringsEncodingIsSetViaConstructor($encoding)
    {
        $this->assertEquals($encoding, $this->utility('hello world', $encoding)->encoding());
    }

    /**
     * Check that the strings encoding is set correctly
     *
     * @param string $encoding
     * @dataProvider encodingProvider
     * @covers ::setEncoding
     */
    public function testStringsEncodingIsSetViaMethod($encoding)
    {
        $this->assertEquals($encoding, $this->utility('hello world')->setEncoding($encoding)->encoding());
    }
}
