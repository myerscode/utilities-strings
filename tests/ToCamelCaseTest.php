<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToCamelCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['fooBar', 'foo bar'];
        yield ['quickBrownFox', 'Quick brown fox'];
        yield ['helloWorld', 'HELLO WORLD'];
        yield ['aSimpleSentence', 'A simple sentence.'];
        yield ['kebabCase', 'kebab-case'];
        yield ['snakeCaseWord', 'snake_case_word'];
        yield ['fooBar', 'FooBar'];
        yield ['fooBar', 'fooBar'];
        yield ['foobar', 'foobar'];
        yield ['fooBar', 'FOo BAr'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheCamelCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toCamelCase()->value());
    }
}
