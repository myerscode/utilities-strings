<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToLowercaseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['helloworld foo bar', 'HelloWorld Foo Bar'],
            ['helloworld foo bar', 'HELLOWORLD FOO BAR'],
        ];
    }

    /**
     * Test that the string is transformed to be all lowercase
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toLowercase
     */
    public function testStringIsTransformedBeAllLowercase($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toLowercase()->value());
    }
}
