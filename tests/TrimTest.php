<?php

namespace Tests;

class TrimTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foobar', '!!!!!foobar!!!!!', '!'],
            ['foobar', '!!!!!foobar', '!'],
            ['foobar', 'foobar!!!!!', '!'],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('foobar', $this->utility('        foobar         ')->trim()->value());
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsStrippedOfGivenValues(string $expected, string $string, string $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trim($charList)->value());
    }
}
