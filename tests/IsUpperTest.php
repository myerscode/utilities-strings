<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsUpperTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'RUPERT'];
        yield [true, 'RUPERT MET GERALD 123!'];
        yield [true, 'ÉLAN ÉTÉ'];
        yield [true, 'A'];
        yield [false, 'Rupert'];
        yield [false, 'RUPERt'];
        yield [false, 'élan'];
        yield [false, 'ÉLAn'];
        yield [false, 'rupert'];
        yield [false, '123'];
        yield [false, '日本語'];
        yield [false, ''];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringUppercase(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isUpper());
    }
}
