<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class IsTrueTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, 'true'],
            [true, '1'],
            [true, 'on'],
            [true, 'yes'],
            [true, 'ok'],
            [false, 'tr'],
            [false, 'tick'],
            [false, 'foobar'],
            [false, ''],
        ];
    }

    #[DataProvider('__validData')]
    public function testIsTrueReturnsTrue(bool $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isTrue());
    }
}
