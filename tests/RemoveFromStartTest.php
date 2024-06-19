<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RemoveFromStartTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', '', ''];
        yield ['bar', 'foobar', 'foo'];
        yield ['foobar', 'foofoobar', 'foo'];
        yield ['foofoobar', 'foofoobar', 'bar'];
        yield ['bar', 'foo.bar', 'foo.'];
        yield ['.bar', 'foo..bar', 'foo.'];
        yield ['foobar', 'foobar', 'bar'];
    }

    #[DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string $remove): void
    {
        $this->assertSame($expected, $this->utility($value)->removeFromStart($remove)->value());
    }
}
