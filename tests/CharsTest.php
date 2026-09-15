<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class CharsTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [['f', 'o', 'o'], 'foo'];
        yield [['a'], 'a'];
        yield [[], ''];
        yield [['H', 'e', 'l', 'l', 'o'], 'Hello'];
        yield [['a', ' ', 'b'], 'a b'];
        yield [['f', 'ò', 'ô', 'b', 'à', 'ř'], 'fòôbàř'];
        yield [['1', '2', '3'], '123'];
    }

    /**
     * @param  array<string>  $expected
     */
    #[DataProvider('__validData')]
    public function testCharsMethod(array $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->chars());
    }
}
