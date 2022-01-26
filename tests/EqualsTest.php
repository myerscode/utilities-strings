<?php

namespace Tests;

class EqualsTest extends BaseStringSuite
{
    public function testEquals(): void
    {
        $this->assertEquals(true, $this->utility('Hello World')->equals('Hello World'));
        $this->assertEquals(false, $this->utility('hello world')->equals('Hello World'));
    }
}
