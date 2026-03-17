<?php

declare(strict_types=1);

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Support\StringConstructorTestCase;
use Iterator;

final class ValueTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield 'string' => ['hello world', 'hello world'];
        yield 'class with __toString()' => ['StringConstructorTestCase::class', new StringConstructorTestCase()];
        yield 'Utility' => ['Hello World', new Utility('Hello World')];
    }

    #[DataProvider('__validData')]
    public function testGetValue(string $expected, string|StringConstructorTestCase|Utility $string): void
    {
        $this->assertSame($expected, (string) $this->utility($string)->value());
    }

    #[DataProvider('__validData')]
    public function testToString(string $expected, string|StringConstructorTestCase|Utility $string): void
    {
        $this->assertSame($expected, $this->utility($string)->__toString());
    }
}
