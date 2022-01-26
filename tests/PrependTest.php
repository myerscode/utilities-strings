<?php

namespace Tests;

class PrependTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foo', '', 'foo'],
            ['foobar', 'bar', 'foo'],
            ['foofoobar', 'foobar', 'foo'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsPrependedWithValue($expected, $string, $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->prepend($ensure));
    }
}
