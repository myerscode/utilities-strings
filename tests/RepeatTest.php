<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RepeatTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', 'foo bar', 0],
            ['foo bar', 'foo bar', 1],
            ['foo barfoo bar', 'foo bar', 2],
        ];
    }

    /**
     * Test the string is repeated amount of times multiplier specifies
     *
     * @param $expected
     * @param $string
     * @param $multiplier
     *
     * @dataProvider dataProvider
     * @covers ::repeat
     */
    public function testStringIsRepeated($expected, $string, $multiplier)
    {
        $this->assertEquals($expected, $this->utility($string)->repeat($multiplier)->value());
    }
}
