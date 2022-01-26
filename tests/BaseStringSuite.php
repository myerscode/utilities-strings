<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\TestCase;

abstract class BaseStringSuite extends TestCase
{
    public function utility($string, $encoding = null): Utility
    {
        return new Utility($string, $encoding);
    }
}
