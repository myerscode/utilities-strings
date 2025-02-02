<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Myerscode\Utilities\Strings\Utility;
use Tests\Support\StringConstructorTestCase;

class ValueTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            'string' => ['hello world', 'hello world'],
            'number' => ['123', 123],
            'true' => ['1', true],
            'false' => ['', false],
            'class with __toString()' => ['StringConstructorTestCase::class', new StringConstructorTestCase()],
            'Utility' => ['Hello World', new Utility('Hello World')],
        ];
    }

    #[DataProvider('__validData')]
    public function testGetValue(string $expected, string|int|bool|StringConstructorTestCase|Utility $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->value());
    }

    #[DataProvider('__validData')]
    public function testToString(string $expected, string|int|bool|StringConstructorTestCase|Utility $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->__toString());
    }
}
