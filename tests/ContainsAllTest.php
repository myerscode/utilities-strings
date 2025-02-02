<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ContainsAllTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, 'quick brown foo bar', 'foo'],
            [true, 'quick brown foo bar', ['bar', 'foo']],
            [false, 'quick brown fox', []],
            [false, 'quick brown fox', ''],
            [false, 'quick brown fox', ['fox', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
            [false, 'quick brown fox', ['foo', 'bar']],
            [false, 'quick brown fox', ['quick', 'brown'], 20],
            [false, 'quick brown fox', ['quick', 'brown'], 10],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringContainsAllOfTheGivenValues(bool $expected, string $string, string|array $charList, int $offset = 0): void
    {
        $this->assertEquals($expected, $this->utility($string)->containsAll($charList, $offset));
    }
}
