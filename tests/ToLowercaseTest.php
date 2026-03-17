<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class ToLowercaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['helloworld foo bar', 'HelloWorld Foo Bar'];
        yield ['helloworld foo bar', 'HELLOWORLD FOO BAR'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedBeAllLowercase(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toLowercase()->value());
    }
}
