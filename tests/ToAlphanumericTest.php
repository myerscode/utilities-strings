<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToAlphanumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['quickbrownfoobar', 'quick brown foo bar'];
        yield ['foobar123', 'foo bar 123'];
        yield ['1234567890', '1234567890'];
        yield ['omgitsafoxD', "omg!!! it's a fox =D"];
        yield ['', ':"{}~`'];
        yield ['', '!@£$%^&*()'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToContainOnlyAlphanumericValues(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toAlphanumeric()->value());
    }
}
