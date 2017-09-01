<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class MinimiseTest extends BaseStringSuite
{
    /**
     * Check a value is cleaned
     * @covers ::minimise
     */
    public function testTextGetsMinimised()
    {
        $original = 'hello world.     quick
        
        
        brown 
        
               fox.
                        <select><option>foobar</option></select>
                                            
        ';

        $expected = 'hello world. quick brown fox. <select><option>foobar</select>';

        $this->assertEquals($expected, $this->utility($original)->minimise()->value());
    }
}
