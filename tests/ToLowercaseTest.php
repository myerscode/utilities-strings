<?php

namespace Tests;

class ToLowercaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['helloworld foo bar', 'HelloWorld Foo Bar'],
            ['helloworld foo bar', 'HELLOWORLD FOO BAR'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedBeAllLowercase($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toLowercase()->value());
    }
}
