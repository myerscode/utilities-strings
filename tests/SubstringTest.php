<?php

namespace Tests;

class SubstringTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo', 'foo bar', 0, 3],
            ['bar', 'foo bar', 4],
            ['foo', 'foo bar', 0, -4],
            ['bar', 'foo bar', 4, null],
            ['o b', 'foo bar', 2, 3],
            ['', 'foo bar', 4, 0],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testSubstringOfValueIsReturned($expected, $string, $start, $length = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->substring($start, $length)->value());
    }
}
