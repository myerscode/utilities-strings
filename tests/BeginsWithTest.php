<?php

namespace Tests;

class BeginsWithTest extends BaseStringSuite
{
    protected $string = 'hello world. this is a unit test.';

    public function __validData(): array
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
     * @dataProvider __validData
     */
    public function testStringBeingsWithValue($expected, $beginsWith, $strict = false): void
    {
        $this->assertEquals($expected, $this->utility($this->string)->beginsWith($beginsWith, $strict));
    }
}
