<?php

namespace Tests;



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
            [false, 'quick brown fox', []],
            [false, 'quick brown fox', ''],
            [false, 'quick brown fox', ['fox', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
            [false, 'quick brown fox', ['quick', 'brown'], 20],
            [false, 'quick brown fox', ['quick', 'brown'], 10],
        ];
    }

    /**
     * Check that a string contains all of the given values
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @param string $charList The value to pass to the utility
     * @param int $offset The offset value for strpos
     * @dataProvider dataProvider
     * @covers ::containsAll
     */
    public function testStringContainsAllOfTheGivenValues($expected, $string, $charList, int $offset = 0)
    {
        $this->assertEquals($expected, $this->utility($string)->containsAll($charList, $offset));
    }
}
