<?php

namespace Tests;

class ToLowercaseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['helloworld foo bar', 'HelloWorld Foo Bar'],
            ['helloworld foo bar', 'HELLOWORLD FOO BAR'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedBeAllLowercase(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toLowercase()->value());
    }
}
