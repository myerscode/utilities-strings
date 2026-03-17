<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ToAlphaTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['quickbrownfoobar', 'quick brown foo bar'];
        yield ['foobar', 'foobar123'];
        yield ['', '1234567890'];
        yield ['omgitsafoxD', "omg!!! it's a fox =D"];
        yield ['', ':"{}~`'];
        yield ['', '!@£$%^&*()'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfNoneAlphanumericValues(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toAlpha()->value());
    }
}
