<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class PadTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar', 'foo bar', 0];
        yield ['foo bar', 'foo bar', 7];
        yield [' foo bar  ', 'foo bar', 10];
        yield ['   foo bar   ', 'foo bar', 13];
        yield ['foo bar', 'foo bar', 0, '_-'];
        yield ['foo bar', 'foo bar', 7, '_-'];
        yield ['_foo bar_-', 'foo bar', 10, '_-'];
        yield ['_-_foo bar_-_', 'foo bar', 13, '_-'];
    }

    #[DataProvider('__validData')]
    public function testStringIsPaddedOnBothSides(string $expected, string $string, int $length, string $padding = ' '): void
    {
        $this->assertSame($expected, $this->utility($string)->pad($length, $padding)->value());
    }
}
