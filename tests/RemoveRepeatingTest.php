<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemoveRepeatingTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['hello world. foo bar', 'hello          world. foo        bar', ' '],
            ['hello          world. foo        bar', 'hello          world. foo        bar', '.'],
            ['hello          world. foo        bar', 'hello          world..... foo        bar', '.'],
            ['foobar!', 'foobar!!!!!!!', '!'],
            ['foobar!!!!!!!', 'foobar!!!!!!!', ' '],
        ];
    }

    /**
     * Test that the string has repeating values removed
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $repeatingValue The value to stop repeating
     * @dataProvider dataProvider
     * @covers ::removeRepeating
     */
    public function testStringHasRepeatingValuesRemoved($expected, $string, $repeatingValue)
    {
        $this->assertEquals($expected, $this->utility($string)->removeRepeating($repeatingValue)->value());
    }
}
