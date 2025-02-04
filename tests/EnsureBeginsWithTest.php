<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class EnsureBeginsWithTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foobar', 'bar', 'foo'],
            ['foobar', 'foobar', 'foo'],
            ['foofobar', 'fobar', 'foo'],
            ['foooobar', 'foooobar', 'foo'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsMadeToBeginWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->ensureBeginsWith($ensure));
    }
}
