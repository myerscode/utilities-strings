<?php

namespace Tests;

class ReplaceNonNumericTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['   ', 'quick brown foo bar', '', false],
            ['  123', 'foo bar 123', '', false],
            ['    ', "omg!!! it's a fox =D", '', false],
            ['', ':"{}~`', '', false],
            ['', '!@£$%^&*()', '', false],
            ['', '', '', false],
            ['..... ..... ... ...', 'quick brown foo bar', '.', false],
            ['... ... 123', 'foo bar 123', '.', false],
            ['...... .... . ... ..', "omg!!! it's a fox =D", '.', false],
            ['...................', 'quick brown foo bar', '.', true],
            ['........123', 'foo bar 123', '.', true],
            ['....................', "omg!!! it's a fox =D", '.', true],
            ['', 'quick brown foo bar', '', true],
            ['123', 'foo bar 123', '', true],
            ['', "omg!!! it's a fox =D", '', true],
            ['', ':"{}~`', '', true],
            ['', '!@£$%^&*()', '', true],
            ['', '', '', true],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsStrippedOfNoneNumericValues(string $expected, string $string, string $turnTo, bool $strict): void
    {
        $this->assertEquals($expected, $this->utility($string)->replaceNonNumeric($turnTo, $strict)->value());
    }
}
