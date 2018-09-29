<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class TrimRightTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['!!!!!fobar', '!!!!!fobar', '!'],
            ['fobar', 'fobar!!!!!', '!'],
            ['He', 'Hello World!', ['Wor', 'ld!', ' ']],
        ];
    }


    /**
     * Test that a string is trimmed of default values from the right
     *
     * @covers ::trimRight
     */
    public function testStringIsStrippedOfDefaultValues()
    {
        $this->assertEquals('forbar', $this->utility('forbar         ')->trimRight()->value());
    }

    /**
     * Test that a string is trimmed of given values from the right
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $charList The value to pass to the utility
     *
     * @dataProvider dataProvider
     * @covers ::trimRight
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList)
    {
        $this->assertEquals($expected, $this->utility($string)->trimRight($charList)->value());
    }
}
