<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class UnwrapTest extends BaseStringSuite
{
    public static function __differentValueData(): Iterator
    {
        yield ['framework', '{framework}', '{', '}'];
        yield ['hello', '<p>hello</p>', '<p>', '</p>'];
        yield ['framework', '{framework', '{', '}'];
        yield ['framework', 'framework}', '{', '}'];
        yield ['[foo)', '[foo)', '(', ']'];
        yield ['bàř', '«bàř»', '«', '»'];
    }
    public static function __sameValueData(): Iterator
    {
        yield ['Laravel', '-Laravel-', '-'];
        yield ['Laravel', '-Laravel', '-'];
        yield ['Laravel', 'Laravel-', '-'];
        yield ['Laravel', 'Laravel', '-'];
        yield ['', '', '-'];
        yield ['"foo"', '""foo""', '"'];
        yield ['', '--', '-'];
        yield ['', '-', '-'];
        yield ['Foo', 'Foo', 'foo'];
    }

    #[DataProvider('__differentValueData')]
    public function testUnwrapWithDifferentValues(string $expected, string $string, string $before, string $after): void
    {
        $this->assertSame($expected, $this->utility($string)->unwrap($before, $after)->value());
    }

    #[DataProvider('__sameValueData')]
    public function testUnwrapWithSingleValue(string $expected, string $string, string $before): void
    {
        $this->assertSame($expected, $this->utility($string)->unwrap($before)->value());
    }
}
