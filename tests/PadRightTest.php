<?php

namespace Tests;

class PadRightTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 7],
            ['foo bar   ', 'foo bar', 10],
            ['foo bar      ', 'foo bar', 13],
            ['foo bar', 'foo bar', 0, '*.'],
            ['foo bar', 'foo bar', 7, '*.'],
            ['foo bar*.*', 'foo bar', 10, '*.'],
            ['foo bar*.*.*.', 'foo bar', 13, '*.'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsPaddedOnTheRight($expected, $string, $length, $padding = ' '): void
    {
        $this->assertEquals($expected, $this->utility($string)->padRight($length, $padding)->value());
    }
}
