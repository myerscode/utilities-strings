<?php

namespace Tests;

class ReverseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['raboof', 'foobar'],
            ['rab oof', 'foo bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsRevered($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->reverse()->value());
    }
}
