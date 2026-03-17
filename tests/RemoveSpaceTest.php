<?php

declare(strict_types=1);

namespace Tests;

final class RemoveSpaceTest extends BaseStringSuite
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
