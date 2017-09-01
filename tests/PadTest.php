<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class PadTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 7],
            [' foo bar  ', 'foo bar', 10],
            ['   foo bar   ', 'foo bar', 13],
            ['foo bar', 'foo bar', 0, '_-'],
            ['foo bar', 'foo bar', 7, '_-'],
            ['_foo bar_-', 'foo bar', 10, '_-'],
            ['_-_foo bar_-_', 'foo bar', 13, '_-'],
        ];
    }

    /**
     * Test that the string is padded on both sides until it is the given length
     *
     * @param string $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     * @param int $length The value to ensure value begins with
     * @param string $padding The value to ensure value begins with
     * @dataProvider dataProvider
     * @covers ::pad
     */
    public function testStringIsPaddedOnBothSides($expected, $string, $length, $padding = ' ')
    {
        $this->assertEquals($expected, $this->utility($string)->pad($length, $padding)->value());
    }
}