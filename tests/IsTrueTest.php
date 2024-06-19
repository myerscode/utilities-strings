<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsTrueTest extends BaseStringSuite
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
        $this->assertEquals($expected, $this->utility($string)->isTrue());
    }
}
