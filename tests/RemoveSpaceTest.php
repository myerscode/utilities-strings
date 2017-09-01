<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class RemoveSpaceTest extends BaseStringSuite
{
    /**
     * Check a value has spaces removed
     *
     * @covers ::removeSpace
     */
    public function testTextHasSpacesRemoved()
    {
        $original = 'hello world.     quick
        
        
        brown 
        
               fox.
                                            foo
                                            
                                            
                                            bar
        ';

        $expected = 'helloworld.quickbrownfox.foobar';

        $this->assertEquals($expected, $this->utility($original)->removeSpace()->value());
    }
}
