<?php

namespace Tests;

class ToUppercaseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['HELLOWORLD FOO BAR', 'HelloWorld Foo Bar'],
            ['HELLOWORLD FOO BAR', 'helloworld foo bar'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedBeAllUppercase(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toUppercase()->value());
    }
}
