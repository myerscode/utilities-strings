<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class AfterTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['World', 'Hello World', 'Hello '];
        yield ['Bar', 'Foo Bar', ' '];
        yield ['', 'Hello World', 'xyz'];
        yield ['Hello World', 'Hello World', ''];
        yield ['bar.baz', 'foo.bar.baz', '.'];
        yield ['', 'foobar', 'foobar'];
        yield [' World', 'Hello World', 'Hello'];
        yield ['', '', 'foo'];
        yield ['bär', 'foobär', 'foo'];
        yield ['World. Foo Bar', 'Hello World. Foo Bar', 'Hello '];
        yield ['ar', 'foobar', 'foob'];
        yield ['', 'foobar', 'foobar!'];
        yield ['bar-baz', 'foo-bar-baz', '-'];
    }

    #[DataProvider('__validData')]
    public function testAfterMethod(string $expected, string $string, string $search): void
    {
        $this->assertSame($expected, $this->utility($string)->after($search)->value());
    }
}
