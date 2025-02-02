<?php

namespace Tests;

class TrimRightTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['!!!!!fobar', '!!!!!fobar', '!'],
            ['fobar', 'fobar!!!!!', '!'],
            ['He', 'Hello World!', ['Wor', 'ld!', ' ']],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('forbar', $this->utility('forbar         ')->trimRight()->value());
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string|array $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trimRight($charList)->value());
    }
}
