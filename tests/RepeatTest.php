<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RepeatTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', 'foo bar', 0];
        yield ['foo bar', 'foo bar', 1];
        yield ['foo barfoo bar', 'foo bar', 2];
    }

    #[DataProvider('__validData')]
    public function testStringIsRepeated(string $expected, string $string, int $multiplier): void
    {
        $this->assertSame($expected, $this->utility($string)->repeat($multiplier)->value());
    }
}
