<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToKebabCaseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quick-brown-foo-bar', 'quick brown foo bar'],
            ['hello-world', 'HELLO WORLD'],
            ['foo-bar-123', 'foo bar 123'],
            ['omg-its-a-fox-d', 'omg!!! its a fox =D'],
            ['', ':"{}~`'],
            ['lb', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Test that a string is transformed to the kebab-case format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toKebabCase
     */
    public function testStringIsTransformedToTheKebabCaseFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toKebabCase()->value());
    }
}
