<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsFalseTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [true, 'false'],
            [true, '0'],
            [true, 'off'],
            [true, 'no'],
            [true, ''],
            [false, 'cross'],
            [false, 'foobar'],
        ];
    }

    /**
     * Test to see if the string represents a false value
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isFalse
     */
    public function testDoesTheStringRepresentFalse($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isFalse());
    }
}
