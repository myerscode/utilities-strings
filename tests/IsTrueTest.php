<?php

namespace Tests;

class IsTrueTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, 'true'],
            [true, '1'],
            [true, 'on'],
            [true, 'yes'],
            [true, 'ok'],
            [false, 'tr'],
            [false, 'tick'],
            [false, 'foobar'],
            [false, ''],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testIsTrueReturnsTrue($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isTrue());
    }
}
