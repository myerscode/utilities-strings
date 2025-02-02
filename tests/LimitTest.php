<?php

namespace Tests;

class LimitTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['Hello', 'Hello World', 5],
            ['Hello World', 'Hello World', 50],
            ['', 'Hello World', 0],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string, int $length): void
    {
        $this->assertEquals($expected, $this->utility($string)->limit($length)->value());
    }
}
