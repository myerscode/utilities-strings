<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class TrimLeftTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['fobar', '!!!!!fobar', '!'];
        yield ['fobar!!!!!', 'fobar!!!!!', '!'];
        yield ['o World!', 'Hello World!', ['H', 'el']];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertSame('forbar', $this->utility('          forbar')->trimLeft()->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string|array $charList): void
    {
        $this->assertSame($expected, $this->utility($string)->trimLeft($charList)->value());
    }
}
