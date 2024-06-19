<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class IsJsonTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, json_encode(['foo' => 'bar'])];
        yield [false, 'foobar'];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringValidJson(bool $expected, bool|string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isJson());
    }
}
