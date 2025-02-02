<?php

namespace Tests;

class AppendTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['bar', '', 'bar'],
            ['foobar', 'foo', 'bar'],
            ['foobarbar', 'foobar', 'bar'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsAppendedWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->append($ensure));
    }
}
