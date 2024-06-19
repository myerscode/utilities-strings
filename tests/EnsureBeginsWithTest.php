<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class EnsureBeginsWithTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foobar', 'bar', 'foo'];
        yield ['foobar', 'foobar', 'foo'];
        yield ['foofobar', 'fobar', 'foo'];
        yield ['foooobar', 'foooobar', 'foo'];
    }

    #[DataProvider('__validData')]
    public function testStringIsMadeToBeginWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->ensureBeginsWith($ensure));
    }
}
