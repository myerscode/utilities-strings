<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToCamelCaseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['fooBar', 'foo bar'],
            ['quickBrownFox', 'Quick brown fox'],
            ['helloWorld', 'HELLO WORLD'],
            ['aSimpleSentence', 'A simple sentence.'],
            ['kebabCase', 'kebab-case'],
            ['snakeCaseWord', 'snake_case_word'],
            ['fooBar', 'FooBar'],
            ['fooBar', 'fooBar'],
            ['foobar', 'foobar'],
            ['fooBar', 'FOo BAr'],
        ];
    }

    /**
     * Test that a string is transformed to the camelCase format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toCamelCase
     */
    public function testStringIsTransformedToTheCamelCaseFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toCamelCase()->value());
    }
}
