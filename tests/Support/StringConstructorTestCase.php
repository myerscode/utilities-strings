<?php

namespace Tests\Support;

use Stringable;

class StringConstructorTestCase implements Stringable
{
    public function __toString(): string
    {
        return 'StringConstructorTestCase::class';
    }
}
