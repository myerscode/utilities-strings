<?php

namespace Tests;

class SurroundTest extends BaseStringSuite
{
    public function testSurround(): void
    {
        $this->assertEquals('!!!Hello World!!!', $this->utility('Hello World')->surround('!!!')->value());
    }
}
