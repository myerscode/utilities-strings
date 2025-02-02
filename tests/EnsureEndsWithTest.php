<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class EnsureEndsWithTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foobar', 'foo', 'bar'],
            ['foobar', 'foobar', 'bar'],
            ['fobarrrrbar', 'fobarrrr', 'bar'],
            ['foobbar', 'foobbar', 'bar'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsMadeToEndWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->ensureEndsWith($ensure));
    }
}
