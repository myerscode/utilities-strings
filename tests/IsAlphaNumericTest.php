<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsAlphaNumericTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [true, ''],
            [true, 'hello world'],
            [true, 'hello world 123'],
            [true, '123'],
            [false, 'hello world!'],
            [false, '!!!'],
        ];
    }

    /**
     * Test that a string contains only alphanumeric characters
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isAlphaNumeric
     */
    public function testStringOnlyContainsAlphaNumericCharacters($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isAlphaNumeric());
    }
}
