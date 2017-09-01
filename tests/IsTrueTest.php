<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsTrueTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            [true, 'true'],
            [true, '1'],
            [true, 'on'],
            [true, 'yes'],
            [true, 'ok'],
            [false, 'tr'],
            [false, 'tick'],
            [false, 'foobar'],
            [false, ''],
        ];
    }

    /**
     * Test to see if the string represents a true value
     *
     * @param number $expected
     * @param number $string
     * @dataProvider dataProvider
     * @covers ::isTrue
     */
    public function testIsTrueReturnsTrue($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isTrue());
    }
}
