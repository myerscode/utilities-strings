<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsNotEmptyTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [false, ''];
        yield [true, ' '];
        yield [true, 'hello'];
        yield [true, '0'];
        yield [true, 'false'];
        yield [true, "\t"];
        yield [true, "\n"];
        yield [true, '  '];
    }

    #[DataProvider('__validData')]
    public function testIsNotEmptyMethod(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isNotEmpty());
    }
}
