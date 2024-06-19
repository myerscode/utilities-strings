<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class TrimTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foobar', '!!!!!foobar!!!!!', '!'];
        yield ['foobar', '!!!!!foobar', '!'];
        yield ['foobar', 'foobar!!!!!', '!'];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertSame('foobar', $this->utility('        foobar         ')->trim()->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string $charList): void
    {
        $this->assertSame($expected, $this->utility($string)->trim($charList)->value());
    }
}
