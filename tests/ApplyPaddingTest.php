<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;

class ApplyPaddingTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['  foo bar', 'foo bar', 2],
            ['foo bar  ', 'foo bar', 0, 2],
            ['  foo bar  ', 'foo bar', 2, 2],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsPaddedOnBothSides(string $expected, string $string, int $left = 0, int $right = 0, $padding = ' '): void
    {
        $utility = $this->utility($string);
        $reflectionClass = new ReflectionClass($utility::class);
        $reflectionMethod = $reflectionClass->getMethod('applyPadding');
        $reflectionMethod->setAccessible(true);
        $this->assertEquals($expected, $reflectionMethod->invokeArgs($utility, [$left, $right, $padding])->value());
    }
}
