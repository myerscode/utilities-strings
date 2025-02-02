<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToTitleCaseTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['Quickbrown Foobar', 'QuickBrown fooBar'],
            ['Quick Brown Foo Bar', 'Quick brown foo bar'],
            ['Quick Brown Foo Bar.', 'Quick brown foo bar.'],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toTitleCase()->value());
    }
}
