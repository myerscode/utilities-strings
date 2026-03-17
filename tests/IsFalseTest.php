<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsFalseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'false'];
        yield [true, '0'];
        yield [true, 'off'];
        yield [true, 'no'];
        yield [true, ''];
        yield [false, 'cross'];
        yield [false, 'foobar'];
    }

    #[DataProvider('__validData')]
    public function testDoesTheStringRepresentFalse(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isFalse());
    }
}
