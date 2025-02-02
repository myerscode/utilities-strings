<?php

namespace Tests;

class ToCamelCaseTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedToTheCamelCaseFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toCamelCase()->value());
    }
}
