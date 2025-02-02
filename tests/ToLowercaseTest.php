<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToLowercaseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['helloworld foo bar', 'HelloWorld Foo Bar'],
            ['helloworld foo bar', 'HELLOWORLD FOO BAR'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedBeAllLowercase(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toLowercase()->value());
    }
}
