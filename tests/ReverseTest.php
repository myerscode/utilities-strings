<?php

namespace Tests;

class ReverseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['raboof', 'foobar'],
            ['rab oof', 'foo bar'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsRevered(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->reverse()->value());
    }
}
