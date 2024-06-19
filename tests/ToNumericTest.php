<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', 'quick brown foo bar'];
        yield ['123', 'foobar123'];
        yield ['1234567890', '1234567890'];
        yield ['', "omg!!! it's a fox =D"];
        yield ['', ':"{}~`'];
        yield ['', '!@£$%^&*()'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToContainOnlyNumericValues(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toNumeric()->value());
    }
}
