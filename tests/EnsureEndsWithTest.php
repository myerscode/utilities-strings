<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class EnsureEndsWithTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foobar', 'foo', 'bar'];
        yield ['foobar', 'foobar', 'bar'];
        yield ['fobarrrrbar', 'fobarrrr', 'bar'];
        yield ['foobbar', 'foobbar', 'bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsMadeToEndWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->ensureEndsWith($ensure));
    }
}
