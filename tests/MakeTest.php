<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Myerscode\Utilities\Strings\Utility;
use Tests\Support\StringConstructorTestCase;

#[CoversClass(Utility::class)]
class MakeTest extends BaseStringSuite
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
    public function testValueSetViaMake(
        string $expected,
        bool|int|Utility|string|StringConstructorTestCase $string
    ): void {
        $this->assertEquals($expected, Utility::make($string)->value());
    }
}
