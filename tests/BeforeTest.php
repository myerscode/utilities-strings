<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class BeforeTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Hello', 'Hello World', ' World'];
        yield ['Hello', 'Hello World', ' '];
        yield ['', 'Hello World', 'xyz'];
        yield ['Hello World', 'Hello World', ''];
        yield ['foo', 'foo.bar.baz', '.'];
        yield ['', 'foobar', 'foobar'];
        yield ['', '', 'foo'];
        yield ['foo', 'foobär', 'bär'];
        yield ['Hello ', 'Hello World. Foo Bar', 'World'];
        yield ['foob', 'foobar', 'ar'];
        yield ['', 'foobar', 'foobar!'];
        yield ['foo', 'foo-bar-baz', '-'];
        yield ['', 'Hello World', 'Hello'];
    }

    #[DataProvider('__validData')]
    public function testBeforeMethod(string $expected, string $string, string $search): void
    {
        $this->assertSame($expected, $this->utility($string)->before($search)->value());
    }
}
