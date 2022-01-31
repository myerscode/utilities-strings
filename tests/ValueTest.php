<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use Tests\Support\StringConstructorTestCase;

class ValueTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            'string' => ['hello world', 'hello world'],
            'number' => ['123', 123],
            'true' => ['1', true],
            'false' => ['0', false],
            'class with __toString()' => ['StringConstructorTestCase::class', new StringConstructorTestCase()],
            'Utility' => ['Hello World', new Utility('Hello World')],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testGetValue($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->value());
    }

    /**
     * @dataProvider __validData
     */
    public function testToString($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->__toString());
    }
}
