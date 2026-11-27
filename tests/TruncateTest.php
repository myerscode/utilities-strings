<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class TruncateTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Rupert...', 'Rupert met Gerald', 6, '...'];
        yield ['Rupert~', 'Rupert met Gerald', 6, '~'];
        yield ['Rupert...', 'Rupert met Gerald', 7, '...'];
        yield ['Rupert met Gerald', 'Rupert met Gerald', 17, '...'];
        yield ['Rupert met Gerald', 'Rupert met Gerald', 50, '...'];
        yield ['...', 'Arthur', 0, '...'];
        yield ['...', 'Arthur', -3, '...'];
        yield ['', '', 5, '...'];
        yield ['Éé...', 'Éétoile', 2, '...'];
        yield ['日本...', '日本語です', 2, '...'];
    }

    public function testDefaultEndingIsThreeDots(): void
    {
        $this->assertSame('Arthur...', $this->utility('Arthur is here')->truncate(6)->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsTruncated(string $expected, string $string, int $limit, string $end): void
    {
        $this->assertSame($expected, $this->utility($string)->truncate($limit, $end)->value());
    }
}
