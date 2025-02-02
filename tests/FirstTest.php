<?php

namespace Tests;

class FirstTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['', 'foo bar', 0],
            ['foo', 'foo bar', 3],
            ['f', 'foo bar', 1],
            ['', 'foo bar', -4],
            ['foo', 'foo', 8],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testFirstMethod(string $expected, string $string, ?int $length = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->first($length)->value());
    }
}
