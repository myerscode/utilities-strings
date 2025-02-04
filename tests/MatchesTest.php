<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class MatchesTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['Hello World', '/Hello World/', true],
            ['Hello=World', '/(.+)=(.+)/', true],
            ['foobar', '/(.+)=(.+)/', false],
            ['£77.49p', '/^[a-z0-9\s]*$/i', false],
        ];
    }

    #[DataProvider('__validData')]
    public function testMatchesArrayGetsUpdated(): void
    {
        $matches = [];
        $this->utility('Hello=World')->matches('/(.+)=(.+)/', $matches);
        $this->assertEquals(['Hello=World', 'Hello', 'World'], $matches);
    }

    #[DataProvider('__validData')]
    public function testStringCanBeMatchedWithRegex(string $string, string $pattern, bool $expected): void
    {
        $this->assertEquals($expected, $this->utility($string)->matches($pattern));
    }
}
