<?php

namespace Tests;

class AppendTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['bar', '', 'bar'],
            ['foobar', 'foo', 'bar'],
            ['foobarbar', 'foobar', 'bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsAppendedWithValue($expected, $string, $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->append($ensure));
    }
}
