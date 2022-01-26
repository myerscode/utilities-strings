<?php

namespace Tests;

class EndsWithTest extends BaseStringSuite
{
    protected string $string = 'hello world. this is a unit test.';

    public function __validData(): array
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
     * @dataProvider __validData
     */
    public function testStringEndsWithValue($expected, $endsWith, $strict = false): void
    {
        $this->assertEquals($expected, $this->utility($this->string)->endsWith($endsWith, $strict));
    }
}
