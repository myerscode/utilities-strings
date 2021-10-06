<?php

namespace Tests;

class MatchesTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['Hello World', '/Hello World/', true],
            ['Hello=World', '/(.+)=(.+)/', true],
            ['foobar', '/(.+)=(.+)/', false],
            ['£77.49p', '/^[a-z0-9\s]*$/i', false],
        ];
    }

    /**
     * Test that the string can be matched to regular expressions
     *
     * @param  string  $string  The string to check
     * @param  string  $pattern  Regex pattern to check for
     * @param  bool  $expected  The value expected to be returned
     *
     * @dataProvider dataProvider
     * @covers ::matches
     */
    public function testStringIsTransformedToTheTitleCaseFormat(string $string, $pattern, bool $expected)
    {
        $this->assertEquals($expected, $this->utility($string)->matches($pattern));
    }
}
