<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class TrimRightTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['!!!!!fobar', '!!!!!fobar', '!'];
        yield ['fobar', 'fobar!!!!!', '!'];
        yield ['He', 'Hello World!', ['Wor', 'ld!', ' ']];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertSame('forbar', $this->utility('forbar         ')->trimRight()->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string|array $charList): void
    {
        $this->assertSame($expected, $this->utility($string)->trimRight($charList)->value());
    }
}
