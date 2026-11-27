<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class ExcerptTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['...t met Gerald and A...', 'Rupert met Gerald and Arthur at the market', 'gerald', 6, '...'];
        yield ['Rupert met...', 'Rupert met Gerald and Arthur at the market', 'Rupert', 4, '...'];
        yield ['~t met Gerald and A~', 'Rupert met Gerald and Arthur at the market', 'Gerald', 6, '~'];
        yield ['Rupert met Gerald', 'Rupert met Gerald', 'met', 100, '...'];
        yield ['Gerald', 'Rupert met Gerald', 'Gerald', 0, ''];
        yield ['', 'Rupert met Gerald', 'Arthur', 5, '...'];
        yield ['', 'Rupert met Gerald', '', 5, '...'];
        yield ['...té Éé po...', 'Un été Éé pour', 'Éé', 3, '...'];
        yield ['', '', 'Rupert', 5, '...'];
    }

    #[DataProvider('__validData')]
    public function testExcerptIsExtractedAroundThePhrase(string $expected, string $string, string $phrase, int $radius, string $omission): void
    {
        $this->assertSame($expected, $this->utility($string)->excerpt($phrase, $radius, $omission)->value());
    }

    public function testDefaultRadiusAndOmission(): void
    {
        $string = str_repeat('a', 150) . 'Rupert' . str_repeat('b', 150);

        $this->assertSame('...' . str_repeat('a', 100) . 'Rupert' . str_repeat('b', 100) . '...', $this->utility($string)->excerpt('Rupert')->value());
    }
}
