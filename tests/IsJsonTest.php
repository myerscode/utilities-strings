<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsJsonTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, json_encode(['foo' => 'bar'])];
        yield [false, 'foobar'];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringValidJson(bool $expected, bool|string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isJson());
    }
}
