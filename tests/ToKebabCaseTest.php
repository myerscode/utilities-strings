<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToKebabCaseTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheKebabCaseFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toKebabCase()->value());
    }
}
