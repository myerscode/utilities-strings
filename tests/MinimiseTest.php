<?php

namespace Tests;

class MinimiseTest extends BaseStringSuite
{
    public function testTextGetsMinimised(): void
    {
        $original = 'hello world.     quick
        
        
        brown 
        
               fox.
                        <select><option>foobar</option></select>
                                            
        ';

        $expected = 'hello world. quick brown fox. <select><option>foobar</select>';

        $this->assertSame($expected, $this->utility($original)->minimise()->value());
    }
}
