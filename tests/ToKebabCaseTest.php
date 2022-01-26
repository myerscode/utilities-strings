<?php

namespace Tests;

class ToKebabCaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['quick-brown-foo-bar', 'quick brown foo bar'],
            ['hello-world', 'HELLO WORLD'],
            ['foo-bar-123', 'foo bar 123'],
            ['omg-its-a-fox-d', 'omg!!! its a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToTheKebabCaseFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toKebabCase()->value());
    }
}
