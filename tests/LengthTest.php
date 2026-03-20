<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class LengthTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [6, 'foobar'];
        yield [1, '0'];
        yield [0, ''];
        yield [11, 'Hello World'];
        yield [1, ' '];
        yield [3, 'foo'];
    }

    #[DataProvider('__validData')]
    public function testGetCorrectStringLength(int $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->length());
    }
}
