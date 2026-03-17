<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class AppendTest extends BaseStringSuite
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
        $this->assertEquals($expected, $this->utility($string)->append($ensure));
    }
}
