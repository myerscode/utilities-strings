<?php

namespace Tests;

class ToAlphaTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['quickbrownfoobar', 'quick brown foo bar'],
            ['foobar', 'foobar123'],
            ['', '1234567890'],
            ['omgitsafoxD', "omg!!! it's a fox =D"],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsStrippedOfNoneAlphanumericValues(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toAlpha()->value());
    }
}
