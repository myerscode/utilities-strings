<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RemoveFromEndTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', '', ''];
        yield ['foo', 'foobar', 'bar'];
        yield ['foobar', 'foobarbar', 'bar'];
        yield ['foo', 'foo.bar', '.bar'];
        yield ['foo.', 'foo..bar', '.bar'];
        yield ['foobar', 'foobar', 'foo'];
    }

    #[DataProvider('__validData')]
    public function testStringHasValuesRemoved(string $expected, string $value, string $remove): void
    {
        $this->assertSame($expected, $this->utility($value)->removeFromEnd($remove)->value());
    }
}
