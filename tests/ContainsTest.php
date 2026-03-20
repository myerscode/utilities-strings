<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ContainsTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'Hello World', 'Hello'];
        yield [true, 'Hello World', 'World'];
        yield [true, 'Hello World', ' '];
        yield [true, 'Hello World', 'Hello World'];
        yield [false, 'Hello World', 'hello'];
        yield [false, 'Hello World', 'xyz'];
        yield [false, 'Hello World', ''];
        yield [false, '', 'foo'];
        yield [true, 'foobär', 'bär'];
        yield [false, 'Hello World', 'World', 10];
        yield [true, 'Hello World', 'World', 6];
        yield [false, 'Hello World', 'Hello', 50];
        yield [true, 'foo bar foo', 'foo'];
    }

    #[DataProvider('__validData')]
    public function testContainsMethod(bool $expected, string $string, string $needle, int $offset = 0): void
    {
        $this->assertSame($expected, $this->utility($string)->contains($needle, $offset));
    }
}
