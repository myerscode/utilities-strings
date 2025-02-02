<?php

namespace Tests;

class IsAlphaTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, 'hello world'],
            [false, 'hello world!!'],
            [false, '123'],
            [false, 123],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringOnlyContainsAlphaCharacters(bool $expected, string|int $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlpha());
    }
}
