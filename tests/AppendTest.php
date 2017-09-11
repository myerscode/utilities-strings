<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class AppendTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['bar', '', 'bar'],
            ['foobar', 'foo', 'bar'],
            ['foobarbar', 'foobar', 'bar'],
        ];
    }

    /**
     * Test a value is appended to the string
     *
     * @param number $expected
     * @param number $string
     * @param number $ensure
     * @dataProvider dataProvider
     * @covers ::append
     */
    public function testStringIsAppendedWithValue($expected, $string, $ensure)
    {
        $this->assertEquals($expected, $this->utility($string)->append($ensure));
    }
}
