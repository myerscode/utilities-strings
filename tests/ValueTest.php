<?php

namespace Tests;

use Tests\Support\BaseStringSuite;
use Tests\Support\StringConstructorTestCase;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ValueTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['hello world', 'hello world'],
            ['123', 123],
            ['1', true],
            ['0', false],
            ['', null],
            ['StringConstructorTestCase::class', new StringConstructorTestCase()],
        ];
    }

    /**
     * Check the value is converted to a string correctly
     *
     * @param string $expected
     * @param string $string
     * @dataProvider dataProvider
     * @covers ::__toString
     */
    public function testToString($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->__toString());
    }

    /**
     * Check the value is converted back to an string correctly
     *
     * @param string $expected
     * @param string $string
     * @dataProvider dataProvider
     * @covers ::value
     */
    public function testGetValue($expected, $string)
    {
        $this->assertEquals($expected, (string)$this->utility($string)->value());
    }
}
