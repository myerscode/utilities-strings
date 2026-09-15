<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class SubstringCountTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [2, 'foo bar foo', 'foo'];
        yield [1, 'Hello World', 'World'];
        yield [0, 'Hello World', 'xyz'];
        yield [0, 'Hello World', ''];
        yield [0, '', 'foo'];
        yield [3, 'aaa', 'a'];
        yield [1, 'aaa', 'aa'];
        yield [0, 'Hello World', 'world'];
        yield [2, 'foobär foobär', 'bär'];
        yield [3, 'a.b.c.d', '.'];
    }

    #[DataProvider('__validData')]
    public function testSubstringCountMethod(int $expected, string $string, string $needle): void
    {
        $this->assertSame($expected, $this->utility($string)->substringCount($needle));
    }
}
