<?php

namespace Tests;

class ToNumericTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedToContainOnlyNumericValues(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toNumeric()->value());
    }
}
