<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsAlphaTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'hello world'];
        yield [false, 'hello world!!'];
        yield [false, '123'];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyContainsAlphaCharacters(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isAlpha());
    }
}
