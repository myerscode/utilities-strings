<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RemoveTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', '', ''];
        yield ['foo', 'foobar', 'bar'];
        yield ['foo', 'foobar', ['bar']];
        yield ['', 'foobar', ['foo', 'bar']];
        yield ['foofoo', 'foobarfoobar', 'bar'];
        yield ['foofoo', 'foobarfoobar', ['bar']];
    }

    #[DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string|array $remove): void
    {
        $this->assertSame($expected, $this->utility($value)->remove($remove)->value());
    }
}
