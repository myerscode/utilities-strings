<?php

namespace Tests;

class RepeatTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['', 'foo bar', 0],
            ['foo bar', 'foo bar', 1],
            ['foo barfoo bar', 'foo bar', 2],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsRepeated(string $expected, string $string, int $multiplier): void
    {
        $this->assertEquals($expected, $this->utility($string)->repeat($multiplier)->value());
    }
}
