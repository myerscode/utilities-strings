<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class WordsTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Rupert met Gerald...', 'Rupert met Gerald and Arthur', 3, '...'];
        yield ['Rupert met~', 'Rupert met Gerald and Arthur', 2, '~'];
        yield ['Rupert met Gerald and Arthur', 'Rupert met Gerald and Arthur', 10, '...'];
        yield ['Rupert met Gerald and Arthur', 'Rupert met Gerald and Arthur', 5, '...'];
        yield ['Rupert...', "Rupert\n\tmet Gerald", 1, '...'];
        yield ['Rupert   met...', 'Rupert   met   Gerald', 2, '...'];
        yield ['', 'Rupert met Gerald', 0, '...'];
        yield ['', 'Rupert met Gerald', -1, '...'];
        yield ['', '', 3, '...'];
        yield ['Éclair été...', 'Éclair été à Paris', 2, '...'];
    }

    public function testDefaultsToOneHundredWordsAndThreeDots(): void
    {
        $string = implode(' ', array_fill(0, 101, 'Arthur'));

        $this->assertSame(implode(' ', array_fill(0, 100, 'Arthur')) . '...', $this->utility($string)->words()->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsLimitedToAmountOfWords(string $expected, string $string, int $words, string $end): void
    {
        $this->assertSame($expected, $this->utility($string)->words($words, $end)->value());
    }
}
