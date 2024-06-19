<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class SubstringTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar', 'foo bar', 0];
        yield ['foo', 'foo bar', 0, 3];
        yield ['bar', 'foo bar', 4];
        yield ['foo', 'foo bar', 0, -4];
        yield ['bar', 'foo bar', 4, null];
        yield ['o b', 'foo bar', 2, 3];
        yield ['', 'foo bar', 4, 0];
    }

    #[DataProvider('__validData')]
    public function testSubstringOfValueIsReturned(string $expected, string $string, int $start, ?int $length = null): void
    {
        $this->assertSame($expected, $this->utility($string)->substring($start, $length)->value());
    }
}
