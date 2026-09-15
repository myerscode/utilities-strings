<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class WordCountTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [2, 'Hello World'];
        yield [1, 'foobar'];
        yield [0, ''];
        yield [0, '   '];
        yield [3, 'Foo   Bar   Baz'];
        yield [3, '  leading and trailing  '];
        yield [4, "line one\nline two"];
        yield [3, 'one, two, three'];
        yield [2, 'foo 123'];
        yield [1, 'fòôbàř'];
    }

    #[DataProvider('__validData')]
    public function testWordCountMethod(int $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->wordCount());
    }
}
