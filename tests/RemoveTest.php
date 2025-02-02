<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

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

    #[DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string|array $remove): void
    {
        $this->assertEquals($expected, $this->utility($value)->remove($remove)->value());
    }
}
