<?php

namespace Tests;

class EnsureEndsWithTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foobar', 'foo', 'bar'],
            ['foobar', 'foobar', 'bar'],
            ['fobarrrrbar', 'fobarrrr', 'bar'],
            ['foobbar', 'foobbar', 'bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsMadeToEndWithValue($expected, $string, $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->ensureEndsWith($ensure));
    }
}
