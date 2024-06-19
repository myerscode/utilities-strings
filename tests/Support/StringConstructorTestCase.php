<?php

namespace Tests\Support;

use Override;
use Stringable;

class StringConstructorTestCase implements Stringable
{
    #[Override]
    public function __toString(): string
    {
        return 'StringConstructorTestCase::class';
    }
}
