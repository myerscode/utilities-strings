<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class OccurrencesTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['hello world. foo bar. food. foo bar. hello world.', 'foo', [13, 22, 28]],
        ];
    }

    #[DataProvider('__validData')]
    public function testCorrectLocationsOfOccurrencesAreFound(string $string, string $find, array $occurrences): void
    {
        $this->assertEquals($occurrences, $this->utility($string)->occurrences($find));
    }
}
