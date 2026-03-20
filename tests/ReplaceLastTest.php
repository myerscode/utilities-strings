<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ReplaceLastTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar baz', 'foo bar foo', 'foo', 'baz'];
        yield ['Hello World', 'Hello World', 'xyz', 'abc'];
        yield ['Hello World', 'Hello World', '', 'abc'];
        yield ['Hello  World', 'Hello Hello World', 'Hello', ''];
        yield ['', '', 'foo', 'bar'];
        yield ['foobär', 'foobaz', 'baz', 'bär'];
        yield ['foo-bar-baz', 'foo-bar-bar', 'bar', 'baz'];
        yield ['fooXX', 'foobar', 'bar', 'XX'];
        yield ['foobar', 'foobar', 'BAR', 'XX'];
        yield ['a::b::X', 'a::b::c', 'c', 'X'];
        yield ['foo.bar.XX', 'foo.bar.baz', 'baz', 'XX'];
    }

    #[DataProvider('__validData')]
    public function testReplaceLastMethod(string $expected, string $string, string $search, string $replace): void
    {
        $this->assertSame($expected, $this->utility($string)->replaceLast($search, $replace)->value());
    }
}
