<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToNumericTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', 'quick brown foo bar'],
            ['123', 'foobar123'],
            ['1234567890', '1234567890'],
            ['', 'omg!!! it\'s a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    /**
     * Test that the string is transformed to only contain numeric values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toNumeric
     */
    public function testStringIsTransformedToContainOnlyNumericValues($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toNumeric()->value());
    }
}
