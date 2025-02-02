<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use Tests\Support\StringConstructorTestCase;

#[\PHPUnit\Framework\Attributes\CoversClass(Utility::class)]
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testValueSetViaMake(
        string $expected,
        bool|int|Utility|string|StringConstructorTestCase $string
    ): void {
        $this->assertEquals($expected, Utility::make($string)->value());
    }
}
