<?php

namespace Tests;

class RemoveTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string|array $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->remove($remove)->value());
    }
}
