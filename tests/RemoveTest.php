<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemoveTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', '', ''],
            ['foo', 'foobar', 'bar'],
            ['foo', 'foobar', ['bar']],
            ['', 'foobar', ['foo', 'bar']],
            ['foofoo', 'foobarfoobar', 'bar'],
            ['foofoo', 'foobarfoobar', ['bar']],
        ];
    }

    /**
     * Test that given occurrences in the string are removed
     *
     * @param string $expected The value expected to be returned
     * @param string $value The string to strip values from
     * @param string $remove The value to remove
     * @dataProvider dataProvider
     * @covers ::remove
     */
    public function testStringHasValuesRemoved($expected, $value, $remove)
    {
        $this->assertEquals($expected, $this->utility($value)->remove($remove)->value());
    }
}
