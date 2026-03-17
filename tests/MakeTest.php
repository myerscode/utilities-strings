<?php

declare(strict_types=1);

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Support\StringConstructorTestCase;
use Iterator;

#[CoversClass(Utility::class)]
final class MakeTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield 'string' => ['hello world', 'hello world'];
        yield 'class with __toString()' => ['StringConstructorTestCase::class', new StringConstructorTestCase()];
        yield 'Utility' => ['Hello World', new Utility('Hello World')];
    }

    #[DataProvider('__validData')]
    public function testValueSetViaMake(
        string $expected,
        string|Utility|StringConstructorTestCase $string
    ): void {
        $this->assertSame($expected, (string) Utility::make($string)->value());
    }
}
