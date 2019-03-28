<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ReplaceTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['', '', '', ''],
            ['foofoo', 'foobar', 'bar', 'foo'],
            ['foo', 'foobar', 'bar', ''],
            ['foo', 'foobar', 'bar', null],
            ['foofoo', 'foobar', ['bar'], 'foo'],
            ['hellohello', 'foobar', ['foo', 'bar'], 'hello'],
            ['foofoofoofoo', 'foobarfoobar', 'bar', 'foo'],
            ['foofoofoofoo', 'foobarfoobar', ['bar'], 'foo'],
            ['foodotbar', 'foo.bar', '.', 'dot'],
        ];
    }

    /**
     * Test that given occurrences in a string are replaced with the given value
     *
     * @param string $expected The value expected to be returned
     * @param string $value The string to strip values from
     * @param string $replace The value to replace
     * @param string $with The value to replace with
     * @dataProvider dataProvider
     * @covers ::replace
     */
    public function testValuesAreReplaced($expected, $value, $replace, $with)
    {
        $this->assertEquals($expected, $this->utility($value)->replace($replace, $with)->value());
    }
}
