<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToStudlyCaseTest extends BaseStringSuite
{

    public function dataProvider()
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
     * Test that the string is transformed to the StudlyCase format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toStudlyCase
     */
    public function testStringIsTransformedToTheStudlyCaseFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toStudlyCase()->value());
    }
}
