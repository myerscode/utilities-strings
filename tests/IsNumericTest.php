<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsNumericTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [false, ''],
            [false, 'hello world'],
            [false, 'hello world 123'],
            [false, '1 2 3'],
            [true, '123'],
        ];
    }

    /**
     * Test that a string contains only numeric characters, including no spaces or separators
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isNumeric
     */
    public function testStringOnlyNumericCharacters($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isNumeric());
    }
}
