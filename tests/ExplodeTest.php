<?php

namespace Tests;

class ExplodeTest extends BaseStringSuite
{
    public function testExplode(): void
    {
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello, World')->explode(','));
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello,, World')->explode(','));
        $this->assertEquals(['Hello', 'World'], $this->utility('Hello,,,,,,,,World')->explode(','));
    }
}
