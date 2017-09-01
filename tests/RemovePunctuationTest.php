<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemovePunctuationTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['hello          world foo        bar', 'hello          world. foo        bar'],
            ['hello world foo bar', 'hello world. foo bar'],
            ['foo bar 123', 'foo. bar. 123.'],
            ['Hello Its a great day today', 'Hello. It\'s a great day today.'],
            ['omg its a fox D', 'omg!!! it\'s a fox =D'],
            ['', ':"{}~`'],
            ['£', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Test that the string value has punctuation removed
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::removePunctuation
     */
    public function testStringHasPunctuationRemoved($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->removePunctuation()->value());
    }

}
