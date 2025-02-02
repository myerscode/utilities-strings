<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class IsAlphaNumericTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, ''],
            [true, 'hello world'],
            [true, 'hello world 123'],
            [true, '123'],
            [false, 'hello world!'],
            [false, '!!!'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyContainsAlphaNumericCharacters(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlphaNumeric());
    }
}
