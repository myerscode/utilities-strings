<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToAlphanumericTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['quickbrownfoobar', 'quick brown foo bar'],
            ['foobar123', 'foo bar 123'],
            ['1234567890', '1234567890'],
            ['omgitsafoxD', "omg!!! it's a fox =D"],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToContainOnlyAlphanumericValues(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toAlphanumeric()->value());
    }
}
