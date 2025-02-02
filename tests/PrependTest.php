<?php

namespace Tests;

class PrependTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo', '', 'foo'],
            ['foobar', 'bar', 'foo'],
            ['foofoobar', 'foobar', 'foo'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsPrependedWithValue(string $expected, string $string, string $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->prepend($ensure));
    }
}
