<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToKebabCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['quick-brown-foo-bar', 'quick brown foo bar'];
        yield ['hello-world', 'HELLO WORLD'];
        yield ['foo-bar-123', 'foo bar 123'];
        yield ['omg-its-a-fox-d', 'omg!!! its a fox =D'];
        yield ['', ':"{}~`'];
        yield ['', '!@£$%^&*()'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheKebabCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toKebabCase()->value());
    }
}
