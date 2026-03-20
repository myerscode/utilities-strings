<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class SurroundTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['!!!Hello World!!!', 'Hello World', '!!!'];
        yield ['"foobar"', 'foobar', '"'];
        yield ['__test__', 'test', '__'];
        yield ['foobar', 'foobar', ''];
        yield [' foobar ', 'foobar', ' '];
    }

    #[DataProvider('__validData')]
    public function testSurround(string $expected, string $string, string $with): void
    {
        $this->assertSame($expected, $this->utility($string)->surround($with)->value());
    }
}
