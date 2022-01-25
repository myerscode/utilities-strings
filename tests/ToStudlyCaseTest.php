<?php

namespace Tests;

class ToStudlyCaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [

            ['FooBar', 'fooBar'],
            ['FooBar', 'foo-Bar'],
            ['FooBar', '   foo bar    '],
            ['Bar', ' bar'],
            ['FooBar', 'foo bar'],
            ['FooBar', 'foo -bar'],
            ['FooBar', '-foo - bar'],
            ['FooBar', 'foo_bar'],
            ['FooCFoo', '  foo c foo'],
            ['FooUBar', 'fooUBar'],
            ['FooCCBar', 'fooCCBar'],
            ['StringWith1Number', 'string_with1number'],
            ['StringWith22Numbers', 'String-with_2_2 numbers'],
            ['1Foo2Bar', '1foo2bar'],
            ['QuickBrownFox', 'quickBrownFox'],
            ['FooΣase', 'foo Σase'],
            ['ΣτανιλFooBar', 'Στανιλ foo bar'],
            ['ΣashBar', 'Σash  Bar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToTheStudlyCaseFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toStudlyCase()->value());
    }
}
