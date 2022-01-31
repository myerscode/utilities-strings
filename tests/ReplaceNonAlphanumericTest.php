<?php

namespace Tests;

class ReplaceNonAlphanumericTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['quick brown foo bar', 'quick brown foo bar', '', false],
            ['foo bar 123', 'foo bar 123', '', false],
            ['omg its a fox D', "omg!!! it's a fox =D", '', false],
            ['', ':"{}~`', '', false],
            ['', '!@£$%^&*()', '', false],
            ['', '', '', false],

            ['quick.brown.foo.bar', 'quick brown foo bar', '.', true],
            ['foo.bar.123', 'foo bar 123', '.', true],
            ['omg....it.s.a.fox..D', "omg!!! it's a fox =D", '.', true],

            ['quick brown foo bar', 'quick brown foo bar', '.', false],
            ['foo bar 123', 'foo bar 123', '.', false],
            ['omg... it.s a fox .D', "omg!!! it's a fox =D", '.', false],

            ['quickbrownfoobar', 'quick brown foo bar', '', true],
            ['foobar123', 'foo bar 123', '', true],
            ['omgitsafoxD', "omg!!! it's a fox =D", '', true],
            ['', ':"{}~`', '', true],
            ['', '!@£$%^&*()', '', true],
            ['', '', '', true],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfNoneAlphanumericValues($expected, $string, $turnTo, $strict): void
    {
        $this->assertEquals($expected, $this->utility($string)->replaceNonAlphanumeric($turnTo, $strict)->value());
    }
}
