<?php

namespace Tests;

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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testGetCorrectStringLength(int $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->length());
    }
}
