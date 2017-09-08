<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class SubstringTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo', 'foo bar', 0, 3],
            ['bar', 'foo bar', 4],
            ['foo', 'foo bar', 0, -4],
            ['bar', 'foo bar', 4, null],
            ['o b', 'foo bar', 2, 3],
            ['', 'foo bar', 4, 0],
        ];
    }

    /**
     * Test that a substring of the value is created
     *
     * @param $expected
     * @param $string
     * @param $start
     * @param null $length
     *
     * @dataProvider dataProvider
     * @covers ::substring
     */
    public function testSubstringOfValueIsReturned($expected, $string, $start, $length = null)
    {
        $this->assertEquals($expected, $this->utility($string)->substring($start, $length)->value());
    }
}
