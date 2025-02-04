<?php

namespace Tests;

class RemoveSpaceTest extends BaseStringSuite
{
    public function testTextHasSpacesRemoved(): void
    {
        $original = 'hello world.     quick
        
        
        brown 
        
               fox.
                                            foo
                                            
                                            
                                            bar
        ';

        $expected = 'helloworld.quickbrownfox.foobar';

        $this->assertSame($expected, $this->utility($original)->removeSpace()->value());
    }
}
