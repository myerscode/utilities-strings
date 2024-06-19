<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class AppendTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['bar', '', 'bar'];
        yield ['foobar', 'foo', 'bar'];
        yield ['foobarbar', 'foobar', 'bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsAppendedWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->append($ensure));
    }
}
