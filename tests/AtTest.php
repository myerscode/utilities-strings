<?php

namespace Tests;

use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\CoversClass;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
#[CoversClass(Utility::class)]
class AtTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['f', 'foo bar', 0];
        yield ['o', 'foo bar', 1];
        yield ['b', 'foo bar', 4];
        yield ['r', 'foo bar', 6];
        yield ['', 'foo bar', 7];
        yield ['', 'foo bar', -7];
    }

    #[DataProvider('__validData')]
    public function testAtMethod(string $expected, string $string, int $position): void
    {
        $this->assertSame($expected, (string)$this->utility($string)->at($position));
    }
}
