<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversFunction;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
#[CoversFunction('toPascalCase')]
class ToPascalCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['FooBar', 'foo bar'];
        yield ['QuickBrownFox', 'Quick brown fox'];
        yield ['HelloWorld', 'HELLO WORLD'];
        yield ['ASimpleSentence', 'A simple sentence.'];
        yield ['KebabCase', 'kebab-case'];
        yield ['SnakeCaseWord', 'snake_case_word'];
        yield ['FooBar', 'FooBar'];
        yield ['FooBar', 'fooBar'];
        yield ['Foobar', 'foobar'];
        yield ['FooBar', 'FOo BAr'];
    }

    /**
     * Test that the string is transformed to the PascalCase format
     *
     * @param  string  $expected  The value expected to be returned
     * @param  string  $string  The string to strip values from
     */
    #[DataProvider('__validData')]
    public function testStringIsTransformedToThePascalCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toPascalCase()->value());
    }
}
