<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToUppercaseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['HELLOWORLD FOO BAR', 'HelloWorld Foo Bar'],
            ['HELLOWORLD FOO BAR', 'helloworld foo bar'],
        ];
    }

    /**
     * Test that the string is transformed to be all uppercase
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toUppercase
     */
    public function testStringIsTransformedBeAllUppercase($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toUppercase()->value());
    }
}
