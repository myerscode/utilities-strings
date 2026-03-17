<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class EnsureEndsWithTest extends BaseStringSuite
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
        $this->assertEquals($expected, $this->utility($string)->ensureEndsWith($ensure));
    }
}
