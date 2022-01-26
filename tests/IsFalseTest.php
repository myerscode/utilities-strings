<?php

namespace Tests;

class IsFalseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, 'false'],
            [true, '0'],
            [true, 'off'],
            [true, 'no'],
            [true, ''],
            [false, 'cross'],
            [false, 'foobar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testDoesTheStringRepresentFalse($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isFalse());
    }
}
