<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsUuidTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, '550e8400-e29b-41d4-a716-446655440000'];
        yield [true, '550E8400-E29B-41D4-A716-446655440000'];
        yield [true, '00000000-0000-0000-0000-000000000000'];
        yield [false, '550e8400e29b41d4a716446655440000'];
        yield [false, '550e8400-e29b-41d4-a716-44665544000'];
        yield [false, '550e8400-e29b-41d4-a716-4466554400000'];
        yield [false, '550e8400-e29b-41d4-a716-44665544000g'];
        yield [false, "550e8400-e29b-41d4-a716-446655440000\n"];
        yield [false, ' 550e8400-e29b-41d4-a716-446655440000'];
        yield [false, 'Rupert'];
        yield [false, ''];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringAUuid(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isUuid());
    }
}
