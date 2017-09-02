<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ApplyPaddingTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['foo bar', 'foo bar', 0],
            ['  foo bar', 'foo bar', 2],
            ['foo bar  ', 'foo bar', 0, 2],
            ['  foo bar  ', 'foo bar', 2, 2],
        ];
    }

    /**
     * Test that the string is padded on both sides until it is the given length
     *
     * @param string $expected The value expected to be returned
     * @param string $string The value to pass to the utility
     * @param int $left The value to ensure value begins with
     * @param int $right The value to ensure value begins with
     * @param string $padding The value to ensure value begins with
     * @dataProvider dataProvider
     * @covers ::applyPadding
     */
    public function testStringIsPaddedOnBothSides($expected, $string, $left = 0, $right = 0, $padding = ' ')
    {
        $class = $this->utility($string);
        $reflection = new \ReflectionClass(get_class($class));
        $method = $reflection->getMethod('applyPadding');
        $method->setAccessible(true);
        $this->assertEquals($expected, $method->invokeArgs($class, [$left, $right, $padding])->value());
    }
}
