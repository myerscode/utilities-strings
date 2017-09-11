<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ReverseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['raboof', 'foobar'],
            ['rab oof', 'foo bar'],
        ];
    }

    /**
     * Test that the string is reversed
     *
     * @param $expected
     * @param $string
     * @dataProvider dataProvider
     * @covers ::reverse
     */
    public function testStringIsRevered($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->reverse()->value());
    }
}
