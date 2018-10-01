<?php

namespace Tests;

/**
 * @coversDefaultClass \Myerscode\Utilities\Strings\Utility
 */
class AtTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['f', 'foo bar', 0],
            ['o', 'foo bar', 1],
            ['b', 'foo bar', 4],
            ['r', 'foo bar', 6],
            ['', 'foo bar', 7],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testAtMethod($expected, $string, $position)
    {
        $this->assertEquals($expected, $this->utility($string)->at($position));
    }

}