<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsAlphaTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'hello world'];
        yield [false, 'hello world!!'];
        yield [false, '123'];
        yield [false, 123];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyContainsAlphaCharacters(bool $expected, string|int $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlpha());
    }
}
