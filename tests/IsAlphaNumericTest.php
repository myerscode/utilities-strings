<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsAlphaNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, ''];
        yield [true, 'hello world'];
        yield [true, 'hello world 123'];
        yield [true, '123'];
        yield [false, 'hello world!'];
        yield [false, '!!!'];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyContainsAlphaNumericCharacters(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isAlphaNumeric());
    }
}
