<?php

namespace Tests;

class IsEmailTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, 'hello@world.com'],
            [true, 'test@hello.world.com'],
            [false, 'not@valid'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsInAValidEmailFormat(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isEmail());
    }
}
