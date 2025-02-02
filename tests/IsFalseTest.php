<?php

namespace Tests;

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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testDoesTheStringRepresentFalse(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isFalse());
    }
}
