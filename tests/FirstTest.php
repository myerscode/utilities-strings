<?php

namespace Tests;

class FirstTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', 'foo bar', 0],
            ['foo', 'foo bar', 3],
            ['f', 'foo bar', 1],
            ['', 'foo bar', -4],
            ['foo', 'foo', 8],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testFirstMethod($expected, $string, $length = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->first($length)->value());
    }
}
