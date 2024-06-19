<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class LimitTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Hello', 'Hello World', 5];
        yield ['Hello World', 'Hello World', 50];
        yield ['', 'Hello World', 0];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string, int $length): void
    {
        $this->assertSame($expected, $this->utility($string)->limit($length)->value());
    }
}
