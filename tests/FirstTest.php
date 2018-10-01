<?php

namespace Tests;

/**
 * @coversDefaultClass \Myerscode\Utilities\Strings\Utility
 */
class FirstTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', 'foo bar', 0],
            ['foo', 'foo bar', 3],
            ['f', 'foo bar', 1],
            ['', 'foo bar', -4],
            ['foo', 'foo', 8],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testFirstMethod($expected, $string, $length = null)
    {
        $this->assertEquals($expected, $this->utility($string)->first($length)->value());
    }
}