<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class FirstTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', 'foo bar', 0];
        yield ['foo', 'foo bar', 3];
        yield ['f', 'foo bar', 1];
        yield ['', 'foo bar', -4];
        yield ['foo', 'foo', 8];
    }

    #[DataProvider('__validData')]
    public function testFirstMethod(string $expected, string $string, int $length = null): void
    {
        $this->assertSame($expected, $this->utility($string)->first($length)->value());
    }
}
