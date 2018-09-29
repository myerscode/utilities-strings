<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class TrimTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foobar', '!!!!!foobar!!!!!', '!'],
            ['foobar', '!!!!!foobar', '!'],
            ['foobar', 'foobar!!!!!', '!'],
        ];
    }


    /**
     * Test that a string is trimmed of default values
     *
     * @covers ::trim
     */
    public function testStringIsStrippedOfDefaultValues()
    {
        $this->assertEquals('foobar', $this->utility('        foobar         ')->trim()->value());
    }

    /**
     * Test that a string is trimmed of given values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $charList The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::trim
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList)
    {
        $this->assertEquals($expected, $this->utility($string)->trim($charList)->value());
    }
}
