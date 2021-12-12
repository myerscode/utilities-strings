<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemoveFromEndTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', '', ''],
            ['foo', 'foobar', 'bar'],
            ['foobar', 'foobarbar',  'bar'],
            ['foo', 'foo.bar',  '.bar'],
            ['foo.', 'foo..bar',  '.bar'],
            ['foobar', 'foobar', 'foo'],
        ];
    }

    /**
     * Test that given occurrences in the string are removed
     *
     * @param string $expected The value expected to be returned
     * @param string $value The string to strip values from
     * @param string $remove The value to remove
     * @dataProvider dataProvider
     * @covers ::removeFromEnd
     */
    public function testStringHasValuesRemoved($expected, $value, $remove)
    {
        $this->assertEquals($expected, $this->utility($value)->removeFromEnd($remove)->value());
    }
}
