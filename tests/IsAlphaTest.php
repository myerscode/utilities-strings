<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsAlphaTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [true, 'hello world'],
            [false, 'hello world!!'],
            [false, '123'],
            [false, 123],
        ];
    }

    /**
     * Test that the string contains only alpha characters
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isAlpha
     */
    public function testStringOnlyContainsAlphaCharacters($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isAlpha());
    }
}
