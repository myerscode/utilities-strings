<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class EnsureEndsWithTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foobar', 'foo', 'bar'],
            ['foobar', 'foobar', 'bar'],
            ['fobarrrrbar', 'fobarrrr', 'bar'],
            ['foobbar', 'foobbar', 'bar'],
        ];
    }

    /**
     * Test that the string is made to end with a given value
     *
     * @param number $expected
     * @param number $string
     * @param number $ensure
     * @dataProvider dataProvider
     * @covers ::ensureEndsWith
     */
    public function testStringIsMadeToEndWithValue($expected, $string, $ensure)
    {
        $this->assertEquals($expected, $this->utility($string)->ensureEndsWith($ensure));
    }
}
