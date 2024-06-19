<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ReplaceNonNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['   ', 'quick brown foo bar', '', false];
        yield ['  123', 'foo bar 123', '', false];
        yield ['    ', "omg!!! it's a fox =D", '', false];
        yield ['', ':"{}~`', '', false];
        yield ['', '!@£$%^&*()', '', false];
        yield ['', '', '', false];
        yield ['..... ..... ... ...', 'quick brown foo bar', '.', false];
        yield ['... ... 123', 'foo bar 123', '.', false];
        yield ['...... .... . ... ..', "omg!!! it's a fox =D", '.', false];
        yield ['...................', 'quick brown foo bar', '.', true];
        yield ['........123', 'foo bar 123', '.', true];
        yield ['....................', "omg!!! it's a fox =D", '.', true];
        yield ['', 'quick brown foo bar', '', true];
        yield ['123', 'foo bar 123', '', true];
        yield ['', "omg!!! it's a fox =D", '', true];
        yield ['', ':"{}~`', '', true];
        yield ['', '!@£$%^&*()', '', true];
        yield ['', '', '', true];
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfNoneNumericValues(string $expected, string $string, string $turnTo, bool $strict): void
    {
        $this->assertSame($expected, $this->utility($string)->replaceNonNumeric($turnTo, $strict)->value());
    }
}
