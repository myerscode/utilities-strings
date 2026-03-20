<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class OccurrencesTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hello world. foo bar. food. foo bar. hello world.', 'foo', [13, 22, 28]];
        yield ['aaa', 'a', [0, 1, 2]];
        yield ['hello world', 'xyz', []];
        yield ['', 'foo', []];
        yield ['abcabc', 'abc', [0, 3]];
    }

    #[DataProvider('__validData')]
    public function testCorrectLocationsOfOccurrencesAreFound(string $string, string $find, array $occurrences): void
    {
        $this->assertSame($occurrences, $this->utility($string)->occurrences($find));
    }
}
