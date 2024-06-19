<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;

class PrepareForCasingTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['fooBar', ['foo', 'Bar'],];
        yield ['hello_world', ['hello', 'world'],];
        yield ['hello_world', ['hello', 'world'],];
        yield ['  foo b ar', ['foo', 'b', 'ar']];
        yield ['FooUBar', ['Foo', 'U', 'Bar']];
        yield ['FooICYou', ['Foo', 'I', 'C', 'You']];
        yield ['string_with1number', ['string', 'with', '1', 'number']];
        yield ['omg!!! its a fox =D', ['omg!!!', 'its', 'a', 'fox', '=D']];
    }

    #[DataProvider('__validData')]
    public function testExpectedResults(string $string, array $expected): void
    {
        $utility = $this->utility($string);
        $reflectionClass = new ReflectionClass($utility::class);
        $reflectionMethod = $reflectionClass->getMethod('prepareForCasing');
        $reflectionMethod->setAccessible(true);
        $this->assertEquals($expected, $reflectionMethod->invokeArgs($utility, [$string]));
    }
}
