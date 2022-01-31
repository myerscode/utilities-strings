<?php

namespace Tests;

class RepeatTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', 'foo bar', 0],
            ['foo bar', 'foo bar', 1],
            ['foo barfoo bar', 'foo bar', 2],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsRepeated($expected, $string, $multiplier): void
    {
        $this->assertEquals($expected, $this->utility($string)->repeat($multiplier)->value());
    }
}
