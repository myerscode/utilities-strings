<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsEmailTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'hello@world.com'];
        yield [true, 'test@hello.world.com'];
        yield [false, 'not@valid'];
    }

    #[DataProvider('__validData')]
    public function testStringIsInAValidEmailFormat(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isEmail());
    }
}
