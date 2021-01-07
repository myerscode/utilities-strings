<?php

namespace Tests;

use Myerscode\Utilities\Strings\Exceptions\InvalidStringException;
use Myerscode\Utilities\Strings\Utility;

use Tests\Support\StringConstructorTestCase;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ConstructTest extends BaseStringSuite
{
    public function validDataProvider()
    {
        return [
            ['hello world', 'hello world'],
            ['123', 123],
            ['1', true],
            ['0', false],
            ['', null],
            ['StringConstructorTestCase::class', new StringConstructorTestCase()],
            ['Hello World', new Utility('Hello World')],
        ];
    }

    public function invalidDataProvider()
    {
        return [
            [new \stdClass()],
            [[]],
        ];
    }

    /**
     * Test that the constructor takes values that can be used as string and sets them internally
     *
     * @param string $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     *
     * @dataProvider validDataProvider
     * @covers ::__construct
     */
    public function testStringIsSetViaConstructor($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->value());
    }

    /**
     * Test that the constructor does not accept invalid values
     *
     * @param string $string The value to pass to the utility
     *
     * @dataProvider invalidDataProvider
     * @covers ::__construct
     */
    public function testConstructorDoesNotTakeInvalidValues($string)
    {
        $this->expectException(InvalidStringException::class);
        $this->utility($string);
    }
}
