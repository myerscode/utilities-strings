<?php

namespace Tests;

class ToUppercaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['HELLOWORLD FOO BAR', 'HelloWorld Foo Bar'],
            ['HELLOWORLD FOO BAR', 'helloworld foo bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedBeAllUppercase($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toUppercase()->value());
    }
}
