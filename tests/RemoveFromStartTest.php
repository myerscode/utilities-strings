<?php

namespace Tests;

class RemoveFromStartTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromStart($remove)->value());
    }
}
