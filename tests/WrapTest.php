<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class WrapTest extends BaseStringSuite
{
    public static function __differentValueData(): Iterator
    {
        yield ['[foo]', 'foo', '[', ']'];
        yield ['<p>hello</p>', 'hello', '<p>', '</p>'];
        yield ['{value}', 'value', '{', '}'];
        yield ['(foo]', 'foo', '(', ']'];
        yield ['préfixefoosuffixe', 'foo', 'préfixe', 'suffixe'];
    }
    public static function __sameValueData(): Iterator
    {
        yield ['"foo"', 'foo', '"'];
        yield ['**bar**', 'bar', '**'];
        yield ['##', '', '#'];
        yield ['foo', 'foo', ''];
    }

    #[DataProvider('__differentValueData')]
    public function testWrapWithDifferentValues(string $expected, string $string, string $before, string $after): void
    {
        $this->assertSame($expected, $this->utility($string)->wrap($before, $after)->value());
    }

    #[DataProvider('__sameValueData')]
    public function testWrapWithSingleValue(string $expected, string $string, string $before): void
    {
        $this->assertSame($expected, $this->utility($string)->wrap($before)->value());
    }
}
