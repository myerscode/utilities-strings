<?php

namespace Tests;

use ReflectionClass;

class PrepareForCasingTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['fooBar', ['foo', 'Bar'],],
            ['hello_world', ['hello', 'world'],],
            ['hello_world', ['hello', 'world'],],
            ['  foo b ar', ['foo', 'b', 'ar']],
            ['FooUBar', ['Foo', 'U', 'Bar']],
            ['FooICYou', ['Foo', 'I', 'C', 'You']],
            ['string_with1number', ['string', 'with', '1', 'number']],
            ['omg!!! its a fox =D', ['omg!!!', 'its', 'a', 'fox', '=D']],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testExpectedResults($string, $expected): void
    {
        $utility = $this->utility($string);
        $reflectionClass = new ReflectionClass(get_class($utility));
        $reflectionMethod = $reflectionClass->getMethod('prepareForCasing');
        $reflectionMethod->setAccessible(true);
        $this->assertEquals($expected, $reflectionMethod->invokeArgs($utility, [$string]));
    }
}
