<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class LcfirstTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo Bar', 'Foo Bar'];
        yield ['foo bar', 'foo bar'];
        yield ['', ''];
        yield ['a', 'A'];
        yield [' Foo', ' Foo'];
        yield ['123 Foo', '123 Foo'];
        yield ['òôbàř', 'Òôbàř'];
        yield ['hello', 'Hello'];
    }

    #[DataProvider('__validData')]
    public function testLcfirstMethod(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->lcfirst()->value());
    }
}
