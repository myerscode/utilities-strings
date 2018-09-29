<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class PrependTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo', '', 'foo'],
            ['foobar', 'bar', 'foo'],
            ['foofoobar', 'foobar', 'foo'],
        ];
    }

    /**
     * Test a value is prepend to the string
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @param number $ensure The value to ensure value begins with
     * @dataProvider dataProvider
     * @covers ::prepend
     */
    public function testStringIsPrependedWithValue($expected, $string, $ensure)
    {
        $this->assertEquals($expected, $this->utility($string)->prepend($ensure));
    }
}
