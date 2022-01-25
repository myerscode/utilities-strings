<?php

namespace Tests;

use ReflectionClass;

class ParametersTest extends BaseStringSuite
{
    public function testExpectedResults(): void
    {
        $class = $this->utility('hello world');
        $reflectionClass = new ReflectionClass($class::class);
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

        $this->assertEquals($expected, $reflectionMethod->invokeArgs($class, [$parameters]));
        $this->assertEquals([$this->utility('hello world')], $reflectionMethod->invokeArgs($class, ['hello world']));
        $this->assertEquals([], $reflectionMethod->invokeArgs($class, [[]]));
    }
}
