<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class BeginsWithTest extends BaseStringSuite
{
    protected string $string = 'hello world. this is a unit test.';

    public static function __validData(): Iterator
    {
        yield [true, 'hello'];
        yield [true, 'hello', true];
        yield [true, 'hello', false];
        yield [false, 'HELLO', true];
        yield [true, 'HELLO', false];
        yield [false, 'foo'];
        yield [false, []];
        yield [false, [], true];
        yield [false, [], false];
        yield [false, ''];
        yield [false, '', true];
        yield [false, '', false];
        yield [true, ['quick', 'brown', 'HELLO']];
        yield [false, ['quick', 'brown', 'HELLO'], true];
        yield [true, ['quick', 'brown', 'HELLO'], false];
        yield [true, ['quick', 'brown', 'hello']];
        yield [true, ['quick', 'brown', 'hello'], true];
        yield [true, ['quick', 'brown', 'hello'], false];
        yield [false, ['quick', 'brown']];
        yield [false, ['quick', 'brown'], true];
        yield [false, ['quick', 'brown'], false];
    }


    #[DataProvider('__validData')]
    public function testStringBeingsWithValue(bool $expected, string|array $beginsWith, bool $strict = false): void
    {
        $this->assertEquals($expected, $this->utility($this->string)->beginsWith($beginsWith, $strict));
    }
}
