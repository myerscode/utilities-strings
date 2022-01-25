<?php

namespace Tests;

class ToAlphanumericTest extends BaseStringSuite
{
    public function __validData(): array
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

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToContainOnlyAlphanumericValues($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toAlphanumeric()->value());
    }
}
