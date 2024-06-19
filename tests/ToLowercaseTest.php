<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToLowercaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['helloworld foo bar', 'HelloWorld Foo Bar'];
        yield ['helloworld foo bar', 'HELLOWORLD FOO BAR'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedBeAllLowercase(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toLowercase()->value());
    }
}
