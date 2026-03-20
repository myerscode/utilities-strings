<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsJsonTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, json_encode(['foo' => 'bar'])];
        yield [false, 'foobar'];
        yield [true, '[]'];
        yield [true, '{}'];
        yield [true, '"hello"'];
        yield [true, '123'];
        yield [true, 'null'];
        yield [false, ''];
        yield [false, '{invalid}'];
        yield [true, '{"nested":{"key":"value"}}'];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringValidJson(bool $expected, bool|string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isJson());
    }
}
