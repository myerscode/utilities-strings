<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class SliceTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['foo bar', 'foo bar', 0, 7],
            ['foo', 'foo bar', 0, 3],
            ['bar', 'foo bar', 4],
            ['', 'foo bar', 3, 0],
            ['', 'foo bar', 3, 2],
            ['bar', 'foo bar', 4, 7],
            ['foo ba', 'foo bar', 0, -1],
            ['ba', 'foo bar', 4, -1],
        ];
    }

    #[DataProvider('__validData')]
    public function testSliceOfValueIsReturned(string $expected, string $string, int $start, ?int $length = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->slice($start, $length)->value());
    }
}
