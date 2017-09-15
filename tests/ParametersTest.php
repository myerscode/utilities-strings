<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ParametersTest extends BaseStringSuite
{

    /**
     * Check that the parameters methods creates a collection of Utility objects
     *
     * @covers ::parameters
     */
    public function testExpectedResults()
    {
        $class = $this->utility('hello world');
        $reflection = new \ReflectionClass(get_class($class));
        $method = $reflection->getMethod('parameters');
        $method->setAccessible(true);

        $expected = [
            $this->utility('hello world'),
            $this->utility('foo bar'),
        ];

        $parameters = [
            'hello world',
            'foo bar',
        ];

        $this->assertEquals($expected, $method->invokeArgs($class, [$parameters]));
        $this->assertEquals([$this->utility('hello world')], $method->invokeArgs($class, ['hello world']));
        $this->assertEquals([], $method->invokeArgs($class, [[]]));
    }
}
