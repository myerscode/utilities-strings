<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class MaskTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['rup***************', 'rupert@example.com', '*', 3, null];
        yield ['rupert@example****', 'rupert@example.com', '*', -4, null];
        yield ['rup***@example.com', 'rupert@example.com', '*', 3, 3];
        yield ['******', 'Gerald', '*', 0, null];
        yield ['Ger***', 'Gerald', '*', 3, 10];
        yield ['******', 'Gerald', '*', -10, null];
        yield ['Gerald', 'Gerald', '*', 10, null];
        yield ['Gerald', 'Gerald', '', 1, null];
        yield ['Gerald', 'Gerald', '*', 1, 0];
        yield ['A--hur', 'Arthur', '-', 1, 2];
        yield ['A**hur', 'Arthur', '**', 1, 2];
        yield ['Éé••••e', 'Éétoile', '•', 2, 4];
        yield ['', '', '*', 0, null];
    }

    #[DataProvider('__validData')]
    public function testPartOfTheStringIsMasked(string $expected, string $string, string $char, int $index, ?int $length): void
    {
        $this->assertSame($expected, $this->utility($string)->mask($char, $index, $length)->value());
    }
}
