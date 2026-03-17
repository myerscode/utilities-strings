<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class PrependTest extends BaseStringSuite
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
        $this->assertEquals($expected, $this->utility($string)->prepend($ensure));
    }
}
