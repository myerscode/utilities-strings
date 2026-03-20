<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class AfterLastTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['baz', 'foo.bar.baz', '.'];
        yield ['World', 'Hello World', ' '];
        yield ['', 'Hello World', 'xyz'];
        yield ['Hello World', 'Hello World', ''];
        yield ['', 'foobar', 'foobar'];
        yield ['', '', 'foo'];
        yield ['bär', 'foo.bär', '.'];
        yield ['bar', 'foo-bar-bar-bar', '-bar-'];
        yield ['baz', 'foo/bar/baz', '/'];
        yield ['c', 'a::b::c', '::'];
        yield ['bar', 'foobar', 'foo'];
        yield ['', 'foobar', 'foobar!'];
    }

    #[DataProvider('__validData')]
    public function testAfterLastMethod(string $expected, string $string, string $search): void
    {
        $this->assertSame($expected, $this->utility($string)->afterLast($search)->value());
    }
}
