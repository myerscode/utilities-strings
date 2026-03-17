<?php

declare(strict_types=1);

namespace Tests;

final class SurroundTest extends BaseStringSuite
{
    public function testSurround(): void
    {
        $this->assertSame('!!!Hello World!!!', $this->utility('Hello World')->surround('!!!')->value());
    }
}
