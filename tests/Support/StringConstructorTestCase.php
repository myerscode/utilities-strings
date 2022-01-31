<?php

namespace Tests\Support;

class StringConstructorTestCase
{
    public function __toString(): string
    {
        return 'StringConstructorTestCase::class';
    }
}
