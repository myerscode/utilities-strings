<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class LimitTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Hello', 'Hello World', 5];
        yield ['Hello World', 'Hello World', 50];
        yield ['', 'Hello World', 0];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string, int $length): void
    {
        $this->assertSame($expected, $this->utility($string)->limit($length)->value());
    }
}
