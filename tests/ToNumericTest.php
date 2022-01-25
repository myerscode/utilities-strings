<?php

namespace Tests;

class ToNumericTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', 'quick brown foo bar'],
            ['123', 'foobar123'],
            ['1234567890', '1234567890'],
            ['', "omg!!! it's a fox =D"],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToContainOnlyNumericValues($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toNumeric()->value());
    }
}
