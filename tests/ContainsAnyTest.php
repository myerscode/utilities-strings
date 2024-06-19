<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ContainsAnyTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'quick brown foo bar', 'foo'];
        yield [false, 'quick brown fox', ''];
        yield [false, 'quick brown fox', []];
        yield [true, 'quick brown foo bar', ['bar', 'foo']];
        yield [true, 'quick brown fox', ['fox', 'bar']];
        yield [false, 'quick brown fox', ['foo', 'bar']];
        yield [false, 'quick brown fox', ['quick', 'brown'], 20];
        yield [false, 'quick brown fox', ['quick', 'brown'], 10];
    }

    #[DataProvider('__validData')]
    public function testStringContainsAnyOfTheGivenValues(bool $expected, string $string, string|array $charList, int $offset = 0): void
    {
        $this->assertEquals($expected, $this->utility($string)->containsAny($charList, $offset));
    }
}
