<?php

namespace Tests;

class IsEmailTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, 'hello@world.com'],
            [true, 'test@hello.world.com'],
            [false, 'not@valid'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsInAValidEmailFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isEmail());
    }
}
