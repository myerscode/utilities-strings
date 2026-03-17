<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ReverseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['raboof', 'foobar'];
        yield ['rab oof', 'foo bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsRevered(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->reverse()->value());
    }
}
