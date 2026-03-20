<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsEmptyTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, ''];
        yield [false, ' '];
        yield [false, 'hello'];
        yield [false, '0'];
        yield [false, 'false'];
        yield [false, "\t"];
        yield [false, "\n"];
        yield [false, '  '];
    }

    #[DataProvider('__validData')]
    public function testIsEmptyMethod(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isEmpty());
    }
}
