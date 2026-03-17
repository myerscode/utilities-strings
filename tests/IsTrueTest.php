<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsTrueTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'true'];
        yield [true, '1'];
        yield [true, 'on'];
        yield [true, 'yes'];
        yield [true, 'ok'];
        yield [false, 'tr'];
        yield [false, 'tick'];
        yield [false, 'foobar'];
        yield [false, ''];
    }

    #[DataProvider('__validData')]
    public function testIsTrueReturnsTrue(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isTrue());
    }
}
