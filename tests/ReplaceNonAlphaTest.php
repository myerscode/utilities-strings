<?php

namespace Tests;

class ReplaceNonAlphaTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['quick brown foo bar', 'quick brown foo bar', '', false],
            ['foo bar ', 'foo bar 123', '', false],
            ['omg its a fox D', "omg!!! it's a fox =D", '', false],
            ['', ':"{}~`', '', false],
            ['', '!@£$%^&*()', '', false],
            ['', '', '', false],
            ['quick.brown.foo.bar', 'quick brown foo bar', '.', true],
            ['foo.bar....', 'foo bar 123', '.', true],
            ['omg....it.s.a.fox..D', "omg!!! it's a fox =D", '.', true],
            ['quick brown foo bar', 'quick brown foo bar', '.', false],
            ['foo bar ...', 'foo bar 123', '.', false],
            ['omg... it.s a fox .D', "omg!!! it's a fox =D", '.', false],
            ['quickbrownfoobar', 'quick brown foo bar', '', true],
            ['foobar', 'foo bar 123', '', true],
            ['omgitsafoxD', "omg!!! it's a fox =D", '', true],
            ['', ':"{}~`', '', true],
            ['', '!@£$%^&*()', '', true],
            ['', '', '', true],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfNoneAlphaValues($expected, $string, $turnTo, $strict): void
    {
        $this->assertEquals($expected, $this->utility($string)->replaceNonAlpha($turnTo, $strict)->value());
    }
}
