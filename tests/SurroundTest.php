<?php

namespace Tests;

/**
 * @coversDefaultClass \Myerscode\Utilities\Strings\Utility
 */
class SurroundTest extends BaseStringSuite
{

    public function testSurround()
    {
        $this->assertEquals('!!!Hello World!!!', $this->utility('Hello World')->surround('!!!')->value());
    }
}