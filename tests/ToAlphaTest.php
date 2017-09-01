<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToAlphaTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quickbrownfoobar', 'quick brown foo bar'],
            ['foobar', 'foobar123'],
            ['', '1234567890'],
            ['omgitsafoxD', 'omg!!! it\'s a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Check that a string is transformed to a lowercase slug with only alphanumeric values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toAlpha
     */
    public function testStringIsStrippedOfNoneAlphanumericValues($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toAlpha()->value());
    }
}
