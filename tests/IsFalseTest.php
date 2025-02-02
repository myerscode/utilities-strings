<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class IsFalseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, 'false'],
            [true, '0'],
            [true, 'off'],
            [true, 'no'],
            [true, ''],
            [false, 'cross'],
            [false, 'foobar'],
        ];
    }

    #[DataProvider('__validData')]
    public function testDoesTheStringRepresentFalse(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isFalse());
    }
}
