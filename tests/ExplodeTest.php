<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class ExplodeTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [['Hello', 'World'], 'Hello, World', ','];
        yield [['Hello', 'World'], 'Hello,, World', ','];
        yield [['Hello', 'World'], 'Hello,,,,,,,,World', ','];
        yield [['foo', 'bar', 'baz'], 'foo bar baz', ' '];
        yield [[], 'foobar', ''];
        yield [['foobar'], 'foobar', ','];
        yield [['Hello', 'World'], 'Hello World', ' '];
    }

    #[DataProvider('__validData')]
    public function testExplode(array $expected, string $string, string $delimiter): void
    {
        $this->assertSame($expected, $this->utility($string)->explode($delimiter));
    }
}
