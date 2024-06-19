<?php

namespace Tests;

class SurroundTest extends BaseStringSuite
{
    public function testSurround(): void
    {
        $this->assertSame('!!!Hello World!!!', $this->utility('Hello World')->surround('!!!')->value());
    }
}
