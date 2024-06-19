<?php

namespace Tests;

use ReflectionClass;

class ParametersTest extends BaseStringSuite
{
    public function testExpectedResults(): void
    {
        $utility = $this->utility('hello world');
        $reflectionClass = new ReflectionClass($utility::class);
        $reflectionMethod = $reflectionClass->getMethod('parameters');
        $reflectionMethod->setAccessible(true);

        $expected = [
            $this->utility('hello world'),
            $this->utility('foo bar'),
        ];

        $parameters = [
            'hello world',
            'foo bar',
        ];

        $this->assertEquals($expected, $reflectionMethod->invokeArgs($utility, [$parameters]));
        $this->assertEquals([$this->utility('hello world')], $reflectionMethod->invokeArgs($utility, ['hello world']));
        $this->assertSame([], $reflectionMethod->invokeArgs($utility, [[]]));
    }
}
