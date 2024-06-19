<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class PrependTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo', '', 'foo'];
        yield ['foobar', 'bar', 'foo'];
        yield ['foofoobar', 'foobar', 'foo'];
    }

    #[DataProvider('__validData')]
    public function testStringIsPrependedWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->prepend($ensure));
    }
}
