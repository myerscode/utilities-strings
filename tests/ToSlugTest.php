<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToSlugTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['quick-brown-foo-bar', 'quick brown foo bar'],
            ['hello-world', 'HELLO WORLD'],
            ['foo-bar-123', 'foo bar 123'],
            ['omg-its-a-fox-d', 'omg!!! its a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['extra-dashes', 'extra--dashes---'],
            ['lim-duls-high-guard', 'Lim-Dûl\'s High Guard'],
            ['aether-vial', 'Æther Vial'],
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

    /**
     * Test that the toSlug correctly slugifies with a custom separator
     */
    public function testSlugIsMadeWithCustomSeparator()
    {
        $this->assertEquals('hello~world', $this->utility('hello world')->toSlug('~')->value());
        $this->assertEquals('hello~world', $this->utility('hello-world')->toSlug('~')->value());
        $this->assertEquals('hello_world', $this->utility('hello___world')->toSlug('_')->value());
        $this->assertEquals('hello-_-world', $this->utility('hello world')->toSlug('-_-')->value());
        $this->assertEquals('hello-_-world', $this->utility('hello_- world')->toSlug('-_-')->value());
    }
}
