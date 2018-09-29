<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class LimitTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['Hello', 'Hello World', 5],
            ['Hello World', 'Hello World', 50],
            ['', 'Hello World', 0],
        ];
    }

    /**
     * Test that the string is transformed to the Title Case format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param int $length Length the string should be
     * @dataProvider dataProvider
     * @covers ::limit
     */
    public function testStringIsTransformedToTheTitleCaseFormat($expected, $string, $length)
    {
        $this->assertEquals($expected, $this->utility($string)->limit($length)->value());
    }
}
