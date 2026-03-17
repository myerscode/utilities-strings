<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class EnsureBeginsWithTest extends BaseStringSuite
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
        $this->assertEquals($expected, $this->utility($string)->ensureBeginsWith($ensure));
    }
}
