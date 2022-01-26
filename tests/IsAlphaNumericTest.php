<?php

namespace Tests;

class IsAlphaNumericTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, ''],
            [true, 'hello world'],
            [true, 'hello world 123'],
            [true, '123'],
            [false, 'hello world!'],
            [false, '!!!'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringOnlyContainsAlphaNumericCharacters($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlphaNumeric());
    }
}
