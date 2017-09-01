<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToSlugTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quick-brown-foo-bar', 'quick brown foo bar'],
            ['foo-bar-123', 'foo bar 123'],
            ['omg-its-a-fox-d', 'omg!!! its a fox =D'],
            ['', ':"{}~`'],
            ['lb', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Test that the string is transformed to the slug format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toSlug
     */
    public function testStringIsTransformedToTheSlugFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toSlug()->value());
    }
}
