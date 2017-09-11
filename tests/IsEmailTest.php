<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsEmailTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [true, 'hello@world.com'],
            [true, 'test@hello.world.com'],
            [false, 'not@valid'],
        ];
    }

    /**
     * Test to see if the string is in a valid email format
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isEmail
     */
    public function testStringIsInAValidEmailFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isEmail());
    }
}
