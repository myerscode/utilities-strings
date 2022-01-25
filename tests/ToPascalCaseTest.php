<?php

namespace Tests;

class ToPascalCaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['FooBar', 'foo bar'],
            ['QuickBrownFox', 'Quick brown fox'],
            ['HelloWorld', 'HELLO WORLD'],
            ['ASimpleSentence', 'A simple sentence.'],
            ['KebabCase', 'kebab-case'],
            ['SnakeCaseWord', 'snake_case_word'],
            ['FooBar', 'FooBar'],
            ['FooBar', 'fooBar'],
            ['Foobar', 'foobar'],
            ['FooBar', 'FOo BAr'],
        ];
    }

    /**
     * Test that the string is transformed to the PascalCase format
     *
     * @param  string  $expected  The value expected to be returned
     * @param  string  $string  The string to strip values from
     *
     * @dataProvider __validData
     * @covers ::toPascalCase
     */
    public function testStringIsTransformedToThePascalCaseFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toPascalCase()->value());
    }
}
