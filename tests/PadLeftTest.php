<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class PadLeftTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 7],
            ['   foo bar', 'foo bar', 10],
            ['      foo bar', 'foo bar', 13],
            ['foo bar', 'foo bar', 0, '*.'],
            ['foo bar', 'foo bar', 7, '*.'],
            ['*.*foo bar', 'foo bar', 10, '*.'],
            ['*.*.*.foo bar', 'foo bar', 13, '*.'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsPaddedOnTheLeft(string $expected, string $string, int $length, string $padding = ' '): void
    {
        $this->assertEquals($expected, $this->utility($string)->padLeft($length, $padding)->value());
    }
}
