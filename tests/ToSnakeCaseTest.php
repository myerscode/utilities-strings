<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToSnakeCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['foo_bar', 'fooBar'];
        yield ['foo_bar', 'foo-Bar'];
        yield ['foo_bar', '   foo bar    '];
        yield ['bar', ' bar'];
        yield ['foo_bar', 'foo bar'];
        yield ['foo_bar', 'foo -bar'];
        yield ['_foo_bar', '-foo - bar'];
        yield ['foo_bar', 'foo_bar'];
        yield ['foo_c_foo', '  foo c foo'];
        yield ['foo_u_bar', 'fooUBar'];
        yield ['foo_c_c_bar', 'fooCCBar'];
        yield ['string_with1number', 'string_with1number'];
        yield ['string_with_2_2_numbers', 'String-with_2_2 numbers'];
        yield ['1foo2bar', '1foo2bar'];
        yield ['quick_brown_fox', 'quickBrownFox'];
        yield ['foo_σase', 'foo Σase'];
        yield ['στανιλ_foo_bar', 'Στανιλ foo bar'];
        yield ['σash_bar', 'Σash  Bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheSnakeCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toSnakeCase()->value());
    }
}
