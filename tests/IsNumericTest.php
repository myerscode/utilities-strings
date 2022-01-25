<?php

namespace Tests;

class IsNumericTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [false, ''],
            [false, 'hello world'],
            [false, 'hello world 123'],
            [false, '1 2 3'],
            [true, '123'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringOnlyNumericCharacters($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isNumeric());
    }
}
