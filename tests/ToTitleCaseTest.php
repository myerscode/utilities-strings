<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToTitleCaseTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['Quickbrown Foobar', 'QuickBrown fooBar'],
            ['Quick Brown Foo Bar', 'Quick brown foo bar'],
            ['Quick Brown Foo Bar.', 'Quick brown foo bar.'],
        ];
    }

    /**
     * Test that the string is transformed to the Title Case format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toTitleCase
     */
    public function testStringIsTransformedToTheTitleCaseFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toTitleCase()->value());
    }
}
