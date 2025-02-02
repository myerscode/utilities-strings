<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

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

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string, int $length): void
    {
        $this->assertEquals($expected, $this->utility($string)->limit($length)->value());
    }
}
