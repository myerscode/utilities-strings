<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\TestCase;

abstract class BaseStringSuite extends TestCase
{

    /**
     * Get the utility being tested
     *
     * @param $config
     * @param $encoding
     * @return Utility
     */
    public function utility($config, $encoding = null)
    {
        return new Utility($config, $encoding);
    }
}
