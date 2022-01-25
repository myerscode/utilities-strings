<?php

namespace Tests;

class LimitTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['Hello', 'Hello World', 5],
            ['Hello World', 'Hello World', 50],
            ['', 'Hello World', 0],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToTheTitleCaseFormat($expected, $string, $length): void
    {
        $this->assertEquals($expected, $this->utility($string)->limit($length)->value());
    }
}
