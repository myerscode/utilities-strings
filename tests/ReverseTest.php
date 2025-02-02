<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ReverseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['raboof', 'foobar'],
            ['rab oof', 'foo bar'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsRevered(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->reverse()->value());
    }
}
