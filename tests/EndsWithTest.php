<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class EndsWithTest extends BaseStringSuite
{
    protected $string = 'hello world. this is a unit test.';

    public function dataProvider()
    {
        return [
            [true, 'test.'],
            [true, 'test.', true],
            [true, 'test.', false],
            [false, 'TEST.', true],
            [true, 'TEST.', false],
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
            [true, ['quick', 'brown', 'TEST.']],
            [false, ['quick', 'brown', 'TEST.'], true],
            [true, ['quick', 'brown', 'TEST.'], false],
            [true, ['quick', 'brown', 'test.']],
            [true, ['quick', 'brown', 'test.'], true],
            [true, ['quick', 'brown', 'test.'], false],
            [false, ['quick', 'brown']],
            [false, ['quick', 'brown'], true],
            [false, ['quick', 'brown'], false],
        ];
    }


    /**
     * Test to see if the string ends with a given value
     *
     * @param $expected
     * @param $endsWith
     * @param bool $strict
     * @dataProvider dataProvider
     * @covers ::endsWith
     */
    public function testStringEndsWithValue($expected, $endsWith, $strict = false)
    {
        $this->assertEquals($expected, $this->utility($this->string)->endsWith($endsWith, $strict));
    }
}
