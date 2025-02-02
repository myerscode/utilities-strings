<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class LengthTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [6, 'foobar'],
            [1, '0'],
            [0, ''],
        ];
    }

    #[DataProvider('__validData')]
    public function testGetCorrectStringLength(int $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->length());
    }
}
