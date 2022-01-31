<?php

namespace Tests;

use ReflectionClass;

class ApplyPaddingTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['  foo bar', 'foo bar', 2],
            ['foo bar  ', 'foo bar', 0, 2],
            ['  foo bar  ', 'foo bar', 2, 2],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsPaddedOnBothSides($expected, $string, $left = 0, $right = 0, $padding = ' '): void
    {
        $utility = $this->utility($string);
        $reflectionClass = new ReflectionClass(get_class($utility));
        $reflectionMethod = $reflectionClass->getMethod('applyPadding');
        $reflectionMethod->setAccessible(true);
        $this->assertEquals($expected, $reflectionMethod->invokeArgs($utility, [$left, $right, $padding])->value());
    }
}
