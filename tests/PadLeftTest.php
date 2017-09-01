<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class PadLeftTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 7],
            ['   foo bar', 'foo bar', 10],
            ['      foo bar', 'foo bar', 13],
            ['foo bar', 'foo bar', 0, '*.'],
            ['foo bar', 'foo bar', 7, '*.'],
            ['*.*foo bar', 'foo bar', 10, '*.'],
            ['*.*.*.foo bar', 'foo bar', 13, '*.'],
        ];
    }

    /**
     * Test that the string is padded on the left until it is the given length
     *
     * @param string $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     * @param int $length The value to ensure value begins with
     * @param string $padding The value to ensure value begins with
     * @dataProvider dataProvider
     * @covers ::padLeft
     */
    public function testStringIsPaddedOnTheLeft($expected, $string, $length, $padding = ' ')
    {
        $this->assertEquals($expected, $this->utility($string)->padLeft($length, $padding)->value());
    }
}