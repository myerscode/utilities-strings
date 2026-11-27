<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class AsciiTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Cafe', 'Café'];
        yield ['Rupert goes to Zurich for creme brulee', 'Rupert goes to Zürich for crème brûlée'];
        yield ['Eclair Ete', 'Éclair Été'];
        yield ['Gerald and Arthur', 'Gerald and Arthur'];
        yield ['123 !?', '123 !?'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransliteratedToAscii(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->ascii()->value());
    }

    public function testResultIsAscii(): void
    {
        $this->assertTrue($this->utility('Rupert à Zürich')->ascii()->isAscii());
    }
}
