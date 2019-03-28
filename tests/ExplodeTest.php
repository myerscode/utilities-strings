<?php

namespace Tests;

/**
 * @coversDefaultClass \Myerscode\Utilities\Strings\Utility
 */
class ExplodeTest extends BaseStringSuite
{

    public function testExplode()
    {
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello, World')->explode(','));
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello,, World')->explode(','));
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello,,,,,,,,World')->explode(','));
    }
}