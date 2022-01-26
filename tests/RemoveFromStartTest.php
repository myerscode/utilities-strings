<?php

namespace Tests;

class RemoveFromStartTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', '', ''],
            ['bar', 'foobar', 'foo'],
            ['foobar', 'foofoobar', 'foo'],
            ['foofoobar', 'foofoobar', 'bar'],
            ['bar', 'foo.bar', 'foo.'],
            ['.bar', 'foo..bar', 'foo.'],
            ['foobar', 'foobar', 'bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringHasValuesRemoved($expected, $value, $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromStart($remove)->value());
    }
}
