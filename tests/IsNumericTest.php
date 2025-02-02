<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class IsNumericTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [false, ''],
            [false, 'hello world'],
            [false, 'hello world 123'],
            [false, '1 2 3'],
            [true, '123'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyNumericCharacters(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isNumeric());
    }
}
