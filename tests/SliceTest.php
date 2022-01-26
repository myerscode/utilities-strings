<?php

namespace Tests;

class SliceTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 0, 7],
            ['foo', 'foo bar', 0, 3],
            ['bar', 'foo bar', 4],
            ['', 'foo bar', 3, 0],
            ['', 'foo bar', 3, 2],
            ['bar', 'foo bar', 4, 7],
            ['foo ba', 'foo bar', 0, -1],
            ['ba', 'foo bar', 4, -1],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testSliceOfValueIsReturned($expected, $string, $start, $length = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->slice($start, $length)->value());
    }
}
