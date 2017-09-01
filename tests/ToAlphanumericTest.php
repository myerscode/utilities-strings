<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToAlphanumericTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quickbrownfoobar', 'quick brown foo bar'],
            ['foobar123', 'foo bar 123'],
            ['1234567890', '1234567890'],
            ['omgitsafoxD', 'omg!!! it\'s a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Test that the string is transformed to only contain alphanumeric values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toAlphanumeric
     */
    public function testStringIsTransformedToContainOnlyAlphanumericValues($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toAlphanumeric()->value());
    }
}
