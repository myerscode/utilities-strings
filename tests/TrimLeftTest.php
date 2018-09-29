<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class TrimLeftTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['fobar', '!!!!!fobar', '!'],
            ['fobar!!!!!', 'fobar!!!!!', '!'],
            ['o World!', 'Hello World!', ['H', 'el']],
        ];
    }


    /**
     * Test that a string is trimmed of default values from the left
     *
     * @covers ::trimLeft
     */
    public function testStringIsStrippedOfDefaultValues()
    {
        $this->assertEquals('forbar', $this->utility('          forbar')->trimLeft()->value());
    }

    /**
     * Test that a string is trimmed of given values from the left
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $charList The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::trimLeft
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList)
    {
        $this->assertEquals($expected, $this->utility($string)->trimLeft($charList)->value());
    }
}
