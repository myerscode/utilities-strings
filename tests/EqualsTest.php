<?php

namespace Tests;

/**
 * @coversDefaultClass \Myerscode\Utilities\Strings\Utility
 */
class EqualsTest extends BaseStringSuite
{

    public function testEquals()
    {
        $this->assertEquals(true, $this->utility('Hello World')->equals('Hello World'));
        $this->assertEquals(false, $this->utility('hello world')->equals('Hello World'));
    }
}