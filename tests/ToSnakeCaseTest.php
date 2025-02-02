<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToSnakeCaseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['foo_bar', 'fooBar'],
            ['foo_bar', 'foo-Bar'],
            ['foo_bar', '   foo bar    '],
            ['bar', ' bar'],
            ['foo_bar', 'foo bar'],
            ['foo_bar', 'foo -bar'],
            ['_foo_bar', '-foo - bar'],
            ['foo_bar', 'foo_bar'],
            ['foo_c_foo', '  foo c foo'],
            ['foo_u_bar', 'fooUBar'],
            ['foo_c_c_bar', 'fooCCBar'],
            ['string_with1number', 'string_with1number'],
            ['string_with_2_2_numbers', 'String-with_2_2 numbers'],
            ['1foo2bar', '1foo2bar'],
            ['quick_brown_fox', 'quickBrownFox'],
            ['foo_σase', 'foo Σase'],
            ['στανιλ_foo_bar', 'Στανιλ foo bar'],
            ['σash_bar', 'Σash  Bar'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheSnakeCaseFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toSnakeCase()->value());
    }
}
