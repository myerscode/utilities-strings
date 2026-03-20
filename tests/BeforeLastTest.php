<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class BeforeLastTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo.bar', 'foo.bar.baz', '.'];
        yield ['Hello', 'Hello World', ' '];
        yield ['', 'Hello World', 'xyz'];
        yield ['Hello World', 'Hello World', ''];
        yield ['', 'foobar', 'foobar'];
        yield ['', '', 'foo'];
        yield ['foo', 'foo.bär', '.'];
        yield ['foo/bar', 'foo/bar/baz', '/'];
        yield ['a::b', 'a::b::c', '::'];
        yield ['', 'foobar', 'foobar!'];
        yield ['foo-bar', 'foo-bar-baz', '-'];
        yield ['foo-bar', 'foo-bar-bar', '-bar'];
    }

    #[DataProvider('__validData')]
    public function testBeforeLastMethod(string $expected, string $string, string $search): void
    {
        $this->assertSame($expected, $this->utility($string)->beforeLast($search)->value());
    }
}
