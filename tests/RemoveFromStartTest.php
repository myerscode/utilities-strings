<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemoveFromStartTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', '', ''],
            ['bar', 'foobar', 'foo'],
            ['foobar', 'foofoobar',  'foo'],
            ['foofoobar', 'foofoobar',  'bar'],
            ['bar', 'foo.bar',  'foo.'],
            ['.bar', 'foo..bar',  'foo.'],
            ['foobar', 'foobar', 'bar'],
        ];
    }

    /**
     * Test that given occurrences in the string are removed
     *
     * @param string $expected The value expected to be returned
     * @param string $value The string to strip values from
     * @param string $remove The value to remove
     * @dataProvider dataProvider
     * @covers ::removeFromStart
     */
    public function testStringHasValuesRemoved($expected, $value, $remove)
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromStart($remove)->value());
    }
}
