<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class UcfirstTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Foo bar', 'foo bar'];
        yield ['Foo Bar', 'Foo Bar'];
        yield ['', ''];
        yield ['A', 'a'];
        yield [' foo', ' foo'];
        yield ['123 foo', '123 foo'];
        yield ['Òôbàř', 'òôbàř'];
        yield ['HELLO', 'hELLO'];
    }

    #[DataProvider('__validData')]
    public function testUcfirstMethod(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->ucfirst()->value());
    }
}
