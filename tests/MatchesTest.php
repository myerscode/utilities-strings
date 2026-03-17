<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class MatchesTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Hello World', '/Hello World/', true];
        yield ['Hello=World', '/(.+)=(.+)/', true];
        yield ['foobar', '/(.+)=(.+)/', false];
        yield ['£77.49p', '/^[a-z0-9\s]*$/i', false];
    }

    #[DataProvider('__validData')]
    public function testMatchesArrayGetsUpdated(): void
    {
        $matches = [];
        $this->utility('Hello=World')->matches('/(.+)=(.+)/', $matches);
        $this->assertSame(['Hello=World', 'Hello', 'World'], $matches);
    }

    #[DataProvider('__validData')]
    public function testStringCanBeMatchedWithRegex(string $string, string $pattern, bool $expected): void
    {
        $this->assertSame($expected, $this->utility($string)->matches($pattern));
    }
}
