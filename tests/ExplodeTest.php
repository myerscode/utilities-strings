<?php

declare(strict_types=1);

namespace Tests;

final class ExplodeTest extends BaseStringSuite
{
    public function testExplode(): void
    {
        $this->assertSame(['Hello', 'World'], $this->utility('Hello, World')->explode(','));
        $this->assertSame(['Hello', 'World'], $this->utility('Hello,, World')->explode(','));
        $this->assertSame(['Hello', 'World'], $this->utility('Hello,,,,,,,,World')->explode(','));
    }
}
