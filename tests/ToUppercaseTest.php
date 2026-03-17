<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ToUppercaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['HELLOWORLD FOO BAR', 'HelloWorld Foo Bar'];
        yield ['HELLOWORLD FOO BAR', 'helloworld foo bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedBeAllUppercase(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toUppercase()->value());
    }
}
