<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class BeginsWithTest extends BaseStringSuite
{
    protected $string = 'hello world. this is a unit test.';

    public function dataProvider()
    {
        return [
            [true, 'hello'],
            [true, 'hello', true],
            [true, 'hello', false],
            [false, 'HELLO', true],
            [true, 'HELLO', false],
            [false, 'foo'],
            [false, []],
            [false, [], true],
            [false, [], false],
            [false, ''],
            [false, '', true],
            [false, '', false],
            [false, null],
            [false, null, true],
            [false, null, false],
            [true, ['quick', 'brown', 'HELLO']],
            [false, ['quick', 'brown', 'HELLO'], true],
            [true, ['quick', 'brown', 'HELLO'], false],
            [true, ['quick', 'brown', 'hello']],
            [true, ['quick', 'brown', 'hello'], true],
            [true, ['quick', 'brown', 'hello'], false],
            [false, ['quick', 'brown']],
            [false, ['quick', 'brown'], true],
            [false, ['quick', 'brown'], false],
        ];
    }


    /**
     * Test to see if the string begins with a given value
     *
     * @param $expected
     * @param $beginsWith
     * @param bool $strict
     * @dataProvider dataProvider
     * @covers ::beginsWith
     */
    public function testStringBeingsWithValue($expected, $beginsWith, $strict = false)
    {
        $this->assertEquals($expected, $this->utility($this->string)->beginsWith($beginsWith, $strict));
    }
}
