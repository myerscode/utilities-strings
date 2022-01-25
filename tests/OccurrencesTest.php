<?php

namespace Tests;

class OccurrencesTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['hello world. foo bar. food. foo bar. hello world.', 'foo', [13, 22, 28]],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testCorrectLocationsOfOccurrencesAreFound($string, $find, $occurrences): void
    {
        $this->assertEquals($occurrences, $this->utility($string)->occurrences($find));
    }
}
