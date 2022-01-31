<?php

namespace Tests;

class LengthTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [6, 'foobar'],
            [1, '0'],
            [0, ''],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testGetCorrectStringLength($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->length());
    }
}
