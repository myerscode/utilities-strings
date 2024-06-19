<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsFalseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'false'];
        yield [true, '0'];
        yield [true, 'off'];
        yield [true, 'no'];
        yield [true, ''];
        yield [false, 'cross'];
        yield [false, 'foobar'];
    }

    #[DataProvider('__validData')]
    public function testDoesTheStringRepresentFalse(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isFalse());
    }
}
