<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class SwapCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hELLO wORLD', 'Hello World'];
        yield ['FOOBAR', 'foobar'];
        yield ['foobar', 'FOOBAR'];
        yield ['', ''];
        yield ['123 !@#', '123 !@#'];
        yield ['fOO bAR 123', 'Foo Bar 123'];
        yield ['FÒÔBÀŘ', 'fòôbàř'];
        yield ['aBcDeF', 'AbCdEf'];
    }

    #[DataProvider('__validData')]
    public function testSwapCaseMethod(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->swapCase()->value());
    }
}
