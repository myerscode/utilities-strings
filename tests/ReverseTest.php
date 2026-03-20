<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class ReverseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['raboof', 'foobar'];
        yield ['rab oof', 'foo bar'];
        yield ['', ''];
        yield ['a', 'a'];
        yield ['cba', 'abc'];
        yield ['321', '123'];
    }

    #[DataProvider('__validData')]
    public function testStringIsRevered(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->reverse()->value());
    }
}
