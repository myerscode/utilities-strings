<?php

namespace Tests;

class RemoveFromEndTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromEnd($remove)->value());
    }
}
