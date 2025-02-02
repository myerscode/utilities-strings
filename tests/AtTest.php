<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Utility::class)]
class AtTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['f', 'foo bar', 0],
            ['o', 'foo bar', 1],
            ['b', 'foo bar', 4],
            ['r', 'foo bar', 6],
            ['', 'foo bar', 7],
            ['', 'foo bar', -7],
        ];
    }

    #[DataProvider('__validData')]
    public function testAtMethod(string $expected, string $string, int $position): void
    {
        $this->assertEquals($expected, $this->utility($string)->at($position));
    }
}
