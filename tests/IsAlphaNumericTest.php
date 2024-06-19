<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsAlphaNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, ''];
        yield [true, 'hello world'];
        yield [true, 'hello world 123'];
        yield [true, '123'];
        yield [false, 'hello world!'];
        yield [false, '!!!'];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyContainsAlphaNumericCharacters(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isAlphaNumeric());
    }
}
