<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class TrimTest extends BaseStringSuite
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
