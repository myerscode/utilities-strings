<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\TestCase;

abstract class BaseStringSuite extends TestCase
{

    /**
     * Get the utility being tested
     *
     * @param $string
     * @param $encoding
     * @return Utility
     */
    public function utility($string, $encoding = null)
    {
        return new Utility($string, $encoding);
    }
}
