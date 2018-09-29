<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class EnsureBeginsWithTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foobar', 'bar', 'foo'],
            ['foobar', 'foobar', 'foo'],
            ['foofobar', 'fobar', 'foo'],
            ['foooobar', 'foooobar', 'foo'],
        ];
    }

    /**
     * Test that the string is made to begin with a given value
     *
     * @param number $expected
     * @param number $string
     * @param number $ensure
     * @dataProvider dataProvider
     * @covers ::ensureBeginsWith
     */
    public function testStringIsMadeToBeginWithValue($expected, $string, $ensure)
    {
        $this->assertEquals($expected, $this->utility($string)->ensureBeginsWith($ensure));
    }
}
