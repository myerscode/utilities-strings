<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsLowerTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'rupert'];
        yield [true, 'rupert met gerald 123!'];
        yield [true, 'élan été'];
        yield [true, 'a'];
        yield [false, 'Rupert'];
        yield [false, 'ruperT'];
        yield [false, 'ÉLAN'];
        yield [false, 'élAn'];
        yield [false, 'RUPERT'];
        yield [false, '123'];
        yield [false, '日本語'];
        yield [false, ''];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringLowercase(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isLower());
    }
}
