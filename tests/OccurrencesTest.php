<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class OccurrencesTest extends BaseStringSuite
{


    public function dataProvider()
    {
        return [
            ['hello world. foo bar. food. foo bar. hello world.', 'foo', [13, 22, 28]],
        ];
    }

    /**
     * Check that correct starting positions of string occurrences are returned
     *
     * @param $string
     * @param $find
     * @param $occurrences
     * @dataProvider dataProvider
     * @covers ::occurrences
     */
    public function testCorrectLocationsOfOccurrencesAreFound($string, $find, $occurrences)
    {
        $this->assertEquals($occurrences, $this->utility($string)->occurrences($find));
    }
}
