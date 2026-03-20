<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class BetweenTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['bar', 'foo bar baz', 'foo ', ' baz'];
        yield ['World', 'Hello World!', 'Hello ', '!'];
        yield ['bar', '[foo] [bar] [baz]', '[foo] [', '] [baz]'];
        yield ['', 'foobar', 'xyz', 'abc'];
        yield ['foobar', 'foobar', '', 'bar'];
        yield ['foobar', 'foobar', 'foo', ''];
        yield ['bar', 'foo:bar:baz', ':', ':'];
        yield ['', '', 'a', 'b'];
        yield ['bär', 'foo-bär-baz', '-', '-'];
        yield ['value', 'key=value&other=thing', '=', '&'];
        yield ['content', '<tag>content</tag>', '<tag>', '</tag>'];
        yield ['b', 'abc', 'a', 'c'];
    }

    #[DataProvider('__validData')]
    public function testBetweenMethod(string $expected, string $string, string $from, string $to): void
    {
        $this->assertSame($expected, $this->utility($string)->between($from, $to)->value());
    }
}
