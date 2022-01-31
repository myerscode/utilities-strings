<?php

namespace Tests;

class ContainsAnyTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, 'quick brown foo bar', 'foo'],
            [false, 'quick brown fox', ''],
            [false, 'quick brown fox', []],
            [true, 'quick brown foo bar', ['bar', 'foo']],
            [true, 'quick brown fox', ['fox', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
            [false, 'quick brown fox', ['quick', 'brown'], 20],
            [false, 'quick brown fox', ['quick', 'brown'], 10],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringContainsAnyOfTheGivenValues($expected, $string, $charList, int $offset = 0): void
    {
        $this->assertEquals($expected, $this->utility($string)->containsAny($charList, $offset));
    }
}
