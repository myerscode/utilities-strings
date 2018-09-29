<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class IsJsonTest extends BaseStringSuite
{
    public function dataProvider()
    {
        return [
            [true, json_encode(['foo' => 'bar'])],
            [false, 'foobar'],
        ];
    }

    /**
     * Test if the string is valid JSON
     *
     * @param number $expected The value expected to be returned
     * @param number $string The value to pass to the utility
     * @dataProvider dataProvider
     * @covers ::isJson
     */
    public function testIsTheStringValidJson($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->isJson());
    }
}
