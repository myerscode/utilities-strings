<?php

namespace Tests;

class IsAlphaTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, 'hello world'],
            [false, 'hello world!!'],
            [false, '123'],
            [false, 123],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringOnlyContainsAlphaCharacters($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlpha());
    }
}
