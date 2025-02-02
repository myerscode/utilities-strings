<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class TrimLeftTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['fobar', '!!!!!fobar', '!'],
            ['fobar!!!!!', 'fobar!!!!!', '!'],
            ['o World!', 'Hello World!', ['H', 'el']],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('forbar', $this->utility('          forbar')->trimLeft()->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string|array $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trimLeft($charList)->value());
    }
}
