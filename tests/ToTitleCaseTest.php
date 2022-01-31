<?php

namespace Tests;

class ToTitleCaseTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['Quickbrown Foobar', 'QuickBrown fooBar'],
            ['Quick Brown Foo Bar', 'Quick brown foo bar'],
            ['Quick Brown Foo Bar.', 'Quick brown foo bar.'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToTheTitleCaseFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toTitleCase()->value());
    }
}
