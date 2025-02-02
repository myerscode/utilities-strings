<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class PadTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 7],
            [' foo bar  ', 'foo bar', 10],
            ['   foo bar   ', 'foo bar', 13],
            ['foo bar', 'foo bar', 0, '_-'],
            ['foo bar', 'foo bar', 7, '_-'],
            ['_foo bar_-', 'foo bar', 10, '_-'],
            ['_-_foo bar_-_', 'foo bar', 13, '_-'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsPaddedOnBothSides(string $expected, string $string, int $length, string $padding = ' '): void
    {
        $this->assertEquals($expected, $this->utility($string)->pad($length, $padding)->value());
    }
}
