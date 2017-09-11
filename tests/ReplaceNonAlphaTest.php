<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ReplaceNonAlphaTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quick brown foo bar', 'quick brown foo bar', '', false],
            ['foo bar ', 'foo bar 123', '', false],
            ['omg its a fox D', 'omg!!! it\'s a fox =D', '', false],
            ['', ':"{}~`', '', false],
            ['', '!@£$%^&*()', '', false],
            ['', '', '', false],
            ['quick.brown.foo.bar', 'quick brown foo bar', '.', true],
            ['foo.bar....', 'foo bar 123', '.', true],
            ['omg....it.s.a.fox..D', 'omg!!! it\'s a fox =D', '.', true],
            ['quick brown foo bar', 'quick brown foo bar', '.', false],
            ['foo bar ...', 'foo bar 123', '.', false],
            ['omg... it.s a fox .D', 'omg!!! it\'s a fox =D', '.', false],
            ['quickbrownfoobar', 'quick brown foo bar', '', true],
            ['foobar', 'foo bar 123', '', true],
            ['omgitsafoxD', 'omg!!! it\'s a fox =D', '', true],
            ['', ':"{}~`', '', true],
            ['', '!@£$%^&*()', '', true],
            ['', '', '', true],
        ];
    }

    /**
     * Test string has none alpha values removed
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $turnTo Value to change to
     * @param boolean $strict Should strip spaces
     * @dataProvider dataProvider
     * @covers ::replaceNonAlpha
     */
    public function testStringIsStrippedOfNoneAlphaValues($expected, $string, $turnTo, $strict)
    {
        $this->assertEquals($expected, $this->utility($string)->replaceNonAlpha($turnTo, $strict)->value());
    }
}
