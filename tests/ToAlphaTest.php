<?php

namespace Tests;

class ToAlphaTest extends BaseStringSuite
{
    public function __validData(): array
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

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfNoneAlphanumericValues($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toAlpha()->value());
    }
}
