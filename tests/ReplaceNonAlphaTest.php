<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ReplaceNonAlphaTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['quick brown foo bar', 'quick brown foo bar', '', false];
        yield ['foo bar ', 'foo bar 123', '', false];
        yield ['omg its a fox D', "omg!!! it's a fox =D", '', false];
        yield ['', ':"{}~`', '', false];
        yield ['', '!@£$%^&*()', '', false];
        yield ['', '', '', false];
        yield ['quick.brown.foo.bar', 'quick brown foo bar', '.', true];
        yield ['foo.bar....', 'foo bar 123', '.', true];
        yield ['omg....it.s.a.fox..D', "omg!!! it's a fox =D", '.', true];
        yield ['quick brown foo bar', 'quick brown foo bar', '.', false];
        yield ['foo bar ...', 'foo bar 123', '.', false];
        yield ['omg... it.s a fox .D', "omg!!! it's a fox =D", '.', false];
        yield ['quickbrownfoobar', 'quick brown foo bar', '', true];
        yield ['foobar', 'foo bar 123', '', true];
        yield ['omgitsafoxD', "omg!!! it's a fox =D", '', true];
        yield ['', ':"{}~`', '', true];
        yield ['', '!@£$%^&*()', '', true];
        yield ['', '', '', true];
    }

    #[DataProvider('__validData')]
    public function testStringIsStrippedOfNoneAlphaValues(string $expected, string $string, string $turnTo, bool $strict): void
    {
        $this->assertSame($expected, $this->utility($string)->replaceNonAlpha($turnTo, $strict)->value());
    }
}
