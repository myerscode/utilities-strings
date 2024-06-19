<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class SliceTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar', 'foo bar', 0];
        yield ['foo bar', 'foo bar', 0, 7];
        yield ['foo', 'foo bar', 0, 3];
        yield ['bar', 'foo bar', 4];
        yield ['', 'foo bar', 3, 0];
        yield ['', 'foo bar', 3, 2];
        yield ['bar', 'foo bar', 4, 7];
        yield ['foo ba', 'foo bar', 0, -1];
        yield ['ba', 'foo bar', 4, -1];
    }

    #[DataProvider('__validData')]
    public function testSliceOfValueIsReturned(string $expected, string $string, int $start, int $length = null): void
    {
        $this->assertSame($expected, $this->utility($string)->slice($start, $length)->value());
    }
}
