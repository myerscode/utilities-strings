<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ContainsAllTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            [true, 'quick brown foo bar', 'foo'],
            [true, 'quick brown foo bar', ['bar', 'foo']],
            [false, 'quick brown fox', ['fox', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
        ];
    }

    /**
     * Check that a string contains all of the given values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $charList The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::containsAll
     */
    public function testStringContainsAllOfTheGivenValues($expected, $string, $charList)
    {
        $this->assertEquals($expected, $this->utility($string)->containsAll($charList));
    }
}
