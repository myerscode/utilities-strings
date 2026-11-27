<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class LinesTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [['Rupert', 'Gerald', 'Arthur'], "Rupert\nGerald\nArthur"];
        yield [['Rupert', 'Gerald', 'Arthur'], "Rupert\r\nGerald\rArthur"];
        yield [['Rupert', '', 'Gerald'], "Rupert\n\nGerald"];
        yield [['Rupert', ''], "Rupert\n"];
        yield [['Rupert'], 'Rupert'];
        yield [['Éé', '日本'], "Éé\n日本"];
        yield [[], ''];
    }

    #[DataProvider('__validData')]
    public function testStringIsSplitIntoLines(array $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->lines());
    }
}
