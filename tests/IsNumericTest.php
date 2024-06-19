<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsNumericTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [false, ''];
        yield [false, 'hello world'];
        yield [false, 'hello world 123'];
        yield [false, '1 2 3'];
        yield [true, '123'];
    }

    #[DataProvider('__validData')]
    public function testStringOnlyNumericCharacters(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isNumeric());
    }
}
