<?php

namespace Tests;

class RemoveFromEndTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', '', ''],
            ['foo', 'foobar', 'bar'],
            ['foobar', 'foobarbar', 'bar'],
            ['foo', 'foo.bar', '.bar'],
            ['foo.', 'foo..bar', '.bar'],
            ['foobar', 'foobar', 'foo'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringHasValuesRemoved($expected, $value, $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromEnd($remove)->value());
    }
}
