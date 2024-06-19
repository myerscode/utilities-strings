<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class EndsWithTest extends BaseStringSuite
{
    protected string $string = 'hello world. this is a unit test.';

    public static function __validData(): Iterator
    {
        yield [true, 'test.'];
        yield [true, 'test.', true];
        yield [true, 'test.', false];
        yield [false, 'TEST.', true];
        yield [true, 'TEST.', false];
        yield [false, 'foo'];
        yield [false, []];
        yield [false, [], true];
        yield [false, [], false];
        yield [false, ''];
        yield [false, '', true];
        yield [false, '', false];
        yield [true, ['quick', 'brown', 'TEST.']];
        yield [false, ['quick', 'brown', 'TEST.'], true];
        yield [true, ['quick', 'brown', 'TEST.'], false];
        yield [true, ['quick', 'brown', 'test.']];
        yield [true, ['quick', 'brown', 'test.'], true];
        yield [true, ['quick', 'brown', 'test.'], false];
        yield [false, ['quick', 'brown']];
        yield [false, ['quick', 'brown'], true];
        yield [false, ['quick', 'brown'], false];
    }


    #[DataProvider('__validData')]
    public function testStringEndsWithValue(bool $expected, string|array $endsWith, bool $strict = false): void
    {
        $this->assertEquals($expected, $this->utility($this->string)->endsWith($endsWith, $strict));
    }
}
