<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [false, ''];
        yield [false, 'hello world'];
        yield [false, 'hello world 123'];
        yield [false, '1 2 3'];
        yield [true, '123'];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyNumericCharacters(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isNumeric());
    }
}
