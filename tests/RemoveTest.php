<?php

namespace Tests;

class RemoveTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', '', ''],
            ['foo', 'foobar', 'bar'],
            ['foo', 'foobar', ['bar']],
            ['', 'foobar', ['foo', 'bar']],
            ['foofoo', 'foobarfoobar', 'bar'],
            ['foofoo', 'foobarfoobar', ['bar']],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringHasValuesRemoved($expected, $value, $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->remove($remove)->value());
    }
}
