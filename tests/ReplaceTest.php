<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ReplaceTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['', '', '', ''];
        yield ['foofoo', 'foobar', 'bar', 'foo'];
        yield ['foo', 'foobar', 'bar', ''];
        yield ['foo', 'foobar', 'bar', ''];
        yield ['foofoo', 'foobar', ['bar'], 'foo'];
        yield ['hellohello', 'foobar', ['foo', 'bar'], 'hello'];
        yield ['foofoofoofoo', 'foobarfoobar', 'bar', 'foo'];
        yield ['foofoofoofoo', 'foobarfoobar', ['bar'], 'foo'];
        yield ['foodotbar', 'foo.bar', '.', 'dot'];
    }

    #[DataProvider('__validData')]
    public function testValuesAreReplaced(string $expected, string $value, string|array $replace, string $with): void
    {
        $this->assertSame($expected, $this->utility($value)->replace($replace, $with)->value());
    }
}
