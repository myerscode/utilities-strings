<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class LengthTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            [6, 'foobar'],
            [1, '0'],
            [0, ''],
        ];
    }

    /**
     * Test that the utility returns the correct string length
     *
     * @param number $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::length
     */
    public function testGetCorrectStringLength($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->length());
    }
}
