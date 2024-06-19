<?php

namespace Tests;

class ExplodeTest extends BaseStringSuite
{
    public function testExplode(): void
    {
        $this->assertSame(['Hello', 'World'], $this->utility('Hello, World')->explode(','));
        $this->assertSame(['Hello', 'World'], $this->utility('Hello,, World')->explode(','));
        $this->assertSame(['Hello', 'World'], $this->utility('Hello,,,,,,,,World')->explode(','));
    }
}
