<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsAsciiTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'Hello World'];
        yield [true, ''];
        yield [true, '123 !@#$%^&*()'];
        yield [true, "tab\tand\nnewline"];
        yield [false, 'fòôbàř'];
        yield [false, 'café'];
        yield [false, 'Taylor Ötwell'];
        yield [false, '😀'];
        yield [false, '€'];
        yield [true, 'abcABC'];
    }

    #[DataProvider('__validData')]
    public function testIsAsciiMethod(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isAscii());
    }
}
