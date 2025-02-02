<?php

namespace Tests;

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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringOnlyContainsAlphaNumericCharacters(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlphaNumeric());
    }
}
