<?php

namespace Tests;

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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testGetValue(string $expected, string|int|bool|\Tests\Support\StringConstructorTestCase|\Myerscode\Utilities\Strings\Utility $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->value());
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testToString(string $expected, string|int|bool|\Tests\Support\StringConstructorTestCase|\Myerscode\Utilities\Strings\Utility $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->__toString());
    }
}
