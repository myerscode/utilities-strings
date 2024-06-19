<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class PadLeftTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar', 'foo bar', 0];
        yield ['foo bar', 'foo bar', 7];
        yield ['   foo bar', 'foo bar', 10];
        yield ['      foo bar', 'foo bar', 13];
        yield ['foo bar', 'foo bar', 0, '*.'];
        yield ['foo bar', 'foo bar', 7, '*.'];
        yield ['*.*foo bar', 'foo bar', 10, '*.'];
        yield ['*.*.*.foo bar', 'foo bar', 13, '*.'];
    }

    #[DataProvider('__validData')]
    public function testStringIsPaddedOnTheLeft(string $expected, string $string, int $length, string $padding = ' '): void
    {
        $this->assertSame($expected, $this->utility($string)->padLeft($length, $padding)->value());
    }
}
