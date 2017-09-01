<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ReplaceNonNumericTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['   ', 'quick brown foo bar', '', false],
            ['  123', 'foo bar 123', '', false],
            ['    ', 'omg!!! it\'s a fox =D', '', false],
            ['', ':"{}~`', '', false],
            ['', '!@£$%^&*()', '', false],
            ['', '', '', false],
            ['..... ..... ... ...', 'quick brown foo bar', '.', false],
            ['... ... 123', 'foo bar 123', '.', false],
            ['...... .... . ... ..', 'omg!!! it\'s a fox =D', '.', false],
            ['...................', 'quick brown foo bar', '.', true],
            ['........123', 'foo bar 123', '.', true],
            ['....................', 'omg!!! it\'s a fox =D', '.', true],
            ['', 'quick brown foo bar', '', true],
            ['123', 'foo bar 123', '', true],
            ['', 'omg!!! it\'s a fox =D', '', true],
            ['', ':"{}~`', '', true],
            ['', '!@£$%^&*()', '', true],
            ['', '', '', true],
        ];
    }

    /**
     * Test string has none numeric values removed
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $turnTo Value to change to
     * @param boolean $strict Should strip spaces
     * @dataProvider dataProvider
     * @covers ::replaceNonNumeric
     */
    public function testStringIsStrippedOfNoneNumericValues($expected, $string, $turnTo, $strict)
    {
        $this->assertEquals($expected, $this->utility($string)->replaceNonNumeric($turnTo, $strict)->value());
    }
}
