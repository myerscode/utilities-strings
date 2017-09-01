<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class SliceTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo bar', 'foo bar', 0, null],
            ['foo bar', 'foo bar', 0, 7],
            ['foo', 'foo bar', 0, 3],
            ['', 'foo bar', 3, 0],
            ['', 'foo bar', 3, 2],
            ['bar', 'foo bar', 4, 7],
            ['foo ba', 'foo bar', 0, -1],
            ['ba', 'foo bar', 4, -1],
        ];
    }

    /**
     * Test that a slice of the value is created
     *
     * @param $expected
     * @param $string
     * @param $start
     * @param null $length
     *
     * @dataProvider dataProvider
     * @covers ::slice
     */
    public function testSliceOfValueIsReturned($expected, $string, $start, $length)
    {
        $this->assertEquals($expected, $this->utility($string)->slice($start, $length)->value());
    }
}
