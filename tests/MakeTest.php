<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;

use Tests\Support\StringConstructorTestCase;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class MakeTest extends BaseStringSuite
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
     * Test the value assigned to the utility via make static constructor
     *
     * @param string $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     *
     * @dataProvider validDataProvider
     * @covers ::make
     */
    public function testValueSetViaMake($expected, $string)
    {
        $this->assertEquals($expected, Utility::make($string)->value());
    }

    /**
     * Test that the constructor does not accept invalid values
     *
     * @param string $string The value to pass to the utility
     *
     * @dataProvider invalidDataProvider
     * @expectedException \Myerscode\Utilities\Strings\Exceptions\InvalidStringException
     * @covers ::make
     */
    public function testMakeDoesNotTakeInvalidValues($string)
    {
        Utility::make($string);
    }
}
