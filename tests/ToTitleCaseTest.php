<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ToTitleCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Quickbrown Foobar', 'QuickBrown fooBar'];
        yield ['Quick Brown Foo Bar', 'Quick brown foo bar'];
        yield ['Quick Brown Foo Bar.', 'Quick brown foo bar.'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheTitleCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toTitleCase()->value());
    }
}
