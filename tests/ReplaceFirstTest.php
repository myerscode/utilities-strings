<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ReplaceFirstTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['bar bar', 'foo bar', 'foo', 'bar'];
        yield ['Hello World', 'Hello World', 'xyz', 'abc'];
        yield ['Hello World', 'Hello World', '', 'abc'];
        yield ['baz bar foo', 'foo bar foo', 'foo', 'baz'];
        yield ['Hello World', 'Hello Hello World', 'Hello ', ''];
        yield ['', '', 'foo', 'bar'];
        yield ['foobär', 'foobaz', 'baz', 'bär'];
        yield [' World', 'Hello World', 'Hello', ''];
        yield ['foo-baz-bar', 'foo-bar-bar', 'bar', 'baz'];
        yield ['XXbar', 'foobar', 'foo', 'XX'];
        yield ['foobar', 'foobar', 'FOO', 'XX'];
    }

    #[DataProvider('__validData')]
    public function testReplaceFirstMethod(string $expected, string $string, string $search, string $replace): void
    {
        $this->assertSame($expected, $this->utility($string)->replaceFirst($search, $replace)->value());
    }
}
