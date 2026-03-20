<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class LastTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', 'foo bar', 0];
        yield ['bar', 'foo bar', 3];
        yield ['r', 'foo bar', 1];
        yield ['', 'foo bar', -4];
        yield ['foo', 'foo', 8];
        yield ['foo bar', 'foo bar', 7];
        yield ['', '', 3];
        yield ['är', 'foobär', 2];
        yield ['d', 'Hello World', 1];
        yield ['World', 'Hello World', 5];
    }

    #[DataProvider('__validData')]
    public function testLastMethod(string $expected, string $string, int $length): void
    {
        $this->assertSame($expected, $this->utility($string)->last($length)->value());
    }
}
