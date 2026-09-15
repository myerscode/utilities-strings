<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class SquishTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo bar', 'foo    bar'];
        yield ['foo bar', '   foo bar   '];
        yield ['foo bar baz', "foo\tbar\nbaz"];
        yield ['foo bar', "  foo \t\n bar  "];
        yield ['foobar', 'foobar'];
        yield ['', ''];
        yield ['', '     '];
        yield ['a b c', 'a  b  c'];
        yield ['fòô bàř', '  fòô    bàř  '];
    }

    #[DataProvider('__validData')]
    public function testSquishMethod(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->squish()->value());
    }
}
