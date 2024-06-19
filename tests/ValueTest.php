<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Myerscode\Utilities\Strings\Utility;
use Tests\Support\StringConstructorTestCase;

class ValueTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield 'string' => ['hello world', 'hello world'];
        yield 'number' => ['123', 123];
        yield 'true' => ['1', true];
        yield 'false' => ['', false];
        yield 'class with __toString()' => ['StringConstructorTestCase::class', new StringConstructorTestCase()];
        yield 'Utility' => ['Hello World', new Utility('Hello World')];
    }

    #[DataProvider('__validData')]
    public function testGetValue(string $expected, string|int|bool|StringConstructorTestCase|Utility $string): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->value());
    }

    #[DataProvider('__validData')]
    public function testToString(string $expected, string|int|bool|StringConstructorTestCase|Utility $string): void
    {
        $this->assertSame($expected, $this->utility($string)->__toString());
    }
}
