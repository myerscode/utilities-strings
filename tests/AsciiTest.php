<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\DataProvider;
use Transliterator;

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
    public function testLatinAccentsFoldWithoutIntl(string $expected, string $string): void
    {
        // simulates a platform without the intl extension, so the iconv fallback is used
        $withoutIntl = new class ($string) extends Utility {
            protected function transliterator(): ?Transliterator
            {
                return null;
            }
        };

        $this->assertSame($expected, $withoutIntl->ascii()->value());
    }

    public function testResultIsAscii(): void
    {
        $this->assertTrue($this->utility('Rupert à Zürich')->ascii()->isAscii());
    }

    #[DataProvider('__validData')]
    public function testStringIsTransliteratedToAscii(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->ascii()->value());
    }
}
